<?php

namespace Systemli\Component\Twitter\Model;

use JMS\Serializer\Annotation\Type;

/**
 * @author louis <louis@systemli.org>
 */
class Tweet implements TweetInterface
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
    private $text;

    /**
     * @Type("string")
     *
     * @var string
     */
    private $source;

    /**
     * Fri Jul 18 16:36:25 +0000 2014
     *
     * @Type("DateTime<'D M d H:i:s T Y'>")
     *
     * @var \DateTime
     */
    private $createdAt;

    /**
     * @Type("Systemli\Component\Twitter\Model\User")
     *
     * @var User
     */
    private $user;

    /**
     * @Type("string")
     *
     * @var string
     */
    private $inReplyToStatusId;

    /**
     * @Type("string")
     *
     * @var string
     */
    private $inReplyToScreenName;

    /**
     * @Type("integer")
     *
     * @var int
     */
    private $retweetCount;

    /**
     * @Type("integer")
     *
     * @var int
     */
    private $favoriteCount;

    /**
     * @Type("string")
     *
     * @var string
     */
    private $lang;

    /**
     * @Type("Systemli\Component\Twitter\Model\TweetEntities")
     *
     * @var TweetEntities
     */
    private $entities;

    /**
     * @Type("boolean")
     *
     * @var bool
     */
    private $retweeted;

    /**
     * {@inhitDoc}
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * {@inhitDoc}
     */
    public function getText()
    {
        return $this->text;
    }

    /**
     * {@inhitDoc}
     */
    public function getSource()
    {
        return $this->source;
    }

    /**
     * {@inhitDoc}
     */
    public function getCreatedAt()
    {
        return $this->createdAt;
    }

    /**
     * {@inhitDoc}
     */
    public function getUser()
    {
        return $this->user;
    }

    /**
     * {@inhitDoc}
     */
    public function getInReplyToStatusId()
    {
        return $this->inReplyToStatusId;
    }

    /**
     * {@inhitDoc}
     */
    public function getInReplyToScreenName()
    {
        return $this->inReplyToScreenName;
    }

    /**
     * {@inhitDoc}
     */
    public function getRetweetCount()
    {
        return $this->retweetCount;
    }

    /**
     * {@inhitDoc}
     */
    public function getFavoriteCount()
    {
        return $this->favoriteCount;
    }

    /**
     * {@inhitDoc}
     */
    public function getLang()
    {
        return $this->lang;
    }

    /**
     * {@inhitDoc}
     */
    public function getEntities()
    {
        return $this->entities;
    }

    /**
     * {@inhitDoc}
     */
    public function getRetweeted()
    {
        return $this->retweeted;
    }
}