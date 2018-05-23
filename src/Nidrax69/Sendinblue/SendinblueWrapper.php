<?php namespace Nidrax69\Sendinblue;

use Sendinblue\Mailin;
use Illuminate\Support\Facades\Config;

/**
 * Class SendinblueWrapper
 * Valid method/property list as of version SendInBlue API 2.
 *
 * For eg:
 * @method create_campaign() create a campaign using the Campaing API
 * @method send_email() send a transactional email using the SMTP API
 * @method send_sms() send a SMS using the SMS API
 */
class SendinblueWrapper extends Mailin {
    /**
     * Field is instance of class Mailin
     *
     * @var ml
     */
    protected $ml;

    /**
     * Constructor
     *
     * @param Mailin $ml
     * @return void
     */
    public function __construct()
    {
        parent::__construct('https://api.sendinblue.com/v2.0', config('sendinblue.apikey'));
    }

    /**
     * Proxies call to the underlying Sendinblue API
     *
     * @param $method
     * @param array $args
     * @return mixed
     */
    public function __call($method, array $args)
    {
        parent::__call($method, $args);
    }
}