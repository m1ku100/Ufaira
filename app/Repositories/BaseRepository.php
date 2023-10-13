<?php

namespace App\Repositories;

class BaseRepository
{
    /**
     * Mengirim respon berupa RepositoryReponse agar bisa melakukan return dengan membawa
     * banyak data
     *
     * @param bool $success
     * @param array $data
     * @param string $display_message
     * @param string $dev_message
     *
     * @return \App\Repositories\RepositoryResponse
     */
    protected function response($success = true, $data = [], $display_message = '', $dev_message = '')
    {
        $response = new RepositoryResponse(
            $success, $data, $display_message, $dev_message
        );

        return $response;
    }

    /**
     * Mengirim response error
     *
     * @param string $display_message
     * @param string $dev_message
     * @return \App\Repositories\RepositoryResponse
     */
    protected function errorResponse($display_message = '', $dev_message)
    {
        $response = $this->response(false, [], $display_message, $dev_message);

        return $response;
    }

    /**
     * Mengirim response sukses
     *
     * @param array $data
     * @return \App\Repositories\RepositoryResponse
     */
    protected function successResponse($data = [])
    {
        $response = $this->response(true, $data);

        return $response;
    }
}
