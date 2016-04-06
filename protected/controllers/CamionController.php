<?php

class CamionController extends GxController {


	public function actionView($id) {if(Yii::app()->user->IsGuest)
                $this->redirect(array('site/index'));
            else
            {
		$this->render('view', array(
			'model' => $this->loadModel($id, 'Camion'),
		));
        }}

	public function actionCreate() {if(Yii::app()->user->IsGuest)
                $this->redirect(array('site/index'));
            else
            {
		$model = new Camion;
                $C=new Chofer;
                $U=new Usuario;

		if (isset($_POST['Camion'])) {
			$model->setAttributes($_POST['Camion']);

			if ($model->save()) {
				if (Yii::app()->getRequest()->getIsAjaxRequest())
					Yii::app()->end();
				else
					$this->redirect(array('view', 'id' => $model->placa));
			}
		}

		$this->render('create', array(
                    'model' => $model,
                    'C'=>$C,'U'=>$U
                        )
                        );
        }}

	public function actionUpdate($id) {if(Yii::app()->user->IsGuest)
                $this->redirect(array('site/index'));
            else
            {
		$model = $this->loadModel($id, 'Camion');


		if (isset($_POST['Camion'])) {
			$model->setAttributes($_POST['Camion']);

			if ($model->save()) {
				$this->redirect(array('view', 'id' => $model->placa));
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
			$this->loadModel($id, 'Camion')->delete();

			if (!Yii::app()->getRequest()->getIsAjaxRequest())
				$this->redirect(array('admin'));
		} else
			throw new CHttpException(400, Yii::t('app', 'Your request is invalid.'));
        }}

	public function actionIndex() {if(Yii::app()->user->IsGuest)
                $this->redirect(array('site/index'));
            else
            {
		$dataProvider = new CActiveDataProvider('Camion');
		$this->render('index', array(
			'dataProvider' => $dataProvider,
		));
        }}

	public function actionAdmin() {if(Yii::app()->user->IsGuest)
                $this->redirect(array('site/index'));
            else
            {
		$model = new Camion('search');
		$model->unsetAttributes();

		if (isset($_GET['Camion']))
			$model->setAttributes($_GET['Camion']);

		$this->render('admin', array(
			'model' => $model,
		));
        }}

}