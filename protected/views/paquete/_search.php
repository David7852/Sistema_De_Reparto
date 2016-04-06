<div class="wide form">

<?php $form = $this->beginWidget('GxActiveForm', array(
	'action' => Yii::app()->createUrl($this->route),
	'method' => 'get',
)); ?>

	<div class="row">
		<?php echo $form->label($model, 'cod_paquete'); ?>
		<?php echo $form->textField($model, 'cod_paquete'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model, 'peso'); ?>
		<?php echo $form->textField($model, 'peso'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model, 'cod_producto'); ?>
		<?php echo $form->dropDownList($model, 'cod_producto', GxHtml::listDataEx(Producto::model()->findAllAttributes(null, true)), array('prompt' => Yii::t('app', 'All'))); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model, 'cod_presupuesto'); ?>
		<?php echo $form->dropDownList($model, 'cod_presupuesto', GxHtml::listDataEx(Presupuesto::model()->findAllAttributes(null, true)), array('prompt' => Yii::t('app', 'All'))); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model, 'alto'); ?>
		<?php echo $form->textField($model, 'alto'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model, 'ancho'); ?>
		<?php echo $form->textField($model, 'ancho'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model, 'descripcion'); ?>
		<?php echo $form->textField($model, 'descripcion', array('maxlength' => 250)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model, 'cod_encargo'); ?>
		<?php echo $form->dropDownList($model, 'cod_encargo', GxHtml::listDataEx(Encargo::model()->findAllAttributes(null, true)), array('prompt' => Yii::t('app', 'All'))); ?>
	</div>

	<div class="row buttons">
		<?php echo GxHtml::submitButton(Yii::t('app', 'Search')); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- search-form -->
