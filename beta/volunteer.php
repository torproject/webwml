<?php
$pagename = "Tor: anonymity online";
include("header.inc.php");
?>
<div class="main-column"> 
  <div class="bg"> 
    <h2>A few things everyone can do now:</h2>
    <ol>
      <li>Please consider <a href="docs/tor-doc-relay.html.html">running a relay</a> 
        to help the Tor network grow.</li>
      <li>Tell your friends! Get them to run relays. Get them to run hidden services. 
        Get them to tell their friends.</li>
      <li>If you like Tor's goals, please <a href="donate.html">take a moment 
        to donate to support further Tor development</a>. We're also looking for 
        more sponsors &mdash; if you know any companies, NGOs, agencies, or other 
        organizations that want anonymity / privacy / communications security, 
        let them know about us.</li>
      <li>We're looking for more <a href="torusers.html">good examples of Tor 
        users and Tor use cases</a>. If you use Tor for a scenario or purpose 
        not yet described on that page, and you're comfortable sharing it with 
        us, we'd love to hear from you.</li>
    </ol>
    <a id="Usability"></a> 
    <h3><a class="anchor" href="#Usability">Supporting Applications</a></h3>
    <ol>
      <li>We need more and better ways to intercept DNS requests so they don't 
        "leak" their request to a local observer while we're trying to be anonymous. 
        (This happens because the application does the DNS resolve before going 
        to the SOCKS proxy.)</li>
      <li>Tsocks/dsocks items: 
        <ul>
          <li>We need to <a
href="https://wiki.torproject.org/noreply/TheOnionRouter/TSocksPatches">apply 
            all our tsocks patches</a> and maintain a new fork. We'll host it 
            if you want.</li>
          <li>We should patch Dug Song's "dsocks" program to use Tor's <i>mapaddress</i> 
            commands from the controller interface, so we don't waste a whole 
            round-trip inside Tor doing the resolve before connecting.</li>
          <li>We need to make our <i>torify</i> script detect which of tsocks 
            or dsocks is installed, and call them appropriately. This probably 
            means unifying their interfaces, and might involve sharing code between 
            them or discarding one entirely.</li>
        </ul>
      </li>
      <li>People running relays tell us they want to have one BandwidthRate during 
        some part of the day, and a different BandwidthRate at other parts of 
        the day. Rather than coding this inside Tor, we should have a little script 
        that speaks via the <a href="gui/index.html.html">Tor Controller Interface</a>, 
        and does a setconf to change the bandwidth rate. There is one for Unix 
        and Mac already (it uses bash and cron), but Windows users still need 
        a solution. </li>
      <li>Speaking of geolocation data, somebody should draw a map of the Earth 
        with a pin-point for each Tor relay. Bonus points if it updates as the 
        network grows and changes. Unfortunately, the easy ways to do this involve 
        sending all the data to Google and having them draw the map for you. How 
        much does this impact privacy, and do we have any other good options?</li>
    </ol>
    <a id="Advocacy"></a> 
    <h3><a class="anchor" href="#Advocacy">Advocacy</a></h3>
    <ol>
      <li>Create a community logo under a Creative Commons license that all can 
        use and modify</li>
      <li>Create a presentation that can be used for various user group meetings 
        around the world</li>
      <li>Create a video about your positive uses of Tor. Some have already started 
        on Seesmic.</li>
      <li>Create a poster, or a set of posters, around a theme, such as "Tor for 
        Freedom!"</li>
    </ol>
    <a id="Documentation"></a> 
    <h3><a class="anchor" href="#Documentation">Documentation</a></h3>
    <ol>
      <li>Please help Matt Edman with the documentation and how-tos for his Tor 
        controller, <a href="http://vidalia-project.net/">Vidalia</a>.</li>
      <li>Evaluate and document <a href="https://wiki.torproject.org/wiki/TheOnionRouter/TorifyHOWTO">our 
        list of programs</a> that can be configured to use Tor.</li>
      <li>We need better documentation for dynamically intercepting connections 
        and sending them through Tor. tsocks (Linux), dsocks (BSD), and freecap 
        (Windows) seem to be good candidates, as would better use of our new TransPort 
        feature.</li>
      <li>We have a huge list of <a href="https://wiki.torproject.org/noreply/TheOnionRouter/SupportPrograms">potentially 
        useful programs that interface to Tor</a>. Which ones are useful in which 
        situations? Please help us test them out and document your results.</li>
      <li>Help translate the web page and documentation into other languages. 
        See the <a href="translation.html.html">translation guidelines</a> if 
        you want to help out. We especially need Arabic or Farsi translations, 
        for the many Tor users in censored areas.</li>
    </ol>
    <a id="Coding"></a> <a id="Summer"></a> <a id="Projects"></a> 
    <h3><a class="anchor" href="#Projects">Good Coding Projects</a></h3>
    <p> You may find some of these projects to be good <a href="gsoc.html.html">Google 
      Summer of Code 2009</a> ideas. We have labelled each idea with how useful 
      it would be to the overall Tor project (priority), how much work we expect 
      it would be (effort level), how much clue you should start with (skill level), 
      and which of our <a href="people.html#Core">core developers</a> would be 
      good mentors. If one or more of these ideas looks promising to you, please 
      <a
href="contact.html.html">contact us</a> to discuss your plans rather than sending 
      blind applications. You may also want to propose your own project idea which 
      often results in the best applications. </p>
    <ol>
      <li> <b>Tor Browser Bundle for Linux/Mac OS X</b> <br>
        Priority: <i>High</i> <br>
        Effort Level: <i>High</i> <br>
        Skill Level: <i>Medium</i> <br>
        Likely Mentors: <i>Steven, Andrew</i> <br>
        The Tor Browser bundle incorporates Tor, Firefox, and the Vidalia user 
        interface (and optionally Pidgin IM). Components are pre-configured to 
        operate in a secure way, and it has very few dependencies on the installed 
        operating system. It has therefore become one of the most easy to use, 
        and popular, ways to use Tor on Windows. <br>
        However, there is currently no comparable package for Linux and Mac OS 
        X, so this project would be to implement Tor Browser Bundle for these 
        platforms. This will involve modifications to Vidalia (C++), possibly 
        Firefox (C) then creating and testing the launcher on a range of operating 
        system versions and configurations to verify portability. <br>
        Students should be familiar with application development on one or preferably 
        both of Linux and Mac OS X, and be comfortable with C/C++ and shell scripting. 
        <br>
        Part of this project could be usability testing of Tor Browser Bundle, 
        ideally amongst our target demographic. That would help a lot in knowing 
        what needs to be done in terms of bug fixes or new features. We get this 
        informally at the moment, but a more structured process would be better. 
      </li>
      <li> <b>Translation wiki for our website</b> <br>
        Priority: <i>High</i> <br>
        Effort Level: <i>Medium</i> <br>
        Skill Level: <i>Medium</i> <br>
        Likely Mentors: <i>Jacob</i> <br>
        The Tor Project has been working over the past year to set up web-based 
        tools to help volunteers translate our applications into other languages. 
        We finally hit upon Pootle, and we have a fine web-based translation engine 
        in place for Vidalia, Torbutton, and Torcheck. However, Pootle only translates 
        strings that are in the "po" format, and our website uses wml files. This 
        project is about finding a way to convert our wml files into po strings 
        and back, so they can be handled by Pootle. </li>
      <li> <b>Help track the overall Tor Network status</b> <br>
        Priority: <i>Medium to High</i> <br>
        Effort Level: <i>Medium</i> <br>
        Skill Level: <i>Medium</i> <br>
        Likely Mentors: <i>Karsten, Roger</i> <br>
        It would be great to set up an automated system for tracking network health 
        over time, graphing it, etc. Part of this project would involve inventing 
        better metrics for assessing network health and growth. Is the average 
        uptime of the network increasing? How many relays are qualifying for Guard 
        status this month compared to last month? What's the turnover in terms 
        of new relays showing up and relays shutting off? Periodically people 
        collect brief snapshots, but where it gets really interesting is when 
        we start tracking data points over time. <br>
        Data could be collected from the Tor Network Scanners in <a
href="https://svn.torproject.org/svn/torflow/trunk/README">TorFlow</a>, from the 
        server descriptors that each relay publishes, and from other sources. 
        Results over time could be integrated into one of the <a
href="https://torstatus.blutmagie.de/">Tor Status</a> web pages, or be kept separate. 
        Speaking of the Tor Status pages, take a look at Roger's <a href="http://archives.seul.org/or/talk/Jan-2008/msg00300.html">Tor 
        Status wish list</a>. </li>
      <li> <b>Improving Tor's ability to resist censorship</b> <br>
        Priority: <i>Medium to High</i> <br>
        Effort Level: <i>Medium</i> <br>
        Skill Level: <i>High</i> <br>
        Likely Mentors: <i>Nick, Roger, Steven</i> <br>
        The Tor 0.2.0.x series makes <a
href="https://svn.torproject.org/svn/tor/trunk/doc/design-paper/blocking.html">significant 
        improvements</a> in resisting national and organizational censorship. 
        But Tor still needs better mechanisms for some parts of its anti-censorship 
        design. For example, current Tors can only listen on a single address/port 
        combination at a time. There's <a href="https://svn.torproject.org/svn/tor/trunk/doc/spec/proposals/118-multiple-orports.txt">a 
        proposal to address this limitation</a> and allow clients to connect to 
        any given Tor on multiple addresses and ports, but it needs more work. 
        Another anti-censorship project (far more difficult) is to try to make 
        Tor more scanning-resistant. Right now, an adversary can identify <a href="https://svn.torproject.org/svn/tor/trunk/doc/spec/proposals/125-bridges.txt">Tor 
        bridges</a> just by trying to connect to them, following the Tor protocol, 
        and seeing if they respond. To solve this, bridges could <a href="https://svn.torproject.org/svn/tor/trunk/doc/design-paper/blocking.html#tth_sEc9.3">act 
        like webservers</a> (HTTP or HTTPS) when contacted by port-scanning tools, 
        and not act like bridges until the user provides a bridge-specific key. 
        <br>
        This project involves a lot of research and design. One of the big challenges 
        will be identifying and crafting approaches that can still resist an adversary 
        even after the adversary knows the design, and then trading off censorship 
        resistance with usability and robustness. </li>
      <li> <b>Tuneup Tor!</b> <br>
        Priority: <i>Medium to High</i> <br>
        Effort Level: <i>Medium to High</i> <br>
        Skill Level: <i>High</i> <br>
        Likely Mentors: <i>Nick, Roger, Mike, Karsten</i> <br>
        Right now, Tor relays measure and report their own bandwidth, and Tor 
        clients choose which relays to use in part based on that bandwidth. This 
        approach is vulnerable to <a href="http://freehaven.net/anonbib/#bauer:wpes2007">attacks 
        where relays lie about their bandwidth</a>; to address this, Tor currently 
        caps the maximum bandwidth it's willing to believe any relay provides. 
        This is a limited fix, and a waste of bandwidth capacity to boot. Instead, 
        Tor should possibly measure bandwidth in a more distributed way, perhaps 
        as described in the <a href="http://freehaven.net/anonbib/author.html#snader08">"A 
        Tune-up for Tor"</a> paper by Snader and Borisov. One could use current 
        testing code to double-check this paper's findings and verify the extent 
        to which they dovetail with Tor as deployed in the wild, and determine 
        good ways to incorporate them into their suggestions Tor network without 
        adding too much communications overhead between relays and directory authorities. 
      </li>
      <li> <b>Improving Polipo on Windows</b> <br>
        Priority: <i>Medium to High</i> <br>
        Effort Level: <i>Medium</i> <br>
        Skill Level: <i>Medium</i> <br>
        Likely Mentors: <i>Martin</i> <br>
        Help port <a
href="http://www.pps.jussieu.fr/~jch/software/polipo/">Polipo</a> to Windows. 
        Example topics to tackle include: 1) the ability to asynchronously query 
        name servers, find the system nameservers, and manage netbios and dns 
        queries. 2) manage events and buffers natively (i.e. in Unix-like OSes, 
        Polipo defaults to 25% of ram, in Windows it's whatever the config specifies). 
        3) some sort of GUI config and reporting tool, bonus if it has a systray 
        icon with right clickable menu options. Double bonus if it's cross-platform 
        compatible. 4) allow the software to use the Windows Registry and handle 
        proper Windows directory locations, such as "C:\Program Files\Polipo" 
      </li>
      <li> <b>Implement a torrent-based scheme for downloading Thandy packages</b> 
        <br>
        Priority: <i>Medium to High</i> <br>
        Effort Level: <i>High</i> <br>
        Skill Level: <i>Medium to High</i> <br>
        Likely Mentors: <i>Martin, Nick</i> <br>
        <a
href="http://git.torproject.org/checkout/thandy/master/specs/thandy-spec.txt">Thandy</a> 
        is a relatively new software to allow assisted updates of Tor and related 
        software. Currently, there are very few users, but we expect Thandy to 
        be used by almost every Tor user in the future. To avoid crashing servers 
        on the day of a Tor update, we need new ways to distribute new packages 
        efficiently, and using libtorrent seems to be a possible solution. If 
        you think of other good ideas, great - please do let us know!<br>
        We also need to investigate how to include our mirrors better. If possible, 
        there should be an easy way for them to help distributing the packages. 
      </li>
      <li> <b>Tor Controller Status Event Interface</b> <br>
        Priority: <i>Medium</i> <br>
        Effort Level: <i>Medium</i> <br>
        Skill Level: <i>Low to Medium</i> <br>
        Likely Mentors: <i>Matt</i> <br>
        There are a number of status changes inside Tor of which the user may 
        need to be informed. For example, if the user is trying to set up his 
        Tor as a relay and Tor decides that its ports are not reachable from outside 
        the user's network, we should alert the user. Currently, all the user 
        gets is a couple log messages in Vidalia's 'message log' window, which 
        they likely never see since they don't receive a notification that something 
        has gone wrong. Even if the user does actually look at the message log, 
        most of the messages make little sense to the novice user. <br>
        Tor has the ability to inform Vidalia of many such status changes, and 
        we recently implemented support for a couple of these events. Still, there 
        are many more status events the user should be informed of and we need 
        a better UI for actually displaying them to the user. <br>
        The goal of this project then is to design and implement a UI for displaying 
        Tor status events to the user. For example, we might put a little badge 
        on Vidalia's tray icon that alerts the user to new status events they 
        should look at. Double-clicking the icon could bring up a dialog that 
        summarizes recent status events in simple terms and maybe suggests a remedy 
        for any negative events if they can be corrected by the user. Of course, 
        this is just an example and one is free to suggest another approach. <br>
        A person undertaking this project should have good UI design and layout 
        and some C++ development experience. Previous experience with Qt and Qt's 
        Designer will be very helpful, but are not required. Some English writing 
        ability will also be useful, since this project will likely involve writing 
        small amounts of help documentation that should be understandable by non-technical 
        users. Bonus points for some graphic design/Photoshop fu, since we might 
        want/need some shiny new icons too. </li>
      <li> <b>Improve our unit testing process</b> <br>
        Priority: <i>Medium</i> <br>
        Effort Level: <i>Medium</i> <br>
        Skill Level: <i>Medium</i> <br>
        Likely Mentors: <i>Nick, Roger</i> <br>
        Tor needs to be far more tested. This is a multi-part effort. To start 
        with, our unit test coverage should rise substantially, especially in 
        the areas outside the utility functions. This will require significant 
        refactoring of some parts of Tor, in order to dissociate as much logic 
        as possible from globals. <br>
        Additionally, we need to automate our performance testing. We've got buildbot 
        to automate our regular integration and compile testing already (though 
        we need somebody to set it up on Windows), but we need to get our network 
        simulation tests (as built in <a
href="https://svn.torproject.org/svn/torflow/trunk/README">TorFlow</a>) updated 
        for more recent versions of Tor, and designed to launch a test network 
        either on a single machine, or across several, so we can test changes 
        in performance on machines in different roles automatically. </li>
      <li> <b>Help revive an independent Tor client implementation</b> <br>
        Priority: <i>Medium</i> <br>
        Effort Level: <i>High</i> <br>
        Skill Level: <i>Medium to High</i> <br>
        Likely Mentors: <i>Karsten, Nick</i> <br>
        Reanimate one of the approaches to implement a Tor client in Java, e.g. 
        the <a href="http://onioncoffee.sourceforge.net/">OnionCoffee project</a>, 
        and make it run on <a
href="http://code.google.com/android/">Android</a>. The first step would be to 
        port the existing code and execute it in an Android environment. Next, 
        the code should be updated to support the newer Tor protocol versions 
        like the <a href="https://svn.torproject.org/svn/tor/trunk/doc/spec/dir-spec.txt">v3 
        directory protocol</a>. Further, support for requesting or even providing 
        Tor hidden services would be neat, but not required. <br>
        A prospective developer should be able to understand and write new Java 
        code, including a Java cryptography API. Being able to read C code would 
        be helpful, too. One should be willing to read the existing documentation, 
        implement code based on it, and refine the documentation when things are 
        underdocumented. This project is mostly about coding and to a small degree 
        about design. </li>
      <li> <b>New Torbutton Features</b> <br>
        Priority: <i>Medium</i> <br>
        Effort Level: <i>High</i> <br>
        Skill Level: <i>High</i> <br>
        Likely Mentors: <i>Mike</i> <br>
        There are several <a
href="https://bugs.torproject.org/flyspray/index.php?tasks=all&amp;project=5&amp;type=2">good 
        feature requests</a> on the Torbutton Flyspray section. In particular, 
        <a
href="https://bugs.torproject.org/flyspray/index.php?do=details&amp;id=523">Integrating 
        'New Identity' with Vidalia</a>, <a href="https://bugs.torproject.org/flyspray/index.php?do=details&amp;id=940">ways 
        of managing multiple cookie jars/identities</a>, <a
href="https://bugs.torproject.org/flyspray/index.php?do=details&amp;id=637">preserving 
        specific cookies</a> when cookies are cleared, <a
href="https://bugs.torproject.org/flyspray/index.php?do=details&amp;id=524">better 
        referrer spoofing</a>, <a
href="https://bugs.torproject.org/flyspray/index.php?do=details&amp;id=564">correct 
        Tor status reporting</a>, and <a
href="https://bugs.torproject.org/flyspray/index.php?do=details&amp;id=462">"tor://" 
        and "tors://" urls</a> are all interesting features that could be added. 
        <br>
        This work would be independent coding in Javascript and the fun world 
        of <a
href="http://www.mozilla.org/keymaster/gatekeeper/there.is.only.xul">XUL</a>, 
        with not too much involvement in the Tor internals. </li>
      <li> <b>New Thandy Features</b> <br>
        Priority: <i>Medium</i> <br>
        Effort Level: <i>Medium</i> <br>
        Skill Level: <i>Medium to High</i> <br>
        Likely Mentors: <i>Martin</i> <br>
        Additional capabilities are needed for assisted updates of all the Tor 
        related software for Windows and other operating systems. Some of the 
        features to consider include: 1) Integration of the <a
href="http://chandlerproject.org/Projects/MeTooCrypto">MeTooCrypto Python library</a> 
        for authenticated HTTPS downloads. 2) Adding a level of indirection between 
        the timestamp signatures and the package files included in an update. 
        See the "Thandy attacks / suggestions" thread on or-dev. 3) Support locale 
        specific installation and configuration of assisted updates based on preference, 
        host, or user account language settings. Familiarity with Windows codepages, 
        unicode, and other character sets is helpful in addition to general win32 
        and posix API experience and Python proficiency. </li>
      <li> <b>Simulator for slow Internet connections</b> <br>
        Priority: <i>Medium</i> <br>
        Effort Level: <i>Medium</i> <br>
        Skill Level: <i>Medium</i> <br>
        Likely Mentors: <i>Steven</i> <br>
        Many users of Tor have poor-quality Internet connections, giving low bandwidth, 
        high latency, and high packet loss/re-ordering. User experience is that 
        Tor reacts badly to these conditions, but it is difficult to improve the 
        situation without being able to repeat the problems in the lab. <br>
        This project would be to build a simulation environment which replicates 
        the poor connectivity so that the effect on Tor performance can be measured. 
        Other components would be a testing utility to establish what are the 
        properties of connections available, and to measure the effect of performance-improving 
        modifications to Tor. <br>
        The tools used would be up to the student, but dummynet (for FreeBSD) 
        and nistnet (for Linux) are two potential components on which this project 
        could be built. Students should be experienced with network programming/debugging 
        and TCP/IP, and preferably familiar with C and a scripting language. </li>
      <li> <b>An Improved and More Usable Network Map in Vidalia</b> <br>
        Priority: <i>Low to Medium</i> <br>
        Effort Level: <i>Medium</i> <br>
        Skill Level: <i>Medium</i> <br>
        Likely Mentors: <i>Matt</i> <br>
        One of Vidalia's existing features is a network map that shows the user 
        the approximate geographic location of relays in the Tor network and plots 
        the paths the user's traffic takes as it is tunneled through the Tor network. 
        The map is currently not very interactive and has rather poor graphics. 
        Instead, we implemented KDE's Marble widget such that it gives us a better 
        quality map and enables improved interactivity, such as allowing the user 
        to click on individual relays or circuits to display additional information. 
        We want to add the ability for users to click on a particular relay or 
        a country containing one or more Tor exit relays and say, "I want my connections 
        to exit from here." <br>
        This project will first involve getting familiar with Vidalia and the 
        Marble widget's API. One will then integrate the widget into Vidalia and 
        customize Marble to be better suited for our application, such as making 
        circuits clickable, storing cached map data in Vidalia's own data directory, 
        and customizing some of the widget's dialogs. <br>
        A person undertaking this project should have good C++ development experience. 
        Previous experience with Qt and CMake is helpful, but not required. </li>
      <li> <b>Bring moniTor to life</b> <br>
        Priority: <i>Low</i> <br>
        Effort Level: <i>Medium</i> <br>
        Skill Level: <i>Low to Medium</i> <br>
        Likely Mentors: <i>Karsten, Jacob</i> <br>
        Implement a <a href="http://www.ss64.com/bash/top.html">top-like</a> management 
        tool for Tor relays. The purpose of such a tool would be to monitor a 
        local Tor relay via its control port and include useful system information 
        of the underlying machine. When running this tool, it would dynamically 
        update its content like top does for Linux processes. <a href="http://archives.seul.org/or/dev/Jan-2008/msg00005.html">This 
        or-dev post</a> might be a good first read. <br>
        A person interested in this should be familiar with or willing to learn 
        about administering a Tor relay and configuring it via its control port. 
        As an initial prototype is written in Python, some knowledge about writing 
        Python code would be helpful, too. This project is one part about identifying 
        requirements to such a tool and designing its interface, and one part 
        lots of coding. </li>
      <li> <b>Torbutton equivalent for Thunderbird</b> <br>
        Priority: <i>Low</i> <br>
        Effort Level: <i>High</i> <br>
        Skill Level: <i>High</i> <br>
        Likely Mentors: <i>Mike</i> <br>
        We're hearing from an increasing number of users that they want to use 
        Thunderbird with Tor. However, there are plenty of application-level concerns, 
        for example, by default Thunderbird will put your hostname in the outgoing 
        mail that it sends. At some point we should start a new push to build 
        a Thunderbird extension similar to Torbutton. </li>
      <li> <b>Intermediate Level Network Device Driver</b> <br>
        Priority: <i>Low</i> <br>
        Effort Level: <i>High</i> <br>
        Skill Level: <i>High</i> <br>
        Likely Mentors: <i>Martin</i> <br>
        The WinPCAP device driver used by Tor VM for bridged networking does not 
        support a number of wireless and non-Ethernet network adapters. Implementation 
        of a intermediate level network device driver for win32 and 64bit would 
        provide a way to intercept and route traffic over such networks. This 
        project will require knowledge of and experience with Windows kernel device 
        driver development and testing. Familiarity with Winsock and Qemu would 
        also be helpful. </li>
      <li> <b>Bring up new ideas!</b> <br>
        Don't like any of these? Look at the <a
href="https://svn.torproject.org/svn/tor/trunk/doc/roadmaps/2008-12-19-roadmap-full.pdf">Tor 
        development roadmap</a> for more ideas. Some of the <a href="https://svn.torproject.org/svn/tor/trunk/doc/spec/proposals/">current 
        proposals</a> might also be short on developers. </li>
      <!-- Mike is already working on this.
<li>
<b>Tor Node Scanner improvements</b>
<br>
Similar to the SoaT exit scanner (or perhaps even during exit scanning),
statistics can be gathered about the reliability of nodes. Nodes that
fail too high a percentage of their circuits should not be given
Guard status. Perhaps they should have their reported bandwidth
penalized by some ratio as well, or just get marked as Invalid. In
addition, nodes that exhibit a very low average stream capacity but
advertise a very high node bandwidth can also be marked as Invalid.
Much of this statistics gathering is already done, it just needs to be
transformed into something that can be reported to the Directory
Authorities to blacklist/penalize nodes in such a way that clients
will listen.
<br>
In addition, these same statistics can be gathered about the traffic
through a node. Events can be added to the <a
href="https://svn.torproject.org/svn/torctl/trunk/doc/howto.txt">Tor Control
Protocol</a> to
report if a circuit extend attempt through the node succeeds or fails, and
passive statistics can be gathered on both bandwidth and reliability
of other nodes via a node-based monitor using these events. Such a
scanner would also report information on oddly-behaving nodes to
the Directory Authorities, but a communication channel for this
currently does not exist and would need to be developed as well.
</li>
-->
      <!-- Is this still a useful project? If so, move it to another section.
<li>
<b>Better Debian/Ubuntu Packaging for Tor+Vidalia</b>
<br>
Vidalia currently doesn't play nicely on Debian and Ubuntu with the
default Tor packages. The current Tor packages automatically start Tor
as a daemon running as the debian-tor user and (sensibly) do not have a
<a href="https://svn.torproject.org/svn/tor/trunk/doc/spec/control-spec.txt">ControlPort</a> defined
in the default torrc. Consequently, Vidalia will try
to start its own Tor process since it could not connect to the existing
Tor, and Vidalia's Tor process will then exit with an error message
the user likely doesn't understand since Tor cannot bind its listening
ports &mdash; they're already in use by the original Tor daemon.
<br>
The current solution involves either telling the user to stop the
existing Tor daemon and let Vidalia start its own Tor process, or
explaining to the user how to set a control port and password in their
torrc. A better solution on Debian would be to use Tor's ControlSocket,
which allows Vidalia to talk to Tor via a Unix domain socket, and could
possibly be enabled by default in Tor's Debian packages. Vidalia can
then authenticate to Tor using filesystem-based (cookie) authentication
if the user running Vidalia is also in the debian-tor group.
<br>
This project will first involve adding support for Tor's ControlSocket
to Vidalia. The student will then develop and test Debian and Ubuntu
packages for Vidalia that conform to Debian's packaging standards and
make sure they work well with the existing Tor packages. We can also
set up an apt repository to host the new Vidalia packages.
<br>
The next challenge would be to find an intuitive usable way for Vidalia
to be able to change Tor's configuration (torrc) even though it is
located in <code>/etc/tor/torrc</code> and thus immutable. The best
idea we've come up with so far is to feed Tor a new configuration via
the ControlSocket when Vidalia starts, but that's bad because Tor starts
each boot with a different configuration than the user wants. The second
best idea
we've come up with is for Vidalia to write out a temporary torrc file
and ask the user to manually move it to <code>/etc/tor/torrc</code>,
but that's bad because users shouldn't have to mess with files directly.
<br>
A person undertaking this project should have prior knowledge of
Debian package management and some C++ development experience. Previous
experience with Qt is helpful, but not required.
</li>
-->
      <!-- This should be mostly done.
<li>
<b>Tor/Polipo/Vidalia Auto-Update Framework</b>
<br>
We're in need of a good authenticated-update framework.
Vidalia already has the ability to notice when the user is running an
outdated or unrecommended version of Tor, using signed statements inside
the Tor directory information. Currently, Vidalia simply pops
up a little message box that lets the user know they should manually
upgrade. The goal of this project would be to extend Vidalia with the
ability to also fetch and install the updated Tor software for the
user. We should do the fetches via Tor when possible, but also fall back
to direct fetches in a smart way. Time permitting, we would also like
to be able to update other
applications included in the bundled installers, such as Polipo and
Vidalia itself.
<br>
To complete this project, the student will first need to first investigate
the existing auto-update frameworks (e.g., Sparkle on OS X) to evaluate
their strengths, weaknesses, security properties, and ability to be
integrated into Vidalia. If none are found to be suitable, the student
will design their own auto-update framework, document the design, and
then discuss the design with other developers to assess any security
issues. The student will then implement their framework (or integrate
an existing one) and test it.
<br>
A person undertaking this project should have good C++ development
experience. Previous experience with Qt is helpful, but not required. One
should also have a good understanding of common security
practices, such as package signature verification. Good writing ability
is also important for this project, since a vital step of the project
will be producing a design document to review and discuss
with others prior to implementation.
</li>
-->
      <!-- Jake already did most of this.
<li>
<b>Improvements on our active browser configuration tester</b> -
<a href="https://check.torproject.org/">https://check.torproject.org/</a>
<br>
We currently have a functional web page to detect if Tor is working. It
has a few places where it falls short. It requires improvements with
regard to default languages and functionality. It currently only responds
in English. In addition, it is a hack of a perl script that should have
never seen the light of day. It should probably be rewritten in python
with multi-lingual support in mind. It currently uses the <a
href="http://exitlist.torproject.org/">Tor DNS exit list</a>
and should continue to do so in the future. It currently result in certain
false positives and these should be discovered, documented, and fixed
where possible. Anyone working on this project should be interested in
DNS, basic perl or preferably python programming skills, and will have
to interact minimally with Tor to test their code.
<br>
If you want to make the project more exciting
and involve more design and coding, take a look at <a
href="https://svn.torproject.org/svn/tor/trunk/doc/spec/proposals/131-verify-tor-usage.txt">proposal
131-verify-tor-usage.txt</a>.
</li>
-->
      <!-- If we decide to switch to the exit list in TorStatus, this is obsolete.
<li>
<b>Improvements on our DNS Exit List service</b> -
<a href="http://exitlist.torproject.org/">http://exitlist.torproject.org/</a>
<br>
The <a href="http://p56soo2ibjkx23xo.onion/">exitlist software</a>
is written by our fabulous anonymous
contributer Tup. It's a DNS server written in Haskell that supports part of our <a
href="https://svn.torproject.org/svn/tor/trunk/doc/contrib/torel-design.txt">exitlist
design document</a>. Currently, it is functional and it is used by
check.torproject.org and other users. The issues that are outstanding
are mostly aesthetic. This wonderful service could use a much better
website using the common Tor theme. It would be best served with better
documentation for common services that use an RBL. It could use more
publicity. A person working on this project should be interested in DNS,
basic RBL configuration for popular services, and writing documentation.
The person would require minimal Tor interaction &mdash; testing their
own documentation at the very least. Furthermore, it would be useful
if they were interested in Haskell and wanted to implement more of the
torel-design.txt suggestions.
</li>
-->
      <!-- Nobody wanted to keep this.
<li>
<b>Testing integration of Tor with web browsers for our end users</b>
<br>
The Tor project currently lacks a solid test suite to ensure that a
user has a properly and safely configured web browser. It should test for as
many known issues as possible. It should attempt to decloak the
user in any way possible. Two current webpages that track these
kinds of issues are run by Greg Fleischer and HD Moore. Greg keeps a nice <a
href="http://pseudo-flaw.net/tor/torbutton/">list of issues along
with their proof of concept code, bug issues, etc</a>. HD Moore runs
the <a href="http://www.decloak.net/">metasploit
decloak website</a>. A person interested in defending Tor could start
by collecting as many workable and known methods for decloaking a
Tor user. (<a href="https://torcheck.xenobite.eu/">This page</a> may
be helpful as a start.) One should be familiar with the common pitfalls but
possibly have new methods in mind for implementing decloaking issues. The
website should ensure that it tells a user what their problem is. It
should help them to fix the problem or direct them to the proper support
channels. The person should also be closely familiar with using Tor and how
to prevent Tor information leakage.
</li>
-->
      <!-- Nick did quite some work here. Is this project still required then?
<li>
<b>Libevent and Tor integration improvements</b>
<br>
Tor should make better use of the more recent features of Niels
Provos's <a href="http://monkey.org/~provos/libevent/">Libevent</a>
library. Tor already uses Libevent for its low-level asynchronous IO
calls, and could also use Libevent's increasingly good implementations
of network buffers and of HTTP. This wouldn't be simply a matter of
replacing Tor's internal calls with calls to Libevent: instead, we'll
need to refactor Tor to use Libevent calls that do not follow the
same models as Tor's existing backends. Also, we'll need to add
missing functionality to Libevent as needed &mdash; most difficult likely
will be adding OpenSSL support on top of Libevent's buffer abstraction.
Also tricky will be adding rate-limiting to Libevent.
</li>
-->
      <!--
<li>
<b>Improving the Tor QA process: Continuous Integration for Windows builds</b>
<br>
It would be useful to have automated build processes for Windows and
probably other platforms. The purpose of having a continuous integration
build environment is to ensure that Windows isn't left behind for any of
the software projects used in the Tor project or its accompanying.<br>
Buildbot may be a good choice for this as it appears to support all of
the platforms Tor does. See the
<a href="http://en.wikipedia.org/wiki/BuildBot">wikipedia entry for
buildbot</a>.<br>
There may be better options and the person undertaking this task should
evaluate other options. Any person working on this automatic build
process should have experience or be willing to learn how to build all
of the respective Tor related code bases from scratch. Furthermore, the
person should have some experience building software in Windows
environments as this is the target audience we want to ensure we do not
leave behind. It would require close work with the Tor source code but
probably only in the form of building, not authoring.<br>
Additionally, we need to automate our performance testing for all platforms.
We've got buildbot (except on Windows &mdash; as noted above) to automate
our regular integration and compile testing already,
but we need to get our network simulation tests (as built in torflow)
updated for more recent versions of Tor, and designed to launch a test
network either on a single machine, or across several, so we can test
changes in performance on machines in different roles automatically.
</li>
-->
      <!-- Removed, unless Mike still wants this to be in.
<li>
<b>Torbutton improvements</b>
<br>
Torbutton has a number of improvements that can be made in the post-1.2
timeframe. Most of these are documented as feature requests in the <a
href="https://bugs.torproject.org/flyspray/index.php?tasks=all&amp;project=5">Torbutton
flyspray section</a>. Good examples include: stripping off node.exit on http
headers, more fine-grained control over formfill blocking, improved referrer
spoofing based on the domain of the site (a-la <a
href="https://addons.mozilla.org/en-US/firefox/addon/953">refcontrol extension</a>),
tighter integration with Vidalia for reporting Tor status, a New Identity
button with Tor integration and multiple identity management, and anything
else you might think of.
<br>
This work would be independent coding in Javascript and the fun world of <a
href="http://www.mozilla.org/keymaster/gatekeeper/there.is.only.xul">XUL</a>,
with not too much involvement in the Tor internals.
</li>
-->
      <!-- Is Blossom development still happening?
<li>
<b>Rework and extend Blossom</b>
<br>
Rework and extend Blossom (a tool for monitoring and
selecting appropriate Tor circuits based upon exit node requirements
specified by the user) to gather data in a self-contained way, with
parameters easily configurable by the user. Blossom is presently
implemented as a single Python script that interfaces with Tor using the
Controller interface and depends upon metadata about Tor nodes obtained
via external processes, such as a webpage indicating status of the nodes
plus publically available data from DNS, whois, etc. This project has
two parts: (1) Determine which additional metadata may be useful and
rework Blossom so that it cleanly obtains the metadata on its own rather
than depend upon external scripts (this may, for example, involve
additional threads or inter-process communication), and (2) develop a
means by which the user can easily configure Blossom, starting with a
configuration file and possibly working up to a web configuration engine.
Knowledge of Tor and Python are important; knowledge of
TCP, interprocess communication, and Perl will also be helpful. An
interest in network neutrality is important as well, since the
principles of evaluating and understanding internet inconsistency are at
the core of the Blossom effort.
</li>
<li>
<b>Improve Blossom: Allow users to qualitatively describe exit nodes they desire</b>
<br>
Develop and implement a means of affording Blossom
users the ability to qualitatively describe the exit node that they
want. The Internet is an inconsistent place: some Tor exit nodes see
the world differently than others. As presently implemented, Blossom (a
tool for monitoring and selecting appropriate Tor circuits based upon
exit node requirements specified by the user) lacks a sufficiently rich
language to describe how the different vantage points are different.
For example, some exit nodes may have an upstream network that filters
certain kinds of traffic or certain websites. Other exit nodes may
provide access to special content as a result of their location, perhaps
as a result of discrimination on the part of the content providers
themselves. This project has two parts: (1) develop a language for
describing characteristics of networks in which exit nodes reside, and
(2) incorporate this language into Blossom so that users can select Tor
paths based upon the description.
Knowledge of Tor and Python are important; knowledge of
TCP, interprocess communication, and Perl will also be helpful. An
interest in network neutrality is important as well, since the
principles of evaluating and understanding internet inconsistency are at
the core of the Blossom effort.
</li>
-->
      <!-- not really suited for GSoC; integrated into TBB for Linux/Mac OS X
<li>
<b>Usability testing of Tor</b>
<br>
Priority: <i>Medium</i>
<br>
Effort Level: <i>Medium</i>
<br>
Skill Level: <i>Low to Medium</i>
<br>
Likely Mentors: <i>Andrew</i>
<br>
Especially the browser bundle, ideally amongst our target demographic.
That would help a lot in knowing what needs to be done in terms of bug
fixes or new features. We get this informally at the moment, but a more
structured process would be better.
</li>
-->
    </ol>
    <a id="OtherCoding"></a> 
    <h3><a class="anchor" href="#OtherCoding">Other Coding and Design related 
      ideas</a></h3>
    <ol>
      <li>Tor relays don't work well on Windows XP. On Windows, Tor uses the standard 
        <tt>select()</tt> system call, which uses space in the non-page pool. 
        This means that a medium sized Tor relay will empty the non-page pool, 
        <a
href="https://wiki.torproject.org/noreply/TheOnionRouter/WindowsBufferProblems">causing 
        havoc and system crashes</a>. We should probably be using overlapped IO 
        instead. One solution would be to teach <a
href="http://www.monkey.org/~provos/libevent/">libevent</a> how to use overlapped 
        IO rather than select() on Windows, and then adapt Tor to the new libevent 
        interface. Christian King made a <a href="https://svn.torproject.org/svn/libevent-urz/trunk/">good 
        start</a> on this in the summer of 2007.</li>
      <li>We need to actually start building our <a href="documentation.html#DesignDoc">blocking-resistance 
        design</a>. This involves fleshing out the design, modifying many different 
        pieces of Tor, adapting <a href="http://vidalia-project.net/">Vidalia</a> 
        so it supports the new features, and planning for deployment.</li>
      <li>We need a flexible simulator framework for studying end-to-end traffic 
        confirmation attacks. Many researchers have whipped up ad hoc simulators 
        to support their intuition either that the attacks work really well or 
        that some defense works great. Can we build a simulator that's clearly 
        documented and open enough that everybody knows it's giving a reasonable 
        answer? This will spur a lot of new research. See the entry <a href="#Research">below</a> 
        on confirmation attacks for details on the research side of this task 
        &mdash; who knows, when it's done maybe you can help write a paper or 
        three also.</li>
      <li>Tor 0.1.1.x and later include support for hardware crypto accelerators 
        via OpenSSL. It has been lightly tested and is possibly very buggy. We're 
        looking for more rigorous testing, performance analysis, and optimally, 
        code fixes to openssl and Tor if needed.</li>
      <li>Perform a security analysis of Tor with <a
href="http://en.wikipedia.org/wiki/Fuzz_testing">"fuzz"</a>. Determine if there 
        are good fuzzing libraries out there for what we want. Win fame by getting 
        credit when we put out a new release because of you!</li>
      <li>Tor uses TCP for transport and TLS for link encryption. This is nice 
        and simple, but it means all cells on a link are delayed when a single 
        packet gets dropped, and it means we can only reasonably support TCP streams. 
        We have a <a
href="https://wiki.torproject.org/noreply/TheOnionRouter/TorFAQ#TransportIPnotTCP">list 
        of reasons why we haven't shifted to UDP transport</a>, but it would be 
        great to see that list get shorter. We also have a proposed <a
href="https://svn.torproject.org/svn/tor/trunk/doc/spec/proposals/100-tor-spec-udp.txt">specification 
        for Tor and UDP</a> &mdash; please let us know what's wrong with it.</li>
      <li>We're not that far from having IPv6 support for destination addresses 
        (at exit nodes). If you care strongly about IPv6, that's probably the 
        first place to start.</li>
      <li>We need a way to generate the website diagrams (for example, the "How 
        Tor Works" pictures on the <a href="overview.html">overview page</a> from 
        source, so we can translate them as UTF-8 text rather than edit them by 
        hand with Gimp. We might want to integrate this as an wml file so translations 
        are easy and images are generated in multiple languages whenever we build 
        the website.</li>
      <li>How can we make the <a
href="http://anonymityanywhere.com/incognito/">Incognito LiveCD</a> easier to 
        maintain, improve, and document?</li>
    </ol>
    <a id="Research"></a> 
    <h3><a class="anchor" href="#Research">Research</a></h3>
    <ol>
      <li>The "website fingerprinting attack": make a list of a few hundred popular 
        websites, download their pages, and make a set of "signatures" for each 
        site. Then observe a Tor client's traffic. As you watch him receive data, 
        you quickly approach a guess about which (if any) of those sites he is 
        visiting. First, how effective is this attack on the deployed Tor codebase? 
        Then start exploring defenses: for example, we could change Tor's cell 
        size from 512 bytes to 1024 bytes, we could employ padding techniques 
        like <a
href="http://freehaven.net/anonbib/#timing-fc2004">defensive dropping</a>, or 
        we could add traffic delays. How much of an impact do these have, and 
        how much usability impact (using some suitable metric) is there from a 
        successful defense in each case?</li>
      <li>The "end-to-end traffic confirmation attack": by watching traffic at 
        Alice and at Bob, we can <a
href="http://freehaven.net/anonbib/#danezis:pet2004">compare traffic signatures 
        and become convinced that we're watching the same stream</a>. So far Tor 
        accepts this as a fact of life and assumes this attack is trivial in all 
        cases. First of all, is that actually true? How much traffic of what sort 
        of distribution is needed before the adversary is confident he has won? 
        Are there scenarios (e.g. not transmitting much) that slow down the attack? 
        Do some traffic padding or traffic shaping schemes work better than others?</li>
      <li>A related question is: Does running a relay/bridge provide additional 
        protection against these timing attacks? Can an external adversary that 
        can't see inside TLS links still recognize individual streams reliably? 
        Does the amount of traffic carried degrade this ability any? What if the 
        client-relay deliberately delayed upstream relayed traffic to create a 
        queue that could be used to mimic timings of client downstream traffic 
        to make it look like it was also relayed? This same queue could also be 
        used for masking timings in client upstream traffic with the techniques 
        from <a
href="http://www.freehaven.net/anonbib/#ShWa-Timing06">adaptive padding</a>, but 
        without the need for additional traffic. Would such an interleaving of 
        client upstream traffic obscure timings for external adversaries? Would 
        the strategies need to be adjusted for asymmetric links? For example, 
        on asymmetric links, is it actually possible to differentiate client traffic 
        from natural bursts due to their asymmetric capacity? Or is it easier 
        than symmetric links for some other reason?</li>
      <li>Repeat Murdoch and Danezis's <a
href="http://www.cl.cam.ac.uk/~sjm217/projects/anon/#torta">attack from Oakland 
        05</a> on the current Tor network. See if you can learn why it works well 
        on some nodes and not well on others. (My theory is that the fast nodes 
        with spare capacity resist the attack better.) If that's true, then experiment 
        with the RelayBandwidthRate and RelayBandwidthBurst options to run a relay 
        that is used as a client while relaying the attacker's traffic: as we 
        crank down the RelayBandwidthRate, does the attack get harder? What's 
        the right ratio of RelayBandwidthRate to actually capacity? Or is it a 
        ratio at all? While we're at it, does a much larger set of candidate relays 
        increase the false positive rate or other complexity for the attack? (The 
        Tor network is now almost two orders of magnitude larger than it was when 
        they wrote their paper.) Be sure to read <a href="http://freehaven.net/anonbib/#clog-the-queue">Don't 
        Clog the Queue</a> too.</li>
      <li>The "routing zones attack": most of the literature thinks of the network 
        path between Alice and her entry node (and between the exit node and Bob) 
        as a single link on some graph. In practice, though, the path traverses 
        many autonomous systems (ASes), and <a
href="http://freehaven.net/anonbib/#feamster:wpes2004">it's not uncommon that 
        the same AS appears on both the entry path and the exit path</a>. Unfortunately, 
        to accurately predict whether a given Alice, entry, exit, Bob quad will 
        be dangerous, we need to download an entire Internet routing zone and 
        perform expensive operations on it. Are there practical approximations, 
        such as avoiding IP addresses in the same /8 network?</li>
      <li>Other research questions regarding geographic diversity consider the 
        tradeoff between choosing an efficient circuit and choosing a random circuit. 
        Look at Stephen Rollyson's <a
href="http://swiki.cc.gatech.edu:8080/ugResearch/uploads/7/ImprovingTor.pdf">position 
        paper</a> on how to discard particularly slow choices without hurting 
        anonymity "too much". This line of reasoning needs more work and more 
        thinking, but it looks very promising.</li>
      <li>Tor doesn't work very well when relays have asymmetric bandwidth (e.g. 
        cable or DSL). Because Tor has separate TCP connections between each hop, 
        if the incoming bytes are arriving just fine and the outgoing bytes are 
        all getting dropped on the floor, the TCP push-back mechanisms don't really 
        transmit this information back to the incoming streams. Perhaps Tor should 
        detect when it's dropping a lot of outgoing packets, and rate-limit incoming 
        streams to regulate this itself? I can imagine a build-up and drop-off 
        scheme where we pick a conservative rate-limit, slowly increase it until 
        we get lost packets, back off, repeat. We need somebody who's good with 
        networks to simulate this and help design solutions; and/or we need to 
        understand the extent of the performance degradation, and use this as 
        motivation to reconsider UDP transport.</li>
      <li>A related topic is congestion control. Is our current design sufficient 
        once we have heavy use? Maybe we should experiment with variable-sized 
        windows rather than fixed-size windows? That seemed to go well in an <a
href="http://www.psc.edu/networking/projects/hpn-ssh/theory.php">ssh throughput 
        experiment</a>. We'll need to measure and tweak, and maybe overhaul if 
        the results are good.</li>
      <li>Our censorship-resistance goals include preventing an attacker who's 
        looking at Tor traffic on the wire from <a
href="https://svn.torproject.org/svn/tor/trunk/doc/design-paper/blocking.html#sec:network-fingerprint">distinguishing 
        it from normal SSL traffic</a>. Obviously we can't achieve perfect steganography 
        and still remain usable, but for a first step we'd like to block any attacks 
        that can win by observing only a few packets. One of the remaining attacks 
        we haven't examined much is that Tor cells are 512 bytes, so the traffic 
        on the wire may well be a multiple of 512 bytes. How much does the batching 
        and overhead in TLS records blur this on the wire? Do different buffer 
        flushing strategies in Tor affect this? Could a bit of padding help a 
        lot, or is this an attack we must accept?</li>
      <li>Tor circuits are built one hop at a time, so in theory we have the ability 
        to make some streams exit from the second hop, some from the third, and 
        so on. This seems nice because it breaks up the set of exiting streams 
        that a given relay can see. But if we want each stream to be safe, the 
        "shortest" path should be at least 3 hops long by our current logic, so 
        the rest will be even longer. We need to examine this performance / security 
        tradeoff.</li>
      <li>It's not that hard to DoS Tor relays or directory authorities. Are client 
        puzzles the right answer? What other practical approaches are there? Bonus 
        if they're backward-compatible with the current Tor protocol.</li>
      <li>Programs like <a
href="torbutton/index.html.html">Torbutton</a> aim to hide your browser's UserAgent 
        string by replacing it with a uniform answer for every Tor user. That 
        way the attacker can't splinter Tor's anonymity set by looking at that 
        header. It tries to pick a string that is commonly used by non-Tor users 
        too, so it doesn't stand out. Question one: how badly do we hurt ourselves 
        by periodically updating the version of Firefox that Torbutton claims 
        to be? If we update it too often, we splinter the anonymity sets ourselves. 
        If we don't update it often enough, then all the Tor users stand out because 
        they claim to be running a quite old version of Firefox. The answer here 
        probably depends on the Firefox versions seen in the wild. Question two: 
        periodically people ask us to cycle through N UserAgent strings rather 
        than stick with one. Does this approach help, hurt, or not matter? Consider: 
        cookies and recognizing Torbutton users by their rotating UserAgents; 
        malicious websites who only attack certain browsers; and whether the answers 
        to question one impact this answer. </li>
      <li>Right now Tor clients are willing to reuse a given circuit for ten minutes 
        after it's first used. The goal is to avoid loading down the network with 
        too many circuit extend operations, yet to also avoid having clients use 
        the same circuit for so long that the exit node can build a useful pseudonymous 
        profile of them. Alas, ten minutes is probably way too long, especially 
        if connections from multiple protocols (e.g. IM and web browsing) are 
        put on the same circuit. If we keep fixed the overall number of circuit 
        extends that the network needs to do, are there more efficient and/or 
        safer ways for clients to allocate streams to circuits, or for clients 
        to build preemptive circuits? Perhaps this research item needs to start 
        with gathering some traces of what connections typical clients try to 
        launch, so you have something realistic to try to optimize. </li>
      <li>How many bridge relays do you need to know to maintain reachability? 
        We should measure the churn in our bridges. If there is lots of churn, 
        are there ways to keep bridge users more likely to stay connected? </li>
    </ol>
    <p> <a href="contact.html.html">Let us know</a> if you've made progress on 
      any of these! </p>
  </div>
</div>
<!-- #main -->
<?php

include("footer.inc.php");

?>
