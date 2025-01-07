@extends('app.layout-admin')

@section('content')

    <div class="container" style="margin-top: 100px">
        <h3 class="txt-primary fw-bold">
            Soluiton list
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
                <div class="col-md-1 ms-auto">
                    <button class="btn w-100 btn-sm btn-primary" id="btn-add-solution" style="min-height: 37px">
                        Add
                    </button>
                </div>
            </div>
            <table class="table table-bordered table-striped">
                <thead class="thead-light">
                    <tr>
                        <th scope="col">ID</th>
                        <th scope="col">Infection Rate</th>
                        <th scope="col">Description</th>
                        <th scope="col">Action</th>
                        {{-- <th scope="col">Action</th> --}}
                    </tr>
                </thead>
                <tbody>
                    @foreach ($data as $item)

                    <tr>
                        <th scope="row">{{$item->id}}</th>
                        <td>{{$item->infection_rate}}</td>
                        <td>{{$item->description}}</td>
                        <td>
                            <div class="d-flex">
                                <button class="btn btn-cstm btn-primary btn-sm me-2 btn-edit" data-id={{$item->id}}>Edit</button>
                                <button class="btn btn-cstm btn-danger btn-sm">Delete</button>
                            </div>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
            {{ $data->links() }}

        </div>
    </div>


    <x-modal-component id="add-modal-solution" title="Add Modal Solution" size="">

        <input type="text" id="solution-id" hidden >
        <div class="form-group">
            <label for="name">Infection Rate</label>
            <input type="text" class="form-control number-form" id="infection_rate">
        </div>
        <div class="form-group">
            <label for="name">Solution</label>
            {{-- <input type="text" class="form-control" id="username"> --}}
            <textarea class="form-control" id="description" rows="3"></textarea>
        </div>

        <x-slot:footer>
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            <button type="button" class="btn btn-primary" id="btn-save-solution">Save changes</button>
        </x-slot:footer>
    </x-modal-component>


@endsection


@push('scripts')
    <script>

        $('#btn-add-solution').click(function() {
            $('#add-modal-solution').modal('show');
            $('.modal-title').html('Add Solution');
            $('input').val('');
        });


        $('#btn-save-solution').click(function() {
            $('#add-modal-solution').modal('hide');

            var solution_id = $('#solution-id').val();

            var url = '/api/solution';
            var method = 'POST';

            if (solution_id) {
                url = '/api/solution/' + solution_id;
                method = 'POST';
            }



            $.ajax({
                url: url,
                method: method,
                data: {
                    infection_rate: $('#infection_rate').val(),
                    description: $('#description').val(),
                },
                success: function(response) {
                    swal({
                        icon: 'success',
                        title:  solution_id != null ? 'Solution updated successfully' : "Solution added successfully",
                        showConfirmButton: false,
                        timer: 1500
                    });

                    location.reload();
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

            $('#add-modal-solution').modal('show');

            $.ajax({
                url: '/api/solution/' + $(this).data('id'),
                method: 'GET',
                success: function(response) {
                    $('#solution-id').val(response.id);
                    $('#infection_rate').val(response.infection_rate);
                    $('#description').val(response.description);
                    $('.modal-title').html('Edit Solution');
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
