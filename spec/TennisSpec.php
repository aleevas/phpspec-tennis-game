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
        $this->beConstructedWith($this->john, $this->jane);
    }

    function it_is_initializable()
    {
        $this->shouldHaveType(Tennis::class);
    }

    function it_scores_a_scoreless_game() {
        $this->score()->shouldReturn('Love-All');
    }
}
