<?php

$this->breadcrumbs = array(
	$model->label(2) => array('index'),
	GxHtml::valueEx($model),
);

$this->menu=array(
	array('label'=>Yii::t('app', 'List') . ' ' . $model->label(2), 'url'=>array('index')),
	array('label'=>Yii::t('app', 'Create') . ' ' . $model->label(), 'url'=>array('create')),
    
        array('label'=>Yii::t('app', 'Aprobar') . ' ' . $model->label(), 'url'=>array('aprobar', 'id' => $model->cod_presupuesto),'visible'=>!Util::isEmpresa(Yii::app()->user->name)),
        array('label'=>Yii::t('app', 'Negar') . ' ' . $model->label(), 'url'=>array('negar', 'id' => $model->cod_presupuesto),'visible'=>!Util::isEmpresa(Yii::app()->user->name)),
    
	array('label'=>Yii::t('app', 'Update') . ' ' . $model->label(), 'url'=>array('update', 'id' => $model->cod_presupuesto)),
	//array('label'=>Yii::t('app', 'Delete') . ' ' . $model->label(), 'url'=>'#', 'linkOptions' => array('submit' => array('delete', 'id' => $model->cod_presupuesto), 'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>Yii::t('app', 'Manage') . ' ' . $model->label(2), 'url'=>array('admin')),
);
?>

<h1><?php echo Yii::t('app', 'View') . ' ' . GxHtml::encode($model->label()) . ' ' . GxHtml::encode(GxHtml::valueEx($model)); ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data' => $model,
	'attributes' => array(
'cod_presupuesto',
'fecha_tope',
'fecha_solicitud',
array(
			'name' => 'codRuta',
			'type' => 'raw',
			'value' => $model->codRuta !== null ? GxHtml::link(GxHtml::encode(GxHtml::valueEx($model->codRuta)), array('ruta/view', 'id' => GxActiveRecord::extractPkValue($model->codRuta, true))) : null,
			),

            array(
			'name' => 'Solicitado por la empresa',
			'type' => 'raw',
			'value' => $model->id_empresa !== null ? GxHtml::link(GxHtml::encode(Util::getName($model->id_empresa)), array('datos_personales/view', 'id' => $model->id_empresa, true)) : null,
			),
'Apendice',
'Numero_de_paquetes',
	),
)); ?>

<h2><?php echo GxHtml::encode($model->getRelationLabel('envios')); ?></h2>
<?php
	echo GxHtml::openTag('ul');
	foreach($model->envios as $relatedModel) {
		echo GxHtml::openTag('li');
		echo GxHtml::link(GxHtml::encode(GxHtml::valueEx($relatedModel)), array('envio/view', 'id' => GxActiveRecord::extractPkValue($relatedModel, true)));
		echo GxHtml::closeTag('li');
	}
	echo GxHtml::closeTag('ul');
?><h2><?php echo GxHtml::encode($model->getRelationLabel('paquetes')); ?></h2>
<?php
	echo GxHtml::openTag('ul');
	foreach($model->paquetes as $relatedModel) {
		echo GxHtml::openTag('li');
		echo GxHtml::link(GxHtml::encode(GxHtml::valueEx($relatedModel)), array('paquete/view', 'id' => GxActiveRecord::extractPkValue($relatedModel, true)));
		echo GxHtml::closeTag('li');
	}
	echo GxHtml::closeTag('ul');
?>