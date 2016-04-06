<div class="view">

	<?php echo GxHtml::encode($data->getAttributeLabel('cod_presupuesto')); ?>:
	<?php echo GxHtml::link(GxHtml::encode($data->cod_presupuesto), array('view', 'id' => $data->cod_presupuesto)); ?>
	<br />

	<?php echo GxHtml::encode($data->getAttributeLabel('fecha_tope')); ?>:
	<?php echo GxHtml::encode($data->fecha_tope); ?>
	<br />
	<?php echo GxHtml::encode($data->getAttributeLabel('fecha_solicitud')); ?>:
	<?php echo GxHtml::encode($data->fecha_solicitud); ?>
	<br />
	<?php echo GxHtml::encode($data->getAttributeLabel('cod_ruta')); ?>:
		<?php echo GxHtml::encode(GxHtml::valueEx($data->codRuta)); ?>
	<br />
	<?php echo GxHtml::encode($data->getAttributeLabel('id_empresa')); ?>:
		<?php echo GxHtml::encode(GxHtml::valueEx($data->idEmpresa)); ?>
	<br />
	<?php echo GxHtml::encode($data->getAttributeLabel('Apendice')); ?>:
	<?php echo GxHtml::encode($data->Apendice); ?>
	<br />
	<?php echo GxHtml::encode($data->getAttributeLabel('Numero_de_paquetes')); ?>:
	<?php echo GxHtml::encode($data->Numero_de_paquetes); ?>
	<br />

</div>