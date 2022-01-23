@extends('layouts.user')

@section('content')

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<script type="text/javascript">

    function cal(){
        var price=document.getElementsByName('price[]');
        var quantity=document.getElementsByName('quantity[]');
        var subtotal= 0;
        var cboxes=document.getElementsByName('cid[]');
        var len=cboxes.length; //get number  of cid[] checkbox inside the page
        for(var i=0;i<len;i++){
            if(cboxes[i].checked){  //calculate if checked
                subtotal=parseFloat(price[i].value) * parseFloat(quantity[i].value) + parseFloat(subtotal);
            }
        }
        document.getElementById('sub').value=subtotal.toFixed(2); //convert 2 decimal place      
    }

    function toggle(source) {
        checkboxes = document.getElementsByName('cid[]');
        for(var i=0, n=checkboxes.length;i<n;i++) {
            checkboxes[i].checked = source.checked;
        }
        cal();
    }
    
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
        window.location.href = "{{route('user.cart.delete', '')}}"+"/"+a;
        };
      }
    })
    }

</script>

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
                                <h2 class="content-header-title float-left mb-0">Cart Pages</h2>
                                <div class="breadcrumb-wrapper">
                                    <ol class="breadcrumb">
                                        <li class="breadcrumb-item"><a href="index.html">Home</a>
                                        </li>
                                        <li class="breadcrumb-item"><a href="#">Cart</a>
                                        </li>
                                        <li class="breadcrumb-item active">View
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
                                                <h6 class="mb-0">Cart List</h6>
                                            </div>
                                            <div class="dt-action-buttons text-right">
                                                <div class="dt-buttons d-inline-flex"><a href="{{route('user.product.view')}}" ><button class="dt-button buttons-collection btn btn-outline-secondary dropdown-toggle mr-2" tabindex="0" aria-controls="DataTables_Table_0" type="button" aria-haspopup="true"><span><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-share font-small-4 mr-50">
                                                    </svg>Add New</span></button></a>  
                                                </div>
                                            </div>
                                        </div>

                                                                            
                                    <form action="{{route('user.checkout.add')}}" method="post" class="require-validation">  
                                    @CSRF
                                    
                                        <table class="datatables-basic table dataTable no-footer dtr-column" id="DataTables_Table_0" role="grid" aria-describedby="DataTables_Table_0_info" style="width: 1205px;">
                                            <thead>
                                                <tr role="row">
                                                    <th class="control sorting_disabled" rowspan="1" colspan="1" style="width: 35px; display: none;" aria-label=""></th>
                                                    <th class="sorting" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" style="width: 114px;"><input type="checkbox" onClick="toggle(this)"/> Select All</th>
                                                    <th class="sorting" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" style="width: 119px;">Name</th>
                                                    <th class="sorting" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" style="width: 107px;">Category</th>
                                                    <th class="sorting" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" style="width: 107px;">Warranty</th>
                                                    <th class="sorting" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" style="width: 137px;">price</th>
                                                    <th class="sorting" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" style="width: 134px;">quantity</th>
                                                    <th class="sorting" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" style="width: 134px;">Action</th>
                                                    
                                                    
                                                </tr>
                                            </thead>
                                            <tbody>


                                                    @foreach($products as $product)
                                                    <tr>
                                                        <td>
                                                            <input type="checkbox" name="cid[]" id="cid[]" value="{{$product->cid}}" onclick="cal()">
                                                            <input type="hidden" name="price[]" id="price[]" value="{{$product->price}}">  
                                                            <input type="hidden" name="quantity[]" id="quantity[]" value="{{ $product->quantity }}">  

                                                        </td>
                                                        <td>{{ $product->name }}</td>
                                                        <td>{{ $product->categoryID }}</td>
                                                        <td>{{ $product->warrantyID }}</td>
                                                        <td>{{ $product->price }}</td>
                                                        <td>
                                                            {{$product->quantity}}
                                                        </td>

                                                        <td>
                                                            
                                                            
                                                            <button type="button" class="btn btn-outline-danger">
                                                                <a onClick="return swal({{$product->cid}})">
                                                            Delete</a></button>

                                                        </td>
                                                    </tr>
                                                    @endforeach
                                              
                                            </tbody>

                                        </table>

                                    
                                        <div class="d-flex justify-content-between mx-0 row">

                                            <div class="col-sm-12 col-md-6">
                                                <div class="dataTables_paginate paging_simple_numbers" id="DataTables_Table_0_paginate">
                                                    <ul class="pagination">
                                                        {{$products->links('pagination::bootstrap-4')}}
                                                    </ul>
                                                </div>
                                            </div>
                                            <div class="col-sm-12 col-md-6">
                                                <div class="dataTables_paginate paging_simple_numbers" id="DataTables_Table_0_paginate">
                                                    <ul class="pagination p-1">
                                                        <span class="pr-1"><input type="text" value="0" name="sub" id="sub" size="8" class="form-control" readonly/></span>
                                                        <button type="submit" class="pr-1 pl-1 dt-button buttons-collection btn btn-primary dropdown-toggle mr-2" tabindex="0" aria-controls="DataTables_Table_0" type="button" aria-haspopup="true"><span><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="font-small-4 mr-50">
                                                        </svg>Check Out</span></button>
                                                    </ul>
                                                </div>
                                                
                                            </div>
                                        </div>
                                    </form>
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
