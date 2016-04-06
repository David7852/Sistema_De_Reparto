<div class="wide form">

<?php $form = $this->beginWidget('GxActiveForm', array(
	'action' => Yii::app()->createUrl($this->route),
	'method' => 'get',
)); ?>

	<div class="row">
		<?php echo $form->label($model, 'cod_envio'); ?>
		<?php echo $form->textField($model, 'cod_envio'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model, 'estado'); ?>
		<?php echo $form->enumDropDownList($model, 'estado'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model, 'id_empresa'); ?>
		<?php echo $form->textField($model, 'id_empresa'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model, 'id_operador'); ?>
		<?php echo $form->textField($model, 'id_operador'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model, 'cod_presupuesto'); ?>
		<?php echo $form->dropDownList($model, 'cod_presupuesto', GxHtml::listDataEx(Presupuesto::model()->findAllAttributes(null, true)), array('prompt' => Yii::t('app', 'All'))); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model, 'fecha'); ?>
		<?php echo $form->textField($model, 'fecha', array('maxlength' => 30)); ?>
	</div>

	<div class="row buttons">
		<?php echo GxHtml::submitButton(Yii::t('app', 'Search')); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- search-form -->
