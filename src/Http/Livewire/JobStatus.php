<?php

namespace Alves\TrackableJobs\Http\Livewire;

use Illuminate\Support\Collection;
use Livewire\Component;

class JobStatus extends Component
{
    public Collection $trackedJobs;

    public function mount(Collection $trackedJobs)
    {
        $this->trackedJobs = $trackedJobs;
    }

    public function render()
    {
        return view('trackable-jobs::livewire.job-status', [
            'trackedJobs' => $this->trackedJobs
        ]);
    }
}
