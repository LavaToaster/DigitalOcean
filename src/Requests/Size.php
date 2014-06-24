<?php namespace Lavoaster\DigitalOcean\Requests;

class Size extends Request
{
    public function all()
    {
        $response = $this->client->get('sizes');

        $sizes = [];

        foreach ($response as $data) {
            $sizes[] = new \Lavoaster\DigitalOcean\Resources\Size($data, $this);
        }

        return $sizes;
    }
}