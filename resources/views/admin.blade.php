@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-10">
                <div class="card">
                    <div class="card-header">
                        Manage Product

                        <a href="#" class="btn btn-sm btn-primary float-right " data-toggle="modal" data-target="#add-warranty-product">
                            <i class="fas fa-plus"></i> Add Product
                        </a>
                        <a href="{{url('/')}}" class="float-right mr-3" title="Refresh">
                            <i class="fas fa-spinner"></i>
                        </a>
                    </div>

                    <div class="card-body">

                        <table class="table table-bordered text-center table-responsive-md">
                            <thead>
                            <tr>
                                <th scope="col">Id</th>
                                <th scope="col">Product Name</th>
                                <th scope="col">Code</th>
                                <th scope="col">Warranty Start</th>
                                <th scope="col">Warranty End</th>
                                <th scope="col">Action</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($warrantyProducts as $warrantyProduct)
                            <tr>
                                <th scope="row">{{$warrantyProduct->id}}</th>
                                <td>{{$warrantyProduct->product->product_name}}</td>
                                <td>{{$warrantyProduct->alphabetic_code}}</td>
                                <td>{{$warrantyProduct->warranty_start_date}}</td>
                                <td>{{$warrantyProduct->warranty_end_date}}</td>
                                <td>
                                    <a href="#" class="btn btn-sm btn-success" data-toggle="tooltip" data-placement="top" title="Edit"><i class="fa fa-edit"></i></a>
                                    <a href="#" class="btn btn-sm btn-danger" data-toggle="tooltip" data-placement="top" title="Delete"><i class="fa fa-trash"></i></a>
                                </td>
                            </tr>
                            @endforeach
                            </tbody>
                        </table>
                        {{$warrantyProducts->links()}}
                    </div>


                    <!-- Modal -->
                    <add_warranty_product_modal></add_warranty_product_modal>
                </div>
            </div>
        </div>

    </div>
@endsection
