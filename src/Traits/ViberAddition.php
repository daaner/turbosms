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
    public function setTTL(int $ttl): self
    {
        $this->ttl = $ttl;

        return $this;
    }

    /**
     * @param  string  $image
     * @return $this
     */
    public function setImageURL(string $image): self
    {
        $this->imageUrl = $image;

        return $this;
    }

    /**
     * @param  string  $caption
     * @return $this
     */
    public function setCaption(string $caption): self
    {
        $this->caption = $caption;

        return $this;
    }

    /**
     * @param  string  $action
     * @return $this
     */
    public function setAction(string $action): self
    {
        $this->action = $action;

        return $this;
    }

    /**
     * @param  int  $countClicks
     * @return $this
     */
    public function setCountClicks(int $countClicks): self
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
    public function setTransactional(int $isTransactional): self
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
    public function setViberText(string $viberReplaceText): self
    {
        if ($viberReplaceText) {
            $this->viberReplaceText = $viberReplaceText;
        }

        return $this;
    }
}
