<?php

namespace Adiq;

use Adiq\Anonymous;

class Routes
{
    /**
     * @return \Adiq\Anonymous
     */
    public static function payment()
    {
        $anonymous = new Anonymous();

        $anonymous->request = static function () {
            return Client::VERSION_API . 'payments';
        };

        $anonymous->details = static function ($id) {
            return Client::VERSION_API . "payments/$id";
        };

        $anonymous->cancel = static function ($id) {
            return Client::VERSION_API . "payments/$id/cancel";
        };

        $anonymous->capture = static function ($id) {
            return Client::VERSION_API . "payments/$id/capture";
        };

        return $anonymous;
    }
    
    /**
     * @return \Adiq\Anonymous
     */
    public static function card()
    {
        $anonymous = new Anonymous();

        $anonymous->token = static function () {
            return Client::VERSION_API . 'tokens/cards';
        };

        $anonymous->vaults = static function () {
            return Client::VERSION_API . "vaults/cards";
        };

        return $anonymous;
    }
    
    /**
     * @return \Adiq\Anonymous
     */
    public static function marketplace()
    {
        $anonymous = new Anonymous();

        $anonymous->unlock = static function ($id) {
            return Client::VERSION_API . "payments/$id/unlock/";
        };

        return $anonymous;
    }

      /**
     * @return \Adiq\Anonymous
     */
    public static function auth()
    {
        $anonymous = new Anonymous();

        $anonymous->token = static function () {
            return 'auth/oauth2/v1/token';
        };
        return $anonymous;
    }
}
