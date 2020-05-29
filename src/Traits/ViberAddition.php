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
     * @return int||null
     */
    public function setTTL($ttl) {
        $this->ttl = (int) $ttl;
        return true;
    }

    /**
     * @return string||null
     */
    public function setImageURL($image) {
        $this->imageUrl = $image;
        return true;
    }

    /**
     * @return string||null
     */
    public function setCaption($caption) {
        $this->caption = $caption;
        return true;
    }

    /**
     * @return string||null
     */
    public function setAction($action) {
        $this->action = $action;
        return true;
    }

    /**
     * @return int||null
     */
    public function setCountClicks($countClicks) {
        if ($countClicks) {
          $this->countClicks = 1;
        }
        return true;
    }

    /**
     * @return int||null
     */
    public function setTransactional($isTransactional) {
        if ($isTransactional) {
          $this->isTransactional = 1;
        }
        return true;
    }

    /**
     * @return string||null
     */
    public function setViberText($viberReplaceText) {
        if ($viberReplaceText) {
          $this->viberReplaceText = $viberReplaceText;
        }
        return true;
    }


}
