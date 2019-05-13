<?php

namespace Samark\RppPayment\Traits;

use GuzzleHttp\Client as GuzzleHttpClient;
use GuzzleHttp\Exception\ClientException;
use GuzzleHttp\Psr7;
use Exception;

/**
 * Trait DataCurlGuzzleTrait
 * @package App\Services\DataProvider
 * @author samark chisanguan <samarkchsngn@gmail.com>
 */
trait DataCurlGuzzleTrait
{

    /**
     * @param string $method
     * @param $endpoint
     * @param array $params
     * @param array $headers
     * @return mixed
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function curlCall($method = 'get', $endpoint, $params = [], $headers = [])
    {
        switch ($method) {
            case 'get' :
                $options['query'] = $params;
                break;
            case 'post' :
                $options['form_params'] = $params;
                break;
            default:
                $options['form_params'] = $params;
                break;
        }
        try {
            $client  = new GuzzleHttpClient();
            $request = $client->request($method, $endpoint, $this->getOptions($headers));
            return json_decode($request->getBody()->getContents(), true);
        } catch (ClientException $exception) {
            throw new Exception($exception->getMessage(), $exception->getCode());
        } catch (Exception $exception) {
            throw new Exception($exception->getMessage(), 500);
        }

    }

    /**
     * @param array $headers
     * @return array
     */
    public function getOptions($headers = []): array
    {
        $options                = config(PACKAGE_NAME . '.curl.headers', []);
        $options['headers']     = !empty($headers) ? $headers : $options['headers'];
        $options['http_errors'] = config(PACKAGE_NAME . '.curl.http_errors', false);
        return array_merge($options, $headers);
    }

    /**
     * @param $endpoint
     * @param array $params
     * @param array $headers
     * @return mixed
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function curlGet($endpoint, $params = [], $headers = [])
    {
        return $this->curlCall('get', $endpoint, $params, $headers);
    }

    /**
     * @param $endpoint
     * @param array $params
     * @param array $headers
     * @return mixed
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function curlPost($endpoint, $params = [], $headers = [])
    {
        return $this->curlCall('post', $endpoint, $params, $headers);
    }

    /**
     * @param $endpoint
     * @param array $params
     * @param array $headers
     * @return mixed
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function curlPut($endpoint, $params = [], $headers = [])
    {
        return $this->curlCall('put', $endpoint, $params, $headers);
    }

    /**
     * @param $endpoint
     * @param array $params
     * @param array $headers
     * @return mixed
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function curlDelete($endpoint, $params = [], $headers = [])
    {
        return $this->curlCall('delete', $endpoint, $params, $headers);
    }

    /**
     * @param $endpoint
     * @param array $params
     * @param array $headers
     * @param $multipart
     * @return mixed
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function curlUpload($endpoint, $params = [], $headers = [], $multipart = [])
    {
        $headers['multipart']         = $multipart;
        $headers['headers']['Accept'] = 'multipart/form-data';
        return $this->curlCall('post', $endpoint, $params, $headers);
    }


}