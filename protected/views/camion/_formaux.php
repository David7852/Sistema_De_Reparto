<div class="form">


<?php $form = $this->beginWidget('GxActiveForm', array(
	'id' => 'camion-form',
	'enableAjaxValidation' => false,
));
?>

	<p class="note">
		<?php echo Yii::t('app', 'Fields with'); ?> <span class="required">*</span> <?php echo Yii::t('app', 'are required'); ?>.
	</p>

	<?php echo $form->errorSummary($model); ?>

		<div class="row">
		<?php echo $form->labelEx($model,'placa'); ?>
		<?php echo $form->textField($model, 'placa', array('maxlength' => 10)); ?>
		<?php echo $form->error($model,'placa'); ?>
		</div><!-- row -->
		<div class="row">
		<?php echo $form->labelEx($model,'distancia_optima'); ?>
		<?php echo $form->textField($model, 'distancia_optima'); ?>
		<?php echo $form->error($model,'distancia_optima'); ?>
		</div><!-- row -->
		<div class="row">
		<?php echo $form->labelEx($model,'peso_max'); ?>
		<?php echo $form->textField($model, 'peso_max'); ?>
		<?php echo $form->error($model,'peso_max'); ?>
		</div><!-- row -->
		<div class="row">
		<?php echo $form->labelEx($model,'alto'); ?>
		<?php echo $form->textField($model, 'alto'); ?>
		<?php echo $form->error($model,'alto'); ?>
		</div><!-- row -->
		<div class="row">
		<?php echo $form->labelEx($model,'ancho'); ?>
		<?php echo $form->textField($model, 'ancho'); ?>
		<?php echo $form->error($model,'ancho'); ?>
		</div><!-- row -->
		<div class="row">
		<?php echo $form->labelEx($model,'mantenimiento'); ?>
		<?php echo $form->checkBox($model, 'mantenimiento'); ?>
		<?php echo $form->error($model,'mantenimiento'); ?>
		</div><!-- row -->
		<div class="row">
		<?php echo $form->labelEx($model,'fragil'); ?>
		<?php echo $form->checkBox($model, 'fragil'); ?>
		<?php echo $form->error($model,'fragil'); ?>
		</div><!-- row -->
		<div class="row">
		<?php echo $form->labelEx($model,'refrigerado'); ?>
		<?php echo $form->checkBox($model, 'refrigerado'); ?>
		<?php echo $form->error($model,'refrigerado'); ?>
		</div><!-- row -->
		<div class="row">
		<?php echo $form->labelEx($model,'vivo'); ?>
		<?php echo $form->checkBox($model, 'vivo'); ?>
		<?php echo $form->error($model,'vivo'); ?>
		</div><!-- row -->
		<div class="row">
		<?php echo $form->labelEx($model,'peligroso'); ?>
		<?php echo $form->checkBox($model, 'peligroso'); ?>
		<?php echo $form->error($model,'peligroso'); ?>
		</div><!-- row -->
		<div class="row">
		<?php echo $form->labelEx($model,'Licencia del chofer'); ?>
		<?php
                $conexion=Util::connect();
                $query="SELECT `id_user` FROM `datos_personales` inner join chofer using (id_user)";
                $r=mysql_query($query,$conexion) or die (mysql_error());
                $query="`id_user`=-1 ";
                 $ids=array();//este arreglo sera igual a los ids
                    while($arids=mysql_fetch_array($r,MYSQL_ASSOC))
                        foreach($arids as $i)
                        $query=$query." OR `id_user` = ".($i);
                echo $form->dropDownList($model, 'id_chofer', GxHtml::listDataEx(Datos_personales::model()->findAllAttributes(null,true,$query)),array('empty'=>'')); ?>
		<?php echo $form->error($model,'id_chofer'); ?>
		</div><!-- row -->

                <?php
                class p{
                public function findAllAttributes($attributes = null, $withPk = true, $condition='', $params=array()) 
                {
                Yii::trace(get_class($this) . '.findAllAttributes()', 'giix.components.GxActiveRecord');

                $criteria = $this->getCommandBuilder()->createCriteria($condition, $params);
                if ($attributes === null)
                        $attributes = $this->representingColumn();
                if ($withPk) {
                        $pks = self::model(get_class($this))->getTableSchema()->primaryKey;
                        if (!is_array($pks))
                                $pks = array($pks);
                        if (!is_array($attributes))
                                $attributes = array($attributes);
                        $attributes = array_merge($pks, $attributes);
                }
                $criteria->select = $attributes;
                return parent::findAll($criteria);
                }}?>
                
                
                
                
                
                
                
                
<?php
echo GxHtml::submitButton(Yii::t('app', 'Save'));
$this->endWidget();
?>
</div><!-- form -->