<?php

namespace Systemli\Component\Twitter\Helper;

use Systemli\Component\Twitter\Model\TweetInterface;

/**
 * @author louis <louis@systemli.org>
 */
class ReplyContentDecider implements ReplyDeciderInterface
{
    private $pattern = array(
        '/(^rt |nicki|spreadshirt|offer|deal|archiv|preisabschlag|israel|gaza|angebot)/i',
    );

    /**
     * {@inheritDoc}
     */
    function decide(TweetInterface $tweet)
    {
        foreach ($this->pattern as $pattern) {
            if (preg_match($pattern, $tweet->getText()) == 1) {
                return false;
            }
        }

        return true;
    }
}