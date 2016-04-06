<div class="form">


<?php $form = $this->beginWidget('GxActiveForm', array(
	'id' => 'envio-form',
	'enableAjaxValidation' => false,
));
?>
<?php echo $form->errorSummary($model); ?>
<?php date_default_timezone_set('America/Caracas'); ?>
                <div class="row">
		<?php echo $form->labelEx($model,'A la fecha:'); ?>
		<?php echo $form->textField($model, 'fecha', array('value'=>date('d-m-Y H:i:s',time()))); ?>
		<?php echo $form->error($model,'fecha'); ?>
		</div><!-- row -->
    <p>Usted esta a punto de Rechazar este envio. Toda la informacion reunida hasta el momento sobre esta solicitud se perderan y el proceso no podra ser revertido</p>
<?php
echo GxHtml::submitButton(Yii::t('app', 'Aceptar'));
$this->endWidget();
?>
</div><!-- form -->