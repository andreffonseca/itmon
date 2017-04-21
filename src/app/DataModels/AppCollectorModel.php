<?php


namespace App\DataModels;

/**
 * Description CollectorModel
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
class AppCollectorModel extends \Illuminate\Database\Eloquent\Model {
    
    /**
     * Define Working DB Table
     * @var string 
     */
    protected $table = 'ods_api_call_temp';
    
}
