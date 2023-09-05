<?php

namespace App\Console\Commands;

use App\Models\HopDong;
use App\Models\Phong;
use Illuminate\Console\Command;
use Carbon\Carbon;
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
        $phongs = Phong::where('tinhtrang', 1)->get();
        
        foreach ($phongs as $phong) {
            $hopdongs = HopDong::where('id_phong', $phong->id_phong)->get();
            $coHopdongConHieuLuc = 0;
            foreach ($hopdongs as $hopdong) {
                if ($hopdong->ngayketthuc > Carbon::now()) {
                    $coHopdongConHieuLuc = +1;
                    break;
                }
            }
            if ($coHopdongConHieuLuc == 0) {
                $phong->tinhtrang = 0;
                $phong->update();
            }
        }
    }
    

}
