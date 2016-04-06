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
<?php 
date_default_timezone_set('America/Caracas');


if(Util::isEmpresa(Yii::app()->user->name))
{
    
    ob_clean();
$this->widget('ext.pdfGrid.EPDFGrid', array(
    'id'        => 'informe-pdf',
    'fileName'  => 'Informe en PDF',//Nombre del archivo generado sin la extension pdf (.pdf)
    'dataProvider'  => $model->search(), //puede ser $model->search()
    'columns'   => array(
        'cod_presupuesto',
		'fecha_tope',
		'fecha_solicitud',
		array(
				'name'=>'cod_ruta',
				'value'=>'GxHtml::valueEx($data->codRuta)',
				'filter'=>GxHtml::listDataEx(Ruta::model()->findAllAttributes(null, true)),
				),
		
        'Numero_de_paquetes','Apendice',
	),
    
    'config'    => array(
        //'colAligns'=>array('C','C'),
        'rowHeight'=> (6),
        'tableWidth'=> (275),
        'title'     => 'Reporte de presupuestos solicitados por su empresa',
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
    'columns'   => array(
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
		
        'Numero_de_paquetes','Apendice',
	),
    
    'config'    => array(
        //'colAligns'=>array('C','C'),
        'rowHeight'=> (6),
        'tableWidth'=> (275),
        'title'     => 'Reporte de presupuestos solicitados',
        'subTitle'  => 'Informe al: '.date('H:i:s',time()),
        'colWidths' => array(null),
        'showLogo'=>(true),
        'imagePath'=>YiiBase::getPathOfAlias('webroot').'/themes\designa\img/logo.jpg',
    ),
));
}
?>