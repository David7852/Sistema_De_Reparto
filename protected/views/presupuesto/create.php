<?php

$this->breadcrumbs = array(
	$Pe->label(2) => array('index'),
	Yii::t('app', 'Create'),
);

$this->menu = array(
	array('label'=>Yii::t('app', 'List') . ' ' . $Pe->label(2), 'url' => array('index')),
	array('label'=>Yii::t('app', 'Manage') . ' ' . $Pe->label(2), 'url' => array('admin')),
);
?>

<h1><?php echo Yii::t('app', 'Create') . ' ' . GxHtml::encode($Pe->label()); ?></h1>

<?php
$this->renderPartial('_formSimple', array(
		'Pe' => $Pe,'Pa'=>$Pa,/*'R'=>$R,*/
		'buttons' => 'create'));
?>