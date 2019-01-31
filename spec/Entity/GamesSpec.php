<?php

namespace spec\App\Entity;

use App\Entity\Games;
use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

class GamesSpec extends ObjectBehavior
{
    function it_is_initializable()
    {
        $this->shouldHaveType(Games::class);
    }

    function it_should_be_a_name(){
        $this->setName('sylvie');
        $this->getName()->shouldReturn("sylvie");
    }

    function it_should_be_a_Description(){
        $this->setDEscription('Voici les formules');
        $this->getDescription()->shouldReturn("Voici les formules");
    }

    function it_should_be_a_duration(){
        $this->setDuration(23445);
        $this->getDuration()->shouldReturn(23445);
    }

    function it_should_be_a_playerMin(){
        $this->setPlayerMin(2);
        $this->getPlayerMin()->shouldReturn(2);
    }
}
