<script type='text/javascript'>
  function send(){
    var text = document.getElementById('text').value;
    var transl = new Array();
    transl['Рђ']='A';     transl['Р°']='a';
    transl['Р‘']='B';     transl['Р±']='b';
    transl['Р’']='V';     transl['РІ']='v';
    transl['Р“']='G';     transl['Рі']='g';
    transl['Р”']='D';     transl['Рґ']='d';
    transl['Р•']='E';     transl['Рµ']='e';
    transl['РЃ']='Yo';    transl['С‘']='yo';
    transl['Р–']='Zh';    transl['Р¶']='zh';
    transl['Р—']='Z';     transl['Р·']='z';
    transl['Р']='I';     transl['Рё']='i';
    transl['Р™']='J';     transl['Р№']='j';
    transl['Рљ']='K';     transl['Рє']='k';
    transl['Р›']='L';     transl['Р»']='l';
    transl['Рњ']='M';     transl['Рј']='m';
    transl['Рќ']='N';     transl['РЅ']='n';
    transl['Рћ']='O';     transl['Рѕ']='o';
    transl['Рџ']='P';     transl['Рї']='p';
    transl['Р ']='R';     transl['СЂ']='r';
    transl['РЎ']='S';     transl['СЃ']='s';
    transl['Рў']='T';     transl['С‚']='t';
    transl['РЈ']='U';     transl['Сѓ']='u';
    transl['Р¤']='F';     transl['С„']='f';
    transl['РҐ']='X';     transl['С…']='x';
    transl['Р¦']='C';     transl['С†']='c';
    transl['Р§']='Ch';    transl['С‡']='ch';
    transl['Ш']='Sh';    transl['ш']='sh';
    transl['Р©']='Shh';    transl['С‰']='shh';
    transl['РЄ']='"';     transl['СЉ']='"';
    transl['Р«']='Y\'';    transl['С‹']='y\'';
    transl['Р¬']='\'';    transl['СЊ']='\'';
    transl['Р­']='E\'';    transl['СЌ']='e\'';
    transl['Р®']='Yu';    transl['СЋ']='yu';
    transl['РЇ']='Ya';    transl['СЏ']='ya';
    
    var result = '';
    for(i=0;i<text.length;i++) {
      if(transl[text[i]] != undefined) { result += transl[text[i]]; }
      else { result += text[i]; }
    }
    document.getElementById('text').value = result;
# document.getElementById('text_2').value = result;    
  }
</script>

# HTML
  <div style="text-align: center;">
  <textarea id="text" cols="35" rows="8" style="width: 600px; height: 150px;
    color: #0C3A45; border: 1px solid #CCCCCC; background: #F2F2F2;"></textarea>
# <textarea id="text" cols="35" rows="8" onKeyUp="send()"></textarea>
# <textarea id="text_2" cols="35" rows="8"></textarea>
    <br>
  <input type="button" value="Р’ С‚СЂР°РЅСЃР»РёС‚" onclick="send()">
  </div>
