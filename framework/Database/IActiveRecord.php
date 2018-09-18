<?php

namespace Framework\Database;
use StdClass;

interface IActiveRecord
{
    public function find(int $id): StdClass;
    public function insert(): bool;
    public function update(): bool;
    public function findAll(): array;
    public function findWhere(string $where, array $params): array;
    public function delete(): bool;

}
