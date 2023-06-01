<?php
namespace App\Firebase;
use Kreait\Firebase\Factory;
use App\Models\User;


class ScheduledFunctions
   {

     public function __invoke() {

      $user=User::find(1);
      $user->update([
        'active' => 1,
    ]);

      }

    }
