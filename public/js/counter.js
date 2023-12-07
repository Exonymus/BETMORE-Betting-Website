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

/***/ "./resources/js/counter.js":
/*!*********************************!*\
  !*** ./resources/js/counter.js ***!
  \*********************************/
/***/ (() => {

eval("$('.number-count').each(function () {\n  $(this).prop('Counter', 0).animate({\n    Counter: $(this).text()\n  }, {\n    duration: 2500,\n    easing: 'swing',\n    step: function step(now) {\n      $(this).text(addCommas(Math.ceil(now)));\n    }\n  });\n});\nfunction addCommas(nStr) {\n  nStr += '';\n  var x = nStr.split('.');\n  var x1 = x[0];\n  var x2 = x.length > 1 ? '.' + x[1] : '';\n  var rgx = /(\\d+)(\\d{3})/;\n  while (rgx.test(x1)) {\n    x1 = x1.replace(rgx, '$1' + ',' + '$2');\n  }\n  return x1 + x2;\n}//# sourceURL=[module]\n//# sourceMappingURL=data:application/json;charset=utf-8;base64,eyJ2ZXJzaW9uIjozLCJuYW1lcyI6WyIkIiwiZWFjaCIsInByb3AiLCJhbmltYXRlIiwiQ291bnRlciIsInRleHQiLCJkdXJhdGlvbiIsImVhc2luZyIsInN0ZXAiLCJub3ciLCJhZGRDb21tYXMiLCJNYXRoIiwiY2VpbCIsIm5TdHIiLCJ4Iiwic3BsaXQiLCJ4MSIsIngyIiwibGVuZ3RoIiwicmd4IiwidGVzdCIsInJlcGxhY2UiXSwic291cmNlcyI6WyJ3ZWJwYWNrOi8vLy4vcmVzb3VyY2VzL2pzL2NvdW50ZXIuanM/YThkNyJdLCJzb3VyY2VzQ29udGVudCI6WyIkKCcubnVtYmVyLWNvdW50JykuZWFjaChmdW5jdGlvbiAoKSB7XHJcbiAgICAkKHRoaXMpLnByb3AoJ0NvdW50ZXInLCAwKS5hbmltYXRlKHtcclxuICAgICAgICBDb3VudGVyOiAkKHRoaXMpLnRleHQoKVxyXG4gICAgfSwge1xyXG5cclxuICAgICAgICBkdXJhdGlvbjogMjUwMCxcclxuICAgICAgICBlYXNpbmc6ICdzd2luZycsXHJcbiAgICAgICAgc3RlcDogZnVuY3Rpb24gKG5vdykge1xyXG4gICAgICAgICAgICAkKHRoaXMpLnRleHQoYWRkQ29tbWFzKE1hdGguY2VpbChub3cpKSk7XHJcbiAgICAgICAgfVxyXG4gICAgfSk7XHJcbn0pO1xyXG5cclxuZnVuY3Rpb24gYWRkQ29tbWFzKG5TdHIpIHtcclxuICAgIG5TdHIgKz0gJyc7XHJcbiAgICB2YXIgeCA9IG5TdHIuc3BsaXQoJy4nKTtcclxuICAgIHZhciB4MSA9IHhbMF07XHJcbiAgICB2YXIgeDIgPSB4Lmxlbmd0aCA+IDEgPyAnLicgKyB4WzFdIDogJyc7XHJcbiAgICB2YXIgcmd4ID0gLyhcXGQrKShcXGR7M30pLztcclxuICAgIHdoaWxlIChyZ3gudGVzdCh4MSkpIHtcclxuICAgICAgICB4MSA9IHgxLnJlcGxhY2Uocmd4LCAnJDEnICsgJywnICsgJyQyJyk7XHJcbiAgICB9XHJcbiAgICByZXR1cm4geDEgKyB4MjtcclxufSJdLCJtYXBwaW5ncyI6IkFBQUFBLENBQUMsQ0FBQyxlQUFlLENBQUMsQ0FBQ0MsSUFBSSxDQUFDLFlBQVk7RUFDaENELENBQUMsQ0FBQyxJQUFJLENBQUMsQ0FBQ0UsSUFBSSxDQUFDLFNBQVMsRUFBRSxDQUFDLENBQUMsQ0FBQ0MsT0FBTyxDQUFDO0lBQy9CQyxPQUFPLEVBQUVKLENBQUMsQ0FBQyxJQUFJLENBQUMsQ0FBQ0ssSUFBSSxDQUFDO0VBQzFCLENBQUMsRUFBRTtJQUVDQyxRQUFRLEVBQUUsSUFBSTtJQUNkQyxNQUFNLEVBQUUsT0FBTztJQUNmQyxJQUFJLEVBQUUsU0FBQUEsS0FBVUMsR0FBRyxFQUFFO01BQ2pCVCxDQUFDLENBQUMsSUFBSSxDQUFDLENBQUNLLElBQUksQ0FBQ0ssU0FBUyxDQUFDQyxJQUFJLENBQUNDLElBQUksQ0FBQ0gsR0FBRyxDQUFDLENBQUMsQ0FBQztJQUMzQztFQUNKLENBQUMsQ0FBQztBQUNOLENBQUMsQ0FBQztBQUVGLFNBQVNDLFNBQVNBLENBQUNHLElBQUksRUFBRTtFQUNyQkEsSUFBSSxJQUFJLEVBQUU7RUFDVixJQUFJQyxDQUFDLEdBQUdELElBQUksQ0FBQ0UsS0FBSyxDQUFDLEdBQUcsQ0FBQztFQUN2QixJQUFJQyxFQUFFLEdBQUdGLENBQUMsQ0FBQyxDQUFDLENBQUM7RUFDYixJQUFJRyxFQUFFLEdBQUdILENBQUMsQ0FBQ0ksTUFBTSxHQUFHLENBQUMsR0FBRyxHQUFHLEdBQUdKLENBQUMsQ0FBQyxDQUFDLENBQUMsR0FBRyxFQUFFO0VBQ3ZDLElBQUlLLEdBQUcsR0FBRyxjQUFjO0VBQ3hCLE9BQU9BLEdBQUcsQ0FBQ0MsSUFBSSxDQUFDSixFQUFFLENBQUMsRUFBRTtJQUNqQkEsRUFBRSxHQUFHQSxFQUFFLENBQUNLLE9BQU8sQ0FBQ0YsR0FBRyxFQUFFLElBQUksR0FBRyxHQUFHLEdBQUcsSUFBSSxDQUFDO0VBQzNDO0VBQ0EsT0FBT0gsRUFBRSxHQUFHQyxFQUFFO0FBQ2xCIiwiZmlsZSI6Ii4vcmVzb3VyY2VzL2pzL2NvdW50ZXIuanMiLCJzb3VyY2VSb290IjoiIn0=\n//# sourceURL=webpack-internal:///./resources/js/counter.js\n");

/***/ })

/******/ 	});
/************************************************************************/
/******/ 	
/******/ 	// startup
/******/ 	// Load entry module and return exports
/******/ 	// This entry module can't be inlined because the eval-source-map devtool is used.
/******/ 	var __webpack_exports__ = {};
/******/ 	__webpack_modules__["./resources/js/counter.js"]();
/******/ 	
/******/ })()
;