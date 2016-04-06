<?php

class EmpresaController extends GxController {


	public function actionView($id) {
            if(Yii::app()->user->IsGuest)
                $this->redirect(array('site/index'));
            else
            {
		$this->render('view', array(
			'model' => $this->loadModel($id, 'Empresa'),
		));
        }}

	public function actionCreate() 
        {if(!Yii::app()->user->IsGuest)
                $this->redirect(array('site/index'));
            else
            {
            $A = new Empresa;
            $U = new Usuario('create');
            date_default_timezone_set('America/Caracas');
            $datetimenow =date('d-m-Y H:i:s',time());
            $conexion = $conexion = Util::connect();

            if (isset($_POST['Usuario'])) 
            {			
                $U->setAttributes($_POST['Usuario']);
                if($U->validate())//en este caso me interesa validar solo usuario
                {
                    if (Yii::app()->getRequest()->getIsAjaxRequest())
                        Yii::app()->end();
                    else
                    {
                        if($U->clave==""||$U->nombre_usuario=="")//si los campos estan vacios
                        {
                            //mostra error de campos vacios.
                        }else
                        {
                            $query="SELECT * FROM `usuario` WHERE `nombre_usuario`='".$U->nombre_usuario."'";
                            $r=mysql_query($query,$conexion) or die (mysql_error());
                            $n=mysql_num_rows($r);
                            if($n==0)//si el nombre de usuario no esta repetido.
                            {
                                //crear usuario
                                $query="INSERT INTO `usuario`(`clave`, `nombre_usuario`, `fecha_de_registro`) VALUES ('".($U->clave)."','".($U->nombre_usuario)."','".($datetimenow)."')";
                                $r=mysql_query($query,$conexion) or die (mysql_error());
                                //obtener el id del usuario recien creado (no accesible por yii de momento ya que la creacion se realizo manualmente)
                                $query="SELECT `id_user` FROM `usuario` WHERE `nombre_usuario`='".$U->nombre_usuario."'";
                                $r=mysql_query($query,$conexion) or die (mysql_error());
                                $id=mysql_fetch_array($r);
                                $id=$id["id_user"];
                                //crear la entidad en empresa.
                                $query="INSERT INTO `empresa`(`id_user`) VALUES (".$id.")";
                                $r=mysql_query($query,$conexion) or die (mysql_error());
                                //crear datos personales
                                $query="INSERT INTO `datos_personales`(`id_user`) VALUES (".$id.")";
                                $r=mysql_query($query,$conexion) or die (mysql_error());
                                //logear
                                Util::login($U->nombre_usuario, $U->clave);
                                //redirigir
                                $this->redirect(array('datos_personales/update', 'id' => $id));
                            }else
                            {
                                //mostrar error de usuario repetido-
                                ?> 
                                <script language="javascript">
                                alert("El nombre de usuario ya esta tomado");
                                </script> 
                                <?php
                            }
                        }
                    }  
                }
            }

            $this->render('create', array(
                    'U' => $U,
                    'A' => $A,
                    ));
        }}

	public function actionUpdate($id) {
            if(Yii::app()->user->IsGuest)
                $this->redirect(array('site/index'));
            else
            {
		$model = $this->loadModel($id, 'Empresa');


		if (isset($_POST['Empresa'])) {
			$model->setAttributes($_POST['Empresa']);

			if ($model->save()) {
				$this->redirect(array('view', 'id' => $model->id_user));
			}
		}

		$this->render('update', array(
				'model' => $model,
				));
        }}

	public function actionDelete($id) {
            if(Yii::app()->user->IsGuest)
                $this->redirect(array('site/index'));
            else
            {
		if (Yii::app()->getRequest()->getIsPostRequest()) {
			$this->loadModel($id, 'Empresa')->delete();

			if (!Yii::app()->getRequest()->getIsAjaxRequest())
				$this->redirect(array('admin'));
		} else
			throw new CHttpException(400, Yii::t('app', 'Your request is invalid.'));
        }}

	public function actionIndex() {
            if(Yii::app()->user->IsGuest)
                $this->redirect(array('site/index'));
            else
            {
		$dataProvider = new CActiveDataProvider('Empresa');
		$this->render('index', array(
			'dataProvider' => $dataProvider,
		));
        }}

	public function actionAdmin() {
            if(Yii::app()->user->IsGuest)
                $this->redirect(array('site/index'));
            else
            {
		$model = new Empresa('search');
		$model->unsetAttributes();

		if (isset($_GET['Empresa']))
			$model->setAttributes($_GET['Empresa']);

		$this->render('admin', array(
			'model' => $model,
		));
        }}

}