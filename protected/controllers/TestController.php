<?php
#http://localhost/yii/Sistema_De_Reparto/index.php?r=test/index
class TestController extends Controller
{
    public function actionIndex()//la funcion debe llamarse igual que la vista a la que hace referencia
    {
        /*//en caso de no requerir modelos:
        $var=01;//se crea una variable para pasarsela a la vista
        $this->render("index",array("var"=>$var));//array clave-valor. donde index es la vista del controlador, 
                                                  //que debe llamarse en esta caso index.php y estar en una carpeta dentro de views
                                                  // con el nombre del controlador en minusculas
        */
        
        /*para el uso de modelos*/
        $model=CActiveRecord::model("Usa")->findAll();//los modelos pueden ser usados, o no, para acceder a registros en tablas
                                                           //en este caso, creamos un modelo de nombre Usa (que deberemos tener ya creado)
        $var=01;//se crea una variable ejemplo para pasarsela a la vista
        $this->render("index",array("model"=>$model,"var"=>$var));//en este caso, ademas de lo anterior, se indica que renderice
                                                                  //el modelo
        
    }
}

