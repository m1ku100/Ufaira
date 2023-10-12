<?php

namespace App\Support\Eloquent\Events;

class ModelCreating extends ModelEventListener
{
    public function perform()
    {
        if (method_exists($this->model, 'fillPrimaryKey')) {
            $this->model->fillPrimaryKey();
        }

        if (method_exists($this->model, 'generateKode')) {
            $this->model->fillkode();
        }
    }

    protected function getProperties()
    {
        //
    }
}
