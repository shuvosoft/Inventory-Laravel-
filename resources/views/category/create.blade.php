@extends('layouts.app')
@section('title','add category')

@push('css')
@endpush

@section('content')

    <div class="content-page">
        <div class="content">
            <div class="container">

                <!-- Page-Title -->
                <div class="row">
                    <div class="col-sm-12">

                        <a href="{{ route('category.index') }}" class="pull-left btn btn-danger btn-sm">All Category</a>

                        <ol class="breadcrumb pull-right">
                            <li><a href="#">Echobvel</a></li>
                            <li class="active">IT</li>
                        </ol>
                    </div>
                </div>

                <!-- Start Widget -->
                <div class="row">
                    <!-- Basic example -->
                    <div class="col-md-2"></div>
                    <div class="col-md-8 ">
                        <div class="panel panel-info">
                            <div class="panel-heading"><h3 class="panel-title text-white">Category</h3>

                            </div>


                            <div class="panel-body">
                                <form role="form" action="{{route('category.store') }}" method="post">
                                    @csrf
                                    <div class="form-group">
                                        <div class="form-group">
                                            <label for="exampleInputPassword20">Category Name</label>
                                            <input type="text" class="form-control" name="cat_name" placeholder="Category Name" required>
                                        </div>
                                        <button type="submit" class="btn btn-success waves-effect waves-light">Submit</button>
                                </form>
                            </div><!-- panel-body -->
                        </div> <!-- panel -->
                    </div> <!-- col-->

                </div>
            </div> <!-- container -->

        </div> <!-- content -->
    </div>
@endsection

@push('js')
@endpush
