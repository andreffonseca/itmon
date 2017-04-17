<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace App\Http\Controllers;

use Illuminate\Http\Request;

/**
 * Description of ApiController
 *
 * @author IT170302
 */
class ApiController extends Controller {
    
    
    function __construct() {
        ;
    }
    
    /**
     * 
     */
    public function router(Request $request) {
        echo 'Method: ' . $request->method();
        $this->threatPostCall($request);
    }
    
    
    private function threatPostCall(Request $request) {
        
        if (!$request->input('sid')) {
            echo 'No Source defined...exiting';
            exit(0);
        }
        
        $apiCall = new \App\Libs\Models\ApiCallModel();
        
        
        
        $apiCallConfig['config'] = 
                $apiCall->getCallConfigByName($request->input('sid'));
        
        $configParams['params'] = $apiCall->getCallConfigDet($apiCallConfig['config']['call_id']);
        
        dd($configParams);
        
        
    }
    
    
}
