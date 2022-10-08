// $(document).ready(function () {
//   // alert("test");

//   $("#leftNavigation li ul li a").on("click", function () {
//     $(this).parent().addClass("active");


//     // $('#leftNavigation li ul li a')
//   });
// });

// panel up/down icon

$("#collapseExample").on("shown.bs.collapse", function () {
  $(".servicedrop")
    .addClass("glyphicon-chevron-up")
    .removeClass("glyphicon-chevron-down");
});

$("#collapseExample").on("hidden.bs.collapse", function () {
  $(".servicedrop")
    .addClass("glyphicon-chevron-down")
    .removeClass("glyphicon-chevron-up");
});

// Search select option

$(document).ready(function () {
  $(".nm-src-status").select2();
});

$(".nm-src-count").select2({
  placeholder: "=",
});

// Data popover

$(function () {
  $('[data-toggle="popover"]').popover();
});

// Multi select

$(document).ready(function () {
  $("#nm-advier-activity").multiselect({
    buttonText: function (options, select) {
      return "";
    },
    buttonTitle: function (options, select) {
      var labels = [];
      options.each(function () {
        labels.push($(this).text());
      });
      return labels.join(" - ");
    },
    buttonContainer:
      '<div class="btn-group nm_multi_select" id="example-selectedClass-container"></div>',
    selectedClass: "popopo",
  });
});

$(document).ready(function () {
  $("#teams").multiselect({
    templates: {
      li: '<li><div class="checkbox"><label></label></div></li>',
    },
  });
  $(".multiselect-container div.checkbox").each(function (index) {
    var id = "multiselect-" + index,
      $input = $(this).find("input");

    // Associate the label and the input
    $(this).find("label").attr("for", id);
    $input.attr("id", id);

    // Remove the input from the label wrapper
    $input.detach();

    // Place the input back in before the label
    $input.prependTo($(this));

    $(this).click(function (e) {
      // Prevents the click from bubbling up and hiding the dropdown
      e.stopPropagation();
    });
  });
});

// Tooltip development

$("[rel=popover]").popover({
  html: true,
  placement: "left",
  content: function () {
    return $($(this).data("contentwrapper")).html();
  },
});

function myFunction() {
  $("[rel=popover]").popover("hide");
}

// Table fixed

// (function($) {

// $.fn.prepFixedHeader = function () {
// return this.each( function() {
// $(this).wrap('<div class="row fixed-table"><div class="table-content"></div></div>');
// });
// };

// $.fn.fixedHeader = function () {
// return this.each( function() {
// var o = $(this),
// nhead = o.closest('.fixed-table'),
// $head = $('thead.header', o);

// $(document.createElement('table'))
// .addClass(o.attr('class')+' table-copy').removeClass('table-fixed-header')
// .appendTo(nhead)
// .html($head.clone().removeClass('header').addClass('header-copy header-fixed'));
// var ww = [];
// o.find('thead.header > tr:first > th').each(function (i, h){
// ww.push($(h).width());
// });
// $.each(ww, function (i, w){
// nhead.find('thead.header > tr > th:eq('+i+'), thead.header-copy > tr > th:eq('+i+')').css({width: w});
// });

// nhead.find('thead.header-copy').css({ margin:'0 auto',
// width: o.width()});
// });
// };

// })(jQuery);

// Nav -Side
$(function () {
  var verticalNavigation = new SSDSystem.VerticalNavigation();
  verticalNavigation.init();
});

// Editor
tinymce.init({
  selector: "textarea",
  plugins:
    "style,layer,table,save,advhr,advimage,advlink,emotions,iespell,insertdatetime,preview,media," +
    "searchreplace,print,contextmenu,paste,directionality,fullscreen,noneditable,visualchars,nonbreaking,xhtmlxtras",
  themes: "simple,advanced",
  languages: "en",
  disk_cache: true,
  debug: false,
  menubar: "edit",
  toolbar: "paste",
  paste_as_text: true,
  toolbar:
    "insertfile undo redo | styleselect | bold italic | alignleft  aligncenter alignright alignjustify | bullist numlist outdent indent | link image",
});

// Search Table
function tableSearch() {
  var input, filter, table, tr, td, i, txtValue;
  input = document.getElementById("nmSearchInput");
  filter = input.value.toUpperCase();
  table = document.getElementById("myTable");
  tr = table.getElementsByTagName("tr");
  for (i = 0; i < tr.length; i++) {
    td = tr[i].getElementsByTagName("td")[0];
    if (td) {
      txtValue = td.textContent || td.innerText;
      if (txtValue.toUpperCase().indexOf(filter) > -1) {
        tr[i].style.display = "";
      } else {
        tr[i].style.display = "none";
      }
    }
  }
}

var defaults = {
  calendarWeeks: true,
  showClear: true,
  showClose: true,
  allowInputToggle: true,
  useCurrent: false,
  ignoreReadonly: true,
  minDate: new Date(),
  toolbarPlacement: "top",
  locale: "nl",
  icons: {
    time: "fa fa-clock-o",
    date: "fa fa-calendar",
    up: "fa fa-angle-up",
    down: "fa fa-angle-down",
    previous: "fa fa-angle-left",
    next: "fa fa-angle-right",
    today: "fa fa-dot-circle-o",
    clear: "fa fa-trash",
    close: "fa fa-times",
  },
};

$(function () {
  var optionsDatetime = $.extend({}, defaults, { format: "DD-MM-YYYY HH:mm" });
  var optionsDate = $.extend({}, defaults, { format: "DD-MM-YYYY" });
  var optionsTime = $.extend({}, defaults, { format: "HH:mm" });

  $(".datepicker").datetimepicker(optionsDate);
  $(".timepicker").datetimepicker(optionsTime);
  $(".datetimepicker").datetimepicker(optionsDatetime);
});
