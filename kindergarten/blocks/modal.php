<!-- modal_form -->
<div class="remodal" data-remodal-id="modal" role="dialog" aria-labelledby="modal1Title" aria-describedby="modal1Desc">
	<div class="remodalBorder">
		<button data-remodal-action="close" class="remodal-close" aria-label="Close"></button>
		<form class="contact-form" id="contact-form_1" method="POST">
			<p class="contact-form__title"><img src="img/logo.png" width="30" height="30" class="me-3">Заявка</p>
			<p class="contact-form__description"></p>
<!-- ИМЯ -->
			<div class="contact-form__input-wrapper">
				<input type="text" id="name" name="name" class="contact-form__input contact-form__input_name"
					placeholder="Введите ваше имя">
				<div class="contact-form__error contact-form__error_name"></div>
			</div>
<!-- ТЕЛЕФОН -->
			<div class="contact-form__input-wrapper">
				<input type="text" id="tel" name="tel" class="contact-form__input contact-form__input_tel"
					placeholder="Введите ваш телефон">
				<div class="contact-form__error contact-form__error_tel"></div>
			</div>
<!-- СООБЩЕНИЕ -->
			<div class="contact-form__input-wrapper">		
				<textarea id="mess" name="mess" class="contact-form__input contact-form__text"
					placeholder="Введите ваше сообщение"></textarea>
				<div class="contact-form__error contact-form__error_text"></div>
			</div>
<!-- ДАТА, ВРЕМЯ -->
			<div class="contact-form__input-wrapper">		
				<input type="hidden" id="send_time" name="send_time" action="javascript:date_time()" />
			</div>
			
			<input type="submit" name="submit" class="btn_modal" value="отправить заявку">
			<input type="hidden" name="formData" value="Отправка заявки с сайта">
		</form>
	</div>
</div>

