<?php

namespace App\Observers;

use App\Models\reclamation;

class ReclamationObserver
{
    /**
     * Handle the reclamation "created" event.
     *
     * @param  \App\Models\reclamation  $reclamation
     * @return void
     */
    public function created(reclamation $reclamation)
    {
        //
    }

    /**
     * Handle the reclamation "updated" event.
     *
     * @param  \App\Models\reclamation  $reclamation
     * @return void
     */
    public function updated(reclamation $reclamation)
    {
        if ($reclamation->isDirty('status')) {
            if ($reclamation->etat == 1) {
                $reclamation->archived = 1;
            } else {
                $reclamation->archived = 0;
            }
            $reclamation->save();
        }
    }

    /**
     * Handle the reclamation "deleted" event.
     *
     * @param  \App\Models\reclamation  $reclamation
     * @return void
     */
    public function deleted(reclamation $reclamation)
    {
        //
    }

    /**
     * Handle the reclamation "restored" event.
     *
     * @param  \App\Models\reclamation  $reclamation
     * @return void
     */
    public function restored(reclamation $reclamation)
    {
        //
    }

    /**
     * Handle the reclamation "force deleted" event.
     *
     * @param  \App\Models\reclamation  $reclamation
     * @return void
     */
    public function forceDeleted(reclamation $reclamation)
    {
        //
    }
}