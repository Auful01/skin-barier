@extends('app.layout-mobile')

@section('content')
<div class="px-4 mt-4 d-flex shadow">
    <a href="/mobile/dashboard">
        <span class="material-symbols-outlined my-auto" >
            arrow_back
            </span>
    </a>
    <p>
       &nbsp; Analyze
    </p>
</div>
    <div class="content-wrapper mx-3" style="margin-top: 40px;">

        <table class="w-100" style="margin-top: 30px;">
            <tr>
                <td class="w-100">
                    <button class="btn p-0 w-100" id="analyze-now">
                        <div class="card shadow rounded-4  px-3 py-3 border-0 " style="background: #eb79bd">
                            <div class="card-body px-3 my-auto rounded-4 py-3">
                                <div class="row d-flex">
                                    <div class="col-12 w-100 my-auto">
                                        <h3>
                                            Analyze Now
                                        </h3>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </button>
                </td>
            </tr>

        </table>

        <x-modal-component id="analyze-skin" title="Upload Your Skin Photos" size="">

            <table class="table" id="upload-file">
                <div id="upload-container">
                    <div class="form-group">
                        <input type="file" name="" hidden id="file-in">
                        <div class="input-group">
                            <input type="text" class="form-control" id="file-name" readonly>
                            <button class="btn" type="button" id="file-click"  style="background: #eb79bd">Browse</button>
                        </div>
                    </div>
                </div>
            </table>

            <x-slot:footer>
               <button class="btn text-center w-100" id="start-analyze" style="background: #eb79bd">
                     Analyze
               </button>
            </x-slot>
        </x-modal-component>


        {{-- <div class="mt-4">
            <h3>
                Analyze Result :
            </h3>
            <p>
                Rate of effect from Mercury : <b id="confidence">-</b>
            </p>



        </div> --}}
        <div class="my-4">
            <div class="alert" id="alert-result" hidden>
                <p class="my-auto text-center" id="alert-text">
                    -
                </p>
            </div>
            <h3>
                Analyze Result :
            </h3>

            <div id="ai-result">
                -
            </div>
        </div>
{{--
        <div>
            <h3>
                Suggestion :
            </h3>

            <ol id="solution">
                -
            </ol>
        </div> --}}

    </div>

@endsection


@push('scripts')
<script>
    $('#file-click').on("click", function () {
        $('#file-in').click();
    });

    var file;

    $('#file-in').on("change", function () {
        file = this.files[0];
        const fileName = document.getElementById("file-name");

        fileName.value = file.name;
    });

    $('#analyze-now').on("click", function () {
        $('#analyze-skin').modal('show');
    });

    $('.btn-close').on("click", function () {
        stopCamera();
    });

    $('#upload-img').on("click", function () {
        $('#upload-file').hide();
        $('#cameraContainer').hide();
        $('#upload-container').show();
    });

    $('#start-analyze').on("click", function () {
        // $('#analyze-skin').modal('hide');
        $('#start-analyze').html("Analyzing...").attr("disabled", true);

        var formData = new FormData();
        var humidity = 0;
        var temp =0 ;

        formData.append('file', file);

        $.ajax({
            url : '/api/update-blynk/V1/0',
            type: 'GET',
            success : function (data) {
                // console.log(data);
                temp = data
            },
        })
        $.ajax({
            url : '/api/update-blynk/V2/0',
            type: 'GET',
            success : function (data) {
                // console.log(data);
                humidity = data
            },
        })
        if (!humidity && !temp) {
            $('#alert-result').attr("hidden", false).addClass("alert-info");
            $('#alert-text').html("Please place your skin in front of sensor");
        }
        // add delay
        setTimeout(function () {
            $('#analyze-skin').modal('hide');
        }, 2000)

        setTimeout(function () {


            // Timer countdown
            var countdown = 10;
            var countdownInterval = setInterval(function () {
                $("#alert-text").html("Please wait..." + countdown);
                countdown--;
                if (countdown < 0) {
                    clearInterval(countdownInterval);
                }
            }, 1000);

            $.ajax({
                url: '/api/get-blynk/v2',
                type: 'GET',
                success: function (data) {
                    // console.log(data);
                    humidity = data
                },
            })
            $.ajax({
                url: '/api/get-blynk/v1',
                type: 'GET',
                success: function (data) {
                    // console.log(data);
                    temp = data
                },
            })
        }, 10000);

        setTimeout(() => {
            $.ajax({
                url: 'http://apergu.co.id:5000/predict',
                type: 'POST',
                data: formData,
                contentType: false,
                processData: false,
                onprogress: function (event) {
                    if (event.lengthComputable) {
                        var percentComplete = (event.loaded / event.total) * 100;
                        console.log("Upload progress: " + percentComplete + "%");
                    }
                },
                success: function (data) {

                    var resConfidence = data.confidence * 100;
                    resConfidence = resConfidence.toFixed(2);

                    var fd = new FormData();
                    fd.append('result', data.confidence);
                    fd.append('image', file);
                    fd.append('humidity', humidity);
                    fd.append('temperature', temp);

                    $.ajax({
                        // url: '/api/analyze',
                        url : 'https://n8n.apergu.co.id/webhook/bareskin/identify',
                        type: 'POST',
                        contentType: false,
                        processData: false,
                        data: fd,
                        success: function (data) {
                            console.log(data);
                            $('#alert-result').prop("hidden", true)
                            $('#ai-result').html(data.output);
                        },
                    })

                    // $.ajax({
                    //     url: '/api/solution/mobile?result=' + resConfidence,
                    //     type: 'GET',
                    //     success: function (data) {
                    //         // console.log(data);
                    //         $('#solution').html("");
                    //         data.forEach(element => {
                    //             $('#solution').append("<li>" + element.description + "</li>");
                    //         });
                    //     },
                    // })

                    $('#confidence').html(resConfidence + " %");

                    if (data.confidence > 0.5) {
                        $('#alert-result').attr("hidden", false).addClass("alert-danger");
                        $('#alert-text').html("Your skin has a high chance of being affected by Mercury.");
                    } else {
                        $('#alert-result').attr("hidden", false).addClass("alert-success");
                        $('#alert-text').html("Your skin has a low chance of being affected by Mercury.");

                    }

                    setTimeout(() => {
                        $('#analyze-skin').modal('hide');
                        $('#start-analyze').html("Analyze").attr("disabled", false);
                    }, 1500);
                },
                error: function (error) {
                    swal({
                        title: "Failed",
                        text: "Failed to analyze your skin.",
                        icon: "error",
                        showConfirmButton: false,
                        timer: 1500
                    });
                }
            });
    }, 15000);

    });
</script>

@endpush
