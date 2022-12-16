<?php

namespace App\Foundation\Repository;

interface EloquentRepositoryInterface
{
    public function getAll(array $options = []);

    public function getDataById(int $id);

    public function getDataByUuid(string $uuid);

    public function insert(array $data);

    public function update(array $data, int $id);

    public function destroy(int $id);

    public function totalCount();

    public function getDataByOptions(array $options = []);

}
