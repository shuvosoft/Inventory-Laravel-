@extends('layouts.app')
@section('title','ALL Products')

@push('css')
@endpush

@section('content')
    <div class="content-page">
        <div class="content">
            <div class="container">
                <!-- Page-Title -->
                <div class="row">
                    <div class="col-sm-12">
                        <h4 class="pull-left page-title">Welcome !</h4>
                        <ol class="breadcrumb pull-right">
                            <li><a href="#">Echobvel</a></li>
                            <li class="active">IT</li>
                        </ol>
                    </div>
                </div>

                <!-- Start Widget -->
                <div class="row">
                    <div class="col-md-12">
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                <h3 class="panel-title">All Product</h3>
                                <a href="{{ route('product.create') }}" class="btn btn-sm btn-info pull-right">Add New</a>
                            </div>
                            <div class="panel-body">
                                <div class="row">
                                    <div class="col-md-12 col-sm-12 col-xs-12">
                                        <table id="datatable" class="table table-striped table-bordered">
                                            <thead>
                                            <tr>
                                                <th>Name</th>
                                                <th>Code</th>
                                                <th>Selling Price</th>
                                                <th>Image</th>
                                                <th>Garage</th>
                                                <th>Route</th>
                                                <th>Action</th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                            @foreach($product as $row)
                                                <tr>
                                                    <td>{{ $row->product_name }}</td>
                                                    <td>{{ $row->product_code }}</td>
                                                    <td>{{ $row->selling_price }}</td>
                                                    <td><img src="{{ $row->product_image }}" style="height: 60px; width: 60px;"></td>
                                                    <td>{{ $row->product_garage }}</td>
                                                    <td>{{ $row->product_route }}</td>
                                                    <td>
                                                        <a href="{{route('product.edit',$row->id) }}" class="btn btn-sm btn-info">Edit</a>
                                                        <a href="{{route('product.show',$row->id)}}" class="btn btn-sm btn-primary">View</a>
                                                        <button class="btn btn-danger waves-effect" type="button" onclick="deleteCategory({{ $row->id }})">
                                                            <i class="material-icons">delete</i>
                                                        </button>
                                                        <form id="delete-form-{{ $row->id }}" action="{{ route('product.destroy',$row->id) }}" method="POST" style="display: none;">
                                                            @csrf
                                                            @method('DELETE')
                                                        </form>

                                                    </td>
                                                </tr>
                                            @endforeach
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div> <!-- container -->
        </div> <!-- content -->
    </div>

@endsection

@push('js')
    <script src="https://unpkg.com/sweetalert2@7.19.1/dist/sweetalert2.all.js"></script>
    <script type="text/javascript">
        function deleteCategory(id) {
            swal({
                title: 'Are you sure?',
                text: "You won't be able to revert this!",
                type: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes, delete it!',
                cancelButtonText: 'No, cancel!',
                confirmButtonClass: 'btn btn-success',
                cancelButtonClass: 'btn btn-danger',
                buttonsStyling: false,
                reverseButtons: true
            }).then((result) => {
                if (result.value) {
                    event.preventDefault();
                    document.getElementById('delete-form-'+id).submit();
                } else if (
                    // Read more about handling dismissals
                    result.dismiss === swal.DismissReason.cancel
                ) {
                    swal(
                        'Cancelled',
                        'Your data is safe :)',
                        'error'
                    )
                }
            })
        }
    </script>
@endpush
