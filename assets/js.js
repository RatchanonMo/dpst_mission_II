
// page
(function () {
	var page = $('.page'),
	    sidebar = $('.sidebar'),
	    burger = sidebar.find('.sidebar__burger'),
	    close = sidebar.find('.sidebar__close'),
	    header = $('.header'),
	    burgerHeader = header.find('.header__burger'),
	    search = header.find('.header__search'),
	    openSearch = header.find('.header__item_search');
	items = header.find('.header__item'), wrap = header.find('.header__wrap');

	items.each(function () {
		var item = $(this),
		    head = item.find('.header__head'),
		    body = item.find('.header__body');

		head.on('click', function (e) {
			e.stopPropagation();
			e.preventDefault();
			burgerHeader.removeClass('active');
			sidebar.removeClass('visible');
			search.slideUp();
			if (!item.hasClass('active')) {
				items.removeClass('active');
				item.addClass('active');
			} else {
				items.removeClass('active');
			}
		});

		body.on('click', function (e) {
			e.stopPropagation();
		});

		$('body').on('click', function () {
			items.removeClass('active');
		});
	});
	burger.on('click', function () {
		page.toggleClass('toggle');
		sidebar.toggleClass('active');
		setTimeout(function () {
			$('.js-slider').slick('resize');
		}, 400);
	});
	openSearch.on('click', function (e) {
		e.preventDefault();
		burgerHeader.removeClass('active');
		search.slideToggle();
		sidebar.removeClass('visible');
		$('html').removeClass('no-scroll');
		$('body').removeClass('no-scroll');
	});
	burgerHeader.on('click', function () {
		burgerHeader.toggleClass('active');
		search.slideUp();
		sidebar.toggleClass('visible');
		$('html').toggleClass('no-scroll');
		$('body').toggleClass('no-scroll');
	});
	close.on('click', function () {
		burgerHeader.removeClass('active');
		search.slideUp();
		sidebar.removeClass('visible');
		$('html').removeClass('no-scroll');
		$('body').removeClass('no-scroll');
	});
})();
var tooltipTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="tooltip"]'))
var tooltipList = tooltipTriggerList.map(function (tooltipTriggerEl) {
  return new bootstrap.Tooltip(tooltipTriggerEl)
})
