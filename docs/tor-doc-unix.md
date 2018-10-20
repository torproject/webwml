# [Tor](../index.html.en)

  * [Home](../index.html.en)
  * [About Tor](../about/overview.html.en)
  * [Documentation](../docs/documentation.html.en)
  * [Press](../press/press.html.en)
  * [Blog](https://blog.torproject.org/blog/)
  * [Newsletter](https://newsletter.torproject.org)
  * [Contact](../about/contact.html.en)

  * [Download](../download/download-easy.html.en)
  * [Volunteer](../getinvolved/volunteer.html.en)
  * [Donate](../donate/donate-button.html.en)

[Home » ](../index.html.en) [Documentation » ](../docs/documentation.html.en)
[Linux Client](../docs/tor-doc-unix.html.en)

# Running the [Tor](../index.html.en) client on Linux

  

## Note that these are the installation instructions for running a Tor client.
The easiest way to do this is to simply download [Tor
Browser](../projects/torbrowser.html.en) and you are done.

* * *

## Step One: Download and Install Tor

  

The latest release of Tor can be found on the
[download](../download/download.html.en) page. We have packages for Debian,
Red Hat, Gentoo, etc there too. If you're using Ubuntu, don't use the default
packages: use [our deb repository](../docs/debian.html.en#ubuntu) instead.

If you're building from source, first install
[libevent](http://www.monkey.org/~provos/libevent/), and make sure you have
openssl and zlib (including the -devel packages if applicable). Then run:  
`tar xzf tor-0.3.4.8.tar.gz; cd tor-0.3.4.8`  
`./configure && make`  
Now you can run tor as either `src/or/tor` (before 0.3.5.x) or `src/app/tor`
(0.3.5.x and later), or you can run `make install` (as root if necessary) to
install it into /usr/local/, and then you can start it just by running `tor`.

Tor comes configured as a client by default. It uses a built-in default
configuration file, and most people won't need to change any of the settings.
Tor is now installed.

* * *

## Step Two: Configure your applications to use Tor

  

If you want to use Tor for anonymous web browsing, please use [Tor
Browser](../projects/torbrowser.html.en). It comes with readily configured Tor
and a browser patched for better anonymity. To use SOCKS directly (for instant
messaging, Jabber, IRC, etc), you can point your application directly at Tor
(localhost port 9050, or port 9150 for Tor Browser), but see [this FAQ
entry](../docs/faq.html.en#TBBSocksPort) for why this may be dangerous. For
applications that support neither SOCKS nor HTTP, take a look at
[torsocks](https://code.google.com/p/torsocks/) or [socat](http://www.dest-
unreach.org/socat/).

For information on how to Torify other applications, check out the [Torify
HOWTO](https://trac.torproject.org/projects/tor/wiki/doc/TorifyHOWTO).

If you have a personal firewall that limits your computer's ability to connect
to itself (this includes something like SELinux on Fedora Core 4), be sure to
allow connections from your local applications to Tor (local port 9050). If
your firewall blocks outgoing connections, punch a hole so it can connect to
at least TCP ports 80 and 443, and then see [this FAQ
entry](https://trac.torproject.org/projects/tor/wiki/doc/TorFAQ#FirewalledClient).
If your SELinux config is not allowing tor to run correctly, create a file
named booleans.local in the directory /etc/selinux/targeted. Edit this file in
your favorite text editor and insert "allow_ypbind=1". Restart your machine
for this change to take effect.

If it's still not working, look at [this FAQ
entry](../docs/faq.html.en#DoesntWork) for hints.

* * *

## Step Three: Configure it as a relay

  

The Tor network relies on volunteers to donate bandwidth. If you want to help
**make the Tor network faster** , please consider [running a
relay](../docs/tor-doc-relay.html.en).

* * *

If you have suggestions for improving this document, please [send them to
us](../about/contact.html.en). Thanks!

  * [Documentation Overview](../docs/documentation.html.en)
  * [Install Tor Browser](../projects/torbrowser.html.en)
  * [Tor on Android](https://guardianproject.info/apps/orbot/)
  * [Other Tor software](../projects/projects.html.en)
  * [Expert guides](../docs/installguide.html.en)
  *     * [The Tor Relay Guide](https://trac.torproject.org/projects/tor/wiki/TorRelayGuide)
    * [Installing Tor on Debian/Ubuntu](../docs/debian.html.en)
    * [Installing Tor Source](../docs/tor-doc-unix.html.en)
    * [OSX](../docs/tor-doc-osx.html.en)
    * [Configuring an Onion Service](../docs/tor-onion-service.html.en)
    * [Understanding bridges](../docs/bridges.html.en)
    * [Verify package signatures](../docs/verifying-signatures.html.en)
  * [Manuals](../docs/manual.html.en)
  * [Tor Wiki](https://trac.torproject.org/projects/tor/wiki/)
  * [General FAQ](../docs/faq.html.en)
  * [Abuse FAQ](../docs/faq-abuse.html.en)
  * [Trademark FAQ](../docs/trademark-faq.html.en)
  * [Tor Legal FAQ](../eff/tor-legal-faq.html.en)

## Tor Tip

Tor is written for and supported by people like you. [Donate
today](../donate/donate.html.en)!

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

