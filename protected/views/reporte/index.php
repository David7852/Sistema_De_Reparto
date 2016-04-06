<?php

$this->breadcrumbs = array(
	Reporte::label(2),
	Yii::t('app', 'Index'),
);?>


<h1><?php echo GxHtml::encode(Reporte::label(2)); ?></h1>

<?php 
if(Util::isAdmin(Yii::app()->user->name)||Util::isOperador(Yii::app()->user->name)||Util::isEmpresa(Yii::app()->user->name))
{
?>
<ul>
    <li>    
        <a href="<?php echo Yii::app()->getBaseUrl(true)."/index.php?r=presupuesto/report"; ?>">Reporte de Presupuestos</a>
    </li>
    <li>    
        <a href="<?php echo Yii::app()->getBaseUrl(true)."/index.php?r=encargo/report"; ?>">Reporte de Encargos</a>
    </li>
    <li>    
    <a href="<?php echo Yii::app()->getBaseUrl(true)."/index.php?r=envio/report"; ?>">Reporte de Envios</a>
    </li>
    <li>    
    <a href="<?php echo Yii::app()->getBaseUrl(true)."/index.php?r=pago/report"; ?>">Reporte de Pagos</a>
    </li>
</ul>   

<?php
}else 
 
if(Util::isChofer(Yii::app()->user->name))
{
?>
<ul>
    
    <li>    
        <a href="<?php echo Yii::app()->getBaseUrl(true)."/index.php?r=encargo/report"; ?>">Reporte de Encargos</a>
    </li>
</ul>   


<?php } ?>