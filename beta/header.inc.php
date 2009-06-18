<?php
  $parts = Explode('/', $_SERVER["SCRIPT_NAME"]);
  $scriptname = $parts[count($parts) - 1];
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/1999/REC-html401-19991224/loose.dtd">
<html>
<head>
<title><?php echo $pagename; ?></title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
<link rel="stylesheet" type="text/css" href="/zedstylesheet-ltr.css" title="light" />
<link rel="alternate stylesheet" type="text/css" href="/black-zedstylesheet-ltr.css" title="dark" />
<link rel="stylesheet" type="text/css" href="/navbar.css">
<link rel="shortcut icon" href="/images/favicon.ico">
</head>
<body><div class="page">
<table height="24" width=100% border="0" align=center cellpadding="0" cellspacing="0" summary="www.torproject.org">
  <tr> 
    <td valign="middle" class=topbanner> <table width="100%" border="0" align="center" cellpadding="0">
        <tr valign="bottom"> 
          <td><a id="top" class=fade href=/><img src=/images/torshadow.png alt="https://torproject.org" border="0" class=navlogo></a></td>
          <td align="right" nowrap> <form action="http://www.google.com/cse" id="cse-search-box">
              <div> 
                <input type="hidden" name="cx" value="001416743349295456282:tpdswzqu2v0" />
                <input type="hidden" name="ie" value="UTF-8" />
                <input type="text" class="formfield" name="q" size="14" />
                <input type="submit" class="formbutton" name="sa" value="Search" />
                <br>
                <div class="smallboldtxt"> [ Tor & subs via <a href="http://www.google-watch.org/bigbro.html" title="Search Tor domains via Google" target="_blank">Google</a> 
                   ]</div>
              </div>
            </form></td>
        </tr>
      </table></td>
    <td width=10></td>
  </tr>
</table>
<table class=banner border=0 cellpadding=0 cellspacing=0 summary="Tor's Navigation Bar">
  <tr> 
    <td nowrap class=banner-middle><div style="clear: both;"></div>
      <ul id=nav class="dropdown dropdown-horizontal">
        <li id=organisation><a href=/ class=dir>Tor <img src="/images/navdropdownarrow.png" class="flyout"><span> 
          The Tor Project&nbsp;&raquo;&nbsp;What is the Tor Project? Who's involved?</span> 
          </a> 
          <ul>
            <li><a href=/30seconds.html>Why use Tor?<span> Why you need Tor & 
              why Tor needs you!</span></a> </li>
            <li><a href=/overview.html>Overview<span> What is Tor? Why would I 
              want to use it? How does it work?</span></a> </li>
            <li><a href=/people.html>Contributors<span> Who participates in the 
              project?</span></a> </li>
            <li><a href=/donate.html>Donations<span> Donate to the non-profit 
              Tor project and help Tor prosper!</span></a> </li>
            <li><a href=/sponsors.html>Sponsors<span> Tor's financial supporters.</span></a> 
            </li>
            <li><a href=/translation.html>Translators<span> Help translate Tor 
              & documentation into your language!</span></a> </li>
            <li><a href=/torusers.html>Users<span> Who uses Tor? Could you benefit?</span></a> 
            </li>
            <li><a href=/volunteer.html>Volunteers<span> Would you like to help 
              with the project? Here's where we need your help..</span></a> </li>
          </ul>
        </li>
        <li id=news><a href=/news.html>News <img src="/images/navdropdownarrow.png" class="flyout"><span> 
          The Tor Project&nbsp;&raquo;&nbsp;News, blog, & press sightings..</span></a> 
          <ul>
            <li class=first><a href=https://blog.torproject.org>Tor Blog<span> 
              News from the Tor front line.</span></a> </li>
            <li><a href=https://blog.torproject.org/blog/feed>Blog RSS Feed<span>Medium 
              volume RSS feed for the Tor Project blog.</span></a> </li>
            <li><a href=/press/>Press Releases<span> Offical Press Releases for 
              the Tor Project.</span></a> </li>
            <li><a href=/tormedia>In The Media<span>Tor coverage in the media 
              at large.</span></a> </li>
            <li><a href=http://rss.gmane.org/gmane.network.onion-routing.announce>Tor 
              Updates<span> Low volume RSS Feed detailing Tor releases and security 
              fixes</span></a> </li>
          </ul>
        <li id=help><a href=/30seconds.html class=dir>Support <img src="/images/navdropdownarrow.png" class="flyout"><span> 
          The Tor Project&nbsp;&raquo;&nbsp;Help, support & technical documentation.</span></a> 
          <ul>
            <li><span class=dir>For Tor Users</span> 
              <ul>
                <li><span class=dir>Installation</span> 
                  <ul>
                    <li class=first><a href=/docs/tor-doc-windows.html>Win32<span> Installing Tor on Microsoft Windows.</span></a> 
                    </li>
                    <li><a href=/docs/tor-doc-osx.html.en>OS X<span> Installing Tor on Apple OS X.</span></a> </li>
                    <li><a href=/docs/tor-doc-unix.html.en>Linux/Unix/BSD<span> Installing Tor on Linux, Unix & BSD.</span></a> 
                    </li>
                    <li><a href=/torbutton/index.html>Torbutton<span> Torbutton extension for Firefox.</span></a> </li>
                  </ul>
                </li>
                <li><span class=dir>Configuration</span> 
                  <ul>
                    <li class=first><a href=https://wiki.torproject.org/noreply/TheOnionRouter/TorFAQ#IsMyConnectionPrivate>Is 
                      Tor working?<span> How do I test that Tor is working? How can I be sure my connections are fully anonymized?</span></a> </li>
                    <li><a href=http://rootatlocalhost.bouldernet.org/tor_configurator.html>Torrc 
                      Configurator<span> Generate a custom Tor configuration file (torrc) using a web based interface.</span></a></li>
                    <li><a href=https://wiki.torproject.org/noreply/TheOnionRouter/PrivoxyConfig>Sample 
                      Privoxy Config<span> Sample privoxy configuration file for use with the Unixish and Gnu/Linux packages.</span></a></li>
                    <li><a href=https://wiki.torproject.org/noreply/TheOnionRouter/TorFAQ#RelayCrashing>Tor  
                      Crashes<span> Help with troubleshooting Tor crashes.</span></a> </li>
                    <li><a href=https://wiki.torproject.org/noreply/TheOnionRouter/TorifyHOWTO/BitTorrent?highlight=%2528bittorrent%2529#BitTorrent>Tor 
                      & BitTorrent.<span> Using Tor with BitTorrent, and how to configure it correctly.</span></a> </li>
                    <li><a href=https://wiki.torproject.org/noreply/TheOnionRouter/TorifyHOWTO/IrcSilc>Tor 
                      & IRC<span> Configuring IRC clients for use with Tor.</span></a> </li>
                  </ul>
                <li class=first><a href=/x21/documentation.html>Tor 
                  Documentation<span> Tor's main documentation page.</span></a> 
                <li><a href=https://check.torproject.org>Check 
                  Tor works<span> Verify your browser is using Tor [https://check.torproject.org].</span></a></li>
                <li><span class=dir>Tor Wiki</span> 
                  <ul>
                    <li class=first><a href=https://wiki.torproject.org/noreply/TheOnionRouter>Main 
                      Page<span> The Onion Router Wiki</span></a></li>
                    <li><a href=https://wiki.torproject.org/noreply/TheOnionRouter/TorFAQ>Tor 
                      Wiki FAQ<span> Tor Wiki Frequently Asked Questions.</span></a> </li>
                    <li><a href=https://wiki.torproject.org/noreply/TheOnionRouter/TorFAQ#GoogleSpyware>Tor 
                      & Google<span> Why does Google report that my machine is infected with spyware?</span></a> </li>
                    <li><a href=https://wiki.torproject.org/noreply/TheOnionRouter/SupportPrograms>Support 
                      Programs<span> A list of programs you may wish to use in conjunction with Tor.</span></a> </li>
                  </ul>
                </li>
                <li><a href=irc://irc.oftc.net/tor>IRC 
                  support channel<span> Tor's official IRC support channel [#tor on irc.oftc.net].</span></a></li>
                <li class=first><a href=https://torstatus.kgprog.com/>Tor 
                  Relay Status<span> View status of available Tor nodes.</span></a></li>
                <li><a href=/docs/tor-hidden-service.html>Setup 
                  Hidden Service<span>  How to configure a Tor hidden service.</span></a></li>
                <li><a href=https://wiki.torproject.org/noreply/TheOnionRouter/TorFAQ#AccessHiddenService>View 
                  Hidden Services<span> How to access Tor's hidden services.</span></a> </li>
                <li class=first><a href=/trademark-faq.html>Trademark 
                  FAQ<span> All you need to know about Tor's trademarks.</span></a></li>
              </ul>
            <li title=""><span class=dir>For Relay Operators</span> 
              <ul>
                <li class=first><a href=/docs/tor-doc-relay.html>Running 
                  a Relay<span> How to configure a Tor node.</span></a></li>
                <li><a href=https://wiki.torproject.org/noreply/TheOnionRouter/TorFAQ#DefaultPorts>Default 
                  Exit Ports<span> Tor's default list of permitted exit ports used when running a relay.</span></a> </li>
                <li><a href=https://wiki.torproject.org/noreply/TheOnionRouter/OperationalSecurity>Tor 
                  Relay Security<span> How to run a secure Tor server.</span></a> </li>
                <li><a href=/eff/tor-legal-faq.html>Legal 
                  FAQ<span> Legal guidance for Tor Relay Operators.</span></a> </li>
                <li><a href=/eff/tor-dmca-response.html>DMCA 
                  Response<span> Response template for Tor relay maintainer to ISP.</span></a> </li>
              </ul>
            <li title=""><span class=dir>For Developers</span> 
              <ul>
                <li class=first><a href=https://www.torproject.org/documentation.html.en#Developers>Developer 
                  Help<span> Help for Tor Developers</span></a></li>
                <li><a href=https://svn.torproject.org/svn/tor/trunk/>Browse 
                  SVN<span> Browse Tor's repository</span></a></li>
                <li><a href=http://archives.seul.org/or/cvs/>Tor 
                  SVN Commits<span> List of Tor SVN commits</span></a></li>
                <li><a href=http://cvs.seul.org/viewcvs/viewcvs.cgi/tor/?root=Tor>View 
                  Tor's Source<span> View Tor's source code</span></a></li>
                <li><a href=https://bugs.torproject.org>Tor 
                  Bug Tracker<span> Review and report Tor bugs here.</span></a></li>
                <li><a href=http://archives.seul.org/or/dev/>Dev's 
                  Mailing List<span> Low volume Tor developer mailing list.</span></a></li>
              </ul>
            <li><span class=dir>Technical 
              Docs</span> 
              <ul>
                <li class=first><a href=/tor-manual.html>Tor 
                  Manual<span> Concise Tor instruction manual (man pages).</span></a> 
                <li><a href=/tor-manual-dev.html>Tor 
                  Dev Manual<span> Manual for development (unstable) version of Tor.</span></a></li>
                <li><span class=dir>Specifications</span> 
                  <ul>
                    <li class=first><a href=https://svn.torproject.org/svn/tor/trunk/doc/spec/tor-spec.txt>Tor 
                      Specification<span> Main Tor specification document.</span></a></li>
                    <li><a href=https://svn.torproject.org/svn/tor/trunk/doc/spec/dir-spec.txt>Directory 
                      Spec. (v3)<span> Tor version 3 directory server specification.</span></a></li>
                    <li><a href=https://svn.torproject.org/svn/tor/trunk/doc/spec/control-spec.txt>Control 
                      Protocol Spec.<span> Tor control protocol specification.</span></a></li>
                    <li><a href=https://svn.torproject.org/svn/tor/trunk/doc/spec/rend-spec.txt>Rendezvous 
                      Spec.<span> Tor rendezvous specification.</span></a></li>
                    <li><a href=https://svn.torproject.org/svn/tor/trunk/doc/spec/path-spec.txt>Path 
                      Selection Spec.<span> Tor path selection specification.</span></a></li>
                    <li><a href=https://svn.torproject.org/svn/tor/trunk/doc/spec/address-spec.txt>Address 
                      Spec.<span> Special host names in Tor.</span></a></li>
                    <li><a href=https://svn.torproject.org/svn/tor/trunk/doc/spec/socks-extensions.txt>SOCKS 
                      Support<span> Tor's SOCKS support and extensions.</span></a></li>
                    <li><a href=https://svn.torproject.org/svn/tor/trunk/doc/spec/version-spec.txt>Version 
                      Spec.<span> How Tor's version numbers work.</span></a></li>
                    <li><a href=https://svn.torproject.org/svn/tor/trunk/doc/spec/proposals/>Proposals<span> In-progress drafts of new specifications and proposed changes.</span></a></li>
                  </ul>
                <li class=design><a href=https://svn.torproject.org/svn/tor/trunk/doc/design-paper/tor-design.html>Tor 
                  Design<span> Justifications and design considerations for Tor.</span></a></li>
                <li><a href=https://svn.torproject.org/svn/tor/trunk/doc/design-paper/blocking.html>Defeating 
                  Tor blocks<span> Design of a blocking-resistant anonymity system (draft).</span></a></li>
                <li><a href=https://svn.torproject.org/svn/tor/trunk/doc/contrib/torel-design.txt>Tor 
                  DNSEL Design<span> Document detailing proposal for the design for a DNS Exit List (DNSEL) for Tor exit nodes.</span></a></li>
                <li><a href=http://freehaven.net/anonbib/>Anonymity 
                  Docs<span> Selected Papers in Anonymity.</span></a></li>
              </ul>
            <li class=first><a href=/faq>Tor 
              FAQ<span> Frequently asked questions relating to Tor. (See also: Wiki FAQ).</span></a></li>
            <li><span class=dir>Mailing Lists</span> 
              <ul>
                <li class=first><a href=http://archives.seul.org/or/talk/>Or-Talk<span> Tor's general purpose list for discussion of Tor and support.</span></a> 
                </li>
                <li><a href=http://archives.seul.org/or/announce/>Or-Announce<span> Tor's low volume announce list detailing new versions and security fixes.</span></a> 
                </li>
                <li><a href=http://archives.seul.org/or/dev/>Or-Dev<span> Tor's low volume developer list.</span></a> 
                </li>
              </ul>
            </li>
            <li><span class=dir>Abuse</span> 
              <ul>
                <li><a href=/faq-abuse.html>Abuse 
                  FAQ<span> How can Tor be abused, and what can I do to protect myself?</span></a> </li>
                <li><a href=https://www.torproject.org/faq-abuse.html.en#Bans>Blocking 
                  Tor<span> How do I block Tor access to my network or server?</span></a> </li>
                <li><a href=https://www.torproject.org/faq-abuse.html.en#WhatAboutSpammers>Tor 
                  and Spam<span> Why Tor isn't the best tool for spammers.</span></a> </li>
                <li><a href=https://check.torproject.org/cgi-bin/TorBulkExitList.py>Exit 
                  List Generator<span> Creates an IP list of active Tor nodes.</span></a></li>
                <li><a href=/tordnsel/>Tor 
                  DNSEL<span> Tor DNS Exit List (DNSEL) is an active testing, DNS-based list of Tor exit nodes.</span></a></li>
              </ul>
            <li><a href=/contact.html>Contact<span> Get in touch with Tor!</span></a> 
            </li>
          </ul>
        </li>
        <li class=first><a href=/projects/ class=dir>Projects <img src="/images/navdropdownarrow.png" class="flyout"><span>The 
          Tor Project&nbsp;&raquo;&nbsp;Associated applications and projects.</span></a> 
          <ul>
            <li class=first><a href=/projects/google.html>Auto-update<span> Secure auto-update for Tor, sponsored by Google.</span></a> 
            </li>
            <li><a href=/torbrowser/>Browser 
              Bundle<span> Tor Browser Bundle (TBB) is a self-contained pre-configured Tor bundle with Firefox and Pidgin Instant Messenger for Windows.</span></a> </li>
            <li><a href=/projects/hidserv.html>Hidden 
              Services<span> Improving the performance of Tor Hidden Services.</span></a> </li>
            <li><a href="http://www.
browseanonymouslyanywhere.com/incognito/">Incognito<span> Incognito is an open source LiveDistro based on Gentoo Linux assisting you to securely and anonymously use the Internet almost anywhere you go.</span></a> 
            </li>
            <li><a href=/projects/lowbandwidth.html>Low-bandwidth<span> Enhancing performance of Tor over low bandwidth connections.</span></a></li>
            <li><a href=/projects/metrics.html>Metrics<span> Measuring performance of the Tor network.</span></a> 
            </li>
            <li><a href=http://portabletor.sourceforge.net/>PortableTor <span> A ready to run Tor for Windows, suitable for use on systems where installation isn't possible (eg netcafes, public libraries etc).</span></a> 
            </li>
            <li><a href=http://fscked.org/projects/torflow>TorFlow<span> TorFlow is a set of python scripts written to scan the Tor network for misbehaving, misconfigured, and overloaded Tor nodes.</span></a></li>
            <li><a href=/torbutton/>Torbutton<span> Torbutton addon provides security enhancements to the Firefox web browser when in conjunction with Tor.</span></a> 
            </li>
            <li><a href=http://www.anonymityanywhere.com/tork/>TorK<span> A Linux/KDE based gui controller for Tor. Single-click configuration for many apps, anonymous mail, configuration of Tor relays and hidden service etc.</span></a> 
            </li>
            <li><a href=/torvm/>TorVM<span> TorVM is a virtual machine based on Qemu that acts as a transparent network proxy, enabling a more robust and secure Tor configuration for clients and relays.</span></a> 
            </li>
            <li><a href=http://vidalia-project.net>Vidalia<span> Vidalia is cross platform gui controller for Tor. Available for Windows, OS X, Linux/Unix/BSD.</span></a> 
            </li>
          </ul>
        </li>
        <li id=contribute><a href=/volunteer.html class=dir>Contribute <img src="/images/navdropdownarrow.png" class="flyout"><span> 
          The Tor Project&nbsp;&raquo;&nbsp;Get involved with the project!</span></a> 
          <ul>
            <li class=first><a href=/docs/tor-doc-relay.html>Run 
              a Relay<span> Run a relay and help the network.</span></a> </li>
            <li><a href=/donate.html>Donate<span> Help the Tor project grow!</span></a> 
            </li>
            <li><a href=/translation.html>Translate<span> Help translate Tor into your language. Arabic and Farsi urgently needed</span></a> 
            </li>
            <li><a href=/volunteer.html#Projects>Develop<span> Help with Tor's code and developing companion applications.</span></a> 
            </li>
            <li><a href=/volunteer.html#Documentation>Document<span> Help write documentation and improve existing information.</span></a> 
            </li>
            <li><a href=/volunteer.html#Advocacy.>Promote 
              Tor<span> Help promote Tor in your area!</span></a> 
          </ul>
        </li>
        <li id=download><a href=/easy-download.html class=dir>Download <img src="/images/navdropdownarrow.png" class="flyout"><span> 
          The Tor Project&nbsp;&raquo;&nbsp;Download Tor for your platform!</span></a> 
          <ul>
            <li class=first><a href=/easy-download.html>Windows 
              Bundle<span> Bundle installer for Windows systems. (Contains Tor, Vidalia, Privoxy & Torbutton).</span></a></li>
            <li><a href=/torbrowser/>Browser 
              Bundle<span> Zero-install pre-configured Tor bundle with Firefox and Pidgin Instant Messenger for Windows.</span></a> </li>
            <li><a href=/easy-download.html>OS 
              X Bundle<span> Apple OS X installer. (Contains Tor, Vidalia, Polipo & Torbutton).</span></a> </li>
            <li><a href=/download-unix.html>Unix 
              & Linux<span> Downloads for various Unix & Linux distributions.</span></a></li>
            <li><a href=/download.html>Advanced<span> Downloads page for advanced users. Stable and development builds and bundles.</span></a> 
            </li>
          </ul>
        </li></li>
        <li id=languages><a href=https://translation.torproject.org class=dir title="Choose the language for this document."><img src=/images/flag.png alt="Language" class="flag"> 
          <img src="/images/navdropdownarrow.png" class="flyout"><span> The Tor 
          Project&nbsp;&raquo;&nbsp;Choose the language for this page.</span></a> 
          <ul>
            <li><a class=fade href=#><img src=/images/flags/cn.png>&nbsp;&#20013;&#25991;(&#31616;) 
              (Chinese)</a> </li>
            <li><a class=fade href=#><img src=/images/flags/de.png>&nbsp;Deutsch</a> 
            </li>
            <li><a class=fade href=#><img src=/images/flags/gb.png>&nbsp;English</a> 
            </li>
            <li><a class=fade href=#><img src=/images/flags/es.png>&nbsp;Espa&ntilde;ol</a> 
            </li>
            <li><a class=fade href=#><img src=/images/flags/ir.png>&nbsp;&#1601;&#1575;&#1585;&#1587;&#1740; 
              (F&#257;rs&#299;)</a> </li>
            <li><a class=fade href=#><img src=/images/flags/fr.png>&nbsp;Fran&ccedil;ais</a> 
            </li>
            <li><a class=fade href=#><img src=/images/flags/kn.png>&nbsp;&#54620;&#44397;&#50612;&nbsp;(Hangul)</a> 
            </li>
            <li><a class=fade href=#><img src=/images/flags/it.png>&nbsp;Italiano</a> 
            </li>
            <li><a class=fade href=#><img src=/images/flags/nl.png>&nbsp;Nederlands</a> 
            </li>
            <li><a class=fade href=#><img src=/images/flags/no.png>&nbsp;Norsk</a> 
            </li>
            <li><a class=fade href=#><img src=/images/flags/jp.png>&nbsp;&#26085;&#26412;&#35486;&nbsp;(Nihongo)</a> 
            </li>
            <li><a class=fade href=#><img src=/images/flags/pl.png>&nbsp;Polski</a> 
            </li>
            <li><a class=fade href=#><img src=/images/flags/pt.png>&nbsp;Portugu&ecirc;s</a> 
            </li>
            <li><a class=fade href=#><img src=/images/flags/ru.png>&nbsp;&#1056;&#1091;&#1089;&#1089;&#1082;&#1080;&#1081;&nbsp;(Russkij)</a> 
            </li>
            <li><a class=fade href=#><img src=/images/flags/pt.png>&nbsp;Suomi</a> 
            </li>
            <li><a class=fade href=#><img src=/images/flags/se.png>&nbsp;Svenska</a> 
            </li>
            <li><a class=fade href=#><img src=/images/flags/tr.png>&nbsp;T&uuml;rk&ccedil;e</a></li>
          </ul>
        </li></li>
        
      </ul></ul>
      </td>
    <td align=center valign=middle class=banner-right></td>
  </tr>
</table>
