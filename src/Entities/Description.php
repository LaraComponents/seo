<?php

namespace LaraComponents\Seo\Entities;

use LaraComponents\Seo\Traits\HasLimit;

class Description
{
    use HasLimit;

    /**
     * @var string
     */
    protected $content;

    /**
     * @var int
     */
    protected $maxSize;

    /**
     * Create a new description instance.
     *
     * @param array $config
     */
    public function __construct(array $config = [])
    {
        $this->initConfig($config);
    }

    /**
     * Init config.
     *
     * @param  array  $config
     * @return void
     */
    protected function initConfig(array $config)
    {
        $this->setMaxSize(isset($config['max_size']) ? $config['max_size'] : 0);

        if(isset($config['default'])) {
            $this->set($config['default']);
        }
    }

    public function setMaxSize($size)
    {
        $this->maxSize = (int) $size;

        return $this;
    }

    public function getMaxSize()
    {
        return $this->maxSize;
    }

    public function set($content)
    {
        $this->content = trim(strip_tags($content));

        return $this;
    }

    public function get()
    {
        if (is_null($this->content)) {
            return '';
        }

        return $this->maxSize > 0 ? $this->limit($this->content, $this->maxSize) : $this->content;
    }

    public function toString()
    {
        return $this->get();
    }

    public function __toString()
    {
        return $this->toString();
    }
}
