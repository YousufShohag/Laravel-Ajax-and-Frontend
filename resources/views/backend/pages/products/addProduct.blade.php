@extends('backend/template/template')

@section('content')
<h1 class="mt-4">Dashboard</h1>
<ol class="breadcrumb mb-1">
    <li class="breadcrumb-item active">Dashboard</li>
</ol>


<div class="container">
    <div class="row">
        <div class="col-md-6 offset-md-3">
            <form id="save" action="{{route('product.store')}}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="form-group">
                    <div class="msg">

                    </div>
                    <input type="text" name="name" class="mt-3 name form-control" placeholder="Enter Product Name" >
                    <span class="error_name" style="color: red;"></span>
                    <input type="text" name="category_name" class="mt-3 category_name form-control" placeholder="Enter Product Category" >
                    <span class="error_category_name" style="color: red;"></span>
                    <input type="text" name="brnad_name" class="mt-3 brnad_name form-control" placeholder="Enter Product Brand Name" >
                    <span class="error_brnad_name" style="color: red;"></span>
                    <textarea name="description" class="mt-3 description form-control" id="description" cols="20" rows="5">Product Description  Here</textarea>
                    <span class="error_description" style="color: red;"></span>
                    <input type="file" name="image" class="mt-3 image form-control">
                    <span class="error_image" style="color: red;"></span>
                    <select name="status" id="" class="mt-3 status form-control">
                        <option value="0">Select Status</option>
                        <option value="1">Active</option>
                        <option value="2">Inactive</option>
                    </select>
                    <span class="error_status" style="color: red;"></span>
                    <button class="mt-3 btn btn-primary form-control">Save</button>
                    
                </div>
            </form>
            <a href="{{route('product.manage')}}" class="btn btn-info mt-3 btn btn-primary form-control">Manage Products</a>
        </div>
    </div>
</div>


@endsection