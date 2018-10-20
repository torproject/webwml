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

## The Legal FAQ for Tor Relay Operators.

* * *

**FAQ written by the Electronic Frontier Foundation (EFF). Last updated April
21, 2014.**

_NOTE: This FAQ is for informational purposes only and does not constitute
legal advice. Our aim is to provide a general description of the legal issues
surrounding Tor in the United States. Different factual situations and
different legal jurisdictions will result in different answers to a number of
questions. Therefore, please do not act on this information alone; if you have
any specific legal problems, issues, or questions, seek a complete review of
your situation with a lawyer licensed to practice in your jurisdiction._

Also, if you received this document from anywhere besides the EFF web site or
[https://www.torproject.org/eff/tor-legal-faq.html](../eff/tor-legal-
faq.html.en), it may be out of date. Follow the link to get the latest
version.

Got a DMCA notice? Check out our [sample response letter](../eff/tor-dmca-
response.html.en)!

## General Information

### Has anyone ever been sued or prosecuted for running Tor?

**No** , we aren't aware of anyone being sued or prosecuted in the United
States just for running a Tor relay. Further, we believe that running a Tor
relay -- including an exit relay that allows people to anonymously send and
receive traffic -- is legal under U.S. law.

### Should I use Tor or encourage the use of Tor for illegal purposes?

**No.** Tor has been developed to be a tool for free expression, privacy, and
human rights. It is not a tool designed or intended to be used to break the
law, either by Tor users or Tor relay operators.

### Can EFF promise that I won't get in trouble for running a Tor relay?

**No.** All new technologies create legal uncertainties, and Tor is no
exception. We cannot guarantee that you will never face any legal liability as
a result of running a Tor relay. However, EFF believes so strongly that those
running Tor relays shouldn't be liable for traffic that passes through the
relay that we're running our own middle relay.

### Will EFF represent me if I get in trouble for running a Tor relay?

**Maybe.** While EFF cannot promise legal representation for all Tor relay
operators, it will assist relay operators in assessing the situation and will
try to locate qualified legal counsel when necessary. Inquiries to EFF for the
purpose of securing legal representation or referrals should be directed to
our intake coordinator by sending an email to
[info@eff.org](mailto:info@eff.org) . Such inquiries will be kept confidential
subject to the limits of the attorney/client privilege. Note that although EFF
cannot practice law outside of the United States, it will still try to assist
non-U.S. relay operators in finding local representation.

### Should I contact the Tor developers when I have legal questions about Tor
or to inform them if I suspect Tor is being used for illegal purposes?

**No.** Tor's developers are available to answer technical questions, but they
are not lawyers and cannot give legal advice. Nor do they have any ability to
prevent illegal activity that may occur through Tor relays. Furthermore, your
communications with Tor's developers are not protected by any legal privilege,
so law enforcement or civil litigants could subpoena and obtain any
information you give to them.

You can contact [info@eff.org](mailto:info@eff.org) if you face a specific
legal issue. We will try to assist you, but given EFF's small size, we cannot
guarantee that we can help everyone.

### Do Tor's core developers make any promises about the trustworthiness or
reliability of Tor relays that are listed in their directory?

**No.** Although the developers attempt to verify that Tor relays listed in
the directory maintained by the core developers are stable and have adequate
bandwidth, neither they nor EFF can guarantee the personal trustworthiness or
reliability of the individuals who run those relays. Tor's core developers
further reserve the right to refuse a Tor relay operator's request to be
listed in their directory or to remove any relay from their directory for any
reason.

## Exit Relays

Exit relays raise special concerns because the traffic that exits from them
can be traced back to the relay's IP address. While we believe that running an
exit relay is legal, it is statistically likely that an exit relay will at
some point be used for illegal purposes, which may attract the attention of
private litigants or law enforcement. An exit relay may forward traffic that
is considered unlawful, and that traffic may be attributed to the operator of
a relay. If you are not willing to deal with that risk, a bridge or middle
relay may be a better fit for you. These relays do not directly forward
traffic to the Internet and so can't be easily mistaken for the origin of
allegedly unlawful content.

The Tor Project's blog has some excellent
[recommendations](https://blog.torproject.org/blog/tips-running-exit-node) for
running an exit with as little risk as possible. We suggest that you review
their advice before setting up an exit relay.

### Should I run an exit relay from my home?

**No.** If law enforcement becomes interested in traffic from your exit relay,
it's possible that officers will seize your computer. For that reason, it's
best not to run your exit relay in your home or using your home Internet
connection.

Instead, consider running your exit relay in a [commercial
facility](https://trac.torproject.org/projects/tor/wiki/doc/GoodBadISPs) that
is supportive of Tor. Have a separate IP address for your exit relay, and
don't route your own traffic through it.

Of course, you should avoid keeping any sensitive or personal information on
the computer hosting your exit relay, and you never should use that machine
for any illegal purpose.

### Should I tell my ISP that I'm running an exit relay?

**Yes.** Make sure you have a Tor-friendly ISP that knows you're running an
exit relay and supports you in that goal. This will help ensure that your
Internet access isn't cut off due to abuse complaints. The Tor community
maintains a
[list](https://trac.torproject.org/projects/tor/wiki/TheOnionRouter/GoodBadISPs)
of ISPs that are particularly Tor-savvy, as well as ones that aren't.

### Is it a good idea to let others know that I'm running an exit relay?

**Yes.** Be as transparent as possible about the fact that you're running an
exit relay. If your exit traffic draws the attention of the government or
disgruntled private party, you want them to figure out quickly and easily that
you are part of the Tor network and not responsible for the content. This
could mean the difference between having your computer seized by law
enforcement and being left alone.

The Tor Project [suggests](https://blog.torproject.org/blog/tips-running-exit-
node) the following ways to let others know that you're running an exit relay:

  * Set up a reverse DNS name for the IP address that makes clear that the computer is an exit relay.
  * Set up a notice like [this](https://gitweb.torproject.org/tor.git/plain/contrib/operator-tools/tor-exit-notice.html) to explain that you're running an exit relay that's part of the Tor network.
  * If possible, get an [ARIN](https://www.arin.net/) registration for your exit relay that displays contact information for you, not your ISP. This way, you'll receive any abuse complaints and can respond to them directly. Otherwise, try to ensure that your ISP forwards abuse complaints that it receives to you.

### Should I snoop on the plaintext traffic that exits through my Tor relay?

**No.** You may be technically capable of modifying the Tor source code or
installing additional software to monitor or log plaintext that exits your
relay. However, Tor relay operators in the United States can possibly create
civil and even criminal liability for themselves under state or federal
wiretap laws if they monitor, log, or disclose Tor users' communications,
while non-U.S. operators may be subject to similar laws. Do not examine
anyone's communications without first talking to a lawyer.

### If I receive a subpoena or other information request from law enforcement
or anyone else related to my Tor relay, what should I do?

**Educate them about Tor.** In most instances, properly configured Tor relays
will have no useful data for inquiring parties, and you should feel free to
educate them on this point. To the extent you do maintain logs, however, you
should not disclose them to any third party without first consulting a lawyer.
In the United States, such a disclosure may violate the Electronic
Communications Privacy Act, and relay operators outside of the United States
may be subject to similar data protection laws.

You may receive legal inquiries where you are prohibited by law from telling
anyone about the request. We believe that, at least in the United States, such
gag orders do not prevent you from talking to a lawyer, including calling a
lawyer to find representation. Inquiries to EFF for the purpose of securing
legal representation should be directed to our intake coordinator (info at
eff.org) Such inquiries will be kept confidential subject to the limits of the
attorney/client privilege.

For more information about responding to abuse complaints and other inquiries,
check out the [Tor Abuse FAQ](../docs/faq-abuse.html.en) and the collection of
[abuse response
templates](https://trac.torproject.org/projects/tor/wiki/TheOnionRouter/TorAbuseTemplates)
on the Tor Project’s website.

For information on what to do if law enforcement seeks access to your digital
devices, check out EFF’s [Know Your Rights](https://www.eff.org/wp/know-your-
rights) guide.

### My ISP, university, etc. just sent me a DMCA notice. What should I do?

EFF has written a [short template](../eff/tor-dmca-response.html.en) to help
you write a response to your ISP, university, etc., to let them know about the
details of the Digital Millennium Copyright Act’s safe harbor, and how Tor
fits in. Note that template only refers to U.S. jurisdictions, and is intended
only to address copyright complaints that are based on a relay of allegedly
infringing material through the Tor node.

If you like, you should consider submitting a copy of your notice to [Chilling
Effects](https://www.chillingeffects.org/). This will help us recognize trends
and issues that the lawyers might want to focus on. Chilling Effects
encourages submissions from people outside the United States too.

EFF believes that Tor relays should be protected from copyright liability for
the acts of their users because a Tor relay operator can raise an immunity
defense under the DMCA as well as defenses under copyright's secondary
liability doctrines. However, no court has yet addressed these issues in the
context of Tor itself. If you are uncomfortable with this uncertainty, you may
consider using a reduced exit policy (such as the default policy suggested by
the Tor Project) to try to minimize traffic types that are often targeted in
copyright complaints.

If you are a Tor relay operator willing to stand up and help set a clear legal
precedent establishing that merely running a relay does not create copyright
liability for either operators or their bandwidth providers, EFF is interested
in hearing from you. Read more
[here](https://lists.torproject.org/pipermail/tor-
talk/2005-October/016301.html) about being EFF's test case.

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

