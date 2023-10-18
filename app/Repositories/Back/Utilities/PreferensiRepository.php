<?php

namespace App\Repositories\Back\Utilities;

use App\Contract\Utilities\PreferensiContract;
use App\Http\Requests\BaseRequest;
use App\Models\Master\Preferensi;
use App\Repositories\BaseRepository;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;

class PreferensiRepository extends BaseRepository implements PreferensiContract
{

    public function simpan(BaseRequest $request)
    {
        foreach ($request->except('_token') as $key_preferensi => $nilai) {
            $new_value = null;
            $preferensi = Preferensi::search($key_preferensi);

            if ($nilai instanceof UploadedFile) {
                $new_value = $this->handleImage($request, $preferensi, $nilai);
            } else {
                $new_value = $nilai;
            }

            $preferensi->update([
                'nilai' => $new_value
            ]);
        }

        return $this->successResponse();
    }

    public function handleImage(BaseRequest $request, $preferensi, $nilai)
    {
        $key_preferensi = $preferensi->key_preferensi;
        $old_path = $preferensi->nilai;

        if (Storage::exists($old_path)) {
            Storage::delete($old_path);
        }

        $new_path = $request->storeFile($nilai, 'public/preferensi', $key_preferensi);

        return $new_path;
    }
}
