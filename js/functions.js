$(function(){ $("label").replaceWith('<label class="active" for="email">Enter your email address</label>'); $("label").inFieldLabels(); });

function addSearchProvider(prov) {

try {
window.external.AddSearchProvider(prov);
}

catch (e) {
alert("Search plugins require Firefox 2");
return;
}
}

function addEngine(name,ext,cat,pid)
{
  if ((typeof window.sidebar == "object") && (typeof window.sidebar.addSearchEngine == "function")) {
    window.sidebar.addSearchEngine(
      "http://mycroft.mozdev.org/install.php/" + pid + "/" + name + ".src",
      "http://mycroft.mozdev.org/install.php/" + pid + "/" + name + "."+ ext, name, cat );
  } else {
    alert("You will need a browser which supports Sherlock to install this plugin.");
  }
}

function addOpenSearch(name,ext,cat,pid,meth)
{
  if ((typeof window.external == "object") && ((typeof window.external.AddSearchProvider == "unknown") || (typeof window.external.AddSearchProvider == "function"))) {
    if ((typeof window.external.AddSearchProvider == "unknown") && meth == "p") {
      alert("This plugin uses POST which is not currently supported by Internet Explorer's implementation of OpenSearch.");
    } else {
      window.external.AddSearchProvider(
        "http://mycroft.mozdev.org/installos.php/" + pid + "/" + name + ".xml");
    }
  } else {
    alert("You will need a browser which supports OpenSearch to install this plugin.");
  }
}

function addOpenSearch2(name,ext,cat,pid,meth)
{
  if ((typeof window.external == "object") && ((typeof window.external.AddSearchProvider == "unknown") || (typeof window.external.AddSearchProvider == "function"))) {
    if ((typeof window.external.AddSearchProvider == "unknown") && meth == "p") {
      alert("This plugin uses POST which is not currently supported by Internet Explorer's implementation of OpenSearch.");
    } else {
      window.external.AddSearchProvider(
        "http://torbutton.torproject.org/dev/search/" + name + ".xml");
    }
  } else {
    alert("You will need a browser which supports OpenSearch to install this plugin.");
  }
}

function install (aEvent)
{
  var params = {
    "Torbutton": { URL: aEvent.target.href,
             Hash: aEvent.target.getAttribute("hash"),
             toString: function () { return this.URL; }
    }
  };
  InstallTrigger.install(params);

  return false;
}
