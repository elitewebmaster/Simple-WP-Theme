jQuery(function () {
  jQuery("#top-menu, .bar .menu ul").lavaLamp({
    fx: "backout",
    speed: 700,
    click: function (event, menuItem) {
      return true;
    },
  });
});
