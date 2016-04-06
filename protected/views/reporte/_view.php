<div class="view">

	<?php echo GxHtml::encode($data->getAttributeLabel('fecha_inicio')); ?>:
	<?php echo GxHtml::link(GxHtml::encode($data->fecha_inicio), array('view', 'id' => $data->fecha_inicio)); ?>
	<br />

	<?php echo GxHtml::encode($data->getAttributeLabel('fecha_cierre')); ?>:
	<?php echo GxHtml::encode($data->fecha_cierre); ?>
	<br />
	<?php echo GxHtml::encode($data->getAttributeLabel('text')); ?>:
	<?php echo GxHtml::encode($data->text); ?>
	<br />
	<?php echo GxHtml::encode($data->getAttributeLabel('numero')); ?>:
	<?php echo GxHtml::encode($data->numero); ?>
	<br />

</div>