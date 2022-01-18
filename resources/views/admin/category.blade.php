@extends('layouts.admin')

@section('content')


<!-- BEGIN: Content-->
<div class="app-content content">
    <div class="content-overlay"></div>
    <div class="header-navbar-shadow"></div>
    <div class="content-wrapper">
        <div class="content-body">
            <!-- Basic Horizontal form layout section start -->
            <div class="content-wrapper"  >
                <div class="content-header row"  >
                    <div class="content-header-left col-md-9 col-12 mb-2"  >
                        <div class="row breadcrumbs-top"  >
                            <div class="col-12"  >
                                <h2 class="content-header-title float-left mb-0">Category</h2>
                                <div class="breadcrumb-wrapper"  >
                                    <ol class="breadcrumb">
                                        <li class="breadcrumb-item"><a href="index.html">Home</a>
                                        </li>

                                        <li class="breadcrumb-item active">Category</li>
                                    </ol>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="content-body"  >
           
                    <!-- Basic table -->
                    <section id="basic-datatable">
                        <div class="row"  >
                            <div class="col-12"  >
                                <div class="card"  >
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
                                    <div id="DataTables_Table_0_wrapper" class="dataTables_wrapper dt-bootstrap4 no-footer"  >
                                        <div class="card-header border-bottom p-1"  >
                                            <div class="head-label"  >
                                                <h6 class="mb-0">Category List</h6>
                                            </div>
                                        
                                        </div>
                                        <div class="d-flex justify-content-between align-items-center mx-0 row"  >
                                            <div class="col-sm-12 col-md-6">
                                               
                                            </div>
                                            <div class="col-sm-12 col-md-6">
                                                <div id="DataTables_Table_0_filter" class="dataTables_filter"><label>Search:<input type="search" class="form-control " placeholder="" aria-controls="DataTables_Table_0"></label></div>
                                            </div>
                                        </div>
                                        <table class="datatables-basic table dataTable no-footer dtr-column" id="DataTables_Table_0" role="grid" aria-describedby="DataTables_Table_0_info" style="width: 1205px;">
                                            <thead>
                                                <tr role="row">
                                                    <th class="control sorting_disabled" rowspan="1" colspan="1" style="width: 35px; display: none;" aria-label=""></th>
                                                    <th class="sorting" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" style="width: 100px;" aria-label="Name: activate to sort column ascending">ID</th>
                                                    <th class="sorting" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" style="width: 184px;" aria-label="Email: activate to sort column ascending">Name</th>
                                                    <th class="sorting" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" style="width: 90px;" aria-label="Status: activate to sort column ascending">Action</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <form action="{{ route('admin.category') }}" method="GET">
                                                 @foreach($categories as $category)
                                                    <tr>
                                                        <td>{{ $category->id }}</td>
                                                        <td>{{ $category->name }}</td>                                                    
                                                        <td>
                                                            <a href="{{route('admin.category.delete',['id'=>$category->id])}}">
                                                            <button class="btn-outline-secondary">Delete</button></a>
                                                        </td>
                                                    </tr>
                                                  @endforeach
                                                </form>
                                            </tbody>

                                        </table>

                                        <div class="d-flex justify-content-between mx-0 row"  >

                                            <div class="col-sm-12 col-md-6"  >

                                                <div class="dataTables_info" id="DataTables_Table_0_info" role="status" aria-live="polite"  >Showing 0 to 0 of 0 entries</div>
                                            </div>
                                            <div class="col-sm-12 col-md-6"  >
                                                <div class="dataTables_paginate paging_simple_numbers" id="DataTables_Table_0_paginate"  >
                                                    <ul class="pagination">
                                                        <li class="paginate_button page-item previous disabled" id="DataTables_Table_0_previous"><a href="#" aria-controls="DataTables_Table_0" data-dt-idx="0" tabindex="0" class="page-link">&nbsp;</a></li>
                                                        <li class="paginate_button page-item next disabled" id="DataTables_Table_0_next"><a href="#" aria-controls="DataTables_Table_0" data-dt-idx="1" tabindex="0" class="page-link">&nbsp;</a></li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </section>
                </div>
            </div>

            <section id="basic-horizontal-layouts">
                <div class="row"  >
                    <div class="content-header-left col-md-9 col-12 mb-2"  >
                        <div class="card"  >
                            <div class="card-header"  >
                                <h4 class="card-title">Add Category</h4>
                            </div>
                            <div class="card-body"  >
                                <form action="{{ route('admin.category.add') }}" method="POST">
                                    @csrf
                                    <div class="row"  >                                    
                                        <div class="col-12"  >
                                            <div class="form-group row"  >
                                                <div class="col-sm-3 col-form-label"  >
                                                    <label for="categoryName">Category Name</label>
                                                </div>
                                                <div class="col-sm-9"  >
                                                    <input type="text" id="categoryName" class="form-control" name="categoryName">
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-sm-9 offset-sm-3"  >
                                            <div class="form-group"  >
                                            </div>
                                        </div>
                                        <div class="col-sm-9 offset-sm-3"  >
                                            <button name="submit" class="btn btn-primary mr-1" style="float:right">Submit</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
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
