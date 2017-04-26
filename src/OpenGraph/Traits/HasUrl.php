<?php

namespace LaraComponents\Seo\OpenGraph\Traits;

trait HasUrl
{
    protected $url;

    protected $secureUrl;

    public function setUrl($url)
    {
        $this->url = $url;
    }

    public function getUrl()
    {
        return $this->url;
    }

    public function setSecureUrl($url)
    {
        $this->secureUrl = $url;
    }

    public function getSecureUrl()
    {
        return $this->secureUrl;
    }
}
