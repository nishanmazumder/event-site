!(function (s) {
  s.fn.ssdVerticalNavigation = function (a) {
    "use strict";
    function t(s) {
      s.toggleClass(l.classActive).siblings().removeClass(l.classActive);
    }
    function c(s, a, c) {
      s.hasClass(l.classMaster) &&
        !a.hasClass(l.classClickable) &&
        (c.preventDefault(), c.stopPropagation(), t(a));
    }
    var l = s.extend(
      {
        classMaster: "master",
        classActive: "active",
        classClickable: "clickable",
      },
      a
    );
    return this.each(function () {
      s(this)
        .addClass(l.classMaster)
        .on("click", "li a", function (a) {
          try {
            var t = s(this),
              l = t.parent("li"),
              e = l.parent("ul");
            c(e, l, a);
          } catch (i) {
            console.log(i);
          }
        });
    });
  };
})(jQuery);
