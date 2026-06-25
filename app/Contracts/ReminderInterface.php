<?php

namespace App\Contracts;

interface ReminderInterface
{
    public function createReminder(array $data);

    public function getRemindersByUser(int $userId);

    public function updateReminder(int $reminderId, array $data);

    public function deleteReminder(int $reminderId);

    public function sendNotification(int $userId);
}