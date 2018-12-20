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

    public function score() {
        if ($this->player1->points == 1 && $this->player2->points == 0 ) {
            return 'Fifteen-Love';
        }
        return 'Love-All';
    }
}
