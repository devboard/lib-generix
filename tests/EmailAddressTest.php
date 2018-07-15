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
    public function testItExposesValue(string $email): void
    {
        $sut = new EmailAddress($email);
        self::assertEquals($email, $sut->getValue());
    }

    /** @dataProvider provideEmailAddresses */
    public function testItCanBeAutoConvertedToString(string $email): void
    {
        $sut = new EmailAddress($email);
        self::assertEquals($email, (string) $sut);
    }

    /**
     * @dataProvider provideInvalidEmailAddresses
     */
    public function testItMarksInvalidBadlyFormattedEmailAddress(string $email): void
    {
        $sut = new EmailAddress($email);
        self::assertFalse($sut->isValid());
    }

    /** @dataProvider provideEmailAddresses */
    public function testEmailAddressesAreEqual(string $email): void
    {
        $sut   = new EmailAddress($email);
        $other = new EmailAddress($email);
        self::assertTrue($sut->equals($other));
    }

    public function testEmailAddressesAreEqualEvenWhenSomeLettersAreCapitalized(): void
    {
        $sut                     = new EmailAddress('nobody@example.com');
        $capitalizedEmailAddress = new EmailAddress('Nobody@example.com');

        self::assertTrue($sut->equals($capitalizedEmailAddress));
    }

    public function testEmailAddressesAreNotEqual(): void
    {
        $sut               = new EmailAddress('nobody@example.com');
        $otherEmailAddress = new EmailAddress('other@example.net');

        self::assertFalse($sut->equals($otherEmailAddress));
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
