// Слайдер на jQuery

$(document).ready(function () {
	// Начальная позиция
	let position = 0;
	// сколько элементов показывать
	const slidesTOShow = 3;
	// сколько элементов проскроллировать
	const slideToScroll = 2;
	const container = $('.slider-container');
	const track = $('.slider-track');
	const item = $('.slider-item');
	const btnPrev = $('.btn-prev');
	const btnNext = $('.btn-next');
	// количество элементов
	const itemsCount = item.length;
	const itemWidth = container.width() / slidesTOShow;
	const movePosition = slideToScroll * itemWidth;
	// Ширина каждого элемента

	item.each(function (index, item) {
		$(item).css({
			minWidth: itemWidth - 9,
		});
	});


	btnPrev.click(function () {
		const itemsLeft = (Math.abs(position)) / itemWidth;

		position += itemsLeft >= slideToScroll ? movePosition : itemsLeft * itemWidth;
		// смещение трека
		setPosition();
		checkBtns();

	});


	btnNext.click(function () {
		// сколько элементов осталось
		const itemsLeft = itemsCount - (Math.abs(position) + slidesTOShow * itemWidth) / itemWidth;
		position -= itemsLeft >= slideToScroll ? movePosition : itemsLeft * itemWidth;
		setPosition();
		checkBtns();
	});
	const setPosition = () => {
		track.css({
			transform: `translateX(${position}px)`
		});

	};
	const checkBtns = () => {
		// (запрещаем нажимать кнопку, условие)
		btnPrev.prop('disabled', position === 0);
		btnNext.prop(
			'disabled',
			// когда мы скролим вперед, то элементы движутся в отрицательную сторону, поэтому ставим знак минус перед вычислениями
			position <= -(itemsCount - slidesTOShow) * itemWidth,
		);
	};
	checkBtns();
});
