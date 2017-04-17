<?php

namespace App\Libs\Models;

use Illuminate\Database\Eloquent\Model;

class ApiCallModel extends Model {
    
    // Possible Status
    const REQUEST_OK = 0;
    const ERROR_PARAMETER_WRONG_DATATYPE = 1;
    const ERROR_PARAMETER_IS_REQUIRED = 2;
    const ERROR_PARAMETER_WRONG_LEN = 3;
    const REQUEST_FAILED = 4;
    const PARAMETER_OK = 10;
    
    public $insertFields;
    public $insertValues = array();

    public function getCallConfigByName($apiCallName) {

        $query = 'select * from api_call_def where name = ? and is_active = 1';
        $apiConfig = db()->select($query, [$apiCallName]);

        if (count($apiConfig) == 1) {
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
    
    /**
     * 
     * @param type $paramValue
     * @param type $param
     * @return type
     */
    public function sanitizeParam($paramValue, $param) {

        if ($param['data_type'] == 'int') {
            return $this->sanitizeInteger($paramValue, $param);
        } else if ($param['data_type'] == 'string') {
            return $this->sanitizeString($paramValue, $param);
        }
    }
    
    /**
     * 
     * @param type $paramValue
     * @param type $param
     */
    private function sanitizeString($paramValue, $param) {
        
        $c = array();
        
        // validate Max Len
        if (strlen($request->input($param['name'])) > $param['max_len']) {
            $controller['message'] = 'Parameter ' . strtoupper($param['name']) .
                    ' lenght is greater then ' . $param['max_len'] .
                    ' (' . strlen($request->input($param['name'])) .
                    ' ) characteres';
            $controller['status'] = ApiCallModel::ERROR_PARAMETER_WRONG_LEN;
        }
        
        $this->checkDepends($paramValue, $param, $c);
    }
    
    /**
     * 
     * @param type $paramValue
     * @param type $param
     * @return type
     */
    private function sanitizeInteger($paramValue, $param) {
        
        $c = array('status' => ApiCallModel::PARAMETER_OK);

        // check if the parameter is an int
        if (!(int) $request->input($param['name'])) {
            $c['message'] = 'Parameter ' . strtoupper($param['name']) .
                    ' should be a number but something else' .
                    ' was found: ' . $request->input($param['name']);
            $c['status'] = ApiCallModel::ERROR_PARAMETER_WRONG_DATATYPE;
            $c['action'] = ApiCallModel::REQUEST_FAILED;
        }
        
        $this->checkDepends($paramValue, $param, $c);
    }
    
    /**
     * 
     * @param type $paramValue
     * @param type $param
     * @return type
     */
    private function checkDepends($paramValue, $param, $c) {
        
        if ($param['is_required'] && 
                $c['status'] != ApiCallModel::PARAMETER_OK) {
            
            raiseAppError(['message' => $c['message'],
                'class' => (__CLASS__),
                'error_code' => $c['status']
            ]);
        }
    }
    
    /**
     * 
     * @param type $paramValue
     * @param type $param
     * @param type $c
     */
    private function checkActionOnError($paramValue, $param, $c) {
        
        if($param['action'] == 'TRUNC') {
            
        }
        
    }

}
