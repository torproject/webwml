<?php
$pagename = "Tor: anonymity online";
include("zedheader.inc.php");
?>
<div class="main-column">
<h2>Available Linux/Unix Packages</h2>
<div class="warning">
Warning: Want Tor to really work?

...then please don't just install it and go on. You need to change some of your habits, and reconfigure your software! Tor by itself is NOT all you need to maintain your anonymity. Please take time to read the <a href=warning.html>warning page</a> to familiarize yourself with the pitfalls and limits of Tor.
</div>
<div class="underline"></div>



  <table class="download" width="100%">
    <thead>
      <tr align="center" class="download"> 
        <th colspan="2"  class="download"><strong>Platform</strong></th>
        <th colspan="2"  class="stable">Stable <br>
          (0.2.0.34)</th>
        <th colspan="2"  class="unstable">Unstable<br/>
          (0.2.1.15-rc)</th>
        <th colspan="2"  class="help">Help</th>
      </tr>
      <tr align="center" class="terminal"> 
        <td colspan="2"  class="terminal">&nbsp;</th>
        <td colspan="4"  class="terminal"><a href="#packagediff">Difference between 
          Stable &amp; Unstable ?</a></th>
        <td colspan="2"  class="terminal">&nbsp;</th>
      </tr>
    </thead>
    <tr valign="middle"> 
      <td align="center" class="note"><img src="/images/distros/debian.png"></td>
      <td align="left" class="distro"><strong>Debian sid</strong></td>
      <td align="center" class="terminal"><img src="/images/distros/terminal.png"> 
      </td>
      <td colspan="3" class="terminal"><kbd>apt-get install tor</kbd> </td>
      <td align="center" class="help"><img src="/images/distros/help.png"></td>
      <td class="help"> &raquo; <a href="docs/tor-doc-unix.html.en">Linux/BSD/Unix</a> 
      </td>
    </tr>
    <tr valign="middle"> 
      <td align="center" class="note""><img src="/images/distros/ubuntu.png"></td>
      <td align="left" class="distro"><strong>Other Debian, Knoppix, Ubuntu</strong></td>
      <td align="center" class="terminal"><img src="/images/distros/link.png"></td>
      <td colspan="3" class="terminal"><a href="https://wiki.torproject.org/noreply/TheOnionRouter/TorOnDebian">noreply.org 
        packages</a> </td>
      <td align="center" class="help"><img src="/images/distros/help.png"></td>
      <td class="help"> &raquo; <a href="docs/tor-doc-unix.html.en">Linux/BSD/Unix</a> 
      </td>
    </tr>
    <tr valign="middle"> 
      <td align="center" class="note"><img src="/images/distros/redhat.png"></td>
      <td align="left" class="distro"><strong>Red Hat 3 &amp; 4</strong></td>
      <td align="center" class="stable"> <img src="/images/distros/package.png"><br>
        (<a href="dist/rpm/tor-0.2.0.34-tor.0.rh4_7.i386.rpm.asc">sig</a>/<a href="dist/rpm/tor-0.2.0.34-tor.0.rh4_7.i386.rpm.sha1">sha1</a>) 
        <br> </td>
      <td align="center" class="stable"><img src="/images/distros/src.png"><br>
        (<a href="dist/rpm/tor-0.2.0.34-tor.0.rh4_7.src.rpm.asc">sig</a>/<a href="dist/rpm/tor-0.2.0.34-tor.0.rh4_7.src.rpm.sha1">sha1</a>) 
      </td>
      <td align="center" class="unstable"> <img src="/images/distros/package.png"><br>
        (<a href="dist/rpm/tor-0.2.1.15.rc-tor.0.rh4_7.i386.rpm.asc">sig</a>/<a href="dist/rpm/tor-0.2.1.15.rc-tor.0.rh4_7.i386.rpm.sha1">sha1</a>) 
      </td>
      <td align="center" class="unstable"><img src="/images/distros/src.png"><br>
        (<a href="dist/rpm/tor-0.2.1.15.rc-tor.0.rh4_7.src.rpm.asc">sig</a>/<a href="dist/rpm/tor-0.2.1.15.rc-tor.0.rh4_7.src.rpm.sha1">sha1</a>) 
      </td>
      <td align="center" class="help"><img src="/images/distros/help.png"></td>
      <td class="help"> &raquo; <a href="docs/tor-doc-unix.html.en">Linux/BSD/Unix</a> 
      </td>
    </tr>
    <tr valign="middle"> 
      <td align="center" class="note"><img src="/images/distros/redhat.png"></td>
      <td align="left" class="distro"><strong>Red Hat 5</strong></td>
      <td align="center" class="stable"><img src="/images/distros/package.png"> 
        <br>
        (<a href="dist/rpm/tor-0.2.0.34-tor.0.rh5_2.i386.rpm.asc">sig</a>/<a href="dist/rpm/tor-0.2.0.34-tor.0.rh5_2.i386.rpm.sha1">sha1</a>) 
      </td>
      <td align="center" class="stable"><img src="/images/distros/src.png"><br>
        (<a href="dist/rpm/tor-0.2.0.34-tor.0.rh5_2.src.rpm.asc">sig</a>/<a href="dist/rpm/tor-0.2.0.34-tor.0.rh5_2.src.rpm.sha1">sha1</a>) 
        <br> </td>
      <td align="center" class="unstable"> <img src="/images/distros/package.png"> 
        <br>
        (<a href="dist/rpm/tor-0.2.1.15.rc-tor.0.rh5_3.i386.rpm.asc">sig</a>/<a href="dist/rpm/tor-0.2.1.15.rc-tor.0.rh5_3.i386.rpm.sha1">sha1</a>) 
      </td>
      <td align="center" class="unstable"><img src="/images/distros/src.png"><br>
        (<a href="dist/rpm/tor-0.2.1.15.rc-tor.0.rh5_3.src.rpm.asc">sig</a>/<a href="dist/rpm/tor-0.2.1.15.rc-tor.0.rh5_3.src.rpm.sha1">sha1</a>) 
      </td>
      <td align="center" class="help"><img src="/images/distros/help.png"></td>
      <td class="help"> &raquo; <a href="docs/tor-doc-unix.html.en">Linux/BSD/Unix</a> 
      </td>
    </tr>
    <tr valign="middle"> 
      <td align="center" class="note"><img src="/images/distros/fedora.png"></td>
      <td align="left" class="distro"><strong>Fedora Core 10</strong></td>
      <td align="center" class="stable"><img src="/images/distros/package.png"><br>
        (<a href="dist/rpm/tor-0.2.0.34-tor.0.fc10.i386.rpm.asc">sig</a>/<a href="dist/rpm/tor-0.2.0.34-tor.0.fc10.i386.rpm.sha1">sha1</a>) 
      </td>
      <td align="center" class="stable"><img src="/images/distros/src.png"><br>
        (<a href="dist/rpm/tor-0.2.0.34-tor.0.fc10.src.rpm.asc">sig</a>/<a href="dist/rpm/tor-0.2.0.34-tor.0.fc10.src.rpm.sha1">sha1</a>) 
      </td>
      <td align="center" class="unstable"> <img src="/images/distros/package.png"><br>
        (<a href="dist/rpm/tor-0.2.1.15.rc-tor.0.fc10.i386.rpm.asc">sig</a>/<a href="dist/rpm/tor-0.2.1.15.rc-tor.0.fc10.i386.rpm.sha1">sha1</a>) 
      </td>
      <td align="center" class="unstable"><img src="/images/distros/src.png"><br>
        (<a href="dist/rpm/tor-0.2.1.15.rc-tor.0.fc10.src.rpm.asc">sig</a>/<a href="dist/rpm/tor-0.2.1.15.rc-tor.0.fc10.src.rpm.sha1">sha1</a>)</td>
      <td align="center" class="help"><img src="/images/distros/help.png"></td>
      <td class="help"> &raquo; <a href="docs/tor-doc-unix.html.en">Linux/BSD/Unix</a> 
      </td>
    </tr>
    <tr valign="middle"> 
      <td align="center" class="note"><img src="/images/distros/suse.png"></td>
      <td align="left" class="distro"><strong>openSUSE 11</strong></td>
      <td align="center" class="stable"><img src="/images/distros/package.png"><br>
        (<a href="dist/rpm-suse/tor-0.2.0.34-tor.0.suse.i386.rpm.asc">sig</a>/<a href="dist/rpm-suse/tor-0.2.0.34-tor.0.suse.i386.rpm.sha1">sha1</a>) 
      </td>
      <td align="center" class="stable"><img src="/images/distros/src.png"><br>
        (<a href="dist/rpm-suse/tor-0.2.0.34-tor.0.suse.src.rpm.asc">sig</a>/<a href="dist/rpm-suse/tor-0.2.0.34-tor.0.suse.src.rpm.sha1">sha1</a>)</td>
      <td align="center" class="unstable"> <img src="/images/distros/package.png"><br>
        (<a href="dist/rpm-suse/tor-0.2.1.15.rc-tor.0.suse11_1.i586.rpm.asc">sig</a>/<a href="dist/rpm-suse/tor-0.2.1.15.rc-tor.0.suse11_1.i586.rpm.sha1">sha1</a>) 
      </td>
      <td align="center" class="unstable"><img src="/images/distros/src.png"><br>
        (<a href="dist/rpm-suse/tor-0.2.1.15.rc-tor.0.suse11_1.src.rpm.asc">sig</a>/<a href="dist/rpm-suse/tor-0.2.1.15.rc-tor.0.suse11_1.src.rpm.sha1">sha1</a>)</td>
      <td align="center" class="help"><img src="/images/distros/help.png"></td>
      <td class="help"> &raquo; <a href="docs/tor-doc-unix.html.en">Linux/BSD/Unix</a> 
      </td>
    </tr>
    <tr valign="middle"> 
      <td align="center" class="note"><img src="/images/distros/generic.png"></td>
      <td align="left" class="distro"><strong>User Contributed RPMs</strong></td>
      <td align="center" class="terminal"><img src="/images/distros/link.png"> 
      </td>
      <td colspan="3" class="terminal"><a href="http://mirror.noreply.org/pub/devil.homelinux.org/Tor/">Contrib 
        RPMs including development snapshots</a> </td>
      <td align="center" class="help"><img src="/images/distros/help.png"></td>
      <td class="help"> &raquo; <a href="docs/tor-doc-unix.html.en">Linux/BSD/Unix</a> 
      </td>
    </tr>
    <tr valign="middle"> 
      <td align="center" class="note"><img src="/images/distros/gentoo.png"></td>
      <td align="left" class="distro"><strong>Gentoo Linux</strong></td>
      <td align="center" class="terminal"><img src="/images/distros/terminal.png"></td>
      <td colspan="3" class="terminal"><kbd>emerge tor</kbd></td>
      <td align="center" class="help"><img src="/images/distros/help.png"></td>
      <td class="help"> 
          &raquo; <a href="docs/tor-doc-unix.html.en">Linux/BSD/Unix</a><br/>
          &raquo; <a href="http://gentoo-wiki.com/HOWTO_Anonymity_with_Tor_and_Privoxy">Gentoo-wiki 
            guide</a>
        </td>
    </tr>
    <tr valign="middle"> 
      <td align="center" class="note"><img src="/images/distros/freebsd.png"></td>
      <td align="left" class="distro"><strong>FreeBSD</strong></td>
      <td align="center" class="terminal"><img src="/images/distros/terminal.png"></td>
      <td colspan="3" class="terminal"><kbd>portinstall -s security/tor</kbd></td>
      <td align="center" class="help"><img src="/images/distros/help.png"></td>
      <td class="help">&raquo; <a href="docs/tor-doc-unix.html.en">Linux/BSD/Unix</a></td>
    </tr>
    <tr valign="middle"> 
      <td align="center" class="note"><img src="/images/distros/openbsd.png"></td>
      <td align="left" class="distro"><strong>OpenBSD</strong></td>
      <td align="center" class="terminal"><img src="/images/distros/terminal.png"></td>
      <td colspan="3" class="terminal"><kbd>cd /usr/ports/net/tor &amp;&amp; make 
        &amp;&amp; make install</kbd></td>
      <td align="center" class="help"><img src="/images/distros/help.png"></td>
      <td class="help"> 
          &raquo;  <a href="docs/tor-doc-unix.html.en">Linux/BSD/Unix</a><br/>&raquo;
          <a href="https://wiki.torproject.org/noreply/TheOnionRouter/OpenbsdChrootedTor">chrooting 
            Tor</a>
        </td>
    </tr>
    <tr valign="middle"> 
      <td align="center" class="note"><img src="/images/distros/netbsd.png"></td>
      <td align="left" class="distro"><strong>NetBSD</strong></td>
      <td align="center" class="terminal"><img src="/images/distros/terminal.png"></td>
      <td colspan="3" class="terminal"><kbd>cd /usr/pkgsrc/net/tor &amp;&amp; 
        make install</kbd></td>
      <td align="center" class="help"><img src="/images/distros/help.png"></td>
      <td class="help">&raquo; <a href="docs/tor-doc-unix.html.en">Linux/BSD/Unix</a></td>
    </tr>
    <tr valign="middle"> 
      <td align="center" class="note"><img src="/images/distros/generic.png"></td>
      <td align="left" class="distro"><strong>Source tarballs</strong></td>
      <td colspan="2" align="center" class="stable"><img src="/images/distros/src.png"><br>
        (<a href="dist/tor-0.2.0.34.tar.gz.asc">sig</a>)</td>
      <td colspan="2" align="center" class="unstable"> <img src="/images/distros/src.png"><br>
        (<a href="dist/tor-0.2.1.15-rc.tar.gz.asc">sig</a>/<a href="dist/tor-0.2.1.15-rc.tar.gz.sha1">sha1</a>) 
      </td>
      <td align="center" class="terminal"><img src="/images/distros/terminal.png"></td>
      <td class="terminal"><kbd>./configure &amp;&amp; make &amp;&amp; src/or/tor</kbd></td>
    </tr>
  </table>
<div class="underline"></div>
<div class="nb">
To keep informed of security advisories and new stable releases, subscribe
to the <a href="http://archives.seul.org/or/announce/">or-announce
mailing list</a> (you will be asked to confirm via email). You can also
<a href="http://rss.gmane.org/gmane.network.onion-routing.announce">watch
the list's RSS feed</a>.
<div class="underline"></div>
<link rel="alternate" title="Tor Project OR-announce" href="http://rss.gmane.org/gmane.network.onion-routing.announce" type="application/rss+xml">
<form action="http://freehaven.net/cgi-bin/majordomo.cgi">
<input name="mlist" value="or-announce" type="hidden">
<input name="subscribe" value="1" type="hidden">
<input name="host" value="freehaven.net" type="hidden">
      <input name="email" size="24">
<input value="subscribe to or-announce" type="submit">
</form>
</div>
<div class="underline"></div>
<div class="nb">
Tor is distributed as <a href="http://www.fsf.org/">Free Software</a>
under the <a href="https://git.torproject.org/checkout/tor/master/LICENSE">3-clause BSD license</a>. The
bundles also include <a href="vidalia/index.html.en">Vidalia</a>
and <a href="http://www.privoxy.org/">Privoxy</a>, which are supporting
applications distributed under the GNU GPL.
<br><br>
There is no fee for installing Tor, or using the Tor network, but
if you want Tor to become faster and more usable please consider
<a href="donate.html.en">making a tax-deductible donation to The Tor Project</a>.
</div>
</div>

<!-- #main -->
<?php

include("footer.inc.php");

?>
