<?php

namespace LaraComponents\Seo\OpenGraph;

use LaraComponents\Seo\OpenGraph\Traits\HasUrl;
use LaraComponents\Seo\OpenGraph\Traits\HasWidthAndHeight;

class Video extends Media
{
    use HasUrl, HasWidthAndHeight;

    CONST VALID_TYPES = [
        'application/x-shockwave-flash',
        'video/mp4',
        'video/ogg',
        'video/webm',
    ];

    public function setType($type)
    {
        if (in_array($type, Video::VALID_TYPES)) {
            $this->type = $type;
        }

        return $this;
    }

    public function toArray()
    {
        $result = [];

        $result['og:video'] = $this->getUrl();
        $result['og:video:type'] = $this->getType();
        $result['og:video:secure_url'] = $this->getSecureUrl();
        $result['og:video:width'] = $this->getWidth();
        $result['og:video:height'] = $this->getHeight();

        return array_filter($result);
    }
}
