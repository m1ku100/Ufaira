<?php

namespace App\Support\Eloquent\Events;

use Illuminate\Support\Facades\Auth;

class ModelCreated extends ModelEventListener
{
    protected $event_name = 'created';

    public function perform()
    {
        if (method_exists($this->model, 'writeLog')) {
            $this->model->writeLog(
                $this->model,
                Auth::user(),
                $this->getProperties(),
                $this->event_name
            );
        }
    }

    protected function getProperties()
    {
        return $this->getModelCreatedAttribute();
    }
}
