@extends('layouts.app')

@section('content')
<h2 style="margin-top: 12px;" class="text-center">Edit Product</a></h2>
<br>
<div class="row">
	<div class="col-sm-3"></div>
	<div class="col-sm-6">
<form action="{{action('ProductController@update', $product_info->product_id)}}" id="myform_edit" method="POST" name="update_product" enctype="multipart/form-data" >
{{ csrf_field() }}
<div class="row">
<div class="col-md-12">
<div class="form-group">
<strong>Item Id</strong>
<input type="text" name="item_id" id="item_id" class="form-control" readonly value="{{ $product_info->item_id }}">
<span class="text-danger">{{ $errors->first('item_id') }}</span>
</div>
</div>
<div class="col-md-12">
<div class="form-group">
<strong>Product Name</strong><span class="danger">*</span> 
<input type="text" name="name" id="name" class="form-control"  placeholder="Enter Name" value="{{ $product_info->name }}">
<span class="text-danger">{{ $errors->first('name') }}</span>
</div>
</div>
<div class="col-md-12">
<div class="form-group">
<strong>Product Price</strong><span class="danger">*</span> 
<input type="text" name="price" id="price" class="form-control allow_numeric"  placeholder="Enter Product Price" value="{{ $product_info->price }}">
<span class="text-danger">{{ $errors->first('price') }}</span>
</div>
</div>
<div class="col-md-12">
<div class="form-group">
<strong>Description</strong>
<textarea class="form-control" col="4" name="description" id="description" placeholder="Enter Description" >{{ $product_info->description }}</textarea>
<span class="text-danger">{{ $errors->first('description') }}</span>
</div>
</div>
<div class="col-md-12">
<div class="form-group">
<strong>Product Image</strong>
@if($product_info->image)
		@php
		$url = asset('image/'.$product_info->image);
        $noimage_url = asset('image/no_image.png');
        @endphp
        @if(file_exists('image/'.$product_info->image))
        	@php $main_image = "<img id='original' src='$url' height='70' width='70' />"; @endphp
        @else
        	@php $main_image = "<img id='original' src='$noimage_url' height='70' width='70' />"; @endphp
        @endif
        @php echo $main_image; @endphp
@endif
<input type="file" name="image" class="form-control" placeholder="" value="" id="image" >
<span class="text-danger">{{ $errors->first('image') }}</span>
<input type="hidden" name="old_image" class="form-control" placeholder="" value="{{ $product_info->image }}">
</div>
</div>
<div class="col-md-12">
	<div class="form-group">
		<strong>Product Size</strong><span class="danger">*</span> 
		<select class="form-control" name="size" id="size">
			@php $selectedID = $product_info->size ; @endphp
		    <option>Select Size</option>
		    @foreach ($size_array as $key => $value)
		    	@php $style = ''; @endphp	    	
		        <option style="{{ $style }}" value="{{ $value  }}" {{ ( $value == $selectedID) ? 'selected' : '' }}> 
		            {{ $value }} 
		        </option>
		    @endforeach    
		</select>
		<span class="text-danger">{{ $errors->first('size') }}</span>
	</div>	
</div>
<div class="col-md-12">
    <div class="form-group">
        <div class="col-md-2">
             <strong>Gender</strong><span class="danger">*</span>   
        </div> 
        @php $selectedgender = $product_info->gender; @endphp   
        <div class="col-md-3"><label>Man's</label>
        <input type="radio" name="gender[]"  class="form-control" value="Man's" {{ ($selectedgender=="Man's")? "checked" : "" }}>
        </div>
        <div class="col-md-3"><label>Women's</label>
        <input type="radio" name="gender[]"  class="form-control" value="Women's" {{ ($selectedgender=="Women's")? "checked" : "" }}>
        <span class="text-danger">{{ $errors->first('gender') }}</span>
        </div>
    </div>  
</div>
<div class="col-md-12"><br/>
</div>	
<div class="col-md-12">
	<button type="submit" class="btn btn-primary" style="text-align: center;">Submit</button>
</div>
</div>
</form>
</div>
<div class="col-sm-3"></div>
</div>
@endsection
