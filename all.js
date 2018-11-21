name = "avi";
datoin = 0;
function chkLogged () 
{
 	xhr = new XMLHttpRequest();
 	xhr.onreadystatechange = function() 
 	{
 		if(xhr.readyState == 4 && xhr.status == 200)
 		{
 			txt = xhr.responseText;
 			txt = txt.split("\n");
 			if(txt[0] != 0)
 			{
 				name = txt[0];
 				datoin = txt[1];
 				userLogged(name, datoin);
 			}
 		}
 	}
 	xhr.open("GET", "all.php?logged=0");
 	xhr.send(null);
}


function logout()
{
	xhr = new XMLHttpRequest();
	xhr.onreadystatechange = function() 
 	{
 		//alert(xhr.status + xhr.readyState);
 		//alert(xhr.responseText);
 		if(xhr.readyState == 4 && xhr.status == 200)
 		{
 			txt = xhr.responseText;
 			//alert(xhr.status + txt + "herein");
 		}
 	}
	xhr.open("GET", "all.php?datoin=" + datoin);
 	xhr.send(null);
 	//window.location.href = "homepage.html";
}

function userLogged(name, datoin) {
	div1 = document.getElementById("div1");
	div2 = document.getElementById("div2");
	ui = document.getElementById("ui");
	un = document.getElementById("un");
	ud = document.getElementById("ud");
	login = document.getElementById("login");
	signup = document.getElementById("signup");
	lg = document.createElement("button");
	dispname = document.createElement("h4");
	dispdatoin = document.createElement("span");
	dispdatoin.innerHTML = datoin;
	dispdatoin.style.fontWeight = "bold";
	dispdatoin.style.width = "30px";
	uimg = document.createElement("img");
	uimg.src = "images/user.png";
	uimg.id = "loginimg";
	dimg = document.createElement("img");
	dimg.src = "images/datoin.png";
	dimg.id = "datoin";
	ui.appendChild(uimg);
	dispname.id = "loginuser";
	dispname.innerHTML = " " + name;
	dispdatoin.id = "logindatoin";
	dispdatoin.innerHTML = datoin;
	lg.onclick = logout;
	lg.id = "lout";
	lg.className = "logsign";
	lg.ondblclick = function (){window.location.href = "homepage.html";}
	lg.innerHTML = "Logout";
	div1.removeChild(login);
	div2.replaceChild(lg, signup);
	un.appendChild(dispname);
	ud.appendChild(dispdatoin);
	ud.appendChild(dimg);


	document.getElementById("datasheetlink").href = "datasets.html";
	document.getElementById("surveyslink").href = "surveys.html";
}

function openAsk() {
    document.getElementById("askForm").style.display = "block";
}

function closeAsk() {
    document.getElementById("askForm").style.display = "none";
}


function attachLinks() {
	if(document.getElementById("datasheetlink") == "http://localhost/project/homepage.html#")
	{
		alert("Please login or signup before");
	}

	if(document.getElementById("surveyslink") == "http://localhost/project/homepage.html#")
	{
		alert("Please login or signup before");
	}
}


