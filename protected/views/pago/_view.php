<div class="view">

	<?php echo GxHtml::encode($data->getAttributeLabel('cod_pago')); ?>:
	<?php echo GxHtml::link(GxHtml::encode($data->cod_pago), array('view', 'id' => $data->cod_pago)); ?>
	<br />

	<?php echo GxHtml::encode($data->getAttributeLabel('id_empresa')); ?>:
	<?php echo GxHtml::encode($data->id_empresa); ?>
	<br />
	<?php echo GxHtml::encode($data->getAttributeLabel('fecha_realizacion')); ?>:
	<?php echo GxHtml::encode($data->fecha_realizacion); ?>
	<br />
	<?php echo GxHtml::encode($data->getAttributeLabel('monto')); ?>:
	<?php echo GxHtml::encode($data->monto); ?>
	<br />
	<?php echo GxHtml::encode($data->getAttributeLabel('cod_boucher')); ?>:
	<?php echo GxHtml::encode($data->cod_boucher); ?>
	<br />
	<?php echo GxHtml::encode($data->getAttributeLabel('factura')); ?>:
	<?php echo GxHtml::encode($data->factura); ?>
	<br />
	<?php echo GxHtml::encode($data->getAttributeLabel('cod_envio')); ?>:
		<?php echo GxHtml::encode(GxHtml::valueEx($data->codEnvio)); ?>
	<br />

</div>