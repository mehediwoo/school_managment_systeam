<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\BranchSubscription;
use App\Models\Branch;
use Carbon\Carbon;
class branchSubsCorn extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'command:name';

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
        // dd($formattedDate);
        // Fetch only those subscriptions where the status is 'Approved' and expired_date matches the current date
        $branchSubscriptions = BranchSubscription::where('status', 'Approved')
                            ->where('expired_date', $formattedDate)
                            ->get();


            foreach ($branchSubscriptions as $branchSubscription) {

                    $branchsubs=Branch::where('id',$branchSubscription->branch_id)->update([
                        'status'=>'Expired'
                    ]);
                   $subcription=BranchSubscription::where('branch_id',$branchSubscription->branch_id)->update([
                     'status'=>'Expired'
                   ]);
                }

        return Command::SUCCESS;
    }
}
