// Для установления одинаковой высоты заголовков в блоке новостей
$(function () {

	var column = 0;
	$('.item3 .new-item-title').each(function () {
		hgt = $(this).height();
		if (hgt > column) {
			column = hgt;
		}
	}).height(column);

});



$(document).ready(function () {
	// Configure/customize these variables.
	var showChar = 110;  // How many characters are shown by default
	var ellipsestext = "...";
	var moretext = "Показать полностью";
	var lesstext = "Свернуть";
	$('.new-item-description').each(function () {
		var content = $(this).html();

		if (content.length > showChar) {

			var c = content.substr(0, showChar);
			var h = content.substr(showChar, content.length - showChar);

			var html = c + '<span class="moreellipses">' + ellipsestext + '&nbsp;</span><span class="morecontent"><span>' + h + '</span>&nbsp;&nbsp;<a href="" class="morelink">' + moretext + '</a></span>';

			$(this).html(html);
		}

	});

	$(".morelink").click(function () {
		if ($(this).hasClass("less")) {
			$(this).removeClass("less");
			$(this).html(moretext);
		} else {
			$(this).addClass("less");
			$(this).html(lesstext);
		}
		$(this).parent().prev().toggle();
		$(this).prev().toggle();
		return false;
	});
});

// Маска для телефона
jQuery(function ($) {
	$("input[type='phone']").mask("+7 (999) 99-99-999");
});