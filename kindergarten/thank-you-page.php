<? if ($_GET['status'] == 'success') { ?>
<!DOCTYPE html>
<html>

<head>
	<meta charset="UTF-8">
	<title>Спасибо</title>
	<link rel="stylesheet" href="css/style.css">
	<meta http-equiv="Refresh" content="3; URL=/"><!--  -->
	
<!-- Yandex.Metrika counter - Спектр - спасибо -->
<script type="text/javascript" >
   (function(m,e,t,r,i,k,a){m[i]=m[i]||function(){(m[i].a=m[i].a||[]).push(arguments)};
   m[i].l=1*new Date();k=e.createElement(t),a=e.getElementsByTagName(t)[0],k.async=1,k.src=r,a.parentNode.insertBefore(k,a)})
   (window, document, "script", "https://mc.yandex.ru/metrika/tag.js", "ym");

   ym(86501076, "init", {
        clickmap:true,
        trackLinks:true,
        accurateTrackBounce:true,
        webvisor:true
   });
</script>
<noscript><div><img src="https://mc.yandex.ru/watch/86501076" style="position:absolute; left:-9999px;" alt="" /></div></noscript>
<!-- Yandex.Metrika counter - Спектр - спасибо -->

<!-- Yandex.Metrika counter - Спектр - активность на сайте-->
<script type="text/javascript" >
   (function(m,e,t,r,i,k,a){m[i]=m[i]||function(){(m[i].a=m[i].a||[]).push(arguments)};
   m[i].l=1*new Date();k=e.createElement(t),a=e.getElementsByTagName(t)[0],k.async=1,k.src=r,a.parentNode.insertBefore(k,a)})
   (window, document, "script", "https://mc.yandex.ru/metrika/tag.js", "ym");

   ym(86646610, "init", {
        clickmap:true,
        trackLinks:true,
        accurateTrackBounce:true,
        webvisor:true
   });
</script>
<noscript><div><img src="https://mc.yandex.ru/watch/86646610" style="position:absolute; left:-9999px;" alt="" /></div></noscript>
<!-- Yandex.Metrika counter - Спектр - активность на сайте-->
	
</head>

<body>
	<div class="thank-you-page container px-4 py-5">
		<h1 class="thank-you-page__title">Спасибо за заявку</h1>
		<p class="thank-you-page__descriptor">Мы свяжемся с Вами в течение часа или в указанное в заявке время</p>
		<a class="thank-you-page__button" href="/">Вернуться на главную</a>
	</div>

</body>

</html>

<? } else {
    header ("Location: /"); // главная страница вашего лендинга
} ?>