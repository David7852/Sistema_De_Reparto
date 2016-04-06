<div class="form">


<?php $form = $this->beginWidget('GxActiveForm', array(
	'id' => 'empresa-form',
	'enableAjaxValidation' => false,
));
?>

	<p class="note">
		<?php echo Yii::t('app', 'Fields with'); ?> <span class="required">*</span> <?php echo Yii::t('app', 'are required'); ?>.
	</p>

	<?php echo $form->errorSummary($model); ?>

		<div class="row">
		<?php echo $form->labelEx($model,'id_user'); ?>
		<?php echo $form->dropDownList($model, 'id_user', GxHtml::listDataEx(Usuario::model()->findAllAttributes(null, true))); ?>
		<?php echo $form->error($model,'id_user'); ?>
		</div><!-- row -->

		<label><?php echo GxHtml::encode($model->getRelationLabel('presupuestos')); ?></label>
		<?php echo $form->checkBoxList($model, 'presupuestos', GxHtml::encodeEx(GxHtml::listDataEx(Presupuesto::model()->findAllAttributes(null, true)), false, true)); ?>
		<label><?php echo GxHtml::encode($model->getRelationLabel('productos')); ?></label>
		<?php echo $form->checkBoxList($model, 'productos', GxHtml::encodeEx(GxHtml::listDataEx(Producto::model()->findAllAttributes(null, true)), false, true)); ?>

<?php
echo GxHtml::submitButton(Yii::t('app', 'Save'));
$this->endWidget();
?>
</div><!-- form -->