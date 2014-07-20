<?php

namespace Systemli\Component\Twitter\Model;

use JMS\Serializer\Annotation\Type;

/**
 * @author louis <louis@systemli.org>
 */
class User implements UserInterface
{
    /**
     * @Type("string")
     *
     * @var string
     */
    private $id;

    /**
     * @Type("string")
     *
     * @var string
     */
    private $name;

    /**
     * @Type("string")
     *
     * @var string
     */
    private $screenName;

    /**
     * @Type("string")
     *
     * @var string
     */
    private $description;

    /**
     * @Type("string")
     *
     * @var string
     */
    private $url;

    /**
     * @Type("integer")
     *
     * @var int
     */
    private $followersCount;

    /**
     * @Type("integer")
     *
     * @var int
     */
    private $friendsCount;

    /**
     * @Type("integer")
     *
     * @var int
     */
    private $listedCount;

    /**
     * Fri Jul 18 16:36:25 +0000 2014
     *
     * @Type("DateTime<'D M d H:i:s T Y'>")
     *
     * @var \DateTime
     */
    private $createdAt;

    /**
     * @Type("integer")
     *
     * @var int
     */
    private $favouritesCount;

    /**
     * @Type("integer")
     *
     * @var int
     */
    private $statusesCount;

    /**
     * @Type("string")
     *
     * @var string
     */
    private $lang;

    /**
     * {@inheritDoc}
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * {@inheritDoc}
     */
    public function setId($id)
    {
        $this->id = $id;
    }

    /**
     * {@inheritDoc}
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * {@inheritDoc}
     */
    public function setName($name)
    {
        $this->name = $name;
    }

    /**
     * {@inheritDoc}
     */
    public function getScreenName()
    {
        return $this->screenName;
    }

    /**
     * {@inheritDoc}
     */
    public function setScreenName($screenName)
    {
        $this->screenName = $screenName;
    }

    /**
     * {@inheritDoc}
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * {@inheritDoc}
     */
    public function setDescription($description)
    {
        $this->description = $description;
    }

    /**
     * {@inheritDoc}
     */
    public function getUrl()
    {
        return $this->url;
    }

    /**
     * {@inheritDoc}
     */
    public function setUrl($url)
    {
        $this->url = $url;
    }

    /**
     * {@inheritDoc}
     */
    public function getFollowersCount()
    {
        return $this->followersCount;
    }

    /**
     * {@inheritDoc}
     */
    public function setFollowersCount($followersCount)
    {
        $this->followersCount = $followersCount;
    }

    /**
     * {@inheritDoc}
     */
    public function getFriendsCount()
    {
        return $this->friendsCount;
    }

    /**
     * {@inheritDoc}
     */
    public function setFriendsCount($friendsCount)
    {
        $this->friendsCount = $friendsCount;
    }

    /**
     * {@inheritDoc}
     */
    public function getListedCount()
    {
        return $this->listedCount;
    }

    /**
     * {@inheritDoc}
     */
    public function setListedCount($listsCount)
    {
        $this->listedCount = $listsCount;
    }

    /**
     * {@inheritDoc}
     */
    public function getCreatedAt()
    {
        return $this->createdAt;
    }

    /**
     * {@inheritDoc}
     */
    public function setCreatedAt($createdAt)
    {
        $this->createdAt = $createdAt;
    }

    /**
     * {@inheritDoc}
     */
    public function getFavouritesCount()
    {
        return $this->favouritesCount;
    }

    /**
     * {@inheritDoc}
     */
    public function setFavouritesCount($favoritesCount)
    {
        $this->favouritesCount = $favoritesCount;
    }

    /**
     * {@inheritDoc}
     */
    public function getStatusesCount()
    {
        return $this->statusesCount;
    }

    /**
     * {@inheritDoc}
     */
    public function setStatusesCount($statusCount)
    {
        $this->statusesCount = $statusCount;
    }

    /**
     * {@inheritDoc}
     */
    public function getLang()
    {
        return $this->lang;
    }

    /**
     * {@inheritDoc}
     */
    public function setLang($lang)
    {
        $this->lang = $lang;
    }
}