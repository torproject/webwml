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
[Debian/Ubuntu Instructions](../docs/debian.html.en)

## Option one: Tor on Debian Stretch - stable, Debian Buster - testing, or
Debian Sid - unstable

  

If you're using Debian, just run as root:

>

>     # apt install tor

Debian provides the [LTS](https://packages.debian.org/stretch/tor) version of
Tor. Note that this might not always give you the latest stable Tor version,
but you will receive important security fixes. To make sure that you're
running the latest stable version of Tor, see option two below.

When Tor is installed and running move on to [step two](../docs/tor-doc-
unix.html.en#using) of the "[Tor on Linux/Unix](../docs/tor-doc-unix.html.en)"
instructions.

* * *

## Option two: Tor on Ubuntu or Debian

**Do not use the packages in Ubuntu's universe.** In the past they have not
reliably been updated. That means you could be missing stability and security
fixes.

**Raspbian is not Debian.** Tor might run fine on the Raspberry Pi 2 / 3 but
not the first generation Pi. These packages might be confusingly broken for
Raspbian users, since Raspbian called their architecture armhf but Debian
already has an armhf. See [this
post](http://tor.stackexchange.com/questions/242/how-to-run-tor-on-raspbian-
on-the-raspberry-pi) for details.

**Admin access** : To install Tor you need root privileges. Below all commands
that need to be run as root user like apt and dpkg are prepended with '&num;',
while commands to be run as user with '$' resembling the standard prompt in a
terminal. To open a root terminal you have several options: `sudo su`, or
`sudo -i`, or `su -i`. Note that sudo asks for your user password, while su
expects the root password of your system.

**GPG** : [GNU Privacy Guard](https://gnupg.org/) version 2.1 is needed for
this guide. If you are using an older version, consider upgrading to gnupg2 or
replace 'gpg2' below with `gpg --keyserver hkp://pool.sks-keyservers.net`
since the keyserver option was mandatory for older versions.

**apt-transport-tor** : To use source lines with `https://` in
_/etc/apt/sources.list_ the [apt-transport-https
package](https://packages.debian.org/stretch/apt-transport-https) is required.
Install it with

>

>     &num; apt install apt-transport-https

>  

to enable all package managers using the libapt-pkg library to access metadata
and packages available in sources accessible over https (Hypertext Transfer
Protocol Secure).

**sources.list** : You'll need to set up our package repository before you can
fetch Tor. First, you need to figure out the name of your distribution. A
quick command to run is `lsb_release -c` or `cat /etc/debian_version`. If in
doubt about your Debian version, check [the Debian
website](https://www.debian.org/releases/). For Ubuntu, ask
[Wikipedia](https://en.wikipedia.org/wiki/List_of_Ubuntu_releases#Table_of_versions).

> I run  Debian oldstable (jessie) Debian stable (stretch) Debian testing
(buster) Debian unstable (sid) Ubuntu Trusty Tahr (14.04 LTS) Ubuntu Xenial
Xerus (16.04 LTS) Ubuntu Artful Aardvark (17.10) Ubuntu Bionic Beaver (18.04
LTS) Ubuntu Cosmic Cuttlefish (18.10) and want

You need to add the following entries to `/etc/apt/sources.list` or a new file
in `/etc/apt/sources.list.d/`:

>

>     deb https://deb.torproject.org/torproject.org jessie main

>  

Then add the gpg key used to sign the packages by running the following
commands at your command prompt:

>

>     &num; gpg2 --recv A3C4F0F979CAA22CDBA8F512EE8CBC9E886DDD89

>     &num; gpg2 --export A3C4F0F979CAA22CDBA8F512EE8CBC9E886DDD89 | apt-key
add -

>  

We provide a Debian package to help you keep our signing key current. It is
recommended you use it. Install it with the following commands:

>

>     &num; apt update

>     &num; apt install tor deb.torproject.org-keyring

>     &num; apt install build-essential fakeroot devscripts

>     &num; apt build-dep tor deb.torproject.org-keyring

>  
>  

Then you can build Tor in ~/debian-packages:

>

>     $ mkdir ~/debian-packages; cd ~/debian-packages

>     $ apt source tor

>     $ cd tor-*

>     $ debuild -rfakeroot -uc -us

>     $ cd ..

>  

Now you can install the new package:

>

>     &num; dpkg -i tor_*.deb

>  

Then add this line to your `/etc/apt/sources.list` file:  

>

>     deb     https://deb.torproject.org/torproject.org <DISTRIBUTION> main

>  

where you put the codename of your distribution (i.e. stretch, buster, sid or
whatever it is) in place of <DISTRIBUTION>.

If you want to use the [development branch](../download/download-
unix.html.en#packagediff) of Tor instead (more features and more bugs), you
need add a different set of lines to your _/etc/apt/sources.list_ file:  

>

>     deb     https://deb.torproject.org/torproject.org <DISTRIBUTION> main

>     deb     https://deb.torproject.org/torproject.org tor-
experimental-0.3.4.x-<DISTRIBUTION> main

>  

Then add the gpg key used to sign the packages by running the following
commands at your command prompt:

>

>     &num; gpg2 --recv A3C4F0F979CAA22CDBA8F512EE8CBC9E886DDD89

>     &num; gpg2 --export A3C4F0F979CAA22CDBA8F512EE8CBC9E886DDD89 | apt-key
add -

>  

Now refresh your sources, running the following command (as root) at your
command prompt:

>

>     &num; apt update

>  

If there are no errors you're good to continue.

We provide a Debian package to help you keep our signing key current. It is
recommended you use it. Install it together with tor:

>

>     &num; apt install tor deb.torproject.org-keyring

>  

* * *

## Building from source

If you want to build your own debs from source you must first add an
appropriate ` deb-src` line to `sources.list`.

>

>     &num; For the stable version.

>     deb-src https://deb.torproject.org/torproject.org <DISTRIBUTION> main

>  
>     &num; For the unstable version.

>     deb-src https://deb.torproject.org/torproject.org <DISTRIBUTION> main

>     deb-src https://deb.torproject.org/torproject.org tor-
experimental-0.3.4.x-<DISTRIBUTION> main

>  

Substitute the name of your distro (stretch, buster, sid, xenial, ...) in
place of <DISTRIBUTION>. Now refresh your sources by running (as root):

>

>     &num; apt update

>  

You also need to install the necessary packages to build your own debs and the
packages needed to build Tor:

>

>     &num; apt install build-essential fakeroot devscripts

>     &num; apt build-dep tor

>  

Then you can build Tor in ~/debian-packages:

>

>     $ mkdir ~/debian-packages; cd ~/debian-packages

>     $ apt source tor

>     $ cd tor-*

>     $ debuild -rfakeroot -uc -us

>     $ cd ..

>  

Now you can install the new package:

>

>     &num; dpkg -i tor_*.deb

>  

Now Tor is installed and running. Move on to [step two](../docs/tor-doc-
unix.html.en#using) of the "Tor on Linux/Unix" instructions.

The DNS name `deb.torproject.org` is actually a set of independent servers in
a DNS round robin configuration. If you for some reason cannot access it you
might try to use the name of one of its part instead. Try `deb-
master.torproject.org`, `mirror.netcologne.de` or `tor.mirror.youam.de`.

* * *

## Use Apt over Tor

`deb.torproject.org` is also served through via an onion service:
[http://sdscoq7snqtznauu.onion/](http://sdscoq7snqtznauu.onion)

To use Apt with Tor the according apt transport needs to be installed:

>

>     &num; apt install apt-transport-tor

>  

Then replace the address in the lines added before with, for example:

>

>     &num; For the stable version.

>     deb tor://sdscoq7snqtznauu.onion/torproject.org <DISTRIBUTION> main

>  
>     &num; For the unstable version.

>     deb tor://sdscoq7snqtznauu.onion/torproject.org tor-nightly-
master-<DISTRIBUTION> main

>  

Now refresh your sources and try if it's still possible to install tor:

>

>     &num; apt update

>     &num; apt install tor

>  

See [onion.torproject.org](https://onion.torproject.org/) for all
torproject.org onion addresses.

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

