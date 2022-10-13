@extends('layouts.app', ['pageSlug' => 'dashboard', 'page' => 'Dashboard', 'section' => ''])

@section('content')
    <div class="container-fluid mt--7">
        <div class="row">
            <div class="col-xl-12 order-xl-1">
                <div class="card">
                    <div class="card-header">
                        <div class="row align-items-center">
                            <div class="col-8">
                                <h3 class="mb-0">Make New Order</h3>
                            </div>
                            <div class="container-fluid">

                                <div id="form-messages">
                                    @include('admin.partials.alerts.flash')
                                    @include('admin.partials.errors.error')
                                </div>

                            </div>
                            {{--                            <div class="col-4 text-right">--}}
                            {{--                                <a href="{{ route('providers.index') }}" class="btn btn-sm btn-primary">Back to List</a>--}}
                            {{--                            </div>--}}
                        </div>
                    </div>
                    <div class="card-body">
                        <form method="post" action="{{ route('order.store') }}" autocomplete="off" enctype="multipart/form-data">
                            @csrf

                            <h6 class="heading-small text-muted mb-4">Order Information</h6>
                            <div class="pl-lg-4">
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Product Name</label>
                                    <input type="text" name="name" class="form-control" id="exampleInputEmail1" placeholder="Enter name">
                                </div>

                                <div class="form-group">
                                    <label for="exampleInputEmail1">Description</label>
                                    <input type="text" name="description" class="form-control" id="exampleInputEmail1" placeholder="Enter description">
                                </div>

                                <div class="form-group">
                                    <label for="exampleInputEmail1">Quantity</label>
                                    <input type="number" name="quantity" class="form-control" id="exampleInputEmail1" placeholder="Enter quantity">
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Price</label>
                                    <input type="text" name="price" class="form-control" id="exampleInputEmail1" placeholder="Enter price">
                                </div>

                                <div class="text-center">
                                    <button type="submit" class="btn btn-success mt-4">Save</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
