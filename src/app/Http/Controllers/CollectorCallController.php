<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;

/**
 * Monitor API Class Controller
 * 
 * This class will handle all the requests made to the entry API.
 * 
 * @package Monitor
 * @category Controllers    
 * @author André Fonseca <andre.fg.fonseca@gmail.com>
 * @version 1.0.a
 * @since 1.0.a
 * 
 */
class CollectorCallController extends Controller
{
    
    /**
     * Endpoint Request handler - POST
     * 
     * This method will handle all the requests made to the MONITOR API
     * using POST HTTP method
     * 
     * 
     * @author André Fonseca <andre.fg.fonseca@gmail.com>
     * @since 1.0.0
     * 
     * @param Request $request
     * @return void
     * 
     */
    public function collector(Request $request) {
           
        // write to database
        if ($request->method() != 'POST' ) {
            die;
        }
        
        $message = new \App\DataModels\AppCollectorModel();
        
        $message->source_id = $request->input('id') ;
        // poller
        $message->poller = $request->input('poller');
        // time
        $message->time = $request->input('time');
        //type
        $message->type = $request->input('type');
        //status
        $message->status = $request->input('status');
        //service
        $message->service = $request->input('service');
        //host
        $message->alert_id = $request->input('alert_id');
        //host
        $message->host = $request->input('host');
        //IP
        $message->ip = $request->input('ip');
        
        //output
        $message->out_1 = $request->input('output_1');
        $message->out_2 = $request->input('output_2');
        $message->out_3 = $request->input('output_3');
        
        //thruk link
        $message->thruk_url = $request->input('url_1');
        //sca
        $message->sca_url = $request->input('url_2');
        // set the flag to 0 for operator to cache
        // this request
        $message->flg_stat = '0';
        
        $message->save();
        
    }
}
