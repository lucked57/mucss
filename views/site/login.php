<?php
    use yii\widgets\ActiveForm;
    use yii\helpers\Html;
?>
    <div class="container">
        <h2 class="mt-5 pt-5 text-center">Авторизация</h2>
        

        <?php if( Yii::$app->session->hasFlash('success') ):?>
    
    <div class="alert alert-success alert-dismissible fade show" role="alert">
   <?php echo Yii::$app->session->getFlash('success'); ?>
  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button>
</div>

    <?php endif;?>
    
    
    
    <?php if( Yii::$app->session->hasFlash('error') ):?>
    
       <div class="alert alert-danger alert-dismissible fade show" role="alert">
   <?php echo Yii::$app->session->getFlash('error'); ?>
  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button>
</div>

    <?php endif;?>
        
        <?php $form = ActiveForm::begin([
    'id' => 'loginForm',
]) ?>
            <?= $form->field($login_model, 'username')->input('email') ?>
            <?= $form->field($login_model, 'password')->input('password') ?>
            <?= Html::submitButton('Отправить', ['class' => 'btn btn-primary mb-5']) ?>
        <?php ActiveForm::end() ?>
        
        
    </div>
