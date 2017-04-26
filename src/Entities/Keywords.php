<?php

namespace LaraComponents\Seo\Entities;

use Countable;

class Keywords implements Countable
{
    /**
     * @var array
     */
    protected $items = [];

    /**
     * @var int
     */
    protected $maxWords;

    /**
     * Create a new keywords instance.
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
        $this->setMaxWords(isset($config['max_words']) ? $config['max_words'] : 0);

        if(isset($config['default'])) {
            $this->set($config['default']);
        }
    }

    public function setMaxWords($max)
    {
        $this->maxWords = (int) $max;

        return $this;
    }

    public function getMaxWords()
    {
        return $this->maxWords;
    }

    public function add($items)
    {
        $items = $this->clean($items);

        $this->items = array_merge(array_diff($items, $this->items), $this->items);
    }

    public function set($items)
    {
        $this->items = $this->clean($items);
    }

    public function get()
    {
        return $this->maxWords > 0 && $this->count() > $this->maxWords
            ? array_slice($this->items, 0, $this->maxWords)
            : $this->items;
    }

    public function clear()
    {
        $this->items = [];
    }

    public function count()
    {
        return count($this->items);
    }

    protected function clean($items)
    {
        $items = ! is_array($items) ? explode(',', $items) : $items;

        return array_map(function ($item) {
            return trim(strip_tags($item));
        }, $items);
    }

    public function toString()
    {
        return implode(', ', $this->get());
    }

    public function __toString()
    {
        return $this->toString();
    }
}
