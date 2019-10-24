<?php

namespace App\Traits;

trait CustomResponse
{

    /**
     * @param array $data
     * @param string $key
     * @param int $status
     * @param string $message
     * @return \Illuminate\Http\JsonResponse
     */
    public function customData(
        array $data,
        $key,
        $status = 200,
        $message = "success"
    ) {
        $response = [
            "data" => [
                "status" => $this->formatStatusData($status, $message),
                "$key" => $data['data'],
            ]
        ];

        return response()->json($response, $status);
    }

    /** 
     * @param string $message
     * @return \Illuminate\Http\JsonResponse
     */
    public function notFound($message = 'Resource not found')
    {
        $response = $this->formatStatusData(404, $message);

        return response()->json($response, 404);
    }


    /**     *
     * @param int $status
     * @param string $message
     * @return \Illuminate\Http\JsonResponse
     */
    private function formatStatusData($status, $message): array
    {
        return [
            'code' => $status,
            'message' => $message,
        ];
    }
}
