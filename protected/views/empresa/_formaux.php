<div class="form">


<?php $form = $this->beginWidget('GxActiveForm', array(
	'id' => 'empresa-form',
	'enableAjaxValidation' => false,
));
?>

	<p class="note">
		<?php echo Yii::t('app', 'Fields with'); ?> <span class="required">*</span> <?php echo Yii::t('app', 'are required'); ?>.
	</p>

	<?php echo $form->errorSummary($U); ?>
                
<!--                <div class="row">
		<?php //echo $form->labelEx($A,'id_user'); ?>
		<?php //echo $form->dropDownList($A, 'id_user', GxHtml::listDataEx(Usuario::model()->findAllAttributes(null, true))); ?>
		<?php //echo $form->error($A,'id_user'); ?>
		</div> row -->

                <div class="row">
		<?php echo $form->labelEx($U,'nombre_usuario'); ?>
		<?php echo $form->textField($U, 'nombre_usuario', array('maxlength' => 25)); ?>
		<?php echo $form->error($U,'nombre_usuario'); ?>
		</div><!-- row -->
                <div class="row">
		<?php echo $form->labelEx($U,'clave'); ?>
		<?php echo $form->passwordField($U, 'clave', array('maxlength' => 25)); ?>
		<?php echo $form->error($U,'clave'); ?>
                </div><!-- row -->
                <div class="row">
		<?php echo $form->labelEx($U,'repeatpassword'); ?>
		<?php echo $form->passwordField($U, 'repeatpassword', array('maxlength' => 25)); ?>
		<?php echo $form->error($U,'repeatpassword'); ?>
                </div><!-- row -->

<?php
echo GxHtml::submitButton(Yii::t('app', 'Save'));
$this->endWidget();
?>
</div><!-- form -->