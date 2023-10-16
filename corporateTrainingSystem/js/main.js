//Слайдер
$(function () {
	$('.carousel-inner').slick({
		arrows: false,
		autoplay: true,
		autoplaySpeed: 2000,
		dots: true,
		slidesToShow: 3,
		adaptivHeight: true,
		speed: 900,
		easing: 'ease-out',
		//infinite: false,
		//для моб тел
		//swipe: true,
		//-----//
		touchThreshold: 4,
		waitForAnimate: false,
		//centerMode: true,
		variableWidth: true,
		responsive: [
			{
				breakpoint: 1140,
				settings: {
					dots: true,
					slidesToScroll: 2,
					slidesToShow: 2,
					// centerMode: false,
					infinite: true
					//variableWidth: false
				}
			},
			{
				breakpoint: 640,
				settings: {
					dots: true,
					slidesToScroll: 1,
					slidesToShow: 1,
					// centerMode: false,
					infinite: true
				}
			},
		]
	});
})
// ------//Слайдер
// Видео
const videoButton = document.querySelector('#IDvideo-btn');
const videoIcon = document.querySelector('.video__btn-icon');
const videoFile = document.querySelector('#videoFile');
videoButton.addEventListener('click', function () {
	if (videoFile.paused) {
		videoFile.play();
		videoIcon.src = "../img/about/video/pause.svg"
	}
	else {
		videoFile.pause();
		videoIcon.src = "../img/about/video/play-white.svg"
	}


});

// ------//Видео
//Мобильное меню
const mobileNavIcon = document.querySelector('.mobile-nav-button__icon');
const mobileNavButton = document.querySelector('.mobile-nav-button');
const mobileNav = document.querySelector('.mobile-nav');
const body = document.querySelector('body');
mobileNavButton.addEventListener('click', function () {
	mobileNavIcon.classList.toggle('active');
	body.classList.toggle('no-scroll');
	mobileNav.classList.toggle('active');
})
//-----------//Мобильное меню
//-----------Попап
$('.open-popup').click(function () {
	e.preventDefault();
	$('.popup-bg').fadeIn(600);
})
$('.close-popup').click(function () {
	$('.popup-bg').fadeOut(600);
});
//-----------//Попап

// Проверка заполнения формы
function checkForm(elements) {
	var firstName = elements.firstName.value;
	var number = elements.number.value;
	var lastName = elements.lastName.value;
	regNum = /[0-9]/;
	let phonePattern = /^(\+7|7|8)?[\s\-]?\(?[489][0-9]{2}\)?[\s\-]?[0-9]{3}[\s\-]?[0-9]{2}[\s\-]?[0-9]{2}$/;
	// let emailPattern=/^[^ ]+@[^ ]+\.[a-z]{2,4}$/;
	var error = "";
	if (firstName == "" || number == "" || lastName == "")
		error = "Заполните все поля";
	else if (firstName.length <= 1 || firstName.length > 50)
		error = "Введите корректное имя";
	else if (/[^a-zA-Z0-9А-Яа-я]/.test(firstName))
		error = "В имени пользователя разрешены только буквы";
	else if (!/[0-9]/.test(number))
		error = "В номере телефона разрешены только цифры";
	else if (!number.match(phonePattern)) {
		error = "Неккоректно введен номер мобильного телефона";
	}
	if (error != "") {
		document.getElementById('error').innerHTML = error;
		return false;
	}
	else {
		alert("Все данные корректно заполнены! Скоро с Вами свяжется наш администратор");
		return true;
	}
}
// 
var basicTimeline = anime.timeline({
	autoplay: false
});

var pathEls = $(".check");
for (var i = 0; i < pathEls.length; i++) {
	var pathEl = pathEls[i];
	var offset = anime.setDashoffset(pathEl);
	pathEl.setAttribute("stroke-dashoffset", offset);
}

basicTimeline
	.add({
		targets: ".text",
		duration: 1,
		opacity: "0"
	})
	.add({
		targets: ".button",
		duration: 1300,
		height: 10,
		width: 300,
		backgroundColor: "#2B2D2F",
		border: "0",
		borderRadius: 100
	})
	.add({
		targets: ".progress-bar",
		duration: 2000,
		width: 300,
		easing: "linear"
	})
	.add({
		targets: ".button",
		width: 0,
		duration: 1
	})
	.add({
		targets: ".progress-bar",
		width: 80,
		height: 80,
		delay: 500,
		duration: 750,
		borderRadius: 80,
		backgroundColor: "#71DFBE"
	})
	.add({
		targets: pathEl,
		strokeDashoffset: [offset, 0],
		duration: 200,
		easing: "easeInOutSine"
	});

$(".button").click(function () {
	basicTimeline.play();
});

$(".text").click(function () {
	basicTimeline.play();
});
// 
// ЗАКРЫТИЕ БЛОКА СООБЩЕНИЯ С ОШИБКОЙ. РЕГИСТРАЦИЯ И ВХОД 
$('.message .close')
	.on('click', function () {
		$(this)
			.closest('.message')
			.transition('fade')
			;
	});
// Свайп окна регистрации/входа
$(document).ready(function () {
	$('ul.tabs li').click(function () {
		var tab_id = $(this).attr('data-tab');
		$('ul.tabs li').removeClass('current');
		$('.form-content').removeClass('current');
		$(this).addClass('current');
		$("#" + tab_id).addClass('current');
	})
});

$("#neww").click(function () {
	$(".position").addClass("big-width");
	$(".reg-form").addClass("grid-template");
});
$("#memberr").click(function () {
	$(".position").removeClass("big-width");
	$(".reg-form").removeClass("grid-template");
});
// Маска для телефона
jQuery(function ($) {
	$("input[type='phone']").mask("+7 (999) 99-99-999");
});

