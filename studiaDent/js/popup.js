const popupLinks = document.querySelectorAll('.popup-link');
const body = document.querySelector('body');
const lockPadding = document.querySelectorAll(".lock-padding");
let unlock = true;
// 800 милисекунд, то же, что указано в transition в css
const timeout = 800;
// проверка существования ссылки
if (popupLinks.length > 0) {
	for (let index = 0; index < popupLinks.length; index++) {
		const popupLink = popupLinks[index];
		popupLink.addEventListener("click", function (e) {
			// убираем значок хэша # из ссылки
			const popupName = popupLink.getAttribute('href').replace('#', '');
			// получаем сам объект popup id которого равен popupName
			const curentPopup = document.getElementById(popupName);
			// отправляем полученный объект в функцию popupOpen 
			popupOpen(curentPopup);
			// preventDefault - запрещаем перезагружать страницу, тк curentPopup - это ссылка
			e.preventDefault();
		});
	}
}
// любой объект (крестик, картинка, буква и тд) с классом .close-popup будет закрывать форму
const popupCloseIcon = document.querySelectorAll('.close-popup');
// проверяем есть ли вообще объект, который будет выполнять роль крестика для закрытия
if (popupCloseIcon.length > 0) {
	for (let index = 0; index < popupCloseIcon.length; index++) {
		const el = popupCloseIcon[index];
		// передаем значок который закрывает попап в функцию popupClose
		el.addEventListener('click', function (e) {
			popupClose(el.closest('.popup'));
			e.preventDefault();
		});
	}
}

function popupOpen(curentPopup) {
	if (curentPopup && unlock) {
		const popupActive = document.querySelector('.popup.open');
		if (popupActive) {
			popupClose(popupActive, false);
		}
		else {
			bodyLock();
		}
		curentPopup.classList.add('open');
		curentPopup.addEventListener("click", function (e) {
			if (!e.target.closest('.popup__content')) {
				popupClose(e.target.closest('.popup'));
			}
		});
	}
}

function popupClose(popupActive, doUnlock = true) {
	if (unlock) {
		popupActive.classList.remove('open');
		if (doUnlock) {
			bodyUnLock();
		}
	}
}


function bodyLock() {
	const lockPaddingValue = window.innerWidth - document.querySelector('.bodyWrapper').offsetWidth + 'px';
	if (lockPadding.length > 0) {
		for (let index = 0; index < lockPadding.length; index++) {
			const el = lockPadding[index];
			el.style.paddingRight = lockPaddingValue;
		}
	}
	body.style.paddingRight = lockPaddingValue;
	body.classList.add('lock');
	unlock = false;
	setTimeout(function () {
		unlock = true;
	}, timeout);
}

function bodyUnLock() {
	setTimeout(function () {
		if (lockPadding.length > 0) {
			for (let index = 0; index < lockPadding.length; index++) {
				const el = lockPadding[index];
				el.style.paddingRight = '0px';
			}
		}
		body.style.paddingRight = '0px';
		body.classList.remove('lock');
	}, timeout);
	// во время закрытия попапа появляется скролл, от чего попап немного дергается. Поэтому мы добавляем таймер до полного закрытия попапа, потом уже появляется скролл 
	unlock = false;

	setTimeout(function () {
		unlock = true;
	}, timeout);
}
// закрытие попапа по нажатию клавиши enter
document.addEventListener('keydown', function (e) {
	if (e.which === 27) {
		const popupActive = document.querySelector('.popup.open');
		popupClose(popupActive);
	}
});