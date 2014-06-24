<?php namespace Lavoaster\DigitalOcean\Adapters;

interface AdapterInterface
{
    public function head($url, $data = []);

    public function get($url, $data = []);

    public function post($url, $data = []);

    public function delete($url, $data = []);

    public function put($url, $data = []);
}