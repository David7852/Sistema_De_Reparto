<div class="form">


<?php $form = $this->beginWidget('GxActiveForm', array(
	'id' => 'configuracion-form',
	'enableAjaxValidation' => false,
));
?>

	<p class="note">
		<?php echo Yii::t('app', 'Fields with'); ?> <span class="required">*</span> <?php echo Yii::t('app', 'are required'); ?>.
	</p>

	<?php echo $form->errorSummary($model); ?>

		<div class="row">
		<?php echo $form->labelEx($model,'NombreMiEmpresa'); ?>
		<?php echo $form->textField($model, 'NombreMiEmpresa', array('maxlength' => 100)); ?>
		<?php echo $form->error($model,'NombreMiEmpresa'); ?>
		</div><!-- row -->
		<div class="row">
		<?php echo $form->labelEx($model,'LogoMiEmpresa'); ?>
		<?php echo $form->textField($model, 'LogoMiEmpresa', array('maxlength' => 150)); ?>
		<?php echo $form->error($model,'LogoMiEmpresa'); ?>
		</div><!-- row -->
		<div class="row">
		<?php echo $form->labelEx($model,'EmailMilEmpresa'); ?>
		<?php echo $form->textField($model, 'EmailMilEmpresa', array('maxlength' => 100)); ?>
		<?php echo $form->error($model,'EmailMilEmpresa'); ?>
		</div><!-- row -->
		<div class="row">
		<?php echo $form->labelEx($model,'SloganMiEmpresa'); ?>
		<?php echo $form->textField($model, 'SloganMiEmpresa', array('maxlength' => 100)); ?>
		<?php echo $form->error($model,'SloganMiEmpresa'); ?>
		</div><!-- row -->
		<div class="row">
		<?php echo $form->labelEx($model,'ReportSpam'); ?>
		<?php echo $form->textField($model, 'ReportSpam'); ?>
		<?php echo $form->error($model,'ReportSpam'); ?>
		</div><!-- row -->


<?php
echo GxHtml::submitButton(Yii::t('app', 'Save'));
$this->endWidget();
?>
</div><!-- form -->