<div class="form">


<?php $form = $this->beginWidget('GxActiveForm', array(
	'id' => 'chofer-form',
	'enableAjaxValidation' => false,
));
?>

	<p class="note">
		<?php echo Yii::t('app', 'Fields with'); ?> <span class="required">*</span> <?php echo Yii::t('app', 'are required'); ?>.
	</p>

	<?php echo $form->errorSummary($A); ?>

		<!--		<div class="row">
		<?php //echo $form->labelEx($A,'id_user'); ?>
		<?php //echo $form->dropDownList($A, 'id_user', GxHtml::listDataEx(Usuario::model()->findAllAttributes(null, true))); ?>
		<?php //echo $form->error($A,'id_user'); ?>
		</div> row -->

                <div class="row">
		<?php echo $form->labelEx($U,'nombre_usuario'); ?>
		<?php echo $form->textField($U, 'nombre_usuario', array('maxlength' => 25)); ?>
		<?php echo $form->error($U,'nombre_usuario'); ?>
		</div><!-- row -->
                <div class="row">
		<?php echo $form->labelEx($U,'clave'); ?>
		<?php echo $form->textField($U, 'clave', array('maxlength' => 25)); ?>
		<?php echo $form->error($U,'clave'); ?>
                </div><!-- row -->    
		<div class="row">
		<?php echo $form->labelEx($A,'numero_licencia'); ?>
		<?php echo $form->textField($A, 'numero_licencia'); ?>
		<?php echo $form->error($A,'numero_licencia'); ?>
		</div><!-- row -->

		<label><?php echo GxHtml::encode($A->getRelationLabel('camions')); ?></label>
		<?php echo $form->checkBoxList($A, 'camions', GxHtml::encodeEx(GxHtml::listDataEx(Camion::model()->findAllAttributes(null, true)), false, true)); ?>
		<label><?php echo GxHtml::encode($A->getRelationLabel('encargos')); ?></label>
		<?php echo $form->checkBoxList($A, 'encargos', GxHtml::encodeEx(GxHtml::listDataEx(Encargo::model()->findAllAttributes(null, true)), false, true)); ?>

<?php
echo GxHtml::submitButton(Yii::t('app', 'Save'));
$this->endWidget();
?>
</div><!-- form -->