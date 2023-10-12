<?php

namespace App\Support\Eloquent\Events;

use Illuminate\Support\Facades\Auth;

class ModelUpdated extends ModelEventListener
{
    protected $event_name = 'updated';

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
        return $this->model->getMutatedAttributes();
    }
}