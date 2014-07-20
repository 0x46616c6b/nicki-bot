<?php

namespace Systemli\Component\Twitter\Model;

/**
 * @author louis <louis@systemli.org>
 */
interface UserInterface
{
    /**
     * @return string
     */
    function getLang();

    /**
     * @return string
     */
    function getName();

    /**
     * @return int
     */
    function getFriendsCount();

    /**
     * @return string
     */
    function getScreenName();

    /**
     * @return int
     */
    function getFollowersCount();

    /**
     * @return int
     */
    function getFavouritesCount();

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
     * @return \DateTime
     */
    function getCreatedAt();
}