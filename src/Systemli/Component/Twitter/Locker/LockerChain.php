<?php

namespace Systemli\Component\Twitter\Locker;

use Systemli\Component\Twitter\Model\TweetInterface;

class LockerChain implements LockerInterface
{
    /**
     * @var LockerInterface[]
     */
    private $locker = array();

    /**
     * @param LockerInterface $locker
     */
    public function setLocker(LockerInterface $locker)
    {
        $this->locker[] = $locker;
    }

    /**
     * {@inheritDoc}
     */
    public function lock(TweetInterface $tweet)
    {
        foreach ($this->locker as $locker) {
            $locker->lock($tweet);
        }
    }

    /**
     * {@inheritDoc}
     */
    public function isLocked(TweetInterface $tweet)
    {
        $isLocked = false;

        foreach ($this->locker as $locker) {
            if ($isLocked) {
                continue;
            }

            $isLocked = $locker->isLocked($tweet);
        }

        return $isLocked;
    }
}