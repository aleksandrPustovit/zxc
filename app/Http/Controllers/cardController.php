<?php
/**
 * Created by PhpStorm.
 * User: Sasha
 * Date: 19.10.2019
 * Time: 17:15
 */

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Http\Request;
use Illuminate\Support\Collection;
use App\card\cardGame;
use Illuminate\Support\Facades\Redirect;


class cardController extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    private $deck;

    public function __construct(){
        $game = new cardGame();
        $this->deck = $game->makeDeck();
    }


    public function index(Request $request)
    {

        if($request->action == "restart"){
            $this->restart($request);
            return Redirect::route("start");
        }

        if($request->session()->has('desired') ){
            return Redirect::route("game");
        }

        if($request->desired) {
            $request->session()->put('desired', $request->desired);
            return Redirect::route("game");
        }



        return view('card.index', [
                "showdeck" => true,
                "deck" =>  $this->deck,
            ]
            );
    }

    function play(Request $request){

        if(!$request->session()->get('desired')){
            return Redirect::route("start");
        }
        $desired = $request->session()->get('desired');
        $win = false;

        $diff = $this->deck->diff($request->session()->get('removed'));

        $random = $diff->random(1);
        $random = $random->pop();

        $cardLeft = $diff->count();

        $chance = CardGame::chanceOfgettingOneCard($cardLeft);


        if($random == $desired){
            $win = true;
            $this->restart($request);
        }else{
            $request->session()->push('removed', $random);
        }

        return view('card.play', [
                "chance" =>  $chance,
                "desired" => $desired,
                "selected" => $random,
                "cardLeft" => $cardLeft,
                "win" =>  $win,
            ]
        );
    }

    function restart(Request $request){
        $request->session()->forget('desired');
        $request->session()->forget('removed');
    }


}