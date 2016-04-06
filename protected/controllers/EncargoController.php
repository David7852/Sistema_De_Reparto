<?php

class EncargoController extends GxController {


	public function actionView($id) {if(Yii::app()->user->IsGuest)
                $this->redirect(array('site/index'));
            else
            {
		$this->render('view', array(
			'model' => $this->loadModel($id, 'Encargo'),
		));
        }}

	public function actionCreate() 
        {if(Yii::app()->user->IsGuest)
                $this->redirect(array('site/index'));
            else
            {
		$model = new Encargo;
                $PA=new Paquete;

		if (isset($_POST['Encargo'])) {
			$model->setAttributes($_POST['Encargo']);

			if ($model->save()) {
				if (Yii::app()->getRequest()->getIsAjaxRequest())
					Yii::app()->end();
				else
					$this->redirect(array('view', 'id' => $model->cod_encargo));
			}
		}

		$this->render('create', array( 'model' => $model,'PA'=>$PA,));
        }}

	public function actionUpdate($id) //idencargo
        {if(Yii::app()->user->IsGuest)
                $this->redirect(array('site/index'));
            else
            {
                    $this->redirect(array('envio/encargarsub', 'id' => $id));
            }
        }

	public function actionDelete($id) {if(Yii::app()->user->IsGuest)
                $this->redirect(array('site/index'));
            else
            {
		if (Yii::app()->getRequest()->getIsPostRequest()) {
			$this->loadModel($id, 'Encargo')->delete();

			if (!Yii::app()->getRequest()->getIsAjaxRequest())
				$this->redirect(array('admin'));
		} else
			throw new CHttpException(400, Yii::t('app', 'Your request is invalid.'));
        }}
        
         public function actionCompletar($id) 
        {if(Yii::app()->user->IsGuest)
                $this->redirect(array('site/index'));
            else
            {
            $model = $this->loadModel($id, 'Encargo');
            if (isset($_POST['Encargo'])) 
                {
                    $model->setAttributes($_POST['Encargo']);
                    $conexion = $conexion = Util::connect();
                    $query="UPDATE `envio` SET `estado`='Completado' WHERE `cod_envio`=".$model->cod_envio;
                    $r=mysql_query($query,$conexion) or die (mysql_error());
                    
                    $this->redirect(array('site/index'));
		}
            $this->render('completar', array( 'model' => $model));
        }}

        
        
	public function actionIndex() {if(Yii::app()->user->IsGuest)
                $this->redirect(array('site/index'));
            else
            {
		$dataProvider = new CActiveDataProvider('Encargo');
		$this->render('index', array(
			'dataProvider' => $dataProvider,
		));
        }}

	public function actionAdmin() {if(Yii::app()->user->IsGuest)
                $this->redirect(array('site/index'));
            else
            {
		$model = new Encargo('search');
		$model->unsetAttributes();

		if (isset($_GET['Encargo']))
			$model->setAttributes($_GET['Encargo']);

		$this->render('admin', array(
			'model' => $model,
		));
        }}
        public function actionReport() {if(Yii::app()->user->IsGuest)
                $this->redirect(array('site/index'));
            else
            {
		$model = new Encargo('search');
		$model->unsetAttributes();

		if (isset($_GET['Encargo']))
			$model->setAttributes($_GET['Encargo']);

		$this->render('report', array(
			'model' => $model,
		));
        }}

}