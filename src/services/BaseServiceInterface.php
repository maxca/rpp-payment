<?php

namespace Samark\RppPayment\Services;

/**
 * Interface BaseServiceInterface
 * @package Samark\RppPayment\Services
 * @author samark chisanguan <samarkchsngn@gmail.com>
 */
interface BaseServiceInterface
{

    /**
     * @param array $params
     * @return mixed
     */
    public function callGet($params = []);

    /**
     * @param array $params
     * @return mixed
     */
    public function callPost($params = []);

    /**
     * @param array $params
     * @return mixed
     */
    public function callDelete($params = []);

    /**
     * @param array $params
     * @return mixed
     */
    public function callUpdate($params = []);

    /**
     * @param array $params
     * @param array $multipart
     * @return mixed
     */
    public function callUpload($params = [], $multipart = []);

    /**
     * @param array $params
     * @return mixed
     */
    public function callPostBasicAuth($params = []);

    /**
     * @param array $params
     * @param null $token
     * @return mixed
     */
    public function callPostBearerAuth($params = [], $token = null);
}