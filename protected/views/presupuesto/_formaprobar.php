<div class="form">


<?php $form = $this->beginWidget('GxActiveForm', array(
	'id' => 'presupuesto-form',
	'enableAjaxValidation' => false,
));
?>

	<p class="note">
		<?php echo Yii::t('app', 'Fields with'); ?> <span class="required">*</span> <?php echo Yii::t('app', 'are required'); ?>.
	</p>

	<?php echo $form->errorSummary($model); ?>

		<div class="row">
		<?php echo $form->labelEx($model,'Notas a la empresa:'); ?>
		<?php echo $form->textArea($model, 'Apendice', array('maxlength' => 500)); ?>
		<?php echo $form->error($model,'Apendice'); ?>
		</div><!-- row -->
<?php
echo GxHtml::submitButton(Yii::t('app', 'Save'));
$this->endWidget();
?>
</div><!-- form -->