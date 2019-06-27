@extends('layouts.app')
@section('title','customer show')

@push('css')
@endpush

@section('content')
    <div class="content-page">
        <!-- Start content -->
        <div class="content">



            <div class="wraper container-fluid">
                <div class="row">
                    <div class="col-sm-12">
                        <div class="bg-picture text-center" style="background-image:url('{{asset('public/admin/images/big/bg.jpg')}}')">
                            <div class="bg-picture-overlay"></div>
                            <div class="profile-info-name">
                                <img src="{{ URL::to($show->photo) }}" class="thumb-lg img-circle img-thumbnail" alt="profile-image">

                                <h3 class="text-white">{{$show->name}}</h3>
                            </div>
                        </div>
                        <!--/ meta -->
                    </div>
                </div>

                <div class="row">
                    <div class="col-lg-12">

                        <div class="tab-content profile-tab-content">
                            <div class="tab-pane active" id="home-2">
                                <div class="row">



                                    <div class="col-md-12">
                                        <!-- Personal-Information -->
                                        <div class="panel panel-default panel-fill">
                                            <a href="{{route('customer.index')}}"><button  class="btn btn-purple waves-effect waves-light">Back</button></a>

                                            <div class="panel-heading">
                                                <h3 class="panel-title">Customer Biography</h3>
                                            </div>
                                            <div class="panel-body">
                                                <table id="datatable" class="table table-striped table-bordered">
                                                    <thead>
                                                    <tr>

                                                        <th>Phone</th>
                                                        <th>Email</th>
                                                        <th>Address</th>
                                                        <th>City</th>
                                                    </tr>
                                                    </thead>


                                                    <tbody>

                                                    <tr>

                                                        <td>{{$show->phone}}</td>
                                                        <td>{{$show->email}}</td>
                                                        <td>{{$show->address}}</td>
                                                        <td>{{$show->city}}</td>
                                                    </tr>
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>


                                    </div>

                                </div>
                            </div>



                        </div>
                    </div>
                </div>
            </div> <!-- container -->

        </div> <!-- content -->

        {{--        <footer class="footer text-right">--}}
        {{--            2018 © Moltran.--}}
        {{--        </footer>--}}

    </div>

@endsection

@push('js')
@endpush
