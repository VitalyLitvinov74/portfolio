<?php
/**
 * Created by PhpStorm.
 * User: vitaly
 * Date: 27.09.2019
 * Time: 20:54
 */

namespace app\models;


use yii\db\ActiveRecord;

class UserRecord extends ActiveRecord
{
    public static function tableName()
    {
        return 'user';
    }
}