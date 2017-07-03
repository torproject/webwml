// This code is based on the http://mozilla.debian.net sources.list
// generator as originally written by Mike Hommey. It is licensed under
// the terms of the GNU GPLv2, http://www.gnu.org/licenses/gpl-2.0.html.
var sources = {};
var software = {
'tor': { '_stable': {
                     'jessie':  [ 'jessie' ],
                     'stretch': [ 'stretch' ],
                     'buster':  [ 'buster' ],
                     'sid':     [ 'sid' ],
                     'trusty':  [ 'trusty'],
                     'xenial':  [ 'xenial'],
                     'yakkety': [ 'yakkety'],
                     'zesty':   [ 'zesty'],
                     },
         'experimental-0.3.1.x': {
                     'jessie':  [ 'jessie' ],
                     'stretch': [ 'stretch' ],
                     'buster':  [ 'buster' ],
                     'sid':     [ 'sid' ],
                     'trusty':  [ 'trusty'],
                     'xenial':  [ 'xenial'],
                     'yakkety': [ 'yakkety'],
                     'zesty':   [ 'zesty'],
                     },
       },
'tor (from source)': {
         '_stable': {
                     'jessie':  [ 'jessie' ],
                     'stretch': [ 'stretch' ],
                     'buster':  [ 'buster' ],
                     'sid':     [ 'sid' ],
                     'trusty':  [ 'trusty'],
                     'xenial':  [ 'xenial'],
                     'yakkety': [ 'yakkety'],
                     'zesty':   [ 'zesty'],
                     },
         'experimental-0.3.0.x': {
                     'jessie':  [ 'jessie' ],
                     'stretch': [ 'stretch' ],
                     'buster':  [ 'buster' ],
                     'sid':     [ 'sid' ],
                     'trusty':  [ 'trusty'],
                     'xenial':  [ 'xenial'],
                     'yakkety': [ 'yakkety'],
                     'zesty':   [ 'zesty'],
                     },
       },
};

function init() {
    document.getElementById("distrib").addEventListener("change", update);
    document.getElementById("package").addEventListener("change", update);
    document.getElementById("version").addEventListener("change", update);

    pkg = document.getElementById('package');
    for (soft in software) {
        if (soft != pkg.value) {
            option = document.createElement('option');
            option.value = soft;
            option.appendChild(document.createTextNode(soft.charAt(0).toUpperCase() + soft.slice(1)));
            pkg.appendChild(option);
        }
    }

    apt_get = document.getElementById('apt-get');
    para = document.createElement('p');
    para.id = 'sorry';
    para.style.display = 'none';
    apt_get.parentNode.insertBefore(para, apt_get);
    para.appendChild(document.createTextNode("Sorry, this version is not available.\n"));

    document.getElementById('selector').style.display = 'block';

    update();
}

function replaceText(src, txt) {
    while (src.firstChild)
        src.removeChild(src.firstChild);
    src.appendChild(document.createTextNode(txt));
}

function update() {
    pkg = document.getElementById('package');
    ver = document.getElementById('version');
    package = pkg.value;
    version = ver.value;
    distrib = document.getElementById('distrib').value;
    if (package != pkg.prev) {
        while (ver.firstChild)
            ver.removeChild(ver.firstChild);
        var selected;
        for (version in software[package]) {
            option = document.createElement('option');
            if (version[0] == '_') {
                version = version.slice(1);
                selected = version;
            }
            option.appendChild(document.createTextNode(version));
            option.value = version = version.replace(/ \(.*\)/,'');
//alert(version);
            ver.appendChild(option);
        }
        ver.value = version = selected || version;
        pkg.prev = package
    }
    try {
        keys = software[package][version][distrib];
    } catch (e) {
        try {
            keys = software[package]['_' + version][distrib];
        } catch (e) { };
    }
    src = document.getElementById('sources');
    txt = '';
    need_signed = false;
    source_install = false;
    target = '';
    for (i = 0; keys && (i < keys.length); i++) {
//alert(keys[i]);
        if (keys[i] in sources) {
            txt += sources[keys[i]];
            target = keys[i];
        } else {
            if (package.slice(-7, -1) == 'source') {
                package = package.split(' ')[0];
                source_install = true;
            }
            txt += "http://deb.torproject.org/torproject.org";
            txt += " ";
            txt += keys[i];
            txt += " main";
            need_signed = true;
            target = keys[i];
            txt = "deb " + txt + "\ndeb-src " + txt;
            if (version != 'stable') {
                txt2 = "http://deb.torproject.org/torproject.org";
                txt2 += " ";
                txt2 += package;
                txt2 += "-";
                txt2 += version;
                txt2 += "-";
                txt2 += keys[i];
                txt2 += " main";
                txt = txt + "\ndeb " + txt2 + "\ndeb-src " + txt2;
            }
        }
        txt += "\n";
    }
    replaceText(src, txt);
    document.getElementById('regular-install').style.display = source_install ? 'none' : 'block';
    document.getElementById('source-install').style.display = source_install ? 'block' : 'none';
    document.getElementById('source-install2').style.display = source_install ? 'block' : 'none';
    replaceText(document.getElementById('apt-package'), package);
    document.getElementById('apt-source').style.display = (keys && keys.length) ? 'block' : 'none';
    document.getElementById('apt-get').style.display = keys ? 'block' : 'none';
    document.getElementById('sorry').style.display = keys ? 'none' : 'block';
}

document.addEventListener('DOMContentLoaded', function () {
  init();
});
