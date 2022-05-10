<FORM ACTION="trans.php" METHOD="GET">
  
  <TEXTAREA TYPE="text" NAME="str" COLS=50 ROWS=10  WRAP=virtual>
    РўРµРєСЃС‚ РґРѕ 500 Р·РЅР°РєРѕРІ </TEXTAREA> 
    
    <INPUT TYPE="Submit" VALUE="РџРµСЂРµРІРµСЃС‚Рё !" >
      
      </FORM>

      <?php
    
    echo "<html> ";  
    
    echo "<head> ";  
    
    echo "<meta http-equiv=\"Content-Type\" content=\"text/html;
charset=windows-1251\"> ";  
    
    echo "</head> ";  
    
    echo "<body> ";  
    
    echo "<P><center><BR>
РљРѕРЅРІРµСЂС‚Р°С†РёСЏ СЂСѓСЃСЃРєРѕРіРѕ С‚РµРєСЃС‚Р°, РЅР°РїРёСЃР°РЅРЅРѕРіРѕ СЂСѓСЃСЃРєРёРј

С€СЂРёС„С‚РѕРј РІ СЂСѓСЃСЃРєРёР№ С‚РµРєСЃС‚, РЅР°РїРёСЃР°РЅРЅС‹Р№ Р»Р°С‚РёРЅСЃРєРёРј

С€СЂРёС„С‚РѕРј (РёР· РєРёСЂРёР»Р»РёС†С‹ РІ Р»Р°С‚РёРЅРёС†Сѓ).
</p>";
    
    echo "<b>";
    
    echo "<blockquote>";
    
    $mm=strlen($str);
    
    for ($i=0;$i<=$mm;$i++)
    {
      $ss=$str[$i];
      
      switch ($ss) 
      
      {
        
        case "щ":
          echo "sch";
        break;
        
        case "ч":
          echo "ch";
        break;
        
        case "ш":
          echo "sh";
        break;
        
        case "я":
          echo "ja";
        break;
        
        case "ю":
          echo "ju";
        break;
        
        case "ё":
          echo "jo";
        break;
        
        case "ж":
          echo "zh";
        break;
        
        case "е":
          echo "e";
        break;

case "Щ":
        echo "Sch";
        break;
 
 case "Ч":
        echo "Ch";
        break;

 case "Ш":
        echo "Sh";
        break;

 case "Я":
        echo "Ja";
        break;

case "Ю":
        echo "Ju";
        break;

case "Ё":
        echo "Jo";
        break;
 
case "Ж":
        echo "Zh";
        break;

case "Е":
        echo "E";
        break;
        
        case "ь":
          echo "'";
        break;
 
case "ъ":
        echo "'";
        break;
 
case "а":
        echo "a";
        break;

 case "б":
        echo "b";
        break;

case "ц":
        echo "c";
        break;

case "д":
        echo "d";
        break;

case "е":
        echo "e";
        break;
 
case "ф":
        echo "f";
        break;
 
case "г":
        echo "g";
        break;
case "х":
        echo "h";
        break;
 
case "и":
        echo "i";
        break;
 
case "й":
        echo "j";
        break;

case "к":
        
     {

        if ($str[$i+1]=="к" ) {
       echo "x";  
       $i=$i+1; break;}

        echo "k";
        break;

       }

case "л»":
        echo "l";
        break;

case "м":
        echo "m";
        break;
case "н":
        echo "n";
        break;
case "о":
        echo "o";
        break;
case "п":
        echo "p";
        break;
 
 case "р":
        echo "r";
        break;
 
case "с":
        echo "s";
        break;

case "т":
        echo "t";
        break;

case "у":
        echo "u";
        break;

case "в":
        echo "v";
        break;

case "у":
        echo "y";
        break;

case "з":
        echo "z";
        break;
 
case "ь":
        echo "'";
        break;

case "ъ":
        echo "'";
        break;

case "А":
        echo "A";
        break;

case "Б":
        echo "B";
        break;
 
case "Ц":
        echo "C";
        break;

case "Д":
        echo "D";
        break;

 case "Е":
        echo "E";
        break;

case "Ф":
        echo "F";
        break;

case "Г":
        echo "G";
        break;

case "Х":
        echo "H";
        break;

case "И":
        echo "I";
        break;

case "Й":
        echo "J";
        break;

case "К":
    
     {

      if ($str[$i+1]=="К" ) {
       echo "X";  
       $i=$i+1; break;}

      if ($str[$i+1]=="К" ) {
       echo "X";  
       $i=$i+1; break;}

      echo "K";
       break;

       }

case "Л":
        echo "L";
        break;

 case "М":
        echo "M";
        break;

case "Н":
        echo "N";
        break;

case "О":
        echo "O";
        break;

case "П":
        echo "P";
        break;
  
case "Р":
        echo "R";
        break;

case "С":
        echo "S";
        break;

case "Т":
        echo "T";
        break;
 
 case "У":
        echo "U";
        break;
 
 case "В":
        echo "V";
        break;

case "У":
        echo "Y";
        break;

 case "З":
        echo "Z";
        break;
 
default:
        echo $ss;

  }

}
	

echo "</b><br><br>";

echo "</blockquote>";

echo "<P><center>РЎРїР°СЃРёР±Рѕ Р·Р° РёСЃРїРѕР»СЊР·РѕРІР°РЅРёРµ 
СЃРµСЂРІРёСЃР° !</center></p>";

 echo "</body> ";  

echo "</html> ";  

?>


<FORM ACTION="trans.php" METHOD="GET">

<TEXTAREA TYPE="text" NAME="str" COLS=50 ROWS=10  WRAP=virtual>
РўРµРєСЃС‚ РґРѕ 500 Р·РЅР°РєРѕРІ </TEXTAREA> 

<INPUT TYPE="Submit" VALUE="РџРµСЂРµРІРµСЃС‚Рё !" >

</FORM>

<?php

echo "<html> ";  

echo "<head> ";  

echo "<meta http-equiv='content-type' content='text/html; charset=utf-8' /> ";  

echo "</head> ";  

echo "<body> ";  

echo "<P><center><BR>

РљРѕРЅРІРµСЂС‚Р°С†РёСЏ СЂСѓСЃСЃРєРѕРіРѕ С‚РµРєСЃС‚Р°, РЅР°РїРёСЃР°РЅРЅРѕРіРѕ Р»Р°С‚РёРЅСЃРєРёРј 
С€СЂРёС„С‚РѕРј РІ  СЂСѓСЃСЃРєРёР№ С‚РµРєСЃС‚, РЅР°РїРёСЃР°РЅРЅС‹Р№ СЂСѓСЃСЃРєРёРј
 С€СЂРёС„С‚РѕРј (РёР· Р»Р°С‚РёРЅРёС†С‹ РІ РєРёСЂРёР»Р»РёС†Сѓ) .
 </p>";

echo "<b>";

echo "<blockquote>";

$mm=strlen($str);

for ($i=0;$i<=$mm;$i++)
{
$ss=$str[$i];

switch ($ss) 
{
   

case "s":
        
       {

         if ($str[$i+1]=="c" && $str[$i+2]=="h" ) {
        echo "С‰";  
        $i=$i+2; break;}
 
        if ($str[$i+1]=="h"  ) {
        echo "С€";  
        $i=$i+1; break;}

        echo "СЃ";
        break;

      }


 case "c":
       
       {
   
        if ($str[$i+1]=="h"  ) {
       echo "С‡";  
       $i=$i+1; break;}
 
        echo "С†";
        break;

       }

case "j":

        {

       if ($str[$i+1]=="a"  ) {
       echo "СЏ";  
       $i=$i+1; break;}
 
       if ($str[$i+1]=="u"  ) {
       echo "СЋ";  
       $i=$i+1; break;}
 

       if ($str[$i+1]=="o"  ) {
       echo "С‘";  
       $i=$i+1; break;}
 
        echo "Р№";
        break;
      
       }

case "z":
         
      {

       if ($str[$i+1]=="h"  ) {
       echo "Р¶";  
       $i=$i+1; break;}
 
       echo "Р·";
       break;
     
      }

case "S":

     { 
    
      if ($str[$i+1]=="h"  ) {
       echo "РЁ";  
       $i=$i+1; break;}
 
       if ($str[$i+1]=="c" && $str[$i+2]=="h" ) {
       echo "Р©";  
       $i=$i+2; break;}

      echo "РЎ";
      break;

      }

 case "C":
        
      {

       if ($str[$i+1]=="h"  ) {
       echo "Р§";  
       $i=$i+1; break;}
 
       echo "Р¦";
       break;

      }


case "J": 
     
      {

       if ($str[$i+1]=="a"  ) {
       echo "РЇ";  
       $i=$i+1; break;}
 
       if ($str[$i+1]=="u"  ) {
       echo "Р®";  
       $i=$i+1; break;}
 
       if ($str[$i+1]=="o"  ) {
       echo "РЃ";  
       $i=$i+1; break;}
 
       echo "Р™";
        break;

        }

      case "Z":
    
      {

       if ($str[$i+1]=="h"  ) {
       echo "Р–";  
       $i=$i+1; break;}
 
       echo "Р—";
        break;
   
       }

case "a":
        echo "Р°";
        break;

case "b":
        echo "Р±";
        break;

case "d":
        echo "Рґ";
        break;
 
case "e":
        echo "Рµ";
        break;

case "f":
        echo "С„";
        break;

case "g":
        echo "Рі";
        break;

case "h":
        echo "С…";
        break;

case "i":
        echo "Рё";
        break;

case "k":
        echo "Рє";
        break;

case "l":
        echo "Р»";
        break;

case "m":
        echo "Рј";
        break;

case "n":
        echo "РЅ";
        break;

case "o":
        echo "Рѕ";
        break;

case "p":
        echo "Рї";
        break;

case "q":
        echo "Рє";
        break;

case "r":
        echo "СЂ";
        break;

case "t":
        echo "С‚";
        break;

case "u":
        echo "Сѓ";
        break;

case "v":
        echo "РІ";
        break;

case "w":
        echo "РІ";
        break;

case "x":
      echo "РєСЃ";
        break;

case "y":
      echo "С‹";
        break;

case "A":
      echo "Рђ";
        break;

case "B":
      echo "Р‘";
        break;

case "D":
      echo "Р”";
        break;

case "E":
      echo "Р•";
        break;

case "F":
      echo "Р¤";
        break;

case "G":
      echo "Р“";
        break;

case "H":
      echo "РҐ";
        break;

case "I":
      echo "Р";
        break;

case "K":
      echo "Рљ";
        break;

case "L":
      echo "Р›";
        break;

case "M":
      echo "Рњ";
        break;

case "N":
      echo "Рќ";
        break;

case "O":
      echo "Рћ";
        break;

case "P":
      echo "Рџ";
        break;
 
case "Q":
      echo "Рљ";
        break;
  
case "R":
      echo "Р ";
        break;
 
case "T":
      echo "Рў";
        break;

 case "U":
      echo "РЈ";
        break;

case "V":
      echo "Р’";
        break;
 
case "W":
      echo "Р’";
        break;

case "X":
      echo "РљРЎ";
        break;

case "Y":
      echo "Р«";
        break;
 
default:
        echo $ss;
             
  }

}
	
echo "</b><br><br>";
echo "</blockquote>";

echo "<P><center>РЎРїР°СЃРёР±Рѕ Р·Р° РёСЃРїРѕР»СЊР·РѕРІР°РЅРёРµ
СЃРµСЂРІРёСЃР° !</center></p>";

echo "</body> ";  
echo "</html> ";  

?>
