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