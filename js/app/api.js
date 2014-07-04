var CH = (function() {
  var
  api_path = "http://localhost/learn/ChatterApp/api/";

  return {
    get: function(path, params, callback) {
      this.ajax("get", path, params, callback);
    },
    post: function() {

    },
    put: function() {

    },
    delete: function() {

    },
    ajax: function(method, url, data, callback) {
      data = data || null;
      url = api_path + url;
      var xhr = new XMLHttpRequest();
      xhr.open(method, url, true);
      xhr.onload = function() {
        json = JSON.parse(xhr.response);
        callback(json);
      }
      xhr.send(data);
    },
    api: function(path, method, params, callback) {
      if (method == "get") {
        this.get(path, params, callback);
      }
    }
  }
});