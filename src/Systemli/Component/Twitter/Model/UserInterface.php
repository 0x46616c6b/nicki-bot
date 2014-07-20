<?php

namespace Systemli\Component\Twitter\Model;

/**
 * @author louis <louis@systemli.org>
 */
interface UserInterface
{
    /**
     * @param string $description
     */
    function setDescription($description);

    /**
     * @param string $url
     */
    function setUrl($url);

    /**
     * @return string
     */
    function getLang();

    /**
     * @param int $followersCount
     */
    function setFollowersCount($followersCount);

    /**
     * @return string
     */
    function getName();

    /**
     * @param string $id
     */
    function setId($id);

    /**
     * @return int
     */
    function getFriendsCount();

    /**
     * @return string
     */
    function getScreenName();

    /**
     * @param int $friendsCount
     */
    function setFriendsCount($friendsCount);

    /**
     * @param \DateTime $createdAt
     */
    function setCreatedAt($createdAt);

    /**
     * @return int
     */
    function getFollowersCount();

    /**
     * @return int
     */
    function getFavouritesCount();

    /**
     * @param string $screenName
     */
    function setScreenName($screenName);

    /**
     * @param string $name
     */
    function setName($name);

    /**
     * @return int
     */
    function getStatusesCount();

    /**
     * @return string
     */
    function getDescription();

    /**
     * @return string
     */
    function getUrl();

    /**
     * @return string
     */
    function getId();

    /**
     * @return int
     */
    function getListedCount();

    /**
     * @param int $favoritesCount
     */
    function setFavouritesCount($favoritesCount);

    /**
     * @param int $statusCount
     */
    function setStatusesCount($statusCount);

    /**
     * @param string $lang
     */
    function setLang($lang);

    /**
     * @param int $listsCount
     */
    function setListedCount($listsCount);

    /**
     * @return \DateTime
     */
    function getCreatedAt();
}