<?php

class ProductoController extends GxController {


	public function actionView($id) {if(Yii::app()->user->IsGuest)
                $this->redirect(array('site/index'));
            else
            {
		$this->render('view', array(
			'model' => $this->loadModel($id, 'Producto'),
		));
        }}

	public function actionCreate() 
        {if(Yii::app()->user->IsGuest)
                $this->redirect(array('site/index'));
            else
            {
            $conexion = $conexion = Util::connect();
		$model = new Producto;
		if (isset($_POST['Producto'])) {
			$model->setAttributes($_POST['Producto']);
			//if ($model->save()) 
				if (Yii::app()->getRequest()->getIsAjaxRequest())
					Yii::app()->end();
				else
                                {
                                    if(Util::getTipoUsuario(Yii::app()->user->name)=="Empresa")//si el usuario es empresa
                                    {
                                        //obtener id del usuario actual
                                        $query="SELECT `id_user` FROM `usuario` WHERE `nombre_usuario`='".Yii::app()->user->name."'";
                                        $r=mysql_query($query,$conexion) or die (mysql_error());
                                        $id=mysql_fetch_array($r);
                                        $id=$id["id_user"];
                                        $query="INSERT INTO `producto`(`fragil`, `refrigerado`, `vivo`, `peligroso`, `descripcion`, `nombre`, `Id_empresa`) VALUES (".$model->fragil.",".$model->refrigerado.",".$model->vivo.",".$model->peligroso.",'".$model->descripcion."','".$model->nombre."',".$id.")";
                                        $r=mysql_query($query,$conexion) or die (mysql_error());
                                        $this->redirect(array('view', 'id' => $id));                          
                                    }else
                                    {
                                        $query="INSERT INTO `producto`(`fragil`, `refrigerado`, `vivo`, `peligroso`, `descripcion`, `nombre`, `Id_empresa`) VALUES (".$model->fragil.",".$model->refrigerado.",".$model->vivo.",".$model->peligroso.",'".$model->descripcion."','".$model->nombre."',null)";
                                        $r=mysql_query($query,$conexion) or die (mysql_error());
                                        $this->redirect(array('admin'));
                                    }
                                }	
		}
		$this->render('create', array( 'model' => $model));
        }}

	public function actionUpdate($id) {if(Yii::app()->user->IsGuest)
                $this->redirect(array('site/index'));
            else
            {
		$model = $this->loadModel($id, 'Producto');


		if (isset($_POST['Producto'])) {
			$model->setAttributes($_POST['Producto']);

			if ($model->save()) {
				$this->redirect(array('view', 'id' => $model->cod_producto));
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
			$this->loadModel($id, 'Producto')->delete();

			if (!Yii::app()->getRequest()->getIsAjaxRequest())
				$this->redirect(array('admin'));
		} else
			throw new CHttpException(400, Yii::t('app', 'Your request is invalid.'));
        }}

	public function actionIndex() {if(Yii::app()->user->IsGuest)
                $this->redirect(array('site/index'));
            else
            {
		$dataProvider = new CActiveDataProvider('Producto');
		$this->render('index', array(
			'dataProvider' => $dataProvider,
		));
        }}

	public function actionAdmin() {
		$model = new Producto('search');
		$model->unsetAttributes();

		if (isset($_GET['Producto']))
			$model->setAttributes($_GET['Producto']);

		$this->render('admin', array(
			'model' => $model,
		));
        }

}