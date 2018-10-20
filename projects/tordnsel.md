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

[Home » ](../index.html.en) [Projects » ](../projects/projects.html.en)
[TorDNSEL](../projects/tordnsel.html.en)

# The public TorDNSEL service

## What is the TorDNSEL?

TorDNSEL is an active testing, DNS-based list of Tor exit nodes. Since Tor
supports exit policies, a network service's Tor exit list is a function of its
IP address and port. Unlike with traditional DNSxLs, services need to provide
that information in their queries.

Previous DNSELs scraped Tor's network directory for exit node IP addresses,
but this method fails to list nodes that don't advertise their exit address in
the directory. TorDNSEL actively tests through these nodes to provide a more
accurate list.

The full background and rationale for TorDNSEL is described in the official
[design document](https://gitweb.torproject.org/tordnsel.git/tree/doc/torel-
design.txt). The current service only supports the first query type mentioned
in that document.

## How can I query the public TorDNSEL service?

Using the command line tool dig, users can ask type 1 queries like so:

    
    
    dig 209.137.169.81.6667.4.3.2.1.ip-port.exitlist.torproject.org

## What do the received answers mean?

A request for the A record "209.137.169.81.6667.4.3.2.1.ip-
port.exitlist.torproject.org" would return 127.0.0.2 if there's a Tor node
that can exit through 81.169.137.209 to port 6667 at 1.2.3.4. If there isn't
such an exit node, the DNSEL returns NXDOMAIN.

Other A records inside net 127/8, except 127.0.0.1, are reserved for future
use and should be interpreted by clients as indicating an exit node. Queries
outside the DNSEL's zone of authority result in REFUSED. Ill-formed queries
inside its zone of authority result in NXDOMAIN.

## How do I configure software with DNSBL support?

Users of software with built-in support for DNSBLs can configure the following
zone as a DNSBL:

    
    
    [service port].[reversed service
        address].ip-port.exitlist.torproject.org

An example for an IRC server running on port 6667 at IP address 1.2.3.4:

    
    
    6667.4.3.2.1.ip-port.exitlist.torproject.org

## How reliable are the answers returned by TorDNSEL?

The current public service is operating on an experimental basis and hasn't
been well tested by real services. Reports of erroneous answers or service
interruption would be appreciated. Future plans include building a fault
tolerant pool of DNSEL servers. TorDNSEL is currently under active
development.

## How can I run my own private TorDNSEL?

You can learn all about the code for TorDNSEL by visiting the [official onion
service](http://p56soo2ibjkx23xo.onion/) through Tor.

You can download the latest source release from the [onion
service](http://p56soo2ibjkx23xo.onion/dist/tordnsel-0.0.6.tar.gz) or from a [
local mirror](/tordnsel/dist/tordnsel-0.0.6.tar.gz). It's probably wise to
check out the current revision from the darcs repository hosted on the
aforementioned onion service.

For more information or to report something useful, please email the
`tordnsel` alias on our [contact page](../about/contact.html.en).

  * [Software & Services](../projects/projects.html.en)

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

