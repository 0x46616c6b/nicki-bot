<?php

namespace Systemli\Component\Twitter\Model;

use JMS\Serializer\Annotation\Type;

/**
 * @author louis <louis@systemli.org>
 */
class TweetEntities implements TweetEntitiesInterface
{
    /**
     * @Type("array")
     *
     * @var array
     */
    private $hashtags;

    /**
     * @Type("array")
     *
     * @var array
     */
    private $symbols;

    /**
     * @Type("array")
     *
     * @var array
     */
    private $urls;

    /**
     * @Type("array")
     *
     * @var array
     */
    private $userMentions;

    /**
     * @Type("array")
     *
     * @var array
     */
    private $media;

    /**
     * {@inheritDoc}
     */
    public function getHashtags()
    {
        return $this->hashtags;
    }

    /**
     * {@inheritDoc}
     */
    public function getSymbols()
    {
        return $this->symbols;
    }

    /**
     * {@inheritDoc}
     */
    public function getUrls()
    {
        return $this->urls;
    }

    /**
     * {@inheritDoc}
     */
    public function getUserMentions()
    {
        return $this->userMentions;
    }

    /**
     * {@inheritDoc}
     */
    public function getMedia()
    {
        return $this->media;
    }

    /**
     * {@inheritDoc}
     */
    function hasSymbols()
    {
        return count($this->symbols) > 0;
    }

    /**
     * {@inheritDoc}
     */
    function hasHashTags()
    {
        return count($this->hashtags) > 0;
    }

    /**
     * {@inheritDoc}
     */
    function hasUserMentions()
    {
        return count($this->userMentions) > 0;
    }

    /**
     * {@inheritDoc}
     */
    function hasUrls()
    {
        return count($this->urls) > 0;
    }
}