<?php

Yii::import('application.models._base.BaseCamion');

class Camion extends BaseCamion
{
	public static function model($className=__CLASS__) {
		return parent::model($className);
	}
}