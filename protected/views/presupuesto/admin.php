<?php

$this->breadcrumbs = array(
	//$model->label(2) => array('index'),
	Yii::t('app', 'Manage'),
);
if(!Util::isEmpresa(Yii::app()->user->name))
    $this->menu = array(
                    array('label'=>Yii::t('app', 'List') . ' ' . $model->label(2), 'url'=>array('index')),
            );
else
    $this->menu = array(
                    array('label'=>Yii::t('app', 'Create') . ' ' . $model->label(), 'url'=>array('create')),
            );



Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$.fn.yiiGridView.update('presupuesto-grid', {
		data: $(this).serialize()
	});
	return false;
});
");
?>




<?php 
if(Util::isAdmin(Yii::app()->user->name)||Util::isOperador(Yii::app()->user->name))
{
    ?>
    <h1><?php echo Yii::t('app', 'Gestion de ') . ' ' . GxHtml::encode($model->label(2)); ?></h1>
    <p>
    You may optionally enter a comparison operator (&lt;, &lt;=, &gt;, &gt;=, &lt;&gt; or =) at the beginning of each of your search values to specify how the comparison should be done.
    </p>
    <?php echo GxHtml::link(Yii::t('app', 'Advanced Search'), '#', array('class' => 'search-button')); ?>
    <div class="search-form">
    <?php $this->renderPartial('_search', array(
            'model' => $model,
    )); ?>
    </div><!-- search-form -->
    <?php
 }
 else
 {
     ?>
    <h1><?php echo Yii::t('app', 'Mis') . ' ' . GxHtml::encode($model->label(2)); ?></h1>
    <?php
 }
?>
<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id' => 'presupuesto-grid',
	'dataProvider' => $model->search(),
	'filter' => $model,
	'columns' => array(
		'cod_presupuesto',
		'fecha_tope',
		'fecha_solicitud',
		array(
				'name'=>'cod_ruta',
				'value'=>'GxHtml::valueEx($data->codRuta)',
				'filter'=>GxHtml::listDataEx(Ruta::model()->findAllAttributes(null, true)),
				),
		array(
				'name'=>'id_empresa',
				'value'=>'GxHtml::valueEx($data->idEmpresa)',
				'filter'=>GxHtml::listDataEx(Empresa::model()->findAllAttributes(null, true)),
				),
		'Apendice',
		/*
		'Numero_de_paquetes',
		*/
		array(
			'class' => 'CButtonColumn',
                    'template' => '{view}{update}',
		),
	),
)); ?>
<?php

?>