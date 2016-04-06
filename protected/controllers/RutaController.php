<?php

class RutaController extends GxController {


	public function actionView($id) {if(Yii::app()->user->IsGuest)
                $this->redirect(array('site/index'));
            else
            {
		$this->render('view', array(
			'model' => $this->loadModel($id, 'Ruta'),
		));
        }}

	public function actionCreate() 
        {   if(Yii::app()->user->IsGuest)
                $this->redirect(array('site/index'));
            else
            {
		$model = new Ruta;
		if (isset($_POST['Ruta'])) {
			$model->setAttributes($_POST['Ruta']);

			if ($model->save()) {
				if (Yii::app()->getRequest()->getIsAjaxRequest())
					Yii::app()->end();
				else
                                {
                                    $conexion = $conexion = Util::connect();
                                    $query="SELECT `ciudad` FROM `sede` WHERE `cod_sede`=".$model->ciudad_a;
                                    $r=mysql_query($query,$conexion) or die (mysql_error());
                                    $ciudadA=mysql_fetch_array($r);
                                    $ciudadA=$ciudadA["ciudad"];
                                    $conexion = $conexion = Util::connect();
                                    $query="SELECT `ciudad` FROM `sede` WHERE `cod_sede`=".$model->ciudad_b;
                                    $r=mysql_query($query,$conexion) or die (mysql_error());
                                    $ciudadB=mysql_fetch_array($r);
                                    $ciudadB=$ciudadB["ciudad"];
                                    
                                    if(Util::isEmpresa(Yii::app()->user->name))
                                    {
                                        $query="UPDATE `ruta` SET `nombre_a`= '".$ciudadA."' ,`nombre_b`= '".$ciudadB."' ,`id_empresa`= '".Util::getid(Yii::app()->user->name)."' WHERE `cod_ruta`=".$model->cod_ruta;
                                        $r=mysql_query($query,$conexion) or die (mysql_error());
                                    }
                                    else
                                    {
                                        $query="UPDATE `ruta` SET `nombre_a`= '".$ciudadA."' ,`nombre_b`= '".$ciudadB."' WHERE `cod_ruta`=".$model->cod_ruta;
                                        $r=mysql_query($query,$conexion) or die (mysql_error());
                                    }
					$this->redirect(array('view', 'id' => $model->cod_ruta));
                                }
			}
		}

		$this->render('create', array( 'model' => $model));
        }}

	public function actionUpdate($id) {if(Yii::app()->user->IsGuest)
                $this->redirect(array('site/index'));
            else
            {
		$model = $this->loadModel($id, 'Ruta');


		if (isset($_POST['Ruta'])) {
			$model->setAttributes($_POST['Ruta']);

			if ($model->save()) {
				$this->redirect(array('view', 'id' => $model->cod_ruta));
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
			$this->loadModel($id, 'Ruta')->delete();

			if (!Yii::app()->getRequest()->getIsAjaxRequest())
				$this->redirect(array('admin'));
		} else
			throw new CHttpException(400, Yii::t('app', 'Your request is invalid.'));
        }}

	public function actionIndex() {if(Yii::app()->user->IsGuest)
                $this->redirect(array('site/index'));
            else
            {
		$dataProvider = new CActiveDataProvider('Ruta');
		$this->render('index', array(
			'dataProvider' => $dataProvider,
		));
        }}

	public function actionAdmin() {
		$model = new Ruta('search');
		$model->unsetAttributes();

		if (isset($_GET['Ruta']))
			$model->setAttributes($_GET['Ruta']);

		$this->render('admin', array(
			'model' => $model,
		));
        }

}