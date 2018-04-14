<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use App\Models\Group;

class RequestMember implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    protected $leaderCwid;
    protected $memberCwid;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct($leaderCwid, $memberCwid)
    {
      $this->leaderCwid = $leaderCwid;
      $this->memberCwid = $memberCwid;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
      return Group::requestMember($this->leaderCwid, $this->memberCwid);
    }
}
