$('.block-tooltip').tooltip({
    tooltipClass : "item-tooltip",
    persistent   : true,
    html         : true,
    trigger      : "hover",
    content      : function() {
      return `<img class="item-tooltip-image" src="${$(this).data('thumbnail')}" />
      <br><span class="bold">${$(this).data('title')}</span><br>${$(this).data('content')}`
    }
  });