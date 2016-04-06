<?php

$this->breadcrumbs = array(
	$A->label(2) => array('index'),
	Yii::t('app', 'Create'),
);

$this->menu = array(
	array('label'=>Yii::t('app', 'List') . ' ' . $A->label(2), 'url' => array('index')),
	array('label'=>Yii::t('app', 'Manage') . ' ' . $A->label(2), 'url' => array('admin')),
);
?>

<h1><?php echo Yii::t('app', 'Create') . ' ' . GxHtml::encode($A->label()); ?></h1>

<?php
$this->renderPartial('_form', array(
		'U' => $U,
                'A' => $A,
		'buttons' => 'create'));
?>