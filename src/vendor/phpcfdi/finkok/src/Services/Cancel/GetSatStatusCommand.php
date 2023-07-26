<?php

declare(strict_types=1);

namespace PhpCfdi\Finkok\Services\Cancel;

class GetSatStatusCommand
{
    /** @var string */
    private $rfcIssuer;

    /** @var string */
    private $rfcRecipient;

    /** @var string */
    private $uuid;

    /** @var string */
    private $total;

    public function __construct(string $rfcIssuer, string $rfcRecipient, string $uuid, string $total)
    {
        $this->rfcIssuer = $rfcIssuer;
        $this->rfcRecipient = $rfcRecipient;
        $this->uuid = $uuid;
        $this->total = $total;
    }

    public function rfcIssuer(): string
    {
        return $this->rfcIssuer;
    }

    public function rfcRecipient(): string
    {
        return $this->rfcRecipient;
    }

    public function uuid(): string
    {
        return $this->uuid;
    }

    public function total(): string
    {
        return $this->total;
    }
}
