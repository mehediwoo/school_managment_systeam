<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

use App\Models\RegistrationSession;
use App\Models\StRegistrationFund;
use App\Models\Student;
use App\Models\User;
use Auth ;
use Carbon\Carbon;
class AddmissionLimit extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'Addmission:limit';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $currentDate = Carbon::now(); // Get the current date in Y-m-d format
        $formattedDate = $currentDate->format('d/m/Y');

        $registerLimit=RegistrationSession::where('time_setup_type','Addmission')->where('status','Active')->where('ending_date',$formattedDate )->get();
            foreach ($registerLimit as $registerLimit) {
                    $RegistrationSession=RegistrationSession::where('id',$registerLimit->id)->update([
                        'status'=>'Deactive'
                    ]);

                        }


        return Command::SUCCESS;
    }
}
