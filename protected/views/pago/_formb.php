<div class="form">


<?php $form = $this->beginWidget('GxActiveForm', array(
	'id' => 'pago-form',
	'enableAjaxValidation' => false,
));
?>

	<p class="note">
		<?php echo Yii::t('app', 'Fields with'); ?> <span class="required">*</span> <?php echo Yii::t('app', 'are required'); ?>.
	</p>

	<?php echo $form->errorSummary($model); ?>

		<div class="row">
		<?php echo $form->labelEx($model,'monto'); ?>
		<?php echo $form->textField($model, 'monto'); ?>
		<?php echo $form->error($model,'monto'); ?>
		</div><!-- row -->
		<div class="row">
		<?php echo $form->labelEx($model,'cod_boucher'); ?>
		<?php echo $form->textField($model, 'cod_boucher', array('maxlength' => 20)); ?>
		<?php echo $form->error($model,'cod_boucher'); ?>
		</div><!-- row -->
		<div class="row">
		<?php echo $form->labelEx($model,'cod_envio'); ?>
		<?php echo $form->dropDownList($model, 'cod_envio', GxHtml::listDataEx(Envio::model()->findAllAttributes(null, true,"`id_empresa`=".Util::getid(Yii::app()->user->name))),array('empty'=>''));//solo ver los envios de mi empresa ?>
		<?php echo $form->error($model,'cod_envio'); ?>
		</div><!-- row -->


<?php
echo GxHtml::submitButton(Yii::t('app', 'Save'));
$this->endWidget();
?>
</div><!-- form -->