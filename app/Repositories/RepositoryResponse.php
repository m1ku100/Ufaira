<?php

namespace App\Repositories;

class RepositoryResponse
{
    protected $success;

    protected $display_message;

    protected $dev_message;

    protected $data;

    public function __construct($success = true, $data = [], $display_message = '', $dev_message = '')
    {
        $this->success = $success;
        $this->data = $data;
        $this->display_message = $display_message;
        $this->dev_message = $dev_message;
    }

    public function success()
    {
        return $this->success;
    }

    public function getData()
    {
        return $this->data;
    }

    public function getMessage()
    {
        return $this->display_message;
    }

    public function getDeveloperMessage()
    {
        return $this->dev_message;
    }
}
