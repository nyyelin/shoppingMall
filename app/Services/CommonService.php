<?php

namespace App\Services;

use Illuminate\Http\Request;

class CommonService
{
    public function params(Request $request, array $only = [], array $options = []): array
    {
        $search = $request->get('search');
        $params = [
            'search' => $search['value'] ?? null,
           'limit'  => !empty($request->get('length')) ? (int) $request->get('limit') : $this->limit,
           'offset' => !empty($request->get('start')) ? (int) $request->get('offset') : $this->offset,
        ];

        if (!empty($only)) {
            $params = collect($params)->only($only)->toArray();
        }

        if (!empty($options)) {
            $params = array_merge($params, $options);
        }

        return $params;
    }

    public int $offset = 0;

    public int $limit = 10;

    public function requestParams($request, $searchOnly = false): array
    {
        $options = [];
        $search = $request->get('search');
        $searchVal = $search['value'] ?? null;
        $limit = $request->get('length') ?? $this->limit;
        $offset = $request->get('start') ?? $this->offset;
        if (! $searchOnly) {
            $options = ['limit' => $limit, 'offset' => $offset];
        }

        if ($searchVal) {
            $options['search'] = $searchVal;
        }
        return $options;
    }

    public function dtParams($request, $allow = null, array $options = []): array
    {
        $search = $request->get('search');
        $searchVal = $search['value'] ?? null;
        $limit = $request->get('length') ?? $this->limit;
        $offset = $request->get('start') ?? $this->offset;

        $params = ['limit' => $limit, 'offset' => $offset];

        if (!empty($allow)) {
            if (is_array($allow)) {
                foreach ($allow as $value) {
                    $params[$value] = $request->get($value);
                }
            }

            $params[$allow] = $request->get($allow);
        }

        if (!empty($searchVal)) {
            $params['search'] = $searchVal;
        }

        if (!empty($options)) {
            $params = array_merge($params, $options);
        }

        return $params;
    }
}
