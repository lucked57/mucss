<?php

    namespace app\models;

    use yii\db\ActiveRecord;
    use yii\web\UploadedFile;
    use app\components\Uservaludate;

    class Uploadpost extends ActiveRecord{

        
        public static function tableName(){
        return 'posts_paw';
    }
        
        
        public function attributeLabels(){
        
        return [
            'title_ru' => 'Название ru',
            'text_ru' => 'Описание ru',
            'title_ee' => 'Название ee',
            'text_ee' => 'Описание ee',
            'image' => 'Картинка',
        ];
        
    }
        
        
        public function rules(){
        return [ 
            [ ['text_ru', 'title_ru','text_ee', 'title_ee'], 'trim' ],
            [['image'], 'file', 'extensions' => 'png, jpg'],
             //[ 'image', 'myRule' ],
        ];
    }
        
        public function myRule($attr){
            $imageinfo = getimagesize($this->image->tempName);
            if($imageinfo['mime'] != 'image/png' && $imageinfo['mime'] != 'image/jpeg' && $imageinfo['mime'] != 'image/jpg'){
               $this->addError($attr, 'Есть пустые значения'); 
            }
        }
        
        public function upload(){
        if($this->validate() && !empty($this->image->extension)){
                $i = 0;
                do {
                    $i++;
                    if($i > 100){
                        break;
                    }
                $img_name = "img/posts/".uniqid().".{$this->image->extension}";
                $img_copy_name = "img/posts/".uniqid()."copy.{$this->image->extension}";
            } while (file_exists($img_name));
            
            
             $this->image->saveAs($img_name);
            
            
            
            $copyfile = $_SERVER['DOCUMENT_ROOT'].'/web/'.$img_copy_name;
             $file = $_SERVER['DOCUMENT_ROOT'].'/web/'.$img_name;

                if (!copy($file, $copyfile)) {
                    echo "не удалось скопировать $file...\n";
                }
                
                    
                
                
                //$size_img = filesize($copyfile);
            
                if(filesize($copyfile) > 2000000){
                    $reciz = 30;
                    $responsive = 500;
                }
                else{
                    $reciz = 60;
                    $responsive = 700;
                }
                
                
                
               if(filesize($copyfile) > 190000) {
                    
                
                
                    $i = 0;
                    $percent = 1;
                    do{
                        
                        
                        
                        list($width, $height) = getimagesize($copyfile);
                        
                        $new_width = $width * $percent;
                        $new_height = $height * $percent;
                        $image_p = imagecreatetruecolor($new_width, $new_height);

                        
                        
                        
                        if($percent > 0.019){
                           $percent = $percent - 0.019; 
                        }
                        
                        if($i > 100){
                            break;
                        }
                        
                        $i++;
                        
                    }while($new_width > $responsive || $new_height > $responsive);
                
                
                    $image_p = imagecreatetruecolor($new_width, $new_height);
                    $i = 0;
                
           
                  
                  
                  if (exif_imagetype($copyfile) == IMAGETYPE_JPEG) {
                                $image = imagecreatefromjpeg($copyfile);
                                imagecopyresampled($image_p, $image, 0, 0, 0, 0, $new_width, $new_height, $width, $height);
                                imagejpeg($image_p, $copyfile, $reciz);
                         }
                
                if (exif_imagetype($copyfile) == IMAGETYPE_PNG) {
                                $image = imagecreatefrompng($copyfile);
                                imagecopyresampled($image_p, $image, 0, 0, 0, 0, $new_width, $new_height, $width, $height);
                                imagepng($image_p, $copyfile, 9, 30);
                          }
                  
                     }
            
           
            
                 $model = new Uploadpost();
            
                $model->title_ru = Uservaludate::validateInput($this->title_ru);
            
  
                $text_ru = Uservaludate::validateInput($this->text_ru);
                $text_ru = str_replace("title_start", "</p><h3>", $text_ru);
                $text_ru = str_replace("title_end", "</h3><p class='lead'>", $text_ru);
                $text_ru = str_replace("bold_start", "<b>", $text_ru);
                $text_ru = str_replace("bold_end", "</b>", $text_ru);
                $text_ru = str_replace("carry_one", "<br>", $text_ru);
                $model->text_ru = str_replace("carry_two", "<br><br>", $text_ru);
            
                $model->title_ee = Uservaludate::validateInput($this->title_ee);
            

                $text_ee = Uservaludate::validateInput($this->text_ee);
                $text_ee = str_replace("title_start", "</p><h3>", $text_ee);
                $text_ee = str_replace("title_end", "</h3><p class='lead'>", $text_ee);
                $text_ee = str_replace("bold_start", "<b>", $text_ee);
                $text_ee = str_replace("bold_end", "</b>", $text_ee);
                $text_ee = str_replace("carry_one", "<br>", $text_ee);
                $model->text_ee = str_replace("carry_two", "<br><br>", $text_ee);
            
                $model->image = $img_name;
                $model->image_min = $img_copy_name;
                $model->save();
            
            //unlink('./'.$img_name);
            return true;
        }else{
            return false;
        }
    }
        
        public function delete_post($id){
            
            $table = Uploadpost::find()->asArray()->where(['id' => $id])->one();
            
            if(!empty($table['image'])){
                unlink('./'.$table['image']);
            }
            if(!empty($table['image_min'])){
                unlink('./'.$table['image_min']);
            }
            
            
            
            
            
            $table = Uploadpost::findone($id);
            
            $table->delete();
            
            
            
            return true;
        }
        
        
    }
