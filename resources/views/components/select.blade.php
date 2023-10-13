<select
    class="custom-select {{ $class }}"
    name="{{ isset($name) ? $name : '' }}"
    id="{{ isset($id) ? $id : '' }}"
    {{ $multiple ? 'multiple' : '' }}
    {{ $required ? 'required' : '' }}>
    @isset($options)
        @foreach($options as $value => $text)
            <option
                value="{{ $value }}"
            @isset($selected)
                {{ $selected == $value ? 'selected' : '' }}
                @endisset>
                {{ $text }}
            </option>
        @endforeach
    @endisset
</select>
