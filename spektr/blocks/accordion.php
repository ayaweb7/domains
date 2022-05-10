<!-- accordion start -->
<div class="col-md-4"><!--col-md-3 room-left wow fadeIn animated" data-wow-delay=".5s"-->
	<div class="position-sticky" style="top: 2rem;">
		<div class="accordion" id="accordionExample">

<!-- Пиломатериалы -->
			<div class='accordion-item'>
				<h2 class='accordion-header' id='headingOne'>
					<button class='accordion-button collapsed' type='button' data-bs-toggle='collapse' data-bs-target='#collapseOne' aria-expanded='true' aria-controls='collapseOne'>
						Пиломатериалы
					</button>
				</h2>
				<div id="collapseOne" class="accordion-collapse collapse show" aria-labelledby="headingOne" data-bs-parent="#accordionExample">
					<div class='accordion-body'>
						<ul>
<?php
// Выборка в цикле всех существующих 'Пиломатериалов'
$result4 = mysqli_query($db, "SELECT * FROM goods WHERE category='Пиломатериалы' ORDER BY good");
$myrow4 = mysqli_fetch_array($result4);
$good_header='';

do
{
	if ($myrow4['good'] != $good_header)
	{
	$good_header = $myrow4['good'];
	printf ("<li class='active'><a href='good.php?good=%s' title='%s' >%s</a></li>", $myrow4['good'], $myrow4['good'], $myrow4['good']);
								

	}
}
while ($myrow4 = mysqli_fetch_array($result4));
?>										
						</ul>
					</div>
				</div>
			</div>

<!-- Стройматериалы -->
			<div class='accordion-item'>
				<h2 class='accordion-header' id='headingTwo'>
					<button class='accordion-button collapsed' type='button' data-bs-toggle='collapse' data-bs-target='#collapseTwo' aria-expanded='true' aria-controls='collapseOne'>
						Стройматериалы
					</button>
				</h2>
				<div id="collapseTwo" class="accordion-collapse collapse" aria-labelledby="headingTwo" data-bs-parent="#accordionExample">
					<div class='accordion-body'>
						<ul>
<?php
// Выборка в цикле всех существующих 'Стройматериалов'
$result4 = mysqli_query($db, "SELECT * FROM goods WHERE category='Стройматериалы' ORDER BY good");
$myrow4 = mysqli_fetch_array($result4);
$good_header='';

do
{
	if ($myrow4['good'] != $good_header)
	{
	$good_header = $myrow4['good'];
	printf ("<li class='active'><a href='good.php?good=%s' title='%s' >%s</a></li>", $myrow4['good'], $myrow4['good'], $myrow4['good']);
								

	}
}
while ($myrow4 = mysqli_fetch_array($result4));
?>										
						</ul>
					</div>
				</div>
			</div>

<!-- Элементы лестниц -->
			<div class='accordion-item'>
				<h2 class='accordion-header' id='headingThree'>
					<button class='accordion-button collapsed' type='button' data-bs-toggle='collapse' data-bs-target='#collapseThree' aria-expanded='true' aria-controls='collapseThree'>
						Элементы лестниц
					</button>
				</h2>
				<div id="collapseThree" class="accordion-collapse collapse" aria-labelledby="headingThree" data-bs-parent="#accordionExample">
					<div class='accordion-body'>
						<ul>
<?php
// Выборка в цикле всех существующих 'Элементов лестниц'
$result4 = mysqli_query($db, "SELECT * FROM goods WHERE category='Элементы лестниц' ORDER BY good");
$myrow4 = mysqli_fetch_array($result4);
$good_header='';

do
{
	if ($myrow4['good'] != $good_header)
	{
	$good_header = $myrow4['good'];
	printf ("<li class='active'><a href='good.php?good=%s' title='%s' >%s</a></li>", $myrow4['good'], $myrow4['good'], $myrow4['good']);
								

	}
}
while ($myrow4 = mysqli_fetch_array($result4));
?>										
						</ul>
					</div>
				</div>
			</div>

<!-- УСЛУГИ -->
			<div class='accordion-item'>
				<h2 class='accordion-header' id='headingFour'>
					<button class='accordion-button collapsed' type='button' data-bs-toggle='collapse' data-bs-target='#collapseFour' aria-expanded='true' aria-controls='collapseOne'>
						УСЛУГИ
					</button>
				</h2>
				<div id="collapseFour" class="accordion-collapse collapse" aria-labelledby="headingFour" data-bs-parent="#accordionExample">
					<div class='accordion-body'>
						<ul>
<?php
// Выборка в цикле всех существующих услуг
$result4 = mysqli_query($db, "SELECT * FROM goods WHERE category='Услуги' ORDER BY good");
$myrow4 = mysqli_fetch_array($result4);
$good_header='';

do
{
	if ($myrow4['good'] != $good_header)
	{
	$good_header = $myrow4['good'];
	printf ("<li class='active'><a href='service.php?good=%s' title='%s' >%s</a></li>", $myrow4['good'], $myrow4['good'], $myrow4['good']);
								

	}
}
while ($myrow4 = mysqli_fetch_array($result4));
?>										
						</ul>
					</div>
				</div>
			</div>

		</div><!--accordion-->
	</div><!--position-sticky-->
</div><!--col-md-4-->

<!-- accordion end -->