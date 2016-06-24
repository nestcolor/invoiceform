function getFileName() {
	//copy file name to field invoiceCenter
	var filenamePath = document.getElementById("attachmentFile").value;
	var filenameFakepath = filenamePath.substring(filenamePath.lastIndexOf("/") + 1);
	var filenameExtension = filenameFakepath.replace(/^.*\\/, "");
	var filename = filenameExtension.substr(0, filenameExtension.lastIndexOf('.'));
	document.getElementById('invoiceCenter').value = filename;
}

var newList = JSON.parse(lists);
for(var key in newList){
	console.log(newList[key])
}

$(document).ready(function(){

	//show and hide attr
	$('input[type=radio][name=sendTo]').change(function() {
		if (this.value == '2') {
			$('div.company').hide();
			$('div.contactName').hide();
			$('div.contactMail').hide();
			$('div.company input').removeAttr('required');
			$('div.contactName input').removeAttr('required');
			$('div.contactMail input').removeAttr('required');
		}
		else if (this.value == '1') {
			$('div.company').show();
			$('div.contactName').show();
			$('div.contactMail').show();
			$('div.company input').attr('required','required');
			$('div.contactName input').attr('required','required');
			$('div.contactMail input').attr('required','required');
		}
	});

	// fill the fields from db
	$("input[name=company]").focusout(function(){
		var company =$(this).val();
		for(var key in newList){
			if(newList[key].company == company){
				$('input[name=contactName]').val(newList[key].contactName);
				$('input[name=contactMail]').val(newList[key].contactMail);
			}
		}
	});

	// show loading image
	$('#contact-submit').click(function(){
		$('#loader-icon').css('display','block');
	})
});