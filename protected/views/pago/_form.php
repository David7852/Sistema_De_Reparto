<div class="form">


<?php $form = $this->beginWidget('GxActiveForm', array(
	'id' => 'pago-form',
	'enableAjaxValidation' => false,
));
?>

	<p class="note">
		<?php echo Yii::t('app', 'Fields with'); ?> <span class="required">*</span> <?php echo Yii::t('app', 'are required'); ?>.
	</p>

	<?php echo $form->errorSummary($model); ?>

		<div class="row">
		<?php echo $form->labelEx($model,'id_empresa'); ?>
		<?php echo $form->textField($model, 'id_empresa'); ?>
		<?php echo $form->error($model,'id_empresa'); ?>
		</div><!-- row -->
		<div class="row">
		<?php echo $form->labelEx($model,'fecha_realizacion'); ?>
		<?php echo $form->textField($model, 'fecha_realizacion', array('maxlength' => 10)); ?>
		<?php echo $form->error($model,'fecha_realizacion'); ?>
		</div><!-- row -->
		<div class="row">
		<?php echo $form->labelEx($model,'monto'); ?>
		<?php echo $form->textField($model, 'monto'); ?>
		<?php echo $form->error($model,'monto'); ?>
		</div><!-- row -->
		<div class="row">
		<?php echo $form->labelEx($model,'cod_boucher'); ?>
		<?php echo $form->textField($model, 'cod_boucher', array('maxlength' => 20)); ?>
		<?php echo $form->error($model,'cod_boucher'); ?>
		</div><!-- row -->
		<div class="row">
		<?php echo $form->labelEx($model,'factura'); ?>
		<?php echo $form->textField($model, 'factura', array('maxlength' => 600)); ?>
		<?php echo $form->error($model,'factura'); ?>
		</div><!-- row -->
		<div class="row">
		<?php echo $form->labelEx($model,'cod_envio'); ?>
		<?php echo $form->dropDownList($model, 'cod_envio', GxHtml::listDataEx(Envio::model()->findAllAttributes(null, true))); ?>
		<?php echo $form->error($model,'cod_envio'); ?>
		</div><!-- row -->


<?php
echo GxHtml::submitButton(Yii::t('app', 'Save'));
$this->endWidget();
?>
</div><!-- form -->