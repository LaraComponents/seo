<?php

namespace LaraComponents\Seo\Entities;

use LaraComponents\Seo\Traits\HasLimit;
use LaraComponents\Seo\Contracts\Title as TitleContract;

class Title implements TitleContract
{
    use HasLimit;

    /**
     * @var array
     */
    protected $segments = [];

    /**
     * @var string
     */
    protected $separator;

    /**
     * @var string
     */
    protected $siteName;

    /**
     * @var int
     */
    protected $maxSegment;

    /**
     * @var int
     */
    protected $maxTitle;

    /**
     * @var bool
     */
    protected $reverse;

    /**
     * @var bool
     */
    protected $siteNameVisibility;

    /**
     * Create a new title instance.
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
        $this->setSeparator(isset($config['separator']) ? $config['separator'] : ' :: ');
        $this->setSiteName(isset($config['site_name']) ? $config['site_name'] : null);
        $this->setMaxSegemnt(isset($config['max_segment']) ? $config['max_segment'] : 0);
        $this->setMaxTitle(isset($config['max_title']) ? $config['max_title'] : 0);
        $this->setReverse(isset($config['reverse']) ? $config['reverse'] : false);
        $this->setSiteNameVisibility(isset($config['site_name_visible']) ? $config['site_name_visible'] : true);
    }

    /**
     * Set title separator.
     *
     * @param string $separator
     * @return \LaraComponents\Seo\Title
     */
    public function setSeparator($separator)
    {
        if (! is_null($separator)) {
            $this->separator = (string) $separator;
        }

        return $this;
    }

    /**
     * Get title separator.
     *
     * @return string
     */
    public function getSeparator()
    {
        return $this->separator;
    }

    /**
     * Set site name.
     *
     * @param string $siteName
     * @return \LaraComponents\Seo\Title
     */
    public function setSiteName($siteName)
    {
        if (! is_null($siteName)) {
            $this->siteName = (string) $siteName;
        }

        return $this;
    }

    /**
     * Get site name.
     *
     * @return string
     */
    public function getSiteName()
    {
        return $this->siteName;
    }

    /**
     * Set segment max length.
     *
     * @param int $max
     * @return \LaraComponents\Seo\Title
     */
    public function setMaxSegemnt($max)
    {
        $this->maxSegment = (int) $max;

        return $this;
    }

    /**
     * Get segment max length.
     *
     * @return int
     */
    public function getMaxSegment()
    {
        return $this->maxSegment;
    }

    /**
     * Set title max length.
     *
     * @param int $max
     * @return \LaraComponents\Seo\Title
     */
    public function setMaxTitle($max)
    {
        $this->maxTitle = (int) $max;

        return $this;
    }

    /**
     * Get title max length.
     *
     * @return int
     */
    public function getMaxTitle()
    {
        return $this->maxTitle;
    }

    /**
     * Set reverse title position.
     *
     * @param bool $reverse
     * @return \LaraComponents\Seo\Title
     */
    public function setReverse($reverse = true)
    {
        $this->reverse = (bool) $reverse;

        return $this;
    }

    /**
     * Check reverse title position.
     *
     * @return bool
     */
    public function isReverse()
    {
        return $this->reverse;
    }

    /**
     * Set the site name visibility.
     *
     * @param bool $visible
     */
    public function setSiteNameVisibility($visible)
    {
        $this->siteNameVisibility = (bool) $visible;

        return $this;
    }

    /**
     * Check if site name exists and visible.
     *
     * @return bool
     */
    public function isSiteNameVisible()
    {
        return ! is_null($this->siteName) && $this->siteNameVisibility;
    }

    /**
     * Appent title to segments.
     *
     * @return \LaraComponents\Seo\Title
     */
    public function add()
    {
        $segments = func_get_args();

        foreach ($this->normalizeSegments($segments) as $segment) {
            $this->segments[] = $segment;
        }

        return $this;
    }

    /**
     * Set title segments.
     *
     * @return \LaraComponents\Seo\Title
     */
    public function set()
    {
        $segments = func_get_args();

        $this->segments = $this->normalizeSegments($segments);

        return $this;
    }

    /**
     * Get title segments.
     *
     * @return array
     */
    public function get()
    {
        return $this->segments;
    }

    /**
     * Make the title string.
     *
     * @return string
     */
    public function toString()
    {
        $parts = [];
        if ($this->isSiteNameVisible()) {
            $parts[] = $this->siteName;
        }

        if (count($this->segments)) {
            $segments = $this->isReverse() ? array_reverse($this->segments) : $this->segments;

            $title = implode($this->separator, $segments);
            $title = $this->maxTitle > 0 ? $this->limit($title, $this->maxTitle) : $title;

            $this->isReverse() ? array_push($parts, $title) : array_unshift($parts, $title);
        }

        return implode($this->separator, $parts);
    }

    /**
     * Normalize the get segments.
     *
     * @param  array $segments
     * @return array
     */
    protected function normalizeSegments($segments)
    {
        $normalized = [];

        foreach ($segments as $segment) {
            if (is_array($segment)) {
                $normalized = array_merge($normalized, $this->normalizeSegments($segment));
            } else {
                $segment = trim(strip_tags((string) $segment));

                if (mb_strlen($segment) > 0) {
                    $normalized[] = $this->maxSegment > 0 ? $this->limit($segment, $this->maxSegment) : $segment;
                }
            }
        }

        return $normalized;
    }

    /**
     * Convert object to string.
     *
     * @return string
     */
    public function __toString()
    {
        return $this->toString();
    }
}
