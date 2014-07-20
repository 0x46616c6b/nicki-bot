<?php

namespace Systemli\Component\Twitter\Model;

/**
 * @author louis <louis@systemli.org>
 */
interface TweetEntitiesInterface
{
    /**
     * @return array
     */
    function getSymbols();

    /**
     * @param array $media
     */
    function setMedia($media);

    /**
     * @return array
     */
    function getHashtags();

    /**
     * @param array $userMentions
     */
    function setUserMentions($userMentions);

    /**
     * @param array $hashtags
     */
    function setHashtags($hashtags);

    /**
     * @param array $urls
     */
    function setUrls($urls);

    /**
     * @return array
     */
    function getUserMentions();

    /**
     * @param array $symbols
     */
    function setSymbols($symbols);

    /**
     * @return array
     */
    function getUrls();

    /**
     * @return array
     */
    function getMedia();
}