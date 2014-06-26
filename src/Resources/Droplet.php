<?php namespace Lavoaster\DigitalOcean\Resources;

class Droplet extends Resource
{
    /**
     * @var \Lavoaster\DigitalOcean\Requests\Droplet
     */
    protected $request;

    public function reboot($hard = false)
    {
        return $this->request->performAction($this->id, $hard ? 'powercyle' : 'reboot');
    }

    public function shutdown($hard = false)
    {
        return $this->request->performAction($this->id, $hard ? 'power_off' : 'shutdown');
    }

    public function boot()
    {
        return $this->request->performAction($this->id, 'power_on');
    }

    public function resetPassword()
    {
        return $this->request->performAction($this->id, 'reset_password');
    }

    public function resize($size)
    {
        return $this->request->performAction(
            $this->id,
            'resize',
            [
                'size' => $size
            ]
        );
    }

    public function restore($id)
    {
        return $this->request->performAction(
            $this->id,
            'restore',
            [
                'image' => $id
            ]
        );
    }



    public function rebuild($identifier)
    {
        return $this->request->performAction(
            $this->id,
            'rebuild',
            [
                'image' => $identifier
            ]
        );
    }

    public function rename($name)
    {
        return $this->request->performAction(
            $this->id,
            'rename',
            [
                'name' => $name
            ]
        );
    }

    public function kernel($kernelId)
    {
        return $this->request->performAction(
            $this->id,
            'change_kernel',
            [
                'kernel' => $kernelId
            ]
        );
    }

    public function enableIpv6()
    {
        return $this->request->performAction($this->id, 'enable_ipv6');
    }

    public function disableBackups()
    {
        return $this->request->performAction($this->id, 'disable_backups');
    }

    public function retrieveAction($id)
    {
        return $this->request->action($this->id, $id);
    }

    public function kernels()
    {
        return $this->request->kernels($this->id);
    }

    public function backups()
    {
        return $this->request->backups($this->id);
    }

    public function snapshots()
    {
        return $this->request->snapshots($this->id);
    }

    public function delete()
    {
        return $this->request->delete($this->id);
    }
}