@extends('layouts.user')

@section('content')
<!-- BEGIN: Content-->
<div class="app-content content ">
    <div class="content-overlay"></div>
    <div class="header-navbar-shadow"></div>
    <div class="content-wrapper">
        <div class="content-body">
            <!-- Basic Horizontal form layout section start -->
            <div class="content-wrapper">
                <div class="content-header row">
                    <div class="content-header-left col-md-9 col-12 mb-2">
                        <div class="row breadcrumbs-top">
                            <div class="col-12">
                                <h2 class="content-header-title float-left mb-0">Order Pages</h2>
                                <div class="breadcrumb-wrapper">
                                    <ol class="breadcrumb">
                                        <li class="breadcrumb-item"><a href="index.html">Home</a>
                                        </li>
                                        <li class="breadcrumb-item"><a href="{{route('user.order.view')}}">Order</a>
                                        </li>
                                        <li class="breadcrumb-item active">Detail
                                        </li>
                                    </ol>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="content-body">
                    <!-- Basic table -->
                    <section id="basic-datatable">
                        <div class="row">
                            <div class="col-12">
                                <div class="card">
                                    @if(Session::has('success'))
                                        <div class="alert alert-success p-2 m-0" role="alert">
                                            {{Session::get('success')}}

                                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <script>
                                            $(".alert").delay(4000).slideUp(200, function() {
                                                $(this).alert('close');
                                            });
                                        </script>
                                    @endif
                                    <div id="DataTables_Table_0_wrapper" class="dataTables_wrapper dt-bootstrap4 no-footer">
                                        <div class="card-header border-bottom p-1">
                                            <div class="head-label">
                                                <h6 class="mb-0">Product List</h6>
                                            </div>
                                        </div>
                                       
                                        <table class="datatables-basic table dataTable no-footer dtr-column" id="DataTables_Table_0" role="grid" aria-describedby="DataTables_Table_0_info" style="width: 1205px;">
                                            <thead>
                                                <tr role="row">
                                                    <th class="control sorting_disabled" rowspan="1" colspan="1" style="width: 35px; display: none;" aria-label=""></th>
                                                    <th class="sorting" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" style="width: 114px;">ID</th>
                                                    <th class="sorting" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" style="width: 119px;">Product</th>
                                                    <th class="sorting" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" style="width: 107px;">Quantity</th>
                                                    <th class="sorting" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" style="width: 134px;">Action</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                    
                                                    @foreach($carts as $cart)
                                                    <tr>
                                                        <td>{{ $cart->id }}</td>
                                                        <td>{{ $cart->productID }}</td>
                                                        <td>{{ $cart->quantity }}</td>
                                                        <td>
                                                            
                                                            <a href="{{route('user.product.search.detail',['id'=>$cart->id])}}">
                                                                <button type="submit" class="btn btn-primary btn-xs">Learn More</button>
                                                            </a>
                                                           
                                                        </td>
                                                    </tr>
                                                    @endforeach
                                              
                                            </tbody>

                                        </table>

                                        <div class="d-flex justify-content-between mx-0 row">

                                            <div class="col-sm-12 col-md-6">
                                                <div class="dataTables_paginate paging_simple_numbers" id="DataTables_Table_0_paginate">
                                                    <ul class="pagination">
                                                        {{$carts->links('pagination::bootstrap-4')}}
                                                    </ul>
                                                </div>
                                            </div>
                                         
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                </div>
            </div>

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
<script src="../app-assets/vendors/js/vendors.min.js"></script>
<!-- BEGIN Vendor JS-->

<!-- BEGIN: Page Vendor JS-->
<!-- END: Page Vendor JS-->

</html>
@endsection
