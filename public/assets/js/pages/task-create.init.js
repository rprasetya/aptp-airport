/******/ (function() { // webpackBootstrap
/*!************************************************!*\
  !*** ./resources/js/pages/task-create.init.js ***!
  \************************************************/
$(document).ready(function () {
  "use strict";

  0 < $("#taskdesc-editor").length && tinymce.init({
    selector: "textarea#taskdesc-editor",
    height: 200,
    plugins: ["advlist autolink link image lists charmap print preview hr anchor pagebreak spellchecker", "searchreplace wordcount visualblocks visualchars code fullscreen insertdatetime media nonbreaking", "save table contextmenu directionality emoticons template paste textcolor"],
    toolbar: "insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | l      ink image | print preview media fullpage | forecolor backcolor emoticons",
    style_formats: [{
      title: "Bold text",
      inline: "b"
    }, {
      title: "Red text",
      inline: "span",
      styles: {
        color: "#ff0000"
      }
    }, {
      title: "Red header",
      block: "h1",
      styles: {
        color: "#ff0000"
      }
    }, {
      title: "Example 1",
      inline: "span",
      classes: "example1"
    }, {
      title: "Example 2",
      inline: "span",
      classes: "example2"
    }, {
      title: "Table styles"
    }, {
      title: "Table row 1",
      selector: "tr",
      classes: "tablerow1"
    }]
  }), window.outerRepeater = $(".outer-repeater").repeater({
    defaultValues: {
      "text-input": "outer-default"
    },
    show: function show() {
      console.log("outer show"), $(this).slideDown();
    },
    hide: function hide(e) {
      console.log("outer delete"), $(this).slideUp(e);
    },
    repeaters: [{
      selector: ".inner-repeater",
      defaultValues: {
        "inner-text-input": "inner-default"
      },
      show: function show() {
        console.log("inner show"), $(this).slideDown();
      },
      hide: function hide(e) {
        console.log("inner delete"), $(this).slideUp(e);
      }
    }]
  });
});
/******/ })()
;