<?php

namespace App\View\Components;

use Illuminate\View\Component;

class RichTextarea extends Component
{
    public $id;

    public $class;

    public $name;

    public $value;

    public $required;

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($id = null, $class = null, $name = null, $value = null, $required = false)
    {
        $this->id = $id;
        $this->class = $class;
        $this->name = $name;
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
        return view('components.rich-textarea');
    }
}
