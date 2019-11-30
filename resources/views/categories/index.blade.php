@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-10">
                <div class="card">
                    <div class="card-header">
                        Manage Categories
                    </div>

                    <div class="card-body">

                        <table class="table table-bordered text-center">
                            <thead>
                            <tr>
                                <th scope="col">No</th>
                                <th scope="col">Category Name</th>
                                <th scope="col">Category Description</th>
                                <th scope="col">Action</th>
                            </tr>
                            </thead>
                            <tbody>
                            @php($i=1)
                            @foreach($categories as $categorie)
                                <tr>
                                    <th scope="row">{{$i}}</th>
                                    <td>{{$categorie->category_name}}</td>
                                    <td>{{$categorie->category_description}}</td>
                                    <td>
                                        <a href="#" class="btn btn-sm btn-success" data-toggle="tooltip" data-placement="top" title="Edit"><i class="fa fa-edit"></i></a>
                                        <a href="#" class="btn btn-sm btn-danger" data-toggle="tooltip" data-placement="top" title="Delete"><i class="fa fa-trash"></i></a>
                                    </td>
                                </tr>
                            @php($i++)
                            @endforeach
                            </tbody>
                        </table>
                        {{$categories->links()}}
                    </div>


                </div>
            </div>
        </div>

    </div>
@endsection
