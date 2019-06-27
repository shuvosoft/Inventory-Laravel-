@extends('layouts.app')
@section('title','')

@push('css')
@endpush

@section('content')
    <div class="content-page">
        <div class="content">
            <div class="container">
                <!-- Page-Title -->
                <div class="row">
                    <div class="col-sm-12 bg-info">
                        <h4 class="pull-left page-title text-white">POS (Point of Sale) </h4>
                        <ol class="breadcrumb pull-right">
                            <li><a href="#" class="text-white">Echovel</a></li>
                            <li class="text-white"></li>
                        </ol>
                    </div>
                </div>
                <br>
                <div class="row">
                    <div class="col-lg-12 col-md-12 col-sm-12 ">
                        <div class="portfolioFilter">
                            @foreach($categories as $row)
                                <a href="#" data-filter="*" class="current">{{ $row->cat_name }}</a>
                            @endforeach
                        </div>
                    </div><br><br><br>
                    <div class="row">
                    <div class="col-lg-6">
                        <div class="price_card text-center">
                            <ul class="price-features" style="border:1px solid grey;">
                                <table class="table">
                                    <thead class="bg-info">
                                    <tr>
                                        <th class="text-white">Name</th>
                                        <th class="text-white">Qty</th>
                                        <th class="text-white">single price</th>
                                        <th class="text-white">Sub Total</th>
                                        <th class="text-white">Action</th>
                                    </tr>
                                    </thead>

                                    <tbody>
                                    @php
                                       $cart_product = Cart::content();
                                    @endphp
                                    @foreach($cart_product as $row)
                                        <tr>

                                            <th>{{$row->name}}</th>
                                            <th>
                                                <form action="{{ url('/cart-update/'.$row->rowId) }}" method="post">
                                                    @csrf
                                                    <input type="number" name="qty" value="{{$row->qty}}" style="width:40px;" >
                                                    <button type="submit" class="btn btn-sm btn-success " style="margin-top: -2px;"><i class="fas fa-check"></i></button>
                                                </form>
                                            </th>
                                            <th>{{$row->price}}</th>
                                            <th>{{$row->price*$row->qty}}</th>
                                            <th><a href="{{ URL::to('/cart-remove/'.$row->rowId) }}" class="text-danegr"> <i class="fas fa-trash-alt text-danegr"></i> </a></th>
                                        </tr>
                                        @endforeach

                                    </tbody>
                                </table>

                            </ul>
                            <div class="pricing-footer bg-primary">
                                <p style="font-size: 19px;"> Quantity: {{ Cart::count() }}</p>
                                <p style="font-size: 19px;"> Sub Total: {{ Cart::subtotal() }}</p>
                                <p style="font-size: 19px;"> vat: {{ Cart::tax() }}</p>
                                <hr>
                                <p><h2 class="text-white">Total: </h2> <h1 class="text-white">{{ Cart::total() }}</h1></p>


                                <form method="post" action="{{ url('/invoice') }}">
                                    @csrf
                                    <div class="panel"><br><br>

                                        <h4 class="text-info">Select Customer
                                            <a href="#" class="btn btn-sm btn-primary waves-effect waves-light pull-right" data-toggle="modal" data-target="#con-close-modal">Add New</a>
                                        </h4>
                                        @php
                                            $customer=DB::table('customers')->get();
                                        @endphp
                                        <select class="form-control" name="cus_id">
                                            <option disabled="" selected="" >select customer</option>
                                            @foreach($customer as $cus)
                                                <option value="{{ $cus->id }}" required="" >{{ $cus->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                            </div>
                            <button type="submit" class="btn btn-success"> Create Invoice</button>
                        </div>
                        </form>
                    </div>
                    <div class="col-lg-6">
                        <table id="datatable" class="table table-striped table-bordered">
                            <thead>
                            <tr>
                                <th>Image</th>
                                <th>Name</th>
                                <th>Category</th>
                                <th>Product Code</th>
                                <th>Add</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($product as $row)
                                <tr>
                                    <form action="{{ url('/add-cart') }}" method="post">
                                        @csrf
                                        <input type="hidden" name="id" value="{{ $row->id }}">
                                        <input type="hidden" name="name" value=" {{ $row->product_name }}">
                                        <input type="hidden" name="qty" value="1">
                                        <input type="hidden" name="price" value="{{ $row->selling_price }}">
                                        <input type="hidden" name="weight" value="1">
                                        <td>
                                            {{-- <a href="#" style="font-size: 30px;"><i class="fas fa-plus-square"></i></a> --}}
                                            <img src="{{ URL::to($row->product_image) }}" width="60px" height="60px">
                                        </td>
                                        <td>{{ $row->product_name }}</td>
                                        <td>
                                       {{$row->cat_name}}

                                        </td>
                                        <td>{{ $row->product_code }}</td>
                                        <td><button type="submit" class="btn btn-info btn-sm"><i class="fas fa-plus-square"></i></button></td>
                                    </form>
                                </tr>

                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div> <!-- container -->
        </div> <!-- content -->
    </div>


    <!--customer add modal-->
    <form action="{{ route('customer.store')}}" method="POST" enctype="multipart/form-data">
        @csrf
        <div id="con-close-modal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                        <h4 class="modal-title">Add a New Customer</h4>
                    </div>

                    <div class="modal-body">
                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="field-4" class="control-label">Name</label>
                                    <input type="text" class="form-control" id="field-4" name="name" required="">
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="field-5" class="control-label">Email</label>
                                    <input type="email" class="form-control" id="field-5" name="email" required="">
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="field-6" class="control-label">Phone</label>
                                    <input type="text" class="form-control" id="field-6" name="phone" required="">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="field-4" class="control-label">Address</label>
                                    <input type="text" class="form-control" id="field-4" name="address" required="">
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="field-5" class="control-label">Shopname</label>
                                    <input type="text" class="form-control" id="field-5" name="shopname" required="">
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="field-6" class="control-label">City</label>
                                    <input type="text" class="form-control" id="field-6" name="city" required="">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="field-4" class="control-label">Account Number</label>
                                    <input type="text" class="form-control" id="field-4" name="account_number" required="">
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="field-5" class="control-label">Account Holder</label>
                                    <input type="text" class="form-control" id="field-5" name="account_holder" required="">
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="field-6" class="control-label">Bank Name</label>
                                    <input type="text" class="form-control" id="field-6" name="bank_name" required="">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="field-4" class="control-label">Bank Branch</label>
                                    <input type="text" class="form-control" id="field-4" name="bank_branch" required="">
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <img id="image" src="#" />
                                    <label for="exampleInputPassword11">Photo</label>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="field-6" class="control-label">Photo</label>
                                    <input type="file"  name="photo" accept="image/*"  required onchange="readURL(this);">
                                </div>
                            </div>
                        </div>

                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default waves-effect" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-info waves-effect waves-light">Submit</button>
                    </div>
                </div>
            </div>
        </div><!-- /.modal -->
    </form>





@endsection

@push('js')
            <script type="text/javascript">
                function readURL(input) {
                    if (input.files && input.files[0]) {
                        var reader = new FileReader();
                        reader.onload = function (e) {
                            $('#image')
                                .attr('src', e.target.result)
                                .width(80)
                                .height(80);
                        };
                        reader.readAsDataURL(input.files[0]);
                    }
                }
            </script>

@endpush
