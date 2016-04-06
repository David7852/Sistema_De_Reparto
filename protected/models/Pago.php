<?php

Yii::import('application.models._base.BasePago');

class Pago extends BasePago
{
	public static function model($className=__CLASS__) {
		return parent::model($className);
	}
}