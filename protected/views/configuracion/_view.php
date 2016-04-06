<div class="view">

	<?php echo GxHtml::encode($data->getAttributeLabel('numero')); ?>:
	<?php echo GxHtml::link(GxHtml::encode($data->numero), array('view', 'id' => $data->numero)); ?>
	<br />

	<?php echo GxHtml::encode($data->getAttributeLabel('NombreMiEmpresa')); ?>:
	<?php echo GxHtml::encode($data->NombreMiEmpresa); ?>
	<br />
	<?php echo GxHtml::encode($data->getAttributeLabel('LogoMiEmpresa')); ?>:
	<?php echo GxHtml::encode($data->LogoMiEmpresa); ?>
	<br />
	<?php echo GxHtml::encode($data->getAttributeLabel('EmailMilEmpresa')); ?>:
	<?php echo GxHtml::encode($data->EmailMilEmpresa); ?>
	<br />
	<?php echo GxHtml::encode($data->getAttributeLabel('SloganMiEmpresa')); ?>:
	<?php echo GxHtml::encode($data->SloganMiEmpresa); ?>
	<br />
	<?php echo GxHtml::encode($data->getAttributeLabel('ReportSpam')); ?>:
	<?php echo GxHtml::encode($data->ReportSpam); ?>
	<br />

</div>