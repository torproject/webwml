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
[Onion Services](../docs/onion-services.html.en)

## Tor: Onion Service Protocol

* * *

Tor makes it possible for users to hide their locations while offering various
kinds of services, such as web publishing or an instant messaging server.
Using Tor "rendezvous points," other Tor users can connect to these onion
services, formerly known as hidden services, each without knowing the other's
network identity. This page describes the technical details of how this
rendezvous protocol works. For a more direct how-to, see our [configuring
onion services](../docs/tor-onion-service.html.en) page.

An onion service needs to advertise its existence in the Tor network before
clients will be able to contact it. Therefore, the service randomly picks some
relays, builds circuits to them, and asks them to act as _introduction points_
by telling them its public key. Note that in the following figures the green
links are circuits rather than direct connections. By using a full Tor
circuit, it's hard for anyone to associate an introduction point with the
onion server's IP address. While the introduction points and others are told
the onion service's identity (public key), we don't want them to learn about
the onion server's location (IP address).

![Tor onion service step one](../images/tor-onion-services-1.png)

Step two: the onion service assembles an _onion service descriptor_ ,
containing its public key and a summary of each introduction point, and signs
this descriptor with its private key. It uploads that descriptor to a
distributed hash table. The descriptor will be found by clients requesting
XYZ.onion where XYZ is a 16 character name derived from the service's public
key. After this step, the onion service is set up.

Although it might seem impractical to use an automatically-generated service
name, it serves an important goal: Everyone - including the introduction
points, the distributed hash table directory, and of course the clients - can
verify that they are talking to the right onion service. See also [Zooko's
conjecture](https://en.wikipedia.org/wiki/Zooko%27s_triangle) that out of
Decentralized, Secure, and Human-Meaningful, you can achieve at most two.
Perhaps one day somebody will implement a
[Petname](http://www.skyhunter.com/marcs/petnames/IntroPetNames.html) design
for onion service names?

![Tor onion service step two](../images/tor-onion-services-2.png)

Step three: A client that wants to contact an onion service needs to learn
about its onion address first. After that, the client can initiate connection
establishment by downloading the descriptor from the distributed hash table.
If there is a descriptor for XYZ.onion (the onion service could also be
offline or have left long ago, or there could be a typo in the onion address),
the client now knows the set of introduction points and the right public key
to use. Around this time, the client also creates a circuit to another
randomly picked relay and asks it to act as _rendezvous point_ by telling it a
one-time secret.

![Tor onion service step three](../images/tor-onion-services-3.png)

Step four: When the descriptor is present and the rendezvous point is ready,
the client assembles an _introduce_ message (encrypted to the onion service's
public key) including the address of the rendezvous point and the one-time
secret. The client sends this message to one of the introduction points,
requesting it be delivered to the onion service. Again, communication takes
place via a Tor circuit: nobody can relate sending the introduce message to
the client's IP address, so the client remains anonymous.

![Tor onion service step four](../images/tor-onion-services-4.png)

Step five: The onion service decrypts the client's introduce message and finds
the address of the rendezvous point and the one-time secret in it. The service
creates a circuit to the rendezvous point and sends the one-time secret to it
in a rendezvous message.

At this point it is of special importance that the onion service sticks to the
same set of [entry
guards](https://trac.torproject.org/projects/tor/wiki/doc/TorFAQ#Whatsthisaboutentryguardformerlyknownashelpernodes)
when creating new circuits. Otherwise an attacker could run their own relay
and force an onion service to create an arbitrary number of circuits in the
hope that the corrupt relay is picked as entry node and they learn the onion
server's IP address via timing analysis. This attack was described by Øverlier
and Syverson in their paper titled [Locating Hidden
Servers](http://freehaven.net/anonbib/#hs-attack06).

![Tor onion service step five](../images/tor-onion-services-5.png)

In the last step, the rendezvous point notifies the client about successful
connection establishment. After that, both client and onion service can use
their circuits to the rendezvous point for communicating with each other. The
rendezvous point simply relays (end-to-end encrypted) messages from client to
service and vice versa.

One of the reasons for not using the introduction circuit for actual
communication is that no single relay should appear to be responsible for a
given onion service. This is why the rendezvous point never learns about the
onion service's identity.

In general, the complete connection between client and onion service consists
of 6 relays: 3 of them were picked by the client with the third being the
rendezvous point and the other 3 were picked by the onion service.

![Tor onion service step six](../images/tor-onion-services-6.png)

There are more detailed descriptions about the onion service protocol than
this one. See the [Tor design
paper](https://svn.torproject.org/svn/projects/design-paper/tor-design.pdf)
for an in-depth design description and the [rendezvous
specification](https://gitweb.torproject.org/torspec.git/tree/rend-
spec-v3.txt) for the message formats.

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

