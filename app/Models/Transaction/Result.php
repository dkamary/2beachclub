<?php

namespace App\Models\Transaction;

class Result implements ResultInterface
{
    const UNKNOW        = 0;
    const DONE          = 1;
    const FAILED        = 2;
    const NOT_FOUND     = 3;
    const WARNING       = 4;
    const ERROR         = 5;
    const UPDATED       = 6;
    const REFUSED       = 7;
    const NOT_IMPLEMENTED = 8;

    const STATUS_TEXT = [
        self::UNKNOW        => 'unknow',
        self::DONE          => 'done',
        self::FAILED        => 'failed',
        self::NOT_FOUND     => 'not found',
        self::WARNING       => 'warning',
        self::ERROR         => 'error',
        self::UPDATED       => 'updated',
        self::REFUSED       => 'refused',
        self::NOT_IMPLEMENTED => 'not implemented',
    ];

    const SUCCESS_STATUS = [
        self::DONE,
        self::UPDATED,
    ];

    const WARNING_STATUS = [
        self::FAILED,
        self::NOT_FOUND,
        self::WARNING,
        self::REFUSED,
        self::NOT_IMPLEMENTED,
    ];

    const ERROR_STATUS = [
        self::ERROR,
    ];

    public function __construct(
        protected int $status = self::UNKNOW,
        protected ?string $message = null,
        protected mixed $data = null
    )
    {
        //
    }

    public function setStatus(int $status): self
    {
        $this->status = $status;

        return $this;
    }

    public function getStatus(): int
    {
        return $this->status;
    }

    public function getStatusText(): string
    {
        return self::STATUS_TEXT[$this->status] ?? self::STATUS_TEXT[self::UNKNOW];
    }

    public function setMessage(string $message, ...$args): self
    {
        if (func_num_args() < 2) {
            $this->message = $message;

            return $this;
        }

        $message = vsprintf($message, $args);
        $this->message = $message;

        return $this;
    }

    public function getMessage(): ?string
    {
        return $this->message;
    }

    public function setData(mixed $data): self
    {
        $this->data = $data;

        return $this;
    }

    public function getData(): mixed
    {
        return $this->data;
    }

    public function isSuccess(): bool
    {
        return in_array($this->status, self::SUCCESS_STATUS);
    }

    public function isError(): bool
    {
        return in_array($this->status, self::ERROR_STATUS);
    }

    public function isWarning(): bool
    {
        return in_array($this->status, self::WARNING_STATUS);
    }

    public function toArray(): array
    {
        return [
            'status' => $this->status,
            'status_text' => $this->getStatusText(),
            'message' => $this->message,
            'data' => $this->data,
        ];
    }
}
