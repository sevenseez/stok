<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

class MyActiveRecord extends CActiveRecord {
   
    private static $db_adres = null;
 
    protected static function getAdresDbConnection()
    {
        if (self::$db_adres !== null)
            return self::$db_adres;
        else
        {
            self::$db_adres = Yii::app()->db_adres;
            if (self::$db_adres instanceof CDbConnection)
            {
                self::$db_adres->setActive(true);
                return self::$db_adres;
            }
            else
                throw new CDbException(Yii::t('yii','Active Record requires a "db" CDbConnection application component.'));
        }
    }
}