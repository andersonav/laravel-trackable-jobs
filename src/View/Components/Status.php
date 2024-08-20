<?php

namespace Alves\TrackableJobs\View\Components;


use Illuminate\View\Component;
use Alves\TrackableJobs\Models\TrackedJob;

class Status extends Component
{
    public string $status;

    public function __construct(string $status)
    {
        $this->status = $status;
    }

    public function render()
    {
        return view('trackable-jobs::components.status');
    }

    public function color()
    {
        switch (strtolower($this->status)) {
            case TrackedJob::STATUS_QUEUED:
            case TrackedJob::STATUS_STARTED:
                $color = 'yellow';
                break;

            case TrackedJob::STATUS_FINISHED:
                $color = 'green';
                break;

            case TrackedJob::STATUS_FAILED:
                $color = 'red';
                break;

            default:
                $color = 'gray';
                break;
        }

        return $color;
    }

    public function classList()
    {
        return "inline-block uppercase tracking-wide text-xs text-{$this->color()}-600 bg-{$this->color()}-200 rounded p-1 px-2";
    }

    public function statusDisplay()
    {
        return str_replace('_', ' ', $this->status);
    }
}
