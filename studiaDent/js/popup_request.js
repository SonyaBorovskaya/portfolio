(function ($) {
	$(function () {
		$('#popup-review-link').bind('click', function (e) {
			e.preventDefault();
			$('#element_popup-reviews').bPopup();
		});
	});
})(jQuery);


// Проверяем радиокнопки в форме отправки отзывов
let checkBox1 = document.querySelector('.check_agree');
let checkBox2 = document.querySelector('.check_disagree');
let button = document.querySelector('.btn-review--form');
button.setAttribute('disabled', true);
checkBox1.oninput = function () {
	if (checkBox1.checked) {
		button.removeAttribute('disabled');

	}
	else {
		button.setAttribute('disabled', true)
	}
};
checkBox2.oninput = function () {
	if (checkBox2.checked) {
		button.removeAttribute('disabled');

	}
	else {
		button.setAttribute('disabled', true)
	}
};