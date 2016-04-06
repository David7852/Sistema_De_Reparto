<?php

class PagoController extends GxController {


	public function actionView($id) {
            if(Yii::app()->user->IsGuest)
                $this->redirect(array('site/index'));
            else
            {
		$this->render('view', array(
			'model' => $this->loadModel($id, 'Pago'),
		));
        }}

	public function actionCreate() {
            if(Yii::app()->user->IsGuest)
                $this->redirect(array('site/index'));
            else
            {
		$model = new Pago;
		if (isset($_POST['Pago'])) 
                {
			$model->setAttributes($_POST['Pago']);

			if ($model->save()) 
                        {
                            if (Yii::app()->getRequest()->getIsAjaxRequest())
                                    Yii::app()->end();
                            else
                            {   
                                $datetimenow =date('d-m-Y H:i:s',time());
                                $model->fecha_realizacion=$datetimenow;
                                $model->id_empresa=  Util::getid(Yii::app()->user->name);
                                $model->save(false);
                                $this->redirect(array('view', 'id' => $model->cod_pago));
                            }
			}
		}

		$this->render('create', array( 'model' => $model));
        }}
        public function actionCreatea($id) //id envio auto
            {if(Yii::app()->user->IsGuest)
                $this->redirect(array('site/index'));
            else
            {
                    $model = new Pago;
                    if (isset($_POST['Pago'])) 
                    {
                            $model->setAttributes($_POST['Pago']);
                            if ($model->save()) 
                            {
                                    if (Yii::app()->getRequest()->getIsAjaxRequest())
                                            Yii::app()->end();
                                    else
                                    {
                                        date_default_timezone_set('America/Caracas');
                                        $datetimenow =date('d-m-Y H:i:s',time());
                                        $conexion = Util::connect();
                                        
                                        $query="SELECT * FROM `pago` WHERE `cod_boucher`=".$model->cod_boucher;
                                        $r=mysql_query($query,$conexion) or die (mysql_error());
                                        $n=  mysql_num_rows($r);
                                        if($n>1)//si es mayor a uno, ya existia un pago con este boucher, debe borrarse.
                                        {
                                            $model->delete();
                                            Yii::app()->user->setFlash('error','Error');
                                        }else
                                        {
                                            $query="UPDATE `pago` SET `id_empresa`=".Util::getid(Yii::app()->user->name).",`fecha_realizacion`='".$datetimenow."',`cod_envio`=".$id." WHERE `cod_pago`=".$model->cod_pago;
                                            $r=mysql_query($query,$conexion) or die (mysql_error());
                                            $this->redirect(array('view', 'id' => $model->cod_pago));
                                        }
                                    }
                            }
                    }

                    $this->render('createa', array( 'model' => $model));
            }}
            
	public function actionUpdate($id) {if(Yii::app()->user->IsGuest)
                $this->redirect(array('site/index'));
            else
            {
		$model = $this->loadModel($id, 'Pago');


		if (isset($_POST['Pago'])) {
			$model->setAttributes($_POST['Pago']);

			if ($model->save()) {
				$this->redirect(array('view', 'id' => $model->cod_pago));
			}
		}

		$this->render('update', array(
				'model' => $model,
				));
        }}

	public function actionDelete($id) {
            if(Yii::app()->user->IsGuest)
                $this->redirect(array('site/index'));
            else
            {
		if (Yii::app()->getRequest()->getIsPostRequest()) {
			$this->loadModel($id, 'Pago')->delete();

			if (!Yii::app()->getRequest()->getIsAjaxRequest())
				$this->redirect(array('admin'));
		} else
			throw new CHttpException(400, Yii::t('app', 'Your request is invalid.'));
        }}

	public function actionIndex() {
            if(Yii::app()->user->IsGuest)
                $this->redirect(array('site/index'));
            else
            {
		$dataProvider = new CActiveDataProvider('Pago');
		$this->render('index', array(
			'dataProvider' => $dataProvider,
		));
        }}

	public function actionAdmin() {
            if(Yii::app()->user->IsGuest)
                $this->redirect(array('site/index'));
            else
            {
		$model = new Pago('search');
		$model->unsetAttributes();

		if (isset($_GET['Pago']))
			$model->setAttributes($_GET['Pago']);

		$this->render('admin', array(
			'model' => $model,
		));
        }}
        public function actionReport() {
            if(Yii::app()->user->IsGuest)
                $this->redirect(array('site/index'));
            else
            {
		$model = new Pago('search');
		$model->unsetAttributes();

		if (isset($_GET['Pago']))
			$model->setAttributes($_GET['Pago']);

		$this->render('report', array(
			'model' => $model,
		));
        }}

}