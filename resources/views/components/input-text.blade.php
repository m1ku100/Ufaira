<input
    id="{{ $id }}"
    type="text"
    class="form-control {{ $class }}"
    placeholder="{{ $placeholder }}"
    value="{{ $oldvalue ?? $value }}"
    name="{{ $name }}"
    {{ $required ? 'required' : '' }}
    {{ $readonly ? 'readonly' : '' }}>
