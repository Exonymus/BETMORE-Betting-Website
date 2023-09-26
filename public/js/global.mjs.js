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

/***/ "./resources/js/global.mjs":
/*!*********************************!*\
  !*** ./resources/js/global.mjs ***!
  \*********************************/
/***/ ((__unused_webpack___webpack_module__, __webpack_exports__, __webpack_require__) => {

eval("__webpack_require__.r(__webpack_exports__);\nvar navLinks = document.querySelectorAll('.nav__link');\nnavLinks.forEach(function (link) {\n  // Get the nav button reference\n  var linkButton = link.querySelector('.link');\n\n  // Get the destination which user is being redirected to\n  var destination = linkButton.textContent.toLowerCase();\n  if (linkButton || destination !== \"home\") {\n    linkButton.addEventListener('click', function () {\n      window.location.href = \"index.html?action=\".concat(destination);\n    });\n  }\n});\nvar searchForm = document.querySelector('.navbar__search__content');\nsearchForm.addEventListener('submit', function (event) {\n  event.preventDefault();\n\n  // Get the search query from the input field\n  var searchQuery = document.getElementById('searchInput').value;\n\n  // Encode the search query\n  var encodedSearchQuery = encodeURIComponent(searchQuery);\n\n  // Redirect to the index.html page with the search query as a parameter\n  window.location.href = \"index.html?search=\".concat(encodedSearchQuery);\n});//# sourceURL=[module]\n//# sourceMappingURL=data:application/json;charset=utf-8;base64,eyJ2ZXJzaW9uIjozLCJmaWxlIjoiLi9yZXNvdXJjZXMvanMvZ2xvYmFsLm1qcyIsIm1hcHBpbmdzIjoiO0FBQUEsSUFBTUEsUUFBUSxHQUFHQyxRQUFRLENBQUNDLGdCQUFnQixDQUFDLFlBQVksQ0FBQztBQUN4REYsUUFBUSxDQUFDRyxPQUFPLENBQUMsVUFBQUMsSUFBSSxFQUFJO0VBQ3JCO0VBQ0EsSUFBTUMsVUFBVSxHQUFHRCxJQUFJLENBQUNFLGFBQWEsQ0FBQyxPQUFPLENBQUM7O0VBRTlDO0VBQ0EsSUFBTUMsV0FBVyxHQUFHRixVQUFVLENBQUNHLFdBQVcsQ0FBQ0MsV0FBVyxDQUFDLENBQUM7RUFFeEQsSUFBSUosVUFBVSxJQUFJRSxXQUFXLEtBQUssTUFBTSxFQUFFO0lBQ3RDRixVQUFVLENBQUNLLGdCQUFnQixDQUFDLE9BQU8sRUFBRSxZQUFNO01BQ3ZDQyxNQUFNLENBQUNDLFFBQVEsQ0FBQ0MsSUFBSSx3QkFBQUMsTUFBQSxDQUF3QlAsV0FBVyxDQUFFO0lBQzdELENBQUMsQ0FBQztFQUNOO0FBQ0osQ0FBQyxDQUFDO0FBRUYsSUFBTVEsVUFBVSxHQUFHZCxRQUFRLENBQUNLLGFBQWEsQ0FBQywwQkFBMEIsQ0FBQztBQUNyRVMsVUFBVSxDQUFDTCxnQkFBZ0IsQ0FBQyxRQUFRLEVBQUUsVUFBQ00sS0FBSyxFQUFLO0VBQzdDQSxLQUFLLENBQUNDLGNBQWMsQ0FBQyxDQUFDOztFQUV0QjtFQUNBLElBQU1DLFdBQVcsR0FBR2pCLFFBQVEsQ0FBQ2tCLGNBQWMsQ0FBQyxhQUFhLENBQUMsQ0FBQ0MsS0FBSzs7RUFFaEU7RUFDQSxJQUFNQyxrQkFBa0IsR0FBR0Msa0JBQWtCLENBQUNKLFdBQVcsQ0FBQzs7RUFFMUQ7RUFDQVAsTUFBTSxDQUFDQyxRQUFRLENBQUNDLElBQUksd0JBQUFDLE1BQUEsQ0FBd0JPLGtCQUFrQixDQUFFO0FBQ3BFLENBQUMsQ0FBQyIsInNvdXJjZXMiOlsid2VicGFjazovLy8uL3Jlc291cmNlcy9qcy9nbG9iYWwubWpzP2ExOWMiXSwic291cmNlc0NvbnRlbnQiOlsiY29uc3QgbmF2TGlua3MgPSBkb2N1bWVudC5xdWVyeVNlbGVjdG9yQWxsKCcubmF2X19saW5rJyk7XG5uYXZMaW5rcy5mb3JFYWNoKGxpbmsgPT4ge1xuICAgIC8vIEdldCB0aGUgbmF2IGJ1dHRvbiByZWZlcmVuY2VcbiAgICBjb25zdCBsaW5rQnV0dG9uID0gbGluay5xdWVyeVNlbGVjdG9yKCcubGluaycpO1xuXG4gICAgLy8gR2V0IHRoZSBkZXN0aW5hdGlvbiB3aGljaCB1c2VyIGlzIGJlaW5nIHJlZGlyZWN0ZWQgdG9cbiAgICBjb25zdCBkZXN0aW5hdGlvbiA9IGxpbmtCdXR0b24udGV4dENvbnRlbnQudG9Mb3dlckNhc2UoKTtcblxuICAgIGlmIChsaW5rQnV0dG9uIHx8IGRlc3RpbmF0aW9uICE9PSBcImhvbWVcIikge1xuICAgICAgICBsaW5rQnV0dG9uLmFkZEV2ZW50TGlzdGVuZXIoJ2NsaWNrJywgKCkgPT4ge1xuICAgICAgICAgICAgd2luZG93LmxvY2F0aW9uLmhyZWYgPSBgaW5kZXguaHRtbD9hY3Rpb249JHtkZXN0aW5hdGlvbn1gO1xuICAgICAgICB9KTtcbiAgICB9XG59KTtcblxuY29uc3Qgc2VhcmNoRm9ybSA9IGRvY3VtZW50LnF1ZXJ5U2VsZWN0b3IoJy5uYXZiYXJfX3NlYXJjaF9fY29udGVudCcpO1xuc2VhcmNoRm9ybS5hZGRFdmVudExpc3RlbmVyKCdzdWJtaXQnLCAoZXZlbnQpID0+IHtcbiAgICBldmVudC5wcmV2ZW50RGVmYXVsdCgpO1xuXG4gICAgLy8gR2V0IHRoZSBzZWFyY2ggcXVlcnkgZnJvbSB0aGUgaW5wdXQgZmllbGRcbiAgICBjb25zdCBzZWFyY2hRdWVyeSA9IGRvY3VtZW50LmdldEVsZW1lbnRCeUlkKCdzZWFyY2hJbnB1dCcpLnZhbHVlO1xuXG4gICAgLy8gRW5jb2RlIHRoZSBzZWFyY2ggcXVlcnlcbiAgICBjb25zdCBlbmNvZGVkU2VhcmNoUXVlcnkgPSBlbmNvZGVVUklDb21wb25lbnQoc2VhcmNoUXVlcnkpO1xuXG4gICAgLy8gUmVkaXJlY3QgdG8gdGhlIGluZGV4Lmh0bWwgcGFnZSB3aXRoIHRoZSBzZWFyY2ggcXVlcnkgYXMgYSBwYXJhbWV0ZXJcbiAgICB3aW5kb3cubG9jYXRpb24uaHJlZiA9IGBpbmRleC5odG1sP3NlYXJjaD0ke2VuY29kZWRTZWFyY2hRdWVyeX1gO1xufSk7Il0sIm5hbWVzIjpbIm5hdkxpbmtzIiwiZG9jdW1lbnQiLCJxdWVyeVNlbGVjdG9yQWxsIiwiZm9yRWFjaCIsImxpbmsiLCJsaW5rQnV0dG9uIiwicXVlcnlTZWxlY3RvciIsImRlc3RpbmF0aW9uIiwidGV4dENvbnRlbnQiLCJ0b0xvd2VyQ2FzZSIsImFkZEV2ZW50TGlzdGVuZXIiLCJ3aW5kb3ciLCJsb2NhdGlvbiIsImhyZWYiLCJjb25jYXQiLCJzZWFyY2hGb3JtIiwiZXZlbnQiLCJwcmV2ZW50RGVmYXVsdCIsInNlYXJjaFF1ZXJ5IiwiZ2V0RWxlbWVudEJ5SWQiLCJ2YWx1ZSIsImVuY29kZWRTZWFyY2hRdWVyeSIsImVuY29kZVVSSUNvbXBvbmVudCJdLCJzb3VyY2VSb290IjoiIn0=\n//# sourceURL=webpack-internal:///./resources/js/global.mjs\n");

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
/******/ 	__webpack_modules__["./resources/js/global.mjs"](0, __webpack_exports__, __webpack_require__);
/******/ 	
/******/ })()
;