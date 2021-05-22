@extends('layouts.app')
@section('content')

      <section class="section-pagetop bg-dark">
        <div class="container clearfix">
            <h2 class="title-page">{{ $product_info->name }}</h2>
        </div>
    </section>
    <section class="section-content bg padding-y border-top" id="site">
        <div class="card">
      <div class="container-fliud">
        <div class="wrapper row">
          <div class="preview col-md-6">
            
            <div class="preview-pic tab-content" style="text-align: center;">
              <div class="tab-pane active" id="pic-1" >
                @if(file_exists('image/'.$product_info->image))
                <img id="original" src="{{ url('image/'.$product_info->image) }}" height="400" width="500" />
                @else
                <img id="original" src="{{ url('image/no_image.png') }}" height="400" width="500" />
                @endif
              </div>
            </div>
            
          </div>
          <div class="details col-md-6">
            <h3 class="product-title">{{ $product_info->name }}</h3>
            <p class="product-description">{{ $product_info->description }}</p>
            <h4 class="price">current price: <span>${{ $product_info->price }}</span></h4>
            <h5 class="sizes">sizes:
              <span class="size" data-toggle="tooltip" title="small">{{ $product_info->size }}</span>
            <!--  <span class="size" data-toggle="tooltip" title="medium">m</span>
              <span class="size" data-toggle="tooltip" title="large">l</span>
              <span class="size" data-toggle="tooltip" title="xtra large">xl</span>-->
            </h5>
            <h5 class="colors">colors:
              @php  
              $colors =explode(',',$product_info->color);
              @endphp
              @foreach($colors as $key=>$single_color)
                <span class="color {{ $single_color }}"></span>              
              @endforeach
              <span class="color green"></span>
              <span class="color blue"></span>
            </h5>
            <div class="action">
              <a href="{{ url('/products') }}" class="btn btn-success">Back to Products</a>
            </div>
          </div>
        </div>
      </div>
    </div>
    </section>


@endsection  
