<?php

class UsuarioController extends GxController {


	public function actionView($id) {if(Yii::app()->user->IsGuest)
                $this->redirect(array('site/index'));
            else
            {
		$this->render('view', array(
			'model' => $this->loadModel($id, 'Usuario'),
		));
        }}

	public function actionCreate() {if(Yii::app()->user->IsGuest)
                $this->redirect(array('site/index'));
            else
            {
		$model = new Usuario;


		if (isset($_POST['Usuario'])) {
			$model->setAttributes($_POST['Usuario']);

			if ($model->save()) {
				if (Yii::app()->getRequest()->getIsAjaxRequest())
					Yii::app()->end();
				else
					$this->redirect(array('view', 'id' => $model->id_user));
			}
		}

		$this->render('create', array( 'model' => $model));
        }}

	public function actionUpdate($id) {if(Yii::app()->user->IsGuest)
                $this->redirect(array('site/index'));
            else
            {
		$model = $this->loadModel($id, 'Usuario');


		if (isset($_POST['Usuario'])) 
                {
                    $model->setAttributes($_POST['Usuario']);
                    if($model->actualpass===""&&$model->newpass!=="")
                        {
                            ?> 
                            <script language="javascript">
                            alert("Ingrese su anterior contraseña antes de actualizar");
                            </script> 
                            <?php
                        }
                    else
                    {
                        $conexion = Util::connect();
                        $query="SELECT * FROM `usuario` WHERE `nombre_usuario`='".$model->nombre_usuario."'";
                        $r=mysql_query($query,$conexion) or die (mysql_error());
                        $n=  mysql_num_rows($r);
                        $query="SELECT `nombre_usuario` FROM `usuario` WHERE `id_user`='".$id."'";
                        $r=mysql_query($query,$conexion) or die (mysql_error());
                        $nom=mysql_fetch_array($r);
                        $nom=$nom["nombre_usuario"];
                        if($n==0||$nom==$model->nombre_usuario)//si el nombre de usuario no esta repetido o no se ha cambiado.
                        {
                            if ($model->nombre_usuario!==""&&$model->save()) 
                            {
                                if($model->actualpass!==""&&$model->newpass!=="")
                                {
                                    $model->clave=$model->newpass;
                                    $model->save(false);                            
                                    Util::Exlogin(null, $id);
                                }
                                    $this->redirect(array('view', 'id' => $model->id_user));
                            }
                        }else
                        {
                            ?> 
                            <script language="javascript">
                            alert("El nuevo nombre de usuario es invalido");
                            </script> 
                            <?php
                        }   
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
			$this->loadModel($id, 'Usuario')->delete();

			if (!Yii::app()->getRequest()->getIsAjaxRequest())
				$this->redirect(array('admin'));
		} else
			throw new CHttpException(400, Yii::t('app', 'Your request is invalid.'));
        }}

	public function actionIndex() {if(Yii::app()->user->IsGuest)
                $this->redirect(array('site/index'));
            else
            {
		$dataProvider = new CActiveDataProvider('Usuario');
		$this->render('index', array(
			'dataProvider' => $dataProvider,
		));
        }}

	public function actionAdmin() {if(Yii::app()->user->IsGuest)
                $this->redirect(array('site/index'));
            else
            {
		$model = new Usuario('search');
		$model->unsetAttributes();

		if (isset($_GET['Usuario']))
			$model->setAttributes($_GET['Usuario']);

		$this->render('admin', array(
			'model' => $model,
		));
        }}

}