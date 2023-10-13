<?php

namespace App\View\Components;

use Illuminate\View\Component;

class Select extends Component
{
    public $id;

    public $name;

    public $class;

    public $selected;

    public $required;

    public $multiple;

    public $options;

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($id = null, $name = null, $class = null, $selected = null, $required = null, $options = [], $multiple = false)
    {
        $this->id = $id;
        $this->name = $name;
        $this->class = $class;
        $this->required = $required;
        $this->multiple = $multiple;
        $this->selected = $selected;
        $this->options = $options;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\View\View|string
     */
    public function render()
    {
        return view('components.select');
    }
}
