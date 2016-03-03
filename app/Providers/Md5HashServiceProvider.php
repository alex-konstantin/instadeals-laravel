<?php
namespace App\Providers;

use App\Helpers\Md5Hasher;
use Illuminate\Hashing\HashServiceProvider;

class Md5HashServiceProvider extends HashServiceProvider {

    public function register()
    {
        parent::register();

        $this->app->singleton('hash', function()
        {
            return new Md5Hasher();
        });
    }

}