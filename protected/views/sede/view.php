<?php

$this->breadcrumbs = array(
	$model->label(2) => array('index'),
	GxHtml::valueEx($model),
);

$this->menu=array(
	array('label'=>Yii::t('app', 'List') . ' ' . $model->label(2), 'url'=>array('index')),
	array('label'=>Yii::t('app', 'Create') . ' ' . $model->label(), 'url'=>array('create')),
	array('label'=>Yii::t('app', 'Update') . ' ' . $model->label(), 'url'=>array('update', 'id' => $model->cod_sede)),
	array('label'=>Yii::t('app', 'Delete') . ' ' . $model->label(), 'url'=>'#', 'linkOptions' => array('submit' => array('delete', 'id' => $model->cod_sede), 'confirm'=>'Are you sure you want to delete this item?')),
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
'cod_sede',
'ciudad',
'coordenada',
'id_empresa',
	),
)); ?>

<h2>Rutas asociadas</h2>
<?php
	echo GxHtml::openTag('ul');
	foreach($model->rutas as $relatedModel) {
		echo GxHtml::openTag('li');
		echo GxHtml::link(GxHtml::encode(GxHtml::valueEx($relatedModel)), array('ruta/view', 'id' => GxActiveRecord::extractPkValue($relatedModel, true)));
		echo GxHtml::closeTag('li');
	}
	echo GxHtml::closeTag('ul');
        
}else
{
    $this->widget('zii.widgets.CDetailView', array(
	'data' => $model,
	'attributes' => array(
'ciudad',
'coordenada',
	),
)); 
    
    ?>

    <h2>Rutas asociadas</h2>
<?php
	echo GxHtml::openTag('ul');
	foreach($model->rutas as $relatedModel) {
		echo GxHtml::openTag('li');
		echo GxHtml::link(GxHtml::encode(GxHtml::valueEx($relatedModel)), array('ruta/view', 'id' => GxActiveRecord::extractPkValue($relatedModel, true)));
		echo GxHtml::closeTag('li');
	}
	echo GxHtml::closeTag('ul');
}
        
        
?>