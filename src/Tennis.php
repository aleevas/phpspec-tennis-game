<?php

namespace Acme;

class Tennis
{
        /**
     * Player one for the game.
     *
     * @var Player
     */
    private $player1;
    /**
     * Player two for the game.
     *
     * @var Player
     */
    private $player2;

    /**
     * Points to score lookup table.
     *
     * @var array
     */
    private $lookup = [
        0 => 'Love',
        1 => 'Fifteen',
        2 => 'Thirty',
        3 => 'Forty'
    ];

        /**
     * Create a new Tennis instance.
     *
     * @param Player $player1
     * @param Player $player2
     */
    public function __construct(Player $player1, Player $player2)
    {
        $this->player2 = $player2;
        $this->player1 = $player1;
    }

    public function score()
    {
        if ($this->hasWinner()) {
            return "Win for " . $this->winner()->name;
        }

        $score = $this->lookup[$this->player1->points] . '-';
        $score .= $this->tied() 
                    ? 'All' 
                    : $this->lookup[$this->player2->points];

        return $score;
    }

    private function tied()
    {
        return ($this->player1->points == $this->player2->points);
    }

    private function winner() 
    {
        return $this->player1->points > $this->player2->points
                ? $this->player1
                : $this->player2;
    }

    private function hasWinner()
    {
        return $this->enoughPointsToBeWon() && $this->startingByTwo();

    }

    private function enoughPointsToBeWon()
    {
        return (max([$this->player1->points, $this->player2->points]) >= 4);
    }

    private function startingByTwo()
    {
        return (abs($this->player1->points - $this->player2->points) >= 2);
    }
}
