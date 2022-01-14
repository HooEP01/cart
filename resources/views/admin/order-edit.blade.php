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
                        <h2 class="content-header-title float-left mb-0">Order Page</h2>
                        <div class="breadcrumb-wrapper">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="index.html">Home</a>
                                </li>
                                <li class="breadcrumb-item"><a href="#">Order</a>
                                </li>
                                <li class="breadcrumb-item active">Add Order</a>
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
                                <h4 class="card-title">Add Order</h4>
                            </div>
                            <div class="card-body">
                                <form action="{{route('admin.order.update')}}" method="POST" enctype="multipart/form-data" class="form form-horizontal">
                                    @csrf
                                    @foreach($orders as $order)
                                    <div class="row">
                                        <div class="col-12">
                                            <div class="form-group row">
                                                <div class="col-sm-3 col-form-label">
                                                    <label for="userID">User ID</label>
                                                </div>
                                                <div class="col-sm-9">
                                                    <input type="hidden" name="id" value="{{$order->id}}">
                                                    <input type="text" id="userID" class="form-control" name="userID" value="{{$order->userID}}" required/>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-12">
                                            <div class="form-group row">
                                                <div class="col-sm-3 col-form-label">
                                                    <label for="purchaseDate">Purchase Date</label>
                                                </div>
                                                <div class="col-sm-9">
                                                <input name="purchaseDate" id="datefield" type='date' min='1899-01-01' max='2000-13-13' value="{{$order->purchaseDate}}" required></input>
                                                </div>
                                            </div>
                                        </div>

                                         <div class="col-12">
                                            <div class="form-group row">
                                                <div class="col-sm-3 col-form-label">
                                                    <label for="serviceDate">Service Date</label>
                                                </div>
                                                <div class="col-sm-9">
                                                <input name="serviceDate" id="datefield" type='date' min='1899-01-01' max='2000-13-13' value="{{$order->serviceDate}}" required></input>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-12">
                                            <div class="form-group row">
                                                <div class="col-sm-3 col-form-label">
                                                    <label for="installDate">Install Date</label>
                                                </div>
                                                <div class="col-sm-9">
                                                <input name="installDate" id="datefield" type='date' min='1899-01-01' max='2000-13-13' value="{{$order->installDate}}" required></input>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-12">
                                            <div class="form-group row">
                                                <div class="col-sm-3 col-form-label">
                                                    <label for="status">Status</label>
                                                </div>
                                                <div class="col-sm-9 col-form-label">
                                                    <select id="status" name="status">
                                                    
                                                        @if($order->status == 'unpaid')
                                                        <option value="unpaid">selected Unpaid</option>
                                                        <option value="paid">Paid</option>
                                                        <option value="complete">Complete</option>
                                                        @elseif($order->status == 'paid')
                                                        <option value="paid">selected Paid</option>
                                                        <option value="unpaid">Unpaid</option>
                                                        
                                                        <option value="complete">Complete</option>
                                                        @else
                                                        <option value="complete">selected Complete</option>
                                                        <option value="unpaid">Unpaid</option>
                                                        <option value="paid">Paid</option>
                                                        
                                                        @endif
                                                  
                                                </select>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-12">
                                            <div class="form-group row">
                                                <div class="col-sm-3 col-form-label">
                                                    <label for="totalprice">Total price</label>
                                                </div>
                                                <div class="col-sm-9">
                                                    <input type="text" id="amount" class="form-control" name="amount" value="{{$order->amount}}" required />
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
