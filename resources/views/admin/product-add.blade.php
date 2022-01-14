@extends('layouts.admin')

@section('content')

<!-- BEGIN: Content-->
<div class="app-content content ">
    <div class="content-overlay"></div>
    <div class="header-navbar-shadow"></div>
    <div class="content-wrapper">
        <div class="content-header row">
            <div class="content-header-left col-md-9 col-12 mb-2">
                <div class="row breadcrumbs-top">
                    <div class="col-12">
                        <h2 class="content-header-title float-left mb-0">Product Page</h2>
                        <div class="breadcrumb-wrapper">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="index.html">Home</a>
                                </li>
                                <li class="breadcrumb-item"><a href="#">Product</a>
                                </li>
                                <li class="breadcrumb-item active">Add Product</a>
                                </li>
                            </ol>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="content-body">
            <!-- Basic Horizontal form layout section start -->
            <section id="basic-horizontal-layouts">
                <div class="row">
                    <div class="content-header-left col-md-9 col-12 mb-2">
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

                            <div class="card-header">
                                <h4 class="card-title">Add Product</h4>
                            </div>

                            <div class="card-body">
                                <form action="{{route('admin.product.create')}}" method="POST" enctype="multipart/form-data">
                                    @csrf
                                    <div class="row">
                                        <div class="col-12">
                                            <div class="form-group row">
                                                <div class="col-sm-3 col-form-label">
                                                    <label for="productName">Product Name</label>
                                                </div>
                                                <div class="col-sm-9">
                                                    <input type="text" id="productName" class="form-control" name="productName" required/>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-12">
                                            <div class="form-group row">
                                                <div class="col-sm-3 col-form-label">
                                                    <label for="categoryID">Category</label>
                                                </div>
                                                <div class="col-sm-9 col-form-label">
                                                    <select id="categoryID" name="categoryID">
                                                    @foreach($categories as $category)
                                                        <option value="{{$category->id}}">{{$category->name}}</option>
                                                    @endforeach
                                                
                                                    </select>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-12">
                                            <div class="form-group row">
                                                <div class="col-sm-3 col-form-label">
                                                    <label for="productPrice">Price</label>
                                                </div>
                                                <div class="col-sm-9">
                                                    <input type="number" id="productPrice" class="form-control" name="productPrice" min="0" required />
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-12">
                                            <div class="form-group row">
                                                <div class="col-sm-3 col-form-label">
                                                    <label for="productQuantity">Quantity</label>
                                                </div>
                                                <div class="col-sm-9">
                                                    <input type="number" id="productQuantity" class="form-control" name="productQuantity"  min="0" required />
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-12">
                                            <div class="form-group row">
                                                <div class="col-sm-3 col-form-label">
                                                    <label for="productDescription">Description</label>
                                                </div>
                                                <div class="col-sm-9">
                                                  <textarea class="form-control" type="text" id="productDescription" name="productDescription" required></textarea>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-12">
                                            <div class="form-group row">
                                                <div class="col-sm-3 col-form-label">
                                                    <label for="imageName">Images</label>
                                                </div>
                                                <div class="col-sm-9">
                                                    <input type="file" class="form-control" id="productImage" name="productImage" required>
                                                </div>
                                            </div>
                                        </div>


                                        <div class="col-sm-9 offset-sm-3">
                                            <div class="form-group">
                                            </div>
                                        </div>
                                        <div class="col-sm-9 offset-sm-3">
                                            <button name="submit1" type="submit" class="btn btn-primary mr-1" style="float:right">Submit</button>
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

</html>


@endsection