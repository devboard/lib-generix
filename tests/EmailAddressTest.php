<?php

declare(strict_types=1);

namespace Tests\DevboardLib\Generix;

use DevboardLib\Generix\EmailAddress;
use PHPUnit\Framework\TestCase;

/**
 * @covers \DevboardLib\Generix\EmailAddress
 * @group  unit
 */
class EmailAddressTest extends TestCase
{
    /** @dataProvider provideEmailAddresses */
    public function testItExposesValue(string $email)
    {
        $sut = new EmailAddress($email);
        $this->assertEquals($email, $sut->getValue());
    }

    /** @dataProvider provideEmailAddresses */
    public function testItCanBeAutoConvertedToString(string $email)
    {
        $sut = new EmailAddress($email);
        $this->assertEquals($email, (string) $sut);
    }

    /**
     * @dataProvider provideInvalidEmailAddresses
     * @expectedException \InvalidArgumentException
     */
    public function testItGuardsAgainstBadlyFormattedEmailAddress(string $email)
    {
        new EmailAddress($email);
    }

    /** @dataProvider provideEmailAddresses */
    public function testEmailAddressesAreEqual(string $email)
    {
        $sut   = new EmailAddress($email);
        $other = new EmailAddress($email);
        $this->assertTrue($sut->equals($other));
    }

    public function testEmailAddressesAreEqualEvenWhenSomeLettersAreCapitalized()
    {
        $sut                     = new EmailAddress('nobody@example.com');
        $capitalizedEmailAddress = new EmailAddress('Nobody@example.com');

        $this->assertTrue($sut->equals($capitalizedEmailAddress));
    }

    public function testEmailAddressesAreNotEqual()
    {
        $sut               = new EmailAddress('nobody@example.com');
        $otherEmailAddress = new EmailAddress('other@example.net');

        $this->assertFalse($sut->equals($otherEmailAddress));
    }

    public function provideEmailAddresses(): array
    {
        return [
            ['nobody@example.com'],
        ];
    }

    public function provideInvalidEmailAddresses(): array
    {
        return [
            ['nobody@example'],
            ['zz'],
            [''],
        ];
    }
}
