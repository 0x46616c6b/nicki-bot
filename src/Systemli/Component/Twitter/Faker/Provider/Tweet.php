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
        "@{{username}} es wäre utopisch, wenn du in Zukunft Nicki statt T-Shirt verwendest.",
        "@{{username}} bitte streiche T-Shirt aus deinem Wortschatz und benutze wieder Nicki. Danke!",
        "@{{username}} gegen den Trend, Nicki statt T-Shirt!",
        "@{{username}} bitte verwende keine Begriffe des Klassenfeindes. Nicki statt T-Shirt!",
        "@{{username}} früher war nicht alles schlecht. Nicki statt T-Shirt!",
    );

    public function tweet()
    {
        return static::randomElement(static::$tweets);
    }
}