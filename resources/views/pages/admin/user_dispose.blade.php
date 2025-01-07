@extends('app.layout-admin')

@section('content')

    <div class="container" style="margin-top: 100px">
        <h3 class="txt-primary fw-bold">
            User Disposed list
        </h3>

        <div class="p-3 shadow rounded-3">
            <div class="row d-flex mb-3">
                <div class="col-md-3">
                    <div class="form-group">
                        <input type="text" class="form-control" placeholder="Search exchange">
                    </div>
                </div>
                <div class="col-md-1">
                    <button class="btn w-100 btn-sm bt-primary" style="min-height: 37px">
                        Search
                    </button>
                </div>
            </div>
            <table class="table table-bordered table-striped">
                <thead class="thead-light">
                    <tr>
                        <th scope="col">ID</th>
                        <th scope="col">Date</th>
                        <th scope="col">User</th>
                        <th scope="col">Category </th>
                        <th scope="col">Point Obtainded</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($data as $item)

                    <tr>
                        <th scope="row">{{$item->id}}</th>
                        <td>{{ $item->created_at->addHours(7)->format('Y-m-d H:i:s') }}</td>

                        <td>{{$item->user->name}}</td>
                        <td>{{$item->category->name}}</td>
                        <td>
                            {{$item->point}}
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
            {{ $data->links() }}

        </div>
    </div>


    <x-modal-component id="add-modal-exchange" title="Add Modal exchange" size="">

        <div class="form-group">
            <label for="name">Name</label>
            <input type="text" class="form-control" id="name">
        </div>

        <div class="form-group mt-3">
            <label for="img">image</label>
            <input type="file" class="form-control" id="image">
        </div>

        <div class="form-group mt-3">
            <label for="desc">Description</label>
            <textarea name="" class="form-control" id="description" cols="30" rows="10"></textarea>
        </div>

        <div class="form-group mt-3">
            <label for="point">Point</label>
            <input type="number" class="form-control" id="point">
        </div>


        <x-slot:footer>
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            <button type="button" class="btn btn-primary" id="btn-save-exchange">Save changes</button>
        </x-slot:footer>
    </x-modal-component>


@endsection


@push('scripts')
    <script>

        $('#btn-add-exchange').click(function() {
            $('#add-modal-exchange').modal('show');
        });


        $('#btn-save-exchange').click(function() {
            $('#add-modal-exchange').modal('hide');


            var formData = new FormData();
            formData.append('name', $('#name').val());
            formData.append('image', $('#image')[0].files[0]);
            formData.append('description', $('#description').val());
            formData.append('point', $('#point').val());

            $.ajax({
                url: '/api/exchange',
                method: 'POST',
                processData: false,
                contentType: false,
                data: formData,
                success: function(response) {
                    swal({
                        icon: 'success',
                        title: 'exchange added successfully',
                        showConfirmButton: false,
                        timer: 1500
                    });
                },
                error: function(response) {
                    swal({
                        icon: 'error',
                        title: 'Something went wrong',
                        showConfirmButton: false,
                        timer: 1500
                    });
                }
            });
        });
    </script>

@endpush
