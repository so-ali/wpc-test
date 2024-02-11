<?php

namespace WPC\Adapters;

/**
 * The plugin http client class.
 */
class HTTP_Client
{
    /**
     * @var Cache|null Caching system.
     */
    private ?Cache $cache;

    public function __construct()
    {
        $this->cache = new Cache();
    }

    /**
     * HTTP request builder.
     *
     * @param string $url Request url.
     * @param array $data Request data.
     * @param string $method Request method.
     * @param array $headers Request custom headers.
     * @return array|\WP_Error
     */
    public function request(string $url, array $data = array(), string $method = "GET", array $headers = array())
    {
        $requestData = array();
        if (!empty($headers)) {
            $requestData['headers'] = $headers;
        }

        if (!empty($data)) {
            $requestData['body'] = $data;
        }

        $cacheName = sha1($url . json_encode($data) . $method);
        $request = $this->cache->get($cacheName);

        if (!empty($request)) {
            return $request;
        }

        $request = wp_remote_get($url, $requestData);

        if ("POST" === $method) {
            $request = wp_remote_post($url, $requestData);
        }

        if (!is_wp_error($request)) {
            $this->cache->set($cacheName, $request, 3600);
        }

        return $request;
    }
}