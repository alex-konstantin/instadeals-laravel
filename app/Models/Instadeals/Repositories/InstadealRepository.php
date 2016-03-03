<?php

namespace App\Models\Instadeals\Repositories;

use App\Models\Instadeals\Entities\Instadeal as Instadeal;
use Doctrine\ORM\Query;
use App\Contracts\DoctrineRepository;

class InstadealRepository extends DoctrineRepository
{
    public function getRedirectUrl($uri, $brand)
    {
        return $this->findOneBy([
            'instadeal_url' => '/'.$uri,
            'brand' => $brand
        ]);
    }
}