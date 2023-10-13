<?php

namespace App\View\Components;

use Illuminate\View\Component;

class InputImage extends Component
{
    public $type;

    public $placeholder;

    public $id;

    public $name;

    public $multiple;

    public $base64;

    public $required;

    public $class;

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($type = null, $placeholder = null, $id = null, $name = null, $multiple = false, $base64 = true, $required = false, $class = '')
    {
        $this->type = $type;
        $this->placeholder = $placeholder;
        $this->id = $id;
        $this->name = $name;
        $this->multiple = $multiple;
        $this->base64 = $base64;
        $this->required = $required;
        $this->class = $class;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\View\View|string
     */
    public function render()
    {
        return view('components.input-image');
    }
}
