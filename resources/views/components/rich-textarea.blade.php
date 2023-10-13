<textarea name="{{ $name }}" id="{{ $id }}"></textarea>

@push('js')
    <script>
        $('#{{ $id }}').summernote({
            toolbar: []
        });
    </script>
@endpush
