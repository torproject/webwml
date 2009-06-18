<?php
$pagename = "Tor: Frequently Asked Questions (Abuse)";
include("header.inc.php");
?>
<div class="main-column"> 
  <div class="bg"> 
    <!-- PUT CONTENT AFTER THIS TAG -->
    <h2>Tor: Abuse FAQ</h2>
    <!-- BEGIN SIDEBAR -->
    <div class="sidebar-left"> 
      <h4>Questions</h4>
      &raquo;&nbsp;<a href="faq-abuse.html.en#WhatAboutCriminals">Doesn't Tor 
      enable criminals to do bad things?</a><br>
      &raquo;&nbsp;<a href="faq-abuse.html.en#DDoS">What about distributed denial 
      of service attacks?</a><br>
      &raquo;&nbsp;<a href="faq-abuse.html.en#WhatAboutSpammers">What about spammers?</a><br>
      &raquo;&nbsp;<a href="faq-abuse.html.en#ExitPolicies">How do Tor exit policies 
      work?</a><br>
      &raquo;&nbsp;<a href="faq-abuse.html.en#HowMuchAbuse">Does Tor get much 
      abuse?</a><br>
      &raquo;&nbsp;<a href="faq-abuse.html.en#TypicalAbuses">So what should I 
      expect if I run an exit relay?</a><br>
      &raquo;&nbsp;<a href="faq-abuse.html.en#IrcBans">Tor is banned from the 
      IRC network I want to use.</a><br>
      &raquo;&nbsp;<a href="faq-abuse.html.en#SMTPBans">Your nodes are banned 
      from the mail server I want to use.</a><br>
      &raquo;&nbsp;<a href="faq-abuse.html.en#Bans">I want to ban the Tor network 
      from my service.</a><br>
      &raquo;&nbsp;<a href="faq-abuse.html.en#TracingUsers">I have a compelling 
      reason to trace a Tor user. Can you help?</a><br>
      &raquo;&nbsp;<a href="faq-abuse.html.en#LegalQuestions">I have legal questions 
      about Tor abuse.</a> </div>
    <!-- END SIDEBAR -->
    <a id="WhatAboutCriminals"></a> 
    <h3><a class="anchor" href="#WhatAboutCriminals">Doesn't Tor enable criminals 
      to do bad things?</a></h3>
    <p>Criminals can already do bad things. Since they're willing to break laws, 
      they already have lots of options available that provide <em>better</em> 
      privacy than Tor provides. They can steal cell phones, use them, and throw 
      them in a ditch; they can crack into computers in Korea or Brazil and use 
      them to launch abusive activities; they can use spyware, viruses, and other 
      techniques to take control of literally millions of Windows machines around 
      the world. </p>
    <p>Tor aims to provide protection for ordinary people who want to follow the 
      law. Only criminals have privacy right now, and we need to fix that. </p>
    <p>Some advocates of anonymity explain that it's just a tradeoff &mdash; accepting 
      the bad uses for the good ones &mdash; but there's more to it than that. 
      Criminals and other bad people have the motivation to learn how to get good 
      anonymity, and many have the motivation to pay well to achieve it. Being 
      able to steal and reuse the identities of innocent victims (identify theft) 
      makes it even easier. Normal people, on the other hand, don't have the time 
      or money to spend figuring out how to get privacy online. This is the worst 
      of all possible worlds. </p>
    <p>So yes, criminals could in theory use Tor, but they already have better 
      options, and it seems unlikely that taking Tor away from the world will 
      stop them from doing their bad things. At the same time, Tor and other privacy 
      measures can <em>fight</em> identity theft, physical crimes like stalking, 
      and so on. </p>
    <!--
<a id="Pervasive"></a>
<h3><a class="anchor" href="#Pervasive">If the whole world starts using
Tor, won't civilization collapse?</a></h3>
-->
    <a id="DDoS"></a> 
    <h3><a class="anchor" href="#DDoS">What about distributed denial of service 
      attacks?</a></h3>
    <p>Distributed denial of service (DDoS) attacks typically rely on having a 
      group of thousands of computers all sending floods of traffic to a victim. 
      Since the goal is to overpower the bandwidth of the victim, they typically 
      send UDP packets since those don't require handshakes or coordination. </p>
    <p>But because Tor only transports correctly formed TCP streams, not all IP 
      packets, you cannot send UDP packets over Tor. (You can't do specialized 
      forms of this attack like SYN flooding either.) So ordinary DDoS attacks 
      are not possible over Tor. Tor also doesn't allow bandwidth amplification 
      attacks against external sites: you need to send in a byte for every byte 
      that the Tor network will send to your destination. So in general, attackers 
      who control enough bandwidth to launch an effective DDoS attack can do it 
      just fine without Tor. </p>
    <a id="WhatAboutSpammers"></a> 
    <h3><a class="anchor" href="#WhatAboutSpammers">What about spammers?</a></h3>
    <p>First of all, the default Tor exit policy rejects all outgoing port 25 
      (SMTP) traffic. So sending spam mail through Tor isn't going to work by 
      default. It's possible that some relay operators will enable port 25 on 
      their particular exit node, in which case that computer will allow outgoing 
      mails; but that individual could just set up an open mail relay too, independent 
      of Tor. In short, Tor isn't useful for spamming, because nearly all Tor 
      relays refuse to deliver the mail. </p>
    <p>Of course, it's not all about delivering the mail. Spammers can use Tor 
      to connect to open HTTP proxies (and from there to SMTP servers); to connect 
      to badly written mail-sending CGI scripts; and to control their botnets 
      &mdash; that is, to covertly communicate with armies of compromised computers 
      that deliver the spam. </p>
    <p> This is a shame, but notice that spammers are already doing great without 
      Tor. Also, remember that many of their more subtle communication mechanisms 
      (like spoofed UDP packets) can't be used over Tor, because it only transports 
      correctly-formed TCP connections. </p>
    <a id="ExitPolicies"></a> 
    <h3><a class="anchor" href="#ExitPolicies">How do Tor exit policies work?</a></h3>
    <p>Each Tor relay has an exit policy that specifies what sort of outbound 
      connections are allowed or refused from that relay. The exit policies are 
      propagated to the client via the directory, so clients will automatically 
      avoid picking exit nodes that would refuse to exit to their intended destination. 
    </p>
    <p>This way each relay can decide the services, hosts, and networks he wants 
      to allow connections to, based on abuse potential and his own situation. 
    </p>
    <a id="HowMuchAbuse"></a> 
    <h3><a class="anchor" href="#HowMuchAbuse">Does Tor get much abuse?</a></h3>
    <p>Not much, in the grand scheme of things. We've been running the network 
      since October 2003, and it's only generated a handful of complaints. Of 
      course, like all privacy-oriented networks on the net, we attract our share 
      of jerks. Tor's exit policies help separate the role of "willing to donate 
      resources to the network" from the role of "willing to deal with exit abuse 
      complaints," so we hope our network is more sustainable than past attempts 
      at anonymity networks. </p>
    <p>Since Tor has <a href="overview.html.en">many good uses as well</a>, we 
      feel that we're doing pretty well at striking a balance currently. </p>
    <a id="TypicalAbuses"></a> 
    <h3><a class="anchor" href="#TypicalAbuses">So what should I expect if I run 
      an exit relay?</a></h3>
    <p>If you run a Tor relay that allows exit connections (such as the default 
      exit policy), it's probably safe to say that you will eventually hear from 
      somebody. Abuse complaints may come in a variety of forms. For example: 
    </p>
    <ul>
      <li>Somebody connects to Hotmail, and sends a ransom note to a company. 
        The FBI sends you a polite email, you explain that you run a Tor relay, 
        and they say "oh well" and leave you alone. [Port 80]</li>
      <li>Somebody tries to get you shut down by using Tor to connect to Google 
        groups and post spam to Usenet, and then sends an angry mail to your ISP 
        about how you're destroying the world. [Port 80]</li>
      <li>Somebody connects to an IRC network and makes a nuisance of himself. 
        Your ISP gets polite mail about how your computer has been compromised; 
        and/or your computer gets DDoSed. [Port 6667]</li>
      <li>Somebody uses Tor to download a Vin Diesel movie, and your ISP gets 
        a DMCA takedown notice. See EFF's <a href="eff/tor-dmca-response.html.en">Tor 
        DMCA Response Template</a>, which explains why your ISP can probably ignore 
        the notice without any liability. [Arbitrary ports]</li>
    </ul>
    <p>You might also find that your Tor relay's IP is blocked from accessing 
      some Internet sites/services. This might happen regardless of your exit 
      policy, because some groups don't seem to know or care that Tor has exit 
      policies. (If you have a spare IP not used for other activities, you might 
      consider running your Tor relay on it.) For example, </p>
    <ul>
      <li>Because of a few cases of anonymous jerks messing with its web pages, 
        Wikipedia is currently blocking many Tor relay IPs from writing (reading 
        still works). We're talking to Wikipedia about how they might control 
        abuse while still providing access to anonymous contributors, who often 
        have hot news or inside info on a topic but don't want to risk revealing 
        their identities when publishing it (or don't want to reveal to local 
        observers that they're accessing Wikipedia). Slashdot is also in the same 
        boat.</li>
      <li>SORBS is putting some Tor relay IPs on their email blacklist as well. 
        They do this because they passively detect whether your relay connects 
        to certain IRC networks, and they conclude from this that your relay is 
        capable of spamming. We tried to work with them to teach them that not 
        all software works this way, but we have given up. We recommend you avoid 
        them, and <a
href="http://paulgraham.com/spamhausblacklist.html">teach your friends (if they 
        use them) to avoid abusive blacklists too</a>.</li>
    </ul>
    <a id="IrcBans"></a> 
    <h3><a class="anchor" href="#IrcBans">Tor is banned from the IRC network I 
      want to use.</a></h3>
    <p>Sometimes jerks make use of Tor to troll IRC channels. This abuse results 
      in IP-specific temporary bans ("klines" in IRC lingo), as the network operators 
      try to keep the troll off of their network. </p>
    <p>This response underscores a fundamental flaw in IRC's security model: they 
      assume that IP addresses equate to humans, and by banning the IP address 
      they can ban the human. In reality this is not the case &mdash; many such 
      trolls routinely make use of the literally millions of open proxies and 
      compromised computers around the Internet. The IRC networks are fighting 
      a losing battle of trying to block all these nodes, and an entire cottage 
      industry of blacklists and counter-trolls has sprung up based on this flawed 
      security model (not unlike the antivirus industry). The Tor network is just 
      a drop in the bucket here. </p>
    <p>On the other hand, from the viewpoint of IRC server operators, security 
      is not an all-or-nothing thing. By responding quickly to trolls or any other 
      social attack, it may be possible to make the attack scenario less attractive 
      to the attacker. And most individual IP addresses do equate to individual 
      humans, on any given IRC network at any given time. The exceptions include 
      NAT gateways which may be allocated access as special cases. While it's 
      a losing battle to try to stop the use of open proxies, it's not generally 
      a losing battle to keep klining a single ill-behaved IRC user until that 
      user gets bored and goes away. </p>
    <p>But the real answer is to implement application-level auth systems, to 
      let in well-behaving users and keep out badly-behaving users. This needs 
      to be based on some property of the human (such as a password he knows), 
      not some property of the way his packets are transported. </p>
    <p>Of course, not all IRC networks are trying to ban Tor nodes. After all, 
      quite a few people use Tor to IRC in privacy in order to carry on legitimate 
      communications without tying them to their real-world identity. Each IRC 
      network needs to decide for itself if blocking a few more of the millions 
      of IPs that bad people can use is worth losing the contributions from the 
      well-behaved Tor users. </p>
    <p>If you're being blocked, have a discussion with the network operators and 
      explain the issues to them. They may not be aware of the existence of Tor 
      at all, or they may not be aware that the hostnames they're klining are 
      Tor exit nodes. If you explain the problem, and they conclude that Tor ought 
      to be blocked, you may want to consider moving to a network that is more 
      open to free speech. Maybe inviting them to #tor on irc.oftc.net will help 
      show them that we are not all evil people. </p>
    <p>Finally, if you become aware of an IRC network that seems to be blocking 
      Tor, or a single Tor exit node, please put that information on <a
href="https://wiki.torproject.org/wiki/TheOnionRouter/BlockingIrc">The Tor IRC 
      block tracker</a> so that others can share. At least one IRC network consults 
      that page to unblock exit nodes that have been blocked inadvertently. </p>
    <a id="SMTPBans"></a> 
    <h3><a class="anchor" href="#SMTPBans">Your nodes are banned from the mail 
      server I want to use.</a></h3>
    <p>Even though <a href="#WhatAboutSpammers">Tor isn't useful for spamming</a>, 
      some over-zealous blacklisters seem to think that all open networks like 
      Tor are evil &mdash; they attempt to strong-arm network administrators on 
      policy, service, and routing issues, and then extract ransoms from victims. 
    </p>
    <p>If your server administrators decide to make use of these blacklists to 
      refuse incoming mail, you should have a conversation with them and explain 
      about Tor and Tor's exit policies. </p>
    <a id="Bans"></a> 
    <h3><a class="anchor" href="#Bans">I want to ban the Tor network from my service.</a></h3>
    <p>We're sorry to hear that. There are some situations where it makes sense 
      to block anonymous users for an Internet service. But in many cases, there 
      are easier solutions that can solve your problem while still allowing users 
      to access your website securely.</p>
    <p>First, ask yourself if there's a way to do application-level decisions 
      to separate the legitimate users from the jerks. For example, you might 
      have certain areas of the site, or certain privileges like posting, available 
      only to people who are registered. It's easy to build an up-to-date list 
      of Tor IP addresses that allow connections to your service, so you could 
      set up this distinction only for Tor users. This way you can have multi-tiered 
      access and not have to ban every aspect of your service. </p>
    <p>For example, the <a
href="http://freenode.net/policy.shtml#tor">Freenode IRC network</a> had a problem 
      with a coordinated group of abusers joining channels and subtly taking over 
      the conversation; but when they labelled all users coming from Tor nodes 
      as "anonymous users," removing the ability of the abusers to blend in, the 
      abusers moved back to using their open proxies and bot networks. </p>
    <p>Second, consider that hundreds of thousands of people use Tor every day 
      simply for good data hygiene &mdash; for example, to protect against data-gathering 
      advertising companies while going about their normal activities. Others 
      use Tor because it's their only way to get past restrictive local firewalls. 
      Some Tor users may be legitimately connecting to your service right now 
      to carry on normal activities. You need to decide whether banning the Tor 
      network is worth losing the contributions of these users, as well as potential 
      future legitimate users. (Often people don't have a good measure of how 
      many polite Tor users are connecting to their service &mdash; you never 
      notice them until there's an impolite one.)</p>
    <p>At this point, you should also ask yourself what you do about other services 
      that aggregate many users behind a few IP addresses. Tor is not so different 
      from AOL in this respect.</p>
    <p>Lastly, please remember that Tor relays have <a
href="#ExitPolicies">individual exit policies</a>. Many Tor relays do not allow 
      exiting connections at all. Many of those that do allow some exit connections 
      might already disallow connections to your service. When you go about banning 
      nodes, you should parse the exit policies and only block the ones that allow 
      these connections; and you should keep in mind that exit policies can change 
      (as well as the overall list of nodes in the network).</p>
    <p>If you really want to do this, we provide a <a href="https://check.torproject.org/cgi-bin/TorBulkExitList.py">Tor 
      exit relay list</a> or a <a href="tordnsel/index.html.en">DNS-based list 
      you can query</a>. </p>
    <p> (Some system administrators block ranges of IP addresses because of official 
      policy or some abuse pattern, but some have also asked about whitelisting 
      Tor exit relays because they want to permit access to their systems only 
      using Tor. These scripts are usable for whitelisting as well.) </p>
    <a id="TracingUsers"></a> 
    <h3><a class="anchor" href="#TracingUsers">I have a compelling reason to trace 
      a Tor user. Can you help?</a></h3>
    <p> There is nothing the Tor developers can do to trace Tor users. The same 
      protections that keep bad people from breaking Tor's anonymity also prevent 
      us from figuring out what's going on. </p>
    <p> Some fans have suggested that we redesign Tor to include a <a
href="faq.html.en#Backdoor">backdoor</a>. There are two problems with this idea. 
      First, it technically weakens the system too far. Having a central way to 
      link users to their activities is a gaping hole for all sorts of attackers; 
      and the policy mechanisms needed to ensure correct handling of this responsibility 
      are enormous and unsolved. Second, the bad people <a href="#WhatAboutCriminals">aren't 
      going to get caught by this anyway</a>, since they will use other means 
      to ensure their anonymity (identity theft, compromising computers and using 
      them as bounce points, etc). </p>
    <p> But remember that this doesn't mean that Tor is invulnerable. Traditional 
      police techniques can still be very effective against Tor, such as interviewing 
      suspects, surveillance and keyboard taps, writing style analysis, sting 
      operations, and other physical investigations. </p>
    <a id="LegalQuestions"></a> 
    <h3><a class="anchor" href="#LegalQuestions">I have legal questions about 
      Tor abuse.</a></h3>
    <p>We're only the developers. We can answer technical questions, but we're 
      not the ones to talk to about legal questions or concerns. </p>
    <p>Please take a look at the <a href="eff/tor-legal-faq.html.en">Tor Legal 
      FAQ</a>, and contact EFF directly if you have any further legal questions. 
    </p>
  </div>
</div>
<!-- #main -->
<?php

include("footer.inc.php");

?>
