<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<title>@yield('title')</title>

		<!-- Bootstrap CSS -->
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">
		<link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.6.3/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-T8Gy5hrqNKT+hzMclPo118YTQO6cYprQmhrYwIiQ/3axmI1hQomh7Ud2hPOy8SP1" crossorigin="anonymous">
		<link rel="stylesheet" href="{{ asset('css/style.css') }}" type="text/css">
		<!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
		<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
		<!--[if lt IE 9]>
			<script src="https://oss.maxcdn.com/libs/html5shiv/3.7.2/html5shiv.min.js"></script>
			<script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
		<![endif]-->
	</head>
	<body>

		@yield('content')

		<div class="modal fade" id="welcome">
			<div class="modal-dialog">
				<div class="modal-content">
					<div class="modal-header">
						<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
						<h4 class="modal-title">Welcome to ImgGrab!</h4>
					</div>
					<div class="modal-body">
						<p class="lead">ImgGrab is a wallpaper sharing site! We get our images from 4chan's /wg/ board (using their API), which is a wallpapers general board. As such, the images you see here may be entirely random!</p>
						<p>To view a bigger image, click the image and you will be taken to the top of the page where the featured image is.</p>
						<p>To download the image, either right click the image and "save as", or simply click the large image and you'll be taken to the full version</p>
						<p>Want to update the images we have? Visit /update to put more on the site. Fair warning, this function will be removed if it is abused.</p>
						<p>The next and previous arrows will take you to the next set of images. You can also scroll down and see the pages there.</p>
						<p>Enjoy!</p>
						<small>PS, we use cookies so you don't see this every time you load the page. Okay? Cool.</small>
					</div>
					<div class="modal-footer">
						<button type="button" class="btn btn-success btn-block" data-dismiss="modal">Okay, got it. Never show me this again.</button>
					</div>
				</div>
			</div>
		</div>
		
		<!-- jQuery -->
		<script src="//code.jquery.com/jquery.js"></script>
		<!-- Bootstrap JavaScript -->
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js" integrity="sha384-0mSbJDEHialfmuBBQP6A4Qrprq5OVfW37PRR3j5ELqxss1yVqOtnepnHVP9aJ7xS" crossorigin="anonymous"></script>
		<script src="https://unpkg.com/isotope-layout@3.0/dist/isotope.pkgd.min.js"></script>
		<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery-cookie/1.4.1/jquery.cookie.min.js"></script>

		<script src="{{ asset('js/scripts.js') }}"></script>
	</body>
</html>