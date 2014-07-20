<?php

namespace Systemli\Component\Twitter\Helper;

use Systemli\Component\Twitter\Model\TweetInterface;

/**
 * @author louis <louis@systemli.org>
 */
interface ReplyDeciderInterface
{
    /**
     * @param TweetInterface $tweet
     *
     * @return bool
     */
    function decide(TweetInterface $tweet);
}