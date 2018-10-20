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

[Home » ](../index.html.en) [About » ](../about/overview.html.en)

## Tor: Overview

### Topics

  * [Overview](../about/overview.html.en#overview)
  * [Why we need Tor](../about/overview.html.en#whyweneedtor)
  * [The Solution](../about/overview.html.en#thesolution)
  * [Staying anonymous](../about/overview.html.en#stayinganonymous)
  * [The future of Tor](../about/overview.html.en#thefutureoftor)

* * *

### Overview

A two-minute video explaining what Tor is and how it works. This video is
available for [download](https://media.torproject

	.org/video/2015-03-animation/) and streaming both on Tor Project [website](https://blog.torproject.org/blog/
	releasing-tor-animation) and via [ YouTube](https://www
	.youtube.com/playlist?list=PLwyU2dZ3LJErtu3GGElIa7VyORE2B6H1H) in many different languages. 

The Tor network is a group of
[volunteer](../getinvolved/volunteer.html.en)-operated servers that allows
people to improve their privacy and security on the Internet. Tor's users
employ this network by connecting through a series of virtual tunnels rather
than making a direct connection, thus allowing both organizations and
individuals to share information over public networks without compromising
their privacy. Along the same line, Tor is an effective censorship
circumvention tool, allowing its users to reach otherwise blocked destinations
or content. Tor can also be used as a building block for software developers
to create new communication tools with built-in privacy features.

Individuals use Tor to keep websites from tracking them and their family
members, or to connect to news sites, instant messaging services, or the like
when these are blocked by their local Internet providers. Tor's [onion
services](../docs/onion-services.html.en) let users publish web sites and
other services without needing to reveal the location of the site. Individuals
also use Tor for socially sensitive communication: chat rooms and web forums
for rape and abuse survivors, or people with illnesses.

Journalists use Tor to communicate more safely with whistleblowers and
dissidents. Non-governmental organizations (NGOs) use Tor to allow their
workers to connect to their home website while they're in a foreign country,
without notifying everybody nearby that they're working with that
organization.

Groups such as Indymedia recommend Tor for safeguarding their members' online
privacy and security. Activist groups like the Electronic Frontier Foundation
(EFF) recommend Tor as a mechanism for maintaining civil liberties online.
Corporations use Tor as a safe way to conduct competitive analysis, and to
protect sensitive procurement patterns from eavesdroppers. They also use it to
replace traditional VPNs, which reveal the exact amount and timing of
communication. Which locations have employees working late? Which locations
have employees consulting job-hunting websites? Which research divisions are
communicating with the company's patent lawyers?

A branch of the U.S. Navy uses Tor for open source intelligence gathering, and
one of its teams used Tor while deployed in the Middle East recently. Law
enforcement uses Tor for visiting or surveilling web sites without leaving
government IP addresses in their web logs, and for security during sting
operations.

The variety of people who use Tor is actually [part of what makes it so
secure](http://freehaven.net/doc/fc03/econymics.pdf). Tor hides you among [the
other users on the network](../about/torusers.html.en), so the more populous
and diverse the user base for Tor is, the more your anonymity will be
protected.

### Why we need Tor

Using Tor protects you against a common form of Internet surveillance known as
"traffic analysis." Traffic analysis can be used to infer who is talking to
whom over a public network. Knowing the source and destination of your
Internet traffic allows others to track your behavior and interests. This can
impact your checkbook if, for example, an e-commerce site uses price
discrimination based on your country or institution of origin. It can even
threaten your job and physical safety by revealing who and where you are. For
example, if you're travelling abroad and you connect to your employer's
computers to check or send mail, you can inadvertently reveal your national
origin and professional affiliation to anyone observing the network, even if
the connection is encrypted.

How does traffic analysis work? Internet data packets have two parts: a data
payload and a header used for routing. The data payload is whatever is being
sent, whether that's an email message, a web page, or an audio file. Even if
you encrypt the data payload of your communications, traffic analysis still
reveals a great deal about what you're doing and, possibly, what you're
saying. That's because it focuses on the header, which discloses source,
destination, size, timing, and so on.

A basic problem for the privacy minded is that the recipient of your
communications can see that you sent it by looking at headers. So can
authorized intermediaries like Internet service providers, and sometimes
unauthorized intermediaries as well. A very simple form of traffic analysis
might involve sitting somewhere between sender and recipient on the network,
looking at headers.

But there are also more powerful kinds of traffic analysis. Some attackers spy
on multiple parts of the Internet and use sophisticated statistical techniques
to track the communications patterns of many different organizations and
individuals. Encryption does not help against these attackers, since it only
hides the content of Internet traffic, not the headers.

### The solution: a distributed, anonymous network

![How Tor works](../images/htw1.png)

Tor helps to reduce the risks of both simple and sophisticated traffic
analysis by distributing your transactions over several places on the
Internet, so no single point can link you to your destination. The idea is
similar to using a twisty, hard-to-follow route in order to throw off somebody
who is tailing you -- and then periodically erasing your footprints. Instead
of taking a direct route from source to destination, data packets on the Tor
network take a random pathway through several relays that cover your tracks so
no observer at any single point can tell where the data came from or where
it's going.

To create a private network pathway with Tor, the user's software or client
incrementally builds a circuit of encrypted connections through relays on the
network. The circuit is extended one hop at a time, and each relay along the
way knows only which relay gave it data and which relay it is giving data to.
No individual relay ever knows the complete path that a data packet has taken.
The client negotiates a separate set of encryption keys for each hop along the
circuit to ensure that each hop can't trace these connections as they pass
through.

![Tor circuit step two](../images/htw2.png)

Once a circuit has been established, many kinds of data can be exchanged and
several different sorts of software applications can be deployed over the Tor
network. Because each relay sees no more than one hop in the circuit, neither
an eavesdropper nor a compromised relay can use traffic analysis to link the
connection's source and destination. Tor only works for TCP streams and can be
used by any application with SOCKS support.

For efficiency, the Tor software uses the same circuit for connections that
happen within the same ten minutes or so. Later requests are given a new
circuit, to keep people from linking your earlier actions to the new ones.

![Tor circuit step three](../images/htw3.png)

### Staying anonymous

Tor can't solve all anonymity problems. It focuses only on protecting the
transport of data. You need to use protocol-specific support software if you
don't want the sites you visit to see your identifying information. For
example, you can use [Tor Browser](../projects/torbrowser.html.en) while
browsing the web to withhold some information about your computer's
configuration.

Also, to protect your anonymity, be smart. Don't provide your name or other
revealing information in web forms. Be aware that, like all anonymizing
networks that are fast enough for web browsing, Tor does not provide
protection against end-to-end timing attacks: If your attacker can watch the
traffic coming out of your computer, and also the traffic arriving at your
chosen destination, he can use statistical analysis to discover that they are
part of the same circuit.

### The future of Tor

Providing a usable anonymizing network on the Internet today is an ongoing
challenge. We want software that meets users' needs. We also want to keep the
network up and running in a way that handles as many users as possible.
Security and usability don't have to be at odds: As Tor's usability increases,
it will attract more users, which will increase the possible sources and
destinations of each communication, thus increasing security for everyone.
We're making progress, but we need your help. Please consider [running a
relay](../docs/tor-doc-relay.html.en) or
[volunteering](../getinvolved/volunteer.html.en) as a
[developer](../docs/documentation.html.en#Developers).

Ongoing trends in law, policy, and technology threaten anonymity as never
before, undermining our ability to speak and read freely online. These trends
also undermine national security and critical infrastructure by making
communication among individuals, organizations, corporations, and governments
more vulnerable to analysis. Each new user and relay provides additional
diversity, enhancing Tor's ability to put control over your security and
privacy back into your hands.

  * [Tor Overview](../about/overview.html.en)
  * [Users of Tor](../about/torusers.html.en)
  * [Tor People](../about/corepeople.html.en)
  * [Jobs](../about/jobs.html.en)
  * [Sponsors](../about/sponsors.html.en)
  * [Financial Reports](../about/financials.html.en)
  * [Projects](../projects/projects.html.en)
  * [Documentation](../docs/documentation.html.en)

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

