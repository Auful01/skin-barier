@extends('app.layout-admin')

@section('content')

    <div class="container" style="margin-top: 100px">
        <h3 class="txt-primary fw-bold">
            Result list
        </h3>

        <div class="p-3 shadow rounded-3">
            <div class="row d-flex mb-3">
                <div class="col-md-3">
                    <div class="form-group">
                        <input type="text" class="form-control" placeholder="Search result">
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
                        <th scope="col">User</th>
                        <th scope="col">Image</th>
                        <th scope="col">Mercury Procentage</th>
                        <th scope="col">Created At</th>
                        {{-- <th scope="col">Action</th> --}}
                    </tr>
                </thead>
                <tbody>
                    @foreach ($data as $item)

                    <tr>
                        <th scope="row">{{$item->id}}</th>
                        <td>{{$item->user->name}}</td>
                        <td>
                            <img src="{{asset('analyzes/' . $item->image)}}" alt="" style="max-height: 100px;">
                        </td>
                        <td>
                            {{$item->result * 100 }} %
                        </td>
                        <td>{{$item->created_at}}</td>
                        {{-- <td>
                            <div class="d-flex">
                                <button class="btn btn-cstm btn-primary btn-sm me-2 btn-edit" data-id={{$item->id}}>Edit</button>
                                <button class="btn btn-cstm btn-danger btn-sm">Delete</button>
                            </div>
                        </td> --}}
                    </tr>
                    @endforeach
                </tbody>
            </table>
            {{ $data->links() }}

        </div>
    </div>


    <x-modal-component id="add-modal-user" title="Add Modal User" size="">

        <input type="text" id="user-id" hidden >
        <div class="form-group">
            <label for="name">Name</label>
            <input type="text" class="form-control" id="name">
        </div>
        <div class="form-group">
            <label for="name">Username</label>
            <input type="text" class="form-control" id="username">
        </div>

        <div class="form-group mt-3">
            <label for="email">Email</label>
            <input type="email" class="form-control" id="email">
        </div>

        <div class="form-group mt-3">
            <label for="role">Role</label>
            <select class="form-select" id="role">
                <option selected>Choose...</option>
                <option value="1">Admin</option>
                <option value="2">User</option>
            </select>
        </div>

        <div class="form-group mt-3">
            <label for="password">Password</label>
            <input type="password" class="form-control" id="password">
        </div>


        <x-slot:footer>
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            <button type="button" class="btn btn-primary" id="btn-save-user">Save changes</button>
        </x-slot:footer>
    </x-modal-component>


@endsection


@push('scripts')
    <script>

        $('#btn-add-user').click(function() {
            $('#add-modal-user').modal('show');
            $('.modal-title').html('Add User');
            $('input').val('');
            $('#password').parent().find('label').html('Password');
            $('#email').removeAttr('disabled');
        });


        $('#btn-save-user').click(function() {
            $('#add-modal-user').modal('hide');

            var user_id = $('#user-id').val();

            var url = '/api/register';
            var method = 'POST';

            if (user_id) {
                url = '/api/user/' + user_id;
                method = 'PUT';
            }



            $.ajax({
                url: url,
                method: method,
                data: {
                    name: $('#name').val(),
                    username: $('#username').val(),
                    email: $('#email').val(),
                    role: $('#role').val(),
                    password: $('#password').val()
                },
                success: function(response) {
                    swal({
                        icon: 'success',
                        title: 'User added successfully',
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


        $("body").on("click", ".btn-edit", function() {
            console.log($(this).data('id'));

            $('#add-modal-user').modal('show');

            $.ajax({
                url: '/api/user/' + $(this).data('id'),
                method: 'GET',
                success: function(response) {
                    $('#user-id').val(response.id);
                    $('#username').val(response.username);
                    $('#name').val(response.name);
                    $('#email').val(response.email).attr('disabled', 'disabled');
                    $('#role').val(response.role);
                    $('#password').parent().find('label').html('New Password');
                    $('.modal-title').html('Edit User');
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
        })
    </script>

@endpush
