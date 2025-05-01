<?php

namespace App\Traits;

trait HasToastNotifications
{
    public function toastSuccess($message)
    {
        $this->dispatch("toast.success", message: $message);
    }
    public function toastError($message)
    {
        $this->dispatch("toast.error", message: $message);
    }
}
