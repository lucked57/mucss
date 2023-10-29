<?php

    namespace app\models;

    use yii\db\ActiveRecord;

    class Gallery_paw extends ActiveRecord{

        
        public static function tableName(){
        return 'gallery_paw';
    }
        

        
        
        public function rules(){
        return [ 
           [ ['img_min', 'img_full'], 'trim' ],
        ];
    }
        

        
        
    }
