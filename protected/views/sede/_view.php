<div class="view">

	<?php echo GxHtml::encode($data->getAttributeLabel('cod_sede')); ?>:
	<?php echo GxHtml::link(GxHtml::encode($data->cod_sede), array('view', 'id' => $data->cod_sede)); ?>
	<br />

	<?php echo GxHtml::encode($data->getAttributeLabel('ciudad')); ?>:
	<?php echo GxHtml::encode($data->ciudad); ?>
	<br />
	<?php echo GxHtml::encode($data->getAttributeLabel('coordenada')); ?>:
	<?php echo GxHtml::encode($data->coordenada); ?>
	<br />
	<?php echo GxHtml::encode($data->getAttributeLabel('id_empresa')); ?>:
	<?php echo GxHtml::encode($data->id_empresa); ?>
	<br />

</div>