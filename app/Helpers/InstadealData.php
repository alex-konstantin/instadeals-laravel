<?php

namespace App\Helpers;

use Illuminate\Http\Request;

class InstadealData
{

    const NUME_BRAND = 'nume';
    const BELLETTO_BRAND = 'belletto';

    const NUME_WEBSITE = 'http://numeproducts.com';
    const BELLETTO_WEBSITE = 'http://bellettostudio.com';

    const BELLETTO_INSTADEAL_HOST = 'bellettoinstadeals.com';
    const BELLETTO_INSTADEAL_HOST_DEFAULT = 'belletto';
    const NUME_INSTADEAL_HOST = 'numeinstadeals.com';
    const NUMESTYLE_INSTADEAL_HOST = 'numestyle.com';

    const DEFAULT_NUME_AND_BELLETTO_REDIRECT_PART = '/?utm_source=Instagram&utm_medium=instagram.com&utm_campaign=INSTADEAL&couponcode=INSTADEAL';
    const DEFAULT_NUMESTYLE_REDIRECT_PART = '/?utm_source=numestyle&utm_medium=type-in&utm_campaign=NUMESTYLE&couponcode=NUMESTYLE';

    protected $urlParameters = [
        'utm_source',
        'utm_medium',
        'utm_term',
        'utm_content',
        'utm_campaign',
        'coupon_code'
    ];

    public function getDefaultUrl(Request $request)
    {
        $host = $request->server('HTTP_HOST');
        switch (true) {
            case (str_contains(self::BELLETTO_INSTADEAL_HOST, $host)):
                return self::BELLETTO_WEBSITE . self::DEFAULT_NUME_AND_BELLETTO_REDIRECT_PART;
            case (str_contains(self::NUME_INSTADEAL_HOST, $host)):
                return self::NUME_WEBSITE . self::DEFAULT_NUME_AND_BELLETTO_REDIRECT_PART;
            case (str_contains(self::NUMESTYLE_INSTADEAL_HOST, $host)):
                return self::NUME_WEBSITE . self::DEFAULT_NUMESTYLE_REDIRECT_PART;
            case (!str_contains(self::BELLETTO_INSTADEAL_HOST, $host) && str_contains(self::BELLETTO_INSTADEAL_HOST_DEFAULT, $host)):
                return self::BELLETTO_WEBSITE;
            default:
                return self::NUME_WEBSITE;
        }
    }

    public function getBrand(Request $request)
    {
        if (str_contains($request->server('HTTP_HOST'), self::BELLETTO_INSTADEAL_HOST_DEFAULT)) {
            return self::BELLETTO_BRAND;
        }
        return self::NUME_BRAND;
    }

    public function prepareData($data)
    {
        $data['instadeal_url'] = '/'.strtoupper($this->replaceSpecificSymbols($data['instadeal']));
        $data['instadeal'] = strtoupper($this->replaceSpecificSymbols($data['instadeal']));

        $parsedUrl = parse_url($data['redirect_url']);
        if (!isset($parsedUrl['scheme'])) {
            return false;
        }

        foreach ($data as $key => &$value) {
            if (in_array($key, $this->urlParameters) && !empty($value)) {
                $data[$key] = $params[$key] = $this->replaceSpecificSymbols($value);
            }
        }

        if (!empty($params)) {
            $data['result_redirect_url'] = rtrim($data['redirect_url'],'/') . '/?' . http_build_query($params);
        } else {
            $data['result_redirect_url'] = rtrim($data['redirect_url'],'/');
        }

        return $data;
    }

    protected function replaceSpecificSymbols($str)
    {
        if ($str) {
            return  preg_replace("/[^A-Za-z0-9\.\_\-]/", "",$str);
        }
        return '';
    }
}