<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use \App\Image;
use Storage;
use Guzzle\Service\Client;
use GuzzleHttp\Client as HttpClient;

class ImageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $featured = Image::orderByRaw('RAND()')->first();
    	$images = Image::orderBy('id', 'DESC')->paginate('30');
        return view('image.index', compact(['images', 'featured']));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function scrape($limit=0)
    {
        $client = new Client('http://a.4cdn.org/');
        $response = $client->get('/wg/1.json')->send();
        $json = $response->json();

        $messages = collect();

        foreach ( $json['threads'] as $thread )
        {
            foreach ( $thread['posts'] as $post )
            {
                if ( $post )
                {
                    if ( isset( $post['tim'] ) )
                    {
                        if ( isset( $post['sticky'] ) )
                        {
                            continue;
                        }

                        if ( $post['tim'] == '1334280800199' )
                        {
                            continue;
                        }

                        $image = [
                            'image_id'  =>  $post['tim'] . $post['ext'],
                            'views'     =>  0,
                            'visible'   =>  1,
                        ];

                        \App\Image::create($image);

                        $img = '//i.4cdn.org/wg/' . $post['tim'] . $post['ext'];
                        $httpclient = new HttpClient();
                        $httpclient->request('GET', $img, ['sink' => public_path() . '/images/' . $image['image_id'] ]);

                        $messages[] = $image['image_id'] . ' saved';
                    }
                }
            }
        }

        return view('image.update', compact('messages'));
    }
}
