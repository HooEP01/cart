@extends('layouts.admin')

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
                                <h2 class="content-header-title float-left mb-0">Order</h2>
                                <div class="breadcrumb-wrapper">
                                    <ol class="breadcrumb">
                                        <li class="breadcrumb-item"><a href="index.html">Home</a>
                                        </li>

                                        <li class="breadcrumb-item active">Order</li>
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
                                                <h6 class="mb-0">Order List</h6>
                                            </div>
                                            <div class="dt-action-buttons text-right">
                                                <div class="dt-buttons d-inline-flex"><a href="{{route('admin.order.add')}}"><button class="dt-button buttons-collection btn btn-outline-secondary dropdown-toggle mr-2" tabindex="0" aria-controls="DataTables_Table_0" type="button" aria-haspopup="true"><span><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-share font-small-4 mr-50">
                                                    </svg>Add New Record</span></button></a> 
                                                </div>
                                            </div>
                                        </div>
                                        <div class="d-flex justify-content-between align-items-center mx-0 row">
                                            <div class="col-12 col-md-6">
                                                <form class="form-inline my-2 my-lg-0" action="{{route('admin.order.view.orderID')}}" method="POST">
                                                    @csrf
                                                    <div id="DataTables_Table_0_filter" class="dataTables_filter"><label>Search:<label><input type="search" class="form-control" name="orderID" id="orderID" placeholder="Order ID" aria-controls="DataTables_Table_0"></div>
                                                </form>
                                            </div>
                                            <div class="col-12 col-md-6">
                                                <form name="myform" class="form-inline my-2 my-lg-0">
                                                    @csrf
                                                    <select class="form-control form-select form-select-sm"  aria-label=".form-select-sm example" name="mylist" onChange="selection()">
                                                        @if(isset($status))
                                                            <option>{{$status}}</option>
                                                            <option value="{{route('admin.order.view')}}">All</option>
                                                            
                                                            @if(!($status == 'unpaid'))
                                                                <option value="{{route('admin.order.view.status',['status'=>'unpaid'])}}">unpaid</option>
                                                            @endif
                                                            @if(!($status == 'paid'))
                                                                <option value="{{route('admin.order.view.status',['status'=>'paid'])}}">paid</option>
                                                            @endif
                                                            @if(!($status == 'complete'))
                                                                <option value="{{route('admin.order.view.status',['status'=>'complete'])}}">complete</option>
                                                            @endif
                                                        @else
                                                        <option>All</option>
                                                        <option value="{{route('admin.order.view.status',['status'=>'unpaid'])}}">unpaid</option>
                                                        <option value="{{route('admin.order.view.status',['status'=>'paid'])}}">paid</option>
                                                        <option value="{{route('admin.order.view.status',['status'=>'complete'])}}">complete</option>
                                                       
                                                        @endif
                                                    </select>
                                                </form>

                                            </div>
                                        </div>
                                        <table class="datatables-basic table dataTable no-footer dtr-column" id="DataTables_Table_0" role="grid" aria-describedby="DataTables_Table_0_info" style="width: 1205px;">
                                            <thead>
                                                <tr role="row">
                                                    <th class="control sorting_disabled" rowspan="1" colspan="1" style="width: 35px; display: none;" aria-label=""></th>
                                                    <th class="sorting" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" style="width: 114px;" aria-label="Name: activate to sort column ascending">Order ID</th>
                                                    <th class="sorting" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" style="width: 119px;" aria-label="Email: activate to sort column ascending">Customer ID</th>
                                                    <th class="sorting" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" style="width: 107px;" aria-label="Date: activate to sort column ascending">Purchase Date</th>
                                                    <th class="sorting" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" style="width: 137px;" aria-label="Salary: activate to sort column ascending">Service Date</th>
                                                    <th class="sorting" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" style="width: 134px;" aria-label="Status: activate to sort column ascending">Install Date</th>
                                                    <th class="sorting" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" style="width: 119px;" aria-label="Status: activate to sort column ascending">totalPrice</th>
                                                    <th class="sorting" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" style="width: 107px;" aria-label="Status: activate to sort column ascending">status</th>
                                                    <th class="sorting" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" style="width: 134px;" aria-label="Status: activate to sort column ascending">Action</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                    @foreach($orders as $order)
                                                    <tr>
                                                        <td>{{ $order->id }}</td>
                                                        <td>{{ $order->userID }}</td>
                                                        <td>{{ $order->purchaseDate }}</td>
                                                        <td>{{ $order->serviceDate }}</td>
                                                        <td>{{ $order->installDate }}</td>
                                                        <td>{{ $order->amount }}</td>
                                                        <td>
                                                            @if( $order->status == 'unpaid')
                                                            <span class="badge badge-warning">{{ $order->status }}</span>
                                                            @elseif( $order->status == 'paid')
                                                            <span class="badge badge-success">{{ $order->status }}</span>
                                                            @elseif( $order->status == 'complete')
                                                            <span class="badge badge-success">{{ $order->status }}</span>
                                                            @endif
                                                        </td>
                                                        <td>
                                                            <a href="{{route('admin.order.edit',['id'=>$order->id])}}">
                                                            <button class="btn btn-primary" style="width:115px;">Edit</button></a>
                                                            <a onClick="return swal({{ $order->id }})">
                                                            <button class="btn btn-outline-danger" style="width:115px;">Delete</button></a>

                                                            <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>

                                                            <script>

                                                                function swal(a){
                                                                    Swal.fire({
                                                                        title: 'Are you sure?',
                                                                        text: "You won't be able to revert this!",
                                                                        icon: 'warning',
                                                                        showCancelButton: true,
                                                                        confirmButtonColor: '#3085d6',
                                                                        cancelButtonColor: '#d33',
                                                                        confirmButtonText: 'Yes, delete it!'
                                                                        }).then((result) => {
                                                                        if (result.isConfirmed) {
                                                                            new function() {
                                                                                window.location.href = "{{route('admin.order.delete', '')}}"+"/"+a;
                                                                            };
                                                                        }
                                                                    })
                                                                }
                                                            </script>
                                                        </td>
                                                    </tr>
                                                    @endforeach
                                            </tbody>
                                        </table>
                                        <div class="d-flex justify-content-between mx-0 row">

                                            <div class="col-sm-12 col-md-6">
                                                <div class="dataTables_paginate paging_simple_numbers" id="DataTables_Table_0_paginate">
                                                    <ul class="pagination">
                                                        {{$orders->links('pagination::bootstrap-4')}}
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

<script>

function selection()
{
   var w = document.myform.mylist.selectedIndex;
   var url_add = document.myform.mylist.options[w].value;

   window.location.href = url_add;
}

</script>


</html>


@endsection
