<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>
    <!-- Scripts -->
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>  
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>  
    <script src="https://cdn.jsdelivr.net/jquery.validation/1.16.0/jquery.validate.min.js"></script>
    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet"> 
    <style>

     .navbar-nav>li {
        margin-left: 50px;
     }         
    input[type=checkbox], input[type=radio] {
            margin: -34px 0 0;
            margin-top: 1px\9;
            line-height: normal;
    }
    input[type=radio] {
    margin: -22px 11px 0;
    margin-top: 1px\9;
    line-height: normal;
    height: 15px;
    }
    .error {color:red;}
    .error>option{color:#555 !important;}
    .danger {color:red;}      
  .color {
    display: inline-block;
    vertical-align: middle;
    margin-right: 10px;
    height: 2em;
    width: 2em;
    border-radius: 2px;
}
  .green {
    background: #85ad00;
}
.blue {
    background:blue;
}
.red {
    background: red;
}
.orange{
  background: orange;
}
.tab-content>.active {
    display: block;
    visibility: visible;
}
</style>
</style>
</head>
<body>
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
            <div class="container">
                <a class="navbar-brand" href="{{ url('/') }}">
                    {{ config('app.name', 'Laravel') }}
                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav mr-auto">

                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ml-auto">
                        <!-- Authentication Links -->
                        @guest
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                            </li>
                            @if (Route::has('register'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                                </li>
                            @endif
                        @else
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }}
                                </a>

                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                        @csrf
                                    </form>
                                </div>
                            </li>
                        @endguest
                    </ul>
                </div>
            </div>
        </nav>

        <main class="py-4">
            @yield('content')
        </main>
    </div>
</body>
 <script>
    $(document).ready(function () { //alert();

        //myform_add
  $('#myform_add').validate({ 
        rules: {
            name: {
                required: true
            },
            price: {
                required: true,
            },  
            size: {
                required: true,
            },
            'color[]':{ required:true },
            image: {
                required: true,
            }, 
            'gender[]':{ required:true }
        },
        messages: {      
            name: {
                required: "Please enter product name",
            },
            price: {
                required: "Please enter product price",
            }, 
            size: {
                required: "Please select product size",
            }, 
            'color[]': {
                required: "Please select product color",
            }, 
            image: {
                required: "Please upload product image",
            },
            'gender[]': {
                required: "Please select gender",
            }                 
        },
          errorElement: 'span',       
    });      
 $('#myform_edit').validate({ 
        rules: {
            name: {
                required: true
            },
            price: {
                required: true,
            },  
            size: {
                required: true,
            }, 
            'gender[]':{ required:true }
        },
        messages: {      
            name: {
                required: "Please enter product name",
            },
            price: {
                required: "Please enter product price",
            }, 
            size: {
                required: "Please select product size",
            },
            'gender[]': {
                required: "Please select gender",
            }                 
        },
          errorElement: 'span',        
    });

    $(".allow_numeric").on("input", function(evt) {
        var self = $(this);
        self.val(self.val().replace(/[^0-9\.]/g, ''));
        if ((evt.which != 46 || self.val().indexOf('.') != -1) && (evt.which < 48 || evt.which > 57)) 
        {
            evt.preventDefault();
        }
    });
    $('#image').bind('change', function() {
        var file = document.querySelector("#image");
        if ( /\.(jpe?g|png|gif)$/i.test(file.files[0].name) === false ) { alert("Only jpg,png or gif image is allowed."); }           
        var maxsize = '5';
        var currentszie = this.files[0].size/1024/1024;
        if(currentszie > maxsize){
            alert('Max file size 5 mb allowed.');
            return false;
        }            
    });
});
</script> 
</html>
