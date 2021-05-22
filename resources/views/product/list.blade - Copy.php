@extends('layouts.app')
@section('content')
@if(\Session::has('success'))
        <div class="alert alert-success">
        {{\Session::get('success')}}
        </div>
    @endif
<br>
    <a href="{{url('product/create')}}" class="btn btn-success mb-2">Add</a>
<br/><br/>
<div class="row">
<div class="col-12">
<table class="table table-bordered" id="laravel_crud">
<thead>
<tr>
<th>ProductId</th>
<th>Product Title</th>
<th>Product Size</th>
<th>Product Image</th>
<th>Price</th>
<th>Created at</th>
<th colspan="2" align="center">Action</th>
</tr>
</thead>
<tbody>
@foreach($products as $product)
<tr>
<td>{{ $product->product_id }}</td>
<td>{{ $product->product_name }}</td>
<td>{{ $product->size }}</td>
<td>
@if(file_exists('image/'.$product->image))
<img id="original" src="{{ url('image/'.$product->image) }}" height="70" width="70" />
@else
<img id="original" src="{{ url('image/no_image.png') }}" height="70" width="70" />
@endif
</td>
<td>{{ $product->price }}</td>

<td>{{ date('Y-m-d', strtotime($product->created_date)) }}</td>
<td><a href="{{url('product/edit')}}/{{$product->product_id}}" class="btn btn-primary">Edit</a></td>
<td><a href="{{url('product/destroy')}}/{{$product->product_id}}" class="btn btn-primary">Delete</a></td>
</tr>
@endforeach
</tbody>
</table>
{!! $products->links() !!}
</div> 
</div>
@endsection  
