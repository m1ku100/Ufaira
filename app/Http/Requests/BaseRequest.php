<?php

namespace App\Http\Requests;

use Illuminate\Auth\Access\AuthorizationException;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Storage;
use Spatie\ImageOptimizer\OptimizerChain;

abstract class BaseRequest extends FormRequest
{
    public const EDIT = 'ubah';

    public const TAMBAH = 'tambah';

    /**
     * Menyimpan file
     *
     * @param UploadedFile $request_file
     * @param string $path
     * @param string $filename
     * @param string $disk
     * @return string
     */
    public function storeFile(UploadedFile $request_file, $path, $filename, $disk = 'local')
    {
        $filename = sprintf('%s.%s', $filename, $request_file->getClientOriginalExtension());

        $output = $request_file->storeAs($path, $filename, $disk);

        if ($request_file->getSize() > 1024) {
            if ($disk == 'public_path') {
                app(OptimizerChain::class)->optimize(public_path($output));
            } else {
                app(OptimizerChain::class)->optimize(storage_path('app/' . $path . '/' . $filename));
            }
        }

        return sprintf('%s/%s', $path, $filename);
    }

    /**
     * Menghapus file
     *
     * @param string $path
     * @return void
     */
    public function deleteFile($path, $custom_path = false)
    {
        if ($custom_path) {
            if (File::exists($path)) {
                File::delete($path);
            }
        } else {
            if (Storage::exists(sprintf('app/%s', $path))) {
                Storage::delete(sprintf('app/%s', $path));
            }
        }
    }

    /**
     * Menegecek apakah request yang dikirim
     * adalah dalam mode edit
     *
     * @return boolean
     */
    public function editMode()
    {
        return $this->mode == BaseRequest::EDIT;
    }

    /**
     * Menegecek apakah request yang dikirim
     * adalah dalam mode tambah
     *
     * @return boolean
     */
    public function addMode()
    {
        return $this->mode == BaseRequest::TAMBAH;
    }

    /**
     * Mendapatkan data untuk di proses pada repository
     *
     * @return array
     */
    public function getData()
    {
        return [];
    }

    /**
     * Melakukan pengecekan/otorisasi
     *
     * @param string $method
     * @param object|string|null $object
     * @return boolean|AuthorizationException
     */
    protected function inspect($method, $object = null)
    {
        $response = Gate::inspect($method, $object);

        if (!$response->allowed()) {
            throw $this->sendFailedAuthorization($response->message());
        }

        return true;
    }

    /**
     * Mengirimkan pesan otorisasi tidak memenuhi syarat
     *
     * @param string $message
     * @return void
     */
    protected function sendFailedAuthorization($message)
    {
        return new AuthorizationException($message);
    }

    /**
     * Menambahkan validator tambahan
     *
     * @param \Illuminate\Validation\Validator $validator
     * @return void
     */
    public function withValidator($validator)
    {
        $validator->after(function ($validator) {
            // untuk contoh
            // $validator->errors()->add($field, $message);
        });
    }

    /**
     * Menyimpan image dari summer note ke dalam folder yang telah ditentukan
     *
     * @param $contentBlog
     * @return string
     */
    public function setContentSummerNote($contentBlog)
    {
        $content = $contentBlog;

        $dom = new \DomDocument();
        libxml_use_internal_errors(true);
        $dom->loadHtml($content, LIBXML_HTML_NOIMPLIED | LIBXML_HTML_NODEFDTD);
        libxml_clear_errors();
        $imageFile = $dom->getElementsByTagName('img');

        foreach ($imageFile as $item => $image) {
            $data = $image->getAttribute('src');

            // skip jika gambar telah di simpan kedalam storage
            if(substr( $data, 0, 1 ) === "/"){
                continue;
            }

            list($type, $data) = explode(';', $data);
            list(, $data) = explode(',', $data);
            $imgeData = base64_decode($data);
            $image_name = "/images/blog/" . time() . $item . '.png';
            $path = public_path() . $image_name;
            file_put_contents($path, $imgeData);

            $image->removeAttribute('src');
            $image->setAttribute('src', $image_name);
        }

        $content = $dom->saveHTML();

        return $content;
    }
}
