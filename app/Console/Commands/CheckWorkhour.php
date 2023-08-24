<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\Workhour;
use App\Models\Company;
use App\Models\User;
use App\Models\Vacation;
use App\Models\OfficialVacation;
use Carbon\Carbon;

class CheckWorkhour extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'check:workhour';

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
        $users = User::all();
        $currentDate = Carbon::now();

        foreach ($users as $user) {
            $lastWorkhour = $user->workhours()
                ->latest('created_at')
                ->first();

            if (!$lastWorkhour || !$lastWorkhour->created_at->isSameDay($currentDate)) {
                $branch = $user->branch;
                $shift=$user->shift;

                $workdayExists = $shift->workdays()
                ->where('day', $currentDate->format('l'))
                ->where('status', 1)
                ->exists();



                if ($workdayExists) {
                    $officialVacationExists = OfficialVacation::whereDate('from', '<=', $currentDate)
                        ->whereDate('to', '>=', $currentDate)
                        ->exists();

                    $vacationExists = Vacation::where('user_id',$user->id)
                        ->whereDate('from', '<=', $currentDate)
                        ->whereDate('to', '>=', $currentDate)
                        ->where('status', 'approve')
                        ->exists();

                        if ($vacationExists) {
                         $workhour = new Workhour();
                         $workhour->user_id = $user->id;
                         $workhour->status = 'vacation';
                         $workhour->save();
                     }

                    if (!$officialVacationExists && !$vacationExists) {

                        $workhour = new Workhour();
                        $workhour->user_id = $user->id;
                        $workhour->status = 'absence';
                        $workhour->save();
                    }
                }
            }
        }
    }
}
