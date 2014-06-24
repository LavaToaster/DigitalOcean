<?php namespace Lavoaster\DigitalOcean\Adapters;

use GuzzleHttp\Client;
use GuzzleHttp\Exception\RequestException;

class GuzzleAdapter implements AdapterInterface
{
    /**
     * @var \GuzzleHttp\Client
     */
    protected $client;

    public function __construct(Client $client)
    {
        $this->client = $client;
    }

    protected function request($type, $url, $data = [])
    {
        $request = $this->client->createRequest($type, $url, $data);

        try {
            /** @var \GuzzleHttp\Message\ResponseInterface $response */
            $response = $this->client->send($request);

            return $response->json();
        } catch (RequestException $e) {
            if ($e->hasResponse()) {
                var_dump($type, $url, $data);
                echo $e->getResponse();
                return [$e->getResponse()->getStatusCode(), $e->getResponse()];
            }

            return $e->getResponse();
        }
    }

    public function head($url, $data = [])
    {
        return $this->request('head', $url, ['query' => $data]);
    }

    public function get($url, $data = [])
    {
        return $this->request('get', $url, ['query' => $data]);
    }

    public function post($url, $data = [])
    {
        return $this->request('post', $url, ['json' => $data]);
    }

    public function delete($url, $data = [])
    {
        return $this->request('delete', $url, ['json' => $data]);
    }

    public function put($url, $data = [])
    {
        return $this->request('put', $url, ['json' => $data]);
    }

}