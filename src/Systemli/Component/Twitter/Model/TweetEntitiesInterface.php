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
     * @return array
     */
    function getHashtags();

    /**
     * @return array
     */
    function getUserMentions();

    /**
     * @return array
     */
    function getUrls();

    /**
     * @return array
     */
    function getMedia();

    /**
     * @return bool
     */
    function hasSymbols();

    /**
     * @return bool
     */
    function hasHashTags();

    /**
     * @return bool
     */
    function hasUserMentions();

    /**
     * @return bool
     */
    function hasUrls();
}