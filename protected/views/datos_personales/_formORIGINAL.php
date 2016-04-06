<div class="form">


<?php $form = $this->beginWidget('GxActiveForm', array(
	'id' => 'datos-personales-form',
	'enableAjaxValidation' => false,
));
?>

	<p class="note">
		<?php echo Yii::t('app', 'Fields with'); ?> <span class="required">*</span> <?php echo Yii::t('app', 'are required'); ?>.
	</p>

	<?php echo $form->errorSummary($model); ?>

		<div class="row">
		<?php echo $form->labelEx($model,'nombre'); ?>
		<?php echo $form->textField($model, 'nombre', array('maxlength' => 25)); ?>
		<?php echo $form->error($model,'nombre'); ?>
		</div><!-- row -->
		<div class="row">
		<?php echo $form->labelEx($model,'apellido'); ?>
		<?php echo $form->textField($model, 'apellido', array('maxlength' => 25)); ?>
		<?php echo $form->error($model,'apellido'); ?>
		</div><!-- row -->
		<div class="row">
		<?php echo $form->labelEx($model,'cedula'); ?>
		<?php echo $form->textField($model, 'cedula', array('maxlength' => 10)); ?>
		<?php echo $form->error($model,'cedula'); ?>
		</div><!-- row -->
		<div class="row">
		<?php echo $form->labelEx($model,'correo'); ?>
		<?php echo $form->textField($model, 'correo', array('maxlength' => 30)); ?>
		<?php echo $form->error($model,'correo'); ?>
		</div><!-- row -->
		<div class="row">
		<?php echo $form->labelEx($model,'RIF'); ?>
		<?php echo $form->textField($model, 'RIF', array('maxlength' => 20)); ?>
		<?php echo $form->error($model,'RIF'); ?>
		</div><!-- row -->
		<div class="row">
		<?php echo $form->labelEx($model,'numero_telefono'); ?>
		<?php echo $form->textField($model, 'numero_telefono', array('maxlength' => 10)); ?>
		<?php echo $form->error($model,'numero_telefono'); ?>
		</div><!-- row -->
		<div class="row">
		<?php echo $form->labelEx($model,'id_user'); ?>
		<?php echo $form->dropDownList($model, 'id_user', GxHtml::listDataEx(Usuario::model()->findAllAttributes('nombre_usuario', true))); ?>
		<?php echo $form->error($model,'id_user'); ?>
		</div><!-- row -->


<?php
echo GxHtml::submitButton(Yii::t('app', 'Save'));
$this->endWidget();
?>
</div><!-- form -->