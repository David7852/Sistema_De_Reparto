<?php

class AdministradorController extends GxController {


	public function actionView($id) 
                {
            if(Yii::app()->user->IsGuest)
                $this->redirect(array('site/index'));
            else
            {
            $U = new Usuario;
		$this->render('view', array(
			'model' => $this->loadModel($id, 'Administrador'),
                    'U'=>$this->loadModel($id, 'Usuario')
		));
                }}

	public function actionCreate() 
        {if(Yii::app()->user->IsGuest)
                $this->redirect(array('site/index'));
            else
            {
		$A = new Administrador;
                $U = new Usuario;
                
                date_default_timezone_set('America/Caracas');
                $datetimenow =date('d-m-Y H:i:s',time());
                $conexion = Util::connect();

		if (isset($_POST['Usuario'])) 
                {
                        
			//$A->$_POST['Administrador'];
                        $U->setAttributes($_POST['Usuario']);
                        // validate BOTH $a and $b
                        //$valid=$A->validate();
                        //$valid=$U->validate() && $valid;
                        if($U->validate())//en este caso me interesa validar solo usuario
                        {
                            // use false parameter to disable validation
                            //$U->save();
                            //$A->save();                            
                            // ...redirect to another page
                            //$this->redirect(array('admin'));
                            //$this->redirect(array('view', 'id' => $A->id_user));
                            //$this->redirect('index');
                            //if ($U->save()) 
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
                                    $n=  mysql_num_rows($r);
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
                                        //crear la entidad en admin.
                                        $query="INSERT INTO `administrador`(`id_user`) VALUES (".$id.")";
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
                                        //mostrar error de usuario repetido
                                    }
                                }
                                //1 comprobar que el nombre no exista, y que ambos campos no esten vacios
                                //2 si no es asi, crearlo
                                //3 si la creacion es exitosa:
                                //  crear un admin con el id actual... o bien, el id del usuario del nombre actual...
                                //  con dicho id crear una entidad de datos personales.
                                //rediriguir
                                
                               // $this->redirect(array('view', 'id' => $A->id_user));
                            }	
                        }
		}else
                {
                    //$HoraSalida=datetime('m/d/Y H:i',  strtotime($model->HoraSalida));//Linea Error
                    Yii::app()->user->setFlash('error','Error');
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
		$model = $this->loadModel($id, 'Administrador');


		if (isset($_POST['Administrador'])) {
			$model->setAttributes($_POST['Administrador']);

			if ($model->save()) {
				$this->redirect(array('view', 'id' => $model->id_user));
			}
		}

		$this->render('update', array(
				'model' => $model,
            ));}
	}

	public function actionDelete($id) 
        {if(Yii::app()->user->IsGuest)
                $this->redirect(array('site/index'));
            else
            {
		if (Yii::app()->getRequest()->getIsPostRequest()) 
                {
			$this->loadModel($id, 'Administrador')->delete();
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
		$dataProvider = new CActiveDataProvider('Administrador');
		$this->render('index', array(
			'dataProvider' => $dataProvider,
		));
        }}

	public function actionAdmin() {
            if(Yii::app()->user->IsGuest)
                $this->redirect(array('site/index'));
            else
            {
		$model = new Administrador('search');
		$model->unsetAttributes();

		if (isset($_GET['Administrador']))
			$model->setAttributes($_GET['Administrador']);

		$this->render('admin', array(
			'model' => $model,
		));
        }}

}