/******/ (function() { // webpackBootstrap
/*!**********************************************************!*\
  !*** ./resources/js/pages/two-step-verification.init.js ***!
  \**********************************************************/
function moveToNext(t, u) {
  0 < t.value.length && $("#digit" + u + "-input").focus();
}
var count = 1;
$(".two-step").keyup(function (t) {
  0 == count && (count = 1), 8 === t.keyCode ? (5 == count && (count = 3), $("#digit" + count + "-input").focus(), count--) : 0 < count && (count++, $("#digit" + count + "-input").focus());
});
/******/ })()
;