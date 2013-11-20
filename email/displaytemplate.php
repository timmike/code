<script type="text/javascript" src='js/jquery-1.10.2.min.js' ></script>
<script>
$( document ).ready(function() {
	$("#creative_id" ).change(function(){
		var val = ( this.value ); 
 	 	
 	 	$.ajax({
  		type: "GET",
  		url:  "./template.php",
  		data: {'creative_id': val,
  						'submit': 'ajax'},
  	  success: function(data) {
      	var json = $.parseJSON(data);
      	$("#templ").empty();
      	$.each(json, function( index, value ) {
      		if(index == 0){
      			 $('#template').empty();
      			 $('#template').append(value);
      		}
      		else {
  					$('#templ')
         		.append($("<option></option>")
         		.attr("value",val)
         		.text(value)); 
        	}
				});
     	}
		});
	});
	
	$("#templ" ).change(function(){
		var val = (this.value);
		var name = $("#templ option:selected").text();
 	 	$.ajax({
  		type: "GET",
  		url:  "./template.php",
  		dataType: "json",
  		data: {
  			"templ": "templ",
  			"name": name,
  			"creative_id": val
			},
  	  success: function(data) {
  	  	$('#template').empty();
  			$.each(data, function( index, value ) {
  				$('#template')
         .html(value);
				});
     	}
     	
		});
	});

});

</script>

<?php
require_once('Creative.php');
$rows = creative::display();
?>
<h2>Templates</h2>
<form method="POST" action="template.php">
<textarea name="template" cols="60" rows="15" id="template">
	
	
</textarea>
<br />

<select name="creative_id" id="creative_id">
	<option>
		select a creative id
	</option>
	<?php
	foreach($rows as $key => $value){
		echo '<option value="'.$value['id'].'">'.$value['name'].'</option>';
	}
	?>
</select>
<select name="templ" id="templ"><option>select a template</option></select>
<input type="text" name="name" />
<input type="submit" name="submitTemplate" value="Create New Template"/>
<input type="submit" name="send" value="Send"/>
</form>