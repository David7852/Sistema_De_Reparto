<?php

Yii::import('application.models._base.BaseEncargo');

class Encargo extends BaseEncargo
{
	public static function model($className=__CLASS__) {
		return parent::model($className);
	}
}