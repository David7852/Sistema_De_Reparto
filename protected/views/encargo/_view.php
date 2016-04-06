<div class="view">

	<?php echo GxHtml::encode($data->getAttributeLabel('cod_encargo')); ?>:
	<?php echo GxHtml::link(GxHtml::encode($data->cod_encargo), array('view', 'id' => $data->cod_encargo)); ?>
	<br />

	<?php echo GxHtml::encode($data->getAttributeLabel('cod_envio')); ?>:
		<?php echo GxHtml::encode(GxHtml::valueEx($data->codEnvio)); ?>
	<br />
	<?php echo GxHtml::encode($data->getAttributeLabel('id_chofer')); ?>:
		<?php echo GxHtml::encode(GxHtml::valueEx($data->idChofer)); ?>
	<br />
	<?php echo GxHtml::encode($data->getAttributeLabel('placa')); ?>:
		<?php echo GxHtml::encode(GxHtml::valueEx($data->placa0)); ?>
	<br />
	<?php echo GxHtml::encode($data->getAttributeLabel('fecha_inicio')); ?>:
	<?php echo GxHtml::encode($data->fecha_inicio); ?>
	<br />

</div>