<div class="form">


<?php $form = $this->beginWidget('GxActiveForm', array(
	'id' => 'presupuesto-form',
	'enableAjaxValidation' => false,
));
?>

	<p class="note">
		<?php echo Yii::t('app', 'Fields with'); ?> <span class="required">*</span> <?php echo Yii::t('app', 'are required'); ?>.
	</p>

                <?php echo $form->errorSummary($Pe); ?>
		
                <div class="row">               
                <?php echo $form->labelEx($Pe,'fecha_tope'); ?>
                <?php
                    date_default_timezone_set('America/Caracas');
                    if ($Pe->fecha_tope!='') 
                    {
                        $Pe->fecha_tope=date('d-m-Y',time()/*-28*31622400*/);
                    }
                    $this->widget('zii.widgets.jui.CJuiDatePicker', array(
                        
                    
                    'model'=>$Pe,
                    'attribute'=>'fecha_tope',
                    'value'=>$Pe->fecha_tope,
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
                <?php echo $form->error($Pe,'fecha_tope'); ?>                
                </div>
		<div class="row">
		<?php echo $form->labelEx($Pe,'cod_ruta'); ?>
		<?php echo $form->dropDownList($Pe, 'cod_ruta', GxHtml::listDataEx(Ruta::model()->findAllAttributes(null, true))); ?>
		<?php echo $form->error($Pe,'cod_ruta'); ?>
		</div><!-- row -->
                
                <div class="row">
		<?php echo $form->labelEx($Pe,'Apendice'); ?>
		<?php echo $form->textArea($Pe, 'Apendice', array('maxlength' => 500)); ?>
		<?php echo $form->error($Pe,'Apendice'); ?>
		</div><!-- row -->
                
                <h2>
		Paquetes a Transportar:
                </h2>
                <?php echo $form->errorSummary($Pa); ?>
                
		<div class="row">
		<?php echo $form->labelEx($Pe,'Numero_de_paquetes'); ?>
		<?php echo $form->textField($Pe, 'Numero_de_paquetes'); ?>
		<?php echo $form->error($Pe,'Numero_de_paquetes'); ?>
		</div><!-- row -->
                
                
                <div class="row">
		<?php echo $form->labelEx($Pa,'cod_producto'); ?>
		<?php echo $form->dropDownList($Pa, 'cod_producto', GxHtml::listDataEx(Producto::model()->findAllAttributes(null, true,"`Id_empresa` is null or `Id_empresa`=".Util::getid(Yii::app()->user->name))));//select productos publicos o de mi empresa ?>
		<?php echo $form->error($Pa,'cod_producto'); ?>
		</div><!-- row -->
		<div class="row">
		<?php echo $form->labelEx($Pa,'peso'); ?>
		<?php echo $form->textField($Pa, 'peso'); ?>
		<?php echo $form->error($Pa,'peso'); ?>
		</div><!-- row -->
		<div class="row">
		<?php echo $form->labelEx($Pa,'alto'); ?>
		<?php echo $form->textField($Pa, 'alto'); ?>
		<?php echo $form->error($Pa,'alto'); ?>
		</div><!-- row -->
		<div class="row">
		<?php echo $form->labelEx($Pa,'ancho'); ?>
		<?php echo $form->textField($Pa, 'ancho'); ?>
		<?php echo $form->error($Pa,'ancho'); ?>
		</div><!-- row -->
		<div class="row">
		<?php echo $form->labelEx($Pa,'descripcion'); ?>
		<?php echo $form->textArea($Pa, 'descripcion', array('maxlength' => 250)); ?>
		<?php echo $form->error($Pa,'descripcion'); ?>
		</div><!-- row -->
                
<?php
echo GxHtml::submitButton(Yii::t('app', 'Save'));
$this->endWidget();
?>
</div><!-- form -->