<?php

namespace Systemli\Component\Twitter\Helper;

use Systemli\Component\Twitter\Model\TweetInterface;

/**
 * @author louis <louis@systemli.org>
 */
class ReplyTypeDecider implements ReplyDeciderInterface
{
    /**
     * {@inheritDoc}
     */
    function decide(TweetInterface $tweet)
    {
        return null === $tweet->getInReplyToStatusId() && !$tweet->getRetweeted();
    }
}