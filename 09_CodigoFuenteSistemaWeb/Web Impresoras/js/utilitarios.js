export function getFormData($form,option){
	var data_output = $form.serialize();
	var string_output = "opcion="+option + "&"+ data_output;
	return string_output;
}

export function sendData(url,data){
	var request = null;
	var result = "";
	if(window.XMLHttpRequest){
		request = new XMLHttpRequest();
	}
	else
		request = new ActiveXObject("Microsoft.XMLHTTP");

	request.onreadystatechange = function(){
		if(request.readyState==4 && request.status==200){
			alert( request.responseText);
			result = request.responseText;
		}
		else
			console.log(request.readyState);
	}
	request.open("POST",url,true);//el valor true es asincrono, false asincrono
	request.responseType = 'text';
	request.setRequestHeader("Content-Type","application/x-www-form-urlencoded"    );
	request.send(data);
}

