@php
    use App\Models\Master\Preferensi;
@endphp

@if ($preferensi->hasChildren())
    <div class="card card-large-icons">
        <div class="card-icon bg-primary text-white">
            <i class="fas fa-cog"></i>
        </div>
        <div class="card-body">
            <h4>{{ $preferensi->nama_preferensi }}</h4>
            <p>{{ $preferensi->keterangan_preferensi }}</p>
            <a href="{{ route('utilities.preferensi.index', ['induk' => $preferensi->uuid_preferensi]) }}" class="card-cta">Ubah Preferensi <i class="fas fa-chevron-right"></i></a>
        </div>
    </div>
@else
    <div class="card">
        <div class="card-header pt-0 pb-0">
            <h4>{{ $preferensi->nama_preferensi }}</h4>
        </div>
        <div class="card-body">
            @switch($preferensi->jenis_input)
                @case(Preferensi::TEXT)
                    <x-input-text :name="$preferensi->key_preferensi" :id="$preferensi->key_preferensi" :value="$preferensi->nilai"></x-input-text>
                    @break

                @case(Preferensi::NUMBER)
                    <x-input-number :name="$preferensi->key_preferensi" :id="$preferensi->key_preferensi" :value="$preferensi->nilai"></x-input-number>
                    @break

                @case(Preferensi::IMAGE)
                    <x-input-image :name="$preferensi->key_preferensi" :id="$preferensi->key_preferensi" :base64="false"></x-input-image>
                    @if(! empty($preferensi->nilai))
                        @push('js')
                            <script>
                                $(function () {
                                    $('#{{ $preferensi->key_preferensi }}').loadPreviewImage('{{ asset('storage/' . remove_public_dirname($preferensi->nilai)) }}');
                                })
                            </script>
                        @endpush
                    @endif
                    @break

                @case(Preferensi::RICHTEXT)
                    <x-rich-textarea :name="$preferensi->key_preferensi" :id="$preferensi->key_preferensi"></x-rich-textarea>
                    @push('js')
                        <script>
                            $(function () {
                                $('#{{ $preferensi->key_preferensi }}').summernote('code', `{!! $preferensi->nilai !!}`);
                            })
                        </script>
                    @endpush
                    @break
            @endswitch
        </div>
    </div>
@endif
