<?php $this->renderPartial('ajax_page', array('model' => $model));?>

<br />

<div id="post">
<div ng-controller="temp"> 
	<div ng-repeat="post in posts" style="width:100%; min-height:200px;">
		{{post.ime}},{{post.komentar}}
	</div>
</div>
</div>