(function (global, doc) {

  "use strict";

  attach('load', function() {
    var gathering = statistics.gathering,
        training = statistics.training;

    attach('click', toggle('#gathering-attender-list'), query('#gathering-attender-title'));
    query('#number-of-gathering-attender').appendChild(doc.createTextNode(gathering.attend));

    attach('click', toggle('#gathering-decliner-list'), query('#gathering-decliner-title'));
    query('#number-of-gathering-decliner').appendChild(doc.createTextNode(gathering.decline));

    attach('click', toggle('#training-attender-list'), query('#training-attender-title'));
    query('#number-of-training-attender').appendChild(doc.createTextNode(training.attend));

    attach('click', toggle('#training-decliner-list'), query('#training-decliner-title'));
    query('#number-of-training-decliner').appendChild(doc.createTextNode(training.decline));
  });

  function toggle(targetQuery) {
    var open = false;

    return function(e) {
      var elem = query(targetQuery);
      if (!open) {
        elem.style.display = 'block';
        open = true;
      } else {
        elem.style.display = 'none';
        open = false;
      }
    }
  }

}(window, document));
