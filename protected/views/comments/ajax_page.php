<div class="form">
 
    <?php $form=$this->beginWidget('CActiveForm', array(
            'id'=>'id',
            'enableAjaxValidation'=>false,
    )); ?>
 
    <div class="row">
        <?php echo $form->labelEx($model,'ime'); ?>
        <?php echo $form->textField($model,'ime'); ?>
        <?php echo $form->error($model,'ime'); ?>
    </div>
        <div class="row">
        <?php echo $form->labelEx($model,'komentar'); ?>
        <?php echo $form->textField($model,'komentar'); ?>
        <?php echo $form->error($model,'komentar'); ?>
    </div>
 
 
    <div class="row buttons">
        <?php echo CHtml::ajaxSubmitButton ("Post",
                array('comments/ajax'),
                            array('update' => '#post')); 
        ?>
    </div>
 
    <?php $this->endWidget(); ?>
 
 </div>
 <br />