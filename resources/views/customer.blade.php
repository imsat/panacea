@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Customer</div>
                    <div class="card-body">
                        <form>
                            <div class="form-group">
                                <label for="exampleFormControlFile1">Search your product</label>
                                <input class="form-control form-control-lg" type="text" placeholder="Enter your code...">
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
