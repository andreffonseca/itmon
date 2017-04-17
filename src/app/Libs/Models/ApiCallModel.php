<?php

namespace App\Libs\Models;

use Illuminate\Database\Eloquent\Model;

class ApiCallModel extends Model
{
    
    public function getCallConfigByName($apiCallName){
        
        $query = 'select * from api_call_def where name = ? and is_active = 1';
        $apiConfig = db()->select($query, [$apiCallName]);
        
        if (count($apiConfig) == 1)
        {
            return (array) $apiConfig[0];
        } else if (count($apiConfig) > 1) {
            echo 'More than one configuration found!!!';
            exit(0);
        } else {
            echo 'No configuration found!!!';
            exit(0);
        }
        
    }
    
    public function getCallConfigDet($callID) {
        
        $query = 'select * from api_call_params where call_id = ?';
        $apiConfig = db()->select($query, [$callID]);
        
        $resultArray = array();
        
        foreach ($apiConfig as $config) {
            
            array_push($resultArray, (array) $config);
        }
        
        return $resultArray;    
    }
}
