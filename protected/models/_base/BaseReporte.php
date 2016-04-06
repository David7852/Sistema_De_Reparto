<?php

/**
 * This is the model base class for the table "reporte".
 * DO NOT MODIFY THIS FILE! It is automatically generated by giix.
 * If any changes are necessary, you must set or override the required
 * property or method in class "Reporte".
 *
 * Columns in table "reporte" available as properties of the model,
 * and there are no model relations.
 *
 * @property integer $fecha_inicio
 * @property integer $fecha_cierre
 * @property string $text
 * @property integer $numero
 *
 */
abstract class BaseReporte extends GxActiveRecord {

	public static function model($className=__CLASS__) {
		return parent::model($className);
	}

	public function tableName() {
		return 'reporte';
	}

	public static function label($n = 1) {
		return Yii::t('app', 'Reporte|Reportes', $n);
	}

	public static function representingColumn() {
		return 'text';
	}

	public function rules() {
		return array(
			array('fecha_inicio, text', 'required'),
			array('fecha_inicio, fecha_cierre', 'numerical', 'integerOnly'=>true),
			array('fecha_cierre', 'default', 'setOnEmpty' => true, 'value' => null),
			array('fecha_inicio, fecha_cierre, text, numero', 'safe', 'on'=>'search'),
		);
	}

	public function relations() {
		return array(
		);
	}

	public function pivotModels() {
		return array(
		);
	}

	public function attributeLabels() {
		return array(
			'fecha_inicio' => Yii::t('app', 'Fecha Inicio'),
			'fecha_cierre' => Yii::t('app', 'Fecha Cierre'),
			'text' => Yii::t('app', 'Text'),
			'numero' => Yii::t('app', 'Numero'),
		);
	}

	public function search() {
		$criteria = new CDbCriteria;

		$criteria->compare('fecha_inicio', $this->fecha_inicio);
		$criteria->compare('fecha_cierre', $this->fecha_cierre);
		$criteria->compare('text', $this->text, true);
		$criteria->compare('numero', $this->numero);

		return new CActiveDataProvider($this, array(
			'criteria' => $criteria,
		));
	}
}