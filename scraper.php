<?php
// lazy
ini_set('display_errors', 0);
// @todo infinite scrape - go into threads, go onto next page
// get site
$site = file_get_contents("http://boards.4chan.org/wg/");
// match all images
$regex = "/\/\/i.4cdn.org\/wg\/[\d]+\.(png|gif|jpg|jpeg|bmp)/i"; 
preg_match_all($regex,$site,$links); 

// unique links
$imagelinks = array_unique($links[0]);

foreach ( $imagelinks as $img )
{
	// get URL
	$url = str_replace( '//', 'http://', $img );
	// get filename
	$urlparts = explode('/', $url);
	// save filename
	$imagename = $urlparts['4'];
	// directory and filename to save
	$image = '/Applications/MAMP/htdocs/imggrab/public/images/' . $imagename;
	// @todo - here check for dupes with mysql query
	// save the actual image
	file_put_contents($image, file_get_contents($url));
	// stop dupes
	// @todo - here insert into db with date, time and filename
	// print output to script
	print $imagename . " saved on " . date('Y-m-d') . "\r\n";
}

/**

        $links = collect($links)
         ->unique()
         ->each(function ($img) {
             $url = str_replace( '//', 'http://', $img );
             $urlparts = explode('/', $url);
             $imagename = $urlparts['4'];

             $image = '/Applications/MAMP/htdocs/imggrab/public/images/' . $imagename;
             file_put_contents($image, file_get_contents($url));

             print $imagename . " saved on " . date('Y-m-d') . "\r\n";
         });
**/