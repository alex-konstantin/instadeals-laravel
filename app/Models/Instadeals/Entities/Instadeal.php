<?php

namespace App\Models\Instadeals\Entities;

use App\Contracts\DoctrineModel;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping AS ORM;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Carbon\Carbon;

/**
 * @ORM\Entity
 * @ORM\Table(name="instadeals")
 */
class Instadeal extends DoctrineModel
{

    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    protected $id;

    /**
     * @ORM\Column(type="string", length=50, nullable=true)
     */
    protected $brand;

    /**
     * @ORM\Column(type="string", length=50, unique=true)
     */
    protected $instadeal;

    /**
     * @ORM\Column(type="string", length=50, nullable=true)
     */
    protected $redirect_url;

    /**
     * @ORM\Column(type="string", length=50, nullable=false)
     */
    protected $utm_source;

    /**
     * @ORM\Column(type="string", length=50, nullable=true)
     */
    protected $utm_medium;

    /**
     * @ORM\Column(type="string", length=50, nullable=true)
     */
    protected $utm_term;

    /**
     * @ORM\Column(type="string", length=50, nullable=true)
     */
    protected $utm_content;

    /**
     * @ORM\Column(type="string", length=50, nullable=true)
     */
    protected $utm_campaign;

    /**
     * @ORM\Column(type="string", length=50, nullable=true)
     */
    protected $coupon_code;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    protected $instadeal_url;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    protected $result_redirect_url;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    protected $created;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    protected $modified;

    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param mixed $id
     * @return Instadeal
     */
    public function setId($id)
    {
        $this->id = $id;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getBrand()
    {
        return $this->brand;
    }

    /**
     * @return mixed
     */
    public function setBrand($brand)
    {
        $this->brand = $brand;
        return $this;

    }

    /**
     * @return mixed
     */
    public function getInstadeal()
    {
        return $this->instadeal;
    }

    /**
     * @return mixed
     */
    public function setInstadeal($instadeal)
    {
        $this->instadeal = $instadeal;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getRedirectUrl()
    {
        return $this->redirect_url;
    }

    /**
     * @return mixed
     */
    public function setRedirectUrl($redirect_url)
    {
        $this->redirect_url = $redirect_url;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getUtmSource()
    {
        return $this->utm_source;
    }

    /**
     * @return mixed
     */
    public function setUtmSource($utm_source)
    {
        $this->utm_source = $utm_source;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getUtmMedium()
    {
        return $this->utm_medium;
    }

    /**
     * @return mixed
     */
    public function setUtmMedium($utm_medium)
    {
        $this->utm_medium = $utm_medium;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getUtmTerm()
    {
        return $this->utm_term;
    }

    /**
     * @return mixed
     */
    public function setUtmTerm($utm_term)
    {
        $this->utm_term = $utm_term;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getUtmContent()
    {
        return $this->utm_content;
    }

    /**
     * @return mixed
     */
    public function setUtmContent($utm_content)
    {
        $this->utm_content = $utm_content;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getUtmCampaign()
    {
        return $this->utm_campaign;
    }

    /**
     * @return mixed
     */
    public function setUtmCampaign($utm_campaign)
    {
        $this->utm_campaign = $utm_campaign;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getCouponCode()
    {
        return $this->coupon_code;
    }

    /**
     * @return mixed
     */
    public function setCouponCode($coupon_code)
    {
        $this->coupon_code = $coupon_code;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getInstadealUrl()
    {
        return $this->instadeal_url;
    }

    /**
     * @return mixed
     */
    public function setInstadealUrl($instadeal_url)
    {
        $this->instadeal_url = $instadeal_url;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getResultRedirectUrl()
    {
        return $this->result_redirect_url;
    }

    /**
     * @return mixed
     */
    public function setResultRedirectUrl($result_redirect_url)
    {
        $this->result_redirect_url = $result_redirect_url;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getCreated()
    {
        return $this->created;
    }

    /**
     * @return mixed
     */
    public function setCreated($created)
    {
        $this->created = $created;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getModified()
    {
        return $this->created;
    }

    public function saveData($data)
    {
        $data = app()->make('instadealData')->prepareData($data);

        if (!$data) {
            return false;
        }

        $this->setBrand($data['brand']);
        $this->setInstadeal($data['instadeal']);
        $this->setRedirectUrl($data['redirect_url']);

        $this->setUtmSource($data['utm_source']);
        $this->setUtmMedium($data['utm_medium']);
        $this->setUtmTerm($data['utm_term']);
        $this->setUtmContent($data['utm_content']);
        $this->setUtmCampaign($data['utm_campaign']);
        $this->setCouponCode($data['coupon_code']);

        $this->setInstadealUrl($data['instadeal_url']);
        $this->setResultRedirectUrl($data['result_redirect_url']);
        $this->setCreated(Carbon::now());

        $this->save();

        return $data;
    }
}
