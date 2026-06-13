<?php

namespace App\Contracts;

interface PlannerServiceInterface
{
    public function getAll($user);

    public function create($user, array $data);
}
