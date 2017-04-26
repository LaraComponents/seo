<?php

namespace LaraComponents\Seo\OpenGraph;

use LaraComponents\Seo\OpenGraph\Traits\HasUrl;

class Audio extends Media
{
    use HasUrl;

    CONST VALID_TYPES = [
        'application/x-shockwave-flash',
        'audio/mpeg',
        'audio/mp4',
        'audio/ogg',
    ];

    public function setType($type)
    {
        if (in_array($type, Audio::VALID_TYPES)) {
            $this->type = $type;
        }

        return $this;
    }

    public function toArray()
    {
        $result = [];

        $result['og:audio'] = $this->getUrl();
        $result['og:audio:type'] = $this->getType();
        $result['og:audio:secure_url'] = $this->getSecureUrl();

        return array_filter($result);
    }
}
