$(function(){
  /* If javascript is enabled this hides all sections by default */
  $(".easy").css('display', 'none');
  /* Only show language selector if javascript is enabled */
  $('.lang').css('display', 'block');
  $('.lang-alt').css('display', 'none');
  $('.expander').css('display', 'block');
  $('.sidenav').css('display', 'none');
});

/* Uses result of jquery.client to open the relevant section */
function OScheck() {
  var clientos = $.client.os;
  if(clientos == "Linux"){
    $('.easy.linux').css('display', 'block');
  }else if(clientos == "Windows"){
    $('.easy.windows').css('display', 'block');
  }else if(clientos == "Mac"){
    $('.easy.mac').css('display', 'block');
  }else if(clientos == "Android"){
    $('.easy.android').css('display', 'block');
  }else{
    $('.easy').css('display', 'block');
  }
}
  $(function(){
  OScheck();
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


    // Bind an event to window.onhashchange
    $(window).bind( 'hashchange', function(e) {

      // Get the hash (fragment) as a string, with any leading # removed.
      var url = $.param.fragment();

      // Toggle the '.easy' divs to off
      if(url == 'windows'|url == 'mac'|url == 'linux'|url == 'android'){

	  $('.easy').css('display', 'none');
      }

      if(url == 'windows'){
	$('.easy.windows').css('display', 'block');
      } else if(url == 'mac'){
	$('.easy.mac').css('display', 'block');
      } else if(url == 'linux'){
	$('.easy.linux').css('display', 'block');
      } else if(url == 'android'){
  $('.easy.android').css('display', 'block');
      } else {
	  $('.easy').css('display', 'none');
	  $(function(){OScheck();});
      }
    });

    // Since the event is only triggered when the hash changes, we need to trigger
    // the event now, to handle the hash the page may have loaded with.
    $(window).trigger( 'hashchange' );

});
