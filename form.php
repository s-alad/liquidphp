<html>
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
		<script type="text/javascript" src="https://code.jquery.com/jquery-1.9.1.js" data-src="https://code.jquery.com/jquery-1.9.1.js"></script>
		<script type="text/javascript" src="https://code.jquery.com/ui/1.10.3/jquery-ui.js" data-src="https://code.jquery.com/ui/1.10.3/jquery-ui.js"></script>
		<link rel="stylesheet" type="text/css" media="screen" href="https://app01.convergehub.com/assets/css/style.php?param=cGlua3wjZjEyNTQ1fCNmMzI3NDc="> 		<link rel="stylesheet" type="text/css" media="screen" href="https://app01.convergehub.com/assets/css/jquery-ui.php?param=cGlua3wjZjEyNTQ1fCNmMzI3NDc="> 		<script type="text/javascript">
			                //Sujata 0013348: multiple document upload in web to lead
                function dropdownSaveWithname(id,field,val){ }
                $(document).ready(function() {
                    var max_fields      = $('#max_file_upload_limit').val(); //maximum input boxes allowed
                    var wrapper         = $(".input_fields_wrap"); //Fields wrapper
                    var add_button      = $(".add_field_button"); //Add button ID
                    
                    var x = 1; //initlal text box count
                    var y = $('#browse_count').val();
                    $(add_button).click(function(e){ //on add input button click
                        e.preventDefault();
                        if(y < max_fields){ //max input box allowed
                            x++;//text box increment
                            y = parseInt(y)+1;
                            var file_content='';
                            var file_type_content = $('#file_type_content').val().split(',');
                            $.each(file_type_content, function(i, val) {
                                 file_content += '<option value="'+val+'">'+val+'</option>';
                            });
                            $('#browse_count').val(y);
                            base_url = $('#base_url').val();
                                 $(wrapper).append('<div style="line-height:25px"><select style="border: 1px solid #E5E5E5;color: #5D5D5D;font-size: 12px;font-weight: normal;height: 28px;margin: 0 6px 5px 0;padding: 0 0 0 5px;width: 178px; background-color:#fff; line-height:28px;" name="library_file_type'+x+'" id="library_file_type'+x+'"><option>Select</option>'+file_content+'</select><input name="file_upload[]" id="file_upload'+x+'" type="file" style="color: #5D5D5D;font-size: 12px;font-weight: normal;height: 28px;margin: 0 6px 5px 0;width: 171px;"/><span style="margin-right:0px;">&nbsp;</span><span class="remove_field" style="cursor: pointer; color: #FF0000; font-weight: bold; line-height: 30px; margin-left:10px;" title="Remove">Remove</span></div>');                      }
                    });
                
                $(wrapper).on("click",".remove_field", function(e){ //user click on remove text
					// Anirban - 0013411: Please fix this issue
					var dltconfirm = confirm("Are you sure you want to delete?");
					if (dltconfirm == true) {
                    e.preventDefault(); $(this).parent('div').remove(); y=parseInt(y)-1;
                    $('#browse_count').val(y);
					}
					// 0013411 - End
                })
 				//koushik: 13431: include template in web to leads
                var req_fields_str = $('#req_id').val();                                
                if(req_fields_str != ''){
                     req_fields_str = req_fields_str.substring(0,req_fields_str.lastIndexOf(';'));
                     var req_fields_arr = req_fields_str.split(';');
                     req_fields_arr.forEach(function(db_field_name, index){
                        $('#'+db_field_name+'_color').show();
                    });
                }
                //End 13431
            });
            //End 0013348
			function validateUrl(){
				var url_fld_id  = $('.url').attr('id');
				var url_value = $("#"+url_fld_id).val();
				if(url_value && url_value != ''){
					var url_filter= /^(http(?:s)?\:\/\/[a-zA-Z0-9\-]+(?:\.[a-zA-Z0-9\-]+)*\.[a-zA-Z]{2,4}(?:\/?|(?:\/[\w\-]+)*)(?:\/?|\/\w+\.[a-zA-Z]{2,4}(?:\?[\w]+\=[\w\-]+)?)?(?:\&[\w]+\=[\w\-]+)*)$/
					if(url_filter.test($("#"+url_fld_id).val())==false)
					$("#"+url_fld_id).attr('placeholder','Valid url required,Ex.https://www.example.com').addClass('wrong');
					if(url_filter.test(url_value)){
						$("#"+url_fld_id).removeClass('wrong');   
						return true;
					}else{
						return false;
					}
				}else{
					$("#"+url_fld_id).removeClass('wrong');
					return true;
				}
			} 
            //Sujata 0013348: multiple document upload in web to lead
            function getLibraryIdForDelete(library_id,field){
                // Rabiul - 0013926: Changes in web to lead in add and edit page.
                var con = confirm('Are you sure you want to remove this Document?');
            	if(con == true){
                var content = $('#library_ids').val()+library_id+',';
                $('#library_ids').val(content);
                $('#div_'+field).html('');
            }
                //End 0013926
            }
            //End 0013348
						function validateNumeric(obj){
				var numeric_value = obj.value;
				if(isNaN(obj.value)){
					var numeric_value = numeric_value.substr(0, numeric_value.length - 1);
					numeric_value = numeric_value.replace(/[^0-9\.]/g, "");
				}
				$("#" + obj.id).val(numeric_value.trim());
			}
			function validWebLead(){
							if(document.getElementById('email')){
				$(function(){
					var targetbox = document.getElementById('email');
					targetbox.style.color="#5D5D5D";
					targetbox.style.backgroundColor="#FFF";
					targetbox.placeholder="";
				});
				if(validateEmail(document.getElementById('email').value)=="No") { 
					var targetbox = document.getElementById('email');
					targetbox.style.backgroundColor="#FFE9E9";
					targetbox.value="";
					targetbox.placeholder="Enter a valid Mail Id";		  
					targetbox.style.color="#FF5A5A";
					targetbox.onfocus=function(){targetbox.style.color="#5D5D5D"; targetbox.style.backgroundColor="#FFF"; targetbox.placeholder="";};
					return false;		    		
				} 
			}
		var req = true;
		var req_any = true;
		if(document.getElementById('req_id') != null){
			var reqs=document.getElementById('req_id').value;
			if(reqs != ''){
				reqs = reqs.substring(0,reqs.lastIndexOf(';'));
				var req_fields = new Array();
				var req_fields = reqs.split(';');
				nbr_fields = req_fields.length;
				for(var i=0;i<nbr_fields;i++){
					var field_id = document.getElementById(req_fields[i]);
					if(field_id == null){
						var cboxes = document.getElementsByName(req_fields[i]+'[]');
						var len = cboxes.length;
						var booleanResult=false;
						for (var j=0; j<len; j++) {
							if(cboxes[j].checked){
								booleanResult=true;
								break;
							}
						}
						if(booleanResult==false){
							alert('Please fill the mandatory fields');
							req = false;
							break;
						}
					}else{
						if(field_id.value.length <=0 || field_id.value==0){
							req = false;
							var targetbox = document.getElementById(req_fields[i]);
							targetbox.style.backgroundColor="#FFE9E9";
							targetbox.placeholder="Field is required";		  
							targetbox.style.color="#FF5A5A";
							targetbox.value = "";
							targetbox.onfocus=function(){targetbox.style.color="#5D5D5D"; targetbox.style.backgroundColor="#FFF"; targetbox.placeholder="";};
							break;
						}
					}
				} 
			} 
			if(!req){
				return false;
			}	
		}
		if(document.getElementById('req_any_id') != null){
			var reqs_any=document.getElementById('req_any_id').value;
			if(reqs_any != ''){
				reqs_any = reqs_any.substring(0,reqs_any.lastIndexOf(';'));
				var labels_any=document.getElementById('label_any_id').value;
				labels_any = labels_any.substring(0,labels_any.lastIndexOf(','));
				var req_any_fields = new Array();
				var req_any_fields = reqs_any.split(';');
				nbr_any_fields = req_any_fields.length;
				for(var i_any=0;i_any<nbr_any_fields;i_any++){
					if(document.getElementById(req_any_fields[i_any]).value.length <=0 || document.getElementById(req_any_fields[i_any]).value==0){
						req_any = false;
					}else{
						req_any = true;
						break;
					}
				} 
			}	 
			if(!req_any){
				alert("Please fill up any of the following fields : "+labels_any);
				return false;
			}	
		}
		if((req_any == true) && (req == true)){
			return true;
		}else{
			return false;
		}
	}
    		function validateEmail(email) {	
			var emailReg = /^([\w-\.]+@([\w-]+\.)+[\w-]{2,4})?$/;
			if( !emailReg.test( email ) ) {
				return "No";
			} else {
				return "Yes";
			}	
		}
	function checkdate(date){
		var input=date;
		var validformat=/^\d{4}\-\d{2}\-\d{2}$/ ;					
		var returnval=false;
		if (!validformat.test(input.value))
			return false;
		else{ 
			var yearfield=input.value.split("-")[0];
			var monthfield=input.value.split("-")[1];
			var dayfield=input.value.split("-")[2];
			var dayobj = new Date(yearfield, monthfield-1, dayfield);
			if ((dayobj.getMonth()+1!=monthfield)||(dayobj.getDate()!=dayfield)||(dayobj.getFullYear()!=yearfield))
				return false;
			else
				return true;
		} 
	}
	//IFRAME//
		</script>
	</head>
	<body>
<p><input type="hidden" name="base_url" id="base_url" value="https://app01.convergehub.com/" /></p>
<div style="width: 900px; height: auto; padding: 20px; color: #838180; font-family: Helvetica,Arial,Sans-Serif;"><form name="web_to_leads" action="https://app01.convergehub.com/webtoleads/webtoleadsEntry/" method="post" onsubmit="return !!(validWebLead() &amp; validateUrl());" enctype="multipart/form-data">
<div style="color: #005688; font-size: 16px; font-weight: bold; line-height: 60px;">TEST 2</div>
<table width="100%">
<tbody>
<tr>
<td valign="top">
<table width="100%" cellpadding="7">
<tbody>
<tr>
<td height="35" align="left" valign="top" style="color: #5d5d5d; font-size: 12px; padding-top: 3px;">Salutation</td>
<td height="35" align="left" valign="top" style="color: #5d5d5d; font-size: 12px; padding-top: 3px;">
<div id="salutation_color" style="background: none repeat scroll 0 0 #FF0000; height: 29px; margin-left: -2px; float: left; width: 2px; display: none;"></div>
<select name="salutation" id="salutation" data="{salutation}" style="border: 1px solid #E5E5E5; color: #5d5d5d; font-size: 12px; font-weight: normal; height: 28px; margin: 0 6px 5px 0; padding: 0 0 0 5px; width: 178px; background-color: #fff; line-height: 28px;">
<option value="" selected="selected">Select</option>
<option value="Mr.">Mr.</option>
<option value="Mrs.">Mrs.</option>
<option value="Ms.">Ms.</option>
<option value="Prof.">Prof.</option>
<option value="Dr.">Dr.</option>
</select></td>
</tr>
<tr>
<td height="35" align="left" valign="top" style="color: #5d5d5d; font-size: 12px; padding-top: 3px;">First Name</td>
<td height="35" align="left" valign="top" style="color: #5d5d5d; font-size: 12px; padding-top: 3px;">
<div id="first_name_color" style="background: none repeat scroll 0 0 #FF0000; height: 29px; margin-left: -2px; float: left; width: 2px; display: none;"></div>
<input type="text" name="first_name" id="first_name" data="{first_name}" style="border: 1px solid #E5E5E5; color: #5d5d5d; font-size: 12px; font-weight: normal; height: 28px; margin: 0 6px 5px 0; padding: 0 0 0 5px; width: 171px;" /></td>
</tr>
<tr>
<td height="35" align="left" valign="top" style="color: #5d5d5d; font-size: 12px; padding-top: 3px;">Last Name</td>
<td height="35" align="left" valign="top" style="color: #5d5d5d; font-size: 12px; padding-top: 3px;">
<div id="last_name_color" style="background: none repeat scroll 0 0 #FF0000; height: 29px; margin-left: -2px; float: left; width: 2px; display: none;"></div>
<input type="text" name="last_name" id="last_name" data="{last_name}" style="border: 1px solid #E5E5E5; color: #5d5d5d; font-size: 12px; font-weight: normal; height: 28px; margin: 0 6px 5px 0; padding: 0 0 0 5px; width: 171px;" /></td>
</tr>
<tr>
<td height="35" align="left" valign="top" style="color: #5d5d5d; font-size: 12px; padding-top: 3px;">Email</td>
<td height="35" align="left" valign="top" style="color: #5d5d5d; font-size: 12px; padding-top: 3px;">
<div id="email_color" style="background: none repeat scroll 0 0 #FF0000; height: 29px; margin-left: -2px; float: left; width: 2px; display: none;"></div>
<input type="text" name="email" data="{email}" id="email" style="border: 1px solid #E5E5E5; color: #5d5d5d; font-size: 12px; font-weight: normal; height: 28px; margin: 0 6px 5px 0; padding: 0 0 0 5px; width: 171px;" /></td>
</tr>
</tbody>
</table>
</td>
<td valign="top">
<table width="100%" cellpadding="7"></table>
</td>
</tr>
</tbody>
</table>
<table width="100%" cellpadding="7">
<tbody>
<tr>
<td align="center" height="35" valign="middle"><input style="background-color: #66971e; border: 1px solid #77A901; background-image: -moz-linear-gradient(center top , #83C02B, #66971E); color: #ffffff !important; font: 14px Helvetica,Arial,Sans-Serif !important; height: auto; padding: 6px 10px !important; text-shadow: none; border-radius: 4px 4px 4px 4px; cursor: pointer; display: inline-block; margin: 0; text-decoration: none;" type="submit" name="submit" value="Submit" /> <input type="hidden" name="redirecturl" value="" /> <input type="hidden" name="failure_url" value="" /> <input type="hidden" name="successmsg" value="" /> <input id="label_any_id" name="label_any_id" value="First Name, Last Name, Email," type="hidden" /> <input id="req_any_id" name="req_any_id" value="first_name;last_name;email;" type="hidden" /> <!--Required Fields --> <input id="req_id" name="req_id" value="" type="hidden" /> <!--Required Fields End--> <input id="wtl_id" type="hidden" value="IcfzDmlmVV6RXsIMInCgZ5iMptN2z/H0GKP4ZNbOgnQoCfOffHwk+nXhPrVWlW1ybSccb0krhz2vfNOopwcKZQEE3hZvoPQ1CtCkwzKF9+HLHSzRbsV5DfIi+oEiCarVh8fHanpSQNjod5qXZYBVFxBesVUC+XGGhhD2+LHUo4g=" name="wtl_id" /></td>
</tr>
</tbody>
</table>
<div style="width: 880px; height: auto; padding: 10px; text-align: left; font-size: 12px;"></div>
</form></div>
</body>
</html>