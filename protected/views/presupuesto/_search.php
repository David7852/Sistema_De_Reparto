<div class="wide form">

<?php $form = $this->beginWidget('GxActiveForm', array(
	'action' => Yii::app()->createUrl($this->route),
	'method' => 'get',
)); ?>

	<div class="row">
		<?php echo $form->label($model, 'cod_presupuesto'); ?>
		<?php echo $form->textField($model, 'cod_presupuesto'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model, 'fecha_tope'); ?>
		<?php echo $form->textField($model, 'fecha_tope', array('maxlength' => 10)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model, 'fecha_solicitud'); ?>
		<?php echo $form->textField($model, 'fecha_solicitud', array('maxlength' => 10)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model, 'cod_ruta'); ?>
		<?php echo $form->dropDownList($model, 'cod_ruta', GxHtml::listDataEx(Ruta::model()->findAllAttributes(null, true)), array('prompt' => Yii::t('app', 'All'))); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model, 'id_empresa'); ?>
		<?php echo $form->dropDownList($model, 'id_empresa', GxHtml::listDataEx(Empresa::model()->findAllAttributes(null, true)), array('prompt' => Yii::t('app', 'All'))); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model, 'Apendice'); ?>
		<?php echo $form->textField($model, 'Apendice', array('maxlength' => 500)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model, 'Numero_de_paquetes'); ?>
		<?php echo $form->textField($model, 'Numero_de_paquetes'); ?>
	</div>

	<div class="row buttons">
		<?php echo GxHtml::submitButton(Yii::t('app', 'Search')); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- search-form -->
