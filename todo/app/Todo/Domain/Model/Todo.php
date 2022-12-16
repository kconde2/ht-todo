<?php

declare(strict_types=1);

namespace App\Todo\Domain\Model;

use DateTime;
use Illuminate\Support\Str;

final class Todo
{
    public function __construct(
        public string $text,
        public bool $checked = false,
        public ?string $id = null,
        public ?\DateTime $createdAt = null,
        public ?\DateTime $updatedAt = null,
    ) {
        $this->id = $id ?? Str::uuid()->toString();
        $this->createdAt = $createdAt ?? new \DateTime();
        $this->updatedAt = $updatedAt ?? new \DateTime();
    }

    public static function fromArray(array $todoArray): static
    {
        $timestampCreatedAt = $todoArray['createdAt'];
        $timestampUpdatedAt = $todoArray['updatedAt'];

        return new self(
            id        : $todoArray['id'],
            text      : $todoArray['text'],
            checked   : $todoArray['checked'],
            createdAt : self::createDateFromTimestamp($timestampCreatedAt),
            updatedAt : self::createDateFromTimestamp($timestampUpdatedAt),
        );
    }

    public function toArray(): array
    {
        return [
            'id'        => $this->id,
            'text'      => $this->text,
            'checked'   => $this->checked,
            'createdAt' => $this->createdAt->getTimestamp()*1000,
            'updatedAt' => $this->updatedAt->getTimestamp()*1000,
        ];
    }

    private static function createDateFromTimestamp(int $timestampMilliseconds): \DateTime
    {
        return new DateTime(date('d-m-Y H:i:s', (int) ($timestampMilliseconds / 1000)));
    }

    public function getFormattedCreatedAt(): string
    {
        return $this->createdAt->format('d-m-Y H:i:s');
    }

    public function getFormattedUpdatedAt(): string
    {
        return $this->updatedAt->format('d-m-Y H:i:s');
    }

    public function toggle(): void
    {
        $this->checked = !$this->checked;
        $this->updatedAt = new DateTime();
    }
}
