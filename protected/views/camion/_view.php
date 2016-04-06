<div class="view">

	<?php echo GxHtml::encode($data->getAttributeLabel('placa')); ?>:
	<?php echo GxHtml::link(GxHtml::encode($data->placa), array('view', 'id' => $data->placa)); ?>
	<br />

	<?php echo GxHtml::encode($data->getAttributeLabel('distancia_optima')); ?>:
	<?php echo GxHtml::encode($data->distancia_optima); ?>
	<br />
	<?php echo GxHtml::encode($data->getAttributeLabel('peso_max')); ?>:
	<?php echo GxHtml::encode($data->peso_max); ?>
	<br />
	<?php echo GxHtml::encode($data->getAttributeLabel('alto')); ?>:
	<?php echo GxHtml::encode($data->alto); ?>
	<br />
	<?php echo GxHtml::encode($data->getAttributeLabel('mantenimiento')); ?>:
	<?php echo GxHtml::encode($data->mantenimiento); ?>
	<br />
	<?php echo GxHtml::encode($data->getAttributeLabel('fragil')); ?>:
	<?php echo GxHtml::encode($data->fragil); ?>
	<br />
	<?php echo GxHtml::encode($data->getAttributeLabel('refrigerado')); ?>:
	<?php echo GxHtml::encode($data->refrigerado); ?>
	<br />
	<?php /*
	<?php echo GxHtml::encode($data->getAttributeLabel('vivo')); ?>:
	<?php echo GxHtml::encode($data->vivo); ?>
	<br />
	<?php echo GxHtml::encode($data->getAttributeLabel('peligroso')); ?>:
	<?php echo GxHtml::encode($data->peligroso); ?>
	<br />
	<?php echo GxHtml::encode($data->getAttributeLabel('id_chofer')); ?>:
		<?php echo GxHtml::encode(GxHtml::valueEx($data->idChofer)); ?>
	<br />
	<?php echo GxHtml::encode($data->getAttributeLabel('ancho')); ?>:
	<?php echo GxHtml::encode($data->ancho); ?>
	<br />
	*/ ?>

</div>