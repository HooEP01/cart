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
                                <h2 class="content-header-title float-left mb-0">Warranty Show</h2>
                                <div class="breadcrumb-wrapper">
                                    <ol class="breadcrumb">
                                        <li class="breadcrumb-item"><a href="index.html">Home</a>
                                        </li>
                                        <li class="breadcrumb-item active"><a href="#">Warranty</a>
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

                <div class="row match-height">
    
                    @foreach($warranties as $warranty)
                    <div class="col-lg-4 col-md-6 col-12">
                        <div class="card">
                            <div class="card-header d-flex justify-content-between align-items-center">
                                <h4 class="card-title">{{ $warranty->name }}</h4>
                                <i data-feather="help-circle" class="font-medium-3 text-muted cursor-pointer"></i>
                            </div>
                            <div class="card-body d-flex flex-column  p-0">
                                <input type="hidden" name="id" value="{{ $warranty->id }}">

                                <div class="row border-top p-2 mx-0">
                                    <p class="card-text text-muted mb-0">Inclusion</p>
                                    <p class="font-weight-bolder mb-0 text-justify">{{ $warranty->inclusion }}</p>
                                </div>

                                <div class="row border-top p-2 mx-0">
                                    <p class="card-text text-muted mb-0">Exclusion</p>
                                    <p class="font-weight-bolder mb-0  text-justify">{{ $warranty->exclusion }}</p>
                                </div>
                                
                                <div class="row border-top text-center mx-0 mt-auto">
                                    <div class="col-6 border-right py-1">
                                        <p class="card-text text-muted mb-0">Year</p>
                                        <h3 class="font-weight-bolder mb-0">{{ $warranty->year }}</h3>
                                    </div>
                                    <div class="col-6 py-1">
                                        <p class="card-text text-muted mb-0"></p>
                                        <a href="">
                                        <button type="submit" class="btn btn-primary btn-xs">Learn More</button></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                     @endforeach


                </div>
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
