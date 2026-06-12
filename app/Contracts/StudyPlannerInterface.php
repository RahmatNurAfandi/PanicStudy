<?php

namespace App\Contracts;

interface StudyPlannerInterface
{
    public function createPlan(array $data);

    public function getPlansByUser(int $userId);

    public function updatePlan(int $planId, array $data);

    public function deletePlan(int $planId);

    public function generatePriorityPlan(int $userId);
}