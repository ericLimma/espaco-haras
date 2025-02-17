class Slider {
        constructor(container, options = {}) {
                this.container = container;
                this.slideWrapper = container.querySelector('[data-slide="wrapper"]');
                this.slideList = container.querySelector('[data-slide="list"]');
                this.navPrevButton = container.querySelector('[data-slide="nav-prev-button"]');
                this.navNextButton = container.querySelector('[data-slide="nav-next-button"]');
                this.controlsWrapper = container.querySelector('[data-slide="controls-wrapper"]');
                this.slideItems = container.querySelectorAll('[data-slide="item"]');
                this.controlsButtons;
                this.slideInterval;
                this.state = {
                        startingPoint: 0,
                        savedPosition: 0,
                        currentPoint: 0,
                        movement: 0,
                        currentSlideIndex: 0,
                        autoPlay: options.autoPlay ?? true,
                        timeInterval: options.timeInterval || 3000,
                        controls: options.controls || false,
                        arrows: options.arrows || true,
                };

                this.init(options);
        }

        init(options) {
                const { startAtIndex = 0 } = options;
                const slidesPerView = this.getSlidesPerView();

                if (!this.state.arrows) {
                        this.navPrevButton.style.display = 'none';
                        this.navNextButton.style.display = 'none';
                }

                this.createControlButtons();
                this.createSlideClones();

                this.setVisibled({ index: startAtIndex + slidesPerView, animate: false });

                if (!this.state.controls) {
                        this.controlsWrapper.style.display = 'none';
                }
                if (this.state.autoPlay) {
                        this.setAutoPlay();
                }

                this.setListeners();
        }

        translateSlide({ position }) {
                this.state.savedPosition = position;
                this.slideList.style.transform = `translateX(${position}px)`;
        }

        getSlidesPerView() {
                const windowWidth = window.innerWidth;

                if (windowWidth > 1600) return 3;
                else if (windowWidth <= 1199 && windowWidth > 590) return 2;
                else return 1;
        }

        getCenterPosition({ index }) {
                const slidesPerView = this.getSlidesPerView();
                const slideItem = this.slideItems[index];
                const slideWidth = slideItem.clientWidth;
                const totalSlidesWidth = slideWidth * slidesPerView;
                const windowWidth = document.body.clientWidth;
                const margin = (windowWidth - totalSlidesWidth) / 2;

                const position = margin - (index * slideWidth);
                return position;
        }

        adjustVisibleSlides() {
                const slidesPerView = this.getSlidesPerView();

                this.slideList.style.width = `${this.slideItems[0].clientWidth * this.slideItems.length}px`;
                const totalSlidesWidth = this.slideItems[0].clientWidth * this.slideItems.length;
                if (this.slideList.offsetWidth < totalSlidesWidth) {
                        this.slideList.style.width = `${totalSlidesWidth}px`;
                }

                this.setVisibled({ index: this.state.currentSlideIndex, animate: true });
        }

        setVisibled({ index, animate }) {
                const slidesPerView = this.getSlidesPerView();
                if (index < 0) index = this.slideItems.length - slidesPerView;
                if (index >= this.slideItems.length) index = slidesPerView - 1;

                const position = this.getCenterPosition({ index });
                this.state.currentSlideIndex = index;
                this.slideList.style.transition = animate ? "transform .5s" : 'none';
                this.activeControlButton(index);
                this.translateSlide({ position });
        }

        nextSlide() {
                const slidesPerView = this.getSlidesPerView();
                if (this.state.currentSlideIndex + slidesPerView >= this.slideItems.length) {
                        this.setVisibled({ index: slidesPerView, animate: false });
                } else {
                        this.setVisibled({ index: this.state.currentSlideIndex + 1, animate: true });
                }
        }

        prevSlide() {
                const slidesPerView = this.getSlidesPerView();
                if (this.state.currentSlideIndex - slidesPerView < 0) {
                        this.setVisibled({ index: this.slideItems.length - slidesPerView - 1, animate: false });
                } else {
                        this.setVisibled({ index: this.state.currentSlideIndex - 1, animate: true });
                }
        }

        createControlButtons() {
                this.controlsButtons = this.controlsWrapper.querySelectorAll('[data-slide="control-button"]');
                this.slideItems.forEach(() => {
                        const controlButton = document.createElement('button');
                        controlButton.classList.add('slide-control-button');
                        controlButton.dataset.slide = 'control-button';
                        this.controlsWrapper.append(controlButton);
                });
        }

        activeControlButton(index) {
                const slideItem = this.slideItems[index];
                const dataIndex = Number(slideItem.dataset.index);
                const controlButton = this.controlsButtons[dataIndex];

                this.controlsButtons.forEach((controlButtonItem) => {
                        controlButtonItem.classList.remove('active');
                });

                if (controlButton) controlButton.classList.add('active');
        }

        createSlideClones() {
                const slidesPerView = this.getSlidesPerView();

                for (let i = 0; i < slidesPerView; i++) {
                        const firstSlide = this.slideItems[i].cloneNode(true);
                        firstSlide.classList.add('slide-cloned');
                        firstSlide.dataset.index = this.slideItems.length + i;
                        this.slideList.append(firstSlide);

                        const lastSlide = this.slideItems[this.slideItems.length - 1 - i].cloneNode(true);
                        lastSlide.classList.add('slide-cloned');
                        lastSlide.dataset.index = -1 - i;
                        this.slideList.prepend(lastSlide);
                }

                this.slideItems = this.container.querySelectorAll('[data-slide="item"]');
                this.adjustVisibleSlides();
        }

        setAutoPlay() {
                if (this.state.autoPlay) {
                        this.slideInterval = setInterval(() => {
                                this.nextSlide();
                        }, this.state.timeInterval);
                }
        }

        setListeners() {
                this.controlsButtons = this.controlsWrapper.querySelectorAll('[data-slide="control-button"]');
                this.controlsButtons.forEach((controlButton, index) => {
                        controlButton.addEventListener('click', () => {
                                this.onControlButtonClick(index);
                        });
                });
                this.slideItems.forEach((slideItem, index) => {
                        slideItem.addEventListener('dragstart', event => {
                                event.preventDefault();
                        });
                        slideItem.addEventListener('mousedown', (event) => {
                                this.onMouseDown(event, index);
                                slideItem.addEventListener('mouseleave', this.onMouseUp.bind(this));
                        });
                        slideItem.addEventListener('mouseup', this.onMouseUp.bind(this));
                        slideItem.addEventListener('touchstart', (event) => {
                                this.onTouchStart(event, index);
                        });
                        slideItem.addEventListener('touchend', this.onTouchEnd.bind(this));
                });
                this.navNextButton.addEventListener('click', this.nextSlide.bind(this));
                this.navPrevButton.addEventListener('click', this.prevSlide.bind(this));
                this.slideList.addEventListener('transitionend', this.onSlideListTransitionEnd.bind(this));
                this.slideWrapper.addEventListener('mouseenter', () => {
                        clearInterval(this.slideInterval);
                });
                this.slideWrapper.addEventListener('mouseleave', this.setAutoPlay.bind(this));
                let resizeTimeout;
                window.addEventListener('resize', () => {
                        clearTimeout(resizeTimeout);
                        resizeTimeout = setTimeout(() => {
                                this.setVisibled({ index: this.state.currentSlideIndex, animate: false });
                                this.adjustVisibleSlides();
                        }, 300);
                });
        }

        onMouseDown(event, index) {
                const slideItem = event.currentTarget;
                this.state.startingPoint = event.clientX;
                this.state.currentPoint = event.clientX - this.state.savedPosition;
                this.state.currentSlideIndex = index;
                this.slideList.style.transition = 'none';

                slideItem.style.cursor = 'grabbing';
                slideItem.addEventListener('mousemove', this.onMouseMove.bind(this));
        }

        onMouseMove(event) {
                this.state.movement = event.clientX - this.state.startingPoint;
                const position = event.clientX - this.state.currentPoint;
                this.translateSlide({ position });
        }

        onMouseUp(event) {
                const pointsToMove = event.type.includes('touch') ? 50 : 150;

                const slideItem = event.currentTarget;

                if (this.state.movement < -pointsToMove) {
                        this.nextSlide();
                } else if (this.state.movement > pointsToMove) {
                        this.prevSlide();
                } else {
                        this.setVisibled({ index: this.state.currentSlideIndex, animate: true });
                }

                slideItem.removeEventListener('mouseleave', this.onMouseUp.bind(this));
                slideItem.removeEventListener('mousemove', this.onMouseMove.bind(this));
                slideItem.style.cursor = 'grab';
        }

        onTouchStart(event, index) {
                event.clientX = event.touches[0].clientX;
                this.onMouseDown(event, index);
                const slideItem = event.currentTarget;
                slideItem.addEventListener('touchmove', this.onTouchMove.bind(this));
        }

        onTouchMove(event) {
                event.clientX = event.touches[0].clientX;
                this.onMouseMove(event);
        }

        onTouchEnd(event) {
                this.onMouseUp(event);
                const slideItem = event.currentTarget;
                slideItem.removeEventListener('touchmove', this.onTouchMove.bind(this));
        }

        onControlButtonClick(index) {
                const slidesPerView = this.getSlidesPerView();
                const targetIndex = index + slidesPerView;
                this.setVisibled({ index: targetIndex, animate: true });
        }

        onSlideListTransitionEnd() {
                const slideItem = this.slideItems[this.state.currentSlideIndex];
                const slidesPerView = this.getSlidesPerView();

                if (slideItem.classList.contains("slide-cloned")) {
                        if (Number(slideItem.dataset.index) >= this.slideItems.length - slidesPerView) {
                                this.setVisibled({ index: slidesPerView, animate: false });
                        } else if (Number(slideItem.dataset.index) < slidesPerView) {
                                this.setVisibled({ index: this.slideItems.length - slidesPerView - 1, animate: false });
                        }
                }
        }

}

document.addEventListener('DOMContentLoaded', () => {
        console.log(document.querySelectorAll('.wrapper'));
        document.querySelectorAll('.wrapper').forEach(container => {
                new Slider(container, {
                        startAtIndex: 0,
                        autoPlay: true,
                        timeInterval: 3000,
                        controls: false,
                        arrows: true
                });
        });
})

