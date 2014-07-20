<?php

namespace Systemli\Component\Twitter\Helper;

use Systemli\Component\Twitter\Model\TweetInterface;

/**
 * @author louis <louis@systemli.org>
 */
class ReplyLanguageDecider implements ReplyDeciderInterface
{
    /**
     * {@inheritDoc}
     */
    function decide(TweetInterface $tweet)
    {
        return $tweet->getLang() === "de" && $tweet->getUser()->getLang() === "de";
    }
}