<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\analyser\Analyser;

class analyserController extends Controller
{
    public function index(){

        return view('analyser.index', []
        );

    }

    public function analyse(Request $request){

        $rt = new Analyser($request->inputString);
        $collection = $rt->getCollection();
//        print_r( $collection);
        return view('analyser.result', [
                "result" =>$collection
            ]
        );


    }
}
