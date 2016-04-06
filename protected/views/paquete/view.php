<?php

$this->breadcrumbs = array(
	$model->label(2) => array('index'),
	GxHtml::valueEx($model),
);

$this->menu=array(
	array('label'=>Yii::t('app', 'List') . ' ' . $model->label(2), 'url'=>array('index')),
	array('label'=>Yii::t('app', 'Create') . ' ' . $model->label(), 'url'=>array('create')),
	array('label'=>Yii::t('app', 'Update') . ' ' . $model->label(), 'url'=>array('update', 'id' => $model->cod_paquete)),
	array('label'=>Yii::t('app', 'Delete') . ' ' . $model->label(), 'url'=>'#', 'linkOptions' => array('submit' => array('delete', 'id' => $model->cod_paquete), 'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>Yii::t('app', 'Manage') . ' ' . $model->label(2), 'url'=>array('admin')),
);
?>

<h1><?php echo Yii::t('app', 'View') . ' ' . GxHtml::encode($model->label()) . ' ' . GxHtml::encode(GxHtml::valueEx($model)); ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data' => $model,
	'attributes' => array(
'cod_paquete',
'peso',
array(
			'name' => 'codProducto',
			'type' => 'raw',
			'value' => $model->codProducto !== null ? GxHtml::link(GxHtml::encode(GxHtml::valueEx($model->codProducto)), array('producto/view', 'id' => GxActiveRecord::extractPkValue($model->codProducto, true))) : null,
			),
array(
			'name' => 'codPresupuesto',
			'type' => 'raw',
			'value' => $model->codPresupuesto !== null ? GxHtml::link(GxHtml::encode(GxHtml::valueEx($model->codPresupuesto)), array('presupuesto/view', 'id' => GxActiveRecord::extractPkValue($model->codPresupuesto, true))) : null,
			),
'alto',
'ancho',
'descripcion',
array(
			'name' => 'codEncargo',
			'type' => 'raw',
			'value' => $model->codEncargo !== null ? GxHtml::link(GxHtml::encode(GxHtml::valueEx($model->codEncargo)), array('encargo/view', 'id' => GxActiveRecord::extractPkValue($model->codEncargo, true))) : null,
			),
	),
)); ?>

