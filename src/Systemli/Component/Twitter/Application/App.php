<?php

namespace Systemli\Component\Twitter\Application;

/**
 * @author louis <louis@systemli.org>
 */
class App extends \TTools\App
{
    /**
     * @param array $config
     */
    public function __construct(array $config)
    {
        parent::__construct($config);
    }

    /**
     * @param $term
     * @param array $params
     *
     * @return array
     */
    public function search($term, array $params)
    {
        return $this->get(
            '/search/tweets.json',
            array_merge(['q' => urlencode($term)], $params)
        );
    }

    /**
     * @param $status
     * @param $replyStatusId
     * @param array $params
     *
     * @return array
     */
    public function reply($status, $replyStatusId, array $params = array())
    {
        return $this->post(
            '/statuses/update.json',
            array_merge(['status' => $status, 'in_reply_to_status_id' => $replyStatusId], $params)
        );
    }
}