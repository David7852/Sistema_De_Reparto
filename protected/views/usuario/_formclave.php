<div class="form">


<?php $form = $this->beginWidget('GxActiveForm', array(
	'id' => 'usuario-form',
	'enableAjaxValidation' => false,
));
?>

	<p class="note">
		<?php echo Yii::t('app', 'Fields with'); ?> <span class="required">*</span> <?php echo Yii::t('app', 'are required'); ?>.
	</p>

	<?php echo $form->errorSummary($model); ?>
        
                <div class="row">
		<?php echo $form->labelEx($model,'nombre_usuario'); ?>
		<?php echo $form->textField($model, 'nombre_usuario', array('maxlength' => 25)); ?>
		<?php echo $form->error($model,'nombre_usuario'); ?>
		</div><!-- row -->
                <div class="row">
		<?php echo $form->labelEx($model,'actualpass'); ?>
		<?php echo $form->passwordField($model, 'actualpass', array('maxlength' => 25)); ?>
		<?php echo $form->error($model,'actualpass'); ?>
		</div><!-- row -->
                <div class="row">
		<?php echo $form->labelEx($model,'newpass'); ?>
		<?php echo $form->passwordField($model, 'newpass', array('maxlength' => 25)); ?>
		<?php echo $form->error($model,'newpass'); ?>
                </div><!-- row -->
                <div class="row">
		<?php echo $form->labelEx($model,'repeatpassword'); ?>
		<?php echo $form->passwordField($model, 'repeatpassword', array('maxlength' => 25)); ?>
		<?php echo $form->error($model,'repeatpassword'); ?>
                </div>
<!--		<div class="row">
		<?php // echo $form->labelEx($model,'fecha_de_registro'); ?>
		<?php // echo $form->textField($model, 'fecha_de_registro', array('maxlength' => 25)); ?>
		<?php // echo $form->error($model,'fecha_de_registro'); ?>
		</div> row -->


<?php
echo GxHtml::submitButton(Yii::t('app', 'Save'));
$this->endWidget();
?>
</div><!-- form -->