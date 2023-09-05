<?php

namespace App\Console\Commands;

use App\Models\HopDong;
use App\Models\Phong;
use Illuminate\Console\Command;
use Illuminate\Support\Carbon;

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
    $phongs = Phong::all();
foreach ($phongs as $phong) {
    $hopdongs = HopDong::where('id_phong', $phong->id_phong)->get();
    $coHopdongConHieuLuc = false;
    foreach ($hopdongs as $hopdong) {
        if ($hopdong->ngayketthuc > Carbon::now()) {
            $coHopdongConHieuLuc = true;
            break;
        }
    }
    if (!$coHopdongConHieuLuc) {
        $phong->tinhtrang = 1;
        $phong->save();
    }
}
}

}
