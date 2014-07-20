<?php

namespace Systemli\Component\Twitter\Helper;

use Systemli\Component\Twitter\Locker\LockerInterface;
use Systemli\Component\Twitter\Model\TweetInterface;

class ReplyLockDecider implements ReplyDeciderInterface
{
    /**
     * @var LockerInterface
     */
    private $locker;

    /**
     * @param LockerInterface $locker
     */
    public function __construct(LockerInterface $locker)
    {
        $this->locker = $locker;
    }

    /**
     * {@inheritDoc}
     */
    function decide(TweetInterface $tweet)
    {
        return !$this->locker->isLocked($tweet);
    }
}