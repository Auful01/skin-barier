@extends('app.layout')

@section('content')

   <div class="container ">
    <div class="d-flex justify-content-end mt-5">
        <a href="/dashboard" class="btn btn-primary btn-sm w-20 px-4 ">
            <
        </a>
    </div>


    <div class="row d-flex mt-5 justify-content-around">
        <div class="col-md-2 text-center" style="text-decoration: none">
            <button class="btn d-flex flex-column align-items-center" id="non-metal">
                <img src="https://via.placeholder.com/200" alt="" class="img-fluid">
                <p class="mt-4 txt-primary text-center">Non-Metal</p>
            </button>

        </div>
        <div class="col-md-2 text-center" style="text-decoration: none">
            <button class="btn d-flex flex-column align-items-center" id="metal">
                <img src="https://via.placeholder.com/200" alt="" class="img-fluid">
                <p class="mt-4 txt-primary text-center">Metal</p>
            </button>
        </div>
        <div class="col-md-2 text-center" style="text-decoration: none">
            <button class="btn d-flex flex-column align-items-center" id="paper">
                <img src="https://via.placeholder.com/200" alt="" class="img-fluid">
                <p class="mt-4 txt-primary text-center">Paper</p>
            </button>
        </div>
        <div class="col-md-2 text-center" style="text-decoration: none">
            <button class="btn d-flex flex-column align-items-center" id="plastic">
                <img src="https://via.placeholder.com/200" alt="" class="img-fluid">
                <p class="mt-4 txt-primary text-center">Plastic</p>
            </button>
        </div>

        <div class="col-md-2 text-center" style="text-decoration: none">
            <button class="btn d-flex flex-column align-items-center" id="e-waste">
                <img src="https://via.placeholder.com/200" alt="" class="img-fluid">
                <p class="mt-4 txt-primary text-center">E-waste</p>
            </button>
        </div>
    </div>

    <section>
        <div class="container d-flex  justify-content-center align-items-center text-white" style=" flex-direction: column;">
            <div class="text-center py-5 ">

                <h1 class="txt-primary fw-bold">Why Are They?</h1>

                <div class="row d-flex text-start mt-5">
                    <div class="col-md-3 mb-3">
                        <div class="card bgc-accent h-100 border-0 shadow-sm rounded-4">
                            <div class="card-body bgc-accent rounded-4">
                                <h3>Organic</h3>
                                <p>
                                    Sorting organic category can helps minimize methane emissions from decomposing organic matter in landfills.
                                </p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3 mb-3">
                        <div class="card h-100 border-0 shadow-sm rounded-4">
                            <div class="card-body bg-secondary rounded-4 text-white">
                                <h3>Paper</h3>
                                <p>
                                    Proper sorting reduces deforestation by reusing paper fibers, supporting sustainable resource management.
                                </p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3 mb-3">
                        <div class="card h-100 border-0 shadow-sm rounded-4">
                            <div class="card-body bgc-accent rounded-4">
                                <h3>Plastic</h3>
                                <p>
                                    Sorting plastic waste ensures it can be recycled into new products, reducing the demand for new plastic production and limiting ocean and land pollution.
                                </p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3 mb-3">
                        <div class="card h-100 border-0 shadow-sm rounded-4">
                            <div class="card-body bg-secondary rounded-4 text-white">
                                <h3>E-Waste</h3>
                                <p>
                                    Proper e-waste disposal prevents toxic pollution, enables the recovery of rare elements, and reduces the need for environmentally damaging mining practices.
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
    </section>
   </div>

@endsection


@push('scripts')
    <script>
        // $('#non-metal').on('click', function () {
        //     swal({
        //         title: "Lets Recycle",
        //         text: "Please drop your waste at the nearest recycling center",
        //         icon: "info",
        //         showConfirmButton: true,
        //         confirmButtonText: 'Done',
        //     })
        // });
        $('body').on('click', '.btn', function () {
            console.log($(this).attr('id'));
            if ($(this).attr('id') == 'non-metal' || $(this).attr('id') == 'metal' ){
                swal({
                    title: "Lets Recycle",
                    text: "Please drop your waste at the nearest recycling center",
                    icon: "info",
                    showConfirmButton: true,
                    confirmButtonText: 'Done',
                })
            }else{
                swal({
                    title: "Coming Soon",
                    text: "This feature is coming soon",
                    icon: "warning",
                    timer: 1500
                })
            }
        });
    </script>
@endpush
