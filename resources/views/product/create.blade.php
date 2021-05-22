@extends('layouts.app')

@section('content')
<h2 style="margin-top: 12px;" class="text-center">Add Product</a></h2>
<br>
<div class="row">
	<div class="col-sm-3"></div>
	<div class="col-sm-6">
<form action="{{action('ProductController@store')}}" id="myform_add" method="POST" name="update_product" enctype="multipart/form-data" >
{{ csrf_field() }}
<div class="row">
<div class="col-md-12">
<div class="form-group">
<strong>Product Name</strong><span class="danger">*</span> 
<input type="text" name="name" id="name" class="form-control"  placeholder="Enter Name" value="">
<span class="text-danger">{{ $errors->first('name') }}</span>
</div>
</div>
<div class="col-md-12">
<div class="form-group">
<strong>Product Price</strong><span class="danger">*</span> 
<input type="text" name="price" id="price" class="form-control allow_numeric"  placeholder="Enter Product Price" value="">
<span class="text-danger">{{ $errors->first('price') }}</span>
</div>
</div>
<div class="col-md-12">
<div class="form-group">
<strong>Description</strong>
<textarea class="form-control" col="4" name="description" id="description" placeholder="Enter Description" ></textarea>
<span class="text-danger">{{ $errors->first('description') }}</span>
</div>
</div>
<div class="col-md-12">
<div class="form-group">
<strong>Product Image</strong><span class="danger">*</span>
<input type="file" name="image" class="form-control" placeholder="" value="" id="image" >
<span class="text-danger">{{ $errors->first('image') }}</span>
<input type="hidden" name="old_image" class="form-control" placeholder="" value="">
</div>
</div>
<div class="col-md-12">
	<div class="form-group">
		<strong>Product Size</strong><span class="danger">*</span> 
		<select class="form-control" name="size" id="size">
		    <option>Select Size</option>
		    @foreach ($size_array as $key => $value)
		    	@php $style = ''; @endphp	    	
		        <option style="{{ $style }}" value="{{ $value  }}"> 
		            {{ $value }} 
		        </option>
		    @endforeach    
		</select>
		<span class="text-danger">{{ $errors->first('size') }}</span>
	</div>	
</div>
<div class="col-md-12">
    <div class="form-group">
        <strong>Product colors</strong><span class="danger">*</span> 
        <select class="form-control select-chosen" name="color[]" id="color" multiple="true">
            <option>Select colors</option>
            @foreach ($color_array as $key => $c_value)
                @php $style = ''; @endphp           
                <option style="{{ $style }}" value="{{ $c_value  }}"> 
                    {{ $c_value }} 
                </option>
            @endforeach    
        </select>
        <span class="text-danger">{{ $errors->first('color') }}</span>
    </div>  
</div>
<div class="col-md-12">
    <div class="form-group">
        <div class="col-md-2">
             <strong>Gender</strong><span class="danger">*</span>   
        </div> 
        <div class="col-md-3"><label>Man's</label>
        <input type="radio" name="gender[]"  class="form-control" value="Man's" >
        </div>
        <div class="col-md-3"><label>Women's</label>
        <input type="radio" name="gender[]"  class="form-control" value="Women's" >
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
