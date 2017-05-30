<?php

namespace Razorpay\Slack\Jobs;

use App;
use Razorpay\Slack\Client;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Bus\Queueable;
//use Illuminate\Contracts\Bus\SelfHandling;

class SlackJob implements ShouldQueue
{
    use InteractsWithQueue, SerializesModels, Queueable;

    protected $payload;

    const MAX_RETRY_ATTEMPTS = 10;

    const RELEASE_WAIT_TIMEOUT = 120;

    public function __construct(array $payload)
    {
        $this->payload = $payload;
    }
    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        if ($this->attempts() >= self::MAX_RETRY_ATTEMPTS)
        {
            $this->delete();
        }
        else
        {
            try
            {
                $app = App::getFacadeRoot();

                $app['slack']->sendPayload($this->payload);

                $this->delete();
            }
            catch (\Throwable $e)
            {
                $this->release(self::RELEASE_WAIT_TIMEOUT);
            }
        }
    }
}
