<?php

namespace Systemli\Component\Twitter\Helper;

use Faker\Generator;
use Systemli\Component\Twitter\Faker\Provider\Tweet;
use Systemli\Component\Twitter\Locker\LockerInterface;
use Systemli\Component\Twitter\Model\TweetInterface;

/**
 * @author louis <louis@systemli.org>
 */
class ReplyHelper
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
     * @param TweetInterface $tweet
     * @return bool
     */
    public function isPossibleReply(TweetInterface $tweet)
    {
        // TODO: Replace with ReplyDeciderChain
        return $tweet->getLang() === "de" &&
            $tweet->getUser()->getLang() === "de" &&
            null === $tweet->getInReplyToStatusId() &&
            !$this->locker->isLocked($tweet) &&
            $tweet->getRetweeted() == false &&
            preg_match('/^rt /i', $tweet->getText()) == false &&
            preg_match('/nicki/i', $tweet->getText()) == false
            ;
    }

    /**
     * @param TweetInterface $tweet
     *
     * @return string
     */
    public function generateReplyMessage(TweetInterface $tweet)
    {
        $faker = new Generator();
        $faker->addProvider(new Tweet($faker));

        return str_replace('{{username}}', $tweet->getUser()->getScreenName(), $faker->tweet());
    }
}