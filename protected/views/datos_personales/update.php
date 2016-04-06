<?php

$this->breadcrumbs = array(
	//$model->label(2) => array('index'),
	GxHtml::valueEx($model) => array('view', 'id' => GxActiveRecord::extractPkValue($model, true)),
	Yii::t('app', 'Update'),
);

$this->menu = array(
	//array('label' => Yii::t('app', 'List') . ' ' . $model->label(2), 'url'=>array('index')),
	//array('label' => Yii::t('app', 'Create') . ' ' . $model->label(), 'url'=>array('create')),
	array('label' => Yii::t('app', 'View') . ' ' . $model->label(), 'url'=>array('view', 'id' => GxActiveRecord::extractPkValue($model, true))),
	//array('label' => Yii::t('app', 'Manage') . ' ' . $model->label(2), 'url'=>array('admin')),
);
?>

<h1><?php echo Yii::t('app', 'Update') . ' ' . GxHtml::encode($model->label()) . ' ' . GxHtml::encode(GxHtml::valueEx($model)); ?></h1>

<?php
if(Util::getTipoUsuario(Yii::app()->user->name)==="Empresa")
{
    $this->renderPartial('_formEmpresa', array(
		'model' => $model));
}
else
{
    $this->renderPartial('_form', array(
                    'model' => $model));
}


?>