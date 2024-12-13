<?php

namespace App\Services;

class PageService
{
    public function getCurrentPage(string $page)
    {
        return $page ? (int) str_replace('page/', '', $page) : 1;
    }

}
