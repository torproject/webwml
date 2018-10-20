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
[Running a Mirror](../docs/running-a-mirror.html.en)

# Tor: Running a Mirror

* * *

Thank you for wanting to mirror the Tor website. All of our mirrors are
publicly listed on [our mirrors page](../getinvolved/mirrors.html.en). We've
included some sample commands and configuration below to make the initial
setup and ongoing maintenance a minimal effort. The Tor website and
distribution directory currently require roughly 30 GB of disk space, but this
number can fluctuate. Expect space requirements of up to 50 GB.

## Configuring your System

If you would like to run a mirror, it's as easy as these commands to download
everything a mirror should share with the world:

`

    
    
    rsync -aq --exclude dist --delete rsync://rsync.torproject.org/website-mirror/ /var/www/mirrors/torproject.org
    rsync -aq --delete rsync://rsync.torproject.org/dist-mirror/ /var/www/mirrors/torproject.org/dist
    

`

In order to assure we have reliable and up to date mirrors, please ensure your
mirror does at least the following:  
  
Updates **no less** than every six hours, but no more frequent than every
hour.  
  
Allows "Directory Index / Indexes" (Index viewing) of the /dist directory.  
  
Have a valid contact email for administrative communications should your
server have issues.  
  
It is highly recommended for all mirror operators to subscribe to [tor-mirrors
mailing list](https://lists.torproject.org/cgi-bin/mailman/listinfo/tor-
mirrors) where all mirror listing modification requests should go (ADD,
CHANGE, DELETE, any other requests/notifications). Also, any technical
assistance in setting up your mirror may be found here as well.  
  

  
  

An example cronjob to update a full mirror once every 6 hours may look like
so:

`

    
    
    0 */6 * * * rsync -aq --exclude dist --delete rsync://rsync.torproject.org/website-mirror/ /var/www/mirrors/torproject.org
    5 */6 * * * rsync -aq --delete rsync://rsync.torproject.org/dist-mirror/ /var/www/mirrors/torproject.org/dist
    

`

For mirror operators that use Apache, we have created a sample virtual host
configuration file to use:

`

    
    
    <VirtualHost 10.10.10.10:80>
        ServerAdmin youremail@example.com  
    
        ServerName  ServerNameHere  
    
    
        DocumentRoot /var/www/mirrors/torproject.org  
    
    
         <Directory /var/www/mirrors/torproject.org/>  
    
            Options MultiViews Indexes  
    
            DirectoryIndex index  
    
            AllowOverride None  
    
        </Directory>  
    
    
    </VirtualHost>
    

`

For mirror operators that use nginx, we created a sample virtual host
configuration file to use:

`

    
    
    server {
        listen 10.10.10.10:80;
        server_name your.example.com;
    
        root /var/www/mirrors/torproject.org;
        index index.html.en;
    
        location  / {
            autoindex on;
        }
    }
    

`

If you use nginx, please ensure the text/html line in `/etc/nginx/mime.types`
matches:

`

    
    
    text/html                             en html htm shtml;
    

`  
  
Please ensure that you keep your mirror updated (we suggest automating this
task with something like '`cron`'). Our website, source code and binary
releases change often. An update frequency of six hours is recommended. Tor
users everywhere will thank you.

  

## Joining the mirror community

If you are running a mirror, please subscribe to the [tor-mirrors mailing
list](https://lists.torproject.org/cgi-bin/mailman/listinfo/tor-mirrors), and
introduce yourself there. Help for mirror support and configuration issues may
also be found on the list.

In order to add your mirror, please send a single, comma delimited line of
text based on [this
file](https://gitweb.torproject.org/project/web/webwml.git/plain/include/tor-
mirrors.csv) to the mirrors list. Your mirror will then be added manually if
it passes availability testing and your provided information is confirmed.
Some general pointers on mirrors are:

  1. Try not to run your mirror behind a content delivery network (such as Akamai, Cloudflare, Fastly, etc) as most of them block access from countries where the mirror is needed the most.
  2. Try not to redirect http to https. Many places in the world cannot use https due to local or national firewalls.

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

