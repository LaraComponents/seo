<?php

namespace LaraComponents\Seo\OpenGraph;

abstract class Media
{
    protected $type;

    public function getType()
    {
        return $this->type;
    }

    abstract public function setType($type);
}
