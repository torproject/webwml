$(function(){
  /* Only show language selector if javascript is enabled */
  $('.lang').css('display', 'block');
  $('.lang-alt').css('display', 'none');
  $('.expander').css('height', '100%');
  $('.sidenav').css('display', 'none');
});

/* Reset language default - needed in the event of returning to the page via back button */
function resetAll() {
  var f = document.forms;
  var last = f.length - 1;
  for (var i = 0; i < last; i++) {
    f[i].reset();
  }
}

/* switches package links depending on selection */
function updateLang() {
  var caller = $( this );
  var pkg = caller.attr('id');
  var lang = caller.val();
  var versions = JSON.parse($("#version-data").text());
  var rootDir = '../dist/torbrowser/' + '/';
  var bundles = {
    'win-tbb' : rootDir + versions.torbrowserbundle + '/torbrowser-install-' + versions.torbrowserbundle + '_' + lang + '.exe',
    'win-tbb64' : rootDir + versions.torbrowserbundle + '/torbrowser-install-win64-' + versions.torbrowserbundle + '_' + lang + '.exe',
    'osx-tbb' : rootDir + versions.torbrowserbundleosx64 + '/TorBrowser-' + versions.torbrowserbundleosx64 + '-osx64_' + lang +'.dmg',
    'osx-tbb64' : rootDir + versions.torbrowserbundleosx64 + '/TorBrowser-' + versions.torbrowserbundleosx64 + '-osx64_' + lang + '.dmg',
    'lin-tbb32' : rootDir + versions.torbrowserbundlelinux32 + '/tor-browser-linux32-' + versions.torbrowserbundlelinux32 + '_' + lang + '.tar.xz',
    'lin-tbb64' : rootDir + versions.torbrowserbundlelinux64 + '/tor-browser-linux64-' + versions.torbrowserbundlelinux64 + '_' + lang + '.tar.xz'
  };

  $('.'+pkg).attr("href", bundles[pkg]);
  $('.'+pkg+'-sig').attr("href", bundles[pkg] + '.asc');
}

$(function(){
  $('.lang').ready(updateLang);
  $('.lang').change(updateLang);
  /* Only show language selector if javascript is enabled */
  $('.lang').css('display', 'block');
});

$(document).ready(function () {
    $('.onload').ready(resetAll);

    $('.jump').click(function(event){
      //prevent the default action for the click event
      //event.preventDefault();

      //get the full url - like mysitecom/index.htm#home
      var full_url = this.href;

      //split the url by # and get the anchor target name - home in mysitecom/index.htm#home
      var parts = full_url.split("#");
      var trgt = parts[1];

      //get the top offset of the target anchor
      var target_offset = $("#"+trgt).offset();
      var target_top = target_offset.top;

      //goto that anchor by setting the body scroll top to anchor top
//      $('html, body').animate({scrollTop:target_top}, 1000);
    });
});
