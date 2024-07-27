<?php

declare(strict_types=1);

namespace App\Console\Commands\Devops;

use Illuminate\Console\Command;

final class CacheClearCommand extends Command
{
    protected $signature = "app:cache-clear";
    protected $description = "clear all cached files";

    public function handle(): void
    {
        $this->call("optimize:clear");
        $this->call("cache:clear");
        $this->call("route:clear");
        $this->call("view:clear");
        $this->call("config:clear");
        $this->call("config:cache");
    }
}
