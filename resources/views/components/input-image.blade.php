<div>
    <!-- Do what you can, with what you have, where you are. - Theodore Roosevelt -->
</div>
<div class="input-group mb-3" id="{{ $id }}-chooser">
    <div class="custom-file">
        <input
            @if(!$base64)
                name="{{ $name }}"
            @endif
            style="cursor: pointer"
            type="file"
            class="custom-file-input {{ $class }}"
            id="{{ $id . ($base64 ? '-input' : '') }}"
            {{ $multiple ? 'multiple' : '' }}
            accept="image/*, video/*">

        <label
            class="custom-file-label"
            for="{{ $id . ($base64 ? '-input' : '') }}">
            {{ $placeholder }}
        </label>
    </div>
</div>

<div id="image-preview-{{ $id }}" class="row">
</div>

<video id="video" width="320" height="240" controls style="display: none;"></video>


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
        function getExtension(filename) {
            console.log(filename);
            var parts = filename.split('.');
            return parts[parts.length - 1];
        }

        function isImage(filename) {
            var ext = getExtension(filename);
            switch (ext.toLowerCase()) {
                case 'jpg':
                case 'gif':
                case 'bmp':
                case 'png':
                    //etc
                    return true;
            }
            return false;
        }

        function isVideo(filename) {
            var ext = getExtension(filename);
            switch (ext.toLowerCase()) {
                case 'm4v':
                case 'avi':
                case 'mpg':
                case 'mp4':
                    // etc
                    return true;
            }
            return false;
        }

        $("#{{ $id . ($base64 ? '-input' : '') }}").change(function (e) {


            var input_elemen = $("#{{ $id . ($base64 ? '-input' : '') }}")
            var value_elemen = $("#{{ $id }}")
            var files = $(this).prop('files')
            var image_names = []
            var base64 = {{ $base64 ? 'true' : 'false' }};
            var multiple = {{ $multiple ? 'true' : 'false' }};


            function failValidation(msg) {
                alert(msg); // just an alert for now but you can spice this up later
                return false;
            }

            if (isImage(value_elemen.val())) {

                if (files && files[0]) {
                    $('#image-preview-{{ $id }}').html('')
                    $('#video').trigger('pause');
                    $('#video').hide()
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
                                        'value="' + e.target.result + '">';

                                    $('#image-base64-value-{{ $id }}').append(image_val)
                                } else {
                                    value_elemen.val(e.target.result)
                                }
                            }

                            var image_preview =
                                '<div class="col-lg-6 col-md-6">' +
                                '<div class="card">' +
                                '<img class="card-img-top" src="' + e.target.result + '" alt="Card image cap">' +
                                '</div>' +
                                '</div>';

                            $('#image-preview-{{ $id }}').show()

                            $('#image-preview-{{ $id }}').append(image_preview)
                        })

                        fileReader.readAsDataURL(file)
                    }

                    input_elemen.next().text(image_names.join(', '))
                } else {
                    input_elemen.next().text('{{ $placeholder }}')
                }

            } else if (isVideo(value_elemen.val())) {
                $('#image-preview-{{ $id }}').hide()

                var media = URL.createObjectURL(this.files[0]);
                var video = document.getElementById("video");
                video.src = media;
                video.style.display = "block";
                image_names.push(this.files[0].name)

                input_elemen.next().text(image_names.join(', '))
            }



        })
    </script>
@endpush
