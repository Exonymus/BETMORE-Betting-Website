/*
 * ATTENTION: An "eval-source-map" devtool has been used.
 * This devtool is neither made for production nor for readable output files.
 * It uses "eval()" calls to create a separate source file with attached SourceMaps in the browser devtools.
 * If you are trying to read the output file, select a different devtool (https://webpack.js.org/configuration/devtool/)
 * or disable the default devtool with "devtool: false".
 * If you are looking for production-ready output files, see mode: "production" (https://webpack.js.org/configuration/mode/).
 */
/******/ (() => { // webpackBootstrap
/******/ 	"use strict";
/******/ 	var __webpack_modules__ = ({

/***/ "./resources/js/counter.mjs":
/*!**********************************!*\
  !*** ./resources/js/counter.mjs ***!
  \**********************************/
/***/ ((__unused_webpack___webpack_module__, __webpack_exports__, __webpack_require__) => {

eval("__webpack_require__.r(__webpack_exports__);\n$('.number-count').each(function () {\n  $(this).prop('Counter', 0).animate({\n    Counter: $(this).text()\n  }, {\n    duration: 2500,\n    easing: 'swing',\n    step: function step(now) {\n      $(this).text(addCommas(Math.ceil(now)));\n    }\n  });\n});\nfunction addCommas(nStr) {\n  nStr += '';\n  var x = nStr.split('.');\n  var x1 = x[0];\n  var x2 = x.length > 1 ? '.' + x[1] : '';\n  var rgx = /(\\d+)(\\d{3})/;\n  while (rgx.test(x1)) {\n    x1 = x1.replace(rgx, '$1' + ',' + '$2');\n  }\n  return x1 + x2;\n}//# sourceURL=[module]\n//# sourceMappingURL=data:application/json;charset=utf-8;base64,eyJ2ZXJzaW9uIjozLCJmaWxlIjoiLi9yZXNvdXJjZXMvanMvY291bnRlci5tanMiLCJtYXBwaW5ncyI6IjtBQUFBQSxDQUFDLENBQUMsZUFBZSxDQUFDLENBQUNDLElBQUksQ0FBQyxZQUFZO0VBQ2hDRCxDQUFDLENBQUMsSUFBSSxDQUFDLENBQUNFLElBQUksQ0FBQyxTQUFTLEVBQUUsQ0FBQyxDQUFDLENBQUNDLE9BQU8sQ0FBQztJQUMvQkMsT0FBTyxFQUFFSixDQUFDLENBQUMsSUFBSSxDQUFDLENBQUNLLElBQUksQ0FBQztFQUMxQixDQUFDLEVBQUU7SUFFQ0MsUUFBUSxFQUFFLElBQUk7SUFDZEMsTUFBTSxFQUFFLE9BQU87SUFDZkMsSUFBSSxFQUFFLFNBQUFBLEtBQVVDLEdBQUcsRUFBRTtNQUNqQlQsQ0FBQyxDQUFDLElBQUksQ0FBQyxDQUFDSyxJQUFJLENBQUNLLFNBQVMsQ0FBQ0MsSUFBSSxDQUFDQyxJQUFJLENBQUNILEdBQUcsQ0FBQyxDQUFDLENBQUM7SUFDM0M7RUFDSixDQUFDLENBQUM7QUFDTixDQUFDLENBQUM7QUFFRixTQUFTQyxTQUFTQSxDQUFDRyxJQUFJLEVBQUU7RUFDckJBLElBQUksSUFBSSxFQUFFO0VBQ1YsSUFBSUMsQ0FBQyxHQUFHRCxJQUFJLENBQUNFLEtBQUssQ0FBQyxHQUFHLENBQUM7RUFDdkIsSUFBSUMsRUFBRSxHQUFHRixDQUFDLENBQUMsQ0FBQyxDQUFDO0VBQ2IsSUFBSUcsRUFBRSxHQUFHSCxDQUFDLENBQUNJLE1BQU0sR0FBRyxDQUFDLEdBQUcsR0FBRyxHQUFHSixDQUFDLENBQUMsQ0FBQyxDQUFDLEdBQUcsRUFBRTtFQUN2QyxJQUFJSyxHQUFHLEdBQUcsY0FBYztFQUN4QixPQUFPQSxHQUFHLENBQUNDLElBQUksQ0FBQ0osRUFBRSxDQUFDLEVBQUU7SUFDakJBLEVBQUUsR0FBR0EsRUFBRSxDQUFDSyxPQUFPLENBQUNGLEdBQUcsRUFBRSxJQUFJLEdBQUcsR0FBRyxHQUFHLElBQUksQ0FBQztFQUMzQztFQUNBLE9BQU9ILEVBQUUsR0FBR0MsRUFBRTtBQUNsQiIsInNvdXJjZXMiOlsid2VicGFjazovLy8uL3Jlc291cmNlcy9qcy9jb3VudGVyLm1qcz83Y2E5Il0sInNvdXJjZXNDb250ZW50IjpbIiQoJy5udW1iZXItY291bnQnKS5lYWNoKGZ1bmN0aW9uICgpIHtcclxuICAgICQodGhpcykucHJvcCgnQ291bnRlcicsIDApLmFuaW1hdGUoe1xyXG4gICAgICAgIENvdW50ZXI6ICQodGhpcykudGV4dCgpXHJcbiAgICB9LCB7XHJcblxyXG4gICAgICAgIGR1cmF0aW9uOiAyNTAwLFxyXG4gICAgICAgIGVhc2luZzogJ3N3aW5nJyxcclxuICAgICAgICBzdGVwOiBmdW5jdGlvbiAobm93KSB7XHJcbiAgICAgICAgICAgICQodGhpcykudGV4dChhZGRDb21tYXMoTWF0aC5jZWlsKG5vdykpKTtcclxuICAgICAgICB9XHJcbiAgICB9KTtcclxufSk7XHJcblxyXG5mdW5jdGlvbiBhZGRDb21tYXMoblN0cikge1xyXG4gICAgblN0ciArPSAnJztcclxuICAgIHZhciB4ID0gblN0ci5zcGxpdCgnLicpO1xyXG4gICAgdmFyIHgxID0geFswXTtcclxuICAgIHZhciB4MiA9IHgubGVuZ3RoID4gMSA/ICcuJyArIHhbMV0gOiAnJztcclxuICAgIHZhciByZ3ggPSAvKFxcZCspKFxcZHszfSkvO1xyXG4gICAgd2hpbGUgKHJneC50ZXN0KHgxKSkge1xyXG4gICAgICAgIHgxID0geDEucmVwbGFjZShyZ3gsICckMScgKyAnLCcgKyAnJDInKTtcclxuICAgIH1cclxuICAgIHJldHVybiB4MSArIHgyO1xyXG59Il0sIm5hbWVzIjpbIiQiLCJlYWNoIiwicHJvcCIsImFuaW1hdGUiLCJDb3VudGVyIiwidGV4dCIsImR1cmF0aW9uIiwiZWFzaW5nIiwic3RlcCIsIm5vdyIsImFkZENvbW1hcyIsIk1hdGgiLCJjZWlsIiwiblN0ciIsIngiLCJzcGxpdCIsIngxIiwieDIiLCJsZW5ndGgiLCJyZ3giLCJ0ZXN0IiwicmVwbGFjZSJdLCJzb3VyY2VSb290IjoiIn0=\n//# sourceURL=webpack-internal:///./resources/js/counter.mjs\n");

/***/ })

/******/ 	});
/************************************************************************/
/******/ 	// The require scope
/******/ 	var __webpack_require__ = {};
/******/ 	
/************************************************************************/
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
/******/ 	var __webpack_exports__ = {};
/******/ 	__webpack_modules__["./resources/js/counter.mjs"](0, __webpack_exports__, __webpack_require__);
/******/ 	
/******/ })()
;