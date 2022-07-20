<?php

namespace Daaner\TurboSMS\Traits;

trait ViberAddition
{
    /**
     * @see https://turbosms.ua/api.html
     */
    protected $ttl;
    protected $imageUrl;
    protected $caption;
    protected $action;
    protected $countClicks;
    protected $isTransactional;
    protected $viberReplaceText;

    /**
     * @param  int  $ttl
     * @return $this
     */
    public function setTTL($ttl)
    {
        $this->ttl = (int) $ttl;

        return $this;
    }

    /**
     * @param  string  $image
     * @return $this
     */
    public function setImageURL($image)
    {
        $this->imageUrl = $image;

        return $this;
    }

    /**
     * @param  string  $caption
     * @return $this
     */
    public function setCaption($caption)
    {
        $this->caption = $caption;

        return $this;
    }

    /**
     * @param  string  $action
     * @return $this
     */
    public function setAction($action)
    {
        $this->action = $action;

        return $this;
    }

    /**
     * @param  int  $countClicks
     * @return $this
     */
    public function setCountClicks($countClicks)
    {
        if ($countClicks) {
            $this->countClicks = 1;
        }

        return $this;
    }

    /**
     * @param  int  $isTransactional
     * @return $this
     */
    public function setTransactional($isTransactional)
    {
        if ($isTransactional) {
            $this->isTransactional = 1;
        }

        return $this;
    }

    /**
     * @param  string  $viberReplaceText
     * @return $this
     */
    public function setViberText($viberReplaceText)
    {
        if ($viberReplaceText) {
            $this->viberReplaceText = $viberReplaceText;
        }

        return $this;
    }
}
