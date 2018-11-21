function M_over1 ()
{
	image = document.getElementById("img1");
	image.src = "images/download_button_clicked.png";
}

function M_out1 () 
{
	image = document.getElementById("img1");
	image.src = "images/download_button.png"
}


function M_over2 ()
{
	image = document.getElementById("img2");
	image.src = "images/upload_button_clicked.png";
}

function M_out2 () 
{
	image = document.getElementById("img2");
	image.src = "images/upload_button.png"
}

function uploading()
{
	file = document.createElement("input");
	file.type = "file";
	file.width = "30px";
	file.style.position = "absolute";
	file.style.top = "500px";
	file.style.left = "400px";
	document.body.appendChild(file);
}