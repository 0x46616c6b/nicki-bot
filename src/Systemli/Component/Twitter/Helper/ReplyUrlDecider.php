<?php

namespace Systemli\Component\Twitter\Helper;

use Systemli\Component\Twitter\Model\TweetInterface;

/**
 * @author louis <louis@systemli.org>
 */
class ReplyUrlDecider implements ReplyDeciderInterface
{
    private $pattern = array(
        '/(amazon\.de|amazon\.com|kleinanzeigen\.ebay\.de|ebay\.de|spreadshirt\.de)/i'
    );

    /**
     * {@inheritDoc}
     */
    function decide(TweetInterface $tweet)
    {
        if ($tweet->getEntities()->hasUrls()) {
            foreach ($tweet->getEntities()->getUrls() as $url) {
                if (isset($url['display_url'])) {
                    foreach ($this->pattern as $pattern) {
                        if (preg_match($pattern, $url['display_url']) == 1) {
                            return false;
                        }
                    }
                }
            }
        }

        return true;
    }

}