<?php

namespace App\Jobs;

use App\Models\Item;
use Illuminate\Bus\Batchable;
use Illuminate\Bus\Queueable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;

class ItemCsvData implements ShouldQueue
{
    use Batchable, Dispatchable, InteractsWithQueue, Queueable, SerializesModels;
    public $header;
    public $data;


    /**
     * Create a new job instance.
     */
    public function __construct($data,$header)
    {
        //
        $this->data = $data;
        $this->header = $header;

    }

    /**
     * Execute the job.
     */
    public function handle(): void
    {
        //
        foreach($this->data as $item){
            $itemInput = array_combine($this->header, $item);
            Item::create($itemInput);
       }

    }
}
