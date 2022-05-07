/******/ (() => { // webpackBootstrap
/******/ 	"use strict";
/******/ 	var __webpack_modules__ = ({

/***/ "./resources/js/app.js":
/*!*****************************!*\
  !*** ./resources/js/app.js ***!
  \*****************************/
/***/ ((__unused_webpack_module, __webpack_exports__, __webpack_require__) => {

__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _background__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! ./background */ "./resources/js/background.js");



(0,_background__WEBPACK_IMPORTED_MODULE_0__["default"])();

/***/ }),

/***/ "./resources/js/background.js":
/*!************************************!*\
  !*** ./resources/js/background.js ***!
  \************************************/
/***/ ((__unused_webpack_module, __webpack_exports__, __webpack_require__) => {

__webpack_require__.r(__webpack_exports__);
/* harmony export */ __webpack_require__.d(__webpack_exports__, {
/* harmony export */   "default": () => (/* binding */ backgroundCanvas)
/* harmony export */ });
function _classCallCheck(instance, Constructor) { if (!(instance instanceof Constructor)) { throw new TypeError("Cannot call a class as a function"); } }

function _defineProperties(target, props) { for (var i = 0; i < props.length; i++) { var descriptor = props[i]; descriptor.enumerable = descriptor.enumerable || false; descriptor.configurable = true; if ("value" in descriptor) descriptor.writable = true; Object.defineProperty(target, descriptor.key, descriptor); } }

function _createClass(Constructor, protoProps, staticProps) { if (protoProps) _defineProperties(Constructor.prototype, protoProps); if (staticProps) _defineProperties(Constructor, staticProps); Object.defineProperty(Constructor, "prototype", { writable: false }); return Constructor; }

function backgroundCanvas() {
  var canvas = document.createElement('canvas');
  document.body.append(canvas);
  canvas.classList.add('backgroundCanvas');

  var resizeCanvas = function resizeCanvas() {
    canvas.width = window.innerWidth;
    canvas.height = window.innerHeight;
    console.log("resize");
  };

  resizeCanvas();
  var imgs = [];

  function genLeaf() {
    var opacity = arguments.length > 0 && arguments[0] !== undefined ? arguments[0] : 0.3;
    var color = arguments.length > 1 && arguments[1] !== undefined ? arguments[1] : "f55593";
    var index = imgs.push(new Image()) - 1;
    imgs[index].src = "data:image/svg+xml,%3Csvg id='leaf' width='45' height='45' style=\"opacity:".concat(opacity, "\" viewBox='0 0 120 120' xmlns='http://www.w3.org/2000/svg'%3E%3Cpath style='opacity:1;fill:%23").concat(color, ";fill-opacity:1;stroke:%23").concat(color, ";stroke-width:.3;stroke-linecap:butt;stroke-linejoin:miter;stroke-miterlimit:4;stroke-dasharray:none;stroke-opacity:1' d='M53.1 58.9s-9.3 13.2.5 14.7c9.7 1.4 8.8-6.3 8.8-6.3s.4-1-3.7-8.1z' transform='translate(-116.8 -116.3) scale(3.15017)'%3E%3C/path%3E%3Cpath style='fill:%23").concat(color, ";fill-opacity:1;stroke:%23").concat(color, ";stroke-width:.3;stroke-linecap:butt;stroke-linejoin:miter;stroke-miterlimit:4;stroke-dasharray:none;stroke-opacity:1' d='M53.5 53.3s-13.3-9.3-14.8.5c-1.4 9.7 6.3 8.8 6.3 8.8s1.1 0 8.1-3.7z' transform='translate(-116.8 -116.3) scale(3.15017)'%3E%3C/path%3E%3Cpath style='fill:%23").concat(color, ";fill-opacity:1;stroke:%23").concat(color, ";stroke-width:.3;stroke-linecap:butt;stroke-linejoin:miter;stroke-miterlimit:4;stroke-dasharray:none;stroke-opacity:1' d='M59 53.6s9.3-13.2-.5-14.7c-9.7-1.4-8.7 6.3-8.7 6.3s-.8 1 3.7 8.1zM58.7 59.2s13.2 9.3 14.7-.5C74.8 49 67 50 67 50s-1-.7-8.1 3.7z' transform='translate(-116.8 -116.3) scale(3.15017)'%3E%3C/path%3E%3Cpath style='opacity:1;fill:%23").concat(color, ";fill-opacity:1;stroke:%23").concat(color, ";stroke-width:.331228;stroke-miterlimit:4;stroke-dasharray:none;stroke-opacity:1' d='M53.2 53h6v6.1h-6z' transform='translate(-116.8 -116.3) scale(3.15017)'%3E%3C/path%3E%3C/svg%3E");
    return index;
  }

  imgs.push(genLeaf());

  var Leaf = /*#__PURE__*/function () {
    function Leaf(ctx, img, env, index) {
      _classCallCheck(this, Leaf);

      this.img = img;
      this.ctx = ctx;
      this.vx = Math.random() * 1.3;
      this.vy = -(Math.random() * 1.3);
      this.isImgIndex = !isNaN(this.img);
      this.size = 100 * (Math.random() + 0.3);
      this.x = -(this.size + 20 + Math.random() * 100);
      this.y = canvas.height + this.size + Math.random() * 20;
      this.env = env;
      this.index = index;
      this.ax = 1;
      this.ay = 1;
      this.angle = 0;
      var maxRotate = 0.8;
      this.vr = Math.random() < 0.5 ? Math.random() * maxRotate : -(Math.random() * maxRotate);
    }

    _createClass(Leaf, [{
      key: "update",
      value: function update() {
        this.vx *= this.ax;
        this.vy *= this.ay;
        this.x += this.vx;
        this.y += this.vy;

        if (this.x > canvas.width || this.y < 0 - this.size - 20) {
          this.env[this.index] = new Leaf(this.ctx, 0, this.env, this.index);
        }

        this.ctx.save();
        this.ctx.translate(this.x + this.size / 2, this.y + this.size / 2);
        this.angle += this.vr * Math.PI / 360;
        this.ctx.rotate(this.angle);
      }
    }, {
      key: "render",
      value: function render() {
        this.update();
        this.ctx.drawImage(this.isImgIndex ? imgs[this.img] : this.img, 0 - this.size / 2, 0 - this.size / 2, this.size, this.size);
        this.ctx.restore();
      }
    }]);

    return Leaf;
  }();

  function main() {
    var ctx = canvas.getContext('2d');
    var leafs = [];

    for (var i = 0; i < 10; i++) {
      leafs.push(new Leaf(ctx, 0, leafs, leafs.length));
    }

    var animate = function animate() {
      ctx.clearRect(0, 0, canvas.width, canvas.height);
      leafs.forEach(function (item) {
        return item.render();
      });
      requestAnimationFrame(animate);
    };

    animate();
  }

  main();
}

/***/ }),

/***/ "./resources/sass/app.scss":
/*!*********************************!*\
  !*** ./resources/sass/app.scss ***!
  \*********************************/
/***/ ((__unused_webpack_module, __webpack_exports__, __webpack_require__) => {

__webpack_require__.r(__webpack_exports__);
// extracted by mini-css-extract-plugin


/***/ }),

/***/ "./resources/css/app.css":
/*!*******************************!*\
  !*** ./resources/css/app.css ***!
  \*******************************/
/***/ ((__unused_webpack_module, __webpack_exports__, __webpack_require__) => {

__webpack_require__.r(__webpack_exports__);
// extracted by mini-css-extract-plugin


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
/******/ 	// expose the modules object (__webpack_modules__)
/******/ 	__webpack_require__.m = __webpack_modules__;
/******/ 	
/************************************************************************/
/******/ 	/* webpack/runtime/chunk loaded */
/******/ 	(() => {
/******/ 		var deferred = [];
/******/ 		__webpack_require__.O = (result, chunkIds, fn, priority) => {
/******/ 			if(chunkIds) {
/******/ 				priority = priority || 0;
/******/ 				for(var i = deferred.length; i > 0 && deferred[i - 1][2] > priority; i--) deferred[i] = deferred[i - 1];
/******/ 				deferred[i] = [chunkIds, fn, priority];
/******/ 				return;
/******/ 			}
/******/ 			var notFulfilled = Infinity;
/******/ 			for (var i = 0; i < deferred.length; i++) {
/******/ 				var [chunkIds, fn, priority] = deferred[i];
/******/ 				var fulfilled = true;
/******/ 				for (var j = 0; j < chunkIds.length; j++) {
/******/ 					if ((priority & 1 === 0 || notFulfilled >= priority) && Object.keys(__webpack_require__.O).every((key) => (__webpack_require__.O[key](chunkIds[j])))) {
/******/ 						chunkIds.splice(j--, 1);
/******/ 					} else {
/******/ 						fulfilled = false;
/******/ 						if(priority < notFulfilled) notFulfilled = priority;
/******/ 					}
/******/ 				}
/******/ 				if(fulfilled) {
/******/ 					deferred.splice(i--, 1)
/******/ 					var r = fn();
/******/ 					if (r !== undefined) result = r;
/******/ 				}
/******/ 			}
/******/ 			return result;
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
/******/ 	/* webpack/runtime/jsonp chunk loading */
/******/ 	(() => {
/******/ 		// no baseURI
/******/ 		
/******/ 		// object to store loaded and loading chunks
/******/ 		// undefined = chunk not loaded, null = chunk preloaded/prefetched
/******/ 		// [resolve, reject, Promise] = chunk loading, 0 = chunk loaded
/******/ 		var installedChunks = {
/******/ 			"/js/app": 0,
/******/ 			"css/app": 0
/******/ 		};
/******/ 		
/******/ 		// no chunk on demand loading
/******/ 		
/******/ 		// no prefetching
/******/ 		
/******/ 		// no preloaded
/******/ 		
/******/ 		// no HMR
/******/ 		
/******/ 		// no HMR manifest
/******/ 		
/******/ 		__webpack_require__.O.j = (chunkId) => (installedChunks[chunkId] === 0);
/******/ 		
/******/ 		// install a JSONP callback for chunk loading
/******/ 		var webpackJsonpCallback = (parentChunkLoadingFunction, data) => {
/******/ 			var [chunkIds, moreModules, runtime] = data;
/******/ 			// add "moreModules" to the modules object,
/******/ 			// then flag all "chunkIds" as loaded and fire callback
/******/ 			var moduleId, chunkId, i = 0;
/******/ 			if(chunkIds.some((id) => (installedChunks[id] !== 0))) {
/******/ 				for(moduleId in moreModules) {
/******/ 					if(__webpack_require__.o(moreModules, moduleId)) {
/******/ 						__webpack_require__.m[moduleId] = moreModules[moduleId];
/******/ 					}
/******/ 				}
/******/ 				if(runtime) var result = runtime(__webpack_require__);
/******/ 			}
/******/ 			if(parentChunkLoadingFunction) parentChunkLoadingFunction(data);
/******/ 			for(;i < chunkIds.length; i++) {
/******/ 				chunkId = chunkIds[i];
/******/ 				if(__webpack_require__.o(installedChunks, chunkId) && installedChunks[chunkId]) {
/******/ 					installedChunks[chunkId][0]();
/******/ 				}
/******/ 				installedChunks[chunkId] = 0;
/******/ 			}
/******/ 			return __webpack_require__.O(result);
/******/ 		}
/******/ 		
/******/ 		var chunkLoadingGlobal = self["webpackChunk"] = self["webpackChunk"] || [];
/******/ 		chunkLoadingGlobal.forEach(webpackJsonpCallback.bind(null, 0));
/******/ 		chunkLoadingGlobal.push = webpackJsonpCallback.bind(null, chunkLoadingGlobal.push.bind(chunkLoadingGlobal));
/******/ 	})();
/******/ 	
/************************************************************************/
/******/ 	
/******/ 	// startup
/******/ 	// Load entry module and return exports
/******/ 	// This entry module depends on other loaded chunks and execution need to be delayed
/******/ 	__webpack_require__.O(undefined, ["css/app"], () => (__webpack_require__("./resources/js/app.js")))
/******/ 	__webpack_require__.O(undefined, ["css/app"], () => (__webpack_require__("./resources/sass/app.scss")))
/******/ 	var __webpack_exports__ = __webpack_require__.O(undefined, ["css/app"], () => (__webpack_require__("./resources/css/app.css")))
/******/ 	__webpack_exports__ = __webpack_require__.O(__webpack_exports__);
/******/ 	
/******/ })()
;