{ "torbrowserbundle" : "8.0", "torbrowserbundleosx64" : "8.0",
"torbrowserbundlelinux32" : "8.0", "torbrowserbundlelinux64" : "8.0" }

# [Tor](../index.html.en)

  * [Home](../index.html.en)
  * [About Tor](../about/overview.html.en)
  * [Documentation](../docs/documentation.html.en)
  * [Press](../press/press.html.en)
  * [Blog](https://blog.torproject.org/blog/)
  * [Newsletter](https://newsletter.torproject.org)
  * [Contact](../about/contact.html.en)
  * [English](tor.html.en)

  * [Download](../download/download-easy.html.en)
  * [Volunteer](../getinvolved/volunteer.html.en)
  * [Donate](../donate/donate-button.html.en)

[Home » ](../index.html.en)[Download](../download/download.html.en) »
[Tor](../download/tor.html.en)

## Want Tor to really work?

You need to change some of your habits, as some things won't work exactly as
you are used to. Please read the full list of warnings for details.

# Tor Source Tarballs

Build and run with: `./configure && make && src/or/tor`  
See the [Changelog](https://gitweb.torproject.org/tor.git/plain/ChangeLog) for
what's new.

## Stable

[StableVersion 0.3.3.9](../dist/tor-0.3.3.9.tar.gz)

[Release
notes](https://gitweb.torproject.org/tor.git/plain/ReleaseNotes?id=tor-0.3.3.9)
‒ [signature](../dist/tor-0.3.3.9.tar.gz.asc) ‒ [What's
This?](../docs/verifying-signatures.html.en)

[OldstableVersion 0.2.9.16](../dist/tor-0.2.9.16.tar.gz)

[Release
notes](https://gitweb.torproject.org/tor.git/plain/ReleaseNotes<cgitoldstable>)
‒ [signature](../dist/tor-0.2.9.16.tar.gz.asc) ‒ [What's
This?](../docs/verifying-signatures.html.en)

## Unstable

[UnstableVersion 0.3.4.5-rc](../dist/tor-0.3.4.5-rc.tar.gz)

[signature](../dist/tor-0.3.4.5-rc.tar.gz.asc) ‒ [What's
This?](../docs/verifying-signatures.html.en)

[UnstableVersion 0.3.4.6-rc](../dist/tor-0.3.4.6-rc.tar.gz)

[signature](../dist/tor-0.3.4.6-rc.tar.gz.asc) ‒ [What's
This?](../docs/verifying-signatures.html.en)

[UnstableVersion 0.3.4.7-rc](../dist/tor-0.3.4.7-rc.tar.gz)

[signature](../dist/tor-0.3.4.7-rc.tar.gz.asc) ‒ [What's
This?](../docs/verifying-signatures.html.en)

## Source Tarball

Configure with:  
`./configure && make && src/or/tor` (or src/app/tor starting in 0.3.5.x)

The current stable version of Tor is 0.3.3.9. Its [release
notes](https://gitweb.torproject.org/tor.git/plain/ReleaseNotes?id=tor-0.3.3.9)
are available.

The current unstable/alpha version of Tor is 0.3.4.7-rc. Its
[Changelog](https://gitweb.torproject.org/tor.git/plain/ChangeLog) is
available.

[![](../images/btn_donateCC_LG.gif)](../donate/donate-download.html.en)

## What is Tor?

  * [Take the tour](../about/overview.html.en)

## [Other Downloads](../download/download.html.en)

  * [Tor packages](../download/download-unix.html.en)
  * [Tor Browser](../download/download-easy.html.en)
  * [All projects](../projects/projects.html.en)

## Having Trouble?

  * [Read the fine manuals](../docs/documentation.html.en)

## Want Tor to really work?

You need to change some of your habits, as some things won't work exactly as
you are used to.

  1. **Use Tor Browser**

Tor does not protect all of your computer's Internet traffic when you run it.
Tor only protects your applications that are properly configured to send their
Internet traffic through Tor. To avoid problems with Tor configuration, we
strongly recommend you use the [Tor Browser](../projects/torbrowser.html.en).
It is pre-configured to protect your privacy and anonymity on the web as long
as you're browsing with Tor Browser itself. Almost any other web browser
configuration is likely to be unsafe to use with Tor.

  2. **Don't torrent over Tor**

Torrent file-sharing applications have been observed to ignore proxy settings
and make direct connections even when they are told to use Tor. Even if your
torrent application connects only through Tor, you will often send out your
real IP address in the tracker GET request, because that's how torrents work.
Not only do you [ deanonymize your torrent traffic and your other simultaneous
Tor web traffic](https://blog.torproject.org/blog/bittorrent-over-tor-isnt-
good-idea) this way, you also slow down the entire Tor network for everyone
else.

  3. **Don't enable or install browser plugins**

Tor Browser will block browser plugins such as Flash, RealPlayer, Quicktime,
and others: they can be manipulated into revealing your IP address. Similarly,
we do not recommend installing additional addons or plugins into Tor Browser,
as these may bypass Tor or otherwise harm your anonymity and privacy.

  4. **Use HTTPS versions of websites**

Tor will encrypt your traffic [to and within the Tor
network](../about/overview.html.en#thesolution), but the encryption of your
traffic to the final destination website depends upon on that website. To help
ensure private encryption to websites, Tor Browser includes [HTTPS
Everywhere](https://www.eff.org/https-everywhere) to force the use of HTTPS
encryption with major websites that support it. However, you should still
watch the browser URL bar to ensure that websites you provide sensitive
information to display a [blue or green URL bar
button](https://support.mozilla.com/en-US/kb/Site%20Identity%20Button),
include **https://** in the URL, and display the proper expected name for the
website. Also see EFF's interactive page explaining [how Tor and HTTPS
relate](https://www.eff.org/pages/tor-and-https).

  5. **Don't open documents downloaded through Tor while online**

Tor Browser will warn you before automatically opening documents that are
handled by external applications. **DO NOT IGNORE THIS WARNING**. You should
be very careful when downloading documents via Tor (especially DOC and PDF
files, unless you use the PDF viewer that's built into Tor Browser) as these
documents can contain Internet resources that will be downloaded outside of
Tor by the application that opens them. This will reveal your non-Tor IP
address. If you must work with DOC and/or PDF files, we strongly recommend
either using a disconnected computer, downloading the free
[VirtualBox](https://www.virtualbox.org/) and using it with a [virtual machine
image](http://virtualboxes.org/) with networking disabled, or using
[Tails](https://tails.boum.org/). Under no circumstances is it safe to use
[BitTorrent and Tor](https://blog.torproject.org/blog/bittorrent-over-tor-
isnt-good-idea) together, however.

  6. **Use bridges and/or find company**

Tor tries to prevent attackers from learning what destination websites you
connect to. However, by default, it does not prevent somebody watching your
Internet traffic from learning that you're using Tor. If this matters to you,
you can reduce this risk by configuring Tor to use a [Tor bridge
relay](../docs/bridges.html.en) rather than connecting directly to the public
Tor network. Ultimately the best protection is a social approach: the more Tor
users there are near you and the more [diverse](../about/torusers.html.en)
their interests, the less dangerous it will be that you are one of them.
Convince other people to use Tor, too!

  

Be smart and learn more. Understand what Tor does and does not offer. This
list of pitfalls isn't complete, and we need your help [identifying and
documenting all the issues](../getinvolved/volunteer.html.en#Documentation).

![Tor](../images/onion.jpg)

Trademark, copyright notices, and rules for use by third parties can be found
[in our FAQ](../docs/trademark-faq.html.en).

We offer an [onion service](https://www.torproject.org/docs/hidden-services)
for this site: [expyuzz4wqqyqhjn.onion/](http://expyuzz4wqqyqhjn.onion/).  
See <https://onion.torproject.org> for all torproject.org onion addresses.

#### About Tor

  * [What Tor Does](../about/overview.html.en)
  * [Users of Tor](../about/torusers.html.en)
  * [Core Tor People](../about/corepeople.html.en)
  * [Sponsors](../about/sponsors.html.en)
  * [Contact Us](../about/contact.html.en)

#### Get Involved

  * [Donate](../donate/donate-foot.html.en)
  * [Mailing Lists](../docs/documentation.html.en#MailingLists)
  * [Onion Services](../docs/onion-services.html.en)
  * [Translations](../getinvolved/translation.html.en)

#### Documentation

  * [Manuals](../docs/tor-manual.html.en)
  * [Installation Guides](../docs/documentation.html.en)
  * [Tor Wiki](https://trac.torproject.org/projects/tor/wiki/)
  * [General Tor FAQ](../docs/faq.html.en)

[![Internet Defense League](../images/InternetDefenseLeague-footer-
badge.png)](https://internetdefenseleague.org/)

