<div class="view">

	<?php echo GxHtml::encode($data->getAttributeLabel('cod_envio')); ?>:
	<?php echo GxHtml::link(GxHtml::encode($data->cod_envio), array('view', 'id' => $data->cod_envio)); ?>
	<br />

	<?php echo GxHtml::encode($data->getAttributeLabel('estado')); ?>:
	<?php echo GxHtml::encode($data->estado); ?>
	<br />
	<?php echo GxHtml::encode($data->getAttributeLabel('id_empresa')); ?>:
	<?php echo GxHtml::encode($data->id_empresa); ?>
	<br />
	<?php echo GxHtml::encode($data->getAttributeLabel('id_operador')); ?>:
	<?php echo GxHtml::encode($data->id_operador); ?>
	<br />
	<?php echo GxHtml::encode($data->getAttributeLabel('cod_presupuesto')); ?>:
		<?php echo GxHtml::encode(GxHtml::valueEx($data->codPresupuesto)); ?>
	<br />
	<?php echo GxHtml::encode($data->getAttributeLabel('fecha')); ?>:
	<?php echo GxHtml::encode($data->fecha); ?>
	<br />

</div>