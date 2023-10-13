<input
    id="{{ $id }}"
    type="email"
    class="form-control {{ $class }}"
    placeholder="{{ $placeholder }}"
    value="{{ $value }}"
    name="{{ $name }}"
    {{ $required ? 'required' : '' }}>
