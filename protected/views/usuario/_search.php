<div class="wide form">

<?php $form = $this->beginWidget('GxActiveForm', array(
	'action' => Yii::app()->createUrl($this->route),
	'method' => 'get',
)); ?>

	<div class="row">
		<?php echo $form->label($model, 'id_user'); ?>
		<?php echo $form->textField($model, 'id_user'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model, 'clave'); ?>
		<?php echo $form->textField($model, 'clave', array('maxlength' => 25)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model, 'nombre_usuario'); ?>
		<?php echo $form->textField($model, 'nombre_usuario', array('maxlength' => 25)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model, 'fecha_de_registro'); ?>
		<?php echo $form->textField($model, 'fecha_de_registro', array('maxlength' => 25)); ?>
	</div>

	<div class="row buttons">
		<?php echo GxHtml::submitButton(Yii::t('app', 'Search')); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- search-form -->
