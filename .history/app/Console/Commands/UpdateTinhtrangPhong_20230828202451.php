<?php

namespace App\Console\Commands;

use App\Models\Phong;
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
    if (!Phong::whereHas('phong_hopdong', function ($query) {
        $query->where('ngayketthuc', '>', now());
    })->exists()) {
        Phong::whereHas('phong_hopdong', function ($query) {
            $query->where('ngayketthuc', '<', now());
        })->update(['tinhtrang' => 0]);
    }
}

}
