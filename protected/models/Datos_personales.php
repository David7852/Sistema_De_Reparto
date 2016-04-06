<?php

Yii::import('application.models._base.BaseDatos_personales');

class Datos_personales extends BaseDatos_personales
{
	public static function model($className=__CLASS__) {
		return parent::model($className);
	}
}