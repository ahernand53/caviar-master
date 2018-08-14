<?php
/**
 * Created by PhpStorm.
 * User: ahernand53
 * Date: 13/08/18
 * Time: 09:00 PM
 */

namespace App\models;


use Illuminate\Database\Eloquent\Model;

class Special extends Model
{

    protected $table = 'plate_special';

    public function plate(){

        return $this->hasOne('App\models\Plate', 'id', 'plate_id');

    }

}