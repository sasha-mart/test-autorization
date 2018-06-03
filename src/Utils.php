<?php

namespace SashaMart\TestAutorization;

trait Utils
{
    static function secureEntry(string $entry): string
    {
        $result = trim($entry);
        $result = strip_tags($result);
        $result = htmlspecialchars($result, ENT_QUOTES);
        $result = stripslashes($result);

        return $result;
    }
}