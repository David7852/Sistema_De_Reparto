<?php
?>


<h1><?php echo Yii::t('app', 'Completar') . ' ' . GxHtml::encode($model->label()) . ' ' . GxHtml::encode(GxHtml::valueEx($model)); ?></h1>

<?php
$this->renderPartial('_formcompletar', array(
		'model' => $model));
?>