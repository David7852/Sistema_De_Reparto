<?php

class Datos_personalesController extends GxController {


	public function actionView($id) {if(Yii::app()->user->IsGuest)
                $this->redirect(array('site/index'));
            else
            {
		$this->render('view', array(
			'model' => $this->loadModel($id, 'Datos_personales'),
		));
        }}

	public function actionCreate() {if(Yii::app()->user->IsGuest)
                $this->redirect(array('site/index'));
            else
            {
		$model = new Datos_personales;


		if (isset($_POST['Datos_personales'])) {
			$model->setAttributes($_POST['Datos_personales']);

			if ($model->save()) {
				if (Yii::app()->getRequest()->getIsAjaxRequest())
					Yii::app()->end();
				else
					$this->redirect(array('view', 'id' => $model->id_user));
			}
		}

		$this->render('create', array( 'model' => $model));
        }}

	public function actionUpdate($id) 
        {if(Yii::app()->user->IsGuest)
                $this->redirect(array('site/index'));
            else
            {
		$model = $this->loadModel($id, 'Datos_personales');


		if (isset($_POST['Datos_personales'])) {
			$model->setAttributes($_POST['Datos_personales']);

			if ($model->save()) {
				$this->redirect(array('view', 'id' => $model->id_user));
			}
		}

		$this->render('update', array(
				'model' => $model,
				));
        }}
        	public function actionUpdateEmpresa($id) 
        {if(Yii::app()->user->IsGuest)
                $this->redirect(array('site/index'));
            else
            {
		$model = $this->loadModel($id, 'Datos_personales');


		if (isset($_POST['Datos_personales'])) {
			$model->setAttributes($_POST['Datos_personales']);

			if ($model->save()) {
				$this->redirect(array('view', 'id' => $model->id_user));
			}
		}

		$this->render('updateEmpresa', array(
				'model' => $model,
				));
        }}

	public function actionDelete($id) {if(Yii::app()->user->IsGuest)
                $this->redirect(array('site/index'));
            else
            {
		if (Yii::app()->getRequest()->getIsPostRequest()) {
			$this->loadModel($id, 'Datos_personales')->delete();

			if (!Yii::app()->getRequest()->getIsAjaxRequest())
				$this->redirect(array('admin'));
		} else
			throw new CHttpException(400, Yii::t('app', 'Your request is invalid.'));
        }}

	public function actionIndex() {if(Yii::app()->user->IsGuest)
                $this->redirect(array('site/index'));
            else
            {
		$dataProvider = new CActiveDataProvider('Datos_personales');
		$this->render('index', array(
			'dataProvider' => $dataProvider,
		));
        }}

	public function actionAdmin() {
            if(Yii::app()->user->IsGuest)
                $this->redirect(array('site/index'));
            else
            {
		$model = new Datos_personales('search');
		$model->unsetAttributes();

		if (isset($_GET['Datos_personales']))
			$model->setAttributes($_GET['Datos_personales']);

		$this->render('admin', array(
			'model' => $model,
		));
        }}

}