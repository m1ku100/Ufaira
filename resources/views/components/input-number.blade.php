<input
    id="{{ $id }}"
    type="number"
    class="form-control {{ $class }}"
    placeholder="{{ $placeholder }}"
    value="{{ $oldvalue ?? $value }}"
    name="{{ $name }}"
    {{ $required ? 'required' : '' }}>
