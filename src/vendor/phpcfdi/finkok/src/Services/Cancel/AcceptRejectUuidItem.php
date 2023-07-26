<?php

declare(strict_types=1);

namespace PhpCfdi\Finkok\Services\Cancel;

use PhpCfdi\Finkok\Definitions\CancelAnswer;

class AcceptRejectUuidItem
{
    /** @var string */
    private $uuid;

    /** @var AcceptRejectUuidStatus */
    private $status;

    /** @var CancelAnswer */
    private $answer;

    public function __construct(string $uuid, AcceptRejectUuidStatus $status, CancelAnswer $answer)
    {
        $this->uuid = $uuid;
        $this->status = $status;
        $this->answer = $answer;
    }

    public function uuid(): string
    {
        return $this->uuid;
    }

    public function status(): AcceptRejectUuidStatus
    {
        return $this->status;
    }

    public function answer(): CancelAnswer
    {
        return $this->answer;
    }
}
