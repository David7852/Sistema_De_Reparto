<div class="view">

	<?php echo GxHtml::encode($data->getAttributeLabel('cod_ruta')); ?>:
	<?php echo GxHtml::link(GxHtml::encode($data->cod_ruta), array('view', 'id' => $data->cod_ruta)); ?>
	<br />

	<?php echo GxHtml::encode($data->getAttributeLabel('ciudad_a')); ?>:
		<?php echo GxHtml::encode(GxHtml::valueEx($data->ciudadA)); ?>
	<br />
	<?php echo GxHtml::encode($data->getAttributeLabel('nombre_a')); ?>:
	<?php echo GxHtml::encode($data->nombre_a); ?>
	<br />
	<?php echo GxHtml::encode($data->getAttributeLabel('ciudad_b')); ?>:
		<?php echo GxHtml::encode(GxHtml::valueEx($data->ciudadB)); ?>
	<br />
	<?php echo GxHtml::encode($data->getAttributeLabel('nombre_b')); ?>:
	<?php echo GxHtml::encode($data->nombre_b); ?>
	<br />
	<?php echo GxHtml::encode($data->getAttributeLabel('distancia')); ?>:
	<?php echo GxHtml::encode($data->distancia); ?>
	<br />
	<?php echo GxHtml::encode($data->getAttributeLabel('id_empresa')); ?>:
	<?php echo GxHtml::encode($data->id_empresa); ?>
	<br />

</div>