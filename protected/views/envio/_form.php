<div class="form">


<?php $form = $this->beginWidget('GxActiveForm', array(
	'id' => 'envio-form',
	'enableAjaxValidation' => false,
));
?>

	<p class="note">
		<?php echo Yii::t('app', 'Fields with'); ?> <span class="required">*</span> <?php echo Yii::t('app', 'are required'); ?>.
	</p>

	<?php echo $form->errorSummary($model); ?>

		<div class="row">
		<?php echo $form->labelEx($model,'estado'); ?>
		<?php echo $form->enumDropDownList($model, 'estado'); ?>
		<?php echo $form->error($model,'estado'); ?>
		</div><!-- row -->
		<div class="row">
		<?php echo $form->labelEx($model,'id_empresa'); ?>
		<?php echo $form->textField($model, 'id_empresa'); ?>
		<?php echo $form->error($model,'id_empresa'); ?>
		</div><!-- row -->
		<div class="row">
		<?php echo $form->labelEx($model,'id_operador'); ?>
		<?php echo $form->textField($model, 'id_operador'); ?>
		<?php echo $form->error($model,'id_operador'); ?>
		</div><!-- row -->
		<div class="row">
		<?php echo $form->labelEx($model,'cod_presupuesto'); ?>
		<?php echo $form->dropDownList($model, 'cod_presupuesto', GxHtml::listDataEx(Presupuesto::model()->findAllAttributes(null, true))); ?>
		<?php echo $form->error($model,'cod_presupuesto'); ?>
		</div><!-- row -->
		<div class="row">               
                <?php echo $form->labelEx($model,'fecha de entrega'); ?>
                <?php
                    date_default_timezone_set('America/Caracas');
                    if ($model->fecha!='') 
                    {
                        $model->fecha=date('d-m-Y',time()/*-28*31622400*/);
                    }
                    $this->widget('ext.CJuiDateTimePicker.CJuiDateTimePicker', array(
                    'model'=>$model,
                    'attribute'=>'fecha',
                    'value'=>$model->fecha,
                    'language' => 'es',
                    'htmlOptions' => array('readonly'=>"readonly"),
                    'options'=>array(
                            'autoSize'=>true,
                            'yearRange' => '-1:+1',
                            'dateFormat'=>'dd-mm-yy',
                            'buttonText'=>'Seleccionar Fecha',
                            'selectOtherMonths'=>true,
                            'showAnim'=>'fadeIn',
                            'showButtonPanel'=>true,
                            //'showOn'=>'button',
                            'showOtherMonths'=>true,
                            //'changeMonth' => 'true',
                            //'changeYear' => 'true',
                    ),
                    'name'=>'datepicker',
                    'themeUrl'=>Yii::app()->baseUrl.'/css/css/jqueryui',
                    'theme'=>'flick',
                    )); 
                ?>
                <?php echo $form->error($model,'fecha'); ?>                
                </div>
<?php
echo GxHtml::submitButton(Yii::t('app', 'Save'));
$this->endWidget();
?>
</div><!-- form -->