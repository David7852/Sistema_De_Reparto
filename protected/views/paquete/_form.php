<div class="form">


<?php $form = $this->beginWidget('GxActiveForm', array(
	'id' => 'paquete-form',
	'enableAjaxValidation' => false,
));
?>

	<p class="note">
		<?php echo Yii::t('app', 'Fields with'); ?> <span class="required">*</span> <?php echo Yii::t('app', 'are required'); ?>.
	</p>

	<?php echo $form->errorSummary($model); ?>

		<div class="row">
		<?php echo $form->labelEx($model,'peso'); ?>
		<?php echo $form->textField($model, 'peso'); ?>
		<?php echo $form->error($model,'peso'); ?>
		</div><!-- row -->
		<div class="row">
		<?php echo $form->labelEx($model,'cod_producto'); ?>
		<?php echo $form->dropDownList($model, 'cod_producto', GxHtml::listDataEx(Producto::model()->findAllAttributes(null, true))); ?>
		<?php echo $form->error($model,'cod_producto'); ?>
		</div><!-- row -->
		<div class="row">
		<?php echo $form->labelEx($model,'cod_presupuesto'); ?>
		<?php echo $form->dropDownList($model, 'cod_presupuesto', GxHtml::listDataEx(Presupuesto::model()->findAllAttributes(null, true))); ?>
		<?php echo $form->error($model,'cod_presupuesto'); ?>
		</div><!-- row -->
		<div class="row">
		<?php echo $form->labelEx($model,'alto'); ?>
		<?php echo $form->textField($model, 'alto'); ?>
		<?php echo $form->error($model,'alto'); ?>
		</div><!-- row -->
		<div class="row">
		<?php echo $form->labelEx($model,'ancho'); ?>
		<?php echo $form->textField($model, 'ancho'); ?>
		<?php echo $form->error($model,'ancho'); ?>
		</div><!-- row -->
		<div class="row">
		<?php echo $form->labelEx($model,'descripcion'); ?>
		<?php echo $form->textField($model, 'descripcion', array('maxlength' => 250)); ?>
		<?php echo $form->error($model,'descripcion'); ?>
		</div><!-- row -->
		<div class="row">
		<?php echo $form->labelEx($model,'cod_encargo'); ?>
		<?php echo $form->dropDownList($model, 'cod_encargo', GxHtml::listDataEx(Encargo::model()->findAllAttributes(null, true))); ?>
		<?php echo $form->error($model,'cod_encargo'); ?>
		</div><!-- row -->


<?php
echo GxHtml::submitButton(Yii::t('app', 'Save'));
$this->endWidget();
?>
</div><!-- form -->