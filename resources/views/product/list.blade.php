@extends('layouts.app')
@section('content')
<script src="{{asset('https://code.jquery.com/jquery-3.5.1.js')}}" defer></script>
<script src="{{asset('https://cdn.datatables.net/1.10.24/js/jquery.dataTables.min.js')}}" defer></script>
<script src="{{asset('https://cdn.datatables.net/1.10.24/js/dataTables.bootstrap.min.js')}}" defer></script>
<link href="{{asset('https://cdn.datatables.net/1.10.24/css/dataTables.bootstrap.min.css')}}" rel="stylesheet">
<div class="row">
  <div class="col-sm-1"></div>
    <div class="col-sm-10">@if(\Session::has('success'))
        <div class="alert alert-success">
        {{\Session::get('success')}}
        </div>
    @endif</div>
    <div class="col-sm-1"></div>  
</div>
<div class="row">
<div class="col-sm-1"></div>
<div class="col-sm-2"> <a href="{{url('product/create')}}" class="btn btn-primary mb-2">Add Product</a><br/><br/></div>
<div class="col-sm-7"></div>
<div class="col-sm-1"> <a href="{{url('product/importproduct')}}" class="btn btn-success mb-2">Import Products</a><br/><br/></div>
<div class="col-sm-1"></div>
</div>
<div class="clearfix"></div>
<div class="row">
<div class="col-sm-1"></div>
<div class="col-sm-10">
<table id='empTable' width='100%' border="1" style='border-collapse: collapse;'>
      <thead>
        <tr>
          <th>Item Id</th>
    			<th>Product Title</th>
    			<th>Product Size</th>
    			<th>Product Image</th>
    			<th>Price</th>
    			<th>Created at</th>
    			<th>Action</th>
        </tr>
      </thead>
    </table>

    <!-- Script -->
    <script type="text/javascript">
    $(document).ready(function(){

      // DataTable
      $('#empTable').DataTable({
        "order": [[ 0, "desc" ]],
         processing: true,
         serverSide: true,
         ajax: "{{route('product.getProducts')}}",
         columns: [
            { data: 'product_id' },
            { data: 'product_name' },
            { data: 'size' },
            { data: 'image' },
            { data: 'price' },
            { data: 'created_date' },
            { data: 'action' },
         ]
      });
    });
    </script>
</div>
<div class="col-sm-1"></div> 
</div>
@endsection  
