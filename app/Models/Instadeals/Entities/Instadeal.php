<?php

namespace App\Models\Instadeals\Entities;

use App\Contracts\DoctrineModel;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping AS ORM;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Carbon\Carbon;

//use LaravelDoctrine\ORM\Auth\Authenticatable;
//use Illuminate\Foundation\Auth\Access\Authorizable;

//use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;
//use Illuminate\Contracts\Auth\Access\Authorizable as AuthorizableContract;

/**
 * @ORM\Entity
 * @ORM\Table(name="instadeals")
 */
class Instadeal extends DoctrineModel
{

    const NUME_BRAND = 'nume';
    const BELLETTO_BRAND = 'belletto';

    const NUME_WEBSITE = 'http://numeproducts.com';
    const BELLETTO_WEBSITE = 'http://bellettostudio.com';

    const DEFAULT_NUME_AND_BELLETTO_REDIRECT_PART = '/?utm_source=Instagram&utm_medium=instagram.com&utm_campaign=INSTADEAL&couponcode=INSTADEAL';
    const DEFAULT_NUMESTYLE_REDIRECT_PART = '/?utm_source=numestyle&utm_medium=type-in&utm_campaign=NUMESTYLE&couponcode=NUMESTYLE';

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
    public function getId(){
        return $this->id;
    }

    /**
     * @param mixed $id
     * @return Instadeal
     */
    public function setId($id){
        $this->id = $id;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getBrand(){
        return $this->brand;
    }

    /**
     * @return mixed
     */
    public function setBrand($brand){
        $this->brand = $brand;
        return $this;

    }

    /**
     * @return mixed
     */
    public function getInstadeal(){
        return $this->instadeal;
    }

    /**
     * @return mixed
     */
    public function setInstadeal($instadeal){
        $this->instadeal = $instadeal;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getRedirectUrl(){
        return $this->redirect_url;
    }

    /**
     * @return mixed
     */
    public function setRedirectUrl($redirect_url){
        $this->redirect_url = $redirect_url;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getUtmSource(){
        return $this->utm_source;
    }

    /**
     * @return mixed
     */
    public function setUtmSource($utm_source){
        $this->utm_source = $utm_source;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getUtmMedium(){
        return $this->utm_medium;
    }

    /**
     * @return mixed
     */
    public function setUtmMedium($utm_medium){
        $this->utm_medium = $utm_medium;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getUtmTerm(){
        return $this->utm_term;
    }

    /**
     * @return mixed
     */
    public function setUtmTerm($utm_term){
        $this->utm_term = $utm_term;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getUtmContent(){
        return $this->utm_content;
    }

    /**
     * @return mixed
     */
    public function setUtmContent($utm_content){
        $this->utm_content = $utm_content;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getUtmCampaign(){
        return $this->utm_campaign;
    }

    /**
     * @return mixed
     */
    public function setUtmCampaign($utm_campaign){
        $this->utm_campaign = $utm_campaign;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getCouponCode(){
        return $this->coupon_code;
    }

    /**
     * @return mixed
     */
    public function setCouponCode($coupon_code){
        $this->coupon_code = $coupon_code;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getInstadealUrl(){
        return $this->instadeal_url;
    }

    /**
     * @return mixed
     */
    public function setInstadealUrl($instadeal_url){
        $this->instadeal_url = $instadeal_url;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getResultRedirectUrl(){
        return $this->result_redirect_url;
    }

    /**
     * @return mixed
     */
    public function setResultRedirectUrl($result_redirect_url){
        $this->result_redirect_url = $result_redirect_url;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getCreated(){
        return $this->created;
    }

    /**
     * @return mixed
     */
    public function setCreated($created){
        $this->created = $created;
        return $this;
    }

    public function getDefaultUrlAndBrand(Request $request)
    {
        // Check if belletto, nume or numestyle brand
        if (preg_match("/belletto/", $request->server('HTTP_HOST'))) {
            $brand = self::BELLETTO_BRAND;
            $defaultUrl = self::BELLETTO_WEBSITE;
            // If bellettoinstadeal.com, add parameter
            if (preg_match("/bellettoinstadeals.com$/", $request->server('HTTP_HOST'))) {
                $defaultUrl = $defaultUrl . self::DEFAULT_NUME_AND_BELLETTO_REDIRECT_PART;
            }
        } else {
            $brand = self::NUME_BRAND;
            $defaultUrl = self::NUME_WEBSITE;
            //If numeinstadeals.com or numestyle.com add parameter
            if (preg_match("/numeinstadeals.com$/", $request->server('HTTP_HOST'))) {
                $defaultUrl = $defaultUrl . self::DEFAULT_NUME_AND_BELLETTO_REDIRECT_PART;
            } elseif (preg_match("/numestyle.com$/", $request->server('HTTP_HOST'))) {
                $defaultUrl = $defaultUrl . self::DEFAULT_NUMESTYLE_REDIRECT_PART;
            }
        }

        return [$defaultUrl, $brand];
    }

    function prepareData($data)
    {
        $instadealUrl = '/'.strtoupper(preg_replace("/[^A-Za-z0-9\.\_\-]/", "",$data['instadeal']));

        $data['instadeal'] = strtoupper(preg_replace("/[^A-Za-z0-9\.\_\-]/", "",$data['instadeal']));
        $this->setInstadeal($data['instadeal']);

        $data['instadeal_url'] = $instadealUrl;
        $this->setInstadealUrl($instadealUrl);

        $parsedUrl = parse_url($data['redirect_url']);
        if (!isset($parsedUrl['scheme'])) {
            return false;
        }

        if (!empty($data['utm_source'])) {
            $params['utm_source'] = preg_replace("/[^A-Za-z0-9\.\_\-]/", "",$data['utm_source']);
            $this->setUtmSource($params['utm_source']);
        } else {
            $this->setUtmSource('');
        }

        if (!empty($data['utm_medium'])) {
            $params['utm_medium'] = preg_replace("/[^A-Za-z0-9\.\_\-]/", "",$data['utm_medium']);
            $this->setUtmMedium($params['utm_medium']);
        } else {
            $this->setUtmMedium('');
        }

        if (!empty($data['utm_term'])) {
            $params['utm_term'] = preg_replace("/[^A-Za-z0-9\.\_\-]/", "",$data['utm_term']);
            $this->setUtmTerm($params['utm_term']);
        } else {
            $this->setUtmTerm('');
        }

        if (!empty($data['utm_content'])) {
            $params['utm_content'] =  preg_replace("/[^A-Za-z0-9\.\_\-]/", "",$data['utm_content']);
            $this->setUtmContent($params['utm_content']);
        } else {
            $this->setUtmContent('');
        }

        if (!empty($data['utm_campaign'])) {
            $params['utm_campaign'] = preg_replace("/[^A-Za-z0-9\.\_\-]/", "",$data['utm_campaign']);
            $this->setUtmCampaign($params['utm_campaign']);
        } else {
            $this->setUtmCampaign('');
        }

        if (!empty($data['coupon_code'])) {
            $params['couponcode'] =  preg_replace("/[^A-Za-z0-9\.\_\-]/", "",$data['coupon_code']);
            $this->setCouponCode($params['couponcode']);
        } else {
            $this->setCouponCode('');
        }

        $this->setBrand($data['brand']);
        $this->setRedirectUrl($data['redirect_url']);
        if (!empty($params)) {
            $this->setResultRedirectUrl(rtrim($data['redirect_url'],'/') . '/?' . http_build_query($params));
        } else {
            $this->setResultRedirectUrl(rtrim($data['redirect_url'],'/'));
        }
        $this->setCreated(Carbon::now());

        $this->save();

        return $data;
    }
}
