// Generated by CoffeeScript 1.8.0
(function() {
  var getLatestVersion, initializeDropDowns, versionIsSmaller;

  $(function() {
    getLatestVersion();
    initializeDropDowns();
    return null;
  });

  initializeDropDowns = function() {
    $('.ownershipDropDown a').click(function() {
      $('#permissions-' + $(this).data('entity') + '-' + $(this).data('action')).val($(this).text());
      $('#selected-' + $(this).data('entity') + '-' + $(this).data('action')).text($(this).text());
      return null;
    });
    return null;
  };

  window.submitForm = function(form) {
    form.submit();
    return null;
  };

  getLatestVersion = function() {
    $.getJSON('https://api.github.com/repos/GeneaLabs/bones-keeper/git/refs/', function(data) {
      var latestVersion;
      if (data.length > 1) {
        latestVersion = data[1]['ref'].split('/');
        latestVersion = latestVersion[latestVersion.length - 1];
        if (versionIsSmaller($('#bonesKeeperInstalledVersion').text(), latestVersion)) {
          $('#bonesKeeperCurrentVersion').text(latestVersion);
          $('#bonesKeeperCurrentVersion').addClass('btn-danger');
          $('#bonesKeeperCurrentVersion').parent().href('http://github.com/genealabs/bones-keeper');
          $('#bonesKeeperCurrentVersion').parent().removeClass('navbar-text');
          $('#bonesKeeperCurrentVersion').parent().addClass('btn btn-default navbar-btn');
        }
      }
      return null;
    });
    return null;
  };

  versionIsSmaller = function(version1, version2) {
    var i, result, _i, _ref;
    result = false;
    if (typeof version1 !== 'object') {
      version1 = version1.toString().split('.');
    }
    if (typeof version2 !== 'object') {
      version2 = version2.toString().split('.');
    }
    for (i = _i = 0, _ref = Math.max(version1.length, version2.length); 0 <= _ref ? _i <= _ref : _i >= _ref; i = 0 <= _ref ? ++_i : --_i) {
      if (version1[i] === void 0) {
        version1[i] = 0;
      }
      if (version2[i] === void 0) {
        version2[i] = 0;
      }
      if (Number(version1[i]) < Number(version2[i])) {
        result = true;
        break;
      }
      if (version1[i] !== version2[i]) {
        break;
      }
    }
    return result;
  };

}).call(this);

//# sourceMappingURL=scripts.js.map