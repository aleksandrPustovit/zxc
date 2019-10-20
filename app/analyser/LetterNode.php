<?php
/**
 * Created by PhpStorm.
 * User: Sasha
 * Date: 20.10.2019
 * Time: 20:48
 */

namespace App\analyser;


class LetterNode
{

    private $symbol;

    private $amount;

    private $before;

    private $after;

    private $maxDistance;

    public $nextElement;

    /**
     *
     * @return mixed
     */
    public function getSymbol()
    {
        return $this->symbol;
    }

    /**
     *
     * @return mixed
     */
    public function getBefore()
    {
        return $this->before;
    }

    /**
     *
     * @return mixed
     */
    public function getAfter()
    {
        return $this->after;
    }

    /**
     *
     * @return number
     */
    public function getMaxDistance()
    {
        return $this->maxDistance;
    }

    /**
     *
     * @param mixed $symbol
     */
    public function setSymbol($symbol)
    {
        $this->symbol = $symbol;
    }

    /**
     *
     * @param mixed $before
     */
    public function setBefore($before)
    {
        $this->before = $before;
    }

    /**
     *
     * @param mixed $after
     */
    public function setAfter($after)
    {
        $this->after = $after;
    }

    /**
     *
     * @param number $maxDistance
     */
    public function setMaxDistance($maxDistance)
    {
        $this->maxDistance = $maxDistance;
    }

    /**
     * @return mixed
     */
    public function getAmount()
    {
        return $this->amount;
    }

    /**
     * @param mixed $amount
     */
    public function setAmount($amount)
    {
        $this->amount = $amount;
    }

    public function __construct($symbol, $amount, $beforeCharacters, $afterCharacters, $maxDistance = 0)
    {
        $this->symbol = $symbol;
        $this->amount = $amount;
        $this->before = $beforeCharacters;
        $this->after = $afterCharacters;
        $this->maxDistance = $maxDistance;
    }

    public function addNode(LetterNode $node)
    {
        $this->nextElement = $node;
    }

}