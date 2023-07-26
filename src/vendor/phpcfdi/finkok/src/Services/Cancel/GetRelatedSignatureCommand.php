<?php

declare(strict_types=1);

namespace PhpCfdi\Finkok\Services\Cancel;

class GetRelatedSignatureCommand
{
    /** @var string */
    private $xml;

    public function __construct(string $xml)
    {
        $this->xml = $xml;
    }

    public function xml(): string
    {
        return $this->xml;
    }
}
