<?php

namespace App\Foundation\Repository\Eloquent;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Facades\App;
use App\Foundation\Repository\EloquentRepositoryInterface;

class BaseRepository implements EloquentRepositoryInterface
{
    public $connection;

    public function __construct(Model $model)
    {
        $this->connection = $model;
    }

    public function getAll(array $options = [])
    {
        return $this->optionsQuery($options)->get();
    }

    public function getDataById(int $id)
    {
        return $this->connection->query()->where('id', $id)->first();
    }

    public function getDataByUuid(string $uuid)
    {
        return $this->connection->query()->where('uuid', $uuid)->first();
    }

    public function insert(array $data)
    {
        
        return $this->connection->query()->create($data);
    }

    public function update(array $data, int $id): int
    {
        return $this->connection->query()->where('id', $id)->update($data);
    }

    public function destroy(int $id)
    {
        return $this->connection->query()->where('id', $id)->delete();
    }

    public function totalCount(array $options = []): int
    {
        $query =  $this->connection->query();

         if(isset($options['foreign'])) {
            
            $query = $query->where($options['foreign']['key_name'],$options['foreign']['value']);
        }
        return $query->count();
    }

    protected function optionsQuery(array $options)
    {
       
        $query = $this->connection->query();

        if (isset($options['limit'])) {
            $query = $query->limit($options['limit']);
        }

        if (isset($options['offset'])) {
            $query = $query->offset($options['offset']);
        }

        if (isset($options['order_by_level'])) {
            $query = $query->orderByRaw('-level DESC');
        }

        if (isset($options['order_by'])) {
            if (is_array($options['order_by'])) {
                foreach ($options['order_by'] as $column => $orderBy) {
                    $query = $query->orderBy($column, $orderBy);
                }
            } else {
                $query = $query->orderBy('created_at', $options['order_by']);
            }
        } else {
            $query = $query->orderBy('created_at', 'desc');
        }

        if (isset($options['with'])) {
            $query = $query->with($options['with']);
        }

        if(isset($options['foreign'])) {

            $query = $query->where($options['foreign']['key_name'],$options['foreign']['value']);
        }

        if (isset($options['only'])) {
            $query = $query->select($options['only']);
        }

        if (isset($options['id'])) {
            $query = $query->where('id', '=', $options['id']);
        }

        if (!empty($options['uuid'])) {
            $query = $query->where('uuid', '=', $options['uuid']);
        }

        return $query;
    }

    public function getDataByOptions(array $options = [])
    {
        return $this->optionsQuery($options)->get();
    }

}
