<?php

$this->breadcrumbs = array(
	$model->label(2) => array('index'),
	GxHtml::valueEx($model),
);

$this->menu=array(
	array('label'=>Yii::t('app', 'List') . ' ' . $model->label(2), 'url'=>array('index')),
	array('label'=>Yii::t('app', 'Create') . ' ' . $model->label(), 'url'=>array('create')),
	array('label'=>Yii::t('app', 'Update') . ' ' . $model->label(), 'url'=>array('update', 'id' => $model->cod_encargo)),
	array('label'=>Yii::t('app', 'Delete') . ' ' . $model->label(), 'url'=>'#', 'linkOptions' => array('submit' => array('delete', 'id' => $model->cod_encargo), 'confirm'=>'Are you sure you want to delete this item?')),
        array('label'=>Yii::t('app', 'Completar') . ' ' . $model->label(), 'url'=>array('completar', 'id' => $model->cod_encargo), 'linkOptions' => array( 'confirm'=>"Al pulsar aceptar, usted estara indicando que ha llegado a destino con exito.\r\nUsted sera rediriguido a una pagina que debera mostrar al receptor."),'visible'=>  Util::isChofer(Yii::app()->user->name)),
        
);
?>

<h1><?php echo Yii::t('app', 'View') . ' ' . GxHtml::encode($model->label()) . ' ' . GxHtml::encode(GxHtml::valueEx($model)); ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data' => $model,
	'attributes' => array(
'cod_encargo',
array(
			'name' => 'codEnvio',
			'type' => 'raw',
			'value' => $model->codEnvio !== null ? GxHtml::link(GxHtml::encode(GxHtml::valueEx($model->codEnvio)), array('envio/view', 'id' => GxActiveRecord::extractPkValue($model->codEnvio, true))) : null,
			),
array(
			'name' => 'idChofer',
			'type' => 'raw',
			'value' => $model->idChofer !== null ? GxHtml::link(GxHtml::encode(GxHtml::valueEx($model->idChofer)), array('chofer/view', 'id' => GxActiveRecord::extractPkValue($model->idChofer, true))) : null,
			),
array(
			'name' => 'placa0',
			'type' => 'raw',
			'value' => $model->placa0 !== null ? GxHtml::link(GxHtml::encode(GxHtml::valueEx($model->placa0)), array('camion/view', 'id' => GxActiveRecord::extractPkValue($model->placa0, true))) : null,
			),
'fecha_inicio',
	),
)); ?>

<h2><?php echo GxHtml::encode($model->getRelationLabel('paquetes')); ?></h2>
<?php
	echo GxHtml::openTag('ul');
	foreach($model->paquetes as $relatedModel) {
		echo GxHtml::openTag('li');
		echo GxHtml::link(GxHtml::encode(GxHtml::valueEx($relatedModel)), array('paquete/view', 'id' => GxActiveRecord::extractPkValue($relatedModel, true)));
		echo GxHtml::closeTag('li');
	}
	echo GxHtml::closeTag('ul');
?>