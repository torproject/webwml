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
[Mac OS X Client](../docs/tor-doc-osx.html.en)

# Running Tor on Mac OS X

  

## These are advanced installation instructions for running Tor in a command
line. The recommended way to use Tor is to simply download the [Tor
Browser](../projects/torbrowser.html.en) and you are done.

Even though Tor Browser comes with a regular Tor, it will only run as long as
you keep Tor Browser open. The following instructions will set up Tor without
graphical interface or a browser. Many people prefer this over TBB when they
host onion services or relay traffic for other Tor users.

* * *

## Step One: Install a package manager

  

There are two package manager on OS X: Homebrew and Macports. You can use the
package manager of your choice.

To install Homebrew follow the instructions on [brew.sh](https://brew.sh/).

To install Macports follow the instructions on
[macports.org/install.php](https://www.macports.org/install.php).

* * *

## Step Two: Install Tor

  

If you are using Homebrew in a Terminal window, run:

    
    
    brew install tor

You will find a sample Tor configuration file at
`/usr/local/etc/tor/torrc.sample`. Remove the .sample extension to make it
effective.

If you are using Macports in a Terminal window, run:

    
    
    sudo port install tor

You will find a sample Tor configuration file at
`/opt/local/etc/tor/torrc.sample`. Remove the .sample extension to make it
effective.

* * *

## Step Three: Configure your application to use Tor

To use SOCKS directly (for instant messaging, Jabber, IRC, etc), you can point
your application directly at Tor (localhost port 9050), but see [this FAQ
entry](https://trac.torproject.org/projects/tor/wiki/doc/TorFAQ#SOCKSAndDNS)
for why this may be dangerous. For applications that support neither SOCKS nor
HTTP, take a look at [socat](http://www.dest-unreach.org/socat/).

For information on how to Torify other applications, check out the [Torify
HOWTO](https://trac.torproject.org/projects/tor/wiki/doc/TorifyHOWTO).

If you have a personal firewall that limits your computer's ability to connect
to itself, be sure to allow connections from your local applications to local
port 9050. If your firewall blocks outgoing connections, punch a hole so it
can connect to at least TCP ports 80 and 443, and then see [this FAQ
entry](https://trac.torproject.org/projects/tor/wiki/doc/TorFAQ#FirewalledClient).

If it's still not working, look at [this FAQ
entry](../docs/faq.html.en#DoesntWork) for hints.

Once it's working, learn more about [what Tor does and does not
offer](../download/download.html.en#Warning).

* * *

## Configure Tor as a relay

  

The Tor network relies on volunteers to donate bandwidth. If you want to help
**make the Tor network faster** , please consider [running a
relay](../docs/tor-doc-relay.html.en).

* * *

## How to uninstall Tor

  

Change your application proxy settings back to their original values. If you
just want to stop using Tor, you can end at this point.

If you want to completely remove Tor, type into a Terminal window:

    
    
    sudo port uninstall tor

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

