<?php
$pagename = "Tor: anonymity online";
include("header.inc.php");
?>
<div class="main-column"> 
  <!-- PUT CONTENT AFTER THIS TAG -->
<a name="overview"></a>
<h2><a class="anchor" href="#overview">Tor: Overview</a></h2>
<!-- BEGIN SIDEBAR -->
<div class="sidebar-left">
<h4>Topics</h4>

&raquo;&nbsp;<a href="overview.html.en#overview">Overview</a><br>
&raquo;&nbsp;<a href="overview.html.en#whyweneedtor">Why we need Tor</a><br>
&raquo;&nbsp;<a href="overview.html.en#thesolution">The Solution</a><br>
&raquo;&nbsp;<a href="overview.html.en#hiddenservices">Hidden services</a><br>
&raquo;&nbsp;<a href="overview.html.en#stayinganonymous">Staying anonymous</a><br>
&raquo;&nbsp;<a href="overview.html.en#thefutureoftor">The future of Tor</a><br>

</div>
<!-- END SIDEBAR -->
<p>
Tor is a network of virtual tunnels that allows people and groups to
improve their privacy and security on the Internet. It also enables
software developers to create new communication tools
with built-in privacy features. Tor provides the foundation for
a range of applications that allow organizations and individuals
to share information over public networks without compromising their
privacy.
</p>
<p>
Individuals use Tor to keep websites from tracking them and their family
members, or to connect to news sites, instant messaging services, or the
like when these are blocked by their local Internet providers. Tor's <a
href="docs/tor-hidden-service.html.en">hidden services</a>
let users publish web sites and other services without needing to reveal
the location of the site. Individuals also use Tor for socially sensitive
communication: chat rooms and web forums for rape and abuse survivors,
or people with illnesses.
</p>
<p>
Journalists use Tor to communicate more safely with whistleblowers and
dissidents. Non-governmental organizations (NGOs) use Tor to allow their
workers to connect to their home website while they're in a foreign
country, without notifying everybody nearby that they're working with
that organization.
</p>
<p>
Groups such as Indymedia recommend Tor for safeguarding their members'
online privacy and security. Activist groups like the Electronic Frontier
Foundation (EFF) recommend Tor as a mechanism for
maintaining civil liberties online. Corporations use Tor as a safe way
to conduct competitive analysis, and to protect sensitive procurement
patterns from eavesdroppers. They also use it to replace traditional
VPNs, which reveal the exact amount and timing of communication. Which
locations have employees working late? Which locations have employees
consulting job-hunting websites? Which research divisions are communicating
with the company's patent lawyers?
</p>
<p>
A branch of the U.S. Navy uses Tor for open source intelligence
gathering, and one of its teams used Tor while deployed in the Middle
East recently. Law enforcement uses Tor for visiting or surveilling
web sites without leaving government IP addresses in their web logs,
and for security during sting operations.
</p>
<p>
The variety of people who use Tor is actually <a
href="http://freehaven.net/doc/fc03/econymics.pdf">part of what makes
it so secure</a>. Tor hides you among <a href="torusers.html.en">the
other users on the network</a>,
so the more populous and diverse the user base for Tor is, the more your
anonymity will be protected.
</p>
<a name="whyweneedtor"></a>
<h3><a class="anchor" href="#whyweneedtor">Why we need Tor</a></h3>
<p>
Using Tor protects you against a common form of Internet surveillance
known as "traffic analysis." Traffic analysis can be used to infer
who is talking to whom over a public network. Knowing the source
and destination of your Internet traffic allows others to track your
behavior and interests. This can impact your checkbook if, for example,
an e-commerce site uses price discrimination based on your country or
institution of origin. It can even threaten your job and physical safety
by revealing who and where you are. For example, if you're travelling
abroad and you connect to your employer's computers to check or send mail,
you can inadvertently reveal your national origin and professional
affiliation to anyone observing the network, even if the connection
is encrypted.
</p>
<p>
How does traffic analysis work? Internet data packets have two parts:
a data payload and a header used for routing. The data payload is
whatever is being sent, whether that's an email message, a web page, or an
audio file. Even if you encrypt the data payload of your communications,
traffic analysis still reveals a great deal about what you're doing and,
possibly, what you're saying. That's because it focuses on the header,
which discloses source, destination, size, timing, and so on.
</p>
<p>
A basic problem for the privacy minded is that the recipient of your
communications can see that you sent it by looking at headers. So can
authorized intermediaries like Internet service providers, and sometimes
unauthorized intermediaries as well. A very simple form of traffic
analysis might involve sitting somewhere between sender and recipient on
the network, looking at headers.
</p>
<p>
But there are also more powerful kinds of traffic analysis. Some
attackers spy on multiple parts of the Internet and use sophisticated
statistical techniques to track the communications patterns of many
different organizations and individuals. Encryption does not help against
these attackers, since it only hides the content of Internet traffic, not
the headers.
</p>
<a name="thesolution"></a>
<h3><a class="anchor" href="#thesolution">The solution: a distributed, anonymous network</a></h3>
<p>
Tor helps to reduce the risks of both simple and sophisticated traffic
analysis by distributing your transactions over several places on the
Internet, so no single point can link you to your destination. The idea
is similar to using a twisty, hard-to-follow route in order to throw off
somebody who is tailing you &mdash; and then periodically erasing your
footprints. Instead of taking a direct route from source to
destination, data packets on the Tor network take a random pathway
through several relays that cover your tracks so no observer at any
single point can tell where the data came from or where it's going.
</p>
<img src="/images/htw1.png" alt="Tor circuit step one" width="510" height="326" class="imagefloat">
<p>
To create a private network pathway with Tor, the user's software or
client incrementally builds a circuit of encrypted connections through
relays on the network. The circuit is extended one hop at a time, and
each relay along the way knows only which relay gave it data and which
relay it is giving data to. No individual relay ever knows the
complete path that a data packet has taken. The client negotiates a
separate set of encryption keys for each hop along the circuit to ensure
that each hop can't trace these connections as they pass through.
</p>
<img src="/images/htw2.png" alt="Tor circuit step two" width="510" height="326" class="imagefloat">
<p>
Once a circuit has been established, many kinds of data can be exchanged
and several different sorts of software applications can be deployed
over the Tor network. Because each relay sees no more than one hop in
the circuit, neither an eavesdropper nor a compromised relay can use
traffic analysis to link the connection's source and destination. Tor
only works for TCP streams and can be used by any application with SOCKS
support.
</p>
<p>
For efficiency, the Tor software uses the same circuit for connections
that happen within the same ten minutes or so. Later requests are given a
new circuit, to keep people from linking your earlier actions to the new
ones.
</p>
<img src="/images/htw3.png" alt="Tor circuit step three" width="510" height="326" class="imagefloat">
<a name="hiddenservices"></a>
<h3><a class="anchor" href="#hiddenservices">Hidden services</a></h3>
<p>
Tor also makes it possible for users to hide their locations while
offering various kinds of services, such as web publishing or an instant
messaging server. Using Tor "rendezvous points," other Tor users can
connect to these hidden services, each without knowing the other's
network identity. This hidden service functionality could allow Tor
users to set up a website where people publish material without worrying
about censorship. Nobody would be able to determine who was offering
the site, and nobody who offered the site would know who was posting to it.
Learn more about <a href="docs/tor-hidden-service.html.en">configuring
hidden services</a> and how the <a href="hidden-services.html.en">hidden
service protocol</a> works.
</p>
<a name="stayinganonymous"></a>
<h3><a class="anchor" href="#stayinganonymous">Staying anonymous</a></h3>
<p>
Tor can't solve all anonymity problems. It focuses only on
protecting the transport of data. You need to use protocol-specific
support software if you don't want the sites you visit to see your
identifying information. For example, you can use web proxies such as
Privoxy while web browsing to block cookies and withhold information
about your browser type.
</p>
<p>
Also, to protect your anonymity, be smart. Don't provide your name
or other revealing information in web forms. Be aware that, like all
anonymizing networks that are fast enough for web browsing, Tor does not
provide protection against end-to-end timing attacks: If your attacker
can watch the traffic coming out of your computer, and also the traffic
arriving at your chosen destination, he can use statistical analysis to
discover that they are part of the same circuit.
</p>
<a name="thefutureoftor"></a>
<h3><a class="anchor" href="#thefutureoftor">The future of Tor</a></h3>
<p>
Providing a usable anonymizing network on the Internet today is an
ongoing challenge. We want software that meets users' needs. We also
want to keep the network up and running in a way that handles as many
users as possible. Security and usability don't have to be at odds:
As Tor's usability increases, it will attract more users, which will
increase the possible sources and destinations of each communication,
thus increasing security for everyone.
We're making progress, but we need your help. Please consider
<a href="docs/tor-doc-relay.html.en">running a relay</a>
or <a href="volunteer.html.en">volunteering</a> as a
<a href="documentation.html.en#Developers">developer</a>.
</p>
<p>
Ongoing trends in law, policy, and technology threaten anonymity as never
before, undermining our ability to speak and read freely online. These
trends also undermine national security and critical infrastructure by
making communication among individuals, organizations, corporations,
and governments more vulnerable to analysis. Each new user and relay
provides additional diversity, enhancing Tor's ability to put control
over your security and privacy back into your hands.
</p>
  </div><!-- #main -->
<?php

include("footer.inc.php");

?>
