const modalController = ({ modal, btnOpen, btnClose = '', time = 300 }) => {
	// querySelectorAll - получаем все кнопки с текущим классов, тк у нас несколько модальных окон
	const buttonElems = document.querySelectorAll(btnOpen);
	const modalElem = document.querySelector(modal);
	modalElem.style.cssText = `
	display: flex;
	visibility: hidden; 
	opacity: 0; 
	transition: opacity ${time}ms easy-in-out;
	`;

	const closeModal = event => {
		const target = event.target;
		if (target === modalElem ||
			(btnClose && target.closest(btnClose)) ||
			event.code === 'Escape') {
			modalElem.style.opacity = 0;
			setTimeout(() => {
				modalElem.style.visibility = 'hidden';
			}, time);
			window.removeEventListener('keydown', closeModal);
		}
	}


	const openModal = () => {
		modalElem.style.visibility = 'visible';
		modalElem.style.opacity = 1;
		window.addEventListener('keydown', closeModal)
	}
	buttonElems.forEach(btn => {
		btn.addEventListener('click', openModal);
	})
	// buttonElems.addEventListener('click', openModal);
	modalElem.addEventListener('click', closeModal);
};
// передаем в функцию параметры
modalController({
	// само модальное окно - селектор 
	modal: '.modal',
	// кнопка для отрытия 
	btnOpen: '.button-popup',
	btnClose: '.modal__close',
	time: 1000
});