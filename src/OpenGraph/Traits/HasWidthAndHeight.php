<?php

namespace LaraComponents\Seo\OpenGraph\Traits;

trait HasWidthAndHeight
{
    /**
     * @var int
     */
    protected $width;

    /**
     * @var int
     */
    protected $height;

    /**
     * [setWidth description]
     * @param int $width
     */
    public function setWidth($width)
    {
        $width = (int) $width;
        if ($width > 0) {
            $this->width = $width;
        }

        return $this;
    }

    /**
     * [getWidth description]
     * @return int
     */
    public function getWidth()
    {
        return $this->width;
    }

    /**
     * [setHeight description]
     * @param int $height
     */
    public function setHeight($height)
    {
        $height = (int) $height;
        if ($height > 0) {
            $this->height = $height;
        }

        return $this;
    }

    /**
     * [getHeight description]
     * @return int
     */
    public function getHeight()
    {
        return $this->height;
    }
}
