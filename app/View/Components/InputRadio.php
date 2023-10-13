<?php

namespace App\View\Components;

use Illuminate\View\Component;

class InputRadio extends Component
{
    public $id;

    public $name;

    public $class;

    public $checked;

    public $value;

    public $label;

    public $required;

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($id = null, $name = null, $class = null, $checked = false, $value = null, $label = null, $required = false)
    {
        $this->id = $id;
        $this->name = $name;
        $this->class = $class;
        $this->checked = $checked;
        $this->value = $value;
        $this->label = $label;
        $this->required = $required;
    }
    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.input-radio');
    }
}
