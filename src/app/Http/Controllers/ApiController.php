<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Libs\Models\ApiCallModel;

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
        
        // Just save to database
        $req = new \App\Libs\Models\ApiRequestModel();
        
        $reqString = '';
        foreach ($request->input() as $key => $value) {
            $reqString .= '|s|' . $key . '=' . $value;
        }
        $req->request = $reqString;
        
        $req->save();
        
        
        
        ///
        raiseAppError(['message' => 'testing']);
        /*
        if (!$request->input('sid')) {
            echo 'No Source defined...exiting';
            exit(0);
        }
        
        // set new api Object
        $apiCall = new ApiCallModel();
        
        // create new API Call Array
        $apiCallConfig['config'] = 
                $apiCall->getCallConfigByName($request->input('sid'));
        
        // Set params
        $apiCallConfig['params'] = $apiCall->getCallConfigDet($apiCallConfig['config']['call_id']);
        
        // first, lets check if all the required call parameters
        // are presented on the request input
        foreach($apiCallConfig['params'] as $param) {
            
            if ($param['is_required']) {
                
                if (!$request->input($param['name'])) {
                    $controller['status'] = ApiCallModel::ERROR_PARAMETER_IS_REQUIRED;
                    $controller['message'] = '<p>Parameter ' . strtoupper($param['name']) .' is not present!!!';
                }
            }   
        }
        
        // now, if we got here, then all required parameters are on
        // the request. Let's check if they meet the required
        // specs
        if ($controller['status'] == ApiCallModel::REQUEST_OK)
        {
            foreach($apiCallConfig['params'] as $param) {

                // if is type INT
                if ($param['data_type'] == 'int') {
                    
                //
                // check if the lenght is ok
                //
                } elseif ($param['data_type'] == 'string') {
                    // check if the parameter is a string and what's is lenght
                    
                }
                
                //--------------------------------------------------------
                
                // if parameter has an error and is required then
                // exit
                
            }
        } // END LOOP
            */
    } 
}
