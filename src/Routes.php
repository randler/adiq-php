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

        $anonymous->create = static function () {
            return Client::LATEST_VERSION_API . 'payments';
        };

        $anonymous->details = static function ($id, $date) {
            return Client::VERSION_API . "payments/$id" . ($date ? "/$date" : '');
        };

        $anonymous->cancel = static function ($id) {
            return Client::VERSION_API . "payments/$id/cancel";
        };

        $anonymous->capture = static function ($id) {
            return Client::VERSION_API . "payments/$id/capture";
        };

        $anonymous->validate = static function () {
            return Client::VERSION_API . "payments/validate";
        };

        return $anonymous;
    }

    /**
     * @return \Adiq\Anonymous
     */
    public static function card()
    {
        $anonymous = new Anonymous();

        $anonymous->tokens = static function () {
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
