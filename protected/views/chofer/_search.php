<div class="wide form">

<?php $form = $this->beginWidget('GxActiveForm', array(
	'action' => Yii::app()->createUrl($this->route),
	'method' => 'get',
)); ?>

	<div class="row">
		<?php echo $form->label($model, 'id_user'); ?>
		<?php echo $form->dropDownList($model, 'id_user', GxHtml::listDataEx(Usuario::model()->findAllAttributes(null, true)), array('prompt' => Yii::t('app', 'All'))); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model, 'numero_licencia'); ?>
		<?php echo $form->textField($model, 'numero_licencia'); ?>
	</div>
    
	<div class="row">
		<?php echo $form->label($model, 'fecha_fin_licencia'); ?>
		<?php echo $form->textField($model, 'fecha_fin_licencia', array('maxlength' => 50)); ?>
        </div>
	<div class="row buttons">
		<?php echo GxHtml::submitButton(Yii::t('app', 'Search')); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- search-form -->
