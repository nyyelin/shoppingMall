<?php

namespace App\Foundation\Routing;

use Illuminate\Http\JsonResponse;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as LaravelController;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class Controller extends LaravelController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    /**
     * Prepare api response.
     *
     * @return Formatter
     */
    public function formatter(): Formatter
    {
        return Formatter::factory();
    }

    /**
     * Return the api response.
     *
     * @param array $data
     * @param int $totCnt
     * @param bool $wantInfo
     * @param int $status
     * @return JsonResponse
     */
    public function response(array $data = [], int $totCnt = 0, bool $wantInfo = false, int $status = 200): JsonResponse
    {
        return response()->json(Formatter::factory()->make($data, $totCnt, $wantInfo))->setStatusCode($status);
    }

    public function destroyMsg(string $uuid): string
    {
        return "The requested ID: {$uuid} was deleted.";
    }
}
