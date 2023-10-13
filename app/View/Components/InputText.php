<?php

namespace App\View\Components;

use Illuminate\View\Component;

class InputText extends Component
{
    public $id;

    public $name;

    public $class;

    public $placeholder;

    public $value;

    public $required;

    public $readonly;

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($id = null, $name = null, $class = null, $placeholder = null, $value = null, $required = null, $readonly = false)
    {
        $this->id = $id;
        $this->name = $name;
        $this->class = $class;
        $this->placeholder = $placeholder;
        $this->value = $value;
        $this->required = $required;
        $this->readonly = $readonly;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\View\View|string
     */
    public function render()
    {
        return view('components.input-text');
    }
}
