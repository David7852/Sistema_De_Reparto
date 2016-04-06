<?php

Yii::import('application.models._base.BaseAdministrador');

class Administrador extends BaseAdministrador
{
	public static function model($className=__CLASS__) {
		return parent::model($className);
	}
}