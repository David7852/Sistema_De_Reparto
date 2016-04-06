<?php

$this->breadcrumbs = array(
	//$model->label(2) => array('index'),
	GxHtml::valueEx($model),
);

$this->menu=array(
	//array('label'=>Yii::t('app', 'List') . ' ' . $model->label(2), 'url'=>array('index')),
	//array('label'=>Yii::t('app', 'Create') . ' ' . $model->label(), 'url'=>array('create')),
	array('label'=>Yii::t('app', 'Update') . ' ' . $model->label(), 'url'=>array('update', 'id' => $model->id_user)),
	//array('label'=>Yii::t('app', 'Delete') . ' ' . $model->label(), 'url'=>'#', 'linkOptions' => array('submit' => array('delete', 'id' => $model->id_user), 'confirm'=>'Are you sure you want to delete this item?')),
	//array('label'=>Yii::t('app', 'Manage') . ' ' . $model->label(2), 'url'=>array('admin')),
);
?>

<h1><?php echo Yii::t('app', 'View') . ' ' . GxHtml::encode($model->label()) . ' ' . GxHtml::encode(GxHtml::valueEx($model)); ?></h1>

<?php 
if(Util::isEmpresa(Yii::app()->user->name))
{
    $this->widget('zii.widgets.CDetailView', array(
            'data' => $model,
            'attributes' => array(
    'nombre',
    'correo',
    'RIF',
    'numero_telefono',
    array(
                            'name' => 'idUser',
                            'type' => 'raw',
                            'value' => $model->idUser !== null ? GxHtml::link(GxHtml::encode(GxHtml::valueEx($model->idUser)), array('usuario/view', 'id' => GxActiveRecord::extractPkValue($model->idUser, true))) : null,
                            ),
            ),
    )); 
}else
    {
        $this->widget('zii.widgets.CDetailView', array(
                'data' => $model,
                'attributes' => array(
        'nombre',
        'apellido',
        'cedula',
        'correo',
        'RIF',
        'numero_telefono',
        array(
                                'name' => 'idUser',
                                'type' => 'raw',
                                'value' => $model->idUser !== null ? GxHtml::link(GxHtml::encode(GxHtml::valueEx($model->idUser)), array('usuario/view', 'id' => GxActiveRecord::extractPkValue($model->idUser, true))) : null,
                                ),
                ),
        )); 
    }   



?>

