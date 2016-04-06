<div class="form">


<?php $form = $this->beginWidget('GxActiveForm', array(
	'id' => 'sede-form',
	'enableAjaxValidation' => false,
));
?>

	<p class="note">
		<?php echo Yii::t('app', 'Fields with'); ?> <span class="required">*</span> <?php echo Yii::t('app', 'are required'); ?>.
	</p>

	<?php echo $form->errorSummary($model); ?>

		<div class="row">
		<?php echo $form->labelEx($model,'ciudad'); ?>
		<?php echo $form->textField($model, 'ciudad', array('maxlength' => 50)); ?>
		<?php echo $form->error($model,'ciudad'); ?>
		</div><!-- row -->
		<div class="row">
		<?php echo $form->labelEx($model,'coordenada'); ?>
		<?php echo $form->textField($model, 'coordenada', array('maxlength' => 25)); ?>
		<?php echo $form->error($model,'coordenada'); ?>
		</div><!-- row -->
                <?php
                if(!Util::isEmpresa(Yii::app()->user->name))
                {
                    ?>
		<div class="row">
		<?php echo $form->labelEx($model,'id_empresa'); ?>
		<?php echo $form->textField($model, 'id_empresa'); ?>
		<?php echo $form->error($model,'id_empresa'); ?>
		</div><!-- row -->

		<label><?php echo GxHtml::encode($model->getRelationLabel('rutas')); ?></label>
		<?php echo $form->checkBoxList($model, 'rutas', GxHtml::encodeEx(GxHtml::listDataEx(Ruta::model()->findAllAttributes(null, true)), false, true)); ?>
		<label><?php echo GxHtml::encode($model->getRelationLabel('rutas1')); ?></label>
		<?php echo $form->checkBoxList($model, 'rutas1', GxHtml::encodeEx(GxHtml::listDataEx(Ruta::model()->findAllAttributes(null, true)), false, true)); ?>
<?php
                }
                ?>
                
<?php
echo GxHtml::submitButton(Yii::t('app', 'Save'));
$this->endWidget();
?>
</div><!-- form -->