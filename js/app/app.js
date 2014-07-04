var App = (function() {
  return {
    init: function() {
      this.load('js/app/ChatterEngine.js');
    },
    load: function(url) {
      if (url.lastIndexOf('.css') != -1) {
        this.loadCss(url);
        return this;
      }
      this.loadJs(url);
      return this;
    },
    loadCss: function(url) {
      var link = document.createElement('link');
      link.href = url;
      link.type = "text/css";
      link.rel = "stylesheet";
      (document.head || document.head[0]).appendChild(link);
    },
    loadJs: function(url) {
      $.getScript(url, function() {
        //alert("hi");
      });
      // var s = document.createElement('script');
      // s.src = url;
      // s.type = "text/javascript";
      // (document.body || document.head || document.head[0]).appendChild(s);
    }
  }
}());


App.init();