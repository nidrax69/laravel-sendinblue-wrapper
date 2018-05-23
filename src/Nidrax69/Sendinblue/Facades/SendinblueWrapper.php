<?php namespace Nidrax69\Sendinblue\Facades;

use Illuminate\Support\Facades\Facade;

/**
 * Class SendinBlueWrapper
 */
class SendinblueWrapper extends Facade
{
    protected static function getFacadeAccessor()
    {
        return 'sendinblue_wrapper';
    }
}