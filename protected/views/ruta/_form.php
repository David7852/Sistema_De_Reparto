<div class="form">


<?php $form = $this->beginWidget('GxActiveForm', array(
	'id' => 'ruta-form',
	'enableAjaxValidation' => false,
));
?>

	<p class="note">
		<?php echo Yii::t('app', 'Fields with'); ?> <span class="required">*</span> <?php echo Yii::t('app', 'are required'); ?>.
	</p>

	<?php echo $form->errorSummary($model); ?>

		<div class="row">
		<?php echo $form->labelEx($model,'ciudad_a'); ?>
		<?php echo $form->dropDownList($model, 'ciudad_a',GxHtml::listDataEx(Sede::model()->findAllAttributes(null, true,"`id_empresa` is null or `id_empresa`=".Util::getid(Yii::app()->user->name)))); ?>
		<?php echo $form->error($model,'ciudad_a'); ?>
		</div><!-- row -->
		<div class="row">
		<?php echo $form->labelEx($model,'ciudad_b'); ?>
		<?php echo $form->dropDownList($model, 'ciudad_b', GxHtml::listDataEx(Sede::model()->findAllAttributes(null, true,"`id_empresa` is null or `id_empresa`=".Util::getid(Yii::app()->user->name)))); ?>
		<?php echo $form->error($model,'ciudad_b'); ?>
		</div><!-- row -->
		<div class="row">
		<?php echo $form->labelEx($model,'distancia'); ?>
		<?php echo $form->textField($model, 'distancia'); ?>
		<?php echo $form->error($model,'distancia'); ?>
		</div><!-- row -->
		<!--<label>-->
                    <?php // echo GxHtml::encode($model->getRelationLabel('presupuestos')); ?>
<!--                </label>-->
		<?php // echo $form->checkBoxList($model, 'presupuestos', GxHtml::encodeEx(GxHtml::listDataEx(Presupuesto::model()->findAllAttributes(null, true)), false, true)); ?>

<?php
echo GxHtml::submitButton(Yii::t('app', 'Save'));
$this->endWidget();
?>
</div><!-- form -->