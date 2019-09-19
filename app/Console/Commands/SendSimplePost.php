<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;


use Curl;

class SendSimplePost extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'command:send';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Send a Simple POST';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
       $response = $this->sendMyPost();

        $this->info( $response );
    }

      /**
     * Function to send.
     *
     * @return mixed
     */    
    private function sendMyPost() : string
    {
            $response = Curl::to('https://atomic.incfile.com/fakepost')
            ->withData( array() )
            ->returnResponseObject()
            ->post();
           
            $content = $response->content;
            return $content;

    }


}
