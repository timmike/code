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
      	 $('#template').empty();
      	 	$("#templ").attr('multiple', 'multiple');
      	$.each(json, function( index, value ) {
          if(index == 2)	{
          	$("#template_name").attr('value', value);
          }
      		if(index == 0){
      			 $('#template').empty();
      			 $('#template').html(value);
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
         $("#template_name").attr('value', name);
				});
     	}     	
		});
	});
	
	
	$( "#test" ).click(function() {
		var arr = new Array();
		$("#templ option:selected").each(function() {
    		arr.push(this.text);
		});
		
		var creativeID = $( "#templ option:selected").val();
		
		var test_account = $( "#test_account").val();
		
		$.ajax({
      	url:  "./template.php?testcreativeID="+creativeID+"&test_account="+test_account,
        type: "GET",
        dataType: 'json',
        data: JSON.stringify(arr),
        success: function(response){}

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
		echo '<option value="'.$value['id'].'">'.$value['id'].'</option>';
	}
	?>
</select>
<select name="templ" id="templ"><option>select a template</option></select>
<input type="hidden" name="template_name" id="template_name" value="" />
<input type="text" name="name" />
<input type="submit" name="submitTemplate" value="Create New Template"/>
<input type="submit" name="updateTemplate" value="Update"/>

<br /><br />
<input type="text" placeholder="seed account" id="test_account" />
<input type="button" name="test" id="test" value="test" />
<input type="button" name="send" value="Send"/>
</form>