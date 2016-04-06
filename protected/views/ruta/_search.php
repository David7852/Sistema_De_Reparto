<div class="wide form">

<?php $form = $this->beginWidget('GxActiveForm', array(
	'action' => Yii::app()->createUrl($this->route),
	'method' => 'get',
)); ?>

	<div class="row">
		<?php echo $form->label($model, 'cod_ruta'); ?>
		<?php echo $form->textField($model, 'cod_ruta'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model, 'ciudad_a'); ?>
		<?php echo $form->dropDownList($model, 'ciudad_a', GxHtml::listDataEx(Sede::model()->findAllAttributes(null, true)), array('prompt' => Yii::t('app', 'All'))); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model, 'nombre_a'); ?>
		<?php echo $form->textField($model, 'nombre_a', array('maxlength' => 50)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model, 'ciudad_b'); ?>
		<?php echo $form->dropDownList($model, 'ciudad_b', GxHtml::listDataEx(Sede::model()->findAllAttributes(null, true)), array('prompt' => Yii::t('app', 'All'))); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model, 'nombre_b'); ?>
		<?php echo $form->textField($model, 'nombre_b', array('maxlength' => 50)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model, 'distancia'); ?>
		<?php echo $form->textField($model, 'distancia'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model, 'id_empresa'); ?>
		<?php echo $form->textField($model, 'id_empresa'); ?>
	</div>

	<div class="row buttons">
		<?php echo GxHtml::submitButton(Yii::t('app', 'Search')); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- search-form -->
