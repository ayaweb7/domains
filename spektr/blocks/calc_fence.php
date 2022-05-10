
	<div id='initial' class=''>
		<h2>Онлайн калькулятор заборов</h2>
		<form name='form' action='result_fence.php' onsubmit='return validateForm()' method='post'>
	
<!-- Основные данные - длина забора, материал -->
		<div class='flexSmall'>
			<div class='blockInput'>
				<span>Введите длину<br>забора в метрах</span><!---->
				<input id='length' type='text' name='length' size='5' value='' placeholder='50' onkeypress="checkNumber" />
			</div>

			<div class='blockInput'>
				<span>Основной<br>материал</span><!---->
				<div class='blockButton'>
					<input type='radio' id='profile' name='material' value='профнастил' onclick="showTwoBlocks('height_hidden', 'color_hidden', 'carcass_hidden', 'board_hidden', 'width_hidden')" />
					<label for='profile'>Профнастил</label>
					
					<input type='radio' id='board' name='material' value='штакетник' onclick="showThreeBlocks('carcass_hidden', 'board_hidden', 'width_hidden', 'height_hidden', 'color_hidden')" checked />
					<label for='board'>Штакетник</label>
				</div>
			</div>
			
			<div id='carcass_hidden' class='blockInput'>
				<span>Материал<br>каркаса</span><!---->
				<div class='blockButton'>
					<input type='radio' id='wood' name='carcass' value='дерево' checked />
					<label for='wood'>Дерево</label>
					
					<input type='radio' id='metal' name='carcass' value='металл' />
					<label for='metal'>Металл</label>
				</div>
			</div>
		</div><!--flexSmall-->

<!-- DIMENSIONS -->		
		<div class='flexSmall'><!--flexSmall-->
			<div id='board_hidden' class='blockInput'>
				<span>Высота<br>штакетника</span><!---->
				<div class='blockButton'>
					<input type='radio' id='one' name='height' value='1' />
					<label for='one'>1м</label>
					
					<input type='radio' id='two' name='height' value='1.2' />
					<label for='two'>1,2м</label>
										
					<input type='radio' id='three' name='height' value='1.5' />
					<label for='three'>1,5м</label>
										
					<input type='radio' id='four' name='height' value='1.8' checked />
					<label for='four'>1,8м</label>
				</div>
			</div>
			
			<div id='width_hidden' class='blockInput'>
				<span>Ширина<br>штакетника</span><!---->
				<div class='blockButton'>
					<input type='radio' id='eight' name='width' value='80' checked />
					<label for='eight'>80мм</label>
					
					<input type='radio' id='nine' name='width' value='95' />
					<label for='nine'>95мм</label>
				</div>
			</div>
			
			<div id='height_hidden' class='blockInput'>
				<span>Высота<br>профнастила</span><!---->
				<div class='blockButton'>
					<input type='radio' id='one_' name='height_profile' value='1' />
					<label for='one_'>1м</label>
					
					<input type='radio' id='one_two' name='height_profile' value='1.2' />
					<label for='one_two'>1,2м</label>
										
					<input type='radio' id='one_five' name='height_profile' value='1.5' />
					<label for='one_five'>1,5м</label>
										
					<input type='radio' id='two_' name='height_profile' value='2' checked />
					<label for='two_'>2м</label>
				</div>
			</div>
			
			<div id='color_hidden' class='blockInput'>
				<span>Цвет<br>профнастила</span><!---->
				<div class='blockButton'>
					<input type='radio' id='color' name='color' value='цветной' checked />
					<label for='color'>цветной</label>
					
					<input type='radio' id='zinc' name='color' value='цинк' />
					<label for='zinc'>цинк</label>
				</div>
			</div>
			
			<div class='blockInput'>
				<span>Высота<br>столбов</span><!---->
				<div class='blockButton'>
					<input type='radio' id='two_pillar' name='pillar' value='2' checked />
					<label for='two_pillar'>2м</label>
					
					<input type='radio' id='three_pillar' name='pillar' value='3' />
					<label for='three_pillar'>3м</label>
				</div>
			</div>
			
			<div class='blockInput'>
				<span>Расстояние<br>между столбами</span><!---->
				<div class='blockButton'>
					<input type='radio' id='two_distance' name='distance' value='2' />
					<label for='two_distance'>2м</label>
					
					<input type='radio' id='three_distance' name='distance' value='3' checked />
					<label for='three_distance'>3м</label>
				</div>
			</div>
		</div><!--flexSmall-->

<!-- SUBMIT -->
		<div id='' class='text-center mt-3'>
			<input class='inputSubmit btn btn-primary px-4 me-md-2' type="submit" name="submit" id="submit" value="Расчитать забор" />
		</div><!--flexSmall-->
		</form>
	</div><!-- initial -->



<script>
function validateForm() {
    var x = document.forms['form']['length'].value;
    if (x == '') {
        alert('Введите длину забора в метрах');
        return false;
    }
}

function checkNumber(e)
{
  e = e || window.event;
  if(e.ctrlKey||e.altKey)return;
  var c = e.charCode || e.keyCode;
  if(e.charCode==0 && (e.keyCode==8||e.keyCode==35||e.keyCode==36||e.keyCode==37||e.keyCode==39))return;
  return ((c > 47) && (c < 58));
}

document.getElementById('length').onkeypress=checkNumber;
</script>
<?php

// !***************** Закрытие объектов с результатами и подключение к базе данных *********************! //
//$result5->close(); // Материалы, отсортированные в обратном алфавите для выборки
?>