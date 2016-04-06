<div class="wide form">

<?php $form = $this->beginWidget('GxActiveForm', array(
	'action' => Yii::app()->createUrl($this->route),
	'method' => 'get',
)); ?>

	<div class="row">
		<?php echo $form->label($model, 'placa'); ?>
		<?php echo $form->textField($model, 'placa', array('maxlength' => 10)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model, 'distancia_optima'); ?>
		<?php echo $form->textField($model, 'distancia_optima'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model, 'peso_max'); ?>
		<?php echo $form->textField($model, 'peso_max'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model, 'alto'); ?>
		<?php echo $form->textField($model, 'alto'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model, 'mantenimiento'); ?>
		<?php echo $form->dropDownList($model, 'mantenimiento', array('0' => Yii::t('app', 'No'), '1' => Yii::t('app', 'Yes')), array('prompt' => Yii::t('app', 'All'))); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model, 'fragil'); ?>
		<?php echo $form->dropDownList($model, 'fragil', array('0' => Yii::t('app', 'No'), '1' => Yii::t('app', 'Yes')), array('prompt' => Yii::t('app', 'All'))); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model, 'refrigerado'); ?>
		<?php echo $form->dropDownList($model, 'refrigerado', array('0' => Yii::t('app', 'No'), '1' => Yii::t('app', 'Yes')), array('prompt' => Yii::t('app', 'All'))); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model, 'vivo'); ?>
		<?php echo $form->dropDownList($model, 'vivo', array('0' => Yii::t('app', 'No'), '1' => Yii::t('app', 'Yes')), array('prompt' => Yii::t('app', 'All'))); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model, 'peligroso'); ?>
		<?php echo $form->dropDownList($model, 'peligroso', array('0' => Yii::t('app', 'No'), '1' => Yii::t('app', 'Yes')), array('prompt' => Yii::t('app', 'All'))); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model, 'id_chofer'); ?>
		<?php echo $form->dropDownList($model, 'id_chofer', GxHtml::listDataEx(Chofer::model()->findAllAttributes(null, true)), array('prompt' => Yii::t('app', 'All'))); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model, 'ancho'); ?>
		<?php echo $form->textField($model, 'ancho'); ?>
	</div>

	<div class="row buttons">
		<?php echo GxHtml::submitButton(Yii::t('app', 'Search')); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- search-form -->
