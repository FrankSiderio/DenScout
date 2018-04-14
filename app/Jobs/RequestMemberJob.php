<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use App\Mail\RequestMember;
use App\Models\Group;

class RequestMemberJob implements ShouldQueue
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
      \Mail::to($cwid . "@marist.edu")->queue(new MemberRequest(Student::getName($leaderCwid)));
    }
}
