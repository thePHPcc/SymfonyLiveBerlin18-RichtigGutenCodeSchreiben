<?php declare(strict_types=1);
/*
 * This is example code that is not production-ready. It is intended for studying and learning purposes.
 *
 * (c) 2018 thePHP.cc. All rights reserved.
 */

namespace example;

final class ContainerId
{
    /**
     * @var string
     */
    private $ownerCode;

    /**
     * @var string
     */
    private $cargoIdentifier;

    /**
     * @var int
     */
    private $serialNumber;

    /**
     * @var int
     */
    private $checkDigit;

    /**
     * @throws InvalidContainerIdException
     */
    public static function fromString(string $id): self
    {
        if (\strlen($id) !== 11) {
            throw new InvalidContainerIdException;
        }

        return new self(
            \substr($id, 0, 3),
            $id[3],
            (int) \substr($id, 4, 6),
            (int) $id[10]
        );
    }

    /**
     * @throws InvalidContainerIdException
     */
    private function __construct(string $ownerCode, string $cargoIdentifier, int $serialNumber, int $checkDigit)
    {
        $this->ensureIdIsValid($ownerCode, $cargoIdentifier, $serialNumber, $checkDigit);

        $this->ownerCode       = $ownerCode;
        $this->cargoIdentifier = $cargoIdentifier;
        $this->serialNumber    = $serialNumber;
        $this->checkDigit      = $checkDigit;
    }

    public function __toString(): string
    {
        return \sprintf(
            '%s%s%d%d',
            $this->ownerCode,
            $this->cargoIdentifier,
            $this->serialNumber,
            $this->checkDigit
        );
    }

    /**
     * @throws InvalidContainerIdException
     */
    private function ensureIdIsValid(string $ownerCode, string $cargoIdentifier, int $serialNumber, int $checkDigit): void
    {
        $this->ensureCargoIdentifierIsValid($cargoIdentifier);
        $this->ensureCheckDigitMatches($ownerCode, $cargoIdentifier, $serialNumber, $checkDigit);
    }

    /**
     * @throws InvalidContainerIdException
     */
    private function ensureCargoIdentifierIsValid(string $cargoIdentifier): void
    {
        if ($cargoIdentifier !== 'U' && $cargoIdentifier !== 'J' && $cargoIdentifier !== 'Z') {
            throw new InvalidContainerIdException(
                \sprintf(
                    'Invalid cargo identifier "%s"',
                    $cargoIdentifier
                )
            );
        }
    }

    /**
     * @throws InvalidContainerIdException
     *
     * @see https://en.wikipedia.org/wiki/ISO_6346#Check_Digit
     */
    private function ensureCheckDigitMatches(string $ownerCode, string $cargoIdentifier, int $serialNumber, int $checkDigit): void
    {
        $serialNumberAsString = (string) $serialNumber;

        $idWithoutCheckDigitAsArrayOfIntegers = [
            $this->characterToInteger($ownerCode[0]),
            $this->characterToInteger($ownerCode[1]),
            $this->characterToInteger($ownerCode[2]),
            $this->characterToInteger($cargoIdentifier),
            (int) $serialNumberAsString[0],
            (int) $serialNumberAsString[1],
            (int) $serialNumberAsString[2],
            (int) $serialNumberAsString[3],
            (int) $serialNumberAsString[4],
            (int) $serialNumberAsString[5]
        ];

        $a = 0;

        foreach (\range(0, 9) as $i) {
            $a += $idWithoutCheckDigitAsArrayOfIntegers[$i] * (2 ** $i);
        }

        $b = $a / 11;
        $c = \floor($b);
        $d = $c * 11;

        /* @noinspection TypeUnsafeComparisonInspection */
        if ($checkDigit != $a - $d) {
            throw new InvalidContainerIdException('Incorrect check digit');
        }
    }

    /**
     * @throws InvalidContainerIdException
     */
    private function characterToInteger(string $character): int
    {
        switch ($character) {
            case 'A': return 10;
            case 'B': return 12;
            case 'C': return 13;
            case 'D': return 14;
            case 'E': return 15;
            case 'F': return 16;
            case 'G': return 17;
            case 'H': return 18;
            case 'I': return 19;
            case 'J': return 20;
            case 'K': return 21;
            case 'L': return 23;
            case 'M': return 24;
            case 'N': return 25;
            case 'O': return 26;
            case 'P': return 27;
            case 'Q': return 28;
            case 'R': return 29;
            case 'S': return 30;
            case 'T': return 31;
            case 'U': return 32;
            case 'V': return 34;
            case 'W': return 35;
            case 'X': return 36;
            case 'Y': return 37;
            case 'Z': return 38;
        }

        throw new InvalidContainerIdException(
            \sprintf(
                'Owner Code contains invalid character "%s"',
                $character
            )
        );
    }
}
