<?php

Yii::import('application.models._base.BaseEnvio');

class Envio extends BaseEnvio
{
	public static function model($className=__CLASS__) {
		return parent::model($className);
	}
}