import domReady from '@roots/sage/client/dom-ready';

/**
 * Application entrypoint
 */
domReady(async () => {
  // ...
});

/**
 * @see {@link https://webpack.js.org/api/hot-module-replacement/}
 */
if (import.meta.webpackHot) import.meta.webpackHot.accept(console.error);

function isElementInViewport(el) {
  var rect = el.getBoundingClientRect();
  return (
    rect.top >= 0 &&
    rect.left >= 0 &&
    rect.bottom <=
      (window.innerHeight || document.documentElement.clientHeight) &&
    rect.right <= (window.innerWidth || document.documentElement.clientWidth)
  );
}

function handleScroll() {
  var animatedElements = document.querySelectorAll('.animated');

  animatedElements.forEach(function (element) {
    if (isElementInViewport(element)) {
      element.classList.add('fade-up');
    }
  });
}

window.addEventListener('scroll', handleScroll);
window.addEventListener('load', handleScroll);

function handleHeaderBckg() {
  var header = document.querySelector('header');

  if (window.scrollY > 30) {
    header.classList.add('scrolled');
  } else {
    header.classList.remove('scrolled');
  }
}

window.addEventListener('scroll', handleHeaderBckg);
window.addEventListener('load', handleHeaderBckg);
