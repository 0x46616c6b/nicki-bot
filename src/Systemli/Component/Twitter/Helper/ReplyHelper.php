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
     * @var ReplyDeciderInterface
     */
    private $decider;

    /**
     * @param ReplyDeciderInterface $decider
     */
    public function __construct(ReplyDeciderInterface $decider)
    {
        $this->decider = $decider;
    }

    /**
     * @param TweetInterface $tweet
     * @return bool
     */
    public function isPossibleReply(TweetInterface $tweet)
    {
        return $this->decider->decide($tweet);
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