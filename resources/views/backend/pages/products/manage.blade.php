@extends('backend/template/template')

@section('content')
    
<h1 class="mt-4">Dashboard</h1>
        <ol class="breadcrumb mb-4">
            <li class="breadcrumb-item active">Dashboard</li>
        </ol>

<div class="container">
  <div class="row">
    <div class="col-md-6 mt-3 mb-3">
      <a href="{{route('product.add')}}" class="btn btn-primary">Add New Product</a>
    </div>
  </div>
</div>

        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <table class="table" style="text-transform: capitalize;">
                        <thead>
                            <tr>
                                <th>#SL No</th>
                                <th>Product Name</th>
                                <th>Product Category</th>
                                <th>Product Brand</th>
                                <th>Product Description</th>
                                <th>Image</th>
                                <th>Status</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody class="allData">
                            
                        </tbody>
                    </table>
                </div>
            </div>
        </div>




  
  <!-- Modal for update-->
  <div class="modal fade" id="update" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Confirmation Message</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
            <form id="updateForm" action="" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="form-group">
                    <input type="text" name="name" class="mt-3 name form-control" placeholder="Enter Product Name" >
                  
                    <input type="text" name="category_name" class="mt-3 category_name form-control" placeholder="Enter Product Category" >
                
                    <input type="text" name="brnad_name" class="mt-3 brnad_name form-control" placeholder="Enter Product Brand Name" >
                   
                    <textarea name="description" class="mt-3 description form-control" id="description" cols="20" rows="5">Product Description  Here</textarea>
          
                    <div id="img" class="mt-2">
                        
                    </div>

                    <input type="file" name="image" class="mt-3 image form-control">
                
                    <select name="status" id="" class="mt-3 status form-control">
                        <option value="0">Select Status</option>
                        <option value="1">Active</option>
                        <option value="2">Inactive</option>
                    </select>
              
                    
                    
                </div>
            
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          <button class="update  btn btn-primary ">Update</button>
        </div>
    </form>
      </div>
    </div>
  </div>


@endsection