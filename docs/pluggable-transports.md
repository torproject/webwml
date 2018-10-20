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
[Pluggable Transports](../docs/pluggable-transports.html.en)

# Tor: Pluggable Transports

* * *

### Sometimes the Tor network is censored, and you can't connect to it.

  

An increasing number of censoring countries are using Deep Packet Inspection
(DPI) to classify Internet traffic flows by protocol. While Tor uses [bridge
relays](../docs/bridges.html.en) to get around a censor that blocks by IP
address, the censor can use DPI to recognize and filter Tor traffic flows even
when they connect to unexpected IP addresses.

### Pluggable Transports help you bypass censorship against Tor.

  

Pluggable Transports (PT) transform the Tor traffic flow between the client
and the bridge. This way, censors who monitor traffic between the client and
the bridge will see innocent-looking transformed traffic instead of the actual
Tor traffic. External programs can talk to Tor clients and Tor bridges using
the [pluggable transport
API](https://gitweb.torproject.org/torspec.git/tree/pt-spec.txt), to make it
easier to build interoperable programs.

### Learn more:

  

  * How to use a Pluggable Transport
  * How to become a PT bridge operator
  * How to become a PT developer
  * List of PTs organized by their status

  

* * *

## How to use PTs to bypass censorship

If connections to the Tor network are being blocked by your ISP or country,
follow these instructions:

[ ![How to use PTs: 1-download tor \(send email to gettor@torproject.org\); 2
select configure 3; check my isp blocks tor option; 4 select obfs4; 5 press
connect](../images/PT/2016-07-how-to-use-PT.png)](../images/PT/2016-07-how-to-
use-PT.png)  
  

* * *

## Become a PT bridge operator:

### How to run PTs to help censored users

  

Anyone can set up a PT bridge server and help provide bandwidth to users who
needs it. Once you set up a transport type, your bridge will automatically
advertise support for the transport in its descriptor.

**obfs4** is currently the most effective transport to bypass censorship. We
are asking volunteers to run bridges for it.  
To learn how to run this transport, please visit the [obfs4proxy wiki
page](https://trac.torproject.org/projects/tor/wiki/doc/PluggableTransports/obfs4proxy).

[Go to our
wiki](https://trac.torproject.org/projects/tor/wiki/doc/PluggableTransports#BecomeaPTbridgeoperator)
to learn how to set up other types of PTs.

* * *

## Become a PT developer:

The links below are the main documentation for PT developers

  * [Guidelines for deploying Pluggable Transports on Tor Browser](https://trac.torproject.org/projects/tor/wiki/doc/PluggableTransports/GuidelinesForDeployingPTs)
  * [PT technical spec](https://gitweb.torproject.org/torspec.git/tree/pt-spec.txt)
  * [Pluggable Transports Evaluation Criteria](https://trac.torproject.org/projects/tor/wiki/doc/PluggableTransports/PTEvaluationCriteria)

[Our
wiki](https://trac.torproject.org/projects/tor/wiki/doc/PluggableTransports)
is also a great source of information, such as how to [get in touch with the
community](https://trac.torproject.org/projects/tor/wiki/doc/PluggableTransports#Waystofollowandjointheconversation),
[ideas for new
PTs](https://trac.torproject.org/projects/tor/wiki/doc/PluggableTransports/ideas),
how to [help with PTs already
deployed](https://trac.torproject.org/projects/tor/wiki/doc/PluggableTransports/WorkListForDevsToHelpOutWith)
and much more.

* * *

## List of PTs organized by status:

### Currently deployed PTs

These Pluggable Transports are currently deployed in Tor Browser, and you can
start using them by [downloading and using Tor Browser](../download/download-
easy.html.en).

  * [**obfs4**](https://github.com/Yawning/obfs4/blob/master/doc/obfs4-spec.txt)
    * **Description:** Is a transport with the same features as [**ScrambleSuit**](http://www.cs.kau.se/philwint/scramblesuit/) but utilizing Dan Bernstein's [elligator2**](http://elligator.cr.yp.to/elligator-20130828.pdf) technique for public key obfuscation, and the [ntor protocol](https://gitweb.torproject.org/torspec.git/tree/proposals/216-ntor-handshake.txt) for one-way authentication. This results in a faster protocol.
    * **Language:** Go
    * **Maintainer:** Yawning Angel
    * **Evaluation:** [obfs4 Evaluation](https://trac.torproject.org/projects/tor/wiki/doc/PluggableTransports/Obfs4Evaluation)
  * [**meek**](https://trac.torproject.org/projects/tor/wiki/doc/meek)
    * **Description:** Is a transport that uses HTTP for carrying bytes and TLS for obfuscation. Traffic is relayed through a third-party server (Google App Engine). It uses a trick to talk to the third party so that it looks like it is talking to an unblocked server.
    * **Language:** Go
    * **Maintainer:** David Fifield
    * **Evaluation:** [meek Evaluation](https://trac.torproject.org/projects/tor/wiki/doc/PluggableTransports/MeekEvaluation)
  * [**Format-Transforming Encryption**](https://fteproxy.org/) (FTE)
    * **Description:** It transforms Tor traffic to arbitrary formats using their language descriptions. See the [research paper](https://kpdyer.com/publications/ccs2013-fte.pdf).
    * **Language:** Python/C++
    * **Maintainer:** Kevin Dyer
    * **Evaluation:** [FTE Evaluation](https://trac.torproject.org/projects/tor/wiki/doc/PluggableTransports/FteEvaluation)
  * [**ScrambleSuit**](http://www.cs.kau.se/philwint/scramblesuit/)
    * **Description:** Is a pluggable transport that protects against follow-up probing attacks and is also capable of changing its network fingerprint (packet length distribution, inter-arrival times, etc.).
    * **Language:** Python
    * **Maintainer:** Philipp Winter
    * **Evaluation:** [ ScrambleSuit Evaluation](https://trac.torproject.org/projects/tor/wiki/doc/PluggableTransports/ScrambleSuitEvaluation)

### Undeployed PTs

  

  * **StegoTorus**
    * **Description:** is an Obfsproxy fork that extends it to a) split Tor streams across multiple connections to avoid packet size signatures, and b) embed the traffic flows in traces that look like HTML, JavasCript, or PDF. See its [git repository](https://gitweb.torproject.org/stegotorus.git).
    * **Language:** C++
    * **Maintainer:** Zack Weinberg
    * **Evaluation:** none
  * **SkypeMorph**
    * **Description:** It transforms Tor traffic flows so they look like Skype Video. See its [source code](http://crysp.uwaterloo.ca/software/SkypeMorph-0.5.1.tar.gz) and [design paper](http://cacr.uwaterloo.ca/techreports/2012/cacr2012-08.pdf).
    * **Language:**
    * **Maintainer:** Ian Goldberg.
    * **Evaluation:** none
  * **Dust**
    * **Description:** It aims to provide a packet-based (rather than connection-based) DPI-resistant protocol. See its [git repository](https://github.com/blanu/Dust).
    * **Language:** Python
    * **Maintainer:** Brandon Wiley.
    * **Evaluation:** none

  
  

Our goal is to have a wide variety of Pluggable Transport designs. You can
check out a [full list of Pluggables Transports
here](https://trac.torproject.org/projects/tor/wiki/doc/PluggableTransports/list).

Many are at the research phase now, so it's a perfect time to play with them
or suggest new designs. Please let us know if you find or start other projects
that could be useful for making Tor's traffic flows more DPI-resistant!

  * [Documentation Overview](../docs/documentation.html.en)
  * [Install Tor Browser](../projects/torbrowser.html.en)
  * [Tor on Android](https://guardianproject.info/apps/orbot/)
  * [Other Tor software](../projects/projects.html.en)
  * [Expert guides](../docs/installguide.html.en)
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

