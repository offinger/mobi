<?php //$this->renderPartial('ajax_page', array('model' => $model));?>

<br />


<div ng-controller="temp"> 

	<input type="text" ng-model="ime" />
	<input type="text" ng-model="komentar" />
	<input type="button" value="udri" ng-click="dzoni()" />
	<br/>

	<div ng-repeat="post in posts | filter: search" style="width:100%; min-height:200px;">
		{{post.ime}},{{post.komentar}}
	</div>
</div>