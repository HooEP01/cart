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
                        <h2 class="content-header-title float-left mb-0">Warranty Page</h2>
                        <div class="breadcrumb-wrapper">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="index.html">Home</a>
                                </li>
                                <li class="breadcrumb-item"><a href="#">Warranty</a>
                                </li>
                                <li class="breadcrumb-item active">Add Warranty</a>
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
                            <div class="card-header">
                                <h4 class="card-title">Add Warranty</h4>
                            </div>
                            <div class="card-body">
                                <form action="{{route('admin.warranty.update')}}" method="POST" enctype="multipart/form-data" class="form form-horizontal">
                                    @csrf
                                    @foreach($warranties as $warranty)
                                    <div class="row">
                                        <div class="col-12">
                                            <div class="form-group row">
                                                <div class="col-sm-3 col-form-label">
                                                    <label for="name">Name</label>
                                                </div>
                                                <div class="col-sm-9">
                                                    <input type="hidden" name="id" value="{{$warranty->id}}">
                                                    <input type="text" id="name" class="form-control" name="name" value="{{$warranty->name}}" required/>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-12">
                                            <div class="form-group row">
                                                <div class="col-sm-3 col-form-label">
                                                    <label for="inclusion">Inclusion</label>
                                                </div>
                                                <div class="col-sm-9">
                                                  <textarea class="form-control" type="text" id="inclusion" name="inclusion" required>{{$warranty->inclusion}}</textarea>
                                                </div>
                                            </div>
                                        </div>

                                         <div class="col-12">
                                            <div class="form-group row">
                                                <div class="col-sm-3 col-form-label">
                                                    <label for="exclusion">Exclusion</label>
                                                </div>
                                                <div class="col-sm-9">
                                                  <textarea class="form-control" type="text" id="exclusion" name="exclusion" required>{{$warranty->exclusion}}</textarea>
                                                </div>
                                            </div>
                                        </div>


                                        <div class="col-12">
                                            <div class="form-group row">
                                                <div class="col-sm-3 col-form-label">
                                                    <label for="totalprice">Year</label>
                                                </div>
                                                <div class="col-sm-9">
                                                    <input type="text" id="year" class="form-control" name="year" value="{{$warranty->year}}" required />
                                                </div>
                                            </div>
                                        </div>


                                        <div class="col-sm-9 offset-sm-3">
                                            <div class="form-group">
                                            </div>
                                        </div>
                                        <div class="col-sm-9 offset-sm-3">
                                            <button name="update" type="submit" class="btn btn-primary mr-1">Update</button>
                                        </div>
                                    </div>
                                     @endforeach
                                </form>
                            </div>
                               
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
