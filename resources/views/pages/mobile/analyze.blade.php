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
                            <button class="btn btn-primary" type="button" id="file-click"  >Browse</button>
                        </div>
                    </div>
                </div>
            </table>

            <x-slot:footer>
               <button class="btn btn-primary text-center w-100" id="start-analyze">
                     Analyze
               </button>
            </x-slot>
        </x-modal-component>


        <div class="my-4">
            <h3>
                Analyze Result :
            </h3>
            <p>
                Rate of effect from Mercury : <b id="confidence">-</b>
            </p>


            <div class="alert" id="alert-result" hidden>
                <p class="my-auto text-center" id="alert-text">
                    -
                </p>
            </div>
        </div>

        <div>
            <h3>
                Suggestion :
            </h3>

            <ol id="solution">
                -
            </ol>
        </div>

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

        formData.append('file', file);

        $.ajax({
            url: 'https://9f8c-2404-c0-9ca0-00-2ce6-9cdd.ngrok-free.app/predict',
            type: 'POST',
            data: formData,
            contentType: false,
            processData: false,
            success: function (data) {


                var resConfidence = data.confidence * 100;
                resConfidence = resConfidence.toFixed(2);

                var fd = new FormData();
                fd.append('result', data.confidence);
                fd.append('image', file);

                $.ajax({
                    url: '/api/analyze',
                    type: 'POST',
                    contentType: false,
                    processData: false,
                    data: fd,
                    success: function (data) {
                        console.log(data);
                    },
                })

                $.ajax({
                    url: '/api/solution/mobile?result=' + resConfidence,
                    type: 'GET',
                    success: function (data) {
                        // console.log(data);
                        $('#solution').html("");
                        data.forEach(element => {
                            $('#solution').append("<li>" + element.description + "</li>");
                        });
                    },
                })

                swal({
                    title: "Success",
                    text: "Your skin has been analyzed.",
                    icon: "success",
                    showConfirmButton: false,
                    timer: 1500
                });


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
    });
</script>

@endpush
