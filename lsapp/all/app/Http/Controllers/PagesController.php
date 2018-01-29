<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PagesController extends Controller
{
    //php artisan make:controller PagesController this command is used to make controllers
   
   
    public function index(){
        $title="IndexPage";
        return view('pages.index')->with('title',$title); //send the title to index page method_1
    }
    public function about(){
        $title="AboutPage";
        return view('pages.about',compact('title'));//method_2
    }
    public function services(){
        $data=array('title'=>'Services Offered:-',
                    'services'=>['web design','css','js']                
                   );
        return view('pages.services')->with($data);
    }
}
