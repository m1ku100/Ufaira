<?php

namespace App\View\Components;

use Illuminate\View\Component;

class InputEmail extends Component
{
    public $id;

    public $name;

    public $class;

    public $placeholder;

    public $value;

    public $required;

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($id = null, $name = null, $class = null, $placeholder = null, $value = null, $required = null)
    {
        $this->id = $id;
        $this->name = $name;
        $this->class = $class;
        $this->placeholder = $placeholder;
        $this->value = $value;
        $this->required = $required;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\View\View|string
     */
    public function render()
    {
        return view('components.input-email');
    }
}
