function open_settings() {
	window.location.assign("/settings.php")
}


function run(){
	localStorage.setItem("forward_val");
	localStorage.setItem("reverse_val");
	localStorage.setItem("left_val");
	localStorage.setItem("right_val");
	
	if (localStorage.getItem('forward_val') != null){
		localStorage.forward_val = 38;
	}
	if (localStorage.getItem('reverse_val') != null){
		localStorage.reverse_val = 40;
	}
	if (localStorage.getItem('left_val') != null){
		localStorage.left_val = 37;
	}
	if (localStorage.getItem('right_val') != null){
		localStorage.right_val = 39;
	}
}