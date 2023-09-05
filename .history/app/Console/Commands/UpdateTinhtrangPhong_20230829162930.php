<?php

namespace App\Console\Commands;

use App\Models\HopDong;
use App\Models\Phong;
use Carbon\Carbon;
use Illuminate\Console\Command;

class UpdateTinhtrangPhong extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:update-tinhtrang-phong';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Execute the console command.
     */
    public function handle()
{
    echo(
        '<script>
        console.log(1);
        </script>'
    );
}

}
