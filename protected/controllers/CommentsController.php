<?php

class CommentsController extends Controller
{
	function actionIndex()
	{
	     $model = new Comments(); //your own model goes here    
	     $criteria = new CDbCriteria;  
	     $data = Comments::model()->findAll($criteria);
	     $this->render('index', array(
	     	'model' => $model,
	     ));
	}
	 
	function actionAjax()
	{	
		$model = new Comments();
	 	if(isset($_POST['Comments']))
	    {
	      $model->attributes = $_POST['Comments'];
		  $model->save();
		}
		  $this->renderPartial('ajax_page', array(
	      'model' => $model,
	    ));
	}

	

	public function actionJson(){
		$num = $_GET['num'];
		$limit = 2;
		$criteria = new CDbCriteria();
		$criteria->offset = ($num-1)*$limit;
		$criteria->limit = $limit;
		$criteria->order = 'id DESC';
		$input = Comments::model()->findAll($criteria);

		$fields = array('ime', 'komentar');//imena atributa iz posta za prikaz
		$output = array();
        foreach($input as $i){
            $temp = array();
               foreach($fields as $field){
                   $temp[$field] = $i->$field;
               }
               $output[] = $temp;
        }
       echo json_encode($output);
	}
}
