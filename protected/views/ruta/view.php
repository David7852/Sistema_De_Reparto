<?php

$this->breadcrumbs = array(
	$model->label(2) => array('index'),
	GxHtml::valueEx($model),
);

$this->menu=array(
	array('label'=>Yii::t('app', 'List') . ' ' . $model->label(2), 'url'=>array('index')),
	array('label'=>Yii::t('app', 'Create') . ' ' . $model->label(), 'url'=>array('create')),
	array('label'=>Yii::t('app', 'Update') . ' ' . $model->label(), 'url'=>array('update', 'id' => $model->cod_ruta)),
	array('label'=>Yii::t('app', 'Delete') . ' ' . $model->label(), 'url'=>'#', 'linkOptions' => array('submit' => array('delete', 'id' => $model->cod_ruta), 'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>Yii::t('app', 'Manage') . ' ' . $model->label(2), 'url'=>array('admin')),
);
?>

<h1><?php echo Yii::t('app', 'View') . ' ' . GxHtml::encode($model->label()) . ' ' . GxHtml::encode(GxHtml::valueEx($model)); ?></h1>

<?php 

if(!Util::isEmpresa(Yii::app()->user->name))
{
$this->widget('zii.widgets.CDetailView', array(
	'data' => $model,
	'attributes' => array(
'cod_ruta',
array(
			'name' => 'Sede A',
			'type' => 'raw',
			'value' => $model->ciudadA !== null ? GxHtml::link(GxHtml::encode(GxHtml::valueEx($model->ciudadA)), array('sede/view', 'id' => GxActiveRecord::extractPkValue($model->ciudadA, true))) : null,
			),
//'nombre_a',
array(
			'name' => 'Sede B',
			'type' => 'raw',
			'value' => $model->ciudadB !== null ? GxHtml::link(GxHtml::encode(GxHtml::valueEx($model->ciudadB)), array('sede/view', 'id' => GxActiveRecord::extractPkValue($model->ciudadB, true))) : null,
			),
//'nombre_b',
'distancia',
            array(
			'name' => 'Privada para la empresa',
			'type' => 'raw',
			'value' => $model->id_empresa !== null ? GxHtml::link(GxHtml::encode(Util::getName($model->id_empresa)), array('datos_personales/view', 'id' => $model->id_empresa, true)) : null,
			),
             
	),
)); 
}else
{
    $this->widget('zii.widgets.CDetailView', array(
	'data' => $model,
	'attributes' => array(
'cod_ruta',
array(
			'name' => 'Sede A',
			'type' => 'raw',
			'value' => $model->ciudadA !== null ? GxHtml::link(GxHtml::encode(GxHtml::valueEx($model->ciudadA)), array('sede/view', 'id' => GxActiveRecord::extractPkValue($model->ciudadA, true))) : null,
			),
//'nombre_a',
array(
			'name' => 'Sede B',
			'type' => 'raw',
			'value' => $model->ciudadB !== null ? GxHtml::link(GxHtml::encode(GxHtml::valueEx($model->ciudadB)), array('sede/view', 'id' => GxActiveRecord::extractPkValue($model->ciudadB, true))) : null,
			),
//'nombre_b',
'distancia',             
	),
)); 
}

?>

<h2><?php echo GxHtml::encode($model->getRelationLabel('presupuestos')); ?></h2>
<?php
	echo GxHtml::openTag('ul');
	foreach($model->presupuestos as $relatedModel) {
		echo GxHtml::openTag('li');
		echo GxHtml::link(GxHtml::encode(GxHtml::valueEx($relatedModel)), array('presupuesto/view', 'id' => GxActiveRecord::extractPkValue($relatedModel, true)));
		echo GxHtml::closeTag('li');
	}
	echo GxHtml::closeTag('ul');
?>