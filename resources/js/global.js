function toggleElement(el){
	var A = $("#sub_menu_"+el).css("display");
	if (A == "block"){
		$("#sub_menu_"+el).css("display","none");
		$("#mark_"+el).html("&raquo;");
	}
	else{
		$("#sub_menu_"+el).css("display","block");
		$("#mark_"+el).html("&laquo;");
	}
}

function showhideelement(obj,targetelement,thetrigger){
	var b = document.getElementById(targetelement);
	var c = thetrigger.split(",");
	var d = false;
	for (i = 0; i < c.length; i++){
		if (obj.value == c[i]){
			d = true;
			break;
		}
	}
	if (d){
		b.style.display = 'inline-block';
	}
	else{
		b.style.display = 'none';
	}
}

function openitem(link,width,height){
	return window.open(link,"wopen","statusbar=no,menubar=no,toolbar=no,scrollbars=yes,resizable=yes,width="+width+",height="+height+"");
}

function loadpagefromcombo(obj,url){
	window.open(url+obj.options[obj.selectedIndex].value,"_self");
}

function getCookie(c_name){
	if (document.cookie.length>0){
		c_start=document.cookie.indexOf(c_name + "=");
		if (c_start!=-1){
			c_start=c_start + c_name.length+1;
			c_end=document.cookie.indexOf(";",c_start);
			if (c_end==-1)
				c_end=document.cookie.length;
			return unescape(document.cookie.substring(c_start,c_end));
		}
	}
	return "";
}

function setCookie(c_name,value,expiredays){
	var exdate=new Date();
	exdate.setDate(exdate.getDate()+expiredays);
	document.cookie=c_name+ "=" +escape(value)+((expiredays==null) ? "" : ";expires="+exdate.toUTCString());
}

function deleteCookie (cookie_name){
	var cookie_date = new Date ( );  // current date & time
	cookie_date.setTime ( cookie_date.getTime() - 1 );
	document.cookie = cookie_name + "=; expires=" + cookie_date.toGMTString();
}

function checkCookie(cname){
	var cookname = getCookie(cname);
	if (cookname != null && cookname != ""){
		delete_cookie(cname);
	}
	else{
		setCookie(cname,'1');
	}
}

function getKeyEvent(e){
	var keynum;
	if (window.event) 
		keynum = e.keyCode;
	else if(e.which) 
		keynum = e.which;
	return keynum;
}

function isNumeric(strString){
	var strValidChars = "0123456789.,";
	var strChar;
	var blnResult = true;

	if (strString.length == 0)
		return false;

	for (i = 0; i < strString.length && blnResult == true; i++){
		strChar = strString.charAt(i);
		if (strValidChars.indexOf(strChar) == -1){
			blnResult = false;
		}
	}
	return blnResult;
}

function getKeyEventRek(e){
	var keynum;
	if (window.event) 
		keynum = e.keyCode;
	else if(e.which) 
		keynum = e.which;
	return keynum;
}

function checknumberrek(e){
 	var kn = getKeyEventRek(e);
 	if (kn < 58 || e.keyCode == 37 || e.keyCode == 39){
		return true;
	}
	else
		return false;
}

function checkNumber(e){
	var kn = getKeyEvent(e);
	if ((kn > 47 && kn < 58) || kn == 46){
		return true;
	}
	else{
		return false;
	}
}

function replaceString(str,find,replacement){
	while (str.indexOf(find) != -1){
		str = str.replace(find,replacement);	
	}
	return str;
}

function insertingfs(obj){
	if (typeof(window.thousandseparator) == 'undefined'){
		window.thousandseparator = ',';
	}
	var price = replaceString(obj.value,window.thousandseparator,"");
	if (isNumeric(price)){
		obj.value = formatnumberkeyup(price);
	}
}

function formatnumberkeyup(prices){
	if (typeof(window.thousandseparator) == 'undefined'){
		window.thousandseparator = ',';
	}
	if (typeof(window.decimalseparator) == 'undefined'){
		window.decimalseparator = '.';
	}
	
	price = ''+prices;
	
	var firstchar = price.charAt(0);
	var signs = '';
	if (firstchar == '-'){
		price = price.substr(1);
		signs = '-';
	}
	
	var decimalpoint = price.indexOf(window.decimalseparator);
	var decimals = '';
	if (decimalpoint != -1){
		decimals = window.decimalseparator+price.substr(decimalpoint+1);
		price = price.substr(0,decimalpoint);
	}
	if (price.length > 3) {
		mod = price.length % 3;
		output = (mod > 0 ? price.substr(0,mod) : '');
		for (var i=0 ; i < Math.floor(price.length / 3); i++) {
			if ((mod == 0) && (i == 0))
				output += price.substr(mod + 3 * i, 3);
			else
				output += window.thousandseparator+price.substr(mod + 3 * i, 3);
		}
		return signs+output+decimals;
	}
	else{
		return signs+price+decimals;
	}
}

function generatePageNavigation(arrdata){
	var pagenow = arrdata[0];
	var totalrecord = arrdata[1];
	var totalpage = arrdata[2];
	var startrecord = arrdata[3];
	var endrecord = arrdata[4];
	
	var pagenav = 'Page <b>'+pagenow+'</b> of <b>'+totalpage+'</b>';
	
	if (totalpage > 1){
		var navp = '<a class="pagenavs" href="javascript:search('+(pagenow-1)+')" title="Previous">&lt;</a>&nbsp;';
		var navn = '<a class="pagenavs" href="javascript:search('+(parseInt(parseInt(pagenow)+1))+')" title="Next">&gt;</a>';
		var navfirst = '<a class="pagenavs" href="javascript:search(1)" title="First Page">&lt;&lt;</a>&nbsp;&nbsp;';
		var navlast = '&nbsp;&nbsp;<a class="pagenavs" href="javascript:search('+(totalpage)+')" title="Last Page">&gt;&gt;</a>';
		
		if (pagenow == 1){
			navp = '';
			navfirst = '';
		}
		else if (pagenow == totalpage){
			navn = '';
			navlast = '';
		}

		var pagelink = '';
		pagelink += navfirst;
		pagelink += navp;
		var left = pagenow - 5;
		var right = parseInt(parseInt(pagenow) + 5);
		if (left < 1){
			right += Math.abs(left) + 1;
			left = 1;
		}
		if (right > totalpage){
			left += (totalpage - right);
			if (left < 1)
				left = 1;
			right = totalpage;
		}
		if (left > 1){
			pagelink += '...&nbsp;';
		}
		for (l = left; l <= right; l++){
			if (l == pagenow){
				pagelink += '<span class="activepagenavs">'+l+'</span>&nbsp;';
			}
			else{
				pagelink += '<a class="pagenavs" href="javascript:search('+l+')"><b>'+l+'</b></a>&nbsp;';					
			}
		}
		if (right < totalpage){
			pagelink += '... &nbsp;&nbsp;';
		}
		pagelink += navn;
		pagelink += navlast;
		
		pagenav += "&nbsp;&nbsp;&nbsp;|&nbsp;&nbsp;&nbsp;"+pagelink;
	}
	$("#pagetop").html(pagenav);
	$("#pagebottom").html(pagenav);
	
	var recordview = 'Record '+formatnumbernodec(startrecord)+' - '+formatnumbernodec(endrecord)+' of total '+formatnumbernodec(totalrecord);
	$("#recordstop").html(recordview);
	$("#recordsbottom").html(recordview);
}

function generatePageNavigation01(arrdata){
	var pagenow = arrdata[0];
	var totalrecord = arrdata[1];
	var totalpage = arrdata[2];
	var startrecord = arrdata[3];
	var endrecord = arrdata[4];
	
	var pagenav = 'Page <b>'+pagenow+'</b> of <b>'+totalpage+'</b>';
	
	if (totalpage > 1){
		var navp = '<a class="pagenavs" href="javascript:search('+(pagenow-1)+')" title="Previous">&lt;</a>&nbsp;';
		var navn = '<a class="pagenavs" href="javascript:search('+(parseInt(parseInt(pagenow)+1))+')" title="Next">&gt;</a>';
		var navfirst = '<a class="pagenavs" href="javascript:search(1)" title="First Page">&lt;&lt;</a>&nbsp;&nbsp;';
		var navlast = '&nbsp;&nbsp;<a class="pagenavs" href="javascript:search('+(totalpage)+')" title="Last Page">&gt;&gt;</a>';
		
		if (pagenow == 1){
			navp = '';
			navfirst = '';
		}
		else if (pagenow == totalpage){
			navn = '';
			navlast = '';
		}

		var pagelink = '';
		pagelink += navfirst;
		pagelink += navp;
		var left = pagenow - 5;
		var right = parseInt(parseInt(pagenow) + 5);
		if (left < 1){
			right += Math.abs(left) + 1;
			left = 1;
		}
		if (right > totalpage){
			left += (totalpage - right);
			if (left < 1)
				left = 1;
			right = totalpage;
		}
		if (left > 1){
			pagelink += '...&nbsp;';
		}
		for (l = left; l <= right; l++){
			if (l == pagenow){
				pagelink += '<span class="activepagenavs">'+l+'</span>&nbsp;';
			}
			else{
				pagelink += '<a class="pagenavs" href="javascript:search('+l+')"><b>'+l+'</b></a>&nbsp;';					
			}
		}
		if (right < totalpage){
			pagelink += '... &nbsp;&nbsp;';
		}
		pagelink += navn;
		pagelink += navlast;
		
		pagenav += "&nbsp;&nbsp;&nbsp;|&nbsp;&nbsp;&nbsp;"+pagelink;
	}
	$("#pagetop01").html(pagenav);
	$("#pagebottom01").html(pagenav);
	
	var recordview = 'Record '+formatnumbernodec(startrecord)+' - '+formatnumbernodec(endrecord)+' of total '+formatnumbernodec(totalrecord);
	$("#recordstop01").html(recordview);
	$("#recordsbottom01").html(recordview);
}

function formatnumbernodec(prices){
	if (typeof(window.thousandseparator) == 'undefined'){
		window.thousandseparator = ',';
	}
	
	price = ''+prices;
	if (price.length > 3) {
		mod = price.length % 3;
		output = (mod > 0 ? price.substr(0,mod) : '');
		for (var i=0 ; i < Math.floor(price.length / 3); i++) {
			if ((mod == 0) && (i == 0))
				output += price.substr(mod + 3 * i, 3);
			else
				output += window.thousandseparator+price.substr(mod + 3 * i, 3);
		}
		return output;
	}
	else{
		return price;
	}
}

function alltoggle(){
	for (a=3;a<=10;a++){
	var b = document.getElementById('rows'+a);
	if (b.style.display == 'table-row')
		b.style.display = 'none';
	else
		b.style.display = 'table-row';
	}
}

function s_in_array_ri(keyw,ary){
	var found = -1;
	if (!isNumeric(keyw)){
		keyw = keyw.toUpperCase();
	}
	if (typeof(ary) != "undefined"){
		for (var b = 0; b < ary.length; b++){
			if (!isNumeric(ary[b])){
				ary[b] = ary[b].toUpperCase();
			}
			if (keyw == ary[b]){
				found = b;
				break;
			}
		}
	}
	return found;
}

function findPos(obj,includeoffset) {
	var coords = { x: 0, y: 0 };
	if (obj){
		if (includeoffset){
			if (obj.offsetParent) {
				while (obj) {
					coords.x += obj.offsetLeft;
					coords.y += obj.offsetTop;
					obj = obj.offsetParent;
				}
			}
		}
		else{
			coords.x += obj.offsetLeft;
			coords.y += obj.offsetTop;
		}
	}
	return coords;
}

function formatNumber(prices){
	var separator = ',';
	var decseparator = '.';
	var decimals = decseparator + '00';
	var sign = '';
	if (prices < 0){
		sign = '-';
		prices = Math.abs(prices);
	}
	
	price = '' + prices;
	var decimalpoint = price.indexOf(".");
	if (decimalpoint != -1){
		price = price.substr(0, decimalpoint);
		var temps = Math.round(prices * 100) / 100;
		temps = '' + temps;
		var decimalnow = temps.substr(decimalpoint + 1);
		if (decimalnow.length == 0){
			decimalnow = '00';
		}
		else if (decimalnow.length == 1){
			decimalnow = decimalnow + '0';
		}
		decimals = decseparator + decimalnow;
	}
	if (price.length > 3) {
		mod = price.length % 3;
		output = (mod > 0 ? price.substr(0, mod) : '');
		for (var i=0 ; i < Math.floor(price.length / 3); i++) {
			if ((mod == 0) && (i == 0)){
				output += price.substr(mod + 3 * i, 3);
			}
			else{
				output += separator+price.substr(mod + 3 * i, 3);
			}
		}
		return sign + output + decimals;
	}
	else{
		if (price == ''){
			price = '0';
		}
		return sign + price + decimals;
	}
}

function trim(str, chars) {
	return ltrim(rtrim(str, chars), chars);
}
 
function ltrim(str, chars) {
	chars = chars || "\\s";
	return str.replace(new RegExp("^[" + chars + "]+", "g"), "");
}
 
function rtrim(str, chars) {
	chars = chars || "\\s";
	return str.replace(new RegExp("[" + chars + "]+$", "g"), "");
}

$(document).ready(function(){
	$('.input-amount').focus(function(){
		var value = $(this).val();
		value = replaceString(value, ",", "");
		$(this).val(value);
	});
	
	$('.input-amount').blur(function(){
		var value = $(this).val();
		if (!isNumeric(value)){
			value = '0';
		}
		value = formatNumber(value);
		$(this).val(value);
	});
});