<?php

namespace App\Http\Controllers;

use App\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function index(Post $post)
    {
        $xml = "http://radiko.jp/v3/program/today/JP13.xml";
        $xmlData = simplexml_load_file($xml);//xmlを読み込む
        return view('posts/index')->with(['posts' => $post->get(), 'radios' => $xmlData]);
    }
    
    public function show($station_name, Post $post)
    {
        $xml = "http://radiko.jp/v3/program/today/JP13.xml";
        $xmlData = (array)simplexml_load_file($xml);//xmlを読み込む
        $station = array_filter(( (array)$xmlData["stations"])["station"], function($station) use($station_name){ 
            return ((array)$station)["name"] == $station_name;
        });
        //dd(array_values($station)[0]);
        return view('posts/show')->with(['posts' => $post->get(), "station_name" => $station_name, 'radios' => array_values($station)[0]]);  
    }
    
    public function showProgram($station_name, $title, Post $post)
    {
        $xml = "http://radiko.jp/v3/program/today/JP13.xml";
        $xmlData = (array)simplexml_load_file($xml);//xmlを読み込む
        //  $info = array_filter(( (array)$xmlData["stations"])["prog"], function($info) use($id){
        //     return ((array)$info)["info"] == $id;
        // });
        $station = array_filter(( (array)$xmlData["stations"])["station"], function($station) use($station_name){ 
            return ((array)$station)["name"] == $station_name;
        });
        $radios = array_values($station)[0];
        $program_data = [];
        foreach ($radios->progs->prog as $program){
            if($program->title == $title ){
                $program_data = $program;
            }
        }
        return view('posts/showProgram', compact("program_data", "station_name"))->with(['posts' => $post->get()]);
    }
}
