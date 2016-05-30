@extends('layouts.master')

@section('title')
ImgGrab v3 &mdash; Return of the wallpapers
@stop

@section('content')
	<div class="gallery">
		<div class="placeholder" id="featured">
			<a href="">
				<img src="/images/{{ $featured->image_id }}" class="img-responsive" data-id="{{ $featured->id }}" data-featured="1">
			</a>
			
			<div class="gallery-controls">
				<a href="{{ $images->previousPageUrl() }}"><i class="fa fa-chevron-left fa-4x gallery-pager" id="gallery-prev"></i></a>
				<a href="{{ $images->nextPageUrl() }}"><i class="fa fa-chevron-right fa-4x gallery-pager" id="gallery-next"></i></a>
			</div>
		</div>
		<div class="gallery-images">
			@foreach ($images as $image)
			<div class="image">
				<a href="#featured">
					<img src="/images/{{ $image->image_id }}" class="img-responsive" data-id="{{ $image->id }}">
				</a>
			</div>
			@endforeach
		</div>
	</div>
	<div class="container">
		<div class="col-md-8 col-md-offset-4">
			{{ $images->links() }}
		</div>
	</div>
@stop