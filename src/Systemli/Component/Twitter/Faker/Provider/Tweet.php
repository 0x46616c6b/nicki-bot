<?php

namespace Systemli\Component\Twitter\Faker\Provider;

use Faker\Provider\Base;

/**
 * @author louis <louis@systemli.org>
 */
class Tweet extends Base
{
    protected static $tweets = array(
        "@{{username}} kann es sein das du Nicki meinst?",
        "@{{username}} wieso T-Shirt? Im Osten sagt man Nicki!",
        "@{{username}} das heißt Nicki!",
        "Was soll denn ein T-Shirt sein? Oder meint @{{username}} etwa ein Nicki?",
    );

    public function tweet()
    {
        return static::randomElement(static::$tweets);
    }
}