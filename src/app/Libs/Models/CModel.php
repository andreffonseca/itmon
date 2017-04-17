<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace App\Libs\Models;

/**
 * Description of CModel
 *
 * @author IT170302
 */
class CModel extends \Illuminate\Database\Eloquent\Model {
    
    function db()
    {
        return app()->make('db');
    }
    
}
