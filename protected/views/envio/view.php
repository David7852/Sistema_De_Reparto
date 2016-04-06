<?php

$this->breadcrumbs = array(
	$model->label(2) => array('index'),
	GxHtml::valueEx($model),
);
if(Util::getTipoUsuario(Yii::app()->user->name)=="Empresa")
{
$this->menu=array(
	array('label'=>Yii::t('app', 'List') . ' ' . $model->label(2), 'url'=>array('index')),
	array('label'=>Yii::t('app', 'Create') . ' ' . $model->label(), 'url'=>array('create')),
    
        array('label'=>Yii::t('app', 'Aprobar') . ' ' . $model->label(), 'url'=>array('aprobar', 'id' => $model->cod_envio)),
        array('label'=>Yii::t('app', 'Negar') . ' ' . $model->label(), 'url'=>array('negar', 'id' => $model->cod_envio),'visible'=>($model->estado === "Pendiente")),
        array('label'=>Yii::t('app', 'Cancelar') . ' ' . $model->label(), 'url'=>array('cancelar', 'id' => $model->cod_envio),'visible'=>($model->estado !== "Pendiente")),
        array('label'=>Yii::t('app', 'Pagar') . ' ' . $model->label(), 'url'=>array('pago/createa', 'id' => $model->cod_envio),'visible'=>($model->estado !== "Negado")&&($model->estado !== "Pendiente")),
    
	array('label'=>Yii::t('app', 'Update') . ' ' . $model->label(), 'url'=>array('update', 'id' => $model->cod_envio)),
	array('label'=>Yii::t('app', 'Delete') . ' ' . $model->label(), 'url'=>'#', 'linkOptions' => array('submit' => array('delete', 'id' => $model->cod_envio), 'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>Yii::t('app', 'Manage') . ' ' . $model->label(2), 'url'=>array('admin')),
);

}
else
{
    $this->menu=array(
	array('label'=>Yii::t('app', 'List') . ' ' . $model->label(2), 'url'=>array('index')),
	array('label'=>Yii::t('app', 'Create') . ' ' . $model->label(), 'url'=>array('create')),
    
        array('label'=>Yii::t('app', 'Encargar') . ' ' . $model->label(), 'url'=>array('encargar', 'id' => $model->cod_envio), 'linkOptions' => array( 'confirm'=>"Al pulsar aceptar, usted estara creando un encargo preasigando a este envio.\r\nTenga en mente que esta accion no podra desahacerse automaticamente y que dicho encargo debera ser borrado manualmente."),'visible'=>($model->estado !== "Negado")),
        array('label'=>Yii::t('app', 'Cancelar') . ' ' . $model->label(), 'url'=>array('cancelar', 'id' => $model->cod_envio),'visible'=>($model->estado !== "Negado")&&($model->estado !== "Fallido")&&($model->estado !== "Cancelado")&&($model->estado !== "Completo")),
        
	array('label'=>Yii::t('app', 'Update') . ' ' . $model->label(), 'url'=>array('update', 'id' => $model->cod_envio)),
	array('label'=>Yii::t('app', 'Delete') . ' ' . $model->label(), 'url'=>'#', 'linkOptions' => array('submit' => array('delete', 'id' => $model->cod_envio), 'confirm'=>'Are you sure you want to delete this item?'),'visible'=>($model->estado === "Negado")),
	array('label'=>Yii::t('app', 'Manage') . ' ' . $model->label(2), 'url'=>array('admin')),
);
}

?>

<h1><?php echo Yii::t('app', 'View') . ' ' . GxHtml::encode($model->label()) . ' ' . GxHtml::encode(GxHtml::valueEx($model)); ?></h1>

<?php 
if(!Util::isEmpresa(Yii::app()->user->name))
{
$this->widget('zii.widgets.CDetailView', array(
	'data' => $model,
	'attributes' => array(
'cod_envio',
'estado',
array(
			'name' => 'De la empresa',
			'type' => 'raw',
			'value' => $model->id_empresa !== null ? GxHtml::link(GxHtml::encode(Util::getName($model->id_empresa)), array('datos_personales/view', 'id' => $model->id_empresa, true)) : null,
			),
array(
			'name' => 'Responsable',
			'type' => 'raw',
			'value' => $model->id_operador !== null ? GxHtml::link(GxHtml::encode(Util::getName($model->id_operador)), array('datos_personales/view', 'id' => $model->id_operador, true)) : null,
			),
array(
			'name' => 'codPresupuesto',
			'type' => 'raw',
			'value' => $model->codPresupuesto !== null ? GxHtml::link(GxHtml::encode(GxHtml::valueEx($model->codPresupuesto)), array('presupuesto/view', 'id' => GxActiveRecord::extractPkValue($model->codPresupuesto, true))) : null,
			),
	),
)); 
}else
    
{
    $this->widget('zii.widgets.CDetailView', array(
	'data' => $model,
	'attributes' => array(
'cod_envio',
'estado',
array(
			'name' => 'De la empresa',
			'type' => 'raw',
			'value' => $model->id_empresa !== null ? GxHtml::link(GxHtml::encode(Util::getName($model->id_empresa)), array('datos_personales/view', 'id' => $model->id_empresa, true)) : null,
			),
array(
			'name' => 'codPresupuesto',
			'type' => 'raw',
			'value' => $model->codPresupuesto !== null ? GxHtml::link(GxHtml::encode(GxHtml::valueEx($model->codPresupuesto)), array('presupuesto/view', 'id' => GxActiveRecord::extractPkValue($model->codPresupuesto, true))) : null,
			),
	),
)); 
}
    



?>



<h2><?php echo GxHtml::encode($model->getRelationLabel('encargos')); ?></h2>
<?php
	echo GxHtml::openTag('ul');
	foreach($model->encargos as $relatedModel) {
		echo GxHtml::openTag('li');
		echo GxHtml::link(GxHtml::encode(GxHtml::valueEx($relatedModel)), array('encargo/view', 'id' => GxActiveRecord::extractPkValue($relatedModel, true)));
		echo GxHtml::closeTag('li');
	}
	echo GxHtml::closeTag('ul');
?><h2><?php echo GxHtml::encode($model->getRelationLabel('pagos')); ?></h2>
<?php
	echo GxHtml::openTag('ul');
	foreach($model->pagos as $relatedModel) {
		echo GxHtml::openTag('li');
		echo GxHtml::link(GxHtml::encode(GxHtml::valueEx($relatedModel)), array('pago/view', 'id' => GxActiveRecord::extractPkValue($relatedModel, true)));
		echo GxHtml::closeTag('li');
	}
	echo GxHtml::closeTag('ul');
?>