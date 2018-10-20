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
[Tor Onion Service](../docs/tor-onion-service.html.en)

# Configuring Onion Services for [Tor](../index.html.en)

* * *

Tor allows clients and relays to offer onion services. That is, you can offer
a web server, SSH server, etc., without revealing your IP address to its
users. In fact, because you don't use any public address, you can run an onion
service from behind your firewall.

If you have Tor installed, you can see onion services in action by visiting
this [sample site](http://duskgytldkxiuqc6.onion/).

This page describes the steps for setting up your own onion service website.
For the technical details of how the onion service protocol works, see our
[onion service protocol](../docs/onion-services.html.en) page.

* * *

  * Step Zero: Get Tor working
  * Step One: Install a web server locally
  * Step Two: Configure your onion service
  * Step Three: More advanced tips
  * Step Four: Set up next-gen (v3) onions

* * *

## Step Zero: Get Tor working

  

Before you start, you need to make sure:

  1. Tor is up and running,
  2. You actually set it up correctly.

Windows users should follow the [Windows howto](../docs/tor-doc-
windows.html.en), OS X users should follow the [OS X howto](../docs/tor-doc-
osx.html.en), and Linux/BSD/Unix users should follow the [Unix
howto](../docs/tor-doc-unix.html.en).

* * *

## Step One: Install a web server locally

  

First, you need to set up a web server locally, for example nginx or lighttpd
(apache is not the best option for anomymity, see Step Three below). Setting
up a web server can be complex. We're not going to cover how to set up a web
server here. If you get stuck or want to do more, find a friend who can help
you. We recommend you install a new separate web server for your onion
service, since even if you already have one installed, you may be using it (or
want to use it later) for a normal website.

You need to configure your web server so it doesn't give away any information
about you, your computer, or your location. Be sure to bind the web server
only to localhost (if people could get to it directly, they could confirm that
your computer is the one offering the onion service). Be sure that its error
messages don't list your hostname or other hints. Consider putting the web
server in a sandbox or VM to limit the damage from code vulnerabilities.

Once your web server is set up, make sure it works: open your browser and go
to <http://localhost:8080/>, where 8080 is the webserver port you chose during
setup (you can choose any port, 8080 is just an example). Then try putting a
file in the main html directory, and make sure it shows up when you access the
site.

* * *

## Step Two: Configure your onion service

  

Next, you need to configure your onion service to point to your local web
server.

First, open your torrc file in your favorite text editor. (See [the torrc FAQ
entry](../docs/faq.html.en#torrc) to learn what this means.) Go to the middle
section and look for the line

    
    
        ############### This section is just for location-hidden services ###
        

This section of the file consists of groups of lines, each representing one
onion service. Right now they are all commented out (the lines start with #),
so onion services are disabled. Each group of lines consists of one
HiddenServiceDir line, and one or more HiddenServicePort lines:

  * HiddenServiceDir is a directory where Tor will store information about that onion service. In particular, Tor will create a file here named hostname which will tell you the onion URL. You don't need to add any files to this directory. Make sure this is not the same directory as the hidserv directory you created when setting up thttpd, as your HiddenServiceDir contains secret information!
  * HiddenServicePort lets you specify a virtual port (that is, what port people accessing the onion service will think they're using) and an IP address and port for redirecting connections to this virtual port.

Add the following lines to your torrc:

    
    
        HiddenServiceDir /Library/Tor/var/lib/tor/hidden_service/
        HiddenServicePort 80 127.0.0.1:8080
        

You're going to want to change the HiddenServiceDir line, so it points to an
actual directory that is readable/writeable by the user that will be running
Tor. The above line should work if you're using the OS X Tor package. On Unix,
try "/home/username/hidden_service/" and fill in your own username in place of
"username". On Windows you might pick:

    
    
     HiddenServiceDir C:\Users\username\Documents\tor\hidden_service
    	HiddenServicePort 80 127.0.0.1:8080 

Note that since 0.2.6, both SocksPort and HiddenServicePort support Unix
sockets. This means that you can point the HiddenServicePort to a Unix socket:

    
    
        HiddenServiceDir /Library/Tor/var/lib/tor/hidden_service/
        HiddenServicePort 80 unix:/path/to/socket
        

Now save the torrc and restart your tor.

If Tor starts up again, great. Otherwise, something is wrong. First look at
your logfiles for hints. It will print some warnings or error messages. That
should give you an idea what went wrong. Typically there are typos in the
torrc or wrong directory permissions (See [the logging FAQ
entry](../docs/faq.html.en#Logs) if you don't know how to enable or find your
log file.)

When Tor starts, it will automatically create the HiddenServiceDir that you
specified (if necessary), and it will create two files there.

private_key

    First, Tor will generate a new public/private keypair for your onion service. It is written into a file called "private_key". Don't share this key with others -- if you do they will be able to impersonate your onion service.
hostname

    The other file Tor will create is called "hostname". This contains a short summary of your public key -- it will look something like `duskgytldkxiuqc6.onion`. This is the public name for your service, and you can tell it to people, publish it on websites, put it on business cards, etc.

If Tor runs as a different user than you, for example on OS X, Debian, or Red
Hat, then you may need to become root to be able to view these files.

Now that you've restarted Tor, it is busy picking introduction points in the
Tor network, and generating an _onion service descriptor_. This is a signed
list of introduction points along with the service's full public key. It
anonymously publishes this descriptor to the directory servers, and other
people anonymously fetch it from the directory servers when they're trying to
access your service.

Try it now: paste the contents of the hostname file into your web browser. If
it works, you'll get the html page you set up in step one. If it doesn't work,
look in your logs for some hints, and keep playing with it until it works.

* * *

## Step Three: More advanced tips

  

If you plan to keep your service available for a long time, you might want to
make a backup copy of the private_key file somewhere.

If you want to forward multiple virtual ports for a single onion service, just
add more HiddenServicePort lines. If you want to run multiple onion services
from the same Tor client, just add another HiddenServiceDir line. All the
following HiddenServicePort lines refer to this HiddenServiceDir line, until
you add another HiddenServiceDir line:

    
    
        HiddenServiceDir /usr/local/etc/tor/hidden_service/
        HiddenServicePort 80 127.0.0.1:8080
    
        HiddenServiceDir /usr/local/etc/tor/other_hidden_service/
        HiddenServicePort 6667 127.0.0.1:6667
        HiddenServicePort 22 127.0.0.1:22
        

To set up an onion service on Raspbian have a look at Alec Muffett's
[Enterprise Onion Toolkit](https://github.com/alecmuffett/eotk).

Onion services operators need to practice proper [ operational
security](https://trac.torproject.org/projects/tor/wiki/doc/OperationalSecurity)
and system administration to maintain security. For some security suggestions
please make sure you read over Riseup's [ "Tor Hidden (Onion) Services Best
Practices" document](https://help.riseup.net/en/security/network-
security/tor/onionservices-best-practices). Also, here are some more anonymity
issues you should keep in mind:

  * As mentioned above, be careful of letting your web server reveal identifying information about you, your computer, or your location. For example, readers can probably determine whether it's thttpd or Apache, and learn something about your operating system.
  * If your computer isn't online all the time, your onion service won't be either. This leaks information to an observant adversary.
  * It is generally a better idea to host onion services on a Tor client rather than a Tor relay, since relay uptime and other properties are publicly visible.
  * The longer an onion service is online, the higher the risk that its location is discovered. The most prominent attacks are building a profile of the onion service's availability and matching induced traffic patterns.

Another common issue is whether to use HTTPS on your relay or not. Have a look
at this [post](https://blog.torproject.org/blog/facebook-hidden-services-and-
https-certs) on the Tor Blog to learn more about these issues.

You can use [stem](https://stem.torproject.org) to [ automate the management
of your onion
services](https://stem.torproject.org/tutorials/over_the_river.html).

Finally, feel free to use the [[tor-onions] mailing
list](https://lists.torproject.org/pipermail/tor-onions/) to discuss the
secure administration and operation of Tor onion services.

* * *

## Step Four: Set up next-gen (v3) onions

  

Since Tor 0.3.2 and [Tor Browser 7.5.a5](https://blog.torproject.org/tor-
browser-75a5-released) 56-character long v3 onion addresses are supported and
should be used instead. This newer version of onion services ("v3") features
many improvements over the legacy system:

  * Better crypto (replaced SHA1/DH/RSA1024 with SHA3/ed25519/curve25519)
  * Improved directory protocol, leaking much less information to directory servers.
  * Improved directory protocol, with smaller surface for targeted attacks.
  * Better onion address security against impersonation.
  * More extensible introduction/rendezvous protocol.
  * A cleaner and more modular codebase.

For details see [ Why are v3 onions
better?](https://trac.torproject.org/projects/tor/wiki/doc/HiddenServiceNames).
You can identify a next-generation onion address by its length: they are 56
characters long, as in
4acth47i6kxnvkewtm6q7ib2s3ufpo5sqbsnzjpbi7utijcltosqemad.onion. The
specification for next gen onion services can be found [
here](https://gitweb.torproject.org/torspec.git/tree/rend-spec-v3.txt).

### How to setup your own prop224 service

It's easy! Just use your ​regular onion service torrc and add
HiddenServiceVersion 3 in your onion service torrc block. ` Here is an example
torrc designed for testing:

    
    
    SocksPort auto
    
    HiddenServiceDir /home/user/tmp/hsv3
    HiddenServiceVersion 3
    HiddenServicePort 6667 127.0.0.1:6667
        

Then your onion address is in /home/user/tmp/hsv3/hostname. To host both a v2
and a v3 service using two onion service torrc blocks:

    
    
    HiddenServiceDir /home/user/tmp/hsv2
    HiddenServicePort 6667 127.0.0.1:6667
    
    HiddenServiceDir /home/user/tmp/hsv3
    HiddenServiceVersion 3
    HiddenServicePort 6668 127.0.0.1:6667
        

Please note that tor is strict about directory permissions and does not like
to share its files. Make sure to restrict read and write access to the onion
services directory before restarting tor. For most linux based systems

    
    
    chmod 700 -R /var/lib/tor

should be intended.

To restart tor it's safer to not use SIGHUP directly (see bug
[#21818](https://trac.torproject.org/projects/tor/ticket/21818)), but to check
the validity of the config first. On Debian based systems the services
management tool does this for you:

    
    
        service tor restart
        

### How to help the next-gen onion development

Please let us know if you find any bugs! We are still in testing & development
stage so things are very liquid and in active development. If you want to help
with development, check out the list of [ open prop224
bugs](https://trac.torproject.org/projects/tor/query?status=!closed&keywords=~prop224&order=priority).

For researchers our wiki page [ Onion Service Naming
Systems](https://trac.torproject.org/projects/tor/wiki/doc/OnionServiceNamingSystems)
could be of value. If you are more of the bug hunting type, please check our
code and spec for errors and inaccuracies. We would be thrilled to know about
them!

For debugging and to send us more helpful log files, turn on info logging:

    
    
    SafeLogging 0
    Log notice file /home/user/tmp/hs/hs.log
    Log info file /home/user/tmp/hs/hsinfo.log
        

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

