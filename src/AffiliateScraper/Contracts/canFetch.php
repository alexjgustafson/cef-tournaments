<?php
namespace CEF\Tournaments\AffiliateScraper\Contracts;

use Psr\Http\Message\ResponseInterface;
interface canFetch{
    public function fetch(): ResponseInterface;
}