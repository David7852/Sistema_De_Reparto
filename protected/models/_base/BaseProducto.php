<?php

/**
 * This is the model base class for the table "producto".
 * DO NOT MODIFY THIS FILE! It is automatically generated by giix.
 * If any changes are necessary, you must set or override the required
 * property or method in class "Producto".
 *
 * Columns in table "producto" available as properties of the model,
 * followed by relations of table "producto" available as properties of the model.
 *
 * @property integer $cod_producto
 * @property integer $fragil
 * @property integer $refrigerado
 * @property integer $vivo
 * @property integer $peligroso
 * @property string $descripcion
 * @property string $nombre
 * @property integer $Id_empresa
 *
 * @property Paquete[] $paquetes
 * @property Empresa $idEmpresa
 */
abstract class BaseProducto extends GxActiveRecord {

	public static function model($className=__CLASS__) {
		return parent::model($className);
	}

	public function tableName() {
		return 'producto';
	}

	public static function label($n = 1) {
		return Yii::t('app', 'Producto|Productos', $n);
	}

	public static function representingColumn() {
		return 'nombre';
	}

	public function rules() {
		return array(
			array('fragil, refrigerado, vivo, peligroso, nombre', 'required'),
			array('fragil, refrigerado, vivo, peligroso, Id_empresa', 'numerical', 'integerOnly'=>true),
			array('descripcion', 'length', 'max'=>500),
			array('nombre', 'length', 'max'=>200),
			array('descripcion, Id_empresa', 'default', 'setOnEmpty' => true, 'value' => null),
			array('cod_producto, fragil, refrigerado, vivo, peligroso, descripcion, nombre, Id_empresa', 'safe', 'on'=>'search'),
		);
	}

	public function relations() {
		return array(
			'paquetes' => array(self::HAS_MANY, 'Paquete', 'cod_producto'),
			'idEmpresa' => array(self::BELONGS_TO, 'Empresa', 'Id_empresa'),
		);
	}

	public function pivotModels() {
		return array(
		);
	}

	public function attributeLabels() {
		return array(
			'cod_producto' => Yii::t('app', 'Cod Producto'),
			'fragil' => Yii::t('app', 'Fragil'),
			'refrigerado' => Yii::t('app', 'Refrigerado'),
			'vivo' => Yii::t('app', 'Vivo'),
			'peligroso' => Yii::t('app', 'Peligroso'),
			'descripcion' => Yii::t('app', 'Descripcion'),
			'nombre' => Yii::t('app', 'Nombre'),
			'Id_empresa' => null,
			'paquetes' => null,
			'idEmpresa' => null,
		);
	}

	public function search() {
		$criteria = new CDbCriteria;

                $conexion = $conexion = Util::connect();
                if(Util::isEmpresa(Yii::app()->user->name))
                {
                    $query="SELECT `cod_producto` FROM `producto` WHERE `Id_empresa` is null or `Id_empresa`=".Util::getid(Yii::app()->user->name);
                    $r=mysql_query($query,$conexion) or die (mysql_error());
                    
                    $ids=array();//este arreglo sera igual a los ids seleccionados
                    while($arids=mysql_fetch_array($r,MYSQL_ASSOC))
                        foreach($arids as $i)
                            array_push($ids,$i);
                        //$HoraSalida=datetime('m/d/Y H:i',  strtotime($model->HoraSalida));//Linea Error
                    if(count($ids)>0)//si hay resultados, los muestra
                        $criteria->compare('cod_producto',  $ids, true);
                    else//si no, no muestra nada (nunca un id sera igual a -1)
                        $criteria->compare('cod_producto',  -1, false);
                }
                mysql_close($conexion);
                
		$criteria->compare('cod_producto', $this->cod_producto);
		$criteria->compare('fragil', $this->fragil);
		$criteria->compare('refrigerado', $this->refrigerado);
		$criteria->compare('vivo', $this->vivo);
		$criteria->compare('peligroso', $this->peligroso);
		$criteria->compare('descripcion', $this->descripcion, true);
		$criteria->compare('nombre', $this->nombre, true);
		$criteria->compare('Id_empresa', $this->Id_empresa);

		return new CActiveDataProvider($this, array(
			'criteria' => $criteria,
		));
	}
}