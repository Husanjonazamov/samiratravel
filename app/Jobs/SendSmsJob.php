<?php

namespace App\Jobs;

use App\Models\SmsConfirm;
use App\Services\Sms\SendService;
use Carbon\Carbon;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Throwable;

class SendSmsJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    public  $smsConfirm;
    public  $tries = 3;

    /**
     * Create a new job instance.
     *
     * @param SmsConfirm $smsConfirm
     */
    public function __construct(SmsConfirm $smsConfirm)
    {
        $this->smsConfirm = $smsConfirm;
    }

    /**
     * Execute the job.
     *
     * @param SendService $smsService
     * @return void
     */
    public function handle(SendService $smsService)
    {
        $smsService->sendSMS($this->smsConfirm->phone, 'RTM:Ваш код - ' . $this->smsConfirm->code);
    }
}
