<?php

$this->breadcrumbs = array(
	$model->label(2) => array('index'),
	Yii::t('app', 'Manage'),
);

$this->menu = array(
		array('label'=>Yii::t('app', 'List') . ' ' . $model->label(2), 'url'=>array('index'),'visible'=>  !Util::isEmpresa(Yii::app()->user->name)),
		array('label'=>Yii::t('app', 'Create') . ' ' . $model->label(), 'url'=>array('create'),'visible'=>  Util::isEmpresa(Yii::app()->user->name)),
	);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$.fn.yiiGridView.update('pago-grid', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<h1><?php echo Yii::t('app', 'Manage') . ' ' . GxHtml::encode($model->label(2)); ?></h1>

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




$this->widget('zii.widgets.grid.CGridView', array(
	'id' => 'pago-grid',
	'dataProvider' => $model->search(),
	'filter' => $model,
	'columns' => array(
		'cod_pago',
		'id_empresa',
		'fecha_realizacion',
		'monto',
		'cod_boucher',
		'factura',
		
		array(
				'name'=>'cod_envio',
				'value'=>'GxHtml::valueEx($data->codEnvio)',
				'filter'=>GxHtml::listDataEx(Envio::model()->findAllAttributes(null, true)),
				),
		
		array(
			'class' => 'CButtonColumn',
		),
	),
)); 







if(Util::isEmpresa(Yii::app()->user->name))
{
    
    ob_clean();
$this->widget('ext.pdfGrid.EPDFGrid', array(
    'id'        => 'informe-pdf',
    'fileName'  => 'Informe en PDF',//Nombre del archivo generado sin la extension pdf (.pdf)
    'dataProvider'  => $model->search(), //puede ser $model->search()
    'columns' => array(
		
		'cod_pago',
		'id_empresa',
		'fecha_realizacion',
		'monto',
		'cod_boucher',
		'factura',
		
		array(
				'name'=>'cod_envio',
				'value'=>'GxHtml::valueEx($data->codEnvio)',
				'filter'=>GxHtml::listDataEx(Envio::model()->findAllAttributes(null, true)),
				),
	),
    
    'config'    => array(
        //'colAligns'=>array('C','C'),
        'rowHeight'=> (6),
        'tableWidth'=> (275),
        'title'     => 'Pagos de su empresa',
        'subTitle'  => 'Informe al: '.date('H:i:s',time()),
        'colWidths' => array(null),
        'showLogo'=>(true),
        'imagePath'=>YiiBase::getPathOfAlias('webroot').'/themes\designa\img/logo.jpg',
    ),
));

}
else
{
 ob_clean();
$this->widget('ext.pdfGrid.EPDFGrid', array(
    'id'        => 'informe-pdf',
    'fileName'  => 'Informe en PDF',//Nombre del archivo generado sin la extension pdf (.pdf)
    'dataProvider'  => $model->searchU(), //puede ser $model->search()
    'columns' => array(
		
		'cod_pago',
		'id_empresa',
		'fecha_realizacion',
		'monto',
		'cod_boucher',
		'factura',
		
		array(
				'name'=>'cod_envio',
				'value'=>'GxHtml::valueEx($data->codEnvio)',
				'filter'=>GxHtml::listDataEx(Envio::model()->findAllAttributes(null, true)),
				),
	),
    
    'config'    => array(
        //'colAligns'=>array('C','C'),
        'rowHeight'=> (6),
        'tableWidth'=> (275),
        'title'     => 'Pagos realizados',
        'subTitle'  => 'Informe al: '.date('H:i:s',time()),
        'colWidths' => array(null),
        'showLogo'=>(true),
        'imagePath'=>YiiBase::getPathOfAlias('webroot').'/themes\designa\img/logo.jpg',
    ),
));
}






?>