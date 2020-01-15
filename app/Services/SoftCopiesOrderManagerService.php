<?php

namespace App\Services;

use App\Services\OrderManagerService;

class SoftCopiesOrderManagerService extends OrderManagerService
{
    public function process()
    {
        return (object)[
                'delivery' => 'soft copy download link',
                'paid' => $this->total
            ];
    }
}