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
            	<h1>New Image</h1>
                
                
             <form method="POST" action="/images" enctype="multipart/form-data">
             	@csrf
                 <div class="file-field">
                    <div class="btn btn-primary btn-sm float-left">
                        <span>Choose file</span>
                        <input type="file" name="image" id="image" accept=".jpg, .jpeg, .png" required>
                    </div>
                    <div class="file-path-wrapper">
                        <input class="file-path validate" type="text" placeholder="Upload your file">
                    </div>                    
                    @if($errors->has('image'))
                    <p class="help is-danger"> {{$errors->first('image')}}</p>
                    @endif
                </div>
             	<div class="form-group">
                	<label class="label" for="description">Description</label>
                    <textarea class="form-control" name="description" id="description">{{old('description')}}</textarea>
             	</div>
                <button class="btn btn-primary" type="submit">Submit</button>
             </form>
             </div>
        </div>
        
    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="{{ asset('js/bootstrap.min.js') }}"></script>
    </body>
</html>
