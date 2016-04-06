<div class="wide form">

<?php $form = $this->beginWidget('GxActiveForm', array(
	'action' => Yii::app()->createUrl($this->route),
	'method' => 'get',
)); ?>

	<div class="row">
		<?php echo $form->label($model, 'cod_pago'); ?>
		<?php echo $form->textField($model, 'cod_pago'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model, 'id_empresa'); ?>
		<?php echo $form->textField($model, 'id_empresa'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model, 'fecha_realizacion'); ?>
		<?php echo $form->textField($model, 'fecha_realizacion', array('maxlength' => 10)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model, 'monto'); ?>
		<?php echo $form->textField($model, 'monto'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model, 'cod_boucher'); ?>
		<?php echo $form->textField($model, 'cod_boucher', array('maxlength' => 20)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model, 'factura'); ?>
		<?php echo $form->textField($model, 'factura', array('maxlength' => 600)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model, 'cod_envio'); ?>
		<?php echo $form->dropDownList($model, 'cod_envio', GxHtml::listDataEx(Envio::model()->findAllAttributes(null, true)), array('prompt' => Yii::t('app', 'All'))); ?>
	</div>

	<div class="row buttons">
		<?php echo GxHtml::submitButton(Yii::t('app', 'Search')); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- search-form -->
