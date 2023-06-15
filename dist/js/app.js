/*
 * ATTENTION: An "eval-source-map" devtool has been used.
 * This devtool is neither made for production nor for readable output files.
 * It uses "eval()" calls to create a separate source file with attached SourceMaps in the browser devtools.
 * If you are trying to read the output file, select a different devtool (https://webpack.js.org/configuration/devtool/)
 * or disable the default devtool with "devtool: false".
 * If you are looking for production-ready output files, see mode: "production" (https://webpack.js.org/configuration/mode/).
 */
/******/ (() => { // webpackBootstrap
/******/ 	var __webpack_modules__ = ({

/***/ "./src/js/app.js":
/*!***********************!*\
  !*** ./src/js/app.js ***!
  \***********************/
/***/ ((__unused_webpack_module, __webpack_exports__, __webpack_require__) => {

"use strict";
eval("__webpack_require__.r(__webpack_exports__);\n/* harmony import */ var _scss_app_scss__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! ../scss/app.scss */ \"./src/scss/app.scss\");\n/* harmony import */ var _header__WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! ./header */ \"./src/js/header.js\");\n/* harmony import */ var _header__WEBPACK_IMPORTED_MODULE_1___default = /*#__PURE__*/__webpack_require__.n(_header__WEBPACK_IMPORTED_MODULE_1__);\n\n\n/* Your JS Code goes here *///# sourceURL=[module]\n//# sourceMappingURL=data:application/json;charset=utf-8;base64,eyJ2ZXJzaW9uIjozLCJzb3VyY2VzIjpbIndlYnBhY2s6Ly9Ad2VhcmVhdGhsb24vZnJvbnRlbmQtd2VicGFjay1ib2lsZXJwbGF0ZS8uL3NyYy9qcy9hcHAuanM/OTBlOSJdLCJuYW1lcyI6W10sIm1hcHBpbmdzIjoiOzs7O0FBQUE7QUFDQTtBQUVBIiwiZmlsZSI6Ii4vc3JjL2pzL2FwcC5qcy5qcyIsInNvdXJjZXNDb250ZW50IjpbImltcG9ydCAnLi4vc2Nzcy9hcHAuc2Nzcyc7XG5pbXBvcnQgJy4vaGVhZGVyJztcblxuLyogWW91ciBKUyBDb2RlIGdvZXMgaGVyZSAqL1xuXG5cbiJdLCJzb3VyY2VSb290IjoiIn0=\n//# sourceURL=webpack-internal:///./src/js/app.js\n");

/***/ }),

/***/ "./src/js/header.js":
/*!**************************!*\
  !*** ./src/js/header.js ***!
  \**************************/
/***/ (() => {

eval("var header = document.querySelector(\".js-header\");\nvar headerMenuToggle = document.querySelector(\".js-header-menu-toggle\");\nvar headerClosedButton = document.querySelector(\".js-header-bottom-btn\");\nvar headerCats = document.querySelectorAll(\".js-header-cats\");\nvar headerCards = document.querySelectorAll(\".js-header-cards\");\nwindow.addEventListener('scroll', function () {\n  if (window.scrollY > 100) {\n    header.classList.add(\"scrolled\");\n  } else {\n    header.classList.remove(\"scrolled\");\n  }\n});\nheaderMenuToggle.addEventListener('click', function () {\n  header.classList.toggle(\"open\");\n});\nheaderClosedButton.addEventListener('click', function () {\n  header.classList.remove(\"open\");\n});\nheader.addEventListener('click', function (event) {\n  console.log(event.target.classList);\n  var classes = event.target.classList;\n  console.log(classes.contains(\"open\"));\n\n  if (classes.contains(\"open\")) {\n    header.classList.remove(\"open\");\n  }\n});\nheaderCats.forEach(function (item) {\n  console.log(item);\n  item.addEventListener('click', function () {\n    headerCats.forEach(function (clearItem) {\n      if (clearItem.classList.contains(\"active\")) {\n        clearItem.classList.remove(\"active\");\n      }\n    });\n    item.classList.add(\"active\");\n  });\n});//# sourceURL=[module]\n//# sourceMappingURL=data:application/json;charset=utf-8;base64,eyJ2ZXJzaW9uIjozLCJzb3VyY2VzIjpbIndlYnBhY2s6Ly9Ad2VhcmVhdGhsb24vZnJvbnRlbmQtd2VicGFjay1ib2lsZXJwbGF0ZS8uL3NyYy9qcy9oZWFkZXIuanM/Y2E3NSJdLCJuYW1lcyI6WyJoZWFkZXIiLCJkb2N1bWVudCIsInF1ZXJ5U2VsZWN0b3IiLCJoZWFkZXJNZW51VG9nZ2xlIiwiaGVhZGVyQ2xvc2VkQnV0dG9uIiwiaGVhZGVyQ2F0cyIsInF1ZXJ5U2VsZWN0b3JBbGwiLCJoZWFkZXJDYXJkcyIsIndpbmRvdyIsImFkZEV2ZW50TGlzdGVuZXIiLCJzY3JvbGxZIiwiY2xhc3NMaXN0IiwiYWRkIiwicmVtb3ZlIiwidG9nZ2xlIiwiZXZlbnQiLCJjb25zb2xlIiwibG9nIiwidGFyZ2V0IiwiY2xhc3NlcyIsImNvbnRhaW5zIiwiZm9yRWFjaCIsIml0ZW0iLCJjbGVhckl0ZW0iXSwibWFwcGluZ3MiOiJBQUFBLElBQU1BLE1BQU0sR0FBR0MsUUFBUSxDQUFDQyxhQUFULENBQXVCLFlBQXZCLENBQWY7QUFFQSxJQUFNQyxnQkFBZ0IsR0FBR0YsUUFBUSxDQUFDQyxhQUFULENBQXVCLHdCQUF2QixDQUF6QjtBQUVBLElBQU1FLGtCQUFrQixHQUFHSCxRQUFRLENBQUNDLGFBQVQsQ0FBdUIsdUJBQXZCLENBQTNCO0FBRUEsSUFBTUcsVUFBVSxHQUFHSixRQUFRLENBQUNLLGdCQUFULENBQTBCLGlCQUExQixDQUFuQjtBQUVBLElBQU1DLFdBQVcsR0FBR04sUUFBUSxDQUFDSyxnQkFBVCxDQUEwQixrQkFBMUIsQ0FBcEI7QUFNQUUsTUFBTSxDQUFDQyxnQkFBUCxDQUF3QixRQUF4QixFQUFrQyxZQUFZO0FBQzFDLE1BQUlELE1BQU0sQ0FBQ0UsT0FBUCxHQUFpQixHQUFyQixFQUEwQjtBQUN0QlYsSUFBQUEsTUFBTSxDQUFDVyxTQUFQLENBQWlCQyxHQUFqQixDQUFxQixVQUFyQjtBQUNILEdBRkQsTUFFTztBQUNIWixJQUFBQSxNQUFNLENBQUNXLFNBQVAsQ0FBaUJFLE1BQWpCLENBQXdCLFVBQXhCO0FBQ0g7QUFDSixDQU5EO0FBUUFWLGdCQUFnQixDQUFDTSxnQkFBakIsQ0FBa0MsT0FBbEMsRUFBMkMsWUFBSztBQUMvQ1QsRUFBQUEsTUFBTSxDQUFDVyxTQUFQLENBQWlCRyxNQUFqQixDQUF3QixNQUF4QjtBQUNBLENBRkQ7QUFJQVYsa0JBQWtCLENBQUNLLGdCQUFuQixDQUFvQyxPQUFwQyxFQUE2QyxZQUFLO0FBQ2pEVCxFQUFBQSxNQUFNLENBQUNXLFNBQVAsQ0FBaUJFLE1BQWpCLENBQXdCLE1BQXhCO0FBQ0EsQ0FGRDtBQUlBYixNQUFNLENBQUNTLGdCQUFQLENBQXdCLE9BQXhCLEVBQWlDLFVBQUNNLEtBQUQsRUFBVTtBQUMxQ0MsRUFBQUEsT0FBTyxDQUFDQyxHQUFSLENBQVlGLEtBQUssQ0FBQ0csTUFBTixDQUFhUCxTQUF6QjtBQUNBLE1BQU1RLE9BQU8sR0FBR0osS0FBSyxDQUFDRyxNQUFOLENBQWFQLFNBQTdCO0FBQ0FLLEVBQUFBLE9BQU8sQ0FBQ0MsR0FBUixDQUFZRSxPQUFPLENBQUNDLFFBQVIsQ0FBaUIsTUFBakIsQ0FBWjs7QUFDQyxNQUFJRCxPQUFPLENBQUNDLFFBQVIsQ0FBaUIsTUFBakIsQ0FBSixFQUE4QjtBQUM3QnBCLElBQUFBLE1BQU0sQ0FBQ1csU0FBUCxDQUFpQkUsTUFBakIsQ0FBd0IsTUFBeEI7QUFDQTtBQUNGLENBUEQ7QUFTQVIsVUFBVSxDQUFDZ0IsT0FBWCxDQUFtQixVQUFDQyxJQUFELEVBQVU7QUFDNUJOLEVBQUFBLE9BQU8sQ0FBQ0MsR0FBUixDQUFZSyxJQUFaO0FBQ0FBLEVBQUFBLElBQUksQ0FBQ2IsZ0JBQUwsQ0FBc0IsT0FBdEIsRUFBK0IsWUFBTTtBQUNwQ0osSUFBQUEsVUFBVSxDQUFDZ0IsT0FBWCxDQUFtQixVQUFDRSxTQUFELEVBQWU7QUFDakMsVUFBSUEsU0FBUyxDQUFDWixTQUFWLENBQW9CUyxRQUFwQixDQUE2QixRQUE3QixDQUFKLEVBQTRDO0FBQzNDRyxRQUFBQSxTQUFTLENBQUNaLFNBQVYsQ0FBb0JFLE1BQXBCLENBQTJCLFFBQTNCO0FBQ0E7QUFDRCxLQUpEO0FBS0FTLElBQUFBLElBQUksQ0FBQ1gsU0FBTCxDQUFlQyxHQUFmLENBQW1CLFFBQW5CO0FBQ0EsR0FQRDtBQVFBLENBVkQiLCJzb3VyY2VzQ29udGVudCI6WyJjb25zdCBoZWFkZXIgPSBkb2N1bWVudC5xdWVyeVNlbGVjdG9yKFwiLmpzLWhlYWRlclwiKVxuXG5jb25zdCBoZWFkZXJNZW51VG9nZ2xlID0gZG9jdW1lbnQucXVlcnlTZWxlY3RvcihcIi5qcy1oZWFkZXItbWVudS10b2dnbGVcIilcblxuY29uc3QgaGVhZGVyQ2xvc2VkQnV0dG9uID0gZG9jdW1lbnQucXVlcnlTZWxlY3RvcihcIi5qcy1oZWFkZXItYm90dG9tLWJ0blwiKVxuXG5jb25zdCBoZWFkZXJDYXRzID0gZG9jdW1lbnQucXVlcnlTZWxlY3RvckFsbChcIi5qcy1oZWFkZXItY2F0c1wiKVxuXG5jb25zdCBoZWFkZXJDYXJkcyA9IGRvY3VtZW50LnF1ZXJ5U2VsZWN0b3JBbGwoXCIuanMtaGVhZGVyLWNhcmRzXCIpXG5cblxuXG5cblxud2luZG93LmFkZEV2ZW50TGlzdGVuZXIoJ3Njcm9sbCcsIGZ1bmN0aW9uICgpIHtcbiAgICBpZiAod2luZG93LnNjcm9sbFkgPiAxMDApIHtcbiAgICAgICAgaGVhZGVyLmNsYXNzTGlzdC5hZGQoXCJzY3JvbGxlZFwiKTtcbiAgICB9IGVsc2Uge1xuICAgICAgICBoZWFkZXIuY2xhc3NMaXN0LnJlbW92ZShcInNjcm9sbGVkXCIpO1xuICAgIH1cbn0pO1xuXG5oZWFkZXJNZW51VG9nZ2xlLmFkZEV2ZW50TGlzdGVuZXIoJ2NsaWNrJywgKCkgPT57XG5cdGhlYWRlci5jbGFzc0xpc3QudG9nZ2xlKFwib3BlblwiKTtcbn0pO1xuXG5oZWFkZXJDbG9zZWRCdXR0b24uYWRkRXZlbnRMaXN0ZW5lcignY2xpY2snLCAoKSA9Pntcblx0aGVhZGVyLmNsYXNzTGlzdC5yZW1vdmUoXCJvcGVuXCIpO1xufSk7XG5cbmhlYWRlci5hZGRFdmVudExpc3RlbmVyKCdjbGljaycsIChldmVudCkgPT57XG5cdGNvbnNvbGUubG9nKGV2ZW50LnRhcmdldC5jbGFzc0xpc3QpXG5cdGNvbnN0IGNsYXNzZXMgPSBldmVudC50YXJnZXQuY2xhc3NMaXN0XG5cdGNvbnNvbGUubG9nKGNsYXNzZXMuY29udGFpbnMoXCJvcGVuXCIpKVxuXHRcdGlmIChjbGFzc2VzLmNvbnRhaW5zKFwib3BlblwiKSkge1xuXHRcdFx0aGVhZGVyLmNsYXNzTGlzdC5yZW1vdmUoXCJvcGVuXCIpXG5cdFx0fVxufSk7XG5cbmhlYWRlckNhdHMuZm9yRWFjaCgoaXRlbSkgPT4ge1xuXHRjb25zb2xlLmxvZyhpdGVtKVxuXHRpdGVtLmFkZEV2ZW50TGlzdGVuZXIoJ2NsaWNrJywgKCkgPT4ge1xuXHRcdGhlYWRlckNhdHMuZm9yRWFjaCgoY2xlYXJJdGVtKSA9PiB7XG5cdFx0XHRpZiAoY2xlYXJJdGVtLmNsYXNzTGlzdC5jb250YWlucyhcImFjdGl2ZVwiKSkge1xuXHRcdFx0XHRjbGVhckl0ZW0uY2xhc3NMaXN0LnJlbW92ZShcImFjdGl2ZVwiKVxuXHRcdFx0fVxuXHRcdH0pXG5cdFx0aXRlbS5jbGFzc0xpc3QuYWRkKFwiYWN0aXZlXCIpXG5cdH0pO1xufSk7XG5cblxuXG4iXSwiZmlsZSI6Ii4vc3JjL2pzL2hlYWRlci5qcy5qcyIsInNvdXJjZVJvb3QiOiIifQ==\n//# sourceURL=webpack-internal:///./src/js/header.js\n");

/***/ }),

/***/ "./src/scss/app.scss":
/*!***************************!*\
  !*** ./src/scss/app.scss ***!
  \***************************/
/***/ ((__unused_webpack_module, __webpack_exports__, __webpack_require__) => {

"use strict";
eval("__webpack_require__.r(__webpack_exports__);\n// extracted by mini-css-extract-plugin\n//# sourceURL=[module]\n//# sourceMappingURL=data:application/json;charset=utf-8;base64,eyJ2ZXJzaW9uIjozLCJzb3VyY2VzIjpbIndlYnBhY2s6Ly9Ad2VhcmVhdGhsb24vZnJvbnRlbmQtd2VicGFjay1ib2lsZXJwbGF0ZS8uL3NyYy9zY3NzL2FwcC5zY3NzPzYyOWUiXSwibmFtZXMiOltdLCJtYXBwaW5ncyI6IjtBQUFBIiwiZmlsZSI6Ii4vc3JjL3Njc3MvYXBwLnNjc3MuanMiLCJzb3VyY2VzQ29udGVudCI6WyIvLyBleHRyYWN0ZWQgYnkgbWluaS1jc3MtZXh0cmFjdC1wbHVnaW5cbmV4cG9ydCB7fTsiXSwic291cmNlUm9vdCI6IiJ9\n//# sourceURL=webpack-internal:///./src/scss/app.scss\n");

/***/ })

/******/ 	});
/************************************************************************/
/******/ 	// The module cache
/******/ 	var __webpack_module_cache__ = {};
/******/ 	
/******/ 	// The require function
/******/ 	function __webpack_require__(moduleId) {
/******/ 		// Check if module is in cache
/******/ 		var cachedModule = __webpack_module_cache__[moduleId];
/******/ 		if (cachedModule !== undefined) {
/******/ 			return cachedModule.exports;
/******/ 		}
/******/ 		// Create a new module (and put it into the cache)
/******/ 		var module = __webpack_module_cache__[moduleId] = {
/******/ 			// no module.id needed
/******/ 			// no module.loaded needed
/******/ 			exports: {}
/******/ 		};
/******/ 	
/******/ 		// Execute the module function
/******/ 		__webpack_modules__[moduleId](module, module.exports, __webpack_require__);
/******/ 	
/******/ 		// Return the exports of the module
/******/ 		return module.exports;
/******/ 	}
/******/ 	
/************************************************************************/
/******/ 	/* webpack/runtime/compat get default export */
/******/ 	(() => {
/******/ 		// getDefaultExport function for compatibility with non-harmony modules
/******/ 		__webpack_require__.n = (module) => {
/******/ 			var getter = module && module.__esModule ?
/******/ 				() => (module['default']) :
/******/ 				() => (module);
/******/ 			__webpack_require__.d(getter, { a: getter });
/******/ 			return getter;
/******/ 		};
/******/ 	})();
/******/ 	
/******/ 	/* webpack/runtime/define property getters */
/******/ 	(() => {
/******/ 		// define getter functions for harmony exports
/******/ 		__webpack_require__.d = (exports, definition) => {
/******/ 			for(var key in definition) {
/******/ 				if(__webpack_require__.o(definition, key) && !__webpack_require__.o(exports, key)) {
/******/ 					Object.defineProperty(exports, key, { enumerable: true, get: definition[key] });
/******/ 				}
/******/ 			}
/******/ 		};
/******/ 	})();
/******/ 	
/******/ 	/* webpack/runtime/hasOwnProperty shorthand */
/******/ 	(() => {
/******/ 		__webpack_require__.o = (obj, prop) => (Object.prototype.hasOwnProperty.call(obj, prop))
/******/ 	})();
/******/ 	
/******/ 	/* webpack/runtime/make namespace object */
/******/ 	(() => {
/******/ 		// define __esModule on exports
/******/ 		__webpack_require__.r = (exports) => {
/******/ 			if(typeof Symbol !== 'undefined' && Symbol.toStringTag) {
/******/ 				Object.defineProperty(exports, Symbol.toStringTag, { value: 'Module' });
/******/ 			}
/******/ 			Object.defineProperty(exports, '__esModule', { value: true });
/******/ 		};
/******/ 	})();
/******/ 	
/************************************************************************/
/******/ 	
/******/ 	// startup
/******/ 	// Load entry module and return exports
/******/ 	// This entry module can't be inlined because the eval-source-map devtool is used.
/******/ 	var __webpack_exports__ = __webpack_require__("./src/js/app.js");
/******/ 	
/******/ })()
;