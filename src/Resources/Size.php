<?php namespace Lavoaster\DigitalOcean\Resources;

class Size extends Resource
{
    public function all()
    {
        /** @var \GuzzleHttp\Message\ResponseInterface $response */
        $response = $this->client->get('sizes');

        return $response->json();
    }
}