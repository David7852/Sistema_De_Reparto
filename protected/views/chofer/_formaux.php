<div class="form">


<?php $form = $this->beginWidget('GxActiveForm', array(
	'id' => 'chofer-form',
	'enableAjaxValidation' => false,
));
?>

	<p class="note">
		<?php echo Yii::t('app', 'Fields with'); ?> <span class="required">*</span> <?php echo Yii::t('app', 'are required'); ?>.
	</p>

	
                <?php echo $form->errorSummary($U); ?>
		<!--		<div class="row">
		<?php //echo $form->labelEx($A,'id_user'); ?>
		<?php //echo $form->dropDownList($A, 'id_user', GxHtml::listDataEx(Usuario::model()->findAllAttributes(null, true))); ?>
		<?php //echo $form->error($A,'id_user'); ?>
		</div> row -->

                <div class="row">
		<?php echo $form->labelEx($U,'nombre_usuario'); ?>
		<?php echo $form->textField($U, 'nombre_usuario', array('maxlength' => 25)); ?>
		<?php echo $form->error($U,'nombre_usuario'); ?>
		</div><!-- row -->
                <div class="row">
		<?php echo $form->labelEx($U,'clave'); ?>
		<?php echo $form->passwordField($U, 'clave', array('maxlength' => 25)); ?>
		<?php echo $form->error($U,'clave'); ?>
                </div><!-- row -->
                <div class="row">
		<?php echo $form->labelEx($U,'repeatpassword'); ?>
		<?php echo $form->passwordField($U, 'repeatpassword', array('maxlength' => 25)); ?>
		<?php echo $form->error($U,'repeatpassword'); ?>
                </div><!-- row -->
                <?php echo $form->errorSummary($A); ?>
		<div class="row">
		<?php echo $form->labelEx($A,'numero_licencia'); ?>
		<?php echo $form->textField($A, 'numero_licencia'); ?>
		<?php echo $form->error($A,'numero_licencia'); ?>
		</div><!-- row -->
                <div class="row">               
                <?php echo $form->labelEx($A,'fecha_fin_licencia'); ?>
                <?php
                    date_default_timezone_set('America/Caracas');
                    if ($A->fecha_fin_licencia!='') 
                    {
                        $A->fecha_fin_licencia=date('d-m-Y',time()/*-28*31622400*/);
                    }
                    $this->widget('zii.widgets.jui.CJuiDatePicker', array(
                        
                        
                    'model'=>$A,
                    'attribute'=>'fecha_fin_licencia',
                    'value'=>$A->fecha_fin_licencia,
                    'language' => 'es',
                    'htmlOptions' => array(),
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
                <?php echo $form->error($A,'fecha_fin_licencia'); ?>                
                </div>


<?php
echo GxHtml::submitButton(Yii::t('app', 'Save'));
$this->endWidget();
?>
</div><!-- form -->
