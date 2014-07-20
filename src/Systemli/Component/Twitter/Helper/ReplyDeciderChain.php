<?php

namespace Systemli\Component\Twitter\Helper;

use Systemli\Component\Twitter\Model\TweetInterface;

/**
 * @author louis <louis@systemli.org>
 */
class ReplyDeciderChain implements ReplyDeciderInterface
{
    /**
     * @var ReplyDeciderInterface[]
     */
    private $decider = array();

    /**
     * @param ReplyDeciderInterface $decider
     */
    public function setDecider(ReplyDeciderInterface $decider)
    {
        $this->decider[] = $decider;
    }

    /**
     * {@inheritDoc}
     */
    function decide(TweetInterface $tweet)
    {
        foreach ($this->decider as $decider) {
            if (true !== $decider->decide($tweet)) {
                return false;
            }
        }

        return true;
    }

}