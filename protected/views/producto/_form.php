<div class="form">


<?php $form = $this->beginWidget('GxActiveForm', array(
	'id' => 'producto-form',
	'enableAjaxValidation' => false,
));
?>

	<p class="note">
		<?php echo Yii::t('app', 'Fields with'); ?> <span class="required">*</span> <?php echo Yii::t('app', 'are required'); ?>.
	</p>

	<?php echo $form->errorSummary($model); ?>

		<div class="row">
		<?php echo $form->labelEx($model,'fragil'); ?>
		<?php echo $form->checkBox($model, 'fragil'); ?>
		<?php echo $form->error($model,'fragil'); ?>
		</div><!-- row -->
		<div class="row">
		<?php echo $form->labelEx($model,'refrigerado'); ?>
		<?php echo $form->checkBox($model, 'refrigerado'); ?>
		<?php echo $form->error($model,'refrigerado'); ?>
		</div><!-- row -->
		<div class="row">
		<?php echo $form->labelEx($model,'vivo'); ?>
		<?php echo $form->checkBox($model, 'vivo'); ?>
		<?php echo $form->error($model,'vivo'); ?>
		</div><!-- row -->
		<div class="row">
		<?php echo $form->labelEx($model,'peligroso'); ?>
		<?php echo $form->checkBox($model, 'peligroso'); ?>
		<?php echo $form->error($model,'peligroso'); ?>
		</div><!-- row -->
		<div class="row">
		<?php echo $form->labelEx($model,'descripcion'); ?>
		<?php echo $form->textField($model, 'descripcion', array('maxlength' => 500)); ?>
		<?php echo $form->error($model,'descripcion'); ?>
		</div><!-- row -->
		<div class="row">
		<?php echo $form->labelEx($model,'nombre'); ?>
		<?php echo $form->textField($model, 'nombre', array('maxlength' => 200)); ?>
		<?php echo $form->error($model,'nombre'); ?>
		</div><!-- row -->
		<div class="row">
		<?php echo $form->labelEx($model,'Id_empresa'); ?>
		<?php echo $form->dropDownList($model, 'Id_empresa', GxHtml::listDataEx(Empresa::model()->findAllAttributes(null, true))); ?>
		<?php echo $form->error($model,'Id_empresa'); ?>
		</div><!-- row -->

<?php
echo GxHtml::submitButton(Yii::t('app', 'Save'));
$this->endWidget();
?>
</div><!-- form -->