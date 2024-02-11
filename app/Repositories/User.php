<?php

namespace WPC\Repositories;

use WPC\Adapters\HTTP_Client;

class User
{
    private ?HTTP_Client $HTTP_Client;

    public function __construct()
    {
        $this->HTTP_Client = new HTTP_Client();
    }

    /**
     * Get a list of the users.
     *
     * @return array Users list.
     */
    public function getList(): array
    {
        $request = $this->HTTP_Client->request("https://jsonplaceholder.typicode.com/users/");
        $data = array();
        if (!is_wp_error($request) && !empty($request['body'])) {
            $data = json_decode($request['body'], true);
        }
        return is_array($data) ? $data : array();
    }

    /**
     * Get user information by id.
     *
     * @param int $id
     * @return array User item.
     */
    public function getUser(int $id): array
    {
        $request = $this->HTTP_Client->request("https://jsonplaceholder.typicode.com/users/" . $id);
        $data = array();
        if (!is_wp_error($request) && !empty($request['body'])) {
            $data = json_decode($request['body'], true);
        }
        return is_array($data) ? $data : array();
    }
}