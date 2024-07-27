<?php

declare(strict_types=1);

namespace App\Console\Commands\Devops;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\Schema;

final class MigrateResetCommand extends Command
{
    protected $signature = "app:migrate-reset";
    protected $description = "drop all tables an create from zero";

    public function handle(): void
    {
        $this->call("app:cache-clear");
        Schema::dropAllTables();
        $this->call("migrate");
    }
}
