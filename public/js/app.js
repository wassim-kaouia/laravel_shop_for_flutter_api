/******/ (function(modules) { // webpackBootstrap
/******/ 	// The module cache
/******/ 	var installedModules = {};
/******/
/******/ 	// The require function
/******/ 	function __webpack_require__(moduleId) {
/******/
/******/ 		// Check if module is in cache
/******/ 		if(installedModules[moduleId]) {
/******/ 			return installedModules[moduleId].exports;
/******/ 		}
/******/ 		// Create a new module (and put it into the cache)
/******/ 		var module = installedModules[moduleId] = {
/******/ 			i: moduleId,
/******/ 			l: false,
/******/ 			exports: {}
/******/ 		};
/******/
/******/ 		// Execute the module function
/******/ 		modules[moduleId].call(module.exports, module, module.exports, __webpack_require__);
/******/
/******/ 		// Flag the module as loaded
/******/ 		module.l = true;
/******/
/******/ 		// Return the exports of the module
/******/ 		return module.exports;
/******/ 	}
/******/
/******/
/******/ 	// expose the modules object (__webpack_modules__)
/******/ 	__webpack_require__.m = modules;
/******/
/******/ 	// expose the module cache
/******/ 	__webpack_require__.c = installedModules;
/******/
/******/ 	// define getter function for harmony exports
/******/ 	__webpack_require__.d = function(exports, name, getter) {
/******/ 		if(!__webpack_require__.o(exports, name)) {
/******/ 			Object.defineProperty(exports, name, { enumerable: true, get: getter });
/******/ 		}
/******/ 	};
/******/
/******/ 	// define __esModule on exports
/******/ 	__webpack_require__.r = function(exports) {
/******/ 		if(typeof Symbol !== 'undefined' && Symbol.toStringTag) {
/******/ 			Object.defineProperty(exports, Symbol.toStringTag, { value: 'Module' });
/******/ 		}
/******/ 		Object.defineProperty(exports, '__esModule', { value: true });
/******/ 	};
/******/
/******/ 	// create a fake namespace object
/******/ 	// mode & 1: value is a module id, require it
/******/ 	// mode & 2: merge all properties of value into the ns
/******/ 	// mode & 4: return value when already ns object
/******/ 	// mode & 8|1: behave like require
/******/ 	__webpack_require__.t = function(value, mode) {
/******/ 		if(mode & 1) value = __webpack_require__(value);
/******/ 		if(mode & 8) return value;
/******/ 		if((mode & 4) && typeof value === 'object' && value && value.__esModule) return value;
/******/ 		var ns = Object.create(null);
/******/ 		__webpack_require__.r(ns);
/******/ 		Object.defineProperty(ns, 'default', { enumerable: true, value: value });
/******/ 		if(mode & 2 && typeof value != 'string') for(var key in value) __webpack_require__.d(ns, key, function(key) { return value[key]; }.bind(null, key));
/******/ 		return ns;
/******/ 	};
/******/
/******/ 	// getDefaultExport function for compatibility with non-harmony modules
/******/ 	__webpack_require__.n = function(module) {
/******/ 		var getter = module && module.__esModule ?
/******/ 			function getDefault() { return module['default']; } :
/******/ 			function getModuleExports() { return module; };
/******/ 		__webpack_require__.d(getter, 'a', getter);
/******/ 		return getter;
/******/ 	};
/******/
/******/ 	// Object.prototype.hasOwnProperty.call
/******/ 	__webpack_require__.o = function(object, property) { return Object.prototype.hasOwnProperty.call(object, property); };
/******/
/******/ 	// __webpack_public_path__
/******/ 	__webpack_require__.p = "/";
/******/
/******/
/******/ 	// Load entry module and return exports
/******/ 	return __webpack_require__(__webpack_require__.s = 0);
/******/ })
/************************************************************************/
/******/ ({

/***/ "./resources/js/app.js":
/*!*****************************!*\
  !*** ./resources/js/app.js ***!
  \*****************************/
/*! no static exports found */
/***/ (function(module, exports) {

/*
Template Name: Skote - Responsive Bootstrap 4 Admin Dashboard
Author: Themesbrand
Version: 1.1.0
Website: https://themesbrand.com/
Contact: themesbrand@gmail.com
File: Main Js File
*/
(function ($) {
  'use strict';

  function initMetisMenu() {
    //metis menu
    $("#side-menu").metisMenu();
  }

  function initLeftMenuCollapse() {
    $('#vertical-menu-btn').on('click', function (event) {
      event.preventDefault();
      $('body').toggleClass('sidebar-enable');

      if ($(window).width() >= 992) {
        $('body').toggleClass('vertical-collpsed');
      } else {
        $('body').removeClass('vertical-collpsed');
      }
    });
  }

  function initActiveMenu() {
    // === following js will activate the menu in left side bar based on url ====
    $("#sidebar-menu a").each(function () {
      var pageUrl = window.location.href.split(/[?#]/)[0];

      if (this.href == pageUrl) {
        $(this).addClass("active");
        $(this).parent().addClass("mm-active"); // add active to li of the current link

        $(this).parent().parent().addClass("mm-show");
        $(this).parent().parent().prev().addClass("mm-active"); // add active class to an anchor

        $(this).parent().parent().parent().addClass("mm-active");
        $(this).parent().parent().parent().parent().addClass("mm-show"); // add active to li of the current link

        $(this).parent().parent().parent().parent().parent().addClass("mm-active");
      }
    });
  }

  function initMenuItem() {
    $(".navbar-nav a").each(function () {
      var pageUrl = window.location.href.split(/[?#]/)[0];

      if (this.href == pageUrl) {
        $(this).addClass("active");
        $(this).parent().addClass("active");
        $(this).parent().parent().addClass("active");
        $(this).parent().parent().parent().addClass("active");
        $(this).parent().parent().parent().parent().addClass("active");
        $(this).parent().parent().parent().parent().parent().addClass("active");
      }
    });
  }

  function initFullScreen() {
    $('[data-toggle="fullscreen"]').on("click", function (e) {
      e.preventDefault();
      $('body').toggleClass('fullscreen-enable');

      if (!document.fullscreenElement &&
      /* alternative standard method */
      !document.mozFullScreenElement && !document.webkitFullscreenElement) {
        // current working methods
        if (document.documentElement.requestFullscreen) {
          document.documentElement.requestFullscreen();
        } else if (document.documentElement.mozRequestFullScreen) {
          document.documentElement.mozRequestFullScreen();
        } else if (document.documentElement.webkitRequestFullscreen) {
          document.documentElement.webkitRequestFullscreen(Element.ALLOW_KEYBOARD_INPUT);
        }
      } else {
        if (document.cancelFullScreen) {
          document.cancelFullScreen();
        } else if (document.mozCancelFullScreen) {
          document.mozCancelFullScreen();
        } else if (document.webkitCancelFullScreen) {
          document.webkitCancelFullScreen();
        }
      }
    });
    document.addEventListener('fullscreenchange', exitHandler);
    document.addEventListener("webkitfullscreenchange", exitHandler);
    document.addEventListener("mozfullscreenchange", exitHandler);

    function exitHandler() {
      if (!document.webkitIsFullScreen && !document.mozFullScreen && !document.msFullscreenElement) {
        console.log('pressed');
        $('body').removeClass('fullscreen-enable');
      }
    }
  }

  function initRightSidebar() {
    // right side-bar toggle
    $('.right-bar-toggle').on('click', function (e) {
      $('body').toggleClass('right-bar-enabled');
    });
    $(document).on('click', 'body', function (e) {
      if ($(e.target).closest('.right-bar-toggle, .right-bar').length > 0) {
        return;
      }

      $('body').removeClass('right-bar-enabled');
      return;
    });
  }

  function initDropdownMenu() {
    $('.dropdown-menu a.dropdown-toggle').on('click', function (e) {
      if (!$(this).next().hasClass('show')) {
        $(this).parents('.dropdown-menu').first().find('.show').removeClass("show");
      }

      var $subMenu = $(this).next(".dropdown-menu");
      $subMenu.toggleClass('show');
      return false;
    });
  }

  function initComponents() {
    $(function () {
      $('[data-toggle="tooltip"]').tooltip();
    });
    $(function () {
      $('[data-toggle="popover"]').popover();
    });
  }

  function initPreloader() {
    $(window).on('load', function () {
      $('#status').fadeOut();
      $('#preloader').delay(350).fadeOut('slow');
    });
  }

  function initSettings() {
    if (window.sessionStorage) {
      var alreadyVisited = sessionStorage.getItem("is_visited");

      if (!alreadyVisited) {
        sessionStorage.setItem("is_visited", "light-mode-switch");
        updateThemeSetting(false, true, true);
      } else {
        $(".right-bar input:checkbox").prop('checked', false);
        $("#" + alreadyVisited).prop('checked', true);
        $("#" + alreadyVisited).trigger("change");

        if (alreadyVisited === "light-mode-switch") {
          updateThemeSetting(false, true, true);
        } else if (alreadyVisited === "dark-mode-switch") {
          updateThemeSetting(true, false, true);
        } else if (alreadyVisited === "rtl-mode-switch") {
          updateThemeSetting(false, true, false);
        }
      }
    }

    $("#light-mode-switch, #dark-mode-switch, #rtl-mode-switch").on("change", function (e) {
      if (e.target.id === "light-mode-switch" && $(this).prop("checked")) {
        $("#dark-mode-switch").prop("checked", false);
        $("#rtl-mode-switch").prop("checked", false);
        updateThemeSetting(false, true, true);
        sessionStorage.setItem("is_visited", e.target.id);
      } else if (e.target.id === "dark-mode-switch" && $(this).prop("checked")) {
        $("#light-mode-switch").prop("checked", false);
        $("#rtl-mode-switch").prop("checked", false);
        updateThemeSetting(true, false, true);
        sessionStorage.setItem("is_visited", e.target.id);
      } else if (e.target.id === "rtl-mode-switch" && $(this).prop("checked")) {
        $("#dark-mode-switch").prop("checked", false);
        $("#light-mode-switch").prop("checked", false);
        updateThemeSetting(false, true, false);
        sessionStorage.setItem("is_visited", e.target.id);
      }
    });
  }

  function updateThemeSetting(light, dark, rtl) {
    $("#bootstrap-light").prop("disabled", light);
    $("#bootstrap-dark").prop("disabled", dark);
    $("#app-light").prop("disabled", rtl ? light : true);
    $("#app-dark").prop("disabled", dark);
    $("#app-rtl").prop("disabled", rtl);
  }

  function init() {
    initMetisMenu();
    initLeftMenuCollapse();
    initActiveMenu();
    initMenuItem();
    initFullScreen();
    initRightSidebar();
    initDropdownMenu();
    initComponents();
    initSettings();
    initPreloader();
    Waves.init();
  }

  init();
})(jQuery);

/***/ }),

/***/ 0:
/*!*************************************************************!*\
  !*** multi ./resources/js/app.js ./resources/sass/app.scss ***!
  \*************************************************************/
/*! no static exports found */
/***/ (function(module, exports, __webpack_require__) {

__webpack_require__(/*! /Users/mac/Documents/sites/flutter1/resources/js/app.js */"./resources/js/app.js");
!(function webpackMissingModule() { var e = new Error("Cannot find module '/Users/mac/Documents/sites/flutter1/resources/sass/app.scss'"); e.code = 'MODULE_NOT_FOUND'; throw e; }());


/***/ })

/******/ });