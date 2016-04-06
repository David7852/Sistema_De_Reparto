<div class="view">

	<?php echo GxHtml::encode($data->getAttributeLabel('id_user')); ?>:
	<?php echo GxHtml::link(GxHtml::encode($data->id_user), array('view', 'id' => $data->id_user)); ?>
	<br />

	<?php echo GxHtml::encode($data->getAttributeLabel('clave')); ?>:
	<?php echo GxHtml::encode($data->clave); ?>
	<br />
	<?php echo GxHtml::encode($data->getAttributeLabel('nombre_usuario')); ?>:
	<?php echo GxHtml::encode($data->nombre_usuario); ?>
	<br />
	<?php echo GxHtml::encode($data->getAttributeLabel('fecha_de_registro')); ?>:
	<?php echo GxHtml::encode($data->fecha_de_registro); ?>
	<br />

</div>