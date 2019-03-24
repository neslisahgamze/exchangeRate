<?php

namespace App\Utils;

/**
 * Interface ClientInterface
 * @package App\Utils
 */
interface ClientInterface
{
    /**
     * @param string $url
     * @return string
     */
    public function request(string $url = ''): string;

    /**
     * @return string
     */
    public function getResponse(): string;

    /**
     * @param $url
     * @return ClientInterface
     */
    public function setUrl($url): ClientInterface;

    /**
     * @return string
     */
    public function getUrl(): string;

    /**
     * @param string $baseUrl
     * @return ClientInterface
     */
    public function setBaseUrl(string $baseUrl): ClientInterface;

    /**
     * @param string $method
     * @return ClientInterface
     */
    public function setMethod(string $method): ClientInterface;
}