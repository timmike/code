$(document).ready(function(){
	$("#campaign").load("campaign.php");
//	$('#templateManagement').load('template.php');
	$('#templateManagement').load('template.php');
	
	$('#mainMenuTabNav > div').filter(":not(.current)").hide();	
	$('#deployment > div').hide();

	//clear text
	$(".clear").each(function(){
		$(this)	
		.data("default",$(this).val())
		.addClass("inactive")
		.focus(function(){
			$(this).removeClass("inactive");
			if($(this).val() == $(this).data("default") || '')
				$(this).val('');
		})
		.blur(function(){
			if($(this).val() == ''){
				$(this).addClass("inactive").val($(this).data("default"));
			}	
		})
	});

	//disable text selection
	$("legend,label").disableSelection();


	//mainMenu Tab
	$('#mainMenuContainer input').click(function(e){
		
		$('#mainMenuContainer input.current').removeClass("current");
		$('#mainMenuTabNav > div').hide();		
		$(this).addClass('current');
		$('#'+$(this).val()).fadeIn('slow');
			e.preventDefault();
	});

	//Deployment Tab
	$('#tabNav a').click(function(e){
		$('#tabNav li.current').removeClass();
		$('#deployment > div').slideUp(700).hide();	
		$(this).parent().addClass('current');
		$($(this).attr("href")).stop().slideDown(700);
			e.preventDefault();
	});
	
	//Campaign Menu

	  //Create campaign Id

	
	$('#createCreative').click(function(e){
		var campaignData = {
			campaignName : "",
			advertiser : "",
			network : "",
			offers : "",
			domains : "",
			cluster : ""	
		}	
		
	for(var key in campaignData){
		campaignData[key] = ($("#"+key).val());
	}
		var todaysdate = new Date();
		var date  = todaysdate.getDate();
		var month = todaysdate.getMonth() +1;
		var year = todaysdate.getFullYear();
		var date = month+'/'+date+'/'+year;
 		
 		$.ajax({
			type: "POST",
			url: "save.php",
			data: campaignData,
			cache: false,
	
	beforeSend: function(){
		$('<div class="saving"><p>Saving.</p></div>').appendTo("#campaign");
	},
	
	error: function(xhr, ajaxOptions, thrownError){
		alert('error');
		    alert(xhr.responseText);
		    alert(ajaxOptions);
                    alert(thrownError);	
		},
			
	success: function(data)
	{
		campaignId = data;
		$('<a href="/Tian/public/campagin/updating?id='+data+'"> '+ campaignData["cluster"] + " --- " + campaignId + ' '+ campaignData["campaignName"] + ' ' +  date+ ' ' + campaignData["domains"] + ' </a><br />').prependTo("#listCreatives");
	},
	complete: function(){
		$('#campaign .saving').fadeOut(1000,function(){$(this).remove();});
	}
	})
});


	$("#campaign .options").each(function(){
		$('<td><input class="addElement" type="button" value="+"/></td>').appendTo(this).click(function(){
			var button = $(this).parent().find('input:first ');
			
			if(button.val()=="cancel"){
			 	$(this).next().remove();
				button.val("+");
			}
			else{
			  button.val("cancel");
			$('<div><input type="text" /><input class="save" type="button" value="save"></div>').hide().appendTo($(this).parent()).show("slide", { direction: "left" }, 1000).parent().find("input:button").click(function(){
				var currentDiv = $(this).parent();
				if(currentDiv.find("input:text").val() !=''){
					var inputValue = currentDiv.find("input:text").val();
					/*First letter uppercase.	
					inputValue = inputValue.toLowerCase().replace(/\b[a-z]/g, function(letter) {
    						return letter.toUpperCase();
							});	
					*/ 	
						var selectionId = "#"+$(this).parent().parent().find("select").attr('id');	
					$(selectionId).append(new Option(inputValue, inputValue.toLowerCase(), true, true));
				
				var button = $(this).parent().parent().find('input:first');	
				$(this).parent().remove();
				button.val("+");		
				}
			});
			}
		});
	});
	

	//MainMenu
	var mainMenu ={
	menuShow: 0,
	menuHide: -100,
	showTime:1000,
	hideTime:200,
		
	init:function(){$('#mainMenuContainer').css("left",this.menuHide+"px");
	$('#mainMenuContainer').hover(function(){
		$(this ).stop().animate({left: mainMenu.menuShow+"px"},mainMenu.showTime);
	},
	function(){
		$(this).stop().animate({left: mainMenu.menuHide+"px"},mainMenu.hideTime);
	});}
	};

	mainMenu.init();	


//Domain Management
//Drag and drop 
	
	/* update after selected #postOrder
	$(function() {
		$("ul.droptrue").sortable({
			connectWith: 'ul',
			opacity: 0.6,
			update : updatePostOrder
		});

		$("#sortable1, #sortable2").disableSelection();
		$("#sortable1, #sortable2").css('minHeight',$("#sortable1").height()+"px");
		updatePostOrder();
	});
	
	function updatePostOrder() { 
		var arr = [];
	  $("#sortable2 li").each(function(){
	    arr.push($(this).attr('id'));
	  });
	  $('#postOrder').val(arr.join(','));
  }
	*/
	
//Drag & Drop
    $(".addDomain,.removeDomain").click(function(){
	    	action = $(this).val();
	    	target = $(this).attr("target");

	    	if(action=="Add"){
	    		$('#avaliable_' + target + ' option:selected').each( function() {
		            $('#selected_'+target).append($('<option>',{value:$(this).val()}).text($(this).text()));
					$(this).remove();
	        	});
	    	}
	    	else{
				$('#selected_' + target +' option:selected').each( function() {
		        	$('#avaliable_' + target).append($('<option>',{value:$(this).val()}).text($(this).text()));
		           	$(this).remove();
		       	});
	    	}
	    });
	    
	    $('.saveDomain').click(function(){
	    	var saveButton = this;
	    	target = $(this).attr("target");
	    	targetOptions = $('#selected_' + target +' option');
	    	targetOptionsValues = [];
	    	url = 'saveDomains.php';
	    	
	    	$(targetOptions).each(function(){
	    		targetOptionsValues.push($(this).val());
	    	});

			postData = {};
			postData[target] = targetOptionsValues;		
	    	
	    	$.ajax({
			  type: 'POST',
			  url: url,
			  data: postData,
			  dataType: 'json',
			  beforeSend: function() {
				$(saveButton).val("Saving...");
				$(saveButton).attr("disabled","disabled");
			  },
			  complete:function(){
			  	$(saveButton).val('Save');
				$(saveButton).removeAttr("disabled");
			  },
			  success: function(jsonRespond){
			  	if(jsonRespond==0) alert("Failed to save. No Domains Updated");
			  },
			  error: function(){
			  	alert("Failed to save");
			  }
			});
	    	
	    	/*
	    	$.post(url,postData,function(jsonRespond){
	    		
	    		console.log(jsonRespond);
	    	},'json');
	    	*/
	    });

	$("#domainAvaliable,#domainSelected").sortable({
		connectWith: ".domainConnect",
	}).disableSelection();
	
	$("#IpAvaliable,#IpSelected").sortable({
		connectWith: ".IpConnect",
	}).disableSelection();
	

	function listSelection(id){
 	 	var selection = [];	
 	 	$("#"+id+" li").each(function(){ 
 			selection.push($(this).attr("id"));
 		});
 		return selection;
 }

	
	//When .save button clicked   Domain, IP, 
	$(".saveSelectionOld").click(function(){
		var saveButton = this;
			
		$(this).parents("table").find(".selection").each(function(){
			var selectionId = $(this).attr('id');
			var selection = listSelection(selectionId);
			
					$.ajax({
						type: "GET",
						url: "save.php?"+selectionId+"="+selection,
						content: $(saveButton).val(),
						
					beforeSend: function(){
						$(saveButton).val("Saving.....");
						$(saveButton).attr("disabled","disabled");							
					},
					
					error: function(xhr, ajaxOptions, thrownError){
						alert('error');
						alert(xhr.responseText);
						alert(ajaxOptions);
						alert(thrownError);	
					},
							
					success: function(data){
						alert(data);
						
					},
					
					complete: function(){
						$(saveButton).val(this.content);
						$(saveButton).removeAttr("disabled");
					}
			});  
		});
	});
//-----------------------------------------------//


//$(".creativeChild").chained(".creativeParent");
//******Template Management *******//
var templates = {};

$(".creativeParent,.creativeParent1").live('click',function(e){ //share with Test&send
	clickedObject = this;
	url = 'templateController.php';
	postData = {"action":"server_action","server_action":"getLists"};
	$.post(url,postData,function(jsonData){
		templates=jsonData;
		showSubMenu(jsonData,'creativeId',clickedObject);
	},"json")
	.fail(function(){
		alert('Failed to load the lists');
	});
});

$(".creativeChild").live('click',function(e){ //share with Test&send
	clickedObject = this;
	//$(creativeId).children(':not(.default)').remove();			
	creativeParent = $('.creativeParent input:first').val();
	showSubMenu(templates[creativeParent],'value',clickedObject);
});


showSubMenu = function(data,request,clickedObject){ //share with Test&send
	var creativeIds = [];	
	if(request=='creativeId'){
		$.each(data, function(index,ids){
			creativeIds.push(index);
		});	
		creativeIds.sort(function(first,second){
		return second-first; //sorted from high to low
	});
	}
	else{
		creativeIds = data; //templates
		creativeIds.sort(function(a,b){
			var aName = a.toLowerCase();
  			var bName = b.toLowerCase(); 
  			return ((aName < bName) ? -1 : ((aName > bName) ? 1 : 0));
		});
	}

	subMenu = $('<div class="subMenu"></div>'); //share with Test&send
	$.each(creativeIds,function(index,templateName){  //show a list of templates
		var creativeId = $('.creativeParent input:first').val();
		var li = $('<li class="subMenuOptions"></li>').text(templateName)
				.click(function(){
					$(clickedObject).find('input:first').val(templateName);
					subMenu.remove();
					$('.subMenu').remove();	
					$('#saveTemplate').attr('disabled','disabled');
					
					if(request=='creativeId'){
						childDropdown = $('.creativeChild');
						childDropdown.find('input:first').val('');
						childDropdown.children().removeAttr("disabled", "disabled");
						loadAvaliableTemplates(); // for Test&Send
					}
					
					if(request=='value'){
						url = 'templateController.php';
						postData = {"action":"server_action","server_action":"getTemplate",'creativeId':creativeId,'templateName':templateName};
						$.post(url,postData,function(jsonData){
							$('#templateContent').val(jsonData).scrollTop(0);
						},"json")
						.fail(function(){
							alert('Failed to load the template');
						});
					}
				});
		
		$('body').click(function(){subMenu.remove()});
		subMenu.append(li);
	});

	subMenu.appendTo($(clickedObject).parent());	
}

$("#saveTemplate").live('click',function(){
	var respond = confirm("Are you sure you want to save this file, ?");	
	if(respond==true){
	
		var templateContent = $('#templateContent').val();
		var creativeId = '';
		var templateName = '';
		var creativeParentInput = $('.creativeParent input:first');
		var creativeChildInput = $('.creativeChild input:first');
		var on_list = false;
		
		if($("#newTemplate").val()!=''){
			var newTemplateName = $("#newTemplate").val().replace(/\s*/g,'');	
			var creativeId = /^\s*\d+/.exec(newTemplateName);
			var templateContent = 	$('#templateContent').val();
			creativeId = $.isNumeric(creativeId)? creativeId[0] : 0;
			templateName = newTemplateName;
		}
		else{
			creativeId = creativeParentInput.val();
			templateName =  creativeChildInput.val();
		}
		
		data = {"creativeId":creativeId,"templateName":templateName,"templateContent":templateContent};
		
		if(templateName!=''){
				url = 'templateController.php';
				postData = {"action":"server_action","server_action":"saveTemplate","creativeId":creativeId,"templateName":templateName,"templateContent":templateContent};
						$.post(url,postData,function(jsonData){
							if(jsonData.status == "Succeed"){
								$('#templateContent').scrollTop(0);
								$('#newTemplate').val('');
								creativeParentInput.val(creativeId);
								creativeChildInput.val(templateName).removeAttr('disabled','disabled');
								$('#templateContent').val(templateContent);
								$('#saveTemplate').attr('disabled','disabled');
								$.each(templates[creativeId],function(index,value){
									if((value==templateName)){ on_list = true; //if saved temlate not on list add to submenu dropdown
									};
								});
									if(!on_list) templates[creativeId].push(templateName);
							}
							else{ alert(jsonData.message);}
						},"json")
						.fail(function(){
							alert('Failed to load the template');
						});
		}
		else{alert('Failed to process');}
	
	
	}		//	$(selectionId).append(new Option(inputValue, inputValue.toLowerCase(), true, true));
});

//******Test&Send Management *******//

$('#monitor').click(function() {
    target = "http://198.154.212.229/monitorTest.php";
    //option = '_blank'; 
    //option = 'toolbar=no,location=no,status=no,menubar=no,scrollbars=yes,resizable=yes,width=SomeSize,height=SomeSize'
    option = 'toolbar=no,location=no,status=no,menubar=no,scrollbars=no,resizable=yes,width=650,height=450';
     window.open(target, 'Server1',option);
});

function loadAvaliableTemplates (){
	var avaliableTemplatesUL = $('#templateAvaliable');
	var templateSelectedUL = $('#templateSelected');
	templateSelectedUL.empty();
	avaliableTemplatesUL.empty();
	
	creativeParent = $('.creativeParent1 input:first').val();
	var avaliableTempaltes = templates[creativeParent].sort();
	
	li = $.each(avaliableTempaltes,function(index,value){
		avaliableTemplatesUL.append($('<li class="ui-state-default"></li>').attr('id',value).text(value));
	});	
};

$("#templateAvaliable,#templateSelected").sortable({
	connectWith:	".templateConnect", 
	revert:	true,
}).disableSelection();
	

	
 $('#testVolume,#sendList,#setBulk,#createTemplate').submit(function(e) {
 	
 	var thisForm = this;
 	var buttonValue = $(this).find("input:submit").attr("name");
 	var selectedTemplate = listSelection("templateSelected")
  	var creativeId = $("#sendCreativeId").val();
	/*
  	var ajaxData ='';
	ajaxData = ajaxData.concat("&templateSelected=",selectedTemplate);  //add selected tempaltes
	ajaxData = ajaxData.concat("&submit=",buttonValue);  //add submit button value
 	ajaxData = ajaxData.concat("&",$(this).closest('form').serialize());
 	//  var sending = window.open("save.php?"+ajaxData, 'stayOnCurrentPage', 'width=700,height=400,resizeable,scrollbars');
    //  this.target = 'stayOnCurrentPage';
 	//alert(buttonValue);
 	*/
	ajaxData = {};
	ajaxData["creativeId"] = creativeId;
	ajaxData["selectedTemplate"] = selectedTemplate;
	ajaxData["formData"]  = {};
	$.each($(this).closest('form').serializeArray(),function(index,obj){ //get form data in array
		if(obj.value != "")	ajaxData["formData"][obj.name] = obj.value;	
	});
	ajaxData["action"] = buttonValue; //submit button value
      $.ajax({
        	type:"POST",
        	url:"send.php",
        	data: ajaxData,
        	beforeSend: function(){
        	},
        	success: function(respond){
        	},
        	complete: function(){
        	}
        });
      	 e.preventDefault();
         return false;
    });

	$('#productionList').click(function(){
		url ='elist.php';
		postData = {"action":"getLists"};
		var currentElement = $(this);
		
		left = ($(this).offset().left);
		width=($(this).width());
		var div = $("<div class='subMenu'></div>").css({"left":left})
				.mouseleave(function(){  $(this).remove();   });
		
		$.post(url,postData,function(jsonRespond){	
		if(jsonRespond.length == 0){
			li = $("<li></li>").text("Empty");
			div.append(li);	
		}
		else{	
		$.each(jsonRespond,function(index,obj){ 
			li = $("<li></li>").addClass("subMenuOptions").text(index + ' ---- ' + obj).click(function(){
				currentElement.val(index + ' ---- ' + obj).attr("dbId",index);	
				$(this).parent('div').remove();
			});
			div.append(li);	
		});
		}
		},'json');
		currentElement.parent().append(div);	
	});
}); //end of document.ready