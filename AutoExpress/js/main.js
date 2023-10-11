$(function () {
	/**
	* *сначала обращаемся к переменной (клаыссу) .carousel__inner, которая является родителем для элементов карусели
	* *Потом помощью . вызываем библиотеку slick
	*/
	$('.carousel__inner').slick({
		/**
		 * *Отключить стрелки
		 */
		arrows: false,
		/**
		* *Включить маркеры
		*/
		dots: true,
		/**
	  * *Количество показываемых слайдеров
	  */
		slidesToShow: 3,
		//адаптив
		responsive: [
			{
				breakpoint: 841,
				settings: {
					slidesToShow: 2
				}
			},
			{
				breakpoint: 601,
				settings: {
					slidesToShow: 1
				}
			}
		]
	});

});
let input = document.querySelector('.contacts__input');
let checkBox = document.querySelector('.agree');
let button = document.querySelector('.contacts__btn');
button.setAttribute('disabled', true);
checkBox.oninput = function () {
	if (checkBox.checked) {
		button.removeAttribute('disabled');

	}
	else {
		button.setAttribute('disabled', true)
	}
};

// Маска для телефона
jQuery(function ($) {
	$("input[type='phone']").mask("+7 (999) 99-99-999");
});

// Валидация формы отправки заявки
// document.getElementById('add-form').addEventListener('submit', function (event) {
// 	event.preventDefault()
// 	// this==document.getElementById('add-form'), тк мы используем this внутри события
// 	if (validation(this) == true) {
// 		alert('Форма проверена успешно');

// 	}

// });

// function validation(form) {
// 	let result = true;
// 	// функция, которая удаляет ошибки при правильных полях
// 	function removeError(input) {
// 		// parentNode - получаем класс родителя
// 		const parent = input.parentNode;
// 		// если блок содержит класс 'error'
// 		if (parent.classList.contains('error')) {
// 			parent.querySelector('.error-label').remove();
// 			parent.classList.remove('error');
// 		}
// 	}
// 	// функция, которая выводит ошибки
// 	function createError(input, text) {
// 		const parent = input.parentNode;
// 		const errorLabel = document.createElement('label');
// 		errorLabel.classList.add('error-label');
// 		errorLabel.textContent = text;
// 		parent.classList.add('error');
// 		parent.append(errorLabel);
// 	}
// 	// находим все поля внутри формы
// 	const allInputs = form.querySelectorAll('input');
// 	for (const input of allInputs) {
// 		removeError(input);
// 		if (input.value == "") {
// 			createError(input, 'Заполните поле')
// 			result = false;
// 		}
// 	}
// 	return result;
// }





