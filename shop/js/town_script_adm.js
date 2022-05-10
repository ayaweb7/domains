// Скрипт для сортировки столбцов таблицы
function convertDate(d) {
  var p = d.split("/");
  return +(p[2]+p[1]+p[0]);
}

function sortByDate() {
  var tbody = document.querySelector("#results tbody");
  // get trs as array for ease of use
  var rows = [].slice.call(tbody.querySelectorAll("tr"));
  
  rows.sort(function(a,b) {
    return convertDate(a.cells[0].innerHTML) - convertDate(b.cells[0].innerHTML);
  });
  
  rows.forEach(function(v) {
    tbody.appendChild(v); // note that .appendChild() *moves* elements
  });
}

document.querySelector("button").addEventListener("click", sortByDate);

// Скрипт для обработки запроса для показа магазинов по выбранному городу
    function vybor(f) {
    var town_VUS = document.getElementById('town_VUS');
    var town_VOL = document.getElementById('town_VOL');
    var town_VYC = document.getElementById('town_VYC');
    var town_EKA = document.getElementById('town_EKA');
    var town_CHI = document.getElementById('town_CHI');
    var town_KOR = document.getElementById('town_KOR');
    var town_KOT = document.getElementById('town_KOT');
    var town_KRA = document.getElementById('town_KRA');
    var town_MOS = document.getElementById('town_MOS');
    var town_NIZ = document.getElementById('town_NIZ');
    var town_PRI = document.getElementById('town_PRI');
    var town_SYK = document.getElementById('town_SYK');
    var town_CHE = document.getElementById('town_CHE');
    var town_EZV = document.getElementById('town_EZV');
    var button = document.getElementById('button');

	var n = f.town.selectedIndex
    if (f.town.options[n].value == 'Великий Устюг') {
        town_VUS.style.display = 'inline';
        town_VOL.style.display = 'none';
        town_VYC.style.display = 'none';
        town_EKA.style.display = 'none';
        town_CHI.style.display = 'none';
        town_KOR.style.display = 'none';
        town_KOT.style.display = 'none';
        town_KRA.style.display = 'none';
        town_MOS.style.display = 'none';
        town_NIZ.style.display = 'none';
        town_PRI.style.display = 'none';
        town_SYK.style.display = 'none';
        town_CHE.style.display = 'none';
        town_EZV.style.display = 'none';
        button.style.display = 'inline';
        }
		
	else if (f.town.options[n].value == 'Вологда') {
		town_VUS.style.display = 'none';
        town_VOL.style.display = 'inline';
        town_VYC.style.display = 'none';
        town_EKA.style.display = 'none';
        town_CHI.style.display = 'none';
        town_KOR.style.display = 'none';
        town_KOT.style.display = 'none';
        town_KRA.style.display = 'none';
        town_MOS.style.display = 'none';
        town_NIZ.style.display = 'none';
        town_PRI.style.display = 'none';
        town_SYK.style.display = 'none';
        town_CHE.style.display = 'none';
        town_EZV.style.display = 'none';
        button.style.display = 'inline';
	}
	
	else if (f.town.options[n].value == 'Вычегодский') {
		town_VUS.style.display = 'none';
        town_VOL.style.display = 'none';
        town_VYC.style.display = 'inline';
        town_EKA.style.display = 'none';
        town_CHI.style.display = 'none';
        town_KOR.style.display = 'none';
        town_KOT.style.display = 'none';
        town_KRA.style.display = 'none';
        town_MOS.style.display = 'none';
        town_NIZ.style.display = 'none';
        town_PRI.style.display = 'none';
        town_SYK.style.display = 'none';
        town_CHE.style.display = 'none';
        town_EZV.style.display = 'none';
        button.style.display = 'inline';
	}
	
	else if (f.town.options[n].value == 'Екатеринбург') {
		town_VUS.style.display = 'none';
        town_VOL.style.display = 'none';
        town_VYC.style.display = 'none';
        town_EKA.style.display = 'inline';
        town_CHI.style.display = 'none';
        town_KOR.style.display = 'none';
        town_KOT.style.display = 'none';
        town_KRA.style.display = 'none';
        town_MOS.style.display = 'none';
        town_NIZ.style.display = 'none';
        town_PRI.style.display = 'none';
        town_SYK.style.display = 'none';
        town_CHE.style.display = 'none';
        town_EZV.style.display = 'none';
        button.style.display = 'inline';
	}
	
	else if (f.town.options[n].value == 'Китай') {
		town_VUS.style.display = 'none';
        town_VOL.style.display = 'none';
        town_VYC.style.display = 'none';
        town_EKA.style.display = 'none';
        town_CHI.style.display = 'inline';
        town_KOR.style.display = 'none';
        town_KOT.style.display = 'none';
        town_KRA.style.display = 'none';
        town_MOS.style.display = 'none';
        town_NIZ.style.display = 'none';
        town_PRI.style.display = 'none';
        town_SYK.style.display = 'none';
        town_CHE.style.display = 'none';
        town_EZV.style.display = 'none';
        button.style.display = 'inline';
	}
	
	else if (f.town.options[n].value == 'Коряжма') {
		town_VUS.style.display = 'none';
        town_VOL.style.display = 'none';
        town_VYC.style.display = 'none';
        town_EKA.style.display = 'none';
        town_CHI.style.display = 'none';
        town_KOR.style.display = 'inline';
        town_KOT.style.display = 'none';
        town_KRA.style.display = 'none';
        town_MOS.style.display = 'none';
        town_NIZ.style.display = 'none';
        town_PRI.style.display = 'none';
        town_SYK.style.display = 'none';
        town_CHE.style.display = 'none';
        town_EZV.style.display = 'none';
        button.style.display = 'inline';
	}
	
	else if (f.town.options[n].value == 'Котлас') {
		town_VUS.style.display = 'none';
        town_VOL.style.display = 'none';
        town_VYC.style.display = 'none';
        town_EKA.style.display = 'none';
        town_CHI.style.display = 'none';
        town_KOR.style.display = 'none';
        town_KOT.style.display = 'inline';
        town_KRA.style.display = 'none';
        town_MOS.style.display = 'none';
        town_NIZ.style.display = 'none';
        town_PRI.style.display = 'none';
        town_SYK.style.display = 'none';
        town_CHE.style.display = 'none';
        town_EZV.style.display = 'none';
        button.style.display = 'inline';
	}
	
	else if (f.town.options[n].value == 'Красавино') {
		town_VUS.style.display = 'none';
        town_VOL.style.display = 'none';
        town_VYC.style.display = 'none';
        town_EKA.style.display = 'none';
        town_CHI.style.display = 'none';
        town_KOR.style.display = 'none';
        town_KOT.style.display = 'none';
        town_KRA.style.display = 'inline';
        town_MOS.style.display = 'none';
        town_NIZ.style.display = 'none';
        town_PRI.style.display = 'none';
        town_SYK.style.display = 'none';
        town_CHE.style.display = 'none';
        town_EZV.style.display = 'none';
        button.style.display = 'inline';
	}
	
	else if (f.town.options[n].value == 'Москва') {
		town_VUS.style.display = 'none';
        town_VOL.style.display = 'none';
        town_VYC.style.display = 'none';
        town_EKA.style.display = 'none';
        town_CHI.style.display = 'none';
        town_KOR.style.display = 'none';
        town_KOT.style.display = 'none';
        town_KRA.style.display = 'none';
        town_MOS.style.display = 'inline';
        town_NIZ.style.display = 'none';
        town_PRI.style.display = 'none';
        town_SYK.style.display = 'none';
        town_CHE.style.display = 'none';
        town_EZV.style.display = 'none';
        button.style.display = 'inline';
	}
	
	else if (f.town.options[n].value == 'Нижнекамск') {
		town_VUS.style.display = 'none';
        town_VOL.style.display = 'none';
        town_VYC.style.display = 'none';
        town_EKA.style.display = 'none';
        town_CHI.style.display = 'none';
        town_KOR.style.display = 'none';
        town_KOT.style.display = 'none';
        town_KRA.style.display = 'none';
        town_MOS.style.display = 'none';
        town_NIZ.style.display = 'inline';
        town_PRI.style.display = 'none';
        town_SYK.style.display = 'none';
        town_CHE.style.display = 'none';
        town_EZV.style.display = 'none';
        button.style.display = 'inline';
	}
	
	else if (f.town.options[n].value == 'Приводино') {
		town_VUS.style.display = 'none';
        town_VOL.style.display = 'none';
        town_VYC.style.display = 'none';
        town_EKA.style.display = 'none';
        town_CHI.style.display = 'none';
        town_KOR.style.display = 'none';
        town_KOT.style.display = 'none';
        town_KRA.style.display = 'none';
        town_MOS.style.display = 'none';
        town_NIZ.style.display = 'none';
        town_PRI.style.display = 'inline';
        town_SYK.style.display = 'none';
        town_CHE.style.display = 'none';
        town_EZV.style.display = 'none';
        button.style.display = 'inline';
	}
	
	else if (f.town.options[n].value == 'Сыктывкар') {
		town_VUS.style.display = 'none';
        town_VOL.style.display = 'none';
        town_VYC.style.display = 'none';
        town_EKA.style.display = 'none';
        town_CHI.style.display = 'none';
        town_KOR.style.display = 'none';
        town_KOT.style.display = 'none';
        town_KRA.style.display = 'none';
        town_MOS.style.display = 'none';
        town_NIZ.style.display = 'none';
        town_PRI.style.display = 'none';
        town_SYK.style.display = 'inline';
        town_CHE.style.display = 'none';
        town_EZV.style.display = 'none';
        button.style.display = 'inline';
	}
	
	else if (f.town.options[n].value == 'Челябинск') {
		town_VUS.style.display = 'none';
        town_VOL.style.display = 'none';
        town_VYC.style.display = 'none';
        town_EKA.style.display = 'none';
        town_CHI.style.display = 'none';
        town_KOR.style.display = 'none';
        town_KOT.style.display = 'none';
        town_KRA.style.display = 'none';
        town_MOS.style.display = 'none';
        town_NIZ.style.display = 'none';
        town_PRI.style.display = 'none';
        town_SYK.style.display = 'none';
        town_CHE.style.display = 'inline';
        town_EZV.style.display = 'none';
        button.style.display = 'inline';
	}
	
	else if (f.town.options[n].value == 'Эжва') {
		town_VUS.style.display = 'none';
        town_VOL.style.display = 'none';
        town_VYC.style.display = 'none';
        town_EKA.style.display = 'none';
        town_CHI.style.display = 'none';
        town_KOR.style.display = 'none';
        town_KOT.style.display = 'none';
        town_KRA.style.display = 'none';
        town_MOS.style.display = 'none';
        town_NIZ.style.display = 'none';
        town_PRI.style.display = 'none';
        town_SYK.style.display = 'none';
        town_CHE.style.display = 'none';
        town_EZV.style.display = 'inline';
        button.style.display = 'inline';
	}
	
	}
	
// Скрипт для проверки правильности заполнения формы для показа домов
function checkAll(f) {
var x = 0;
var check_VUS = '0', check_VOL = '0', check_VYC = '0', check_EKA = '0', check_CHI = '0', check_KOR = '0', check_KOT = '0', check_KRA = '0', check_MOS = '0', check_NIZ = '0', check_PRI = '0', check_SYK = '0', check_CHE = '0', check_EZV = '0';
VUS = f.town_VUS.selectedIndex;
VOL = f.town_VOL.selectedIndex;
VYC = f.town_VYC.selectedIndex;
EKA = f.town_EKA.selectedIndex;
CHI = f.town_CHI.selectedIndex;
KOR = f.town_KOR.selectedIndex;
KOT = f.town_KOT.selectedIndex;
KRA = f.town_KRA.selectedIndex;
MOS = f.town_MOS.selectedIndex;
NIZ = f.town_NIZ.selectedIndex;
PRI = f.town_PRI.selectedIndex;
SYK = f.town_SYK.selectedIndex;
CHE = f.town_CHE.selectedIndex;
EZV = f.town_EZV.selectedIndex;

check_VUS = f.town_VUS.options[VUS].value;
check_VOL = f.town_VOL.options[VOL].value;
check_VYC = f.town_VYC.options[VYC].value;
check_EKA = f.town_EKA.options[EKA].value;
check_CHI = f.town_CHI.options[CHI].value;
check_KOR = f.town_KOR.options[KOR].value;
check_KOT = f.town_KOT.options[KOT].value;
check_KRA = f.town_KRA.options[KRA].value;
check_MOS = f.town_MOS.options[MOS].value;
check_NIZ = f.town_NIZ.options[NIZ].value;
check_PRI = f.town_PRI.options[PRI].value;
check_SYK = f.town_SYK.options[SYK].value;
check_CHE = f.town_CHE.options[CHE].value;
check_EZV = f.town_EZV.options[EZV].value;
}


function selectTown()
	{
		var tS = document.form.town.selectedIndex;
		var Txt = "";
		var townSelected = document.form.town.options[tS].value;
					
		Txt="Предложено "+(document.form.town.length-1)+" городов"+
			"\nВыбран "+document.form.town.options[tS].text+
			" (value= "+document.form.town.options[tS].value+
			", index= "+document.form.town.options[tS].index+")";
//			
			
		if(document.form.town.options[tS].defaultSelected)
			{Txt+="\nЭтот город выбирается по умолчанию";}
		alert(Txt);
		
		
		alert("\ntownSelected= "+ townSelected);
		
		if (document.form.town.options[tS].index != 0)
			{
				townSelected.style.display = 'inline';
				button.style.display = 'inline';
			}
	}		

function selectShop (f)
	{
		var n = f.town.selectedIndex;
	}
