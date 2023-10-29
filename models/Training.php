<?php

    namespace app\models;

    use yii\db\ActiveRecord;

    class Training extends ActiveRecord{

        
        public static function tableName(){
        return 'training';
    }
        
    }
