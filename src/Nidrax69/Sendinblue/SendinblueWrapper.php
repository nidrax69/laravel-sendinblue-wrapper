<?php namespace Nidrax69\Sendinblue;

use Sendinblue\Mailin;

/**
 * Class SendinblueWrapper
 * Valid method/property list as of version SendInBlue API 2.
 *
 * For eg:
 * @method create_campaign() create a campaign using the Campaing API
 * @method send_email() send a transactional email using the SMTP API
 * @method send_sms() send a SMS using the SMS API
 */
class SendinblueWrapper {
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
    public function __construct(Mailin $ml)
    {
        $this->ml = $ml;
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
        // If it's a method, call it
        if(method_exists($this->ml, $method))
        {
            return call_user_func_array(array($this->ml, $method), $args);
        }

        // Otherwise, treat it as a property
        return $this->ml->{$method};
    }
}