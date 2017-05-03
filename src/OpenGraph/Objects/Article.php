<?php

namespace LaraComponents\Seo\OpenGraph\Objects;

class Article extends TypeObject
{
    const TYPE = 'article';

    protected $publishedTime;

    protected $modifiedTime;

    protected $expirationTime;

    protected $author;

    protected $section;

    protected $tag;

    public function getType()
    {
        return Article::TYPE;
    }

    public function setPublishedTime($time)
    {

    }

    public function getPublishedTime()
    {
        return $this->publishedTime;
    }

    public function setModifiedTime($time)
    {

    }

    public function getModifiedTime()
    {
        return $this->modifiedTime;
    }

    public function setExpirationTime($time)
    {

    }

    public function getExpirationTime()
    {
        return $this->expirationTime;
    }

    public function setAuthor($author)
    {

    }

    public function getAuthor()
    {
        return $this->author;
    }

    public function setSection($section)
    {

    }

    public function getSection()
    {
        return $this->section;
    }

    public function setTag($tag)
    {

    }

    public function getTag()
    {
        return $this->tag;
    }
}
