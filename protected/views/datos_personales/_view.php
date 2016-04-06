<div class="view">

	<?php echo GxHtml::encode($data->getAttributeLabel('id_user')); ?>:
	<?php echo GxHtml::link(GxHtml::encode($data->id_user), array('view', 'id' => $data->id_user)); ?>
	<br />

	<?php echo GxHtml::encode($data->getAttributeLabel('nombre')); ?>:
	<?php echo GxHtml::encode($data->nombre); ?>
	<br />
	<?php echo GxHtml::encode($data->getAttributeLabel('apellido')); ?>:
	<?php echo GxHtml::encode($data->apellido); ?>
	<br />
	<?php echo GxHtml::encode($data->getAttributeLabel('cedula')); ?>:
	<?php echo GxHtml::encode($data->cedula); ?>
	<br />
	<?php echo GxHtml::encode($data->getAttributeLabel('correo')); ?>:
	<?php echo GxHtml::encode($data->correo); ?>
	<br />
	<?php echo GxHtml::encode($data->getAttributeLabel('RIF')); ?>:
	<?php echo GxHtml::encode($data->RIF); ?>
	<br />
	<?php echo GxHtml::encode($data->getAttributeLabel('numero_telefono')); ?>:
	<?php echo GxHtml::encode($data->numero_telefono); ?>
	<br />

</div>