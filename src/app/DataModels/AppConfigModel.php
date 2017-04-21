<?php

namespace App\DataModels;

/**
 * Description AppConfig
 * 
 * Long Description
 *
 * @package Monitor
 * @category Models
 * @version 1.0.a
 * 
 * @author Andre Fonseca <andre.fg.fonseca@gmail.com>
 * @since 1.0.a
 * 
 */


class AppConfigModel extends \Illuminate\Database\Eloquent\Model {
    
    /**
     * Define Working DB Table
     * @var string 
     */
    protected $table = 'sys_app_config';
    
    /**
     * Get the configuration from a specific
     * configuration Table
     * 
     * @param string $tableName
     * @return array
     */
    public function getConfig($tableName) {
        
        $res = $this->where('table',$tableName)->get();
        
        if (count($res) > 0) {
            foreach($res as $row) {
                dd($row['c_id']);
            }
        }
    }
    
    /**
     * Get a specific config parameter
     * 
     * @param string $tableName
     * @param string $code
     */
    public function getConfigItem($tableName, $code) {
        
        $res = $this->where('table',$tableName)
                ->where('code', $code)->get();
        
        if (count($res) > 0) {
            foreach ($res as $row) {
                return $row['value'];
            }
        } else {
            return;
        }
        
    }
}
