<h1>Este es el test numero: <?php echo $var;?></h1>
<?php foreach($model as $data)://por cada dato presete en el modelo de mi controlador de vista?>
<h1><?php echo $data->clave;//imprime el valor del atributo tabla?></h1>
<?php endforeach; ?>


