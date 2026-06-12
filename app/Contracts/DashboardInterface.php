<?php

namespace App\Contracts;

interface DashboardInterface
{
    public function getActiveTasks(int $userId);

    public function getCompletedTasks(int $userId);

    public function getTodaySchedule(int $userId);

    public function getWeeklyProgress(int $userId);

    public function getDashboardSummary(int $userId);
}