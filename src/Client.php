<?php

namespace direct7\Direct7;

use GuzzleHttp\Client as GuzzleClient;
use GuzzleHttp\Exception\ClientException;
use GuzzleHttp\Exception\ServerException;

require_once __DIR__ . '/exceptions/BadRequest.php';
require_once __DIR__ . '/exceptions/NotFoundError.php';
require_once __DIR__ . '/exceptions/InsufficientCreditError.php';
require_once __DIR__ . '/exceptions/ValidationError.php';
require_once __DIR__ . '/exceptions/ClientError.php';
require_once __DIR__ . '/exceptions/ServerError.php';
require_once __DIR__ . '/Direct7/SMS.php';

class Client
{
    private $apiToken;
    private $host = "https://api.d7networks.com";
    private $timeout = 30;

    public $sms;

    private $headers;
    private $guzzleClient;

    public function __construct($apiToken = null)
    {
        $this->apiToken = $apiToken;

        $userAgent = "direct7-php-sdk/" . $this->getDirect7Version() . " php/" . phpversion();

        $this->headers = [
            "User-Agent" => $userAgent,
            "Accept" => "application/json",
        ];

        $this->sms = new SMS($this);

        $this->guzzleClient = new GuzzleClient([
            'base_uri' => $this->host,
            'timeout' => $this->timeout,
            'headers' => $this->headers,
        ]);
    }

    private function getDirect7Version()
    {
        return "1.0.0";
    }

    private function createBearerTokenString()
    {
        return "Bearer " . $this->apiToken;
    }

    public function host($value = null)
    {
        if ($value === null) {
            return $this->host;
        } else {
            $this->host = $value;
        }
    }

    public function processResponse($host, $response)
    {
        $statusCode = $response->getStatusCode();
        $contents = json_decode($response->getBody()->getContents(), true);
        $error = $response->getBody();

        if ($statusCode == 401) {
            throw new AuthenticationError("Invalid API token");
        } elseif ($statusCode >= 200 && $statusCode < 300) {
            return $contents;
        } elseif ($statusCode >= 400 && $statusCode < 500) {
            $message = isset($statusCode) ? $statusCode : '';
            $errorDetails = isset($error) ? $error : '';
            switch ($statusCode) {
                case 400:
                    throw new BadRequest($message);
                case 404:
                    throw new NotFoundError($message);
                case 402:
                    throw new InsufficientCreditError($message);
                case 422:
                    throw new ValidationError($message, $errorDetails);
                default:
                    throw new ClientError("{$statusCode} response from {$host}: {$message}");
            }
        } elseif ($statusCode >= 500 && $statusCode < 600) {
            throw new ServerError("{$statusCode} response from {$host}: {$contents['message']}");
        } else {
            throw new \Exception("Unexpected response status code: {$statusCode}");
        }
    }

    public function get($path, $params = null)
    {
        try {
            $requestUrl = $this->host . $path;
            $this->headers['Authorization'] = $this->createBearerTokenString();
            $response = $this->guzzleClient->get($requestUrl, [
                'headers' => $this->headers,
                'query' => $params,
            ]);
            return $this->processResponse($this->host, $response);
        } catch (ClientException $e) {
            $response = $e->getResponse();
            if ($response !== null) {
                return $this->processResponse($this->host, $response);
            } else {
                throw new \Exception($e->getMessage());
            }
        } catch (ServerException $e) {
            throw new \Exception($e->getMessage());
        }
    }

    public function post($path, $params, $bodyIsJson = true)
    {
        try {
            $requestUrl = $this->host . $path;
            $this->headers['Authorization'] = $this->createBearerTokenString();

            $options = [
                'headers' => $this->headers,
                'timeout' => $this->timeout,
            ];

            if ($bodyIsJson) {
                $options['json'] = $params;
            } else {
                $options['form_params'] = $params;
            }

            $response = $this->guzzleClient->post($requestUrl, $options);

            return $this->processResponse($this->host, $response);
        } catch (ClientException $e) {
            $response = $e->getResponse();
            if ($response !== null) {
                return $this->processResponse($this->host, $response);
            } else {
                throw new \Exception($e->getMessage());
            }
        } catch (ServerException $e) {
            throw new \Exception($e->getMessage());
        }
    }
}

?>
