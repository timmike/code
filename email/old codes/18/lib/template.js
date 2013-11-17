$('#saveTemplate').attr('disabled','disabled');

$('#templateContent').keydown(function(){
	$('#saveTemplate').removeAttr('disabled','disabled');
});


$(".creativeChild").live('click',function(e){
	clickedObject = this;
	//$(creativeId).children(':not(.default)').remove();			
	creativeParent = $('.creativeParent input:first').val();
	showSubMenu(templates[creativeParent],'value',clickedObject);
});




//----------------------------------//





//Template 2/////

$("#linkIdAvaliable,#linkedIdSelected").sortable({
	connectWith:	".linkIdConnect", 
	revert:	true,
}).disableSelection();

$('.toggleMenu').click(function(){
	hideDiv = $(this).attr('hideDiv');
	$(hideDiv+'> div').stop().slideToggle('slow');
});

$('.showCreativeId').click(function(){
	var elementParent = $(this).parent();
	var currentElement = $(this);
	
	showCreativeSubMenu('getCreativeList',elementParent,currentElement);
});

$('#templatePreviewRight').hide();


function showCreativeSubMenu(action,elementParent,currentElement){
	formData = currentElement.parent("form").serializeArray();
	formData.push({"name":"action","value":action});
	var left = currentElement.offset().left;
	var top = currentElement.offset().top; //6 is the border and padding
	width=currentElement.width();
	url = "templateController.php";
		div = $("<div class='subMenu templateListSubMenu'></div>").css({"left":left,"top":top})
				.mouseleave(function(){  $(this).remove();   });
		$.post(url,formData,function(jsonRespond){
			if(jsonRespond.length == 0){
				li = $("<li></li>").text("Empty");
				div.append(li);	
			}
			else{	
			$.each(jsonRespond,function(index,obj){
				li = $("<li></li>").addClass("subMenuOptions").attr("id",obj.id).text(obj.id).click(function(){
					currentElement.val($(this).text()).attr("dbid",obj.id);
					getLinkId_Offer($(this).text());
					div.remove();
				});
				div.append(li);	
			});
			}
		},'json')			
		elementParent.append(div);
}


$('.showCreativeId').keyup(function(){
	creativeId = $(this).val();
	$('.subMenu').remove();
	getLinkId_Offer(creativeId);
});

function getLinkId_Offer(id){
	//getCreativeLink_Offer
	url = "templateController.php";
	postData = {"id":id,"action":"getCreativeLink_Offer"};
	
	$.post(url,postData,function(jsonRespond){
		ul_avaliableLinks = $('#linkIdAvaliable');
		ul_selectedLinks = $('#linkedIdSelected');
		ul_avaliableLinks.empty();
		ul_selectedLinks.empty();
		
		$.each(jsonRespond,function(i,obj){
			if(obj.linkId != null){
				li = $('<li></li>').addClass('ui-state-default').attr('id',obj.linkId).text(obj.linkId + ' - ' + obj.description);
				ul_avaliableLinks.append(li);
			}
		});
	
		select_from = $('#offerDetail .fromline').empty().append($("<option></option>").attr("value","From Lines").text("From Lines"));
			$.each(jsonRespond[0]["from"],function(i,value){
				select_from.append($("<option></option>").attr("value",value).text(value));	
			});
		
		select_subject = $('#offerDetail .subjectline').empty().append($("<option></option>").attr("value","Subject Lines").text("Subject Lines"));	
			$.each(jsonRespond[0]["subject"],function(i,value){
				select_subject.append($("<option></option>").attr("value",value).text(value));	
			});
			
		textarea_offer = $('#offerDetailTextArea');
		textarea_offer.val('');
	
		
		textarea_offer.val(jsonRespond[0]['note']); 
	},'json');
};

$('.templateStyle').click(function(){
	currentInput = this;
	$(".templateStyleSubMenu").remove();
	currentDiv = $(this).parent("div");
	var top = $(this).offset().top ;
	var left = ($(this).offset().left);
	templateInfoSelction = $(this).attr("name");
	getTemplateListUrl = 'templateController.php';
	postData = {"action":"getTemplateList","requestCategory":templateInfoSelction};

	div = $("<div class='subMenu templateStyleSubMenu'></div>").css({"left":left,"top":top})
		.mouseleave(function(){  $(this).remove();   });
		
	$.post(getTemplateListUrl,postData,function(jsonRespond){	
		if(jsonRespond.length == 0){
			li = $("<li></li>").text("Empty");
			div.append(li);	
		}
		else{	
		$.each(jsonRespond,function(index,obj){
			li = $("<li></li>").addClass("subMenuOptions").attr("id",obj.id).text(obj.name).click(function(){
				$(currentInput).val($(this).text()).attr("dbId",obj.id);
				$("#buttonAdInfo").val("Update");
				$(this).parent("div").remove();
				postData = {"action":"getTemplate","id":obj.id};

				$.post(getTemplateListUrl,postData,function(jsonData){
					$.each(jsonData,function(i,obj){
						$('.templateStyleSelected').text(obj.note);	
					});
					
				},'json');
				
			});
			div.append(li);	
		});
		}
	},'json');
	$(this).parent().append(div);  //add submenu
});


$('#templateGenerator .generate').click(function(){
	var templateItems = {};
	
	$('#linkedIdSelected li').each(function(i,obj){
		templateItems['link'+(i+1)] = $(obj).attr('id');
	});
	templateItems['fromline'] = $('.fromline').val();
		//fromUser
		var pattern = /\s/g  //remove all space and newline;
		var replace = '';
	templateItems['fromUser'] = myRegExp(templateItems['fromline'],pattern,replace).toLowerCase();
	templateItems['subjectline'] = $('.subjectline').val();
	var template = $('.templateStyleSelected').text();

	$.each(templateItems,function(key,val){
		var pattern = "\[" + key + "\]"; 
		pattern = new RegExp(pattern.replace(/([ \[ | \] ])/g,"\\$1"),"ig"); //replace [] as \[\] $1 will get the first match
		template = myRegExp(template,pattern,val);
	});
	$('#templateContent').val(template);
	$('#templatePreviewRight').html(template).slideDown(888);
});

$('#templateContent').keyup(function(){
	$('#templatePreviewRight').html($(this).val()).slideDown(888);
});


function myRegExp(string,pattern,replace){
  return string.replace(pattern, replace);
}
