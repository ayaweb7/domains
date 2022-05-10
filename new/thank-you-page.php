<? if ($_GET['status'] == 'success') { ?>
<!DOCTYPE html>
<html>

<head>
	<meta charset="UTF-8">
	<title>Thanks</title>
	<link rel="stylesheet" href="css/style.css">
	<meta http-equiv="Refresh" content="3; URL=/"><!--  -->
	
<!-- Yandex.Metrika counter -->
<script type="text/javascript" >
   (function(m,e,t,r,i,k,a){m[i]=m[i]||function(){(m[i].a=m[i].a||[]).push(arguments)};
   m[i].l=1*new Date();k=e.createElement(t),a=e.getElementsByTagName(t)[0],k.async=1,k.src=r,a.parentNode.insertBefore(k,a)})
   (window, document, "script", "https://mc.yandex.ru/metrika/tag.js", "ym");

   ym(85535566, "init", {
        clickmap:true,
        trackLinks:true,
        accurateTrackBounce:true,
        webvisor:true
   });
</script>
<noscript><div><img src="https://mc.yandex.ru/watch/85535566" style="position:absolute; left:-9999px;" alt="" /></div></noscript>
<!-- /Yandex.Metrika counter -->
	
</head>

<body>
	<div class="thank-you-page">

		<h1 class="thank-you-page__title">Спасибо за заявку</h1>
		<p class="thank-you-page__descriptor">Я отвечу Вам в ближайшее время</p>
		<a class="thank-you-page__button" href="/">Вернуться на главную</a>

	</div>

</body>

</html>

<? } else {
    header ("Location: /"); // главная страница вашего лендинга
} ?>