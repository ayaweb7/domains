// Функция O
function O(obj)
{
	if (typeof obj == 'object') return obj
	else return document.getElementById(obj)
}

// Функция S
function S(obj)
{
	return O(obj).style
}

// Функция C
function C(name)
{
	var elements = document.getElementsByTagName('*')
	var objects = []
	for (var i = 0 ; i < elements.length ; ++i)
		if (elements[i].className == name)
		objects.push(elements[i])
	return objects
}

// 
var portfolioDiv = document.getElementById('portfolio');
    var resultsDiv = document.getElementById('results');

    var portfolioBtn = document.getElementById('RenderPortfolio_Btn');
    var resultsBtn = document.getElementById('RenderResults_Btn');

    portfolioBtn.onclick = function() {
        resultsDiv.setAttribute('class', 'hidden');
        portfolioDiv.setAttribute('class', 'visible');
    };

    resultsBtn.onclick = function() {
        portfolioDiv.setAttribute('class', 'hidden');
        resultsDiv.setAttribute('class', 'visible');
    };

function changeDiv()
  {
  document.getElementById('body').hidden = 'hidden'; // hide body div tag
  document.getElementById('body1').hidden = ''; // show body1 div tag
  document.getElementById('body1').innerHTML = 'If you can see this, JavaScript function worked'; 
  // display text if JavaScript worked
   }
   
document.getElementById('xyz').style.display ='block';  // to hide
//document.getElementById('xyz').style.display ='none';  // to display



//
function showHide() {
   var div = document.getElementById(hidden_div);
   if (div.style.display == 'none') {
     div.style.display = '';
   }
   else {
     div.style.display = 'none';
   }
 }
 
 // !!!!!!!!!!!!!!!!!!!!!!  Разные скачанные коды по скрытию блоков !!!!!!!!!!!!!!!!!!!!!!!!!!!!!
 
// <div><a href="#inlinik" title="Наверх страницы"><img src="images/buttonUpActive.png"/></a></div>-->	
// <A href="javascript:void(0)" onclick="scroll(0,0)"
//   ><IMG src=./pic/up.gif width=35 height=35
//         border=0 alt=Вверх hspace=10 vspace=10			<input id='test' class='inputbuttonflat' type='submit' src='images/shop.png' alt='Товары в магазине'/>
// <a href='#inlinik' title='Товары в магазине' type='submit'/></a> 		 onclick="goToAnchor('inlinik'); return falshe;"			<button type="button" onclick="alert(location.hash)">получить якорь к которому при загрузки прокручивается документ</button>
// 					<button type="button" onclick=>добавить (или изменить) якорь в адрес страницы</button>-->
// onclick="goToAnchor1('tops')"   <button type="button" onclick="alert(location)">получить URL</button>-->
// <input type='submit' name='submit' type='image' src='images/shop.png' /> history.back(); return falshe;"-->
// value='ПОКАЗАТЬ ТОВАРЫ В МАГАЗИНЕ' -->
// onclick="document.getElementById('inlinik').style.display='block'; return false;" -->
// onsubmit="document.getElementById('inlinik').style.display='block'; return false;" -->
// "this.style.display='none'; document.getElementById('hiddenik').style.display='none';  -->