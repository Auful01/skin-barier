@extends('app.layout-mobile')

@section('content')
<div class="px-4 mt-4 d-flex ">
    <a href="/mobile/dashboard">
        <span class="material-symbols-outlined my-auto" >
            arrow_back
            </span>
    </a>
    <p class="ms-3 mb-0 fw-bold" style="font-size: 20px">
        Dermatology
    </p>
</div>

<div class="card border-0 mx-3 rounded-4 shadow" style="margin-top: 20px;" >
    <div class="card-body rounded-4" >


        <canvas id="disposed" class="my-3"></canvas>

    </div>
</div>

<div class="card border-0 mx-3 rounded-4 shadow" style="margin-top: 20px;" >
    <div class="card-body rounded-4" >
        <div class="mb-3">
            <p class="mb-4 fw-bold">
                Mercury Procentage : <b id="mercury-procentage"></b>
            </p>
            <p class="mb-4 fw-bold">
                Mercury Mean : <b id="mercury-mean"></b>
            </p>
            <div class="alert text-center mx-auto" id="result-text">
            </div >
        </div>
    </div>
</div>

<div class="card border-0 mx-3 rounded-4 shadow" style="margin-top: 20px;height:500px;overflow-y:auto" >
    <div class="card-body rounded-4" >
        <p>List Result</p>

        <div id="list-result">

        </div>

    </div>
</div>
@endsection

@push('scripts')
<script>
    const ctx = document.getElementById('disposed');

    var result = [0, 0];

    $.ajax({
        url: '/api/analyze/mobile',
        method: 'GET',
        success: function (res) {
            console.log(res);


            var listData = res.data;
            var listResult = $('#list-result');

            listData.forEach((item, index) => {
                var card = $('<div class="card shadow border-0 rounded-4 my-3 mb-3" ></div>');
                var cardBody = $('<div class="card-body rounded-4"></div>');
                var mb3 = $('<div class="mb-3"></div>');
                var dflex = $('<div class="row d-flex"></div>');
                var col6 = $('<div class="col-4"></div>');
                var col6Text = $('<div class="col-8 "></div>');
                var img = $('<img src="" alt="" id="skincare-img" class="img-fluid" >');
                var h3 = $('<h3></h3>');
                var p = $('<p id="type"></p>');
                var createdAt = $('<i class="text-end mb-2"></i>');


                var CreatedAt = new Date(item.created_at);

                createdAt.text(CreatedAt.toDateString());
                cardBody.append(createdAt);
                card.append(cardBody);

                dflex.append(col6);
                dflex.append(col6Text);

                col6.append(img);
                col6Text.append(p);

                p.text('Result : ' + (item.result*100).toFixed(2) +"% Mercury");
                img.attr('src', '{{asset('analyzes')}}/' + item.image);

                cardBody.append(mb3);
                mb3.append(dflex);



                listResult.append(card);
            });

            new Chart(ctx, {
                type: 'doughnut',
                data: {
                    labels: ['Mercury', 'Healthy'],
                    datasets: [{
                    label: '# of Votes',
                    data: [res.mean, 100 - res.mean],
                    borderWidth: 1
                    }]
                },
            });

            $('#mercury-procentage').text((res.data[0].result * 100).toFixed(2) + '%');
            $('#mercury-mean').text(res.mean.toFixed(2) + '%');

            if (res.mean > 0.5) {
                $('#result-text').text('Your skin care contain mercury').addClass('alert-danger');
            } else {
                $('#result-text').text('Your skin care is safe').addClass('alert-success');
            }

        }
    })


  </script>
@endpush

