@extends('app.layout-mobile')

@section('content')
<div class="px-4 mt-4 d-flex ">
    <a href="/mobile/dashboard">
        <span class="material-symbols-outlined my-auto" >
            arrow_back
            </span>
    </a>
    <p class="ms-3 mb-0 fw-bold" style="font-size: 20px">
        Recently Disposed
    </p>
</div>


<div class="card shadow-none mx-3" style="margin-top: 20px;" >
    <div class="card-body rounded-4">
        <canvas id="disposed"></canvas>
    </div>
</div>

<div class="card shadow-none mx-3" style="margin-top: 20px;" >
    <div class="card-body" style="height: 400px;">
        <div class="d-flex">
         <span class="material-symbols-outlined">
             history
             </span>
                 History
        </div>

        <input type="text" id="metal" value="{{$metal}}" hidden>
        <input type="text" id="plastic" value="{{$plastic}}" hidden>

        <div style="overflow-y: auto;max-height:320px;" class="mt-4">
            @foreach ($data as $dt)
            <div class="rounded-3 p-2 mb-3" style="background: #fcfcfc">
                <p>{{$dt['date']}}</p>

                <table>
                    <tr>
                        <td>Type</td>
                        <td>: {{$dt['category']['name']}}</td>


                    </tr>
                    <tr>
                        <td>Points Reached&nbsp;&nbsp;&nbsp;&nbsp;</td>
                        <td>: {{$dt['point']}}</td>
                    </tr>
                </table>
            </div>
            @endforeach
        </div>
    </div>
</div>
@endsection


@push('scripts')
<script>
    const ctx = document.getElementById('disposed');

    new Chart(ctx, {
      type: 'doughnut',
      data: {
        labels: ['Metal', 'Non Metal'],
        datasets: [{
          label: '# of Votes',
          data: [$('#metal').val(), $('#plastic').val()],
          borderWidth: 1
        }]
      },
    });
  </script>
@endpush
