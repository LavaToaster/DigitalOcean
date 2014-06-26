<?php namespace Lavoaster\DigitalOcean\Resources;

class Domain extends Resource
{
    /**
     * @var \Lavoaster\DigitalOcean\Requests\Domain
     */
    protected $request;

    public function records()
    {
        return $this->request->records($this->name);
    }

    public function delete()
    {
        return $this->request->delete($this->name);
    }
}