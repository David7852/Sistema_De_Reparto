<div class="form">

    <?php $form = $this->beginWidget('GxActiveForm', array(
	'id' => 'encargo-form',
	'enableAjaxValidation' => false,
));
?>

    
 
    


 
    <h2><?php echo GxHtml::encode($model->getRelationLabel('paquetes')); ?></h2>
    <?php
	echo GxHtml::openTag('ul');
	foreach($model->paquetes as $relatedModel) {
		echo GxHtml::openTag('li');
		echo GxHtml::link(GxHtml::encode(GxHtml::valueEx($relatedModel)), array('paquete/view', 'id' => GxActiveRecord::extractPkValue($relatedModel, true)));
		echo GxHtml::closeTag('li');
	}
	echo GxHtml::closeTag('ul');
?>
      <?php echo $form->errorSummary($model); ?>
<?php date_default_timezone_set('America/Caracas'); ?>
                <div class="row">
		<?php echo $form->labelEx($model,'A la fecha:'); ?>
		<?php echo $form->textField($model, 'fecha_inicio', array('value'=>date('d-m-Y H:i:s',time()))); ?>
		<?php echo $form->error($model,'fecha_inicio'); ?>
		</div><!-- row -->
    <p>Al pulsar en aceptar usted estara aceptando la recepcion de su mercancia y se compromete legalmente a la realizacion puntual del pago por nuestro servicio</p>

<?php
echo GxHtml::submitButton(Yii::t('app', 'Aceptar'));
$this->endWidget();
?>
</div><!-- form -->