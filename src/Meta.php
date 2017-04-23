<?php

namespace LaraComponents\Seo;

class Meta
{
    protected $attributes = [];

    public function __construct(array $attributes = [])
    {
        $this->setAttributes($attributes);
    }

    public static function make(array $attributes = [])
    {
        return new self($attributes);
    }

    public function setAttributes(array $attributes)
    {
        foreach ($attributes as $key => $value) {
            $this->setAttribute($key, $value);
        }
    }

    public function getAttributes()
    {
        return $this->attributes;
    }

    public function setAttribute($key, $value)
    {
        $this->attributes[$key] = $value;
    }

    public function getAttribute($key)
    {
        if (array_key_exists($key, $this->attributes)) {
            return $this->attributes[$key];
        }
    }

    public function toString()
    {
        if (count($this->attributes)) {
            return '<meta'.$this->getHtmlAttributes().'/>';
        }

        return '';
    }

    protected function getHtmlAttributes()
    {
        $html = [];
        foreach ($this->attributes as $key => $value) {
            $attribute = $key.'="'.e($value).'"';

            if (! is_null($attribute)) {
                $html[] = $attribute;
            }
        }

        return count($html) > 0 ? ' '.implode(' ', $html) : '';
    }

    public function __toString()
    {
        return $this->toString();
    }
}
