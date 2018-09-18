<?php

namespace App\Controllers;

use Framework\Controllers\BaseController;
use App\Services\Suport as SuportService;

class Suport extends BaseController
{
    public static function status(): string
    {
        try {
			return self::renderJson(SuportService::status());
        } catch (\Exception $e) {
            return self::renderJson(["error" => $e->getMessage()], 500);
        }

    }

}
