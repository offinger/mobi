<?php

class CommentsController extends Controller
{
	function actionIndex()
	{
	     $this->render('index', array(

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

	public function actionKoment(){
		$data = json_decode(file_get_contents("php://input"));
		$model = new Comments();
		$model->ime = $data->ime;
		$model->komentar = $data->komentar;
		$model->save();

		header("HTTP/1.1 "."200");
       	header("Content-Type: application/json");
       	echo "ok";
	}

	public function actionJson(){
		$num = $_GET['num'];
		$limit = 3;
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
