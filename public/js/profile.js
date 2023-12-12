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

/***/ "./resources/js/profile.js":
/*!*********************************!*\
  !*** ./resources/js/profile.js ***!
  \*********************************/
/***/ (() => {

eval("document.getElementById('upload-avatar-btn').addEventListener(\"click\", function () {\n  document.getElementById('upload-avatar-inp').click();\n});\ndocument.getElementById('upload-avatar-inp').onchange = function () {\n  document.getElementById('avatar-img').src = URL.createObjectURL(document.getElementById('upload-avatar-inp').files[0]);\n};\nfunction setLevel(xp) {\n  var level = (xp / 5000).toFixed(0);\n  var exp = xp % 5000 / 5000;\n  document.getElementById('user-level').innerText = level.toString();\n  document.querySelector('.percentage').innerHTML = \"\".concat(exp * 100, \"%\");\n  document.querySelector('.cover .progressbar').style.width = \"\".concat(exp * 100, \"%\");\n}\n\n// setTimeout(() => {\n//     setLevel(6000);\n//     setTimeout(() => {\n//         setLevel(3000);\n//     }, 3000);\n// }, 3000);//# sourceURL=[module]\n//# sourceMappingURL=data:application/json;charset=utf-8;base64,eyJ2ZXJzaW9uIjozLCJuYW1lcyI6WyJkb2N1bWVudCIsImdldEVsZW1lbnRCeUlkIiwiYWRkRXZlbnRMaXN0ZW5lciIsImNsaWNrIiwib25jaGFuZ2UiLCJzcmMiLCJVUkwiLCJjcmVhdGVPYmplY3RVUkwiLCJmaWxlcyIsInNldExldmVsIiwieHAiLCJsZXZlbCIsInRvRml4ZWQiLCJleHAiLCJpbm5lclRleHQiLCJ0b1N0cmluZyIsInF1ZXJ5U2VsZWN0b3IiLCJpbm5lckhUTUwiLCJjb25jYXQiLCJzdHlsZSIsIndpZHRoIl0sInNvdXJjZXMiOlsid2VicGFjazovLy8uL3Jlc291cmNlcy9qcy9wcm9maWxlLmpzPzllMWEiXSwic291cmNlc0NvbnRlbnQiOlsiZG9jdW1lbnQuZ2V0RWxlbWVudEJ5SWQoJ3VwbG9hZC1hdmF0YXItYnRuJykuYWRkRXZlbnRMaXN0ZW5lcihcImNsaWNrXCIsIGZ1bmN0aW9uICgpIHtcclxuICAgIGRvY3VtZW50LmdldEVsZW1lbnRCeUlkKCd1cGxvYWQtYXZhdGFyLWlucCcpLmNsaWNrKCk7XHJcbn0pO1xyXG5kb2N1bWVudC5nZXRFbGVtZW50QnlJZCgndXBsb2FkLWF2YXRhci1pbnAnKS5vbmNoYW5nZSA9IGZ1bmN0aW9uICgpIHtcclxuICAgIGRvY3VtZW50LmdldEVsZW1lbnRCeUlkKCdhdmF0YXItaW1nJykuc3JjID1cclxuICAgICAgICBVUkwuY3JlYXRlT2JqZWN0VVJMKGRvY3VtZW50LmdldEVsZW1lbnRCeUlkKCd1cGxvYWQtYXZhdGFyLWlucCcpLmZpbGVzWzBdKTtcclxufTtcclxuXHJcbmZ1bmN0aW9uIHNldExldmVsKHhwKSB7XHJcbiAgICBsZXQgbGV2ZWwgPSAoeHAgLyA1MDAwKS50b0ZpeGVkKDApO1xyXG4gICAgbGV0IGV4cCA9ICh4cCAlIDUwMDApIC8gNTAwMDtcclxuICAgIGRvY3VtZW50LmdldEVsZW1lbnRCeUlkKCd1c2VyLWxldmVsJykuaW5uZXJUZXh0ID0gbGV2ZWwudG9TdHJpbmcoKTtcclxuICAgIGRvY3VtZW50LnF1ZXJ5U2VsZWN0b3IoJy5wZXJjZW50YWdlJykuaW5uZXJIVE1MID0gYCR7ZXhwICogMTAwfSVgO1xyXG4gICAgZG9jdW1lbnQucXVlcnlTZWxlY3RvcignLmNvdmVyIC5wcm9ncmVzc2JhcicpLnN0eWxlLndpZHRoID0gYCR7ZXhwICogMTAwfSVgO1xyXG59XHJcblxyXG4vLyBzZXRUaW1lb3V0KCgpID0+IHtcclxuLy8gICAgIHNldExldmVsKDYwMDApO1xyXG4vLyAgICAgc2V0VGltZW91dCgoKSA9PiB7XHJcbi8vICAgICAgICAgc2V0TGV2ZWwoMzAwMCk7XHJcbi8vICAgICB9LCAzMDAwKTtcclxuLy8gfSwgMzAwMCk7Il0sIm1hcHBpbmdzIjoiQUFBQUEsUUFBUSxDQUFDQyxjQUFjLENBQUMsbUJBQW1CLENBQUMsQ0FBQ0MsZ0JBQWdCLENBQUMsT0FBTyxFQUFFLFlBQVk7RUFDL0VGLFFBQVEsQ0FBQ0MsY0FBYyxDQUFDLG1CQUFtQixDQUFDLENBQUNFLEtBQUssQ0FBQyxDQUFDO0FBQ3hELENBQUMsQ0FBQztBQUNGSCxRQUFRLENBQUNDLGNBQWMsQ0FBQyxtQkFBbUIsQ0FBQyxDQUFDRyxRQUFRLEdBQUcsWUFBWTtFQUNoRUosUUFBUSxDQUFDQyxjQUFjLENBQUMsWUFBWSxDQUFDLENBQUNJLEdBQUcsR0FDckNDLEdBQUcsQ0FBQ0MsZUFBZSxDQUFDUCxRQUFRLENBQUNDLGNBQWMsQ0FBQyxtQkFBbUIsQ0FBQyxDQUFDTyxLQUFLLENBQUMsQ0FBQyxDQUFDLENBQUM7QUFDbEYsQ0FBQztBQUVELFNBQVNDLFFBQVFBLENBQUNDLEVBQUUsRUFBRTtFQUNsQixJQUFJQyxLQUFLLEdBQUcsQ0FBQ0QsRUFBRSxHQUFHLElBQUksRUFBRUUsT0FBTyxDQUFDLENBQUMsQ0FBQztFQUNsQyxJQUFJQyxHQUFHLEdBQUlILEVBQUUsR0FBRyxJQUFJLEdBQUksSUFBSTtFQUM1QlYsUUFBUSxDQUFDQyxjQUFjLENBQUMsWUFBWSxDQUFDLENBQUNhLFNBQVMsR0FBR0gsS0FBSyxDQUFDSSxRQUFRLENBQUMsQ0FBQztFQUNsRWYsUUFBUSxDQUFDZ0IsYUFBYSxDQUFDLGFBQWEsQ0FBQyxDQUFDQyxTQUFTLE1BQUFDLE1BQUEsQ0FBTUwsR0FBRyxHQUFHLEdBQUcsTUFBRztFQUNqRWIsUUFBUSxDQUFDZ0IsYUFBYSxDQUFDLHFCQUFxQixDQUFDLENBQUNHLEtBQUssQ0FBQ0MsS0FBSyxNQUFBRixNQUFBLENBQU1MLEdBQUcsR0FBRyxHQUFHLE1BQUc7QUFDL0U7O0FBRUE7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBIiwiZmlsZSI6Ii4vcmVzb3VyY2VzL2pzL3Byb2ZpbGUuanMiLCJzb3VyY2VSb290IjoiIn0=\n//# sourceURL=webpack-internal:///./resources/js/profile.js\n");

/***/ })

/******/ 	});
/************************************************************************/
/******/ 	
/******/ 	// startup
/******/ 	// Load entry module and return exports
/******/ 	// This entry module can't be inlined because the eval-source-map devtool is used.
/******/ 	var __webpack_exports__ = {};
/******/ 	__webpack_modules__["./resources/js/profile.js"]();
/******/ 	
/******/ })()
;