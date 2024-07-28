<?php

declare(strict_types=1);

namespace App\Modules\Shared\Infrastructure\Traits;

use Illuminate\Support\Facades\Log;
use \Throwable;

trait LogTrait
{
    private function logDebug($mixed, $title = ""): void
    {
        if ($title) {
            $content[] = $title;
        }
        $content[] = var_export($mixed, true);
        Log::channel("debug")->debug(implode("\n", $content));
    }

    private function logError(mixed $mixed, $title = "ERROR"): void
    {
        $content = [];
        if ($title) {
            $content[] = $title;
        }
        $content[] = var_export($mixed, true);
        Log::channel("error")->debug(implode("\n", $content));
    }

    private function logSql(string $sql, $title = ""): void
    {
        if ($title) {
            $content[] = $title;
        }
        $content[] = $sql;
        Log::channel("sql")->debug(implode("\n", $content));
    }

    private function logException(Throwable $throwable, $title = "ERROR"): void
    {
        $content = [];
        if ($title) {
            $content[] = $title;
        }
        $content[] = $throwable->getMessage();
        $content[] = $throwable->getTraceAsString();
        Log::channel("error")->debug(implode("\n", $content));
    }

}
