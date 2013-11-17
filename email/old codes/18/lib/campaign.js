	$('#linklist').hide();
	
	$('#campInfo,#newCreativeBtn,#newLinkIdBtn,#linklist .update').live('click',function(){
	resetForm();
	resetLinkIdForm();
	
	if($(this).attr("id")=='newCreativeBtn') updateSelectionLists();
		
		// Getting the variable's value from a link 
		box=$(this).attr("box");
		var loginBox = "#"+box+"-box";
		//Fade in the Popup and add close button
		$(loginBox).fadeIn(300);
		
		//Set the center alignment padding + border
		var popMargTop = ($(loginBox).height() + 24) / 2; 
		var popMargLeft = ($(loginBox).width() + 24) / 2; 
		
		$(loginBox).css({ 
			'margin-top' : -popMargTop,
			'margin-left' : -popMargLeft
		});
		
		// Add the mask to body
		$('body').append('<div id="mask"></div>');
		$('#mask').fadeIn(300);
		
		return false;
	});
	
	// When clicking on the button close or the mask layer the popup closed
	$('a.close, #mask').live('click', function() { 
	console.log('out');
	  $('#mask , .campaignCategory-popup, .creative-popup,.linkId-popup').fadeOut(300 , function() {
		$('#mask').remove();  
	}); 
	return false;
	});
	



$("#name").click(function(){
	//$(".campaignListSubMenu").remove();
	if(!$(".campaignListSubMenu").length){ //check if div element exists
		left = ($(this).offset().left);
		width=($(this).width());
		campaignInfoSelction = $("#campaignInfoSelction :selected").val();
		getCampaignInfoListUrl = 'campaignController.php';
		postData = {"action":"getCategoryList","requestCategory":campaignInfoSelction};
	
		div = $("<div class='subMenu campaignListSubMenu'></div>").css({"left":left})
				.mouseleave(function(){  $(this).remove();   });
	
		$.post(getCampaignInfoListUrl,postData,function(jsonRespond){
			if(jsonRespond.length == 0){
				li = $("<li></li>").text("Empty");
				div.append(li);	
			}
			else{	
			$.each(jsonRespond,function(index,obj){
				li = $("<li></li>").addClass("subMenuOptions").attr("id",obj.id).text(obj.name).click(function(){
					$("#name").val($(this).text()).attr("dbId",obj.id);
					$("#note").val(obj.note);
					$("#buttonAdInfo").val("Update");
					$(this).parent().remove();
				});
				div.append(li);	
			});
			}
		},'json')
					
		$(this).parent().append(div);
	}
});



$("#buttonAdInfo").click(function(){
	url = "campaignController.php";
	button  = this;
	dbId = $("#name").attr("dbId");
	buttonValue = $(this).val();
	formData = $(".campaignCategory").serializeArray();
	formData.push({"name":"action","value":buttonValue+"CategoryInfo"});
	
	if(buttonValue=="Update") formData.push({"name":"id","value":dbId});

	$(this).val("Saving...");
	
	$.post(url,formData,function(jsonRespond){
		if(!jsonRespond.result) alert('Unsble to save');
		$(button).val(buttonValue);	
	},'json')
	.error(function(){
		alert('Error: Unable to save.');
		$(button).val(buttonValue);
	});
});


function updateSelectionLists(){

	$('#newCreative').find("select").each(function(){
		select = this;
		$(select).empty();
		$(select).append("<option></option>");
		currentCategory = $(this).attr("name");
		getCampaignInfoListUrl = 'campaignController.php';
		postData = {"action":"getCategoryList","requestCategory":currentCategory};
		
	    $.ajax({
			async:false,  //if not all queue will be overrid by the last selector, cluster
	        type: 'POST',
	        url: getCampaignInfoListUrl,
	        data: postData,
	        success: function (jsonRespond) {
				$.each(jsonRespond,function(index,obj){
					$(select).append($("<option></option>").attr("name",obj.id).attr("value",obj.id).text(obj.name)); 
				})
	        },
	        dataType: "json"
	    });
	});	
}

$("#campaignInfo .menu").live("click",function(){
	//similar to function #name.click except   campaignInfoSelction     currentInput
	currentInput = this;
	$(".campaignListSubMenu").remove();
	currentDiv = $(this).parent("div");
	left = ($(this).offset().left);
	width=($(this).width());
	campaignInfoSelction = $(this).attr("name");
	getCampaignInfoListUrl = 'campaignController.php';
	postData = {"action":"getCategoryList","requestCategory":campaignInfoSelction};

	div = $("<div class='campaignListSubMenu'></div>").css({"left":left})
		.mouseleave(function(){  $(this).remove();   });
		
	$.post(getCampaignInfoListUrl,postData,function(jsonRespond){
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
			});
			div.append(li);	
		});
		}
	},'json');
	$(this).parent().append(div);  //add submenu
});	

$('#campaignList .clone').live('click',function(){
	alert('Not working yet....');
});

$("#createCampaign").click(function(){
	currentDiv = $(this).parents("div");
	form = $(this).parents("form");
	formData = form.serializeArray();
	formData.push({"name":"action","value":"createCampaign"});
	url = "campaignController.php";
	
	$(currentDiv).append(('<div class="saving"></div>'));
	
	$.post(url,formData,function(jsonRespond){
		if(jsonRespond.result)
			loadCampaign();
		else{
			alert("Unable to create");
		}
	},'json')
	.error(function(){
		alert("Unable to create");
		$('.saving').remove();
	})
	.done(function(){
		$('#mask').trigger('click');
		$('.saving').remove();
	})
});

loadCampaign = function campaignList(){
	target = $("#campaignList");
	target.empty();
	
	formData = {"action":"getCampaignList"};
	url = "campaignController.php";
	
	
	$.post(url,formData,function(jsonRespond){
		$.each(jsonRespond,function(i,obj){
		div = $('<div></div>').attr('id',obj.id);
		ul_id = $('<ul></ul>').text(obj.id);
		ul_cluster = $('<ul></ul>').text(obj.cluster);
		ul_campaign = $('<ul></ul>').text(obj.campaign);
		ul_domain = $('<ul></ul>').text(obj.domain);
		ul_date = $('<ul></ul>').text(obj.date);
		btn = $('<input></input>').attr("type",'button').attr("value","Clone").addClass('clone');
		
		div.append(ul_id).append(ul_cluster).append(ul_campaign).append(ul_domain).append(ul_date).append(btn);
			target.append(div);
		});
	},'json');
}

loadCampaign();

$("#campaignList ul").live("click",function(){
	id = $(this).parent('div').attr("id");
	loadCampaignInfo(id);
	loadCreativeInfo(id);
});	

function loadCampaignInfo(id){
	var targetDiv = $('#campaignInfo');
	targetDiv.empty().hide();
	url = "campaignController.php";
	postData = {"action":"getCampaignInfo","id":id};
	
	$.post(url,postData,function(jsonRespond){
		$.each(jsonRespond,function(i,obj){
			form = $("<form></form>");
			$.each(obj,function(key,val){
				div = $('<div class="campignInfoDiv"></div>');
				label = $('<label></label>').text(key).addClass('capitalize');
				if(key == 'id') child = $('<label></label>').text(val).attr("dbid",val).attr("name","id");
				else if(key == 'date') child = $('<label></label>').text(val);
				else if(key == 'campaign') child = $("<input></input>").val(val).attr('name',key).addClass(key);
				else child = $("<input></input>").val(val).attr('name',key).addClass('menu');
				div.append(label).append(child);
				form.append(div);
			});
			emptyLabel = $('<label></label>');
			updateBtn = $('<input></input>').attr("type","button").val("Updates").addClass("updates");
			form.append(emptyLabel).append(updateBtn);
			$(targetDiv).append(form).slideDown(555);
			});
		},'json'
	);
}

function loadCreativeInfo(id){
	targetDiv = $('#creativeInfo');
	$(targetDiv).empty().hide();
	url = "campaignController.php";
	postData = {"action":"getCreativeInfo","id":id};
	var form_create = $('<form class="createFields"></v>').attr("name",id);
	input = $('<input></input>').attr('type','textfield').attr('placeholder','Enter Creative Name').attr("name","name");
	createBtn = $('<input></input>').attr('type','button').val("Create Creative").addClass("create");
	form_create.append(input).append(createBtn);
	targetDiv.append(form_create).slideDown(555);
	
	$.post(url,postData,function(jsonRespond){
		var div_creativeGroup = $("<div></div>").addClass("div_creativeGroup");
		$.each(jsonRespond,function(i,obj){
			div_lists = $("<div></div>").attr('id',obj.id).addClass("creativeLists");  
			ul_id = $('<ul></ul>').text(obj.id);
			ul_name = $('<ul></ul>').text(obj.name);
			ul_date = $('<ul></ul>').text(obj.date);
			div_lists.append(ul_id).append(ul_name).append(ul_date);
			div_creativeGroup.append(div_lists);
			targetDiv.append(div_creativeGroup).slideDown(555);
		});
	},'json');
}

$('#campaignInfo .updates').live('click',function(){
	updateBtn = $(this);
	form = $(updateBtn).parent("form");
	url = "campaignController.php";
	campaignName = $(form).find('.campaign').val();
	postData = {"action":"updateCampaign","campaignInfoSelction":"campaign",'name':campaignName};
	
	$(form).find('[dbid]').each(function(index,obj){
    	postData[$(obj).attr('name')] = $(obj).attr('dbid');
	});
	
	$('#campaignInfo').append(('<div class="saving"><img class="savingGif" /></div>')).show();
	$.post(url,postData,function(jsonRespond){
		console.log(jsonRespond);
		loadCampaign();
	},'json')
	.error(function(){
		alert("Unable to Update");
		$('.saving').remove();
	})
	.done(function(){
		$('.saving').remove();
	});
});



$("#creativeInfo .create").live('click',function(){
	var respond=confirm("Create a New Creative?");
	if (respond==true){
		form = $(this).parent('form');
		formData = $(form).serializeArray();
		campaignId = $(form).attr("name");
		formData.push({"name":"action","value":"createCreative"});
		formData.push({"name":"campaign","value":campaignId});
		url = "campaignController.php";
		$('#creativeInfo').append(('<div class="saving"><img class="savingGif" /></div>')).show();	
		$.post(url,formData,function(jsonRespond){
			if(jsonRespond.result)	loadCreativeInfo(campaignId);
		},'json')
		.error(function(){
			$('.saving').remove();
			alert('Unable to create');
		})
		.done(function(){
			$('.saving').remove();
		});
	}
});

$(".div_creativeGroup > div").live('click',function(){
	var id = $(this).attr('id');
	load_creative_linkid(id);
});

function load_creative_linkid(creativeId){
	linklist = $("#linklist").show("drop", { direction: "down" }, 888);
	$(linklist).empty().attr('name',creativeId);
	
	form = $('<form></form>').addClass('createLinkIdForm');
	createBtn = $('<input></input>').attr('type','button')
				.addClass('create').attr('value','Create Links')
				.attr('id','newLinkIdBtn').attr('box','linkId');
	form.append(createBtn);
	linklist.append(form).show();

	url = "campaignController.php";
	postData = {"action":"getLinkId","creative":creativeId};
	$.post(url,postData,function(jsonRespond){
		div_linkIdGroup = $("<div></div>").addClass("div_linkIdGroup");
		$.each(jsonRespond,function(i,obj){
			div = $('<div></div>');
			ul = $('<ul></ul>');
				li_id = $('<label></label>').text(obj.id).addClass('creative').attr('name','id');
				li_label_description = $('<label></label>').text(obj.description).addClass('description').attr('name',"description");
				li_label_link_info = $('<a></a>').text(obj.address).attr('href',obj.address).attr('target','_blank').addClass('address').attr('name','address');
				li_btn_update=$('<input></input>').attr('type','button').val('Update').attr('box','linkId').addClass('update');
			ul.append(li_id).append(li_label_description).append(li_label_link_info).append(li_btn_update);
			img = $('<img></img>').attr('src',obj.image).addClass('magnify').attr("width",80).attr('height',80);
			div.append(img).append(ul);
			div_linkIdGroup.append(div);
		});
		linklist.append(div_linkIdGroup);
	},'json');
}

$('.div_linkIdGroup .update').live('click',function(){
	clickedUl = $(this).parent();
	ulData={};
	
	$(clickedUl).find('[name]').each(function(){
		key = $(this).attr("name");
		value = $(this).text();
		ulData[key] = value;
	});
	$("#linkId-box .description").val(ulData["description"]);
	$("#linkId-box .address").val(ulData["address"]);
	$("#linkId-box .addLinkId").val("Update").attr('action','update').attr('dbid',ulData["id"]);
});


$('#linkId-box .addLinkId').live('click',function(){
	var btn_action = $(this);
	var action = btn_action.attr('action'); 
	var linkId = btn_action.attr('dbid');

	url = "campaignController.php";
	form = $(this).parent(form);
	var postData = {};
	
	$(form).find('[name]').each(function(index){
		key = $(this).attr("name");
		value = $(this).val();
		postData[key] = value;
	});
	postData["action"] = action+'LinkId';
	postData["creative"] = $('#linklist').attr('name');

	if (action == 'update')	postData["id"] = linkId;
	$(".loading")
	.ajaxStart(function(){
		$(this).show();
	})
	.ajaxComplete(function(){
		$(this).hide();
	});
	
	$.ajaxFileUpload(
		{
			url:url,
			secureuri:false,
			fileElementId:'linkIdImage',
			dataType: 'json',
			data:postData,
			beforeSend:function(){
				$('#loading').show();
			},
			success: function (data, status)
			{
				if(data >= 1){
					console.log('success.....');
					$('a.close').trigger('click');	
					load_creative_linkid(postData["creative"]);
				}else{
					alert('Not fully updated');
					$('a.close').trigger('click');
					load_creative_linkid(postData["creative"]);
				}
			},
			error: function (data, status, e){
					alert(data.responseText);
					$('a.close').trigger('click');
					load_creative_linkid(postData["creative"]);
			}
		}
	)
	return false;
});

$('#linkId-box .description').click(function(){
	fieldset = $(this).parent();
	descriptionInput = $(this);
	var left = $(this).offset().left;
	var top = $(this).offset().top + $(this).height() + 6; //6 is the border and padding
	width=($(this).width());
	
	div = $("<div class='subMenu campaignListSubMenu'></div>").css({"left":left,"top":top})
				.mouseleave(function(){  $(this).remove();   });
				
	li_list = ["Advertiser Page","Advertiser Optout","System Optout","Other"]
	
	for (var i = 0; i < li_list.length; i++){
		li = $("<li></li>").addClass("subMenuOptions").text(li_list[i]).click(function(){
				$(descriptionInput).val($(this).text());
				$(".subMenu").remove();
		});
		div.append(li);			
	}
	fieldset.append(div);
});


function resetForm(){
	$(".campaignCategory")[0].reset(); 
	$(".campaignCategory").find("textarea").val("");
	$("#buttonAdInfo").val("Create");
	$(".campaignListSubMenu").remove();
}

function resetLinkIdForm(){
	var currentBox = $('#linkId-box');
	currentBox.find('input').val('');
	currentBox.find('.addLinkId').val("Add New Link").attr('action','create');
}
