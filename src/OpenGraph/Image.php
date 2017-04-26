<?php

namespace LaraComponents\Seo\OpenGraph;

use LaraComponents\Seo\OpenGraph\Traits\HasUrl;
use LaraComponents\Seo\OpenGraph\Traits\HasWidthAndHeight;

class Image extends Media
{
    use HasUrl, HasWidthAndHeight;

    CONST VALID_TYPES = [
        'image/jpeg',
        'image/png',
        'image/gif',
        'image/svg+sml',
        'image/vnd.microsoft.icon',
    ];

    public function setType($type)
    {
        if (in_array($type, Image::VALID_TYPES)) {
            $this->type = $type;
        }

        return $this;
    }

    public function toArray()
    {
        $result = [];

        $result['og:image'] = $this->getUrl();
        $result['og:image:type'] = $this->getType();
        $result['og:image:secure_url'] = $this->getSecureUrl();
        $result['og:image:width'] = $this->getWidth();
        $result['og:image:height'] = $this->getHeight();

        return array_filter($result);
    }
}
