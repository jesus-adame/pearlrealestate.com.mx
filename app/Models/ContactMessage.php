<?php

namespace App\Models;

class ContactMessage
{
    public string $from;

    public string $to;

    public string $body;

    public function __construct(string $from, string $to, string $body)
    {
        $this->from = $from;
        $this->to = $to;
        $this->body = $body;
    }
}
