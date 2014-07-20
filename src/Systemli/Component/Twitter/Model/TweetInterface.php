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
     * @param string $text
     */
    function setText($text);

    /**
     * @return int
     */
    function getRetweetCount();

    /**
     * @param string $id
     */
    function setId($id);

    /**
     * @return User
     */
    function getUser();

    /**
     * @param string $source
     */
    function setSource($source);

    /**
     * @param \DateTime $createdAt
     */
    function setCreatedAt($createdAt);

    /**
     * @param int $favoriteCount
     */
    function setFavoriteCount($favoriteCount);

    /**
     * @param int $retweetCount
     */
    function setRetweetCount($retweetCount);

    /**
     * @param string $inReplyToScreenName
     */
    function setInReplyToScreenName($inReplyToScreenName);

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
     * @param string $inReplyToStatusId
     */
    function setInReplyToStatusId($inReplyToStatusId);

    /**
     * @param User $user
     */
    function setUser($user);

    /**
     * @return \DateTime
     */
    function getCreatedAt();

    /**
     * @return string
     */
    function getLang();

    /**
     * @param string $lang
     */
    function setLang($lang);

    /**
     * @return array
     */
    function getEntities();

    /**
     * @param array $entities
     */
    function setEntities(array $entities);
}