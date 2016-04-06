<?php

class ChoferController extends GxController {


	public function actionView($id) {if(Yii::app()->user->IsGuest)
                $this->redirect(array('site/index'));
            else
            {
		$this->render('view', array(
			'model' => $this->loadModel($id, 'Chofer'),
		));
        }}

	public function actionCreate() 
        {if(Yii::app()->user->IsGuest)
                $this->redirect(array('site/index'));
            else
            {
            $A = new Chofer;
            $U = new Usuario;
            date_default_timezone_set('America/Caracas');
            $datetimenow =date('d-m-Y H:i:s',time());
            $conexion = $conexion = Util::connect();

            if (isset($_POST['Usuario'])&&isset($_POST['Chofer'])) 
            {			
                $U->setAttributes($_POST['Usuario']);
                $A->setAttributes($_POST['Chofer']);
                if($U->validate()&&$A->validate())//en este caso me interesa validar solo usuario
                {
                    if (Yii::app()->getRequest()->getIsAjaxRequest())
                        Yii::app()->end();
                    else
                    {
                        if($U->clave==""||$U->nombre_usuario==""||$A->numero_licencia==""||$A->fecha_fin_licencia=="")//si los campos estan vacios
                        {
                            //mostra error de campos vacios.
                        }else
                        {
                            $query="SELECT * FROM `usuario` WHERE `nombre_usuario`='".$U->nombre_usuario."'";
                            $r=mysql_query($query,$conexion) or die (mysql_error());
                            $n=mysql_num_rows($r);
                            $query="SELECT * FROM `chofer` WHERE `numero_licencia`='".$A->numero_licencia."'";
                            $r=mysql_query($query,$conexion) or die (mysql_error());
                            $m=mysql_num_rows($r);
                            if($n==0&&$m==0)//si el nombre de usuario ni el numero de licencio no estan repetido.
                            {
                                //crear usuario
                                $query="INSERT INTO `usuario`(`clave`, `nombre_usuario`, `fecha_de_registro`) VALUES ('".($U->clave)."','".($U->nombre_usuario)."','".($datetimenow)."')";
                                $r=mysql_query($query,$conexion) or die (mysql_error());
                                //obtener el id del usuario recien creado (no accesible por yii de momento ya que la creacion se realizo manualmente)
                                $query="SELECT `id_user` FROM `usuario` WHERE `nombre_usuario`='".$U->nombre_usuario."'";
                                $r=mysql_query($query,$conexion) or die (mysql_error());
                                $id=mysql_fetch_array($r);
                                $id=$id["id_user"];
                                //crear la entidad en chofer.
                                $query="INSERT INTO `chofer`(`id_user`, `numero_licencia`, `fecha_fin_licencia`) VALUES (".$id.",'".$A->numero_licencia."','".$A->fecha_fin_licencia."')";
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
                                //mostrar error de usuario y licencia repetido
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

	public function actionUpdate($id) {if(Yii::app()->user->IsGuest)
                $this->redirect(array('site/index'));
            else
            {
		$model = $this->loadModel($id, 'Chofer');


		if (isset($_POST['Chofer'])) {
			$model->setAttributes($_POST['Chofer']);

			if ($model->save()) {
				$this->redirect(array('view', 'id' => $model->id_user));
			}
		}

		$this->render('update', array(
				'model' => $model,
				));
        }}

	public function actionDelete($id) {if(Yii::app()->user->IsGuest)
                $this->redirect(array('site/index'));
            else
            {
		if (Yii::app()->getRequest()->getIsPostRequest()) {
			$this->loadModel($id, 'Chofer')->delete();
                        $this->loadModel($id, 'Datos_personales')->delete();//delete datos
                        $this->loadModel($id, 'Usuario')->delete();//delete usuario

			if (!Yii::app()->getRequest()->getIsAjaxRequest())
				$this->redirect(array('admin'));
		} else
			throw new CHttpException(400, Yii::t('app', 'Your request is invalid.'));
        }}

	public function actionIndex() {if(Yii::app()->user->IsGuest)
                $this->redirect(array('site/index'));
            else
            {
		$dataProvider = new CActiveDataProvider('Chofer');
		$this->render('index', array(
			'dataProvider' => $dataProvider,
		));
        }}

	public function actionAdmin() {if(Yii::app()->user->IsGuest)
                $this->redirect(array('site/index'));
            else
            {
		$model = new Chofer('search');
		$model->unsetAttributes();

		if (isset($_GET['Chofer']))
			$model->setAttributes($_GET['Chofer']);

		$this->render('admin', array(
			'model' => $model,
		));
        }}

}