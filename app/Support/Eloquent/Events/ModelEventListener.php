<?php

namespace App\Support\Eloquent\Events;

use Illuminate\Database\Eloquent\Model;

abstract class ModelEventListener
{
    protected $model;

    protected $event_name;

    public function __construct(Model $model)
    {
        $this->model = $model;
    }

    abstract public function perform();

    abstract protected function getProperties();

    protected function getModelChangedAttributes()
    {
        $attributes = [];

        return $this->getProperties() ?: $attributes;
    }

    protected function getModelCreatedAttribute()
    {
        return $this->model->getAttributes();
    }
}
