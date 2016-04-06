<div class="view">

	<?php echo GxHtml::encode($data->getAttributeLabel('cod_paquete')); ?>:
	<?php echo GxHtml::link(GxHtml::encode($data->cod_paquete), array('view', 'id' => $data->cod_paquete)); ?>
	<br />

	<?php echo GxHtml::encode($data->getAttributeLabel('peso')); ?>:
	<?php echo GxHtml::encode($data->peso); ?>
	<br />
	<?php echo GxHtml::encode($data->getAttributeLabel('cod_producto')); ?>:
		<?php echo GxHtml::encode(GxHtml::valueEx($data->codProducto)); ?>
	<br />
	<?php echo GxHtml::encode($data->getAttributeLabel('cod_presupuesto')); ?>:
		<?php echo GxHtml::encode(GxHtml::valueEx($data->codPresupuesto)); ?>
	<br />
	<?php echo GxHtml::encode($data->getAttributeLabel('alto')); ?>:
	<?php echo GxHtml::encode($data->alto); ?>
	<br />
	<?php echo GxHtml::encode($data->getAttributeLabel('ancho')); ?>:
	<?php echo GxHtml::encode($data->ancho); ?>
	<br />
	<?php echo GxHtml::encode($data->getAttributeLabel('descripcion')); ?>:
	<?php echo GxHtml::encode($data->descripcion); ?>
	<br />
	<?php /*
	<?php echo GxHtml::encode($data->getAttributeLabel('cod_encargo')); ?>:
		<?php echo GxHtml::encode(GxHtml::valueEx($data->codEncargo)); ?>
	<br />
	*/ ?>

</div>