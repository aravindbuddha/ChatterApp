var CH = (function() {
  var
  api_path = "http://localhost/learn/ChatterApp/api/",
    xhr = new XMLHttpRequest();
  return {
    get: function(path, params, callback) {
      this.ajax("get", path, params, callback);
    },
    post: function(path, params, callback) {
      this.ajax(path, params, callback);
    },
    put: function() {

    },
    delete: function() {

    },
    ajax: function(method, url, data, callback) {
      data = data || null;
      url = api_path + url;
      xhr.open(method, url, true);
      if (method == "post") {
        xhr.setRequestHeader("Content-type", "application/json");
      }

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
      if (method == "post") {
        this.post(path, params, callback);
      }
    }
  }
});