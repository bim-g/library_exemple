<?php
	$exception=false;
	if(Session::exists('error') && Session::exists('errorMessage')){
		$exception=Session::get('errorMessage');
	}  

	$message=BoxMessage::errors(Session::get('error'),$exception);  
	Session::delete('error');
	Session::delete('errorMessage');
?>  
<div id="errorModal" class="w3-modal w3-animate-opacity">
	<div class="w3-modal-content w3-card-4 w3-animate-zoom">
		<div class="w3-card-4">
			<header class="w3-container w3-red">          
				<h1><?php echo $message['type']?></h1>
			</header>
			<div class="w3-container">
				<p><?php  echo $message['errorText']?></p>
			</div>
			<footer class="w3-container w3-center w3-padding w3-red">
				<button class="w3-btn w3-border" onclick="w3.hide('#errorModal');">Close</button>
			</footer>
		</div>
	</div>
</div>