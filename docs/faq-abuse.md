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
[Abuse FAQ](../docs/faq-abuse.html.en)

# Abuse FAQ

* * *

### Questions

  * Doesn't Tor enable criminals to do bad things?
  * What about distributed denial of service attacks?
  * What about spammers?
  * Does Tor get much abuse?
  * So what should I expect if I run an exit relay?
  * How do I respond to my ISP about my exit relay?
  * Tor is banned from the IRC network I want to use.
  * Your nodes are banned from the mail server I want to use.
  * I want to ban the Tor network from my service.
  * I have a compelling reason to trace a Tor user. Can you help?
  * I want some content removed from a .onion address.
  * Where does Tor Project stand on abusers using technology?
  * I have legal questions about Tor abuse.
  * I have questions about a Tor IP address for a legal case.

#### Abuse:

### Doesn't Tor enable criminals to do bad things?

Criminals can already do bad things. Since they're willing to break laws, they
already have lots of options available that provide _better_ privacy than Tor
provides. They can steal cell phones, use them, and throw them in a ditch;
they can crack into computers in Korea or Brazil and use them to launch
abusive activities; they can use spyware, viruses, and other techniques to
take control of literally millions of Windows machines around the world.

Tor aims to provide protection for ordinary people who want to follow the law.
Only criminals have privacy right now, and we need to fix that.

Some advocates of anonymity explain that it's just a tradeoff -- accepting the
bad uses for the good ones -- but there's more to it than that. Criminals and
other bad people have the motivation to learn how to get good anonymity, and
many have the motivation to pay well to achieve it. Being able to steal and
reuse the identities of innocent victims (identity theft) makes it even
easier. Normal people, on the other hand, don't have the time or money to
spend figuring out how to get privacy online. This is the worst of all
possible worlds.

So yes, criminals can use Tor, but they already have better options, and it
seems unlikely that taking Tor away from the world will stop them from doing
their bad things. At the same time, Tor and other privacy measures can _fight_
identity theft, physical crimes like stalking, and so on.

### What about distributed denial of service attacks?

Distributed denial of service (DDoS) attacks typically rely on having a group
of thousands of computers all sending floods of traffic to a victim. Since the
goal is to overpower the bandwidth of the victim, they typically send UDP
packets since those don't require handshakes or coordination.

But because Tor only transports correctly formed TCP streams, not all IP
packets, you cannot send UDP packets over Tor. (You can't do specialized forms
of this attack like SYN flooding either.) So ordinary DDoS attacks are not
possible over Tor. Tor also doesn't allow bandwidth amplification attacks
against external sites: you need to send in a byte for every byte that the Tor
network will send to your destination. So in general, attackers who control
enough bandwidth to launch an effective DDoS attack can do it just fine
without Tor.

### What about spammers?

First of all, the default Tor exit policy rejects all outgoing port 25 (SMTP)
traffic. So sending spam mail through Tor isn't going to work by default. It's
possible that some relay operators will enable port 25 on their particular
exit node, in which case that computer will allow outgoing mails; but that
individual could just set up an open mail relay too, independent of Tor. In
short, Tor isn't useful for spamming, because nearly all Tor relays refuse to
deliver the mail.

Of course, it's not all about delivering the mail. Spammers can use Tor to
connect to open HTTP proxies (and from there to SMTP servers); to connect to
badly written mail-sending CGI scripts; and to control their botnets -- that
is, to covertly communicate with armies of compromised computers that deliver
the spam.

This is a shame, but notice that spammers are already doing great without Tor.
Also, remember that many of their more subtle communication mechanisms (like
spoofed UDP packets) can't be used over Tor, because it only transports
correctly-formed TCP connections.

### How do Tor exit policies work?

[See the main FAQ](../docs/faq.html.en#ExitPolicies)

### Does Tor get much abuse?

Not much, in the grand scheme of things. The network has been running since
October 2003, and it's only generated a handful of complaints. Of course, like
all privacy-oriented networks on the net, it attracts its share of jerks.
Tor's exit policies help separate the role of "willing to donate resources to
the network" from the role of "willing to deal with exit abuse complaints," so
we hope our network is more sustainable than past attempts at anonymity
networks.

Since Tor has [many good uses as well](../about/torusers.html.en), we feel
that we're doing pretty well at striking a balance currently.

### So what should I expect if I run an exit relay?

If you run a Tor relay that allows exit connections (such as the default exit
policy), it's probably safe to say that you will eventually hear from
somebody. Abuse complaints may come in a variety of forms. For example:

  * Somebody connects to Hotmail, and sends a ransom note to a company. The FBI sends you a polite email, you explain that you run a Tor relay, and they say "oh well" and leave you alone. [Port 80]
  * Somebody tries to get you shut down by using Tor to connect to Google groups and post spam to Usenet, and then sends an angry mail to your ISP about how you're destroying the world. [Port 80]
  * Somebody connects to an IRC network and makes a nuisance of himself. Your ISP gets polite mail about how your computer has been compromised; and/or your computer gets DDoSed. [Port 6667]
  * Somebody uses Tor to download a Vin Diesel movie, and your ISP gets a DMCA takedown notice. See EFF's [Tor DMCA Response Template](../eff/tor-dmca-response.html.en), which explains why your ISP can probably ignore the notice without any liability. [Arbitrary ports]

Some hosting providers are friendlier than others when it comes to Tor exits.
For a listing see the [good and bad ISPs
wiki](https://trac.torproject.org/projects/tor/wiki/doc/GoodBadISPs).

For a complete set of template responses to different abuse complaint types,
see [the collection of templates on the Tor
wiki](https://trac.torproject.org/projects/tor/wiki/doc/TorAbuseTemplates).
You can also proactively reduce the amount of abuse you get by following
[these tips for running an exit node with minimal
harassment](https://blog.torproject.org/blog/tips-running-exit-node) and
[running a reduced exit
policy](https://trac.torproject.org/projects/tor/wiki/doc/ReducedExitPolicy).

You might also find that your Tor relay's IP is blocked from accessing some
Internet sites/services. This might happen regardless of your exit policy,
because some groups don't seem to know or care that Tor has exit policies. (If
you have a spare IP not used for other activities, you might consider running
your Tor relay on it.) In general, it's advisable not to use your home
internet connection to provide a Tor relay.

### How do I respond to my ISP about my exit relay?

A collection of templates for successfully responding to ISPs is [collected
here](https://trac.torproject.org/projects/tor/wiki/doc/TorAbuseTemplates).

### Tor is banned from the IRC network I want to use.

Sometimes jerks make use of Tor to troll IRC channels. This abuse results in
IP-specific temporary bans ("klines" in IRC lingo), as the network operators
try to keep the troll off of their network.

This response underscores a fundamental flaw in IRC's security model: they
assume that IP addresses equate to humans, and by banning the IP address they
can ban the human. In reality this is not the case -- many such trolls
routinely make use of the literally millions of open proxies and compromised
computers around the Internet. The IRC networks are fighting a losing battle
of trying to block all these nodes, and an entire cottage industry of
blacklists and counter-trolls has sprung up based on this flawed security
model (not unlike the antivirus industry). The Tor network is just a drop in
the bucket here.

On the other hand, from the viewpoint of IRC server operators, security is not
an all-or-nothing thing. By responding quickly to trolls or any other social
attack, it may be possible to make the attack scenario less attractive to the
attacker. And most individual IP addresses do equate to individual humans, on
any given IRC network at any given time. The exceptions include NAT gateways
which may be allocated access as special cases. While it's a losing battle to
try to stop the use of open proxies, it's not generally a losing battle to
keep klining a single ill-behaved IRC user until that user gets bored and goes
away.

But the real answer is to implement application-level auth systems, to let in
well-behaving users and keep out badly-behaving users. This needs to be based
on some property of the human (such as a password they know), not some
property of the way their packets are transported.

Of course, not all IRC networks are trying to ban Tor nodes. After all, quite
a few people use Tor to IRC in privacy in order to carry on legitimate
communications without tying them to their real-world identity. Each IRC
network needs to decide for itself if blocking a few more of the millions of
IPs that bad people can use is worth losing the contributions from the well-
behaved Tor users.

If you're being blocked, have a discussion with the network operators and
explain the issues to them. They may not be aware of the existence of Tor at
all, or they may not be aware that the hostnames they're klining are Tor exit
nodes. If you explain the problem, and they conclude that Tor ought to be
blocked, you may want to consider moving to a network that is more open to
free speech. Maybe inviting them to #tor on irc.oftc.net will help show them
that we are not all evil people.

Finally, if you become aware of an IRC network that seems to be blocking Tor,
or a single Tor exit node, please put that information on [The Tor IRC block
tracker](https://trac.torproject.org/projects/tor/wiki/doc/BlockingIrc) so
that others can share. At least one IRC network consults that page to unblock
exit nodes that have been blocked inadvertently.

### Your nodes are banned from the mail server I want to use.

Even though Tor isn't useful for spamming, some over-zealous blacklisters seem
to think that all open networks like Tor are evil -- they attempt to strong-
arm network administrators on policy, service, and routing issues, and then
extract ransoms from victims.

If your server administrators decide to make use of these blacklists to refuse
incoming mail, you should have a conversation with them and explain about Tor
and Tor's exit policies.

### I want to ban the Tor network from my service.

We're sorry to hear that. There are some situations where it makes sense to
block anonymous users for an Internet service. But in many cases, there are
easier solutions that can solve your problem while still allowing users to
access your website securely.

First, ask yourself if there's a way to do application-level decisions to
separate the legitimate users from the jerks. For example, you might have
certain areas of the site, or certain privileges like posting, available only
to people who are registered. It's easy to build an up-to-date list of Tor IP
addresses that allow connections to your service, so you could set up this
distinction only for Tor users. This way you can have multi-tiered access and
not have to ban every aspect of your service.

For example, the [Freenode IRC network](http://freenode.net/policy.shtml#tor)
had a problem with a coordinated group of abusers joining channels and subtly
taking over the conversation; but when they labelled all users coming from Tor
nodes as "anonymous users," removing the ability of the abusers to blend in,
the abusers moved back to using their open proxies and bot networks.

Second, consider that hundreds of thousands of people use Tor every day simply
for good data hygiene -- for example, to protect against data-gathering
advertising companies while going about their normal activities. Others use
Tor because it's their only way to get past restrictive local firewalls. Some
Tor users may be legitimately connecting to your service right now to carry on
normal activities. You need to decide whether banning the Tor network is worth
losing the contributions of these users, as well as potential future
legitimate users. (Often people don't have a good measure of how many polite
Tor users are connecting to their service -- you never notice them until
there's an impolite one.)

At this point, you should also ask yourself what you do about other services
that aggregate many users behind a few IP addresses. Tor is not so different
from AOL in this respect.

Lastly, please remember that Tor relays have [individual exit
policies](../docs/faq.html.en#ExitPolicies). Many Tor relays do not allow
exiting connections at all. Many of those that do allow some exit connections
might already disallow connections to your service. When you go about banning
nodes, you should parse the exit policies and only block the ones that allow
these connections; and you should keep in mind that exit policies can change
(as well as the overall list of nodes in the network).

If you really want to do this, we provide a [Tor exit relay
list](https://check.torproject.org/cgi-bin/TorBulkExitList.py) or a [DNS-based
list you can query](../projects/tordnsel.html.en).

(Some system administrators block ranges of IP addresses because of official
policy or some abuse pattern, but some have also asked about whitelisting Tor
exit relays because they want to permit access to their systems only using
Tor. These scripts are usable for whitelisting as well.)

### I have a compelling reason to trace a Tor user. Can you help?

There is nothing the Tor developers can do to trace Tor users. The same
protections that keep bad people from breaking Tor's anonymity also prevent us
from figuring out what's going on.

Some fans have suggested that we redesign Tor to include a
[backdoor](../docs/faq.html.en#Backdoor). There are two problems with this
idea. First, it technically weakens the system too far. Having a central way
to link users to their activities is a gaping hole for all sorts of attackers;
and the policy mechanisms needed to ensure correct handling of this
responsibility are enormous and unsolved. Second, the bad people aren't going
to get caught by this anyway, since they will use other means to ensure their
anonymity (identity theft, compromising computers and using them as bounce
points, etc).

This ultimately means that it is the responsibility of site owners to protect
themselves against compromise and security issues that can come from anywhere.
This is just part of signing up for the benefits of the Internet. You must be
prepared to secure yourself against the bad elements, wherever they may come
from. Tracking and increased surveillance are not the answer to preventing
abuse.

But remember that this doesn't mean that Tor is invulnerable. Traditional
police techniques can still be very effective against Tor, such as
investigating means, motive, and opportunity, interviewing suspects, writing
style analysis, technical analysis of the content itself, sting operations,
keyboard taps, and other physical investigations. The Tor Project is also
happy to work with everyone including law enforcement groups to train them how
to use the Tor software to safely conduct investigations or anonymized
activities online.

### I want some content removed from a .onion address.

The Tor Project does not host, control, nor have the ability to discover the
owner or location of a .onion address. The .onion address is an address from
[an onion service](../docs/onion-services.html.en). The name you see ending in
.onion is an onion service descriptor. It's an automatically generated name
which can be located on any Tor relay or client anywhere on the Internet.
Onion services are designed to protect both the user and service provider from
discovering who they are and where they are from. The design of onion services
means the owner and location of the .onion site is hidden even from us.

But remember that this doesn't mean that onion services are invulnerable.
Traditional police techniques can still be very effective against them, such
as interviewing suspects, writing style analysis, technical analysis of the
content itself, sting operations, keyboard taps, and other physical
investigations.

If you have a complaint about child abuse materials, you may wish to report it
to the National Center for Missing and Exploited Children, which serves as a
national coordination point for investigation of child pornography:
<http://www.missingkids.com/>. We do not view links you report.

### Where does Tor Project stand on abusers using technology?

We take abuse seriously. Activists and law enforcement use Tor to investigate
abuse and help support survivors. We work with them to help them understand
how Tor can help their work. In some cases, technological mistakes are being
made and we help to correct them. Because some people in survivors'
communities embrace stigma instead of compassion, seeking support from fellow
victims requires privacy-preserving technology.

Our refusal to build backdoors and censorship into Tor is not because of a
lack of concern. We refuse to weaken Tor because it would harm efforts to
combat child abuse and human trafficking in the physical world, while removing
safe spaces for victims online. Meanwhile, criminals would still have access
to botnets, stolen phones, hacked hosting accounts, the postal system,
couriers, corrupt officials, and whatever technology emerges to trade content.
They are early adopters of technology. In the face of this, it is dangerous
for policymakers to assume that blocking and filtering is sufficient. We are
more interested in helping efforts to halt and prevent child abuse than
helping politicians score points with constituents by hiding it. The role of
corruption is especially troubling; see this United Nations report on [The
Role of Corruption in Trafficking in
Persons](http://www.unodc.org/documents/human-trafficking/2011/

Issue_Paper_-_The_Role_of_Corruption_in_Trafficking_in_Persons.pdf).

Finally, it is important to consider the world that children will encounter as
adults when enacting policy in their name. Will they thank us if they are
unable to voice their opinions safely as adults? What if they are trying to
expose a failure of the state to protect other children?

### I have legal questions about Tor abuse.

We're only the developers. We can answer technical questions, but we're not
the ones to talk to about legal questions or concerns.

Please take a look at the [Tor Legal FAQ](../eff/tor-legal-faq.html.en), and
contact EFF directly if you have any further legal questions.

### I have questions about a Tor IP address for a legal case.

Please read the [legal FAQ written by EFF
lawyers](https://www.torproject.org/eff/tor-legal-faq). There's a growing
[legal directory](https://blog.torproject.org/blog/start-tor-legal-support-
directory) of people who may be able to help you.

If you need to check if a certain IP address was acting as a Tor exit node at
a certain date and time, you can use the [ExoneraTor
tool](https://exonerator.torproject.org/) to query the historic Tor relay
lists and get an answer.

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

