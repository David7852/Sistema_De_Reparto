<div class="wide form">

<?php $form = $this->beginWidget('GxActiveForm', array(
	'action' => Yii::app()->createUrl($this->route),
	'method' => 'get',
)); ?>

	<div class="row">
		<?php echo $form->label($model, 'cod_encargo'); ?>
		<?php echo $form->textField($model, 'cod_encargo'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model, 'cod_envio'); ?>
		<?php echo $form->dropDownList($model, 'cod_envio', GxHtml::listDataEx(Envio::model()->findAllAttributes(null, true)), array('prompt' => Yii::t('app', 'All'))); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model, 'id_chofer'); ?>
		<?php echo $form->dropDownList($model, 'id_chofer', GxHtml::listDataEx(Chofer::model()->findAllAttributes(null, true)), array('prompt' => Yii::t('app', 'All'))); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model, 'placa'); ?>
		<?php echo $form->dropDownList($model, 'placa', GxHtml::listDataEx(Camion::model()->findAllAttributes(null, true)), array('prompt' => Yii::t('app', 'All'))); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model, 'fecha_inicio'); ?>
		<?php echo $form->textField($model, 'fecha_inicio', array('maxlength' => 10)); ?>
	</div>

	<div class="row buttons">
		<?php echo GxHtml::submitButton(Yii::t('app', 'Search')); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- search-form -->
