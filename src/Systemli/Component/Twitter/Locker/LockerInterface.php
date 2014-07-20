<?php

namespace Systemli\Component\Twitter\Locker;

use Systemli\Component\Twitter\Model\TweetInterface;

/**
 * @author louis <louis@systemli.org>
 */
interface LockerInterface
{
    /**
     * @param TweetInterface $tweet
     * @return bool
     */
    function isLocked(TweetInterface $tweet);
}