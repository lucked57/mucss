<?php

    namespace app\models;

    use yii\db\ActiveRecord;
    use yii\base\Model;
    use yii\web\UploadedFile;
    use app\components\Uservaludate;
    use app\models\Gallery_paw;

    class Gallery extends ActiveRecord{
        

        public $imageFiles;
        
       
        
        
   

    public function rules()
    {
        return [
            [['imageFiles'], 'file', 'skipOnEmpty' => false, 'extensions' => 'png, jpg, jpeg', 'maxFiles' => 100],
        ];
    }
    
    public function upload()
    {
        if ($this->validate()) { 
            foreach ($this->imageFiles as $file) {
                //$filename = uniqid();
                
                     $i = 0;
                    do {
                        $i++;
                        if($i > 100){
                            break;
                        }
                    $img_name = "img/gallery/".uniqid().".{$file->extension}";
                    $img_copy_name = "img/gallery/".uniqid()."copy.{$file->extension}";
                } while (file_exists($img_name));
                $file->saveAs($img_name);
                
                 $copyfile = $_SERVER['DOCUMENT_ROOT'].'/web/'.$img_copy_name;
                 $file_full = $_SERVER['DOCUMENT_ROOT'].'/web/'.$img_name;
                
                    if (!copy($file_full, $copyfile)) {
                    echo "не удалось скопировать $file_full...\n";
                }
                
                
                
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
                
                
                $model = new Gallery_paw();
                
                $model->img_full = $img_name;
                $model->img_min = $img_copy_name;
                $model->save();
                
                
            }
            return true;
        } else {
            return false;
        }
    }
        
       public function delete_img($id){
            
            $table = Gallery_paw::find()->asArray()->where(['id' => $id])->one();
            
            if(!empty($table['img_full'])){
                unlink('./'.$table['img_full']);
            }
            if(!empty($table['img_min'])){
                unlink('./'.$table['img_min']);
            }
            
            
            
            
            
            $table = Gallery_paw::findone($id);
            
            $table->delete();
            
            
            
            return true;
        } 

        
        
    }
