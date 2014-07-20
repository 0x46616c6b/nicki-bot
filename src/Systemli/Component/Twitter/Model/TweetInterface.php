<?php

namespace Systemli\Component\Twitter\Model;

/**
 * @author louis <louis@systemli.org>
 */
interface TweetInterface
{
    /**
     * @return string
     */
    function getInReplyToStatusId();

    /**
     * @return int
     */
    function getRetweetCount();

    /**
     * @return User
     */
    function getUser();

    /**
     * @return string
     */
    function getText();

    /**
     * @return string
     */
    function getSource();

    /**
     * @return string
     */
    function getInReplyToScreenName();

    /**
     * @return int
     */
    function getFavoriteCount();

    /**
     * @return string
     */
    function getId();

    /**
     * @return \DateTime
     */
    function getCreatedAt();

    /**
     * @return string
     */
    function getLang();

    /**
     * @return array
     */
    function getEntities();

    /**
     * @return bool
     */
    function getRetweeted();
}