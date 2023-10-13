<?php

namespace App\Http\Controllers;

use App\Repositories\RepositoryResponse;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller as BaseController;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;


    /*
     * Mengambil data untuk select2 dari target model dengan fungsi selectData
     *
     */
    public function selectData(Request $request)
    {
        $model = app($this->model_class);

        $data = $model->selectData($request);

        return response()->json([
            'results'   => $data
        ]);
    }

    /*
      * Mengambil data untuk dataTable dari target model dengan fungsi tableData
      *
      */
    public function tableData(Request $request)
    {
        $model = app($this->model_class);

        $data = $model->tableData($request);

        return response()->json($data);
    }

    /**
     * Memberi respon dalam bentuk json
     *
     * @param RepositoryResponse|boolean|string $response
     * @param null|string $param_1
     * @param null|string|array $param_2
     * @return \Illuminate\Http\JsonResponse
     */
    public function compileResponse($response, $error_message = null, $success_data = [], $success_message = null)
    {

        if ($response instanceof RepositoryResponse) {
            if (! $response->success()) {
                return $this->sendErrorResponse($response->getMessage(), $response->getDeveloperMessage());
            }

            return $this->sendSuccessResponse($response->getMessage(), $success_data);
        } else if ($response === true) {
            return $this->sendSuccessResponse($success_message, $success_data);
        } else if (is_string($response)) {
            return $this->sendErrorResponse($error_message, $response);
        }
    }

    /**
     * mengirim respon sukses
     *
     * @return \Illuminate\Http\JsonResponse
     */
    protected function sendSuccessResponse($message = '', $data = [])
    {
        return response()->json([
            'success' => true,
            'message' => $message,
            'data'    => $data
        ]);
    }

    /**
     * Mengirim respon error
     *
     * @param string $error_message
     * @return \Illuminate\Http\JsonResponse
     */
    protected function sendErrorResponse($error_message, $dev_message = null)
    {
        return response()->json([
            'success'       => false,
            'message'       => $error_message,
            'dev_message'   => $dev_message
        ], 200);
    }


    /**
     * Memproses data dan memberikan ke view yang akan di export menjadi file berekstensi xls
     *
     * @param $view
     * @param $data
     * @param $filename
     * @return \Illuminate\Http\Response
     */
    public function xlsResponse($view, $data, $filename)
    {
        return response()->view($view, $data)
            ->header("Pragma", "public")
            ->header("Expires", "0")
            ->header("Cache-Control", "must-revalidate, post-check=0, pre-check=0")
            ->header("Content-Type", "application/force-download")
            ->header("Content-Type", "application/octet-stream")
            ->header("Content-Type", "application/download")
            ->header("Content-Disposition", "attachment;filename={$filename}.xls")
            ->header("Content-Transfer-Encoding", "binary");
    }
}
