<?php

class Usa extends CActiveRecord//todos los modelos extienden de active record
{
    //si se usa el generador de codigo
    //en controller se reemplaza la declaracion del modelo por: $model=Usa::model()->findAll();
    //y se agrega:
    /*
     * public static function model($model=__CLASS__)
     * {
     * return parent::model($model);
     * }
     */
    
    
    
    //para asociar el modelo a una tabla se usa:
    public function tableName()
    {
        return "usuario";//retorna el nombre de la tabla que queremos asociar. si no se define, el modelo entiende que hay
                            //una tabla que lleva su mismo nombre, case sentivie.
    }
            
}
