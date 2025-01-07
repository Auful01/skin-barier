@extends('app.layout-admin')

@section('content')

    <div class="container" style="margin-top: 100px">
        <h3 class="txt-primary fw-bold">
           Skincare list
        </h3>

        <div class="p-3 shadow rounded-3">
            <div class="row d-flex mb-3">
                <div class="col-md-3">
                    <div class="form-group">
                        <input type="text" class="form-control" placeholder="Search skincare">
                    </div>
                </div>
                <div class="col-md-1">
                    <button class="btn w-100 btn-sm bt-primary" style="min-height: 37px">
                        Search
                    </button>
                </div>
                <div class="col-md-1 ms-auto">
                    <button class="btn w-100 btn-sm btn-primary" id="btn-add-skincare" style="min-height: 37px">
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
                        <th scope="col">Type</th>
                        <th scope="col">Skin Type</th>
                        <th scope="col">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($data as $item)

                    <tr>
                        <th scope="row">{{$item->id}}</th>
                        <td>{{$item->name}}</td>
                        <td>
                            <img src="{{asset('images/'.$item->image)}}" alt="" style="max-width: 100px">
                        </td>
                        <td>{{$item->type}}</td>
                        <td>{{$item->skin_type}}</td>
                        <td>
                            <div class="d-flex">
                                <button class="btn btn-cstm btn-primary btn-sm me-2 btn-edit" data-id={{$item->id}}>Edit</button>
                                <button class="btn btn-cstm btn-danger btn-sm btn-delete" data-id={{$item->id}}>Delete</button>
                            </div>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
            {{ $data->links() }}

        </div>
    </div>


    <x-modal-component id="add-modal-skincare" title="Add Modal skincare" size="">

        <input type="text" id="skincare_id" hidden>
        <div class="form-group">
            <label for="name">Name</label>
            <input type="text" class="form-control" id="name">
        </div>

        <div class="form-group mt-3">
            <label for="img">image</label>
            <input type="file" class="form-control" id="image">
        </div>

        <div class="form-group">
            <label for="name">Type</label>
            <input type="text" class="form-control" id="type">
        </div>

        <div class="form-group">
            <label for="name">Skin Type</label>
            <input type="text" class="form-control" id="skin_type">
        </div>

        <div class="form-group">
            <label for="name">Price</label>
            <input type="text" class="form-control number-form" id="price">
        </div>

        <div class="form-group mt-3">
            <label for="desc">Ingredients</label>
            <textarea name="" class="form-control" id="ingredients" cols="30" rows="10"></textarea>
        </div>

        <div class="form-group mt-3">
            <label for="desc">Suitable</label>
            <textarea name="" class="form-control" id="suitable" cols="30" rows="10"></textarea>
        </div>

        <div class="form-group mt-3">
            <label for="desc">Benefit</label>
            <textarea name="" class="form-control" id="key_benefit" cols="30" rows="10"></textarea>
        </div>


        <x-slot:footer>
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            <button type="button" class="btn btn-primary" id="btn-save-skincare">Save changes</button>
        </x-slot:footer>
    </x-modal-component>


@endsection


@push('scripts')
    <script>

        $('.number-form').on('input', function() {
            this.value = this.value.replace(/[^0-9]/g, '')
            // change into split . every 3 digit
            this.value = this.value.replace(/\B(?=(\d{3})+(?!\d))/g, ".")
        });

        $('#btn-add-skincare').click(function() {
            $('#add-modal-skincare').modal('show');
        });


        $('#btn-save-skincare').click(function() {
            $('#add-modal-skincare').modal('hide');


            var formData = new FormData();
            formData.append('name', $('#name').val());
            formData.append('image', $('#image')[0].files[0]);
            formData.append('ingredients', $('#ingredients').val());
            formData.append('suitable', $('#suitable').val());
            formData.append('key_benefit', $('#key_benefit').val());
            formData.append('price', $('#price').val());
            formData.append('type', $('#type').val());
            formData.append('skin_type', $('#skin_type').val());

            var url = '/api/skincare';

            if ($('#skincare_id').val()) {
                url = '/api/skincare/' + $('#skincare_id').val();
                formData.append('_method', 'POST');
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
                        title: 'skincare added successfully',
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


        $('.btn-edit').click(function() {
            var id = $(this).data('id');

            $.ajax({
                url: '/api/skincare/' + id,
                method: 'GET',
                success: function(response) {

                    $('#add-modal-skincare').modal('show');
                    $('#name').val(response.name);
                    $('#type').val(response.type);
                    $('#skin_type').val(response.skin_type);
                    $('#price').val(response.price);
                    $('#ingredients').val(response.ingredients);
                    $('#suitable').val(response.suitable);
                    $('#key_benefit').val(response.key_benefit);
                    $('#skincare_id').val(response.id);

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


        $('.btn-delete').click(function() {
            var id = $(this).data('id');

            $.ajax({
                url: '/api/skincare/' + id,
                method: 'DELETE',
                success: function(response) {
                    swal({
                        icon: 'success',
                        title: 'skincare deleted successfully',
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
