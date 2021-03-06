<?php

/**
 * This is the model base class for the table "chofer".
 * DO NOT MODIFY THIS FILE! It is automatically generated by giix.
 * If any changes are necessary, you must set or override the required
 * property or method in class "Chofer".
 *
 * Columns in table "chofer" available as properties of the model,
 * followed by relations of table "chofer" available as properties of the model.
 *
 * @property integer $id_user
 * @property integer $numero_licencia
 *
 * @property Camion[] $camions
 * @property Usuario $idUser
 * @property Encargo[] $encargos
 */
abstract class BaseChofer extends GxActiveRecord {

	public static function model($className=__CLASS__) {
		return parent::model($className);
	}

	public function tableName() {
		return 'chofer';
	}

	public static function label($n = 1) {
		return Yii::t('app', 'Chofer|Choferes', $n);
	}

	public static function representingColumn() 
        {
		return 'id_user';
	}
        
        public function getnombre()
        {
            return $this->fkdatosPersonales->nombre;
        }
	public function rules() {
		return array(
			array('numero_licencia, fecha_fin_licencia', 'required'),
			array('id_user, numero_licencia', 'numerical', 'integerOnly'=>true),
                        array('fecha_fin_licencia', 'length', 'max'=>50),
			array('id_user, numero_licencia, fecha_fin_licencia', 'safe', 'on'=>'search'),
                        array('datosPersonales', 'safe'),
		);
	}

	public function relations() {
		return array(
			'camions' => array(self::HAS_MANY, 'Camion', 'id_chofer'),
			'idUser' => array(self::BELONGS_TO, 'Usuario', 'id_user'),
			'encargos' => array(self::HAS_MANY, 'Encargo', 'id_chofer'),
                        'fkdatosPersonales' => array(self::HAS_ONE, 'Datos_Personales', 'id_user'),
		);
	}

	public function pivotModels() 
        {
		return array(
		);
	}

	public function attributeLabels() {
		return array(
			'id_user' => null,
			'numero_licencia' => Yii::t('app', 'Numero Licencia'),
                        'fecha_fin_licencia' => Yii::t('app', 'Fecha Fin Licencia'),
			'camions' => null,
			'idUser' => null,
			'encargos' => null,
                        'datosPersonales' => null,
		);
	}

	public function search() {
		$criteria = new CDbCriteria;

		$criteria->compare('id_user', $this->id_user);
		$criteria->compare('numero_licencia', $this->numero_licencia);
                $criteria->compare('fecha_fin_licencia', $this->fecha_fin_licencia, true);

		return new CActiveDataProvider($this, array(
			'criteria' => $criteria,
		));
	}
}