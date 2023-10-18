<?php

namespace App\Contract\Utilities;

use App\Http\Requests\BaseRequest;

interface PreferensiContract
{
    public function simpan(BaseRequest $request);
}
