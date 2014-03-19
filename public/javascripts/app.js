(function (global, doc) {

  "use strict";

  var query = global.query = function query(selector) {
    if (selector.match(/^#[a-zA-Z0-9\-_]+$/))
      return doc.getElementById(selector.substring(1));
    return null;
  };

  var attach = global.attach = function attach(type, callback, target, useCapture) {
    target = typeof target === 'object' ? target : global;
    useCapture = typeof useCaptureuse === 'boolean' ? useCapture : false;

    if (!type.match(/^(load|click)$/))
      throw new Error('Wrong listener type: ' + type);

    if (global.addEventListener)
      target.addEventListener(type, callback, useCapture);
    else
      target.attachEvent('on' + type, callback);
  };

  function backToPreviousPage() {
    location.href = {
      '/register/additional': '/register',
      '/register/confirm': '/register/additional'
    }[location.pathname];
  }

  attach('load', function () {
    var button = query('#form-action-button-back');
    if (button !== null)
      attach('click', backToPreviousPage, button);
  });

}(window, document));
