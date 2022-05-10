(function($) {
      
	$(function () {
		$('.popup-modal').magnificPopup({
			type: 'inline',
			preloader: false,
			focus: '#username',
		    modal: false,
			showCloseBtn: true
		});
		$(document).on('click', '.popup-modal-dismiss', function (e) {
			e.preventDefault();
			$.magnificPopup.close();
		});
	});
	
	//E-mail Ajax Send

	$("#form").submit(function() { //Change
		var th = $(this);
		$.ajax({
			type: "POST",
			url: "mail_callback.php", //Change
			data: th.serialize()
		}).done(function() {
			alert("Спасибо за ваш отклик!");
			setTimeout(function() {
				// Done Functions
				th.trigger("reset");
			}, 1000);
		});
		return false;
	});
	
	$('input[name="phone"]').mask("+7 (999) 999-99-99");
	
})(jQuery);

// Скрипты для скрытия и показа блоков - ЗАДЕЙСТВОВАНЫ В 'CALC_FENCE.PHP'
// Скрыть блок
function hiddenBlock(div) {
    var x = document.getElementById(div);
//	alert('GOOD');
    x.style.display = 'none';
}

// Показать блок
function showBlock(div) {
    var x = document.getElementById(div);
//	alert('GOOD');
    x.style.display = 'flex';
}

// Показать ДВА блока и скрыть ТРИ
function showTwoBlocks(div1, div2, div3, div4, div5) {
    var x1 = document.getElementById(div1);
	var x2 = document.getElementById(div2);
	var x3 = document.getElementById(div3);
	var x4 = document.getElementById(div4);
	var x5 = document.getElementById(div5);
//	alert('GOOD');
    x1.style.display = 'flex';
	x2.style.display = 'flex';
	x3.style.display = 'none';
	x4.style.display = 'none';
	x5.style.display = 'none';
}

// Показать ТРИ блока и скрыть ДВА
function showThreeBlocks(div1, div2, div3, div4, div5) {
    var x1 = document.getElementById(div1);
	var x2 = document.getElementById(div2);
	var x3 = document.getElementById(div3);
	var x4 = document.getElementById(div4);
	var x5 = document.getElementById(div5);
//	alert('GOOD');
    x1.style.display = 'flex';
	x2.style.display = 'flex';
	x3.style.display = 'flex';
	x4.style.display = 'none';
	x5.style.display = 'none';
}