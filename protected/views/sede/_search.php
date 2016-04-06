<div class="wide form">

<?php $form = $this->beginWidget('GxActiveForm', array(
	'action' => Yii::app()->createUrl($this->route),
	'method' => 'get',
)); ?>

	<div class="row">
		<?php echo $form->label($model, 'cod_sede'); ?>
		<?php echo $form->textField($model, 'cod_sede'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model, 'ciudad'); ?>
		<?php echo $form->textField($model, 'ciudad', array('maxlength' => 50)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model, 'coordenada'); ?>
		<?php echo $form->textField($model, 'coordenada', array('maxlength' => 25)); ?>
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
