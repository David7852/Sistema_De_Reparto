<div class="view">

	<?php echo GxHtml::encode($data->getAttributeLabel('id_user')); ?>:
	<?php echo GxHtml::link(GxHtml::encode($data->id_user), array('view', 'id' => $data->id_user)); ?>
	<br />

	<?php echo GxHtml::encode($data->getAttributeLabel('numero_licencia')); ?>:
	<?php echo GxHtml::encode($data->numero_licencia); ?>
        <br />
        
	<?php echo GxHtml::encode($data->getAttributeLabel('fecha_fin_licencia')); ?>:
	<?php echo GxHtml::encode($data->fecha_fin_licencia); ?>
	<br />

</div>