/******/ (function() { // webpackBootstrap
/*!**********************************************!*\
  !*** ./resources/js/pages/task-form.init.js ***!
  \**********************************************/
var updateid = "",
  selectedstatus = "",
  taskid = "",
  i = 0;
function makeid(a) {
  for (var t = "", e = "ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789", s = e.length, d = 0; d < a; d++) t += e.charAt(Math.floor(Math.random() * s));
  return t;
}
$(document).ready(function () {
  "use strict";

  $("#NewtaskForm").validate({
    rules: {
      "member[]": {
        required: !0
      }
    },
    errorPlacement: function errorPlacement(a, t) {
      t.is(":checkbox") ? a.insertAfter("#taskassignee") : a.insertAfter(t);
    }
  }), $(".addtask-btn").click(function () {
    var a = $(this).attr("data-id");
    $("#updatetaskdetail").css("display", "none"), $("#addtask").css("display", "block"), $(".update-task-title").css("display", "none"), $(".add-task-title").css("display", "block"), $("#taskname").val(""), $("#taskdesc").val(""), $("#TaskStatus").val(""), $("#taskbudget").val(""), $("#taskassignee input").prop("checked", !1), taskid = a;
  }), $("select#TaskStatus").change(function () {
    selectedstatus = $(this).children("option:selected").val();
  }), $("#addtask").click(function () {
    $("#updatetaskdetail").css("display", "none"), $("#addtask").css("display", "block"), $(".update-task-title").css("display", "none"), $(".add-task-title").css("display", "block");
    var a = makeid(5),
      t = $("#taskname").val(),
      e = new Date(),
      s = e.getDate() + " " + e.toLocaleString("default", {
        month: "short"
      }) + ", " + e.getFullYear(),
      d = $("#taskdesc").val(),
      e = "";
    0 < d.length && (e = "<ul class='ps-3 mb-4 text-muted' id='task-desc'><li class='py-1'>" + d + "</li></ul>");
    var l,
      d = $("#taskbudget").val(),
      n = new Array(),
      o = new Array(),
      r = "";
    for ($("#taskassignee input[type=checkbox]:checked").each(function () {
      o.push($(this).attr("id")), n.push($(this).nextAll("img").attr("src"));
    }), i = 0; i < n.length; i++) r = r + '<div class="avatar-group-item"><a href="#" class="d-inline-block" value="' + o[i] + '"><img src="' + n[i] + '" class="rounded-circle avatar-xs" alt=""></a></div>';
    "Waiting" == selectedstatus ? l = "badge-soft-secondary" : "Approved" == selectedstatus ? l = "badge-soft-primary" : "Complete" == selectedstatus ? l = "badge-soft-success" : "Pending" == selectedstatus && (l = "badge-soft-warning"), 0 == t.length || 0 == d.length || 0 == selectedstatus.length || 0 == n.length ? ($("#NewtaskForm").validate().element("#taskname"), $("#NewtaskForm").validate().element("#taskassignee input:checkbox"), $("#NewtaskForm").validate().element("#TaskStatus"), $("#NewtaskForm").validate().element("#taskbudget")) : ($(taskid).append("<div class='card task-box' id='" + a + "'><div class='card-body'><div class='dropdown float-end'><a href='#' class='dropdown-toggle arrow-none' data-bs-toggle='dropdown' aria-expanded='false'><i class='mdi mdi-dots-vertical m-0 text-muted h5'></i></a><div class='dropdown-menu dropdown-menu-end'><a class='dropdown-item edittask-details' href='#' data-bs-toggle='modal' data-bs-target='.bs-example-modal-lg' data-id='#" + a + "'>Edit</a><a class='dropdown-item deletetask' href='#' data-id='#" + a + "'>Delete</a></div></div><div class='float-end ms-2'><span class='badge rounded-pill font-size-12 " + l + "' id='task-status'>" + selectedstatus + "</span></div><div><h5 class='font-size-15'><a href='javascript: void(0);' class='text-dark' id='task-name'>" + t + "</a></h5><p class='text-muted mb-4' id='task-date'>" + s + "</p></div>" + e + "<div class='avatar-group float-start task-assigne'>" + r + "</div><div class='text-end'><h5 class='font-size-15 mb-1' id='task-budget'>$ " + d + "</h5><p class='mb-0 text-muted'>Budget</p></div></div></div>"), $("#modalForm").modal("toggle"));
  }), $("#modalForm").on("hidden.bs.modal", function (a) {
    var t = $("#NewtaskForm").validate();
    $("#taskname").removeClass("error").next("label.error").remove(), $("#TaskStatus").removeClass("error").next("label.error").remove(), $("#taskbudget").removeClass("error").next("label.error").remove(), t.resetForm();
  }), $("#updatetaskdetail").click(function () {
    var a;
    "Waiting" == selectedstatus ? a = "badge-soft-secondary" : "Approved" == selectedstatus ? a = "badge-soft-primary" : "Complete" == selectedstatus ? a = "badge-soft-success" : "Pending" == selectedstatus && (a = "badge-soft-warning");
    var t = $("#taskname").val(),
      e = new Date(),
      s = e.getDate() + " " + e.toLocaleString("default", {
        month: "short"
      }) + ", " + e.getFullYear(),
      d = $("#taskdesc").val(),
      l = $("#taskbudget").val(),
      n = new Array(),
      o = new Array(),
      r = "";
    for ($("#taskassignee input[type=checkbox]:checked").each(function () {
      o.push($(this).attr("id")), n.push($(this).nextAll("img").attr("src"));
    }), i = 0; i < n.length; i++) r = r + '<div class="avatar-group-item"><a href="#" class="d-inline-block" value="' + o[i] + '"><img src="' + n[i] + '" class="rounded-circle avatar-xs" alt=""></a></div>';
    e = "";
    0 < d.length && (e = "<ul class='ps-3 mb-4 text-muted' id='task-desc'><li class='py-1'>" + d + "</li></ul>"), 0 == t.length || 0 == l.length || 0 == selectedstatus.length || 0 == n.length ? ($("#NewtaskForm").validate().element("#taskname"), $("#NewtaskForm").validate().element("#taskassignee input:checkbox"), $("#NewtaskForm").validate().element("#TaskStatus"), $("#NewtaskForm").validate().element("#taskbudget")) : ($(updateid).html("<div class='card-body'><div class='dropdown float-end'><a href='#' class='dropdown-toggle arrow-none' data-bs-toggle='dropdown' aria-expanded='false'><i class='mdi mdi-dots-vertical m-0 text-muted h5'></i></a><div class='dropdown-menu dropdown-menu-end'><a class='dropdown-item edittask-details' href='#' data-bs-toggle='modal' data-bs-target='.bs-example-modal-lg' data-id='" + updateid + "'>Edit</a><a class='dropdown-item deletetask' href='#' data-id='" + updateid + "'>Delete</a></div></div> <div class='float-end ms-2'><span class='badge rounded-pill font-size-12 " + a + "' id='task-status'>" + selectedstatus + "</span></div><div><h5 class='font-size-15'><a href='javascript: void(0);' class='text-dark' id='task-name'>" + t + "</a></h5><p class='text-muted'>" + s + "</p></div>" + e + "<div class='avatar-group float-start task-assigne'>" + r + "</div><div class='text-end'><h5 class='font-size-15 mb-1' id='task-budget'>$ " + l + "</h5><p class='mb-0 text-muted'>Budget</p></div></div>"), $("#modalForm").modal("hide"));
  }), $(".main-content").on("click", ".edittask-details", function (a) {
    var t = $(this).attr("data-id");
    updateid = t, $("#NewtaskForm").validate().resetForm(), $("#updatetaskdetail").css("display", "block"), $("#addtask").css("display", "none"), $(".update-task-title").css("display", "block"), $(".add-task-title").css("display", "none");
    var e = $(t).find("#task-name").text(),
      s = $(t).find("#task-desc").text(),
      d = parseInt($(t).find("#task-budget").text().replace(/[^0-9.]/g, "")),
      l = $(t).find("#task-status").text();
    $("#taskassignee input").prop("checked", !1), $(t).find(".task-assigne a").each(function () {
      var a = $(this).attr("value");
      $("#" + a).prop("checked", !0);
    }), $("#taskname").val(e), $("#taskdesc").val(s), $("#taskbudget").val(d), $("#TaskStatus").val(l), selectedstatus = l;
  }), $(".main-content").on("click", ".deletetask", function (a) {
    var t = $(this).attr("data-id");
    console.log("Task Deleted Successfully"), $(t).remove();
  });
});
/******/ })()
;