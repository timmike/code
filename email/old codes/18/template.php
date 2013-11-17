<head>
<link rel="stylesheet" href="./css/template.css" type="text/css" media="screen" charset="utf-8"/>
<script type="text/javascript" src="./lib/template.js"></script>
</head>

<div id="templateWrapper">
	<div id="templateWraperLeft">
		<p class="center toggleMenu" hideDiv="#templateCreativeInfo">Template Generator</p>
		<div id="templateCreativeInfo" >
			<div id="avaliableCreative">
				<form>
					<select name="day">
						<option value="0">Today</option>
						<option value="7">Week</option>
						<option value="365">Year</option>
					</select>
					<input type="text" class="showCreativeId" placeholder="Creative Id"/>
				</form> 	

			<ul id="linkIdAvaliable" class="sortable  linkIdConnect"></ul>
			<ul id="linkedIdSelected" class="sortable linkIdConnect "></ul>

			</div>
			<div id="offerDetail">
				<select class="fromline">
					<option>From Lines</option>
				</select>
				<select class="subjectline">
					<option>Subject Lines</option>
				</select>
				<textarea class="offerText" id="offerDetailTextArea">Sample offer text here</textarea>
			</div>
			
			<div id="templateGenerator">
				<input type="text" class="templateStyle" name="template" placeholder="Template style"/>
				<textarea class="templateStyleSelected"></textarea> <!-- store note data here when template style is selected !-->
				<input type="button" class="generate" value="Generate" />
				<input type="button" class="generateRandom" value="Random" />

			</div>
			
		</div>
		
		<div id="templateEditor">
			<p class="center">Template Editer</p>
			<form name="templateForm" method="post">
        <table>
  		  	<td>
				<label>Creative:</label>
				<ul class="creativeParent loadMenu">
					<input type="text"  placeholder="Select a creative Id"/>
					<img class="dropdownButton" src="" alt=''/>
		
				<ul>
			</td>
                
                <td>   
                    <lable>Template:</lable>
						<ul class="creativeChild loadMenu" >
						<input type="text" placeholder="Select a template" disabled="disable"/>
						<img class="dropdownButton" src="" alt='' disabled="disable"/>
					<ul>
                    
                </td>
                
                <td>
                		<label>New Template Name:</label>
                    <ul>
                    <input id="newTemplate" type="text"/>
                    <input type="button" id="saveTemplate" value="Save Template"/>
                		</ul>
                </td>
            </tr>
		<tr>
		<td colspan="3">
		</td>
		</tr>
        </table>
        
   <textarea id="templateContent"></textarea>   
   </form>  

		</div>
	</div>

	<div id="templatePreviewRight">
		<label>Preview:</label>
	</div>
</div>