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
        
    </head>
    <body>
        <div id="wrapper">        
        	<div id="page" class="container">
            	<h1>Edit Image</h1>
                
                
             <form method="POST" action="/images/{{$image->id}}" enctype="multipart/form-data">
             	@csrf
                @method('PUT')
                 <div class="file-field">
                 	<p>Current image</p>
                 	<img class="col-md-12" src="{{url('uploads/'.$image->filename)}}" alt="{{$image->filename}}">
                    <div class="btn btn-primary btn-sm float-left">
                        <span>Change file</span>
                        <input type="file" name="image" id="image" accept=".jpg, .jpeg, .png">
                    </div>
                    <div class="file-path-wrapper">
                        <input class="file-path validate" type="text" placeholder="Upload your file">
                    </div>
                </div>
             	<div class="form-group">
                	<label class="label" for="description">Description</label>
                    <textarea class="form-control" name="description" id="description" >{{$image->description}}</textarea>
             	</div>
                <button class="btn btn-primary" type="submit">Update</button>
             </form>
             </div>
        </div>
        
    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="{{ asset('js/bootstrap.min.js') }}"></script>
    </body>
</html>
