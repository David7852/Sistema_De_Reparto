<?php

class ConfiguracionController extends GxController {


	public function actionView($id) {
		$this->render('view', array(
			'model' => $this->loadModel($id, 'Configuracion'),
		));
	}

	public function actionCreate() {
		$model = new Configuracion;


		if (isset($_POST['Configuracion'])) {
			$model->setAttributes($_POST['Configuracion']);

			if ($model->save()) {
				if (Yii::app()->getRequest()->getIsAjaxRequest())
					Yii::app()->end();
				else
					$this->redirect(array('view', 'id' => $model->numero));
			}
		}

		$this->render('create', array( 'model' => $model));
	}

	public function actionUpdate($id) {
		$model = $this->loadModel($id, 'Configuracion');


		if (isset($_POST['Configuracion'])) {
			$model->setAttributes($_POST['Configuracion']);

			if ($model->save()) {
				$this->redirect(array('view', 'id' => $model->numero));
			}
		}

		$this->render('update', array(
				'model' => $model,
				));
	}

	public function actionDelete($id) {
		if (Yii::app()->getRequest()->getIsPostRequest()) {
			$this->loadModel($id, 'Configuracion')->delete();

			if (!Yii::app()->getRequest()->getIsAjaxRequest())
				$this->redirect(array('admin'));
		} else
			throw new CHttpException(400, Yii::t('app', 'Your request is invalid.'));
	}

	public function actionIndex() {
		$dataProvider = new CActiveDataProvider('Configuracion');
		$this->render('index', array(
			'dataProvider' => $dataProvider,
		));
	}

	public function actionAdmin() {
		$model = new Configuracion('search');
		$model->unsetAttributes();

		if (isset($_GET['Configuracion']))
			$model->setAttributes($_GET['Configuracion']);

		$this->render('admin', array(
			'model' => $model,
		));
	}

}