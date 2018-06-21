<?php

declare(strict_types=1);

namespace spec\DevboardLib\Generix;

use DevboardLib\Generix\RequestId;
use PhpSpec\ObjectBehavior;

class RequestIdSpec extends ObjectBehavior
{
    public function let()
    {
        $this->beConstructedWith($id = '93bb5c8d-47ff-4356-9a7c-5b942f5f66c4');
    }

    public function it_is_initializable()
    {
        $this->shouldHaveType(RequestId::class);
    }

    public function it_exposes_id()
    {
        $this->getId()->shouldReturn('93bb5c8d-47ff-4356-9a7c-5b942f5f66c4');
    }

    public function it_can_be_converted_to_string()
    {
        $this->__toString()->shouldReturn('93bb5c8d-47ff-4356-9a7c-5b942f5f66c4');
    }

    public function it_can_be_serialized()
    {
        $this->serialize()->shouldReturn('93bb5c8d-47ff-4356-9a7c-5b942f5f66c4');
    }

    public function it_can_be_deserialized()
    {
        $this->deserialize('93bb5c8d-47ff-4356-9a7c-5b942f5f66c4')
            ->shouldReturnAnInstanceOf(RequestId::class);
    }

    public function it_can_create_new_one_using_random_id()
    {
        $this->create()
            ->shouldReturnAnInstanceOf(RequestId::class);
    }
}
