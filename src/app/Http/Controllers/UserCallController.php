<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;

/**
 * Class for Handling Requests About Users
 *
 * The propose of this class is to handle all endpoint
 * request to the application
 * 
 * @package Monitor
 * @category Controllers    
 * @author André Fonseca <andre.fg.fonseca@gmail.com>
 * @version 1.0.a
 * @since 1.0.a
 */
class UserCallController extends Controller {
    
    
    /**
     * API Endpoint for getting the Latest Alerts
     *  
     * @param Request $request
     */
    public function getLatestAlerts(Request $request) {
        
    }
    
    /**
     * API Endpoint for getting the update on
     * alerts
     * 
     * @param Request $request
     */
    public function getAlertUpdated(Request $request) {
        
    }
    
    /**
     * API Endpoint for set alert updates on
     * 
     * @param Request $request
     */
    public function setAlertUpdate(Request $request) {
        
    }
}
