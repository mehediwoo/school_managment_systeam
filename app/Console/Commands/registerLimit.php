<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\RegistrationSession;
use App\Models\StRegistrationFund;
use App\Models\Student;
use App\Models\User;
use Auth ;
use Carbon\Carbon;
class registerLimit extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'register:limit';

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

        $registerLimit=RegistrationSession::where('time_setup_type','Registration')->where('status','Active')->where('ending_date',$formattedDate )->get();
            foreach ($registerLimit as $registerLimit) {
                    $RegistrationSession=RegistrationSession::where('id',$registerLimit->id)->update([
                        'status'=>'Deactive'
                    ]);

                    // $paymentDetails= StRegistrationFund::where('session_id', $registerLimit->session_id)
                    // ->where('reg_session_id',$registerLimit->id)
                    // ->where('status', 'paid')
                    // ->get();
                    // foreach( $paymentDetails as  $paymentDetails){
                    //     $getBranches =User::where('branch_id', $paymentDetails->branch_id)->get();
                    //     foreach($getBranches as $getBranch){
                    //         $getStudents=Student::where('created_by',$getBranch->id)->get();
                    //         // foreach($getStudents as $student) {
                    //         //     $student->where('status','registered')->where('session_id',$registerLimit->session_id)->update([
                    //         //         'status' => 'downloaded'
                    //         //     ]);
                    //         // }

                    // }

                        }

        return Command::SUCCESS;
    }
}
