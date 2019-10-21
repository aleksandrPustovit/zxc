<?php
/**
 * Created by PhpStorm.
 * User: Sasha
 * Date: 20.10.2019
 * Time: 20:47
 */

namespace App\analyser;


class Analyser
{

    private $inputString;

    public function __construct($rt)
    {
        $this->inputString = $rt;
    }

    function getCollection(){
        $elements = $this->createTree();
        $deck = collect();

        while(true){
            if($elements->nextElement){

                $deck->push( [
                    "symbol" => $elements->getSymbol(),
                    "amount" => $elements->getAmount(),
                    "before" =>  $elements->getBefore(),
                    "after" =>  $elements->getAfter(),
                    "maxDistance" =>  $elements->getMaxDistance(),
                ]);
                $elements = $elements->nextElement;
            }else{

                $deck->push( [
                    "symbol" => $elements->getSymbol(),
                    "amount" => $elements->getAmount(),
                    "before" =>  $elements->getBefore(),
                    "after" =>  $elements->getAfter(),
                    "maxDistance" =>  $elements->getMaxDistance(),
                ]);

                break;
            }
        }

        return $deck;
    }

    function createTree()
    {
        $arr = str_split($this->inputString);
        $countByRepeatly = array_count_values($arr);
        $node = NULL;
        $nextElement = null;

        foreach ($countByRepeatly as $symbol => $weight) {

            $beforeCharacters = $this->getBeforeSymbols($symbol);
            $afterCharacters = $this->getAfterSymbols($symbol);
            $maxDistance = $this->getMaxDistance($symbol);

            if (! $node) {
                $node = new LetterNode($symbol,$weight, $beforeCharacters, $afterCharacters, $maxDistance);
                $nextElement = &$node->nextElement;
            } else {
                $nextElement = new LetterNode($symbol,$weight, $beforeCharacters, $afterCharacters, $maxDistance);
                $nextElement = &$nextElement->nextElement;
            }
        }

        return $node;
    }

    function getBeforeSymbols($sym)
    {
        $beforeSymbols = [];
        $arr = str_split($this->inputString);
        for ($i = 0; $i < count($arr); $i ++) {
            $curr = $arr[$i];
            if ($curr == $sym) {
                if (isset($arr[$i + 1])) {
                    $beforeSymbols[] = $arr[$i + 1];
                }
            }
        }

        return implode(",", $beforeSymbols);
    }

    function getAfterSymbols($sym)
    {
        $beforeSymbols = [];
        $arr = str_split($this->inputString);
        for ($i = 0; $i < count($arr); $i ++) {
            $curr = $arr[$i];
            if ($curr == $sym) {
                if (isset($arr[$i - 1])) {
                    $beforeSymbols[] = $arr[$i - 1];
                }
            }
        }

        return implode(",", $beforeSymbols);
    }

    function getMaxDistance($sym)
    {
        $first = strpos($this->inputString, $sym);
        $last = strrpos($this->inputString, $sym);
        $dist = $last - $first;

        return $dist > 0 ? $dist - 1 : 0 ;
    }

}