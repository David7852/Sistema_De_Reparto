<div class="wide form">

<?php $form = $this->beginWidget('GxActiveForm', array(
	'action' => Yii::app()->createUrl($this->route),
	'method' => 'get',
)); ?>

	<div class="row">
		<?php echo $form->label($model, 'numero'); ?>
		<?php echo $form->textField($model, 'numero'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model, 'NombreMiEmpresa'); ?>
		<?php echo $form->textField($model, 'NombreMiEmpresa', array('maxlength' => 100)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model, 'LogoMiEmpresa'); ?>
		<?php echo $form->textField($model, 'LogoMiEmpresa', array('maxlength' => 150)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model, 'EmailMilEmpresa'); ?>
		<?php echo $form->textField($model, 'EmailMilEmpresa', array('maxlength' => 100)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model, 'SloganMiEmpresa'); ?>
		<?php echo $form->textField($model, 'SloganMiEmpresa', array('maxlength' => 100)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model, 'ReportSpam'); ?>
		<?php echo $form->textField($model, 'ReportSpam'); ?>
	</div>

	<div class="row buttons">
		<?php echo GxHtml::submitButton(Yii::t('app', 'Search')); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- search-form -->
