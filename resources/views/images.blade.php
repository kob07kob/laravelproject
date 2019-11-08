<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Create a new Image</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
        <!-- Styles -->
        
		<link href="{{ asset('css/bootstrap.min.css') }}" rel="stylesheet">
		<link href="{{ asset('css/own.css') }}" rel="stylesheet">
        
    </head>
    <body>
        <div id="wrapper">        
        	<div id="page" class="container">          
                <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">       
            		<h1 class="navbar-brand">Galery</h1>  
            		<div class="container">                    
                    	<div class="collapse navbar-collapse" id="navbarSupportedContent">
                  			<!-- Left Side Of Navbar -->
                    		<ul class="navbar-nav mr-auto">
								 <li class="nav-item">
                                	<a class="nav-link" href="/images/create">Create new image</a>
                            	</li>
								 <li class="nav-item">
                                	<a class="nav-link" href="/logout">Log out</a>
                            	</li>
                    		</ul>
                         </div>
            		</div>
        		</nav>
                
  				<div class="row col-md-12">         
                 	@foreach ($imgs as $image)    
                    	<div class="col-md-4 margintop">
                         	<img class="col-md-12" src="{{url('uploads/'.$image->filename)}}" alt="{{$image->filename}}">
                            <p class="col-md-12 text-justify" >{{$image->description}}</p>
                            <a class="btn btn-secondary" href="/images/{{$image->id}}/edit">Edit</a>
                            <a class="btn btn-danger" href="/images/delete/{{$image->id}}">Delete</a>
                         </div>
                     @endforeach         
  				</div>                     
                     <div class="margintop row">
                     	{{ $imgs->links() }}     
  					</div>           
             </div>
        </div>
        
    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="{{ asset('js/bootstrap.min.js') }}"></script>
    </body>
</html>
