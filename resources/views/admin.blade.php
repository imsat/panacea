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
                                <th scope="col">Start Date</th>
                                <th scope="col">End Date</th>
                                <th scope="col">Action</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($warrantyProducts as $warrantyProduct)
                            <tr>
                                <th scope="row">{{$warrantyProduct->id}}</th>
                                <td>{{$warrantyProduct->product->product_name}}</td>
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
                    </div>


                    <!-- Modal -->
                    <add_warranty_product_modal></add_warranty_product_modal>
                    {{--<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog"--}}
                         {{--aria-labelledby="exampleModalLabel" aria-hidden="true">--}}
                        {{--<div class="modal-dialog" role="document">--}}
                            {{--<div class="modal-content">--}}
                                {{--<div class="modal-header">--}}
                                    {{--<h5 class="modal-title" id="exampleModalLabel">Modal title</h5>--}}
                                    {{--<button type="button" class="close" data-dismiss="modal" aria-label="Close">--}}
                                        {{--<span aria-hidden="true">&times;</span>--}}
                                    {{--</button>--}}
                                {{--</div>--}}
                                {{--<div class="modal-body">--}}
                                    {{--<div class="container-fluid">--}}
                                        {{--<div class="row">--}}
                                            {{--<div class="col-12">--}}
                                                {{--<form>--}}
                                                    {{--<div class="form-group">--}}
                                                        {{--<label for="exampleFormControlSelect1">Select Category</label>--}}
                                                        {{--<select class="form-control" id="exampleFormControlSelect1">--}}
                                                            {{--@foreach($categories as $category)--}}
                                                                {{--<option><a href="{{route('category.products', $category->id)}}">{{$category->category_name}}</a></option>--}}
                                                            {{--@endforeach--}}
                                                        {{--</select>--}}
                                                    {{--</div>--}}
                                                    {{--<div class="form-group">--}}
                                                        {{--<label for="exampleFormControlSelect2">Example multiple select</label>--}}
                                                        {{--<select multiple class="form-control" id="exampleFormControlSelect2">--}}
                                                            {{--<option>1</option>--}}
                                                            {{--<option>2</option>--}}
                                                            {{--<option>3</option>--}}
                                                            {{--<option>4</option>--}}
                                                            {{--<option>5</option>--}}
                                                        {{--</select>--}}
                                                    {{--</div>--}}
                                                    {{--<div class="form-group">--}}
                                                        {{--<label for="exampleFormControlTextarea1">Example textarea</label>--}}
                                                        {{--<textarea class="form-control" id="exampleFormControlTextarea1" rows="3"></textarea>--}}
                                                    {{--</div>--}}
                                                {{--</form>--}}

                                            {{--</div>--}}
                                        {{--</div>--}}
                                    {{--</div>--}}
                                {{--</div>--}}
                                {{--<div class="modal-footer">--}}
                                    {{--<button type="button" class="btn btn-sm btn-secondary" data-dismiss="modal">Close--}}
                                    {{--</button>--}}
                                    {{--<button type="button" class="btn btn-sm btn-primary">Save changes</button>--}}
                                {{--</div>--}}
                            {{--</div>--}}
                        {{--</div>--}}
                    {{--</div>--}}
                </div>
            </div>
        </div>

    </div>
@endsection
