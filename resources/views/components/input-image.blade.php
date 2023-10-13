<div>
    <!-- Do what you can, with what you have, where you are. - Theodore Roosevelt -->
</div><div class="input-group mb-3" id="{{ $id }}-chooser">
    <div class="custom-file">
        <input
            @if(!$base64)
                name="{{ $name }}"
            @endif
            style="cursor: pointer"
            type="file"
            class="custom-file-input {{ $class }}"
            id="{{ $id . ($base64 ? '-input' : '') }}"
            {{ $multiple ? 'multiple' : '' }}>

        <label
            class="custom-file-label"
            for="{{ $id . ($base64 ? '-input' : '') }}">
            {{ $placeholder }}
        </label>
    </div>
</div>

<div id="image-preview-{{ $id }}" class="row">
</div>

@if($base64)
    @if($multiple)
        <div id="image-base64-value-{{ $id }}">
        </div>
    @else
        <input
            type="hidden"
            name="{{ $name }}"
            id="{{  $id }}"
            {{ $required ? 'required' : '' }}>
    @endif
@endif

@push('js')
    <script>
        $("#{{ $id . ($base64 ? '-input' : '') }}").change(function (e) {
            var input_elemen = $("#{{ $id . ($base64 ? '-input' : '') }}")
            var value_elemen = $("#{{ $id }}")
            var files = $(this).prop('files')
            var image_names = []
            var base64 = {{ $base64 ? 'true' : 'false' }}
                var multiple = {{ $multiple ? 'true' : 'false' }}

            if (files && files[0]) {
                $('#image-preview-{{ $id }}').html('')

                for (file of files) {
                    image_names.push(file.name)
                    var fileReader = new FileReader()

                    fileReader.addEventListener('load', function (e) {
                        if (base64) {
                            if (multiple) {
                                var image_val =
                                    '<input ' +
                                    'type="hidden" ' +
                                    'name="{{ $name }}[]" ' +
                                    'value="'+e.target.result+'">';

                                $('#image-base64-value-{{ $id }}').append(image_val)
                            }
                            else {
                                value_elemen.val(e.target.result)
                            }
                        }

                        var image_preview =
                            '<div class="col-lg-6 col-md-6">' +
                            '<div class="card">' +
                            '<img class="card-img-top" src="'+ e.target.result +'" alt="Card image cap">' +
                            '</div>' +
                            '</div>';

                        $('#image-preview-{{ $id }}').append(image_preview)
                    })

                    fileReader.readAsDataURL(file)
                }

                input_elemen.next().text(image_names.join(', '))
            }
        else {
                input_elemen.next().text('{{ $placeholder }}')
            }
        })
    </script>
@endpush
