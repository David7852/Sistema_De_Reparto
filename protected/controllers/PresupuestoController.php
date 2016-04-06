<?php

class PresupuestoController extends GxController {


	public function actionView($id) {if(Yii::app()->user->IsGuest)
                $this->redirect(array('site/index'));
            else
            {
		$this->render('view', array(
			'model' => $this->loadModel($id, 'Presupuesto'),
		));
        }}

	public function actionCreate() 
        {if(Yii::app()->user->IsGuest)
                $this->redirect(array('site/index'));
            else
            {
            $Pe = new Presupuesto;
            $Pa = new Paquete;
            /*$R = new Ruta;//para creaciones mas complejas
            $Po = new Producto;
            $S =new Sede;*/

            date_default_timezone_set('America/Caracas');
            $datetimenow =date('d-m-Y H:i:s',time());
            $conexion = $conexion = Util::connect();

            if (isset($_POST['Presupuesto'])&&isset($_POST['Paquete'])) 
            {
                $Pe->setAttributes($_POST['Presupuesto']);
                $Pa->setAttributes($_POST['Paquete']);
                //$R->setAttributes($_POST['Ruta']);
                if($Pe->validate()&&$Pa->validate())
                {
                    if (Yii::app()->getRequest()->getIsAjaxRequest())
                        Yii::app()->end();
                    else
                    {
                        //adquirir id del solicitante
                        $query="SELECT `id_user` FROM `usuario` WHERE `nombre_usuario`='".Yii::app()->user->name."'";
                        $r=mysql_query($query,$conexion) or die (mysql_error());
                        $id=mysql_fetch_array($r);
                        $id=$id["id_user"];
                        //comprobar que no se repita
                        $query="SELECT `cod_presupuesto` FROM `presupuesto` WHERE `id_empresa`=".$id." and `fecha_solicitud`='".$datetimenow."'";
                        $r=mysql_query($query,$conexion) or die (mysql_error());
                        $n=  mysql_num_rows($r);
                        if($n==0)//si la empresa no ha registrado ya un presupuesto en iguales condiciones antes
                        {
                            //insertar presupuesto
                            $query="INSERT INTO `presupuesto`(`fecha_tope`, `fecha_solicitud`, `cod_ruta`, `id_empresa`, `Apendice`, `Numero_de_paquetes`) VALUES ('".$Pe->fecha_tope."','".$datetimenow."',".$Pe->cod_ruta.",".$id.",'',".$Pe->Numero_de_paquetes.")";
                            $r=mysql_query($query,$conexion) or die (mysql_error());
                            //obtener codigo presupuesto
                            $query="SELECT `cod_presupuesto` FROM `presupuesto` WHERE `id_empresa`=".$id." and `fecha_solicitud`='".$datetimenow."'";
                            $r=mysql_query($query,$conexion) or die (mysql_error());
                            $idPE=mysql_fetch_array($r);
                            $idPE=$idPE["cod_presupuesto"];                                    
                            //obtener codigo de producto
                            
                            //$query="SELECT `cod_producto` FROM `producto` WHERE `nombre`='".$Pa->codProducto."'";
                            //$r=mysql_query($query,$conexion) or die (mysql_error());
                            //$cod=mysql_fetch_array($r);
                            //$cod=$cod["cod_producto"];  
                            
                            $cod=$Pa->cod_producto;
                            $query="INSERT INTO `paquete`(`peso`, `cod_producto`, `cod_presupuesto`, `cod_encargo`, `alto`, `ancho`, `descripcion`) VALUES ";
                            $value="(".$Pa->peso.",".$cod.",".$idPE.",null,".$Pa->alto.",".$Pa->ancho.",'".$Pa->descripcion."')";
                            for($i=1;$i<$Pe->Numero_de_paquetes;$i++)
                            {
                                 $value=$value.",(".$Pa->peso.",".$cod.",".$idPE.",null,".$Pa->alto.",".$Pa->ancho.",'".$Pa->descripcion."')";
                                
                            }
                            $query=$query.$value;
                            $r=mysql_query($query,$conexion) or die (mysql_error());
                            $this->redirect(array('view', 'id' => $idPE));
                        }else
                            Yii::app()->user->setFlash('error','Error');
                    }	
                }	
            }else
                {
                    Yii::app()->user->setFlash('error','Error');
                }
            $this->render('create', array( 'Pe' => $Pe,'Pa'=>$Pa,/*'R'=>$R*/));
        }}
        
        public function actionAprobar($id) 
        {if(Yii::app()->user->IsGuest)
                $this->redirect(array('site/index'));
            else
            {
            $model = $this->loadModel($id, 'Presupuesto');
            if (isset($_POST['Presupuesto'])) 
                {
			$model->setAttributes($_POST['Presupuesto']);
                        
			if ($model->save()) 
                        {
                            $conexion = mysql_connect("localhost", "root", "") or die (mysql_error());
                            mysql_select_db("sysrdb", $conexion) or die (mysql_error());
                            
                            //setear titulo obligatorio de apendice
                            $query="SELECT `fecha_tope`,`Apendice` FROM `presupuesto` WHERE `cod_presupuesto`=".$id;
                            $r=mysql_query($query,$conexion) or die (mysql_error());
                            $r=mysql_fetch_array($r);
                            $ap=$r["Apendice"];
                            $date=$r["fecha_tope"];
                            if($ap!=null)
                            {
                                $ap="*Su Presupuesto Ha Sido Aprobado* \r\n".$ap;
                            }else
                            {
                                $ap="*Su Presupuesto Ha Sido Aprobado* ";
                            }
                            $query="UPDATE `presupuesto` SET `Apendice`='".$ap."' WHERE `cod_presupuesto`=".$id;
                            $r=mysql_query($query,$conexion) or die (mysql_error());
                            
                            //obtener id de empresa del presupuesto
                            $query="SELECT `id_empresa` FROM `presupuesto` WHERE `cod_presupuesto`=".$id;
                            $r=mysql_query($query,$conexion) or die (mysql_error());
                            $idE=mysql_fetch_array($r);
                            $idE=$idE["id_empresa"];
                            //obtener id del operador del usuario actual
                            $query="SELECT `id_user` FROM `usuario` WHERE `nombre_usuario`='".Yii::app()->user->name."'";
                            $r=mysql_query($query,$conexion) or die (mysql_error());
                            $idO=mysql_fetch_array($r);
                            $idO=$idO["id_user"];
                            //crear envio
                            $query="INSERT INTO `envio`(`estado`, `id_empresa`, `id_operador`, `cod_presupuesto`, `fecha`) VALUES ('Pendiente',".$idE.",".$idO.",".$id.",'".$date."')";
                            $r=mysql_query($query,$conexion) or die (mysql_error());
                            //seleccionar id del envio recien creado
                            $query="SELECT `cod_envio` FROM `envio` WHERE `cod_presupuesto`=".$id;
                            $r=mysql_query($query,$conexion) or die (mysql_error());
                            $i=mysql_fetch_array($r);
                            $i=$i["cod_envio"];
                            //rediriguir a la vista de dicho envio
                            $this->redirect(array('envio/view', 'id'=>$i));
			}
		}
            
            $this->render('aprobar', array( 'model' => $model));
        }}
        public function actionNegar($id) 
        {if(Yii::app()->user->IsGuest)
                $this->redirect(array('site/index'));
            else
            {
            $model = $this->loadModel($id, 'Presupuesto');
            if (isset($_POST['Presupuesto'])) 
                {
			$model->setAttributes($_POST['Presupuesto']);

			if ($model->save()) 
                        {
                                $conexion = mysql_connect("localhost", "root", "") or die (mysql_error());
                                mysql_select_db("sysrdb", $conexion) or die (mysql_error());

                                //setear titulo obligatorio de apendice
                                $query="SELECT `Apendice` FROM `presupuesto` WHERE `cod_presupuesto`=".$id;
                                $r=mysql_query($query,$conexion) or die (mysql_error());
                                $ap=mysql_fetch_array($r);
                                $ap=$ap["Apendice"];
                                if($ap!=null)
                                {
                                    $ap="*Su Presupuesto Ha Sido Rechazado* \r\n".$ap;
                                }else
                                {
                                    $ap="*Su Presupuesto Ha Sido Rechazado* ";
                                }
                                $query="UPDATE `presupuesto` SET `Apendice`='".$ap."' WHERE `cod_presupuesto`=".$id;
                                $r=mysql_query($query,$conexion) or die (mysql_error());
                                
                                $query="DELETE FROM `paquete` WHERE `cod_presupuesto`=".$id;
                                $r=mysql_query($query,$conexion) or die (mysql_error());
                                
                                
				$this->redirect(array('view', 'id' => $model->cod_presupuesto));
			}
		}            
            $this->render('negar', array( 'model' => $model));
        }}
        

	public function actionUpdate($id) {if(Yii::app()->user->IsGuest)
                $this->redirect(array('site/index'));
            else
            {
		$model = $this->loadModel($id, 'Presupuesto');


		if (isset($_POST['Presupuesto'])) {
			$model->setAttributes($_POST['Presupuesto']);

			if ($model->save()) {
				$this->redirect(array('view', 'id' => $model->cod_presupuesto));
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
			$this->loadModel($id, 'Presupuesto')->delete();

			if (!Yii::app()->getRequest()->getIsAjaxRequest())
				$this->redirect(array('admin'));
		} else
			throw new CHttpException(400, Yii::t('app', 'Your request is invalid.'));
        }}

	public function actionIndex() {if(Yii::app()->user->IsGuest)
                $this->redirect(array('site/index'));
            else
            {
		$dataProvider = new CActiveDataProvider('Presupuesto');
		$this->render('index', array(
			'dataProvider' => $dataProvider,
		));
        }}

	public function actionAdmin() {if(Yii::app()->user->IsGuest)
                $this->redirect(array('site/index'));
            else
            {
		$model = new Presupuesto('search');
		$model->unsetAttributes();

		if (isset($_GET['Presupuesto']))
			$model->setAttributes($_GET['Presupuesto']);

		$this->render('admin', array(
			'model' => $model,
		));
        }}
        
        public function actionReport() {if(Yii::app()->user->IsGuest)
                $this->redirect(array('site/index'));
            else
            {
		$model = new Presupuesto('search');
		$model->unsetAttributes();

		if (isset($_GET['Presupuesto']))
			$model->setAttributes($_GET['Presupuesto']);

		$this->render('report', array(
			'model' => $model,
		));
        }}

}