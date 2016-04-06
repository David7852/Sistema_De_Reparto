<?php

class ReporteController extends GxController {


	public function actionView($id) {if(Yii::app()->user->IsGuest)
                $this->redirect(array('site/index'));
            else
            {
		$this->render('view', array(
			'model' => $this->loadModel($id, 'Reporte'),
		));
        }}

	public function actionCreate() {if(Yii::app()->user->IsGuest)
                $this->redirect(array('site/index'));
            else
            {
		$model = new Reporte;


		if (isset($_POST['Reporte'])) {
			$model->setAttributes($_POST['Reporte']);

			if ($model->save()) {
				if (Yii::app()->getRequest()->getIsAjaxRequest())
					Yii::app()->end();
				else
					$this->redirect(array('view', 'id' => $model->fecha_inicio));
			}
		}

		$this->render('create', array( 'model' => $model));
        }}

	public function actionUpdate($id) {if(Yii::app()->user->IsGuest)
                $this->redirect(array('site/index'));
            else
            {
		$model = $this->loadModel($id, 'Reporte');


		if (isset($_POST['Reporte'])) {
			$model->setAttributes($_POST['Reporte']);

			if ($model->save()) {
				$this->redirect(array('view', 'id' => $model->fecha_inicio));
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
			$this->loadModel($id, 'Reporte')->delete();

			if (!Yii::app()->getRequest()->getIsAjaxRequest())
				$this->redirect(array('admin'));
		} else
			throw new CHttpException(400, Yii::t('app', 'Your request is invalid.'));
        }}

	public function actionIndex() {if(Yii::app()->user->IsGuest)
                $this->redirect(array('site/index'));
            else
            {
		$dataProvider = new CActiveDataProvider('Reporte');
		$this->render('index', array(
			'dataProvider' => $dataProvider,
		));
        }}

	public function actionAdmin() {if(Yii::app()->user->IsGuest)
                $this->redirect(array('site/index'));
            else
            {
		$model = new Reporte('search');
		$model->unsetAttributes();

		if (isset($_GET['Reporte']))
			$model->setAttributes($_GET['Reporte']);

		$this->render('admin', array(
			'model' => $model,
		));
        }}

}