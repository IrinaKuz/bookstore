var genres = document.querySelectorAll('aside ul li');

for (let i = 0; i < genres.length; i++) {
	genres[i].addEventListener('click', ajaxFunction);
}

function ajaxFunction(event){
	var ajaxRequest; 
	try {
		// Opera 8.0+, Rirefox, Safari
		ajaxRequest = new XMLHttpRequest();
	} catch(e) {
		// IE
		try {
			ajaxRequest = new ActivXObject("Msxml2.XMLHTTP");
		} catch(e) {
			try{
				ajaxRequest = new ActivXObject("Microsoft.XMLHTTP");
			} catch(e) {
				// Something went wrong
				alert("Your browser broke!");
				return false;
			}
		}
	}
	ajaxRequest.onreadystatechange = function() {
		if(ajaxRequest.readyState == 4) {
			var ajaxDisplay = document.querySelector('#query_result');
			ajaxDisplay.innerHTML = ajaxRequest.responseText;
		}
	}

	// get value from user and pass it to server script
	var queryString = "?genre=" + this.textContent.toLowerCase();
	
	ajaxRequest.open("GET", "ajax_request.php" + queryString, true);
	ajaxRequest.send(null);
}