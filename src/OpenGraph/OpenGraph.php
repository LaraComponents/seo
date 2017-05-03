<?php

namespace LaraComponents\Seo\OpenGraph;

use LaraComponents\Seo\OpenGraph\Objects\TypeObject;

class OpenGraph
{
    const DETERMINER_SUPPORTED = [
        'a', 'an', 'auto', 'the',
    ];

    const LOCALE_SUPPORTED = [
        'af_ZA', 'ak_GH', 'am_ET', 'ar_AR', 'as_IN', 'ay_BO', 'az_AZ', 'be_BY', 'bg_BG', 'bn_IN', 'br_FR',
        'bs_BA', 'ca_ES', 'cb_IQ', 'ck_US', 'co_FR', 'cs_CZ', 'cx_PH', 'cy_GB', 'da_DK', 'de_DE', 'el_GR',
        'en_GB', 'en_IN', 'en_US', 'eo_EO', 'es_CO', 'es_ES', 'es_LA', 'et_EE', 'eu_ES', 'fa_IR', 'ff_NG',
        'fi_FI', 'fo_FO', 'fr_CA', 'fr_FR', 'fy_NL', 'ga_IE', 'gl_ES', 'gn_PY', 'gu_IN', 'gx_GR', 'ha_NG',
        'he_IL', 'hi_IN', 'hr_HR', 'hu_HU', 'hy_AM', 'id_ID', 'ig_NG', 'is_IS', 'it_IT', 'ja_JP', 'ja_KS',
        'jv_ID', 'ka_GE', 'kk_KZ', 'km_KH', 'kn_IN', 'ko_KR', 'ku_TR', 'la_VA', 'lg_UG', 'li_NL', 'ln_CD',
        'lo_LA', 'lt_LT', 'lv_LV', 'mg_MG', 'mk_MK', 'ml_IN', 'mn_MN', 'mr_IN', 'ms_MY', 'mt_MT', 'my_MM',
        'nb_NO', 'nd_ZW', 'ne_NP', 'nl_BE', 'nl_NL', 'nn_NO', 'ny_MW', 'or_IN', 'pa_IN', 'pl_PL', 'ps_AF',
        'pt_BR', 'pt_PT', 'qu_PE', 'rm_CH', 'ro_RO', 'ru_RU', 'rw_RW', 'sa_IN', 'sc_IT', 'se_NO', 'si_LK',
        'sk_SK', 'sl_SI', 'sn_ZW', 'so_SO', 'sq_AL', 'sr_RS', 'sv_SE', 'sw_KE', 'sy_SY', 'sz_PL', 'ta_IN',
        'te_IN', 'tg_TJ', 'th_TH', 'tk_TM', 'tl_PH', 'tr_TR', 'tt_RU', 'tz_MA', 'uk_UA', 'ur_PK', 'uz_UZ',
        'vi_VN', 'wo_SN', 'xh_ZA', 'yi_DE', 'yo_NG', 'zh_CN', 'zh_HK', 'zh_TW', 'zu_ZA', 'zz_TR',
    ];

    /**
     * @var string
     */
    protected $type;

    /**
     * @var LaraComponents\Seo\OpenGraph\Objects\TypeObject
     */
    protected $typeObject;

    /**
     * @var string
     */
    protected $title;

    /**
     * @var string
     */
    protected $siteName;

    /**
     * @var string
     */
    protected $description;

    /**
     * @var string
     */
    protected $url;

    /**
     * @var string
     */
    protected $determiner;

    /**
     * @var string
     */
    protected $locale;

    /**
     * @var array
     */
    protected $alternateLocales = [];

    /**
     * @var array
     */
    protected $images = [];

    /**
     * @var array
     */
    protected $audios = [];

    /**
     * @var array
     */
    protected $videos = [];

    public function setType($type)
    {
        $this->type = $this->trim($type);

        return $this;
    }

    public function getType()
    {
        return $this->type;
    }

    public function setTypeObject(TypeObject $typeObject)
    {
        $this->typeObject = $typeObject;
    }

    public function getTypeObject()
    {
        return $this->typeObject;
    }

    public function setTitle($title)
    {
        $this->title = $this->trim($title);

        return $this;
    }

    public function getTitle()
    {
        return $this->title;
    }

    public function setSiteName($siteName)
    {
        $this->siteName = $this->trim($siteName);

        return $this;
    }

    public function getSiteName()
    {
        return $this->siteName;
    }

    public function setDescription($description)
    {
        $this->description = $this->trim($description);

        return $this;
    }

    public function getDescription()
    {
        return $this->description;
    }

    public function setUrl($url)
    {
        $this->url = $this->trim($url);

        return $this;
    }

    public function getUrl()
    {
        return $this->url;
    }

    public function setDeterminer($determiner)
    {
        if (in_array($determiner, OpenGraph::DETERMINER_SUPPORTED) || is_null($determiner)) {
            $this->determiner = $determiner;
        }

        return $this;
    }

    public function getDeterminer()
    {
        return $this->determiner;
    }

    public function setLocale($locale)
    {
        if (in_array($locale, OpenGraph::LOCALE_SUPPORTED) || is_null($locale)) {
            $this->locale = $locale;
        }

        return $this;
    }

    public function getLocale()
    {
        return $this->locale;
    }

    public function addAlternateLocale($locale)
    {
        if (in_array($locale, OpenGraph::LOCALE_SUPPORTED)) {
            $this->alternateLocales[] = $locale;
        }

        return $this;
    }

    public function setAlternateLocales(array $locales)
    {
        $this->alternateLocales = [];

        foreach ($locales as $locale) {
            $this->addAlternateLocale($locale);
        }

        return $this;
    }

    public function getAlternateLocales()
    {
        return $this->alternateLocales;
    }

    public function addImage(Image $image)
    {
        $this->images[] = $image;

        return $this;
    }

    public function setImages(array $images)
    {
        $this->images = [];

        foreach ($images as $image) {
            $this->addImage($image);
        }

        return $this;
    }

    public function getImages()
    {
        return $this->images;
    }

    public function addAudio(Audio $audio)
    {
        $this->audios[] = $audio;

        return $this;
    }

    public function setAudios(array $audios)
    {
        $this->audios = [];

        foreach ($audios as $audio) {
            $this->addAudio($audio);
        }

        return $this;
    }

    public function getAudios()
    {
        return $this->audios;
    }

    public function addVideo(Video $video)
    {
        $this->videos[] = $video;

        return $this;
    }

    public function setVideos(array $videos)
    {
        $this->videos = [];

        foreach ($videos as $video) {
            $this->addVideo($video);
        }

        return $this;
    }

    public function getVideos()
    {
        return $this->videos;
    }

    protected function trim($string)
    {
        $string = (is_string($string) && !empty(trim($string))) ? trim($string) : null;

        return $string;
    }

    public function toArray()
    {
        $result = [];

        $result['og:type'] = $this->getType();
        $result['og:title'] = $this->getTitle();
        $result['og:site_name'] = $this->getSiteName();
        $result['og:description'] = $this->getDescription();
        $result['og:url'] = $this->getUrl();
        $result['og:determiner'] = $this->getDeterminer();
        $result['og:locale'] = $this->getLocale();
        $result['og:locale:alternate'] = $this->getAlternateLocales();

        $result['og:image'] = [];
        foreach ($this->getImages() as $image) {
            $result['og:image'][] = $image->toArray();
        }

        $result['og:audio'] = [];
        foreach ($this->getAudios() as $audio) {
            $result['og:audio'][] = $audio->toArray();
        }

        $result['og:video'] = [];
        foreach ($this->getVideos() as $video) {
            $result['og:video'][] = $video->toArray();
        }

        return array_filter($result);
    }
}
