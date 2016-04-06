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
		<?php echo $form->labelEx($model,'fecha_tope'); ?>
		<?php echo $form->textField($model, 'fecha_tope', array('maxlength' => 10)); ?>
		<?php echo $form->error($model,'fecha_tope'); ?>
		</div><!-- row -->
		<div class="row">
		<?php echo $form->labelEx($model,'fecha_solicitud'); ?>
		<?php echo $form->textField($model, 'fecha_solicitud', array('maxlength' => 10)); ?>
		<?php echo $form->error($model,'fecha_solicitud'); ?>
		</div><!-- row -->
		<div class="row">
		<?php echo $form->labelEx($model,'cod_ruta'); ?>
		<?php echo $form->dropDownList($model, 'cod_ruta', GxHtml::listDataEx(Ruta::model()->findAllAttributes(null, true))); ?>
		<?php echo $form->error($model,'cod_ruta'); ?>
		</div><!-- row -->
		<div class="row">
		<?php echo $form->labelEx($model,'id_empresa'); ?>
		<?php echo $form->dropDownList($model, 'id_empresa', GxHtml::listDataEx(Empresa::model()->findAllAttributes(null, true))); ?>
		<?php echo $form->error($model,'id_empresa'); ?>
		</div><!-- row -->
		<div class="row">
		<?php echo $form->labelEx($model,'Apendice'); ?>
		<?php echo $form->textField($model, 'Apendice', array('maxlength' => 500)); ?>
		<?php echo $form->error($model,'Apendice'); ?>
		</div><!-- row -->
		<div class="row">
		<?php echo $form->labelEx($model,'Numero_de_paquetes'); ?>
		<?php echo $form->textField($model, 'Numero_de_paquetes'); ?>
		<?php echo $form->error($model,'Numero_de_paquetes'); ?>
		</div><!-- row -->

		<label><?php echo GxHtml::encode($model->getRelationLabel('envios')); ?></label>
		<?php echo $form->checkBoxList($model, 'envios', GxHtml::encodeEx(GxHtml::listDataEx(Envio::model()->findAllAttributes(null, true)), false, true)); ?>

<?php
echo GxHtml::submitButton(Yii::t('app', 'Save'));
$this->endWidget();
?>
</div><!-- form -->