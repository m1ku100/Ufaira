<?php

namespace App\Support\Eloquent\Events;

use Illuminate\Support\Facades\Auth;

class ModelSaved extends ModelEventListener
{
    protected $event_name = 'saved';

    public function perform()
    {
        //
    }

    protected function getProperties()
    {
        return $this->model->getChanges();
    }
}
