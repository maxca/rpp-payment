<?php

namespace Samark\RppPayment\Services;

use Samark\RppPayment\Traits\DataCurlGuzzleTrait;

/**
 * Class BaseService
 * @package Samark\RppPayment\Services
 * @author samark chaisanguan <samarkchsngn@gmail.com>
 */
class BaseService implements BaseServiceInterface
{
    use DataCurlGuzzleTrait;

    /**
     * @var
     */
    protected $endpoint;

    /**
     * @var
     */
    protected $params = [];

    /**
     * @var
     */
    protected $headers = [];

    /**
     * @var
     */
    protected $configEndpoint;

    /**
     * BaseService constructor.
     */
    public function __construct()
    {
        $this->setEndpoint(config(PACKAGE_NAME
            . '.endpoint.' . $this->configEndpoint, false));
    }

    /**
     * @return mixed
     */
    public function getEndpoint()
    {
        return $this->endpoint;
    }

    /**
     * @param mixed $endpoint
     */
    public function setEndpoint($endpoint)
    {
        $this->endpoint = $endpoint;
    }

    /**
     * @return mixed
     */
    public function getParams()
    {
        return $this->params;
    }

    /**
     * @param mixed $params
     */
    public function setParams($params)
    {
        $this->params = $params;
    }

    /**
     * @return mixed
     */
    public function getHeaders()
    {
        return $this->headers;
    }

    /**
     * @param mixed $headers
     */
    public function setHeaders($headers)
    {
        $this->headers = $headers;
    }

    /**
     * @param array $params
     * @return mixed
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function callGet($params = [])
    {
        return $this->curlGet($this->endpoint, $params, $this->headers);
    }

    /**
     * @param array $params
     * @return mixed
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function callPost($params = [])
    {
        return $this->curlPost($this->endpoint, $params, $this->headers);
    }

    /**
     * @param array $params
     * @return mixed
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function callDelete($params = [])
    {
        return $this->curlDelete($this->endpoint, $params, $this->headers);
    }

    /**
     * @param array $params
     * @return mixed
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function callUpdate($params = [])
    {
        return $this->curlPost($this->endpoint, $params, $this->headers);
    }

    /**
     * @param array $params
     * @param array $multipart
     * @return mixed
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function callUpload($params = [], $multipart = [])
    {
        return $this->curlUpload($this->endpoint, $params, $this->headers, $multipart);
    }

    /**
     * @param array $params
     * @return mixed
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function callPostBasicAuth($params = [])
    {
        $this->setHeaders(config(PACKAGE_NAME . '.basic'));
        return $this->curlPost($this->endpoint, $params, $this->headers);
    }

    /**
     * @param array $params
     * @return mixed
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function callPostBearerAuth($params = [], $token = null)
    {
        self::getBearer($token);
        $this->setHeaders([
            'headers' => [
                'Content-Type'  => 'application/json',
                'Accept'        => 'application/json',
                'Authorization' => 'Bearer ' . $token,
            ],
            'json'    => $params,
        ]);
        return $this->curlPost($this->endpoint, $params, $this->headers);
    }

    /**
     * @param null $token
     * @return void
     */
    protected function getBearer(&$token = null)
    {
        $token = $token === null && config(PACKAGE_NAME . '.token.store')
            ? session(config(PACKAGE_NAME . '.token.name'))
            : $token;
    }

    /**
     * @param $name
     */
    protected function setEndpointConfig($name)
    {
        $this->setEndpoint(config(PACKAGE_NAME
            . '.endpoint.' . $this->configList[$name], false));
    }


}