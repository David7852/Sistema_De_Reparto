<div class="form">

<?php $form = $this->beginWidget('GxActiveForm', array(
	'id' => 'encargo-form',
	'enableAjaxValidation' => false,
));
?>

	<p class="note">
		<?php echo Yii::t('app', 'Fields with'); ?> <span class="required">*</span> <?php echo Yii::t('app', 'are required'); ?>.
	</p>

	<?php echo $form->errorSummary($model); ?>

		<div class="row">
		<?php echo $form->labelEx($model,'cod_envio'); ?>
		<?php echo $form->dropDownList($model, 'cod_envio', GxHtml::listDataEx(Envio::model()->findAllAttributes(null, true))); ?>
		<?php echo $form->error($model,'cod_envio'); ?>
		</div><!-- row -->
		<div class="row">
		<?php echo $form->labelEx($model,'id_chofer'); ?>
		<?php echo $form->dropDownList($model, 'id_chofer', GxHtml::listDataEx(Chofer::model()->findAllAttributes(null, true))); ?>
		<?php echo $form->error($model,'id_chofer'); ?>
		</div><!-- row -->
		<div class="row">
		<?php echo $form->labelEx($model,'placa'); ?>
		<?php echo $form->dropDownList($model, 'placa', GxHtml::listDataEx(Camion::model()->findAllAttributes(null, true))); ?>
		<?php echo $form->error($model,'placa'); ?>
		</div><!-- row -->
                
		<div class="row">               
                <?php echo $form->labelEx($model,'fecha_inicio'); ?>
                <?php
                    date_default_timezone_set('America/Caracas');
                    if ($model->fecha_inicio!='') 
                    {
                        $model->fecha_inicio=date('d-m-Y',time()/*-28*31622400*/);
                    }
                    $this->widget('ext.CJuiDateTimePicker.CJuiDateTimePicker', array(
                    'model'=>$model,
                    'attribute'=>'fecha_inicio',
                    'value'=>$model->fecha_inicio,
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
                <?php echo $form->error($model,'fecha_inicio'); ?>                
                </div>
<!--                
                <?php /*
                //$codencargo= substr(Yii::app()->request->url,strpos(Yii::app()->request->url,"&id=")+4,strlen(Yii::app()->request->url)-1);
                  $codencargo="1";      
                         
                
                
                $this->widget('zii.widgets.grid.CGridView', array(
	'id' => 'paquete-grid',
	'dataProvider' => $PA->search(),
	'filter' => $PA,
	'columns' => array(
		'cod_paquete',
		'peso',
		array(
				'name'=>'cod_producto',
				'value'=>'GxHtml::valueEx($data->codProducto)',
				'filter'=>GxHtml::listDataEx(Producto::model()->findAllAttributes(null, true)),
				),
		array(
				'name'=>'cod_presupuesto',
				'value'=>'GxHtml::valueEx($data->codPresupuesto)',
				'filter'=>GxHtml::listDataEx(Presupuesto::model()->findAllAttributes(null, true)),
				),
		'alto',
		'ancho',
		/*
		'descripcion',
		array(
				'name'=>'cod_encargo',
				'value'=>'GxHtml::valueEx($data->codEncargo)',
				'filter'=>GxHtml::listDataEx(Encargo::model()->findAllAttributes(null, true)),
				),
		
		array(
                    'class' => 'CButtonColumn',
                    
                    'deleteConfirmation'=>'Seguro que quiere vincular este paquete con este envio?',                    
                    'template' => '{delete}',
                    'deleteButtonLabel'=>'Agregar',
                    //'updateButtonUrl' =>'Yii::app()->createUrl("/customer/editmember1",array("id" => $data->primaryKey))',
                    //'updateButtonImageUrl'=>Yii::app()->request->baseUrl.'/images/edit.jpg',
                    'deleteButtonUrl' =>'Yii::app()->createUrl("/paquete/delete",array("id" => $data["cod_paquete"],"Y"=>'.$codencargo.',"W"=>true))',
                    'deleteButtonImageUrl'=>Yii::app()->request->baseUrl.'/images/ADD.png', 
        
                    
                    
//'class'=>'CButtonColumn',
//'deleteConfirmation'=>'Are You Sure?',
//'header'=>'tools',
//'htmlOptions'=>array('class'=>'tools'),
//
//'template'=>'{view}{update}{delete}',
//
//'buttons'=>array
//(
//
//'view' => array
//(
//'label'=>'View',
//'imageUrl'=>Yii::app()->request->baseUrl.'/images/icon_tool_view.png',
//'url'=>'yii::app()->createUrl("admin/view")',
//'options'=>array('class'=>'view')
//
//),
//'update' => array
//(
//'label'=>'Update',
//'imageUrl'=>Yii::app()->request->baseUrl.'/images/icon_tool_edit.png',
//'url'=>' Yii::app()->createUrl("admin/update", array("id"=>$data["id"]))',
//
//'options'=>array('class'=>'edit'),
//),
//'delete' => array
//(
//'label'=>'Delete',
//'imageUrl'=>Yii::app()->request->baseUrl.'/images/icon_tool_delete.png',
//'url'=>'Yii::app()->createUrl("admin/delete", array("id"=>$data["id"]))',
//'options'=>array('class'=>'delete'),
//
//),
//),
                    
                                        
                    //'updateButtonUrl'=>'Yii::app()->createUrl("/paquete/view", array("id" => $data["cod_paquete"]))',
                    /*array(
                        'class'=>'CButtonColumn',
                        'viewButtonUrl'=>'Yii::app()->createUrl("/controllername/view", array("id" => $data["id"]))',
                        'deleteButtonUrl'=>'Yii::app()->createUrl("/controllername/delete", array("id" =>  $data["id"]))',
                        'updateButtonUrl'=>'Yii::app()->createUrl("/controllername/update", array("id" =>  $data["id"]))',
                      ),
                     
                    
		),
            array(
                    'class' => 'CButtonColumn',
                    
                    'deleteConfirmation'=>'Seguro que quiere vincular este paquete con este envio?',
                    
                    
                    'template' => '{delete}',
                    'deleteButtonLabel'=>'Remover',
                    //'updateButtonUrl' =>'Yii::app()->createUrl("/customer/editmember1",array("id" => $data->primaryKey))',
                    //'updateButtonImageUrl'=>Yii::app()->request->baseUrl.'/images/edit.jpg',
                    'deleteButtonUrl' =>'Yii::app()->createUrl("/paquete/delete",array("id" => $data["cod_paquete"],"Y"=>'.$codencargo.',"W"=>false))',
                    'deleteButtonImageUrl'=>Yii::app()->request->baseUrl.'/images/REMOVE.png',                     
		),
	),
));*/ ?>

                -->
                
                
                
                
<!--		<label><?php/* echo GxHtml::encode($model->getRelationLabel('paquetes')); */?></label>
		<?php/* echo $form->checkBoxList($model, 'paquetes', GxHtml::encodeEx(GxHtml::listDataEx(Paquete::model()->findAllAttributes(null, true)), false, true)); */?>
                -->
<?php
echo GxHtml::submitButton(Yii::t('app', 'Save'));
$this->endWidget();
?>
</div><!-- form -->