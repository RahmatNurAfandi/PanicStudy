<?php

namespace App\Contracts;

interface ProgressTrackerInterface
{
    public function getProgress(int $userId);

    public function calculateCompletionRate(int $userId);

    public function getStatistics(int $userId);

    public function updateTaskStatus(int $taskId, string $status);
}