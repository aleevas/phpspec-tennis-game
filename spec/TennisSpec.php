<?php

namespace spec\Acme;

use Acme\Tennis;
use PhpSpec\ObjectBehavior;
use Prophecy\Argument;
use Acme\Player;

class TennisSpec extends ObjectBehavior
{
    protected $alex;
    protected $poly;

    function let()
    {
        $this->alex = new Player('Alex A', 0);
        $this->poly = new Player('Poly N', 0);
        $this->beConstructedWith($this->alex, $this->poly);
    }

    function it_is_initializable()
    {
        $this->shouldHaveType(Tennis::class);
    }

    function it_scores_a_scoreless_game() {
        $this->score()->shouldReturn('Love-All');
    }

    function it_scores_a_1_0_game()
    {
        $this->alex->earnPoints(1);
        $this->score()->shouldReturn('Fifteen-Love');
    }

    function it_scores_a_2_0_game()
    {
        $this->alex->earnPoints(2);
        $this->score()->shouldReturn('Thirty-Love');
    }

    function it_scores_a_3_0_game()
    {
        $this->alex->earnPoints(3);
        $this->score()->shouldReturn('Forty-Love');
    }

    function it_scores_a_4_0_game()
    {
        $this->alex->earnPoints(4);
        $this->score()->shouldReturn('Win for Alex A');
    }

}

