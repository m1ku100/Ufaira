<div class="custom-control custom-radio {{ $class }}">
    <input type="radio"
           id="{{ $id }}"
           name="{{ $name }}"
           value="{{ $value }}"
           class="custom-control-input"
        {{ $checked ? 'checked' : '' }}>
    <label class="custom-control-label" for="{{ $id }}">{{ $label }}</label>
</div>
