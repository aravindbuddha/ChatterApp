var CH = (function () {
    var
    api_path = "http://localhost/learn/ChatterApp/api/",
      xhr = new XMLHttpRequest();
    return {
      get: function (path, params, callback) {
        this.ajax("get", path, params, callback);
      },
      post: function (path, params, callback) {
        if ("file" in params) {
          this.ajaxFile("post", path, params, callback);
        }
        this.ajax("post", path, params, callback);
      },
      put: function () {

      },
      delete: function () {

      },
      ajax: function (method, url, data, callback) {
        data = data || null;
        url = api_path + url;
        xhr.open(method, url, true);
        if (method == "post") {
          xhr.setRequestHeader("Content-type", "application/json");
        }

        xhr.onload = function () {
          json = JSON.parse(xhr.response);
          callback(json);
        }
        xhr.send(data);
      },
      ajaxFile: function (method, url, data, callback) {
        var blob = this.files[0];

        const BYTES_PER_CHUNK = 1024 * 1024; // 1MB chunk sizes.
        const SIZE = blob.size;

        var start = 0;
        var end = BYTES_PER_CHUNK;

        while (start < SIZE) {
          upload(blob.slice(start, end));

          start = end;
          end = start + BYTES_PER_CHUNK;
        }
      },
      false);
  },
  api: function (path, method, params, callback) {
    if (method == "get") {
      this.get(path, params, callback);
    }
    if (method == "post") {
      this.post(path, params, callback);
    }
  }
}
});