<?php

namespace LaraComponents\Seo\Contracts;

interface Title
{
    /**
     * Set title separator.
     *
     * @param string $separator
     * @return \LaraComponents\Seo\Contracts\Title
     */
    public function setSeparator($separator);

    /**
     * Get title separator.
     *
     * @return string
     */
    public function getSeparator();

    /**
     * Set site name.
     *
     * @param string $siteName
     * @return \LaraComponents\Seo\Contracts\Title
     */
    public function setSiteName($siteName);

    /**
     * Get site name.
     *
     * @return string
     */
    public function getSiteName();

    /**
     * Set segment max length.
     *
     * @param int $max
     * @return \LaraComponents\Seo\Contracts\Title
     */
    public function setMaxSegemnt($max);

    /**
     * Get segment max length.
     *
     * @return int
     */
    public function getMaxSegment();

    /**
     * Set title max length.
     *
     * @param int $max
     * @return \LaraComponents\Seo\Contracts\Title
     */
    public function setMaxTitle($max);

    /**
     * Get title max length.
     *
     * @return int
     */
    public function getMaxTitle();

    /**
     * Set reverse title position.
     *
     * @param bool $reverse
     * @return \LaraComponents\Seo\Contracts\Title
     */
    public function setReverse($reverse);

    /**
     * Check reverse title position.
     *
     * @return bool
     */
    public function isReverse();

    /**
     * Set the site name visibility.
     *
     * @param bool $visible
     */
    public function setSiteNameVisibility($visible);

    /**
     * Check if site name exists and visible.
     *
     * @return bool
     */
    public function isSiteNameVisible();

    /**
     * Appent title to segments.
     *
     * @return \LaraComponents\Seo\Contracts\Title
     */
    public function append();

    /**
     * Set title segments.
     *
     * @return \LaraComponents\Seo\Contracts\Title
     */
    public function set();

    /**
     * Get title segments.
     *
     * @return array
     */
    public function get();

    /**
     * Make the title string.
     *
     * @return string
     */
    public function make();
}
