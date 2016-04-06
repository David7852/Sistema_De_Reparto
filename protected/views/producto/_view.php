<div class="view">

	<?php echo GxHtml::encode($data->getAttributeLabel('cod_producto')); ?>:
	<?php echo GxHtml::link(GxHtml::encode($data->cod_producto), array('view', 'id' => $data->cod_producto)); ?>
	<br />

	<?php echo GxHtml::encode($data->getAttributeLabel('fragil')); ?>:
	<?php echo GxHtml::encode($data->fragil); ?>
	<br />
	<?php echo GxHtml::encode($data->getAttributeLabel('refrigerado')); ?>:
	<?php echo GxHtml::encode($data->refrigerado); ?>
	<br />
	<?php echo GxHtml::encode($data->getAttributeLabel('vivo')); ?>:
	<?php echo GxHtml::encode($data->vivo); ?>
	<br />
	<?php echo GxHtml::encode($data->getAttributeLabel('peligroso')); ?>:
	<?php echo GxHtml::encode($data->peligroso); ?>
	<br />
	<?php echo GxHtml::encode($data->getAttributeLabel('descripcion')); ?>:
	<?php echo GxHtml::encode($data->descripcion); ?>
	<br />
	<?php echo GxHtml::encode($data->getAttributeLabel('nombre')); ?>:
	<?php echo GxHtml::encode($data->nombre); ?>
	<br />
	<?php /*
	<?php echo GxHtml::encode($data->getAttributeLabel('Id_empresa')); ?>:
		<?php echo GxHtml::encode(GxHtml::valueEx($data->idEmpresa)); ?>
	<br />
	*/ ?>

</div>