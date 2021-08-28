<?php

namespace App\Jobs;

use App\Models\NetinstallInterface;
use App\Models\RouterosTemplate;
use App\Events\OperationStatusUpdate;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;

class RunOperation implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;


    /**
     * The netinstall interface instance.
     *
     * @var \App\NetinstallInterface
     */
    protected $interface;
    protected $operation;
    protected $template;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct(NetinstallInterface $interface, int $operation, RouterosTemplate $template)
    {
	    $this->interface = $interface;
	    $this->operation = $operation;
	    $this->template = $template;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
	OperationStatusUpdate::dispatch();
        if ($this->operation != 0) {
           $this->interface->last_operation = $this->operation;
           $this->interface->last_result = 0;
	   $this->interface->save();
	   return;
        }
        $this->interface->last_operation = null;
        $this->interface->last_result = null;
        $this->interface->save();
    }
}
