<?php

class SedeController extends GxController {


	public function actionView($id) {if(Yii::app()->user->IsGuest)
                $this->redirect(array('site/index'));
            else
            {
		$this->render('view', array(
			'model' => $this->loadModel($id, 'Sede'),
		));
        }}

	public function actionCreate() 
        {if(Yii::app()->user->IsGuest)
                $this->redirect(array('site/index'));
            else
            {
		$model = new Sede;


		if (isset($_POST['Sede'])) {
			$model->setAttributes($_POST['Sede']);

			if ($model->save()) {
				if (Yii::app()->getRequest()->getIsAjaxRequest())
					Yii::app()->end();
				else
                                {
                                    if(Util::isEmpresa(Yii::app()->user->name))
                                    {
                                        $conexion = $conexion = Util::connect();
                                        $query="UPDATE `sede` SET `id_empresa`=".Util::getid(Yii::app()->user->name)." WHERE `cod_sede`=".$model->cod_sede;
                                        $r=mysql_query($query,$conexion) or die (mysql_error());
                                    }
					$this->redirect(array('view', 'id' => $model->cod_sede));
                                }
			}
		}

		$this->render('create', array( 'model' => $model));
        }
        
                        }

	public function actionUpdate($id) {if(Yii::app()->user->IsGuest)
                $this->redirect(array('site/index'));
            else
            {
		$model = $this->loadModel($id, 'Sede');


		if (isset($_POST['Sede'])) {
			$model->setAttributes($_POST['Sede']);

			if ($model->save()) {
				$this->redirect(array('view', 'id' => $model->cod_sede));
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
			$this->loadModel($id, 'Sede')->delete();

			if (!Yii::app()->getRequest()->getIsAjaxRequest())
				$this->redirect(array('admin'));
		} else
			throw new CHttpException(400, Yii::t('app', 'Your request is invalid.'));
        }}

	public function actionIndex() {if(Yii::app()->user->IsGuest)
                $this->redirect(array('site/index'));
            else
            {
		$dataProvider = new CActiveDataProvider('Sede');
		$this->render('index', array(
			'dataProvider' => $dataProvider,
		));
        }}

	public function actionAdmin() {
		$model = new Sede('search');
		$model->unsetAttributes();

		if (isset($_GET['Sede']))
			$model->setAttributes($_GET['Sede']);

		$this->render('admin', array(
			'model' => $model,
		));
        }

}