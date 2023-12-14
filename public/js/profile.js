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

eval("document.getElementById('upload-avatar-btn').addEventListener(\"click\", function () {\n  document.getElementById('upload-avatar-inp').click();\n});\ndocument.getElementById('upload-avatar-inp').onchange = function () {\n  document.getElementById('avatar-img').src = URL.createObjectURL(document.getElementById('upload-avatar-inp').files[0]);\n};\nfunction setLevel(xp) {\n  var level = (xp / 5000).toFixed(0);\n  var exp = xp % 5000 / 5000;\n  document.getElementById('user-level').innerText = level.toString();\n  document.querySelector('.percentage').innerHTML = \"\".concat(exp * 100, \"%\");\n  document.querySelector('.cover .progressbar').style.width = \"\".concat(exp * 100, \"%\");\n}\n\n// setTimeout(() => {\n//     setLevel(6000);\n//     setTimeout(() => {\n//         setLevel(3000);\n//     }, 3000);\n// }, 3000);//# sourceURL=[module]\n//# sourceMappingURL=data:application/json;charset=utf-8;base64,eyJ2ZXJzaW9uIjozLCJuYW1lcyI6WyJkb2N1bWVudCIsImdldEVsZW1lbnRCeUlkIiwiYWRkRXZlbnRMaXN0ZW5lciIsImNsaWNrIiwib25jaGFuZ2UiLCJzcmMiLCJVUkwiLCJjcmVhdGVPYmplY3RVUkwiLCJmaWxlcyIsInNldExldmVsIiwieHAiLCJsZXZlbCIsInRvRml4ZWQiLCJleHAiLCJpbm5lclRleHQiLCJ0b1N0cmluZyIsInF1ZXJ5U2VsZWN0b3IiLCJpbm5lckhUTUwiLCJjb25jYXQiLCJzdHlsZSIsIndpZHRoIl0sInNvdXJjZXMiOlsid2VicGFjazovLy8uL3Jlc291cmNlcy9qcy9wcm9maWxlLmpzPzllMWEiXSwic291cmNlc0NvbnRlbnQiOlsiZG9jdW1lbnQuZ2V0RWxlbWVudEJ5SWQoJ3VwbG9hZC1hdmF0YXItYnRuJykuYWRkRXZlbnRMaXN0ZW5lcihcImNsaWNrXCIsIGZ1bmN0aW9uICgpIHtcbiAgICBkb2N1bWVudC5nZXRFbGVtZW50QnlJZCgndXBsb2FkLWF2YXRhci1pbnAnKS5jbGljaygpO1xufSk7XG5kb2N1bWVudC5nZXRFbGVtZW50QnlJZCgndXBsb2FkLWF2YXRhci1pbnAnKS5vbmNoYW5nZSA9IGZ1bmN0aW9uICgpIHtcbiAgICBkb2N1bWVudC5nZXRFbGVtZW50QnlJZCgnYXZhdGFyLWltZycpLnNyYyA9XG4gICAgICAgIFVSTC5jcmVhdGVPYmplY3RVUkwoZG9jdW1lbnQuZ2V0RWxlbWVudEJ5SWQoJ3VwbG9hZC1hdmF0YXItaW5wJykuZmlsZXNbMF0pO1xufTtcblxuZnVuY3Rpb24gc2V0TGV2ZWwoeHApIHtcbiAgICBsZXQgbGV2ZWwgPSAoeHAgLyA1MDAwKS50b0ZpeGVkKDApO1xuICAgIGxldCBleHAgPSAoeHAgJSA1MDAwKSAvIDUwMDA7XG4gICAgZG9jdW1lbnQuZ2V0RWxlbWVudEJ5SWQoJ3VzZXItbGV2ZWwnKS5pbm5lclRleHQgPSBsZXZlbC50b1N0cmluZygpO1xuICAgIGRvY3VtZW50LnF1ZXJ5U2VsZWN0b3IoJy5wZXJjZW50YWdlJykuaW5uZXJIVE1MID0gYCR7ZXhwICogMTAwfSVgO1xuICAgIGRvY3VtZW50LnF1ZXJ5U2VsZWN0b3IoJy5jb3ZlciAucHJvZ3Jlc3NiYXInKS5zdHlsZS53aWR0aCA9IGAke2V4cCAqIDEwMH0lYDtcbn1cblxuLy8gc2V0VGltZW91dCgoKSA9PiB7XG4vLyAgICAgc2V0TGV2ZWwoNjAwMCk7XG4vLyAgICAgc2V0VGltZW91dCgoKSA9PiB7XG4vLyAgICAgICAgIHNldExldmVsKDMwMDApO1xuLy8gICAgIH0sIDMwMDApO1xuLy8gfSwgMzAwMCk7XG4iXSwibWFwcGluZ3MiOiJBQUFBQSxRQUFRLENBQUNDLGNBQWMsQ0FBQyxtQkFBbUIsQ0FBQyxDQUFDQyxnQkFBZ0IsQ0FBQyxPQUFPLEVBQUUsWUFBWTtFQUMvRUYsUUFBUSxDQUFDQyxjQUFjLENBQUMsbUJBQW1CLENBQUMsQ0FBQ0UsS0FBSyxDQUFDLENBQUM7QUFDeEQsQ0FBQyxDQUFDO0FBQ0ZILFFBQVEsQ0FBQ0MsY0FBYyxDQUFDLG1CQUFtQixDQUFDLENBQUNHLFFBQVEsR0FBRyxZQUFZO0VBQ2hFSixRQUFRLENBQUNDLGNBQWMsQ0FBQyxZQUFZLENBQUMsQ0FBQ0ksR0FBRyxHQUNyQ0MsR0FBRyxDQUFDQyxlQUFlLENBQUNQLFFBQVEsQ0FBQ0MsY0FBYyxDQUFDLG1CQUFtQixDQUFDLENBQUNPLEtBQUssQ0FBQyxDQUFDLENBQUMsQ0FBQztBQUNsRixDQUFDO0FBRUQsU0FBU0MsUUFBUUEsQ0FBQ0MsRUFBRSxFQUFFO0VBQ2xCLElBQUlDLEtBQUssR0FBRyxDQUFDRCxFQUFFLEdBQUcsSUFBSSxFQUFFRSxPQUFPLENBQUMsQ0FBQyxDQUFDO0VBQ2xDLElBQUlDLEdBQUcsR0FBSUgsRUFBRSxHQUFHLElBQUksR0FBSSxJQUFJO0VBQzVCVixRQUFRLENBQUNDLGNBQWMsQ0FBQyxZQUFZLENBQUMsQ0FBQ2EsU0FBUyxHQUFHSCxLQUFLLENBQUNJLFFBQVEsQ0FBQyxDQUFDO0VBQ2xFZixRQUFRLENBQUNnQixhQUFhLENBQUMsYUFBYSxDQUFDLENBQUNDLFNBQVMsTUFBQUMsTUFBQSxDQUFNTCxHQUFHLEdBQUcsR0FBRyxNQUFHO0VBQ2pFYixRQUFRLENBQUNnQixhQUFhLENBQUMscUJBQXFCLENBQUMsQ0FBQ0csS0FBSyxDQUFDQyxLQUFLLE1BQUFGLE1BQUEsQ0FBTUwsR0FBRyxHQUFHLEdBQUcsTUFBRztBQUMvRTs7QUFFQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0EiLCJmaWxlIjoiLi9yZXNvdXJjZXMvanMvcHJvZmlsZS5qcyIsInNvdXJjZVJvb3QiOiIifQ==\n//# sourceURL=webpack-internal:///./resources/js/profile.js\n");

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