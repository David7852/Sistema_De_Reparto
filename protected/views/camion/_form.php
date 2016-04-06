<div class="form">


<?php $form = $this->beginWidget('GxActiveForm', array(
	'id' => 'camion-form',
	'enableAjaxValidation' => false,
));
?>

	<p class="note">
		<?php echo Yii::t('app', 'Fields with'); ?> <span class="required">*</span> <?php echo Yii::t('app', 'are required'); ?>.
	</p>

	<?php echo $form->errorSummary($model); ?>

		<div class="row">
		<?php echo $form->labelEx($model,'placa'); ?>
		<?php echo $form->textField($model, 'placa', array('maxlength' => 10)); ?>
		<?php echo $form->error($model,'placa'); ?>
		</div><!-- row -->
		<div class="row">
		<?php echo $form->labelEx($model,'distancia_optima'); ?>
		<?php echo $form->textField($model, 'distancia_optima'); ?>
		<?php echo $form->error($model,'distancia_optima'); ?>
		</div><!-- row -->
		<div class="row">
		<?php echo $form->labelEx($model,'peso_max'); ?>
		<?php echo $form->textField($model, 'peso_max'); ?>
		<?php echo $form->error($model,'peso_max'); ?>
		</div><!-- row -->
		<div class="row">
		<?php echo $form->labelEx($model,'alto'); ?>
		<?php echo $form->textField($model, 'alto'); ?>
		<?php echo $form->error($model,'alto'); ?>
		</div><!-- row -->
		<div class="row">
		<?php echo $form->labelEx($model,'mantenimiento'); ?>
		<?php echo $form->checkBox($model, 'mantenimiento'); ?>
		<?php echo $form->error($model,'mantenimiento'); ?>
		</div><!-- row -->
		<div class="row">
		<?php echo $form->labelEx($model,'fragil'); ?>
		<?php echo $form->checkBox($model, 'fragil'); ?>
		<?php echo $form->error($model,'fragil'); ?>
		</div><!-- row -->
		<div class="row">
		<?php echo $form->labelEx($model,'refrigerado'); ?>
		<?php echo $form->checkBox($model, 'refrigerado'); ?>
		<?php echo $form->error($model,'refrigerado'); ?>
		</div><!-- row -->
		<div class="row">
		<?php echo $form->labelEx($model,'vivo'); ?>
		<?php echo $form->checkBox($model, 'vivo'); ?>
		<?php echo $form->error($model,'vivo'); ?>
		</div><!-- row -->
		<div class="row">
		<?php echo $form->labelEx($model,'peligroso'); ?>
		<?php echo $form->checkBox($model, 'peligroso'); ?>
		<?php echo $form->error($model,'peligroso'); ?>
		</div><!-- row -->
		<div class="row">
		<?php echo $form->labelEx($model,'id_chofer'); ?>
		<?php echo $form->dropDownList($model, 'id_chofer', GxHtml::listDataEx(Chofer::model()->findAllAttributes(null, true))); ?>
		<?php echo $form->error($model,'id_chofer'); ?>
		</div><!-- row -->
		<div class="row">
		<?php echo $form->labelEx($model,'ancho'); ?>
		<?php echo $form->textField($model, 'ancho'); ?>
		<?php echo $form->error($model,'ancho'); ?>
		</div><!-- row -->

		<label><?php echo GxHtml::encode($model->getRelationLabel('encargos')); ?></label>
		<?php echo $form->checkBoxList($model, 'encargos', GxHtml::encodeEx(GxHtml::listDataEx(Encargo::model()->findAllAttributes(null, true)), false, true)); ?>
		<label><?php echo GxHtml::encode($model->getRelationLabel('paquetes')); ?></label>
		<?php echo $form->checkBoxList($model, 'paquetes', GxHtml::encodeEx(GxHtml::listDataEx(Paquete::model()->findAllAttributes(null, true)), false, true)); ?>

<?php
echo GxHtml::submitButton(Yii::t('app', 'Save'));
$this->endWidget();
?>
</div><!-- form -->