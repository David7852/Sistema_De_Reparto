<?php

class EnvioController extends GxController {
public $c=0;

	public function actionView($id) {if(Yii::app()->user->IsGuest)
                $this->redirect(array('site/index'));
            else
            {
		$this->render('view', array(
			'model' => $this->loadModel($id, 'Envio'),
		));
        }}

	public function actionCreate() {if(Yii::app()->user->IsGuest)
                $this->redirect(array('site/index'));
            else
            {
		$model = new Envio;


		if (isset($_POST['Envio'])) {
			$model->setAttributes($_POST['Envio']);

			if ($model->save()) {
				if (Yii::app()->getRequest()->getIsAjaxRequest())
					Yii::app()->end();
				else
					$this->redirect(array('view', 'id' => $model->cod_envio));
			}
		}

		$this->render('create', array( 'model' => $model));
        }}

        
        
        
        
        public function actionAprobar($id) 
        {if(Yii::app()->user->IsGuest)
                $this->redirect(array('site/index'));
            else
            {
            $model = $this->loadModel($id, 'Envio');
            if (isset($_POST['Envio'])) 
                {
                    $model->setAttributes($_POST['Envio']);
                    $conexion = $conexion = Util::connect();
                    $query="UPDATE `envio` SET `estado`='Aprobado' WHERE `cod_envio`=".$id;
                    $r=mysql_query($query,$conexion) or die (mysql_error());
                    
                    $this->redirect(array('view', 'id' => $model->cod_envio));
		}
            $this->render('aprobar', array( 'model' => $model));
        }}
        
        
        public function actionNegar($id) 
        {if(Yii::app()->user->IsGuest)
                $this->redirect(array('site/index'));
            else
            {
            $model = $this->loadModel($id, 'Envio');
            if (isset($_POST['Envio'])) 
                {
                    $model->setAttributes($_POST['Envio']);
                    $conexion = $conexion = Util::connect();
                    $query="UPDATE `envio` SET `estado`='Negado' WHERE `cod_envio`=".$id;
                    $r=mysql_query($query,$conexion) or die (mysql_error());
                    
                    $this->redirect(array('view', 'id' => $model->cod_envio));
		}
            $this->render('negar', array( 'model' => $model));
        }}
        
        public function actionCancelar($id)
        {if(Yii::app()->user->IsGuest)
                $this->redirect(array('site/index'));
            else
            {
            $model = $this->loadModel($id, 'Envio');
            if (isset($_POST['Envio'])) 
                {
                    $model->setAttributes($_POST['Envio']);
                    $conexion = $conexion = Util::connect();
                    $query="UPDATE `envio` SET `estado`='Cancelado' WHERE `cod_envio`=".$id;
                    $r=mysql_query($query,$conexion) or die (mysql_error());
                    
                    $this->redirect(array('view', 'id' => $model->cod_envio));
		}
            $this->render('cancelar', array( 'model' => $model));
        }}
        
        public function actionEncargar($id)
        {
            if(Yii::app()->user->IsGuest)
                $this->redirect(array('site/index'));
            else
            {
                $EN=new Envio;
                $model = new Encargo;
                $PA=new Paquete;
                
                    $model->cod_envio=$id;
                    $model->save(false);
                    $this->redirect(array('encargarsub', 'id' => $model->cod_encargo));
                
		$this->render('encargar', array( 'model' => $model,'PA'=>$PA,'EN'=>$EN));
            }
        }
        public function actionEncargarsub($id)
        {
            if(Yii::app()->user->IsGuest)
                $this->redirect(array('site/index'));
            else
            {
                $conexion = Util::connect();
                $EN=new Envio;
                $model = new Encargo;
                $PA=new Paquete;
                if (isset($_POST['Encargo']))
                {
                    $model->setAttributes($_POST['Encargo']);
                    $query="UPDATE `encargo` SET `id_chofer`=".$model->id_chofer.",`placa`='".$model->placa."',`fecha_inicio`='".$model->fecha_inicio."' WHERE `cod_encargo`=".$id;
                    $r=mysql_query($query,$conexion) or die (mysql_error());
                }
		$this->render('encargar', array( 'model' => $model,'PA'=>$PA,'EN'=>$EN));
            }
        }
        
        
	public function actionUpdate($id) 
        {if(Yii::app()->user->IsGuest)
                $this->redirect(array('site/index'));
            else
            {
		$model = $this->loadModel($id, 'Envio');


		if (isset($_POST['Envio'])) {
			$model->setAttributes($_POST['Envio']);

			if ($model->save()) {
				$this->redirect(array('view', 'id' => $model->cod_envio));
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
			$this->loadModel($id, 'Envio')->delete();

			if (!Yii::app()->getRequest()->getIsAjaxRequest())
				$this->redirect(array('admin'));
		} else
			throw new CHttpException(400, Yii::t('app', 'Your request is invalid.'));
        }}

	public function actionIndex() {if(Yii::app()->user->IsGuest)
                $this->redirect(array('site/index'));
            else
            {
		$dataProvider = new CActiveDataProvider('Envio');
		$this->render('index', array(
			'dataProvider' => $dataProvider,
		));
        }}

	public function actionAdmin() {if(Yii::app()->user->IsGuest)
                $this->redirect(array('site/index'));
            else
            {
            
		$model = new Envio('search');
		$model->unsetAttributes();

		if (isset($_GET['Envio']))
			$model->setAttributes($_GET['Envio']);

		$this->render('admin', array(
			'model' => $model,
		));
        }}
        public function actionReport() {if(Yii::app()->user->IsGuest)
                $this->redirect(array('site/index'));
            else
            {
            
		$model = new Envio('search');
		$model->unsetAttributes();

		if (isset($_GET['Envio']))
			$model->setAttributes($_GET['Envio']);

		$this->render('report', array(
			'model' => $model,
		));
        }}

}