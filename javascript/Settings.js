var keys = [
"Up",
"Down",
"Left",
"Right",
"W",
"A",
"S",
"D",
 ];
 
 var keyval = [
"38",
"40",
"37",
"39",
"87",
"65",
"83",
"68",
 ];
 
 var Assign = [
"Forward",
"Reverse",
"Left",
"Right",
"Stop"
 ];

function run(){
	var x = document.getElementById("keys");
	for (var i = 0; i < keys.length; i++) {
		var option = document.createElement("option");
		option.text = keys[i];
		x.add(option);
	}
	
	var y = document.getElementById("assign");
	for (var i = 0; i < Assign.length; i++) {
		var option = document.createElement("option");
		option.text = Assign[i];
		y.add(option);
	}

}

function set(){
	var e = document.getElementById("assign");
	var f = document.getElementById("keys");
	var Assign = e.options[e.selectedIndex].value;
	var Keys = f.options[e.selectedIndex].value;
	var key = keyval[keys.indexOf(Keys)];
	
	if (Assign = 'Forward'){
		localStorage.forward_val = key;
	}
	if (Assign = 'Reverse'){
		localStorage.reverse_val = key;
	}
	if (Assign = 'Left'){
		localStorage.left_va = key;
	}
	if (Assign = 'Right'){
		localStorage.left_val = key;
	}
	
	document.getElementById("forward").innerHTML = localStorage.forward_val
}

