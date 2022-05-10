// Скрипт для преобразования страницы в печатную форму

function setActiveStyleSheet(title) {    
    var i, a, main;    
    for(i=0; (a = document.getElementsByTagName("link")[i]); i++) {      
    if(a.getAttribute("rel").indexOf("style") != -1 && a.getAttribute("title"))   
        {        
            a.disabled = true;        
            if(a.getAttribute("title") == title) a.disabled = false;     
        }    
    }  
}  
   
function getActiveStyleSheet(){  
    var i, a;    
    for(i=0; (a = document.getElementsByTagName("link")[i]); i++)   
    {      
        if(a.getAttribute("rel").indexOf("style") != -1 && a.getAttribute("title") && !a.disabled)   
        return a.getAttribute("title");    
    }   
    return null;  
}  
  
function getPreferredStyleSheet()   
{    
    var i, a;    
    for(i=0; (a = document.getElementsByTagName("link")[i]); i++)   
    {      
        if(a.getAttribute("rel").indexOf("style") != -1 && a.getAttribute("rel").indexOf("alt") == -1 && a.getAttribute("title"))   
        return a.getAttribute("title");    
    }    
    return null;  
}  
  
function createCookie(name,value,days)   
{    
    if (days)   
    {      
    var date = new Date();      
    date.setTime(date.getTime()+(days*24*60*60*1000));      
    var expires = "; expires="+date.toGMTString();    
    }    
    else expires = "";    
    document.cookie = name+"="+value+expires+"; path=/";}  
  
function readCookie(name)   
{    
    var nameEQ = name + "=";    
    var ca = document.cookie.split(';');    
    for(var i=0;i < ca.length;i++)   
    {      
        var c = ca[i];      
        while (c.charAt(0)==' ') c = c.substring(1,c.length);      
        if (c.indexOf(nameEQ) == 0)   
        return c.substring(nameEQ.length,c.length);    
    }    
    return null;  
}  
  
window.onload = function(e) {    
var cookie = readCookie("style");    
var title = cookie ? cookie : getPreferredStyleSheet();    
setActiveStyleSheet(title);  
}  
window.onunload = function(e) {    
var title = getActiveStyleSheet();    
createCookie("style", title, 365);  
}  
var cookie = readCookie("style");   
var title = cookie ? cookie : getPreferredStyleSheet();  
setActiveStyleSheet(title);


// Распечатка
function printit(){ 
window.print() ; 
}



// Увеличение ЛЕВОЙ фотографии дома
function PhotoFlatOver()
{
var photo1 = document.getElementById("photo1");
var photo2 = document.getElementById("photo2");
var map = document.getElementById("map");
   
    if(photo1.style.width = "48%") {
        photo1.style.width = "79%";
        photo2.style.width = "19%";
        map.style.top = "35em";

}
    else {
        photo1.style.width = "48%";
        photo2.style.width = "48%";
        map.style.top = "22em";
        
    }

}

// Уменьшение ЛЕВОЙ фотографии дома
function PhotoFlatOut()
{
var photo1 = document.getElementById("photo1");
var photo2 = document.getElementById("photo2");
var map = document.getElementById("map");
    
    if(photo1.style.width = "79%") {
        photo1.style.width = "48%";
        photo2.style.width = "48%";
        map.style.top = "22em";
        
     }
    else {
       photo1.style.width = "79%";
       photo2.style.width = "19%";
       map.style.top = "35em";
       
    }
}

// Увеличение ПРАВОЙ фотографии дома
function PhotoFlatOver1()
{
var photo1 = document.getElementById("photo1");
var photo2 = document.getElementById("photo2");
var map = document.getElementById("map");
    
    if(photo2.style.width = "48%") {
        photo2.style.width = "79%";
        photo1.style.width = "19%";
        map.style.top = "35em";
    }
    else {
        photo2.style.width = "48%";
        photo1.style.width = "48%";
        map.style.top = "22em";
    }
}

// Уменьшение ПРАВОЙ фотографии дома
function PhotoFlatOut1()
{
var photo1 = document.getElementById("photo1");
var photo2 = document.getElementById("photo2");
var map = document.getElementById("map");
    
    if(photo2.style.width = "79%") {
        photo2.style.width = "48%";
        photo1.style.width = "48%";
        map.style.top = "22em";
    }
    else {
       photo2.style.width = "79%";
       photo1.style.width = "19%";
       map.style.top = "35em"; 
    }
}


// Показать фото квартиры
function showPhoto3()
{
var myDiv = document.getElementById("flats3");
var myShow = document.getElementById("show3");
    if(myDiv.style.display == "none") {
    myDiv.style.display = "inline";
    myShow.value = "Скрыть фото"; 
    } 
    else {
    myDiv.style.display = "none";
    myShow.value = "Показать все фото";
    }
return false;
}


function showPhoto2()
{
var myDiv = document.getElementById("flats2");
var myShow = document.getElementById("show2");
    if(myDiv.style.display == "none") {
    myDiv.style.display = "inline";
    myShow.value = "Скрыть фото"; 
    } 
    else {
    myDiv.style.display = "none";
    myShow.value = "Показать все фото";
    }
return false;
}

// Показать фото квартиры
function showPhoto1()
{
var myDiv = document.getElementById("flats1");
var myShow = document.getElementById("show1");
    if(myDiv.style.display == "none") {
    myDiv.style.display = "inline";
    myShow.value = "Скрыть фото"; 
    } 
    else {
    myDiv.style.display = "none";
    myShow.value = "Показать все фото";
    }
return false;
}

// Показать карту
function showMap()
{
var myDiv = document.getElementById("mapFrame");
var myShow = document.getElementById("show");
    if(myDiv.style.display == "none") {
    myDiv.style.display = "block";
    myShow.value = "Скрыть карту"; 
    } 
    else {
    myDiv.style.display = "none";
    myShow.value = "Показать на карте";
    }
return false;
}


// Подбор недвижимости по категориям
function showSubCont()
{
var myDiv = document.getElementById("sub_cont");
    if(myDiv.style.display == "none") {
    myDiv.style.display = "block"; 
    } 
    else {
    myDiv.style.display = "none";
    }
return false;
}

// Подбор недвижимости по параметрам (скрыть / показать панель)
function showForm()
{
var myDiv = document.getElementById('frame');
if(myDiv.style.display == 'none')
{
myDiv.style.display = 'block';
} else {
myDiv.style.display = 'none';
}
return false;
}




// Google Analitics

  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
  })(window,document,'script','//www.google-analytics.com/analytics.js','ga');

  ga('create', 'UA-42092813-1', 'прага-кор.рф');
  ga('send', 'pageview');

 
