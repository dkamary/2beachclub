<?php

namespace App\Models\Transaction;

interface ResultInterface
{
    public function setStatus(int $status): self;
    public function getStatus(): int;
    public function getStatusText(): string;
    public function setMessage(string $message, ...$args): self;
    public function getMessage(): ?string;
    public function setData(mixed $data): self;
    public function getData(): mixed;
    public function isSuccess(): bool;
    public function isError(): bool;
    public function isWarning(): bool;
    public function toArray(): array;
}
