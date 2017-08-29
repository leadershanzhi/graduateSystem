function tScore(str)
{ 

	xmlHttp=GetXmlHttpObject()
	if (xmlHttp==null)
	 {
	 alert ("Browser does not support HTTP Request")
	 return
	 }
	var url="/school/testscore"
	url=url+"?q="+str.trim()
	url=url+"&sid="+Math.random()
	xmlHttp.onreadystatechange=stateChanged 
	xmlHttp.open("GET",url,true)
	xmlHttp.send(null)
	}
	
	function stateChanged() 
	{ 
	if (xmlHttp.readyState==4 || xmlHttp.readyState=="complete")
	 { 
	 document.getElementById("test").innerHTML=xmlHttp.responseText 
	 } 
	}
	
	function GetXmlHttpObject()
	{
	var xmlHttp=null;
	try
	 {
	 // Firefox, Opera 8.0+, Safari
	 xmlHttp=new XMLHttpRequest();
	 }
	catch (e)
	 {
	 //Internet Explorer
	 try
	  {
	  xmlHttp=new ActiveXObject("Msxml2.XMLHTTP");
	  }
	 catch (e)
	  {
	  xmlHttp=new ActiveXObject("Microsoft.XMLHTTP");
	  }
	 }
	return xmlHttp;
}
	
	function sdept(str)
	{ 
     
		xmlHttp=GetXmlHttpObject()
		if (xmlHttp==null)
		 {
		 alert ("Browser does not support HTTP Request")
		 return
		 }
		var url="/school/getscsdept"
		url=url+"?q="+str.trim()
		url=url+"&sid="+Math.random()
		xmlHttp.onreadystatechange=stateChangeds 
		xmlHttp.open("GET",url,true)
		xmlHttp.send(null)
		}
		
		function stateChangeds() 
		{
		if (xmlHttp.readyState==4 || xmlHttp.readyState=="complete")
		 { 
		 document.getElementById("ttt").innerHTML=xmlHttp.responseText 
		 } 
		}
		
		function GetXmlHttpObject()
		{
		var xmlHttp=null;
		try
		 {
		 // Firefox, Opera 8.0+, Safari
		 xmlHttp=new XMLHttpRequest();
		 }
		catch (e)
		 {
		 //Internet Explorer
		 try
		  {
		  xmlHttp=new ActiveXObject("Msxml2.XMLHTTP");
		  }
		 catch (e)
		  {
		  xmlHttp=new ActiveXObject("Microsoft.XMLHTTP");
		  }
		 }
		return xmlHttp;


	}
		
		function sclist(str)
		{ 
	     
			xmlHttp=GetXmlHttpObject()
			if (xmlHttp==null)
			 {
			 alert ("Browser does not support HTTP Request")
			 return
			 }
			var url="/school/getscs"
			url=url+"?q="+str.trim()
			url=url+"&sid="+Math.random()
			xmlHttp.onreadystatechange=stateChangedd 
			xmlHttp.open("GET",url,true)
			xmlHttp.send(null)
			}
			
			function stateChangedd() 
			{
			if (xmlHttp.readyState==4 || xmlHttp.readyState=="complete")
			 { 
			 document.getElementById("tt").innerHTML=xmlHttp.responseText 
			 } 
			}
			
			function GetXmlHttpObject()
			{
			var xmlHttp=null;
			try
			 {
			 // Firefox, Opera 8.0+, Safari
			 xmlHttp=new XMLHttpRequest();
			 }
			catch (e)
			 {
			 //Internet Explorer
			 try
			  {
			  xmlHttp=new ActiveXObject("Msxml2.XMLHTTP");
			  }
			 catch (e)
			  {
			  xmlHttp=new ActiveXObject("Microsoft.XMLHTTP");
			  }
			 }
			return xmlHttp;


		}