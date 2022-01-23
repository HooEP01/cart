@extends('layouts.user')

@section('content')

<!-- BEGIN: Content-->
<div class="app-content content ">
    <div class="content-overlay"></div>
    <div class="header-navbar-shadow"></div>
    <div class="content-wrapper">
        <div class="content-header row">
        </div>
        <div class="content-body">
            <div class="content-wrapper">
                <div class="content-header row">
                    <div class="content-header-left col-md-9 col-12 mb-2">
                        <div class="row breadcrumbs-top">
                            <div class="col-12">
                                <h2 class="content-header-title float-left mb-0">Product Show</h2>
                                <div class="breadcrumb-wrapper">
                                    <ol class="breadcrumb">
                                        <li class="breadcrumb-item"><a href="index.html">Home</a>
                                        </li>
                                        <li class="breadcrumb-item active"><a href="#">Product</a>
                                        </li>
                                    </ol>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Dashboard Ecommerce Starts -->
            <section id="dashboard-ecommerce">


               

                    <form action="{{route('user.cart.add')}}" method="POST" class="row match-height">
                        @CSRF
                
                        @foreach($products as $product)
                        <div class="col-lg-4 col-md-6 col-12">
                            <div class="card">
                                <div class="card-header d-flex justify-content-between align-items-center">
                                    <h4 class="card-title">{{ $product->name }}</h4>
                                    <i data-feather="help-circle" class="font-medium-3 text-muted cursor-pointer"></i>
                                </div>
                                <div class="card-body d-flex flex-column  p-0">
                                    <input type="hidden" name="id" value="{{ $product->id }}">
                                    <img src="{{asset('images/')}}/{{ $product->image}}" alt="" width="100%" height="400px;" class="img-fluid">
                                    <div class="row border-top text-center mx-0 mt-auto">
                                        <div class="col-6 border-right py-1">
                                            <p class="card-text text-muted mb-0">Price</p>
                                            <h3 class="font-weight-bolder mb-0">{{ $product->price }}</h3>
                                        </div>
                                        <div class="col-6 py-1">
                                            <p class="card-text text-muted mb-0"></p>
                                            <button type="submit" class="btn btn-danger btn-xs">Add to Cart</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        
                        <div class="col-lg-8 col-md-6 col-12">
                            <div class="card">
                                <div class="card-header d-flex justify-content-between align-items-center">
                                    <h4 class="card-title">Information</h4>
                                    <i data-feather="help-circle" class="font-medium-3 text-muted cursor-pointer"></i>
                                </div>
                                <div class="card-body p-0">
                                    <div class="col-12 border-right py-1">
                                        <p class="card-text text-muted mb-0">Description</p>
                                        <p class="font-weight-bolder text-justify mb-0">{{ $product->description }}</p>
                                    </div>
                                    <div class="col-12 border-right py-1">
                                        <p class="card-text text-muted mb-0">Price</p>
                                        <p class="font-weight-bolder text-justify mb-0">RM {{ $product->price }}</p>

                                    </div>
                                    <div class="col-12 border-right py-1">
                                        <p class="card-text text-muted mb-0">Total</p>
                                        <p class="font-weight-bolder text-justify mb-0">{{ $product->quantity }}

                                        </p>
                                        
                                    </div>
                                
                                    <div class="col-12 border-right py-1">
                                        <p class="card-text text-muted mb-0">Category</p>
                                        <p class="font-weight-bolder text-justify mb-0">{{ $product->categoryID }}</p>
                                    </div>

                                    <div class="col-12 border-right py-1">
                                        <p class="card-text text-muted mb-0">Warranty</p>
                                        <p class="font-weight-bolder text-justify mb-0">{{ $product->warrantyID }}</p>
                                    </div>

                                     <div class="col-12 border-right py-1">
                                        <p class="card-text text-muted mb-0">Quantity</p>
                                        <input type="number"  class="form-control font-weight-bolder text-justify mb-0" style="margin-top:0.5em;" min="1" name="quantity" value="1">
                                        </p> 
                                    </div>
                                </div>
                            </div>
                        </div>
                        @endforeach
                
                    </form>
               
            </section>
            <!-- Dashboard Ecommerce ends -->

        </div>
    </div>
</div>
<!-- END: Content-->

<div class="sidenav-overlay"></div>
<div class="drag-target"></div>

<!-- BEGIN: Footer-->
<footer class="footer footer-static footer-light">
    <p class="clearfix mb-0"><span class="float-md-left d-block d-md-inline-block mt-25">COPYRIGHT &copy; 2020<a class="ml-25" href="https://1.envato.market/pixinvent_portfolio" target="_blank">Pixinvent</a><span class="d-none d-sm-inline-block">, All rights Reserved</span></span><span class="float-md-right d-none d-md-block">Hand-crafted & Made with<i data-feather="heart"></i></span></p>
</footer>
<button class="btn btn-primary btn-icon scroll-top" type="button"><i data-feather="arrow-up"></i></button>
<!-- END: Footer-->


<!-- BEGIN: Vendor JS-->
<script src="../../app-assets/vendors/js/vendors.min.js"></script>
<!-- BEGIN Vendor JS-->

<!-- BEGIN: Page Vendor JS-->
<script src="../../app-assets/vendors/js/charts/apexcharts.min.js"></script>
<script src="../../app-assets/vendors/js/extensions/toastr.min.js"></script>
<!-- END: Page Vendor JS-->

<!-- BEGIN: Theme JS-->
<script src="../../app-assets/js/core/app-menu.js"></script>
<script src="../../app-assets/js/core/app.js"></script>
<!-- END: Theme JS-->

<!-- BEGIN: Page JS-->
<script src="../../app-assets/js/scripts/pages/dashboard-ecommerce.js"></script>
<!-- END: Page JS-->

<script>
    $(window).on('load', function() {
        if (feather) {
            feather.replace({
                width: 14,
                height: 14
            });
        }
    })
</script>
</body>
<!-- END: Body-->

</html>


@endsection
