<?php

class PaqueteController extends GxController {


	public function actionView($id) {
            if(Yii::app()->user->IsGuest)
                $this->redirect(array('site/index'));
            else{
		$this->render('view', array(
			'model' => $this->loadModel($id, 'Paquete'),
            ));}
	}

	public function actionCreate() {
            if(Yii::app()->user->IsGuest)
                $this->redirect(array('site/index'));
            else
            {
		$model = new Paquete;


		if (isset($_POST['Paquete'])) {
			$model->setAttributes($_POST['Paquete']);

			if ($model->save()) {
				if (Yii::app()->getRequest()->getIsAjaxRequest())
					Yii::app()->end();
				else
					$this->redirect(array('view', 'id' => $model->cod_paquete));
			}
		}

		$this->render('create', array( 'model' => $model));
            }
	}

	public function actionUpdate($id) {
            if(Yii::app()->user->IsGuest)
                $this->redirect(array('site/index'));
            else
            {
		$model = $this->loadModel($id, 'Paquete');


		if (isset($_POST['Paquete'])) {
			$model->setAttributes($_POST['Paquete']);

			if ($model->save()) {
				$this->redirect(array('view', 'id' => $model->cod_paquete));
			}
		}

		$this->render('update', array(
				'model' => $model,
				));
            }
	}

	public function actionDelete($id,$Y) {//Y id de encargo actual +1. //si el encargo ya esta asignado, desasignarlo
            if(Yii::app()->user->IsGuest)
                $this->redirect(array('site/index'));
            else
            {
                
		if (Yii::app()->getRequest()->getIsPostRequest()) 
                {
                    $conexion =Util::connect();
                    $query="SELECT `cod_encargo` FROM `paquete` WHERE `cod_paquete`=".$id;
                    $r=mysql_query($query,$conexion) or die (mysql_error());
                    $cod=mysql_fetch_array($r);
                    $cod=$cod["cod_encargo"];
                    if($cod==null)//se puede setear
                    {
                        $query="UPDATE `paquete` SET `cod_encargo`=".($Y-1)." WHERE `cod_paquete`=".$id;
                        $r=mysql_query($query,$conexion) or die (mysql_error());
                    }
                        else//se desetea
                        {
                            $query="UPDATE `paquete` SET `cod_encargo`=null WHERE `cod_paquete`=".$id;
                            $r=mysql_query($query,$conexion) or die (mysql_error());
                        }
			if (!Yii::app()->getRequest()->getIsAjaxRequest())
				$this->redirect(array('admin'));
		} else
			throw new CHttpException(400, Yii::t('app', 'Your request is invalid.'));
            }
	}

	public function actionIndex() 
                {
            if(Yii::app()->user->IsGuest)
                $this->redirect(array('site/index'));
            else
            {
		$dataProvider = new CActiveDataProvider('Paquete');
		$this->render('index', array(
			'dataProvider' => $dataProvider,
		));
                }
                
            }

	public function actionAdmin() {
            if(Yii::app()->user->IsGuest)
                $this->redirect(array('site/index'));
            else
            {
		$model = new Paquete('search');
		$model->unsetAttributes();

		if (isset($_GET['Paquete']))
			$model->setAttributes($_GET['Paquete']);

		$this->render('admin', array(
			'model' => $model,
            ));}
	}

}