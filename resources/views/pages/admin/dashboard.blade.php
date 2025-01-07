@extends('app.layout-admin')

@section('content')

    <div class="container" style="margin-top: 100px;">

        <h1 class="txt-primary fw-bold mb-3">
            Dashboard
        </h1>
        <div class="row d-flex justify-content-center">
            <div class="col-md-4 mb-5">
                <div class="card rounded-4">
                    <div class="card-body rounded-4">
                        <h1>{{$data['total_users'] ?? 0}}</h1>
                        <p>Users</p>
                    </div>
                </div>
            </div>
            <div class="col-md-4 mb-5">
                <div class="card rounded-4">
                    <div class="card-body rounded-4">
                        <h1>{{$data['total_categories'] ?? 0}}</h1>
                        <p>Category</p>
                    </div>
                </div>
            </div>
            <div class="col-md-4 mb-5">
                <div class="card rounded-4">
                    <div class="card-body rounded-4">
                        <h1>{{$data['total_exchanges'] ?? 0}}</h1>
                        <p>Exhcange</p>
                    </div>
                </div>
            </div>
            <div class="col-md-4 mb-5">
                <div class="card rounded-4">
                    <div class="card-body rounded-4">
                        <h1>{{$data['total_transaction'] ?? 0}}</h1>
                        <p>User Exchange</p>
                    </div>
                </div>
            </div>
            <div class="col-md-4 mb-5">
                <div class="card rounded-4">
                    <div class="card-body rounded-4">
                        <h1>{{$data['total_dispose'] ?? 0}}</h1>
                        <p>User Dispose</p>
                    </div>
                </div>
            </div>
        </div>
    </div>


@endsection
