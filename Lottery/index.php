<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<title>Untitled Document</title>
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js" ></script>
<style>
.winningNumbers{width:30%;}
.winningNumbers:nth-child(even) {background-color:silver;}
.winningNumbers:nth-child(odd) {background-color:yellow;}

.lotteryList:nth-child(even){ background-color: silver; }
.lotteryList > span { padding-right:15px;width:50%;}
</style>

<script>
$(document).ready(function(){
	
	$("#readnumbers").on("click", function(){
		$.post('crud.php',function(data){
			div = $('#winningNumberList')

			$.each(data,function(key,val){
					subdiv = $("<div></div>").addClass("lotteryList");
					var id = $('<span></span>').addClass("lotteryId").text(val["id"]);
					var date = $('<span></span>').addClass("lotteryDate").text(val["date"]);
					var number = $('<span></span>').addClass("lotteryNumber").text(val["number"]);

					subdiv.append(id).append(date).append(number);
					div.append(subdiv);
			})
		},"json");
	});
	
})
</script>

</head>

<body>
	<div id="wrapper">
    	<div id="winningNumbers">
        	<div id="winningNumberList"></div>
            
            <form action="" method="post">
        		<select>
                	<option value="powerball">Powerball</option>
                    <option value="mega-millions">Mega Millions</option>
                    <option value="superlotto-plus">SuperLotto Plus</option>
                </select>
                <select>
                	<option>5 months</option>
                    <option>10 months</option>
                </select>
                <input id="readnumbers" type="button" value="Display Winning Numbers" name="readnumbers"/>    
            </form>
		</div>
    </div>
</body>
</html>


<?php


$str = 'apple bee cat dog';

 $data = "The cat likes to sit on the fence. He also likes to climb the tree."; 
 
 $find ="/bee|dog/"; 
 $replace =""; 
 
 //1. replace single word 
 Echo "$data <br>"; 
 Echo preg_replace ($find, $replace, $str); 


?>
