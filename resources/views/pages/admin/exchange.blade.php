@extends('app.layout-admin')

@section('content')

    <div class="container" style="margin-top: 100px">
        <h3 class="txt-primary fw-bold">
            Exchange list
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
                <div class="col-md-1 ms-auto">
                    <button class="btn w-100 btn-sm btn-primary" id="btn-add-exchange" style="min-height: 37px">
                        Add
                    </button>
                </div>
            </div>
            <table class="table table-bordered table-striped">
                <thead class="thead-light">
                    <tr>
                        <th scope="col">ID</th>
                        <th scope="col">Name</th>
                        <th scope="col">Image</th>
                        <th scope="col">Point</th>
                        <th scope="col">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($data as $item)

                    <tr>
                        <th scope="row">{{$item->id}}</th>
                        <td>{{$item->name}}</td>
                        <td>
                            <img src="{{asset('storage/images/exchange/' . $item->image)}}" class="img-fluid" style="max-height: 200px;" alt="">
                        </td>
                        <td>
                            {{$item->point}}
                        </td>
                        <td>
                            <div class="d-flex">
                                <button class="btn btn-cstm btn-primary btn-sm me-2 btn-edit-exchange" data-id="{{$item->id}}">Edit</button>
                                <button class="btn btn-cstm btn-danger btn-sm btn-delete-exchange" data-id="{{$item->id}}">Delete</button>
                            </div>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
            {{ $data->links() }}

        </div>
    </div>


    <x-modal-component id="add-modal-exchange" title="Add Modal exchange" size="">

        <input type="text" id="exchange-id" hidden>

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
            $('input').val('');
            $('.form-control').val('');
            $('#image').parent().find('label').html('Upload image');
            $('#btn-save-exchange').html('Save exchange');
            $('.modal-title').html('Add exchange');
        });


        $('#btn-save-exchange').click(function() {
            $('#add-modal-exchange').modal('hide');


            var formData = new FormData();
            formData.append('name', $('#name').val());
            formData.append('image', $('#image')[0].files[0]);
            formData.append('description', $('#description').val());
            formData.append('point', $('#point').val());

            var url = '/api/exchange';

            if ($('#exchange-id').val() != '') {
                url = '/api/exchange/' + $('#exchange-id').val();
            }

            $.ajax({
                url: url,
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

                    setTimeout(() => {
                        location.reload();
                    }, 1500);
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


        $('body').on('click', '.btn-edit-exchange', function() {
            var id = $(this).data('id');

            $.ajax({
                url: '/api/exchange/' + id,
                method: 'GET',
                success: function(response) {
                    $('#add-modal-exchange').modal('show');
                    $('#name').val(response.name);
                    $('#exchange-id').val(response.id);
                    $('#description').val(response.description);
                    $('#point').val(response.point);
                    $('#btn-save-exchange').html('Update exchange');
                    $('#image').parent().find('label').html('Change image');
                    $('#add-modal-exchange').find('.modal-title').html('Update exchange');
                }
            });
        });

        $('body').on('click', '.btn-delete-exchange', function() {
            var id = $(this).data('id');

            swal({
                title: "Are you sure?",
                text: "Once deleted, you will not be able to recover this exchange!",
                icon: "warning",
                showConfirmButton: true,
                showCancelButton: true,
                confirmButtonText: 'Yes, delete it!',
                cancelButtonText: 'No, cancel!',
                buttons: true,
                dangerMode: true,
            })
            .then((willDelete) => {
                if (willDelete.isConfirmed) {
                    $.ajax({
                        url: '/api/exchange/' + id,
                        method: 'DELETE',
                        success: function(response) {
                            swal({
                                icon: 'success',
                                title: 'exchange deleted successfully',
                                showConfirmButton: false,
                                timer: 1500
                            });

                            setTimeout(() => {
                                location.reload();
                            }, 1500);
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
                } else {
                    swal({
                        icon: 'info',
                        title: 'exchange deletion canceled',
                        showConfirmButton: false,
                        timer: 1500
                    });
                }
            });
        });
    </script>

@endpush
