<?php
namespace App\card;

use Illuminate\Support\Collection;
/**
 * Created by PhpStorm.
 * User: Sasha
 * Date: 20.10.2019
 * Time: 16:50
 */
class cardGame
{

    public function makeDeck(){
        $suits = array('Clubs', 'Diamonds', 'Hearts', 'Spades');
        $cards = array('Ace', 2, 3, 4, 5, 6, 7, 8, 9, 10, 'Jack', 'Queen', 'King');
        $deck = collect();
        foreach($suits as $suit){
            foreach ($cards as $card) {
                    $deck->push( $suit ."_".$card);
            }
        }
        return $deck;
    }

    public static function chanceOfgettingOneCard( $totalAmounth){

        return number_format((float) 100/$totalAmounth, 2, '.', '');

    }

}