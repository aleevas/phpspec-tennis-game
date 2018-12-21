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

    function it_scores_a_0_4_game()
    {
        $this->poly->earnPoints(4);
        $this->score()->shouldReturn('Win for Poly N');
    }

    function it_scores_a_4_3_game()
    {
        $this->alex->earnPoints(4);
        $this->poly->earnPoints(3);

        $this->score()->shouldReturn('Advantage Alex A');
    }

    function it_scores_a_3_3_game()
    {
        $this->alex->earnPoints(3);
        $this->poly->earnPoints(3);

        $this->score()->shouldReturn('Deuce');
    }

    function it_scores_a_8_8_game()
    {
        $this->alex->earnPoints(8);
        $this->poly->earnPoints(8);

        $this->score()->shouldReturn('Deuce');
    }

    function it_scores_a_8_9_game()
    {
        $this->alex->earnPoints(8);
        $this->poly->earnPoints(9);

        $this->score()->shouldReturn('Advantage Poly N');
    }

}

