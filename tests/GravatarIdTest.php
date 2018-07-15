<?php

declare(strict_types=1);

namespace Tests\DevboardLib\Generix;

use DevboardLib\Generix\GravatarId;
use PHPUnit\Framework\TestCase;

/**
 * @covers \DevboardLib\Generix\GravatarId
 * @group  todo
 */
class GravatarIdTest extends TestCase
{
    /** @var string */
    private $id;

    /** @var GravatarId */
    private $sut;

    public function setUp(): void
    {
        $this->id  = '205e460b479e2e5b48aec07710c08d50';
        $this->sut = new GravatarId($this->id);
    }

    public function testGetId(): void
    {
        self::assertSame($this->id, $this->sut->getId());
    }

    public function testGetValue(): void
    {
        self::assertSame($this->id, $this->sut->getValue());
    }

    public function testToString(): void
    {
        self::assertSame($this->id, $this->sut->__toString());
    }

    public function testSerialize(): void
    {
        self::assertEquals($this->id, $this->sut->serialize());
    }

    public function testDeserialize(): void
    {
        self::assertEquals($this->sut, $this->sut::deserialize($this->id));
    }

    /**
     * @expectedException \DomainException
     * @expectedExceptionMessage GravatarId cant be empty
     */
    public function testCantBeEmpty(): void
    {
        new GravatarId('');
    }
}
