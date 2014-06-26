<?php namespace Lavoaster\DigitalOcean\Resources;

class Record extends Resource
{
    /**
     * @var \Lavoaster\DigitalOcean\Requests\Record
     */
    protected $request;

    protected $name;

    public function __construct($data, $request, $name)
    {
        $this->name = $name;
        $this->request = $request;
        $this->loadAttributes($data);
    }

    public function delete()
    {
        return $this->request->delete($this->name, $this->id);
    }

    public function update($name)
    {
        return $this->request->update($this->name, $this->id, $name);
    }
}