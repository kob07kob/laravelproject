<?php

namespace App\Http\Controllers;
use App\Image;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;

class ImageController
{
	
	public function index(){
		return view('images', ['imgs' => Image::paginate(9)]);
	}
	
	public function show(){
		 return view('create');
	}
	public function create(){
		 return view('create');
	}
	public function store(){
		request()->validate([
        	'image' => 'required|image|mimes:jpeg,png,jpg|max:2048',
    ]	);
	
		$file = request('image');
		$extension = $file->getClientOriginalExtension();
		Storage::disk('public')->put($file->getFilename().'.'.$extension,  File::get($file));
		
		$img = new Image();
		$img->description = request('description');
		$img->mime = $file->getClientMimeType();
		$img->original_filename = $file->getClientOriginalName();
		$img->filename = $file->getFilename().'.'.$extension;
		$img->save();
		return redirect('/images')->with('success','Image added successfully...');
		//if(request()->hasFile('image')){
			//die('true');
		//} else die('false');
		//return request('image');
	}
	
	public function edit($id){
		$image = Image::find($id);
		return view('edit', ['image' => $image]);
	}
	
	public function update($id){
		request()->validate([
        	'image' => 'image|mimes:jpeg,png,jpg|max:2048',
    ]	);
		$img = Image::find($id);
		$img->description = request('description');
		if( request()->hasFile('image')){
			Storage::disk('public')->delete($img->filename);
			$file = request('image');
			$extension = $file->getClientOriginalExtension();
			Storage::disk('public')->put($file->getFilename().'.'.$extension,  File::get($file));		
			$img->mime = $file->getClientMimeType();
			$img->original_filename = $file->getClientOriginalName();
			$img->filename = $file->getFilename().'.'.$extension;
		}
		$img->save();
		return redirect('/images');
		
	}
	public function destroy($id){
		$img = Image::find($id);
		Storage::disk('public')->delete($img->filename);
		Image::where('id', $id)->delete();
		return redirect('/images');
	}
}
