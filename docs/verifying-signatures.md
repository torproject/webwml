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

[Home » ](../index.html.en) [Verifying Signatures](../docs/verifying-
signatures.html.en)

# How to verify signatures for packages

* * *

Digital signature is a process ensuring that a certain package was generated
by its developers and has not been tampered with. Below we explain why it is
important and how to verify that the Tor program you download is the one we
have created and has not been modified by some attacker.

Digital signature is a cryptographic mechanism. If you want to learn more
about how it works see [
https://en.wikipedia.org/wiki/Digital_signature](https://en.wikipedia.org/wiki/Digital_signature).

### What is a signature and why should I check it?

* * *

How do you know that the Tor program you have is really the one we made?
Digital signatures ensure that the package you are downloading was created by
our developers. It uses a cryptographic mechanism to ensure that the software
package that you have just downloaded is authentic.

For many Tor users it is important to verify that the Tor software is
authentic as they have very real adversaries who might try to give them a fake
version of Tor.

If the Tor package has been modified by some attacker it is not safe to use.
It doesn't matter how secure and anonymous Tor is if you're not running the
real Tor.

Before you go ahead and download something, there are a few extra steps you
should take to make sure you have downloaded an authentic version of Tor.

#### Always download Tor from torproject.org

There are a variety of attacks that can be used to make you download a fake
version of Tor. For example, an attacker could trick you into thinking some
other website is a great place to download Tor. You should always download Tor
from [**https** ://www.torproject.org/](https://www.torproject.org).

#### Always make sure you are browsing over https

[https://www.torproject.org/](https://www.torproject.org) uses https. Https is
the secure version of the http protocol which uses encryption and
authentication between your browser and the website. This makes it much harder
for the attacker to modify your download. But it's not perfect. Some places in
the world block the Tor website, making users to download Tor [somewhere
else](../docs/faq.html.en#GetTor).

Large companies sometimes force employees to use a modified browser, so the
company can listen in on all their browsing. We've even
[seen](https://blog.torproject.org/blog/diginotar-debacle-and-what-you-should-
do-about-it) attackers who have the ability to trick your browser into
thinking you're talking to the Tor website with https when you're not.

#### Always verify signatures of packages you have downloaded

Some software sites list [sha1
hashes](https://en.wikipedia.org/wiki/Cryptographic_hash_function) alongside
the software on their website, so users can verify that they downloaded the
file without any errors. These "checksums" help you answer the question "Did I
download this file correctly from whoever sent it to me?" They do a good job
at making sure you didn't have any random errors in your download, but they
don't help you figure out whether you were downloading it from the attacker.
The better question to answer is: "Is this file that I just downloaded the
file that Tor intended me to get?"

### Where do I get the signatures and the keys that made them?

* * *

Each file on [our download page](../download/download.html.en) is accompanied
by a file with the same name as the package and the extension ".asc". These
.asc files are GPG signatures. They allow you to verify the file you've
downloaded is exactly the one that we intended you to get. For example,
torbrowser-install-8.0.2_en-US.exe is accompanied by torbrowser-
install-8.0.2_en-US.exe.asc. For a list of which developer signs which
package, see our [signing keys](../docs/signing-keys.html.en) page.

We now show how you can verify the downloaded file's digital signature on
different operating systems. Please notice that a signature is dated the
moment the package has been signed. Therefore every time a new file is
uploaded a new signature is generated with a different date. As long as you
have verified the signature you should not worry that the reported date may
vary.

### Windows

* * *

First of all you need to have GnuPG installed before you can verify
signatures. Download it from <https://gpg4win.org/download.html>.

Once it's installed, use GnuPG to import the key that signed your package. In
order to verify the signature you will need to type a few commands in windows
command-line, _cmd.exe_.

The Tor Browser team signs Tor Browser releases. Import its key
(0x4E2C6E8793298290) by starting _cmd.exe_ and typing:

    
    
    gpg.exe --keyserver pool.sks-keyservers.net --recv-keys 0x4E2C6E8793298290

After importing the key, you can verify that the fingerprint is correct:

    
    
    gpg.exe --fingerprint 0x4E2C6E8793298290

You should see:

    
    
    pub   rsa4096/0x4E2C6E8793298290 2014-12-15 [C] [expires: 2020-08-24]
          Key fingerprint = EF6E 286D DA85 EA2A 4BA7  DE68 4E2C 6E87 9329 8290
    uid                   [ unknown] Tor Browser Developers (signing key) <torbrowser&at;torproject.org>
    sub   rsa4096/0xD1483FA6C3C07136 2016-08-24 [S] [expires: 2018-08-24]
          Key fingerprint = A430 0A6B C93C 0877 A445  1486 D148 3FA6 C3C0 7136
    sub   rsa4096/0xEB774491D9FF06E2 2018-05-26 [S] [expires: 2020-09-12]
          Key fingerprint = 1107 75B5 D101 FB36 BC6C  911B EB77 4491 D9FF 06E2
    

To verify the signature of the package you downloaded, you will need to
download the ".asc" file as well. Assuming you downloaded the package and its
signature to your Desktop, run:

    
    
    gpg.exe --verify C:\Users\Alice\Desktop\torbrowser-install-8.0.2_en-US.exe.asc

Please substitute "Alice" with your own username.

The output should say "Good signature":

    
    
    gpg: assuming signed data in 'torbrowser-install-8.0.2_en-US.exe'
    gpg: Signature made Wed 15 Nov 2017 05:52:38 PM CET
    gpg:                using RSA key 0xD1483FA6C3C07136
    gpg: Good signature from "Tor Browser Developers (signing key) <torbrowser&at;torproject.org>" [unknown]
    gpg: WARNING: This key is not certified with a trusted signature!
    gpg:          There is no indication that the signature belongs to the owner.
    Primary key fingerprint: EF6E 286D DA85 EA2A 4BA7  DE68 4E2C 6E87 9329 8290
         Subkey fingerprint: A430 0A6B C93C 0877 A445  1486 D148 3FA6 C3C0 7136
        
    
    Currently valid subkey fingerprints are:
    
    
        
    
    
    1107 75B5 D101 FB36 BC6C  911B EB77 4491 D9FF 06E2
        

Notice that there is a warning because you haven't assigned a trust index to
this person. This means that GnuPG verified that the key made that signature,
but it's up to you to decide if that key really belongs to the developer. The
best method is to meet the developer in person and exchange key fingerprints.

### Mac OS X and Linux

* * *

You need to have GnuPG installed before you can verify signatures. If you are
using Mac OS X, you can install it from <https://www.gpgtools.org/>. If you
are using Linux, then it's probably you already have GnuPG in your system, as
most Linux distributions come with it preinstalled.

The next step is to use GnuPG to import the key that signed your package. The
Tor Browser team signs Tor Browser releases. Import its key
(0x4E2C6E8793298290) by starting the terminal (under "Applications" in Mac OS
X) and typing:

    
    
    gpg --keyserver pool.sks-keyservers.net --recv-keys 0x4E2C6E8793298290

After importing the key, you can verify that the fingerprint is correct:

    
    
    gpg --fingerprint 0x4E2C6E8793298290

You should see:

    
    
    pub   rsa4096/0x4E2C6E8793298290 2014-12-15 [C] [expires: 2020-08-24]
          Key fingerprint = EF6E 286D DA85 EA2A 4BA7  DE68 4E2C 6E87 9329 8290
    uid                   [ unknown] Tor Browser Developers (signing key) <torbrowser&at;torproject.org>
    sub   rsa4096/0xD1483FA6C3C07136 2016-08-24 [S] [expires: 2018-08-24]
          Key fingerprint = A430 0A6B C93C 0877 A445  1486 D148 3FA6 C3C0 7136
    sub   rsa4096/0xEB774491D9FF06E2 2018-05-26 [S] [expires: 2020-09-12]
          Key fingerprint = 1107 75B5 D101 FB36 BC6C  911B EB77 4491 D9FF 06E2
        

To verify the signature of the package you downloaded, you will need to
download the ".asc" file as well. Assuming you downloaded the package and its
signature to your Downloads folder, run:

**For Mac OS X users** :  

    
    
    gpg --verify ~/Downloads/TorBrowser-8.0.2-osx64_en-US.dmg{.asc*,}

**For Linux users** (change 64 to 32 if you have the 32-bit package):  

    
    
    gpg --verify tor-browser-linux64-8.0.2_en-US.tar.xz.asc

The output should say "Good signature":

    
    
    gpg: assuming signed data in 'tor-browser-linux64-8.0.2_en-US.tar.xz'
    gpg: Signature made Wed 15 Nov 2017 05:52:38 PM CET
    gpg:                using RSA key 0xD1483FA6C3C07136
    gpg: Good signature from "Tor Browser Developers (signing key) <torbrowser&at;torproject.org>" [unknown]
    gpg: WARNING: This key is not certified with a trusted signature!
    gpg:          There is no indication that the signature belongs to the owner.
    Primary key fingerprint: EF6E 286D DA85 EA2A 4BA7  DE68 4E2C 6E87 9329 8290
         Subkey fingerprint: A430 0A6B C93C 0877 A445  1486 D148 3FA6 C3C0 7136
        

Currently valid subkey fingerprints are:

    
    
    1107 75B5 D101 FB36 BC6C  911B EB77 4491 D9FF 06E2
        

Notice that there is a warning because you haven't assigned a trust index to
this person. This means that GnuPG verified that the key made that signature,
but it's up to you to decide if that key really belongs to the developer. The
best method is to meet the developer in person and exchange key fingerprints.

If you're a Linux user and you're using the **Debian** Tor (not Tor Browser)
packages, you should read the instructions on [importing these keys to
apt](../docs/debian.html.en#packages). If you're using the **RPMs** (for Tor,
not Tor Browser), you can manually verify the signatures on the RPM packages
by

    
    
    rpm -K filename.rpm

See <https://www.gnupg.org/documentation/> to learn more about GnuPG.

* * *

###  Verifying sha256sums (advanced)

* * *

Build reproducibility is a [security
property](https://blog.torproject.org/blog/deterministic-builds-part-one-
cyberwar-and-global-compromise) of Tor Browser 3.0 and later. Anyone can build
Tor Browser on their own machine and produce a binary that is bit-for-bit
identical to the binary we offer on the download page. Fortunately, it is not
necessary for everyone to build Tor Browser locally to get this security.
Verifying and comparing the signed list of
[hashes](https://en.wikipedia.org/wiki/Cryptographic_hash) will confirm that
multiple people have built Tor Browsers identical to the download.

The steps below walk through this process:

  * Download the Tor Browser package, the `sha256sums-unsigned-build.txt` file, and the `sha256sums-unsigned-build.txt.asc` signature file. They can all be found in the same directory under [ https://www.torproject.org/dist/torbrowser/](https://www.torproject.org/dist/torbrowser/), for example in '8.0.2' for Tor Browser 8.0.2.
  * In case your operating system is adding the .txt extension automatically to the SHA256 sums signature file strip it again by running 
    
        mv sha256sums-unsigned-build.txt.asc.txt sha256sums-unsigned-build.txt.asc

  * Retrieve the signers' GPG keys. This can be done from the command line by entering something like 
    
        gpg --keyserver keys.mozilla.org --recv-keys 0x4E2C6E8793298290

(This will bring you the public part of the Tor Browser developers' signing
key. Other developers' key IDs can be found on [this page](../docs/signing-
keys.html.en).)

  * Verify the sha256sums-unsigned-build.txt file by executing this command: 
    
        gpg --verify sha256sums-unsigned-build.txt.asc sha256sums-unsigned-build.txt

  * You should see a message like "Good signature from <DEVELOPER NAME>". If you don't, there is a problem. Try these steps again.
  * If you want to verify a Windows Tor Browser package you need to first strip off the authenticode signature of it. Tools that can be used for this purpose are [osslsigncode](http://osslsigncode.sourceforge.net) and [delcert.exe](http://forum.xda-developers.com/showthread.php?t=416175). Assuming you have built e.g. `osslsigncode` on a Linux computer you can enter 
    
        /path/to/your/osslsigncode remove-signature \
            /path/to/your/<TOR BROWSER FILE NAME>.exe <TOR BROWSER FILE NAME>.exe

  * Now you can take the sha256sum of the Tor Browser package. On Windows you can use the [ hashdeep utility](http://md5deep.sourceforge.net/) and run 
    
        C:\location\where\you\saved\hashdeep -c sha256sum <TOR BROWSER FILE NAME>.exe

On Linux you can run

    
        sha256sum <TOR BROWSER FILE NAME>.tar.gz

without having to download a utility. Note: this does not work for OS X yet
due to Apple's codesigning requirement.

  * You will see a string of letters and numbers.
  * Open `sha256sums-unsigned-build.txt` in a text editor.
  * Locate the name of the Tor Browser file you downloaded.
  * Compare the string of letters and numbers to the left of your filename with the string of letters and numbers that appeared on your command line. If they match, you've successfully verified the build.

[Scripts](https://github.com/isislovecruft/scripts/blob/master/verify-gitian-
builder-signatures) to
[automate](https://tor.stackexchange.com/questions/648/how-to-verify-tor-
browser-bundle-tbb-3-x) these steps have been written, but to use them you
will need to modify them yourself with the latest Tor Browser filename.

* * *

###  Verifying MAR files we ship (advanced)

* * *

Starting with Tor Browser 4.5a4 we sign our MAR files which helps securing our
update process. The downside of this is the need for additional instructions
to verify that the MAR files we ship are indeed the ones we produced with our
rbm setup.

Assuming the verification happens on a Linux computer one first needs the
`mar-tools-linux*.zip` out of the `gitian-builder/inputs` directory to remove
the embedded signature(s). The steps to get the unsigned MAR file on a 64 bit
Linux are

    
    
        cd /path/to/MAR/file
        unzip /path/to/gitian-builder/inputs/mar-tools-linux64.zip
        export LD_LIBRARY_PATH=/path/to/MAR/file/mar-tools
        mar-tools/signmar -r your-signed-mar-file.mar your-unsigned-mar-file.mar

Now you can compare the SHA256 sum of `your-unsigned-mar-file.mar` with the
one provided in the `sha265sums-unsigned-build.txt` or `sha256sums-unsigned-
build.incremental.txt` as outlined in Verifying sha256sums (advancded) above.

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

