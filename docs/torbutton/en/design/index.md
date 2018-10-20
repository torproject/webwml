## Torbutton Design Documentation

### Mike Perry

`<[mikeperry.fscked/org](mailto:mikeperry.fscked/org)>`

Apr 10 2011

* * *

 **Table of Contents**

1\. Introduction

    

1.1. Adversary Model

1.2. Torbutton Requirements

1.3. Extension Layout

2\. Components

    

2.1. Hooked Components

2.2. New Components

3\. Chrome

    

3.1. XUL Windows and Overlays

3.2. Major Chrome Observers

4\. Toggle Code Path

    

4.1. Button Click

4.2. Proxy Update

4.3. Settings Update

4.4. Firefox preferences touched during Toggle

5\. Description of Options

    

5.1. Proxy Settings

5.2. Dynamic Content Settings

5.3. History and Forms Settings

5.4. Cache Settings

5.5. Cookie and Auth Settings

5.6. Startup Settings

5.7. Shutdown Settings

5.8. Header Settings

6\. Relevant Firefox Bugs

    

6.1. Tor Browser Bugs

6.2. Toggle Model Bugs

7\. Testing

    

7.1. Single state testing

7.2. Multi-state testing

7.3. Active testing (aka How to Hack Torbutton)

## 1\. Introduction

This document describes the goals, operation, and testing procedures of the
Torbutton Firefox extension. It is current as of Torbutton 1.3.2.

### 1.1. Adversary Model

A Tor web browser adversary has a number of goals, capabilities, and attack
types that can be used to guide us towards a set of requirements for the
Torbutton extension. Let's start with the goals.

#### Adversary Goals

  1.  **Bypassing proxy settings**

The adversary's primary goal is direct compromise and bypass of Tor, causing
the user to directly connect to an IP of the adversary's choosing.

  2.  **Correlation of Tor vs Non-Tor Activity**

If direct proxy bypass is not possible, the adversary will likely happily
settle for the ability to correlate something a user did via Tor with their
non-Tor activity. This can be done with cookies, cache identifiers, javascript
events, and even CSS. Sometimes the fact that a user uses Tor may be enough
for some authorities.

  3.  **History disclosure**

The adversary may also be interested in history disclosure: the ability to
query a user's history to see if they have issued certain censored search
queries, or visited censored sites.

  4. **Location information**

Location information such as timezone and locality can be useful for the
adversary to determine if a user is in fact originating from one of the
regions they are attempting to control, or to zero-in on the geographical
location of a particular dissident or whistleblower.

  5. **Miscellaneous anonymity set reduction**

Anonymity set reduction is also useful in attempting to zero in on a
particular individual. If the dissident or whistleblower is using a rare build
of Firefox for an obscure operating system, this can be very useful
information for tracking them down, or at least tracking their activities.

  6. **History records and other on-disk information**

In some cases, the adversary may opt for a heavy-handed approach, such as
seizing the computers of all Tor users in an area (especially after narrowing
the field by the above two pieces of information). History records and cache
data are the primary goals here.

#### Adversary Capabilities - Positioning

The adversary can position themselves at a number of different locations in
order to execute their attacks.

  1. **Exit Node or Upstream Router**

The adversary can run exit nodes, or alternatively, they may control routers
upstream of exit nodes. Both of these scenarios have been observed in the
wild.

  2. **Adservers and/or Malicious Websites**

The adversary can also run websites, or more likely, they can contract out ad
space from a number of different adservers and inject content that way. For
some users, the adversary may be the adservers themselves. It is not
inconceivable that adservers may try to subvert or reduce a user's anonymity
through Tor for marketing purposes.

  3. **Local Network/ISP/Upstream Router**

The adversary can also inject malicious content at the user's upstream router
when they have Tor disabled, in an attempt to correlate their Tor and Non-Tor
activity.

  4. **Physical Access**

Some users face adversaries with intermittent or constant physical access.
Users in Internet cafes, for example, face such a threat. In addition, in
countries where simply using tools like Tor is illegal, users may face
confiscation of their computer equipment for excessive Tor usage or just
general suspicion.

#### Adversary Capabilities - Attacks

The adversary can perform the following attacks from a number of different
positions to accomplish various aspects of their goals. It should be noted
that many of these attacks (especially those involving IP address leakage) are
often performed by accident by websites that simply have Javascript, dynamic
CSS elements, and plugins. Others are performed by adservers seeking to
correlate users' activity across different IP addresses, and still others are
performed by malicious agents on the Tor network and at national firewalls.

  1. **Inserting Javascript**

If not properly disabled, Javascript event handlers and timers can cause the
browser to perform network activity after Tor has been disabled, thus allowing
the adversary to correlate Tor and Non-Tor activity and reveal a user's non-
Tor IP address. Javascript also allows the adversary to execute [history
disclosure attacks](http://whattheinternetknowsaboutyou.com/): to query the
history via the different attributes of 'visited' links to search for
particular Google queries, sites, or even to [profile users based on gender
and other classifications](http://www.mikeonads.com/2008/07/13/using-your-
browser-url-history-estimate-gender/). Finally, Javascript can be used to
query the user's timezone via the `Date()` object, and to reduce the anonymity
set by querying the `navigator` object for operating system, CPU, locale, and
user agent information.

  2. **Inserting Plugins**

Plugins are abysmal at obeying the proxy settings of the browser. Every plugin
capable of performing network activity that the author has investigated is
also capable of performing network activity independent of browser proxy
settings - and often independent of its own proxy settings. Sites that have
plugin content don't even have to be malicious to obtain a user's Non-Tor IP
(it usually leaks by itself), though plenty of active exploits are possible as
well. In addition, plugins can be used to store unique identifiers that are
more difficult to clear than standard cookies. [Flash-based
cookies](http://epic.org/privacy/cookies/flash.html) fall into this category,
but there are likely numerous other examples.

  3. **Inserting CSS**

CSS can also be used to correlate Tor and Non-Tor activity and reveal a user's
Non-Tor IP address, via the usage of [CSS
popups](http://www.tjkdesign.com/articles/css%20pop%20ups/) \- essentially
CSS-based event handlers that fetch content via CSS's onmouseover attribute.
If these popups are allowed to perform network activity in a different Tor
state than they were loaded in, they can easily correlate Tor and Non-Tor
activity and reveal a user's IP address. In addition, CSS can also be used
without Javascript to perform [CSS-only history disclosure
attacks](http://ha.ckers.org/weird/CSS-history.cgi).

  4. **Read and insert cookies**

An adversary in a position to perform MITM content alteration can inject
document content elements to both read and inject cookies for arbitrary
domains. In fact, many "SSL secured" websites are vulnerable to this sort of
[active sidejacking](http://seclists.org/bugtraq/2007/Aug/0070.html).

  5. **Create arbitrary cached content**

Likewise, the browser cache can also be used to [store unique
identifiers](http://crypto.stanford.edu/sameorigin/safecachetest.html). Since
by default the cache has no same-origin policy, these identifiers can be read
by any domain, making them an ideal target for adserver-class adversaries.

  6. **Fingerprint users based on browser attributes**

There is an absurd amount of information available to websites via attributes
of the browser. This information can be used to reduce anonymity set, or even
[uniquely fingerprint individual
users](http://mandark.fr/0x000000/articles/Total_Recall_On_Firefox..html).

For illustration, let's perform a back-of-the-envelope calculation on the
number of anonymity sets for just the resolution information available in the
[window](http://developer.mozilla.org/en/docs/DOM:window) and
[window.screen](http://developer.mozilla.org/en/docs/DOM:window.screen)
objects. Browser window resolution information provides something like
(1280-640)*(1024-480)=348160 different anonymity sets. Desktop resolution
information contributes about another factor of 5 (for about 5 resolutions in
typical use). In addition, the dimensions and position of the desktop taskbar
are available, which can reveal hints on OS information. This boosts the count
by a factor of 5 (for each of the major desktop taskbars - Windows, Mac OS X,
KDE and Gnome, and None). Subtracting the browser content window size from the
browser outer window size provide yet more information. Firefox toolbar
presence gives about a factor of 8 (3 toolbars on/off give 2 3=8). Interface
effects such as title bar font size and window manager settings gives a factor
of about 9 (say 3 common font sizes for the title bar and 3 common sizes for
browser GUI element fonts). Multiply this all out, and you have
(1280-640)*(1024-480)*5*5*8*9 ~= 229, or a 29 bit identifier based on
resolution information alone.

Of course, this space is non-uniform in user density and prone to incremental
changes. The [Panopticlick study
done](https://wiki.mozilla.org/Fingerprinting#Data) by the EFF attempts to
measure the actual entropy - the number of identifying bits of information
encoded in browser properties. Their result data is definitely useful, and the
metric is probably the appropriate one for determining how identifying a
particular browser property is. However, some quirks of their study means that
they do not extract as much information as they could from display
information: they only use desktop resolution (which Torbutton reports as the
window resolution) and do not attempt to infer the size of toolbars.

  7. **Remotely or locally exploit browser and/or OS**

Last, but definitely not least, the adversary can exploit either general
browser vulnerabilities, plugin vulnerabilities, or OS vulnerabilities to
install malware and surveillance software. An adversary with physical access
can perform similar actions. Regrettably, this last attack capability is
outside of Torbutton's ability to defend against, but it is worth mentioning
for completeness.

### 1.2. Torbutton Requirements

### Note

Since many settings satisfy multiple requirements, this design document is
organized primarily by Torbutton components and settings. However, if you are
the type that would rather read the document from the requirements
perspective, it is in fact possible to search for each of the following
requirement phrases in the text to find the relevant features that help meet
that requirement.

From the above Adversary Model, a number of requirements become clear.

  1. **Proxy Obedience**

The browser MUST NOT bypass Tor proxy settings for any content.

  2.  **State Separation**

Browser state (cookies, cache, history, 'DOM storage'), accumulated in one Tor
state MUST NOT be accessible via the network in another Tor state.

  3.  **Network Isolation**

Pages MUST NOT perform any network activity in a Tor state different from the
state they were originally loaded in.

Note that this requirement is being de-emphasized due to the coming shift to
supporting only the Tor Browser Bundles, which do not support a Toggle
operation.

  4.  **Tor Undiscoverability**

With the advent of bridge support in Tor 0.2.0.x, there are now a class of Tor
users whose network fingerprint does not obviously betray the fact that they
are using Tor. This should extend to the browser as well - Torbutton MUST NOT
reveal its presence while Tor is disabled.

Note that this requirement is being de-emphasized due to the coming shift to
supporting only the Tor Browser Bundles, which do not support a Toggle
operation.

  5.  **Disk Avoidance**

The browser SHOULD NOT write any Tor-related state to disk, or store it in
memory beyond the duration of one Tor toggle.

  6.  **Location Neutrality**

The browser SHOULD NOT leak location-specific information, such as timezone or
locale via Tor.

  7.  **Anonymity Set Preservation**

The browser SHOULD NOT leak any other anonymity set reducing or fingerprinting
information (such as user agent, extension presence, and resolution
information) automatically via Tor. The assessment of the attacks above should
make it clear that anonymity set reduction is a very powerful method of
tracking and eventually identifying anonymous users.

  8. **Update Safety**

The browser SHOULD NOT perform unauthenticated updates or upgrades via Tor.

  9.  **Interoperability**

Torbutton SHOULD interoperate with third-party proxy switchers that enable the
user to switch between a number of different proxies. It MUST provide full Tor
protection in the event a third-party proxy switcher has enabled the Tor proxy
settings.

### 1.3. Extension Layout

Firefox extensions consist of two main categories of code: 'Components' and
'Chrome'. Components are a fancy name for classes that implement a given
interface or interfaces. In Firefox, components [can be
written](https://developer.mozilla.org/en/XPCOM) in C++, Javascript, or a
mixture of both. Components have two identifiers: their '[Contract
ID](http://www.mozilla.org/projects/xpcom/book/cxc/html/quicktour2.html#1005005)'
(a human readable path-like string), and their '[Class
ID](http://www.mozilla.org/projects/xpcom/book/cxc/html/quicktour2.html#1005329)'
(a GUID hex-string). In addition, the interfaces they implement each have a
hex 'Interface ID'. It is possible to 'hook' system components - to
reimplement their interface members with your own wrappers - but only if the
rest of the browser refers to the component by its Contract ID. If the browser
refers to the component by Class ID, it bypasses your hooks in that use case.
Technically, it may be possible to hook Class IDs by unregistering the
original component, and then re-registering your own, but this relies on
obsolete and deprecated interfaces and has proved to be less than stable.

'Chrome' is a combination of XML and Javascript used to describe a window.
Extensions are allowed to create 'overlays' that are 'bound' to existing XML
window definitions, or they can create their own windows. The DTD for this XML
is called [XUL](http://developer.mozilla.org/en/docs/XUL_Reference).

## 2\. Components

Torbutton installs components for two purposes: hooking existing components to
reimplement their interfaces; and creating new components that provide
services to other pieces of the extension.

### 2.1. Hooked Components

Torbutton makes extensive use of Contract ID hooking, and implements some of
its own standalone components as well. Let's discuss the hooked components
first.

#### [@mozilla.org/uriloader/external-protocol-service;1
](http://www.oxymoronical.com/experiments/xpcomref/applications/Firefox/3.5/components/%40mozilla.org/uriloader/external-
protocol-service%3B1), [@mozilla.org/uriloader/external-helper-app-
service;1](http://www.oxymoronical.com/experiments/xpcomref/applications/Firefox/3.5/components/%40mozilla.org/uriloader/external-
helper-app-service%3B1), and
[@mozilla.org/mime;1](http://www.oxymoronical.com/experiments/xpcomref/applications/Firefox/3.5/components/%40mozilla.org/mime%3B1)
\- [components/external-app-
blocker.js](https://gitweb.torproject.org/torbutton.git/blob_plain/HEAD:/src/components/external-
app-blocker.js)

Due to Firefox Bug
[440892](https://bugzilla.mozilla.org/show_bug.cgi?id=440892) allowing Firefox
3.x to automatically launch some applications without user intervention,
Torbutton had to wrap the three components involved in launching external
applications to provide user confirmation before doing so while Tor is
enabled. Since external applications do not obey proxy settings, they can be
manipulated to automatically connect back to arbitrary servers outside of Tor
with no user intervention. Fixing this issue helps to satisfy Torbutton's
Proxy Obedience Requirement.

#### [@mozilla.org/browser/global-
history;2](http://www.oxymoronical.com/experiments/xpcomref/applications/Firefox/3.5/components/%40mozilla.org/browser/global-
history;2) \- [components/ignore-
history.js](https://gitweb.torproject.org/torbutton.git/blob_plain/HEAD:/src/components/ignore-
history.js)

This component was contributed by [Collin
Jackson](http://www.collinjackson.com/) as a method for defeating CSS and
Javascript-based methods of history disclosure. The global-history component
is what is used by Firefox to determine if a link was visited or not (to apply
the appropriate style to the link). By hooking the
[isVisited](https://developer.mozilla.org/en/nsIGlobalHistory2#isVisited.28.29)
and [addURI](https://developer.mozilla.org/en/nsIGlobalHistory2#addURI.28.29)
methods, Torbutton is able to selectively prevent history items from being
added or being displayed as visited, depending on the Tor state and the user's
preferences.

This component helps satisfy the State Separation and Disk Avoidance
requirements of Torbutton. It is only needed for Firefox 3.x. On Firefox 4, we
omit this component in favor of the [built-in history
protections](https://developer.mozilla.org/en/CSS/Privacy_and_the_%3avisited_selector).

#### [@mozilla.org/browser/livemark-
service;2](http://www.oxymoronical.com/experiments/xpcomref/applications/Firefox/3.5/components/%40mozilla.org/browser/livemark-
service;2) \- [components/block-
livemarks.js](https://gitweb.torproject.org/torbutton.git/blob_plain/HEAD:/src/components/block-
livemarks.js)

The [livemark](http://www.mozilla.com/en-US/firefox/livebookmarks.html)
service is started by a timer that runs 5 seconds after Firefox startup. As a
result, we cannot simply call the stopUpdateLivemarks() method to disable it.
We must wrap the component to prevent this start() call from firing in the
event the browser starts in Tor mode.

This component helps satisfy the Network Isolation and Anonymity Set
Preservation requirements.

### 2.2. New Components

Torbutton creates four new components that are used throughout the extension.
These components do not hook any interfaces, nor are they used anywhere
besides Torbutton itself.

#### [@torproject.org/cookie-jar-selector;2 \- components/cookie-jar-
selector.js](https://gitweb.torproject.org/torbutton.git/blob_plain/HEAD:/src/components/cookie-
jar-selector.js)

The cookie jar selector (also based on code from [Collin
Jackson](http://www.collinjackson.com/)) is used by the Torbutton chrome to
switch between Tor and Non-Tor cookies. It stores an XML representation of the
current cookie state in memory and/or on disk. When Tor is toggled, it syncs
the current cookies to this XML store, and then loads the cookies for the
other state from the XML store.

This component helps to address the State Isolation requirement of Torbutton.

#### [@torproject.org/torbutton-logger;1 \- components/torbutton-
logger.js](https://gitweb.torproject.org/torbutton.git/blob_plain/HEAD:/src/components/torbutton-
logger.js)

The torbutton logger component allows on-the-fly redirection of torbutton
logging messages to either Firefox stderr (
**extensions.torbutton.logmethod=0** ), the Javascript error console (
**extensions.torbutton.logmethod=1** ), or the DebugLogger extension (if
available - **extensions.torbutton.logmethod=2** ). It also allows you to
change the loglevel on the fly by changing **extensions.torbutton.loglevel**
(1-5, 1 is most verbose).

#### [@torproject.org/content-window-mapper;1 \- components/window-
mapper.js](https://gitweb.torproject.org/torbutton.git/blob_plain/HEAD:/src/components/window-
mapper.js)

Torbutton tags Firefox
[tabs](https://developer.mozilla.org/en/XUL_Tutorial/Tabboxes) with a special
variable that indicates the Tor state the tab was most recently used under to
fetch a page. The problem is that for many Firefox events, it is not possible
to determine the tab that is actually receiving the event. The Torbutton
window mapper allows the Torbutton chrome and other components to look up a
[browser tab](https://developer.mozilla.org/en/XUL/tabbrowser) for a given
[HTML content window](https://developer.mozilla.org/en/nsIDOMWindow). It does
this by traversing all windows and all browsers, until it finds the browser
with the requested
[contentWindow](https://developer.mozilla.org/en/XUL/tabbrowser#p-contentWindow)
element. Since the content policy and page loading in general can generate
hundreds of these lookups, this result is cached inside the component.

#### [@torproject.org/crash-
observer;1](https://gitweb.torproject.org/torbutton.git/blob_plain/HEAD:/src/components/crash-
observer.js)

This component detects when Firefox crashes by altering Firefox prefs during
runtime and checking for the same values at startup. It [synchronizes the
preference
service](https://developer.mozilla.org/en/XPCOM_Interface_Reference/nsIPrefService#savePrefFile\(\))
to ensure the altered prefs are written to disk immediately.

#### [@torproject.org/torbutton-ss-
blocker;1](https://gitweb.torproject.org/torbutton.git/blob_plain/HEAD:/src/components/tbSessionStore.js)

This component subscribes to the Firefox [sessionstore-state-
write](https://developer.mozilla.org/en/Observer_Notifications#Session_Store)
observer event to filter out URLs from tabs loaded during Tor, to prevent them
from being written to disk. To do this, it checks the **__tb_tor_fetched** tag
of tab objects before writing them out. If the tag is from a blocked Tor
state, the tab is not written to disk. This is a rather expensive operation
that involves potentially very large JSON evaluations and object tree
traversals, but it preferable to replacing the Firefox session store with our
own implementation, which is what was done in years past.

####
[@torproject.org/torRefSpoofer;1](https://gitweb.torproject.org/torbutton.git/blob_plain/HEAD:/src/components/torRefSpoofer.js)

This component handles optional referer spoofing for Torbutton. It implements
a form of "smart" referer spoofing using [http-on-modify-
request](https://developer.mozilla.org/en/Setting_HTTP_request_headers) to
modify the Referer header. The code sends the default browser referer header
only if the destination domain is a suffix of the source, or if the source is
a suffix of the destination. Otherwise, it sends no referer. This strange
suffix logic is used as a heuristic: some rare sites on the web block requests
without proper referer headers, and this logic is an attempt to cater to them.
Unfortunately, it may not be enough. For example, google.fr will not send a
referer to google.com using this logic. Hence, it is off by default.

#### [@torproject.org/cssblocker;1 \-
components/cssblocker.js](https://gitweb.torproject.org/torbutton.git/blob_plain/HEAD:/src/components/cssblocker.js)

This is a key component to Torbutton's security measures. When Tor is toggled,
Javascript is disabled, and pages are instructed to stop loading. However, CSS
is still able to perform network operations by loading styles for onmouseover
events and other operations. In addition, favicons can still be loaded by the
browser. The cssblocker component prevents this by implementing and
registering an
[nsIContentPolicy](https://developer.mozilla.org/en/nsIContentPolicy). When an
nsIContentPolicy is registered, Firefox checks every attempted network request
against its
[shouldLoad](https://developer.mozilla.org/en/nsIContentPolicy#shouldLoad\(\))
member function to determine if the load should proceed. In Torbutton's case,
the content policy looks up the appropriate browser tab using the window
mapper, and checks that tab's load tag against the current Tor state. If the
tab was loaded in a different state than the current state, the fetch is
denied. Otherwise, it is allowed.

This helps to achieve the Network Isolation requirements of Torbutton.

In addition, the content policy also blocks website javascript from [querying
for versions and existence of extension
chrome](http://webdevwonders.com/detecting-firefox-add-ons/) while Tor is
enabled, and also masks the presence of Torbutton to website javascript while
Tor is disabled.

Finally, some of the work that logically belongs to the content policy is
instead handled by the **torbutton_http_observer** and
**torbutton_weblistener** in
[torbutton.js](https://gitweb.torproject.org/torbutton.git/blob_plain/HEAD:/src/chrome/content/torbutton.js).
These two objects handle blocking of Firefox 3 favicon loads, popups, and full
page plugins, which for whatever reason are not passed to the Firefox content
policy itself (see Firefox Bugs
[437014](https://bugzilla.mozilla.org/show_bug.cgi?id=437014) and
[401296](https://bugzilla.mozilla.org/show_bug.cgi?id=401296)).

This helps to fulfill both the Anonymity Set Preservation and the Tor
Undiscoverability requirements of Torbutton.

## 3\. Chrome

The chrome is where all the torbutton graphical elements and windows are
located.

### 3.1. XUL Windows and Overlays

Each window is described as an [XML
file](http://developer.mozilla.org/en/docs/XUL_Reference), with zero or more
Javascript files attached. The scope of these Javascript files is their
containing window. XUL files that add new elements and script to existing
Firefox windows are called overlays.

#### Browser Overlay -
[torbutton.xul](https://gitweb.torproject.org/torbutton.git/blob_plain/HEAD:/src/chrome/content/torbutton.xul)

The browser overlay, torbutton.xul, defines the toolbar button, the status
bar, and events for toggling the button. The overlay code is in
[chrome/content/torbutton.js](https://gitweb.torproject.org/torbutton.git/blob_plain/HEAD:/src/chrome/content/torbutton.js).
It contains event handlers for preference update, shutdown, upgrade, and
location change events.

#### Preferences Window -
[preferences.xul](https://gitweb.torproject.org/torbutton.git/blob_plain/HEAD:/src/chrome/content/preferences.xul)

The preferences window of course lays out the Torbutton preferences, with
handlers located in
[chrome/content/preferences.js](https://gitweb.torproject.org/torbutton.git/blob_plain/HEAD:/src/chrome/content/preferences.js).

#### Other Windows

There are additional windows that describe popups for right clicking on the
status bar, the toolbutton, and the about page.

### 3.2. Major Chrome Observers

In addition to the components described above, Torbutton also instantiates
several observers in the browser overlay window. These mostly grew due to
scoping convenience, and many should probably be relocated into their own
components.

  1. **torbutton_window_pref_observer**

This is an observer that listens for Torbutton state changes, for the purposes
of updating the Torbutton button graphic as the Tor state changes.

  2. **torbutton_unique_pref_observer**

This is an observer that only runs in one window, called the main window. It
listens for changes to all of the Torbutton preferences, as well as Torbutton
controlled Firefox preferences. It is what carries out the toggle path when
the proxy settings change. When the main window is closed, the
torbutton_close_window event handler runs to dub a new window the "main
window".

  3. **tbHistoryListener**

The tbHistoryListener exists to prevent client window Javascript from
interacting with window.history to forcibly navigate a user to a tab session
history entry from a different Tor state. It also expunges the window.history
entries during toggle. This listener helps Torbutton satisfy the Network
Isolation requirement as well as the State Separation requirement.

  4. **torbutton_http_observer**

The torbutton_http_observer performs some of the work that logically belongs
to the content policy. This handles blocking of Firefox 3 favicon loads, which
for whatever reason are not passed to the Firefox content policy itself (see
Firefox Bugs [437014](https://bugzilla.mozilla.org/show_bug.cgi?id=437014) and
[401296](https://bugzilla.mozilla.org/show_bug.cgi?id=401296)).

The observer is also responsible for redirecting users to alternate search
engines when Google presents them with a Captcha, as well as copying Google
Captcha-related cookies between international Google domains.

  5. **torbutton_proxyservice**

The Torbutton proxy service handles redirecting Torbutton-related update
checks on addons.mozilla.org through Tor. This is done to help satisfy the Tor
Undiscoverability requirement.

  6. **torbutton_weblistener**

The [location
change](https://developer.mozilla.org/en/nsIWebProgressListener#onLocationChange)
[webprogress listener](https://developer.mozilla.org/en/nsIWebProgress),
**torbutton_weblistener** is one of the most important parts of the chrome
from a security standpoint. It is a [webprogress
listener](https://developer.mozilla.org/en/nsIWebProgressListener) that
handles receiving an event every time a page load or iframe load occurs. This
class eventually calls down to `torbutton_update_tags()` and
`torbutton_hookdoc()`, which apply the browser Tor load state tags, plugin
permissions, and install the Javascript hooks to hook the
[window.screen](https://developer.mozilla.org/en/DOM/window.screen) object to
obfuscate browser and desktop resolution information.

## 4\. Toggle Code Path

The act of toggling is connected to `torbutton_toggle()` via the
[torbutton.xul](https://gitweb.torproject.org/torbutton.git/blob_plain/HEAD:/src/chrome/content/torbutton.xul)
and
[popup.xul](https://gitweb.torproject.org/torbutton.git/blob_plain/HEAD:/src/chrome/content/popup.xul)
overlay files. Most of the work in the toggling process is present in
[torbutton.js](https://gitweb.torproject.org/torbutton.git/blob_plain/HEAD:/src/chrome/content/torbutton.js)

Toggling is a 3 stage process: Button Click, Proxy Update, and Settings
Update. These stages are reflected in the prefs
**extensions.torbutton.tor_enabled** ,
**extensions.torbutton.proxies_applied** , and
**extensions.torbutton.settings_applied**. The reason for the three stage
preference update is to ensure immediate enforcement of Network Isolation via
the content policy. Since the content window javascript runs on a different
thread than the chrome javascript, it is important to properly convey the
stages to the content policy to avoid race conditions and leakage, especially
with [Firefox Bug 409737](https://bugzilla.mozilla.org/show_bug.cgi?id=409737)
unfixed. The content policy does not allow any network activity whatsoever
during this three stage transition.

### 4.1. Button Click

This is the first step in the toggling process. When the user clicks the
toggle button or the toolbar, `torbutton_toggle()` is called. This function
checks the current Tor status by comparing the current proxy settings to the
selected Tor settings, and then sets the proxy settings to the opposite state,
and sets the pref **extensions.torbutton.tor_enabled** to reflect the new
state. It is this proxy pref update that gives notification via the [pref
observer](https://developer.mozilla.org/en/NsIPrefBranch2#addObserver.28.29)
**torbutton_unique_pref_observer** to perform the rest of the toggle.

### 4.2. Proxy Update

When Torbutton receives any proxy change notifications via its
**torbutton_unique_pref_observer** , it calls `torbutton_set_status()` which
checks against the Tor settings to see if the Tor proxy settings match the
current settings. If so, it calls `torbutton_update_status()`, which
determines if the Tor state has actually changed, and sets
**extensions.torbutton.proxies_applied** to the appropriate Tor state value,
and ensures that **extensions.torbutton.tor_enabled** is also set to the
correct value. This is decoupled from the button click functionality via the
pref observer so that other addons (such as SwitchProxy) can switch the proxy
settings between multiple proxies.

### 4.3. Settings Update

The next stage is also handled by `torbutton_update_status()`. This function
sets scores of Firefox preferences, saving the original values to prefs under
**extensions.torbutton.saved.*** , and performs the cookie jarring, state
clearing (such as window.name and DOM storage), and preference toggling. At
the end of its work, it sets **extensions.torbutton.settings_applied** , which
signifies the completion of the toggle operation to the content policy.

### 4.4. Firefox preferences touched during Toggle

There are also a number of Firefox preferences set in
`torbutton_update_status()` that aren't governed by any Torbutton setting.
These are:

  1. [network.security.ports.banned](http://kb.mozillazine.org/Network.security.ports.banned)

Torbutton sets this setting to add ports 8123, 8118, 9050 and 9051 (which it
reads from **extensions.torbutton.banned_ports** ) to the list of ports
Firefox is forbidden to access. These ports are Polipo, Privoxy, Tor, and the
Tor control port, respectively. This is set for both Tor and Non-Tor usage,
and prevents websites from attempting to do http fetches from these ports to
see if they are open, which addresses the Tor Undiscoverability requirement.

  2. [browser.send_pings](http://kb.mozillazine.org/Browser.send_pings)

This setting is currently always disabled. If anyone ever complains saying
that they *want* their browser to be able to send ping notifications to a page
or arbitrary link, I'll make this a pref or Tor-only. But I'm not holding my
breath. I haven't checked if the content policy is called for pings, but if
not, this setting helps with meeting the Network Isolation requirement.

  3. [browser.safebrowsing.remoteLookups](http://kb.mozillazine.org/Browser.safebrowsing.remoteLookups)

Likewise for this setting. I find it hard to imagine anyone who wants to ask
Google in real time if each URL they visit is safe, especially when the list
of unsafe URLs is downloaded anyway. This helps fulfill the Disk Avoidance
requirement, by preventing your entire browsing history from ending up on
Google's disks.

  4. [browser.safebrowsing.enabled](http://kb.mozillazine.org/Browser.safebrowsing.enabled)

Safebrowsing does [unauthenticated updates under Firefox
2](https://bugzilla.mozilla.org/show_bug.cgi?id=360387), so it is disabled
during Tor usage. This helps fulfill the Update Safety requirement. Firefox 3
has the fix for that bug, and so safebrowsing updates are enabled during Tor
usage.

  5. [network.protocol-handler.warn-external.(protocol)](http://kb.mozillazine.org/Network.protocol-handler.warn-external.%28protocol%29)

If Tor is enabled, we need to prevent random external applications from
launching without at least warning the user. This group of settings only
partially accomplishes this, however. Applications can still be launched via
plugins. The mechanisms for handling this are described under the "Disable
Plugins During Tor Usage" preference. This helps fulfill the Proxy Obedience
requirement, by preventing external applications from accessing network
resources at the command of Tor-fetched pages. Unfortunately, due to Firefox
Bug [440892](https://bugzilla.mozilla.org/show_bug.cgi?id=440892), these prefs
are no longer obeyed. They are set still anyway out of respect for the dead.

  6. [browser.sessionstore.max_tabs_undo](http://kb.mozillazine.org/Browser.sessionstore.max_tabs_undo)

To help satisfy the Torbutton State Separation and Network Isolation
requirements, Torbutton needs to purge the Undo Tab history on toggle to
prevent repeat "Undo Close" operations from accidentally restoring tabs from a
different Tor State. This purge is accomplished by setting this preference to
0 and then restoring it to the previous user value upon toggle.

  7. **security.enable_ssl2** or [nsIDOMCrypto::logout()](http://www.oxymoronical.com/experiments/xpcomref/applications/Firefox/3.5/interfaces/nsIDOMCrypto)

TLS Session IDs can persist for an indefinite duration, providing an
identifier that is sent to TLS sites that can be used to link activity. This
is particularly troublesome now that we have certificate verification in place
in Firefox 3: The OCSP server can use this Session ID to build a history of
TLS sites someone visits, and also correlate their activity as users move from
network to network (such as home to work to coffee shop, etc), inside and
outside of Tor. To handle this and to help satisfy our State Separation
Requirement, we call the logout() function of nsIDOMCrypto. Since this may be
absent, or may fail, we fall back to toggling **security.enable_ssl2** , which
clears the SSL Session ID cache via the pref observer at
[nsNSSComponent.cpp](http://mxr.mozilla.org/security/source/security/manager/ssl/src/nsNSSComponent.cpp).

  8. **security.OCSP.enabled**

Similarly, we toggle **security.OCSP.enabled** , which clears the OCSP
certificate validation cache via the pref observer at
[nsNSSComponent.cpp](http://mxr.mozilla.org/security/source/security/manager/ssl/src/nsNSSComponent.cpp).
In this way, exit nodes will not be able to fingerprint you based the fact
that non-Tor OCSP lookups were obviously previously cached. To handle this and
to help satisfy our State Separation Requirement,

  9. **[extensions.e0204bd5-9d31-402b-a99d-a6aa8ffebdca.getAddons.cache.enabled](http://kb.mozillazine.org/Updating_extensions#Disabling_update_checks_for_individual_add-ons_-_Advanced_users)**

We permanently disable addon usage statistic reporting to the
addons.mozilla.org statistics engine. These statistics send version
information about Torbutton users via non-Tor, allowing their Tor use to be
uncovered. Disabling this reporting helps Torbutton to satisfy its Tor
Undiscoverability requirement.

  10. **[geo.enabled](http://www.mozilla.com/en-US/firefox/geolocation/)**

Torbutton disables Geolocation support in Firefox 3.5 and above whenever tor
is enabled. This helps Torbutton maintain its Location Neutrality requirement.
While Firefox does prompt before divulging geolocational information, the
assumption is that Tor users will never want to give their location away
during Tor usage, and even allowing websites to prompt them to do so will only
cause confusion and accidents to happen. Moreover, just because users may
approve a site to know their location in non-Tor mode does not mean they want
it divulged during Tor mode.

  11. **[browser.zoom.siteSpecific](http://kb.mozillazine.org/Browser.zoom.siteSpecific)**

Firefox actually remembers your zoom settings for certain sites. CSS and
Javascript rule can use this to recognize previous visitors to a site. This
helps Torbutton fulfill its State Separation requirement.

  12. **[network.dns.disablePrefetch](https://developer.mozilla.org/en/controlling_dns_prefetching)**

Firefox 3.5 and above implement prefetching of DNS resolution for hostnames in
links on a page to decrease page load latency. While Firefox does typically
disable this behavior when proxies are enabled, we set this pref for added
safety during Tor usage. Additionally, to prevent Tor-loaded tabs from having
their links prefetched after a toggle to Non-Tor mode occurs, we also set the
docShell attribute [
allowDNSPrefetch](http://www.oxymoronical.com/experiments/apidocs/interface/nsIDocShell)
to false on Tor loaded tabs. This happens in the same positions in the code as
those for disabling plugins via the allowPlugins docShell attribute. This
helps Torbutton fulfill its Network Isolation requirement.

  13. **[browser.cache.offline.enable](http://kb.mozillazine.org/Browser.cache.offline.enable)**

Firefox has the ability to store web applications in a special cache to allow
them to continue to operate while the user is offline. Since this subsystem is
actually different than the normal disk cache, it must be dealt with
separately. Thus, Torbutton sets this preference to false whenever Tor is
enabled. This helps Torbutton fulfill its Disk Avoidance and State Separation
requirements.

## 5\. Description of Options

This section provides a detailed description of Torbutton's options. Each
option is presented as the string from the preferences window, a summary, the
preferences it touches, and the effect this has on the components, chrome, and
browser properties.

### 5.1. Proxy Settings

#### Test Settings

This button under the Proxy Settings tab provides a way to verify that the
proxy settings are correct, and actually do route through the Tor network. It
performs this check by issuing an
[XMLHTTPRequest](http://developer.mozilla.org/en/docs/XMLHttpRequest) for
[https://check.torproject.org/?Torbutton=True](https://check.torproject.org/?TorButton=True).
This is a special page that returns very simple, yet well-formed XHTML that
Torbutton can easily inspect for a hidden link with an id of
**TorCheckResult** and a target of **success** or **failure** to indicate if
the user hit the page from a Tor IP, a non-Tor IP. This check is handled in
`torbutton_test_settings()` in
[torbutton.js](https://gitweb.torproject.org/torbutton.git/blob_plain/HEAD:/src/chrome/content/torbutton.js).
Presenting the results to the user is handled by the [preferences
window](https://gitweb.torproject.org/torbutton.git/blob_plain/HEAD:/src/chrome/content/preferences.xul)
callback `torbutton_prefs_test_settings()` in
[preferences.js](https://gitweb.torproject.org/torbutton.git/blob_plain/HEAD:/src/chrome/content/preferences.js).

### 5.2. Dynamic Content Settings

#### Disable plugins on Tor Usage (crucial)

Option: **extensions.torbutton.no_tor_plugins**

Java and plugins [can
query](http://java.sun.com/j2se/1.5.0/docs/api/java/net/class-
use/NetworkInterface.html) the [local IP
address](http://www.rgagnon.com/javadetails/java-0095.html) and report it back
to the remote site. They can also bypass proxy settings and directly connect
to a remote site without Tor. Every browser plugin we have tested with Firefox
has some form of network capability, and every one ignores proxy settings or
worse - only partially obeys them. This includes but is not limited to:
QuickTime, Windows Media Player, RealPlayer, mplayerplug-in, AcroRead, and
Flash.

Enabling this preference causes the above mentioned Torbutton chrome web
progress listener **torbutton_weblistener** to disable Java via
**security.enable_java** and to disable plugins via the browser
[docShell](https://developer.mozilla.org/en/XUL%3aProperty%3adocShell)
attribute **allowPlugins**. These flags are set every time a new window is
created (`torbutton_tag_new_browser()`), every time a web load event occurs
(`torbutton_update_tags()`), and every time the tor state is changed
(`torbutton_update_status()`). As a backup measure, plugins are also prevented
from loading by the content policy in
[@torproject.org/cssblocker;1](https://gitweb.torproject.org/torbutton.git/blob_plain/HEAD:/src/components/cssblocker.js)
if Tor is enabled and this option is set.

All of this turns out to be insufficient if the user directly clicks on a
plugin-handled mime-type. [In this
case](https://bugzilla.mozilla.org/show_bug.cgi?id=401296), the browser
decides that maybe it should ignore all these other settings and load the
plugin anyways, because maybe the user really did want to load it (never mind
this same load-style could happen automatically with meta-refresh or any
number of other ways..). To handle these cases, Torbutton stores a list of
plugin-handled mime-types, and sets the pref
**plugin.disable_full_page_plugin_for_types** to this list. Additionally,
(since nothing can be assumed when relying on Firefox preferences and
internals) if it detects a load of one of them from the web progress listener,
it cancels the request, tells the associated DOMWindow to stop loading, clears
the document, AND throws an exception. Anything short of all this and the
plugin managed to find some way to load.

All this could be avoided, of course, if Firefox would either [obey
allowPlugins](https://bugzilla.mozilla.org/show_bug.cgi?id=401296) for
directly visited URLs, or notify its content policy for such loads either
[via](https://bugzilla.mozilla.org/show_bug.cgi?id=309524)
[shouldProcess](https://bugzilla.mozilla.org/show_bug.cgi?id=380556) or
shouldLoad. The fact that it does not is not very encouraging.

Since most plugins completely ignore browser proxy settings, the actions
performed by this setting are crucial to satisfying the Proxy Obedience
requirement.

#### Isolate Dynamic Content to Tor State (crucial)

Option: **extensions.torbutton.isolate_content**

Enabling this preference is what enables the
[@torproject.org/cssblocker;1](https://gitweb.torproject.org/torbutton.git/blob_plain/HEAD:/src/components/cssblocker.js)
content policy mentioned above, and causes it to block content load attempts
in pages an opposite Tor state from the current state. Freshly loaded [browser
tabs](https://developer.mozilla.org/en/XUL/tabbrowser) are tagged with a
**__tb_load_state** member in `torbutton_update_tags()` and this value is
compared against the current tor state in the content policy.

It also kills all Javascript in each page loaded under that state by toggling
the **allowJavascript**
[docShell](https://developer.mozilla.org/en/XUL%3aProperty%3adocShell)
property, and issues a
[webNavigation.stop(webNavigation.STOP_ALL)](https://developer.mozilla.org/en/XPCOM_Interface_Reference/nsIWebNavigation#stop\(\))
to each browser tab (the equivalent of hitting the STOP button).

Unfortunately, [Firefox bug
409737](https://bugzilla.mozilla.org/show_bug.cgi?id=409737) prevents
**docShell.allowJavascript** from killing all event handlers, and event
handlers registered with
[addEventListener()](http://developer.mozilla.org/en/docs/DOM:element.addEventListener)
are still able to execute. The Torbutton Content Policy should prevent such
code from performing network activity within the current tab, but activity
that happens via a popup window or via a Javascript redirect can still slip
by. For this reason, Torbutton blocks popups by checking for a valid
[window.opener](http://developer.mozilla.org/en/docs/DOM:window.opener)
attribute in `torbutton_check_progress()`. If the window has an opener from a
different Tor state, its load is blocked. The content policy also takes
similar action to prevent Javascript redirects. This also has the side
effect/feature of preventing the user from following any links from a page
loaded in an opposite Tor state.

This setting is responsible for satisfying the Network Isolation requirement.

#### Hook Dangerous Javascript

Option: **extensions.torbutton.kill_bad_js**

This setting enables injection of the [Javascript hooking
code](https://gitweb.torproject.org/torbutton.git/blob_plain/HEAD:/src/chrome/content/jshooks.js).
This is done in the chrome in `torbutton_hookdoc()`, which is called
ultimately by both the [webprogress
listener](https://developer.mozilla.org/en/nsIWebProgressListener)
**torbutton_weblistener** and the content policy (the latter being a hack to
handle javascript: urls). In the Firefox 2 days, this option did a lot more
than it does now. It used to be responsible for timezone and improved
useragent spoofing, and history object cloaking. However, now it only provides
obfuscation of the
[window.screen](https://developer.mozilla.org/en/DOM/window.screen) object to
mask your browser and desktop resolution. The resolution hooks effectively
make the Firefox browser window appear to websites as if the renderable area
takes up the entire desktop, has no toolbar or other GUI element space, and
the desktop itself has no toolbars. These hooks drastically reduce the amount
of information available to do anonymity set reduction attacks and help to
meet the Anonymity Set Preservation requirements. Unfortunately, Gregory
Fleischer discovered it is still possible to retrieve the original screen
values by using [XPCNativeWrapper](http://pseudo-
flaw.net/tor/torbutton/unmask-sandbox-xpcnativewrapper.html) or
[Components.lookupMethod](http://pseudo-flaw.net/tor/torbutton/unmask-
components-lookupmethod.html). We are still looking for a workaround as of
Torbutton 1.3.2.

#### Resize windows to multiples of 50px during Tor usage (recommended)

Option: **extensions.torbutton.resize_windows**

This option drastically cuts down on the number of distinct anonymity sets
that divide the Tor web userbase. Without this setting, the dimensions for a
typical browser window range from 600-1200 horizontal pixels and 400-1000
vertical pixels, or about 600x600 = 360000 different sets. Resizing the
browser window to multiples of 50 on each side reduces the number of sets by
50^2, bringing the total number of sets to 144. Of course, the distribution
among these sets are not uniform, but scaling by 50 will improve the situation
due to this non-uniformity for users in the less common resolutions. Obviously
the ideal situation would be to lie entirely about the browser window size,
but this will likely cause all sorts of rendering issues, and is also not
implementable in a foolproof way from extension land.

The implementation of this setting is spread across a couple of different
locations in the Torbutton javascript browser overlay. Since resizing
minimized windows causes them to be restored, and since maximized windows
remember their previous size to the pixel, windows must be resized before
every document load (at the time of browser tagging) via
`torbutton_check_round()`, called by `torbutton_update_tags()`. To prevent
drift, the extension tracks the original values of the windows and uses this
to perform the rounding on document load. In addition, to prevent the user
from resizing a window to a non-50px multiple, a resize listener
(`torbutton_do_resize()`) is installed on every new browser window to record
the new size and round it to a 50px multiple while Tor is enabled. In all
cases, the browser's contentWindow.innerWidth and innerHeight are set. This
ensures that there is no discrepancy between the 50 pixel cutoff and the
actual renderable area of the browser (so that it is not possible to infer
toolbar size/presence by the distance to the nearest 50 pixel roundoff).

This setting helps to meet the Anonymity Set Preservation requirements.

#### Disable Search Suggestions during Tor (recommended)

Option: **extensions.torbutton.no_search**

This setting causes Torbutton to disable
[**browser.search.suggest.enabled**](http://kb.mozillazine.org/Browser.search.suggest.enabled)
during Tor usage. This governs if you get Google search suggestions during Tor
usage. Your Google cookie is transmitted with google search suggestions, hence
this is recommended to be disabled.

While this setting doesn't satisfy any Torbutton requirements, the fact that
cookies are transmitted for partially typed queries does not seem desirable
for Tor usage.

#### Disable Updates During Tor

Option: **extensions.torbutton.no_updates**

This setting causes Torbutton to disable the four [Firefox update
settings](http://wiki.mozilla.org/Update:Users/Checking_For_Updates#Preference_Controls_and_State)
during Tor usage: **extensions.update.enabled** , **app.update.enabled** ,
**app.update.auto** , and **browser.search.update**. These prevent the browser
from updating extensions, checking for Firefox upgrades, and checking for
search plugin updates while Tor is enabled.

This setting satisfies the Update Safety requirement.

#### Redirect Torbutton Updates Via Tor (recommended)

Option: **extensions.torbutton.update_torbutton_via_tor**

This setting causes Torbutton to install an
[nsIProtocolProxyFilter](https://developer.mozilla.org/en/nsIProtocolProxyFilter)
in order to redirect all version update checks and Torbutton update downloads
via Tor, regardless of if Tor is enabled or not. This was done both to address
concerns about data retention done by
[addons.mozilla.org](https://www.addons.mozilla.org), as well as to help
censored users meet the Tor Undiscoverability requirement.

#### Disable livemarks updates during Tor usage (recommended)

Option:

**extensions.torbutton.disable_livemarks**  
---  
  
This option causes Torbutton to prevent Firefox from loading
[Livemarks](http://www.mozilla.com/firefox/livebookmarks.html) during Tor
usage. Because people often have very personalized Livemarks (such as RSS
feeds of Wikipedia articles they maintain, etc). This is accomplished both by
wrapping the livemark-service component and by calling stopUpdateLivemarks()
on the [Livemark
service](http://www.oxymoronical.com/experiments/xpcomref/applications/Firefox/3.5/components/%40mozilla.org/browser/livemark-
service;2) when Tor is enabled.

This helps satisfy the Network Isolation and Anonymity Set Preservation
requirements.

#### Block Tor/Non-Tor access to network from file:// urls (recommended)

Options:

**extensions.torbutton.block_tor_file_net**  
---  
 **extensions.torbutton.block_nontor_file_net**  
  
These settings prevent file urls from performing network operations during the
respective Tor states. Firefox 2's implementation of same origin policy allows
file urls to read and [submit arbitrary files from the local
filesystem](http://www.gnucitizen.org/blog/content-disposition-hacking/) to
arbitrary websites. To make matters worse, the 'Content-Disposition' header
can be injected arbitrarily by exit nodes to trick users into running
arbitrary html files in the local context. These preferences cause the content
policy to block access to any network resources from File urls during the
appropriate Tor state.

This preference helps to ensure Tor's Network Isolation requirement, by
preventing file urls from executing network operations in opposite Tor states.
Also, allowing pages to submit arbitrary files to arbitrary sites just
generally seems like a bad idea.

#### Close all Tor/Non-Tor tabs and windows on toggle (optional)

Options:

**extensions.torbutton.close_nontor**  
---  
 **extensions.torbutton.close_tor**  
  
These settings cause Torbutton to enumerate through all windows and close all
tabs in each window for the appropriate Tor state. This code can be found in
`torbutton_update_status()`. The main reason these settings exist is as a
backup mechanism in the event of any Javascript or content policy leaks due to
[Firefox Bug 409737](https://bugzilla.mozilla.org/show_bug.cgi?id=409737).
Torbutton currently tries to block all Javascript network activity via the
content policy, but until that bug is fixed, there is some risk that there are
alternate ways to bypass the policy. This option is available as an extra
assurance of Network Isolation for those who would like to be sure that when
Tor is toggled all page activity has ceased. It also serves as a potential
future workaround in the event a content policy failure is discovered, and
provides an additional level of protection for the Disk Avoidance protection
so that browser state is not sitting around waiting to be swapped out longer
than necessary.

While this setting doesn't satisfy any Torbutton requirements, the fact that
cookies are transmitted for partially typed queries does not seem desirable
for Tor usage.

### 5.3. History and Forms Settings

#### Isolate Access to History navigation to Tor state (crucial)

Option: **extensions.torbutton.block_js_history**

This setting determines if Torbutton installs an
[nsISHistoryListener](http://www.oxymoronical.com/experiments/apidocs/interface/nsISHistoryListener)
attached to the
[sessionHistory](http://www.oxymoronical.com/experiments/apidocs/interface/nsISHistory)
of of each browser's
[webNavigatator](https://developer.mozilla.org/en/XUL%3aProperty%3awebNavigation).
The nsIShistoryListener is instantiated with a reference to the containing
browser window and blocks the back, forward, and reload buttons on the browser
navigation bar when Tor is in an opposite state than the one to load the
current tab. In addition, Tor clears the session history during a new document
load if this setting is enabled.

This is marked as a crucial setting in part because Javascript access to the
history object is indistinguishable from user clicks, and because [Firefox Bug
409737](https://bugzilla.mozilla.org/show_bug.cgi?id=409737) allows javascript
to execute in opposite Tor states, javascript can issue reloads after Tor
toggle to reveal your original IP. Even without this bug, however, Javascript
is still able to access previous pages in your session history that may have
been loaded under a different Tor state, to attempt to correlate your
activity.

This setting helps to fulfill Torbutton's State Separation and (until Bug
409737 is fixed) Network Isolation requirements.

#### History Access Settings

Options:

**extensions.torbutton.block_thread**  
---  
 **extensions.torbutton.block_nthread**  
 **extensions.torbutton.block_thwrite**  
 **extensions.torbutton.block_nthwrite**  
  
On Firefox 3.x, these four settings govern the behavior of the
[components/ignore-
history.js](https://gitweb.torproject.org/torbutton.git/blob_plain/HEAD:/src/components/ignore-
history.js) history blocker component mentioned above. By hooking the
browser's view of the history itself via the [@mozilla.org/browser/global-
history;2](http://www.oxymoronical.com/experiments/xpcomref/applications/Firefox/3.5/components/%40mozilla.org/browser/global-
history;2) and [@mozilla.org/browser/nav-history-
service;1](http://www.oxymoronical.com/experiments/xpcomref/applications/Firefox/3.5/components/%40mozilla.org/browser/nav-
history-service;1) components, this mechanism defeats all document-based
[history disclosure attacks](http://whattheinternetknowsaboutyou.com/),
including [CSS-only attacks](http://ha.ckers.org/weird/CSS-history.cgi). The
component also hooks functions involved in writing history to disk via both
the [Places
Database](http://developer.mozilla.org/en/docs/Places_migration_guide#History)
and the older Firefox 2 mechanisms.

On Firefox 4, Mozilla finally [addressed these
issues](https://developer.mozilla.org/en/CSS/Privacy_and_the_%3avisited_selector),
so we can effectively ignore the "read" pair of the above prefs. We then only
need to link the write prefs to **places.history.enabled** , which disabled
writing to the history store while set.

This setting helps to satisfy the State Separation and Disk Avoidance
requirements.

#### Clear History During Tor Toggle (optional)

Option: **extensions.torbutton.clear_history**

This setting governs if Torbutton calls
[nsIBrowserHistory.removeAllPages](https://developer.mozilla.org/en/nsIBrowserHistory#removeAllPages.28.29)
and
[nsISHistory.PurgeHistory](http://www.oxymoronical.com/experiments/apidocs/interface/nsISHistory)
for each tab on Tor toggle.

This setting is an optional way to help satisfy the State Separation
requirement.

#### Block Password+Form saving during Tor/Non-Tor

Options:

**extensions.torbutton.block_tforms**  
---  
 **extensions.torbutton.block_ntforms**  
  
These settings govern if Torbutton disables **browser.formfill.enable** and
**signon.rememberSignons** during Tor and Non-Tor usage. Since form fields can
be read at any time by Javascript, this setting is a lot more important than
it seems.

This setting helps to satisfy the State Separation and Disk Avoidance
requirements.

### 5.4. Cache Settings

#### Block Tor disk cache and clear all cache on Tor Toggle

Option: **extensions.torbutton.clear_cache**

This option causes Torbutton to call
[nsICacheService.evictEntries(0)](https://developer.mozilla.org/en/nsICacheService#evictEntries.28.29)
on Tor toggle to remove all entries from the cache. In addition, this setting
causes Torbutton to set
[browser.cache.disk.enable](http://kb.mozillazine.org/Browser.cache.disk.enable)
to false.

This setting helps to satisfy the State Separation and Disk Avoidance
requirements.

#### Block disk and memory cache during Tor

Option: **extensions.torbutton.block_cache**

This setting causes Torbutton to set
[browser.cache.memory.enable](http://kb.mozillazine.org/Browser.cache.memory.enable),
[browser.cache.disk.enable](http://kb.mozillazine.org/Browser.cache.disk.enable)
and [network.http.use-cache](http://kb.mozillazine.org/Network.http.use-cache)
to false during tor usage.

This setting helps to satisfy the State Separation and Disk Avoidance
requirements.

### 5.5. Cookie and Auth Settings

#### Clear Cookies on Tor Toggle

Option: **extensions.torbutton.clear_cookies**

This setting causes Torbutton to call
[nsICookieManager.removeAll()](https://developer.mozilla.org/en/nsICookieManager#removeAll.28.29)
on every Tor toggle. In addition, this sets
[network.cookie.lifetimePolicy](http://kb.mozillazine.org/Network.cookie.lifetimePolicy)
to 2 for Tor usage, which causes all cookies to be demoted to session cookies,
which prevents them from being written to disk.

This setting helps to satisfy the State Separation and Disk Avoidance
requirements.

#### Store Non-Tor cookies in a protected jar

Option: **extensions.torbutton.cookie_jars**

This setting causes Torbutton to use [@torproject.org/cookie-jar-
selector;2](https://gitweb.torproject.org/torbutton.git/blob_plain/HEAD:/src/components/cookie-
jar-selector.js) to store non-tor cookies in a cookie jar during Tor usage,
and clear the Tor cookies before restoring the jar.

This setting also sets
[network.cookie.lifetimePolicy](http://kb.mozillazine.org/Network.cookie.lifetimePolicy)
to 2 for Tor usage, which causes all cookies to be demoted to session cookies,
which prevents them from being written to disk.

This setting helps to satisfy the State Separation and Disk Avoidance
requirements.

#### Store both Non-Tor and Tor cookies in a protected jar (dangerous)

Option: **extensions.torbutton.dual_cookie_jars**

This setting causes Torbutton to use [@torproject.org/cookie-jar-
selector;2](https://gitweb.torproject.org/torbutton.git/blob_plain/HEAD:/src/components/cookie-
jar-selector.js) to store both Tor and Non-Tor cookies into protected jars.

This setting helps to satisfy the State Separation requirement.

#### Manage My Own Cookies (dangerous)

Options: None

This setting disables all Torbutton cookie handling by setting the above
cookie prefs all to false.

#### Disable DOM Storage during Tor usage (crucial)

#### Do not write Tor/Non-Tor cookies to disk

Options:

**extensions.torbutton.tor_memory_jar**  
---  
 **extensions.torbutton.nontor_memory_jar**  
  
These settings (contributed by arno) cause Torbutton to set
[network.cookie.lifetimePolicy](http://kb.mozillazine.org/Network.cookie.lifetimePolicy)
to 2 during the appropriate Tor state, and to store cookies acquired in that
state into a Javascript
[E4X](http://developer.mozilla.org/en/docs/Core_JavaScript_1.5_Guide:Processing_XML_with_E4X)
object as opposed to writing them to disk.

This allows Torbutton to provide an option to preserve a user's cookies while
still satisfying the Disk Avoidance requirement.

Option: **extensions.torbutton.disable_domstorage**

This setting causes Torbutton to toggle **dom.storage.enabled** during Tor
usage to prevent [DOM
Storage](http://developer.mozilla.org/en/docs/DOM:Storage) from being used to
store persistent information across Tor states.

This setting helps to satisfy the State Separation requirement.

#### Clear HTTP Auth on Tor Toggle (recommended)

Option: **extensions.torbutton.clear_http_auth**

This setting causes Torbutton to call
[nsIHttpAuthManager.clearAll()](http://www.oxymoronical.com/experiments/apidocs/interface/nsIHttpAuthManager)
every time Tor is toggled.

This setting helps to satisfy the State Separation requirement.

### 5.6. Startup Settings

#### On Browser Startup, set Tor state to: Tor, Non-Tor

Options: **extensions.torbutton.restore_tor**

This option governs what Tor state tor is loaded in to.
`torbutton_set_initial_state()` covers the case where the browser did not
crash, and `torbutton_crash_recover()` covers the case where the crash
observer detected a crash.

Since the Tor state after a Firefox crash is unknown/indeterminate, this
setting helps to satisfy the State Separation requirement in the event of
Firefox crashes by ensuring all cookies, settings and saved sessions are
reloaded from a fixed Tor state.

#### Prevent session store from saving Non-Tor/Tor-loaded tabs

Options:

**extensions.torbutton.nonontor_sessionstore**  
---  
 **extensions.torbutton.notor_sessionstore**  
  
If these options are enabled, the tbSessionStore.js component uses the session
store listeners to filter out the appropriate tabs before writing the session
store data to disk.

This setting helps to satisfy the Disk Avoidance requirement, and also helps
to satisfy the State Separation requirement in the event of Firefox crashes.

### 5.7. Shutdown Settings

#### Clear cookies on Tor/Non-Tor shutdown

Option: **extensions.torbutton.shutdown_method**

This option variable can actually take 3 values: 0, 1, and 2. 0 means no
cookie clearing, 1 means clear only during Tor-enabled shutdown, and 2 means
clear for both Tor and Non-Tor shutdown. When set to 1 or 2, Torbutton listens
for the [quit-application-
granted](http://developer.mozilla.org/en/docs/Observer_Notifications#Application_shutdown)
event in crash-observer.js and use [@torproject.org/cookie-jar-
selector;2](https://gitweb.torproject.org/torbutton.git/blob_plain/HEAD:/src/components/cookie-
jar-selector.js) to clear out all cookies and all cookie jars upon shutdown.

This setting helps to satisfy the State Separation requirement.

### 5.8. Header Settings

#### Set user agent during Tor usage (crucial)

Options:

**extensions.torbutton.set_uagent**  
---  
 **extensions.torbutton.platform_override**  
 **extensions.torbutton.oscpu_override**  
 **extensions.torbutton.buildID_override**  
 **extensions.torbutton.productsub_override**  
 **extensions.torbutton.appname_override**  
 **extensions.torbutton.appversion_override**  
 **extensions.torbutton.useragent_override**  
 **extensions.torbutton.useragent_vendor**  
 **extensions.torbutton.useragent_vendorSub**  
  
On face, user agent switching appears to be straight-forward in Firefox. It
provides several options for controlling the browser user agent string:
**general.appname.override** , **general.appversion.override** ,
**general.platform.override** , **general.oscpu.override** ,
**general.productSub.override** , **general.buildID.override** ,
**general.useragent.override** , **general.useragent.vendor** , and
**general.useragent.vendorSub**. If the Torbutton preference
**extensions.torbutton.set_uagent** is true, Torbutton copies all of the other
above prefs into their corresponding browser preferences during Tor usage.

It also turns out that it is possible to detect the original Firefox version
by [inspecting certain resource://
files](http://ha.ckers.org/blog/20070516/read-firefox-settings-poc/). These
cases are handled by Torbutton's content policy.

This setting helps to satisfy the Anonymity Set Preservation requirement.

#### Spoof US English Browser

Options:

**extensions.torbutton.spoof_english**  
---  
 **extensions.torbutton.spoof_charset**  
 **extensions.torbutton.spoof_language**  
  
This option causes Torbutton to set **general.useragent.locale**
**intl.accept_languages** to the value specified in
**extensions.torbutton.spoof_locale** , **extensions.torbutton.spoof_charset**
and **extensions.torbutton.spoof_language** during Tor usage, as well as
hooking **navigator.language** via its javascript hooks.

This setting helps to satisfy the Anonymity Set Preservation and Location
Neutrality requirements.

#### Referer Spoofing Options

Option: **extensions.torbutton.refererspoof**

This option variable has three values. If it is 0, "smart" referer spoofing is
enabled. If it is 1, the referer behaves as normal. If it is 2, no referer is
sent. The default value is 1. The smart referer spoofing is implemented by the
torRefSpoofer component.

This setting also does not directly satisfy any Torbutton requirement, but
some may desire to mask their referer for general privacy concerns.

#### Strip platform and language off of Google Search Box queries

Option: **extensions.torbutton.fix_google_srch**

This option causes Torbutton to use the [@mozilla.org/browser/search-
service;1](https://wiki.mozilla.org/Search_Service:API) component to wrap the
Google search plugin. On many platforms, notably Debian and Ubuntu, the Google
search plugin is set to reveal a lot of language and platform information.
This setting strips off that info while Tor is enabled.

This setting helps Torbutton to fulfill its Anonymity Set Preservation
requirement.

#### Automatically use an alternate search engine when presented with a Google
Captcha

Options:

**extensions.torbutton.asked_google_captcha**  
---  
 **extensions.torbutton.dodge_google_captcha**  
 **extensions.torbutton.google_redir_url**  
  
Google's search engine has rate limiting features that cause it to [present
captchas](http://googleonlinesecurity.blogspot.com/2007/07/reason-behind-were-
sorry-message.html) and sometimes even outright ban IPs that issue large
numbers of search queries, especially if a lot of these queries appear to be
searching for software vulnerabilities or unprotected comment areas.

Despite multiple discussions with Google, we were unable to come to a solution
or any form of compromise that would reduce the number of captchas and
outright bans seen by Tor users issuing regular queries.

As a result, we've implemented this option as an ['http-on-modify-
request'](https://developer.mozilla.org/en/XUL_School/Intercepting_Page_Loads#HTTP_Observers)
http observer to optionally redirect banned or captcha-triggering Google
queries to search engines that do not rate limit Tor users. The current
options are duckduckgo.com, ixquick.com, bing.com, yahoo.com and scroogle.org.
These are encoded in the preferences **extensions.torbutton.redir_url.[1-5]**.

#### Store SSL/CA Certs in separate jars for Tor/Non-Tor (recommended)

Options:

**extensions.torbutton.jar_certs**  
---  
 **extensions.torbutton.jar_ca_certs**  
  
These settings govern if Torbutton attempts to isolate the user's SSL
certificates into separate jars for each Tor state. This isolation is
implemented in `torbutton_jar_certs()` in
[chrome/content/torbutton.js](https://gitweb.torproject.org/torbutton.git/blob_plain/HEAD:/src/chrome/content/torbutton.js),
which calls `torbutton_jar_cert_type()` and `torbutton_unjar_cert_type()` for
each certificate type in the
[@mozilla.org/security/nsscertcache;1](http://www.oxymoronical.com/experiments/xpcomref/applications/Firefox/3.5/components/%40mozilla.org/security/nsscertcache;1).
Certificates are deleted from and imported to the
[@mozilla.org/security/x509certdb;1](http://www.oxymoronical.com/experiments/xpcomref/applications/Firefox/3.5/components/%40mozilla.org/security/x509certdb;1).

The first time this pref is used, a backup of the user's certificates is
created in their profile directory under the name `cert8.db.bak`. This file
can be copied back to `cert8.db` to fully restore the original state of the
user's certificates in the event of any error.

Since exit nodes and malicious sites can insert content elements sourced to
specific SSL sites to query if a user has a certain certificate, this setting
helps to satisfy the State Separation requirement of Torbutton. Unfortunately,
[Firefox Bug 435159](https://bugzilla.mozilla.org/show_bug.cgi?id=435159)
prevents it from functioning correctly in the event of rapid Tor toggle, so it
is currently not exposed via the preferences UI.

## 6\. Relevant Firefox Bugs

Future releases of Torbutton are going to be designed around supporting only
[Tor Browser Bundle](https://www.torproject.org/projects/torbrowser.html.en),
which greatly simplifies the number and nature of Firefox bugs we must fix.
This allows us to abandon the complexities of State Separation and Network
Isolation requirements associated with the Toggle Model.

### 6.1. Tor Browser Bugs

The list of Firefox patches we must create to improve privacy on the Tor
Browser Bundle are collected in the Tor Bug Tracker under [ticket
#2871](https://trac.torproject.org/projects/tor/ticket/2871). These bugs are
also applicable to the Toggle Model, and should be considered higher priority
than all Toggle Model specific bugs below.

### 6.2. Toggle Model Bugs

In addition to the Tor Browser bugs, the Torbutton Toggle Model suffers from
additional bugs specific to the need to isolate state across the toggle.
Toggle model bugs are considered a lower priority than the bugs against the
Tor Browser model.

#### Bugs impacting security

Torbutton has to work around a number of Firefox bugs that impact its
security. Most of these are mentioned elsewhere in this document, but they
have also been gathered here for reference. In order of decreasing severity,
they are:

  1. [Bug 435159 - nsNSSCertificateDB::DeleteCertificate has race conditions](https://bugzilla.mozilla.org/show_bug.cgi?id=435159)

In Torbutton 1.2.0rc1, code was added to attempt to isolate SSL certificates
the user has installed. Unfortunately, the method call to delete a certificate
from the current certificate database acts lazily: it only sets a variable
that marks a cert for deletion later, and it is not cleared if that
certificate is re-added. This means that if the Tor state is toggled quickly,
that certificate could remain present until it is re-inserted (causing an
error dialog), and worse, it would still be deleted after that. The lack of
this functionality is considered a Torbutton security bug because cert
isolation is considered a State Separation feature.

  2. Give more visibility into and control over TLS negotiation 

There are several [TLS issues impacting Torbutton
security](https://trac.torproject.org/projects/tor/ticket/2482). It is not
clear if these should be one Firefox bug or several, but in particular we need
better control over various aspects of TLS connections. Firefox currently
provides no observer capable of extracting TLS parameters or certificates
early enough to cancel a TLS request. We would like to be able to provide
[HTTPS-Everywhere](https://www.eff.org/https-everywhere) users with the
ability to [have their certificates
audited](https://trac.torproject.org/projects/tor/wiki/HTTPSEverywhere/SSLObservatorySubmission)
by a [Perspectives](http://www.networknotary.org/)-style set of notaries. The
problem with this is that the API observer points do not exist for any Firefox
addon to actually block authentication token submission over a TLS channel, so
every addon to date (including Perspectives) is actually providing users with
notification *after* their authentication tokens have already been
compromised. This obviously needs to be fixed.

  3. [Bug 122752 - SOCKS Username/Password Support](https://bugzilla.mozilla.org/show_bug.cgi?id=122752)

We need [Firefox APIs](https://developer.mozilla.org/en/nsIProxyInfo) or
about:config settings to control the SOCKS Username and Password fields. The
reason why we need this support is to utilize an (as yet unimplemented) scheme
to separate Tor traffic based [on SOCKS
username/password](https://gitweb.torproject.org/torspec.git/blob_plain/HEAD:/proposals/171-separate-
streams.txt).

  4. [Bug 409737 - javascript.enabled and docShell.allowJavascript do not disable all event handlers](https://bugzilla.mozilla.org/show_bug.cgi?id=409737)

This bug allows pages to execute javascript via addEventListener and perhaps
other callbacks. In order to prevent this bug from enabling an attacker to
break the Network Isolation requirement, Torbutton 1.1.13 began blocking
popups and history manipulation from different Tor states. So long as there
are no ways to open popups or redirect the user to a new page, the Torbutton
content policy should block Javascript network access. However, if there are
ways to open popups or perform redirects such that Torbutton cannot block
them, pages may still have free reign to break that requirement and reveal a
user's original IP address.

  5. [Bug 448743 - Decouple general.useragent.locale from spoofing of navigator.language](https://bugzilla.mozilla.org/show_bug.cgi?id=448743)

Currently, Torbutton spoofs the **navigator.language** attribute via
Javascript hooks. Unfortunately, these do not work on Firefox 3. It would be
ideal to have a pref to set this value (something like a
**general.useragent.override.locale** ), to avoid fragmenting the anonymity
set of users of foreign locales. This issue impedes Torbutton from fully
meeting its Anonymity Set Preservation requirement on Firefox 3.

#### Bugs blocking functionality

The following bugs impact Torbutton and similar extensions' functionality.

  1. [Bug 629820 - nsIContentPolicy::shouldLoad not called for web request in Firefox Mobile](https://bugzilla.mozilla.org/show_bug.cgi?id=629820)

The new
[Electrolysis](https://wiki.mozilla.org/Mobile/Fennec/Extensions/Electrolysis)
multiprocess system appears to have some pretty rough edge cases with respect
to registering XPCOM category managers such as the nsIContentPolicy, which
make it difficult to do a straight-forward port of Torbutton or HTTPS-
Everywhere to Firefox Mobile. It probably also has similar issues with
wrapping existing Firefox XPCOM components, which will also cause more
problems for porting Torbutton.

  2. [Bug 417869 - Browser context is difficult to obtain from many XPCOM callbacks](https://bugzilla.mozilla.org/show_bug.cgi?id=417869)

It is difficult to determine which tabbrowser many XPCOM callbacks originate
from, and in some cases absolutely no context information is provided at all.
While this doesn't have much of an effect on Torbutton, it does make writing
extensions that would like to do per-tab settings and content filters (such as
FoxyProxy) difficult to impossible to implement securely.

#### Low Priority Bugs

The following bugs have an effect upon Torbutton, but are superseded by more
practical and more easily fixable variant bugs above; or have stable, simple
workarounds.

  1. [Bug 440892 - network.protocol-handler.warn-external are ignored](https://bugzilla.mozilla.org/show_bug.cgi?id=440892)

Sometime in the Firefox 3 development cycle, the preferences that governed
warning a user when external apps were launched got disconnected from the code
that does the launching. Torbutton depended on these prefs to prevent websites
from launching specially crafted documents and application arguments that
caused Proxy Bypass. We currently work around this issue by wrapping the app
launching components to present a popup before launching external apps while
Tor is enabled. While this works, it would be nice if these prefs were either
fixed or removed.

  2. [Bug 437014 - nsIContentPolicy::shouldLoad no longer called for favicons](https://bugzilla.mozilla.org/show_bug.cgi?id=437014)

Firefox 3.0 stopped calling the shouldLoad call of content policy for favicon
loads. Torbutton had relied on this call to block favicon loads for opposite
Tor states. The workaround it employs for Firefox 3 is to cancel the request
when it arrives in the **torbutton_http_observer** used for blocking full page
plugin loads. This seems to work just fine, but is a bit dirty.

  3. [Bug 309524](https://bugzilla.mozilla.org/show_bug.cgi?id=309524) and [Bug 380556](https://bugzilla.mozilla.org/show_bug.cgi?id=380556) \- nsIContentPolicy::shouldProcess is not called. 

This is a call that would be useful to develop a better workaround for the
allowPlugins issue above. If the content policy were called before a URL was
handed over to a plugin or helper app, it would make the workaround for the
above allowPlugins bug a lot cleaner. Obviously this bug is not as severe as
the others though, but it might be nice to have this API as a backup.

  4. [Bug 401296 - docShell.allowPlugins not honored for direct links](https://bugzilla.mozilla.org/show_bug.cgi?id=401296) (Perhaps subset of [Bug 282106](https://bugzilla.mozilla.org/show_bug.cgi?id=282106)?) 

Similar to the javascript plugin disabling attribute, the plugin disabling
attribute is also not perfect — it is ignored for direct links to plugin
handled content, as well as meta-refreshes to plugin handled content. This
requires Torbutton to listen to a number of different http events to intercept
plugin-related mime type URLs and cancel their requests. Again, since plugins
are quite horrible about obeying proxy settings, loading a plugin pretty much
ensures a way to break the Network Isolation requirement and reveal a user's
original IP address. Torbutton's code to perform this workaround has been
subverted at least once already by Kyle Williams.

## 7\. Testing

The purpose of this section is to cover all the known ways that Tor browser
security can be subverted from a penetration testing perspective. The hope is
that it will be useful both for creating a "Tor Safety Check" page, and for
developing novel tests and actively attacking Torbutton with the goal of
finding vulnerabilities in either it or the Mozilla components, interfaces and
settings upon which it relies.

### 7.1. Single state testing

Torbutton is a complicated piece of software. During development, changes to
one component can affect a whole slough of unrelated features. A number of
aggregated test suites exist that can be used to test for regressions in
Torbutton and to help aid in the development of Torbutton-like addons and
other privacy modifications of other browsers. Some of these test suites exist
as a single automated page, while others are a series of pages you must visit
individually. They are provided here for reference and future regression
testing, and also in the hope that some brave soul will one day decide to
combine them into a comprehensive automated test suite.

  1. Decloak.net (defunct)

Decloak.net is the canonical source of plugin and external-application based
proxy-bypass exploits. It is a fully automated test suite maintained by [HD
Moore](http://digitaloffense.net/) as a service for people to use to test
their anonymity systems.

  2. [JonDos AnonTest](https://www.jondos.de/en/anontest)

The [JonDos people](https://www.jondos.de) also provide an anonymity tester.
It is more focused on HTTP headers than plugin bypass, and points out a couple
of headers Torbutton could do a better job with obfuscating.

  3. [Browserspy.dk](http://browserspy.dk)

Browserspy.dk provides a tremendous collection of browser fingerprinting and
general privacy tests. Unfortunately they are only available one page at a
time, and there is not really solid feedback on good vs bad behavior in the
test results.

  4. [Privacy Analyzer](http://analyze.privacy.net/)

The Privacy Analyzer provides a dump of all sorts of browser attributes and
settings that it detects, including some information on your origin IP
address. Its page layout and lack of good vs bad test result feedback makes it
not as useful as a user-facing testing tool, but it does provide some
interesting checks in a single page.

  5. [Mr. T](http://ha.ckers.org/mr-t/)

Mr. T is a collection of browser fingerprinting and deanonymization exploits
discovered by the [ha.ckers.org](http://ha.ckers.org) crew and others. It is
also not as user friendly as some of the above tests, but it is a useful
collection.

  6. Gregory Fleischer's [Torbutton](http://pseudo-flaw.net/content/tor/torbutton/) and [Defcon 17](http://pseudo-flaw.net/content/defcon/dc-17-demos/d.html) Test Cases 

Gregory Fleischer has been hacking and testing Firefox and Torbutton privacy
issues for the past 2 years. He has an excellent collection of all his test
cases that can be used for regression testing. In his Defcon work, he
demonstrates ways to infer Firefox version based on arcane browser properties.
We are still trying to determine the best way to address some of those test
cases.

  7. [Xenobite's TorCheck Page](https://torcheck.xenobite.eu/index.php)

This page checks to ensure you are using a valid Tor exit node and checks for
some basic browser properties related to privacy. It is not very fine-grained
or complete, but it is automated and could be turned into something useful
with a bit of work.

### 7.2. Multi-state testing

The tests in this section are geared towards a page that would instruct the
user to toggle their Tor state after the fetch and perform some operations:
mouseovers, stray clicks, and potentially reloads.

#### Cookies and Cache Correlation

The most obvious test is to set a cookie, ask the user to toggle tor, and then
have them reload the page. The cookie should no longer be set if they are
using the default Torbutton settings. In addition, it is possible to leverage
the cache to [store unique
identifiers](http://crypto.stanford.edu/sameorigin/safecachetest.html). The
default settings of Torbutton should also protect against these from
persisting across Tor Toggle.

#### Javascript timers and event handlers

Javascript can set timers and register event handlers in the hopes of fetching
URLs after the user has toggled Torbutton.

#### CSS Popups and non-script Dynamic Content

Even if Javascript is disabled, CSS is still able to [create popup-like
windows](http://www.tjkdesign.com/articles/css%20pop%20ups/) via the
'onmouseover' CSS attribute, which can cause arbitrary browser activity as
soon as the mouse enters into the content window. It is also possible for
meta-refresh tags to set timers long enough to make it likely that the user
has toggled Tor before fetching content.

### 7.3. Active testing (aka How to Hack Torbutton)

The idea behind active testing is to discover vulnerabilities in Torbutton to
bypass proxy settings, run script in an opposite Tor state, store unique
identifiers, leak location information, or otherwise violate its requirements.
Torbutton has ventured out into a strange and new security landscape. It
depends on Firefox mechanisms that haven't necessarily been audited for
security, certainly not for the threat model that Torbutton seeks to address.
As such, it and the interfaces it depends upon still need a 'trial by fire'
typical of new technologies. This section of the document was written with the
intention of making that period as fast as possible. Please help us get
through this period by considering these attacks, playing with them, and
reporting what you find (and potentially submitting the test cases back to be
run in the standard batch of Torbutton tests.

#### Some suggested vectors to investigate

  * Strange ways to register Javascript [events](http://en.wikipedia.org/wiki/DOM_Events) and [timeouts](http://www.devshed.com/c/a/JavaScript/Using-Timers-in-JavaScript/) should be verified to actually be ineffective after Tor has been toggled.
  * Other ways to cause Javascript to be executed after **javascript.enabled** has been toggled off.
  * Odd ways to attempt to load plugins. Kyle Williams has had some success with direct loads/meta-refreshes of plugin-handled URLs.
  * The Date and Timezone hooks should be verified to work with crazy combinations of iframes, nested iframes, iframes in frames, frames in iframes, and popups being loaded and reloaded in rapid succession, and/or from one another. Think race conditions and deep, parallel nesting, involving iframes from both [same-origin and non-same-origin](http://en.wikipedia.org/wiki/Same_origin_policy) domains.
  * In addition, there may be alternate ways and other methods to query the timezone, or otherwise use some of the Date object's methods in combination to deduce the timezone offset. Of course, the author tried his best to cover all the methods he could foresee, but it's always good to have another set of eyes try it out.
  * Similarly, is there any way to confuse the content policy mentioned above to cause it to allow certain types of page fetches? For example, it was recently discovered that favicons are not fetched by the content, but the chrome itself, hence the content policy did not look up the correct window to determine the current Tor tag for the favicon fetch. Are there other things that can do this? Popups? Bookmarklets? Active bookmarks? 
  * Alternate ways to store and fetch unique identifiers. For example, [DOM Storage](http://developer.mozilla.org/en/docs/DOM:Storage) caught us off guard. It was also discovered by [Gregory Fleischer](http://pseudo-flaw.net) that [content window access to chrome](http://pseudo-flaw.net/content/tor/torbutton/) can be used to build unique identifiers. Are there any other arcane or experimental ways that Firefox provides to create and store unique identifiers? Or perhaps unique identifiers can be queried or derived from properties of the machine/browser that Javascript has access to? How unique can these identifiers be? 
  * Is it possible to get the browser to write some history to disk (aside from swap) that can be retrieved later? By default, Torbutton should write no history, cookie, or other browsing activity information to the harddisk.
  * Do popup windows make it easier to break any of the above behavior? Are javascript events still canceled in popups? What about recursive popups from Javascript, data, and other funky URL types? What about CSS popups? Are they still blocked after Tor is toggled?
  * Chrome-escalation attacks. The interaction between the Torbutton chrome Javascript and the client content window javascript is pretty well-defined and carefully constructed, but perhaps there is a way to smuggle javascript back in a return value, or otherwise inject network-loaded javascript into the chrome (and thus gain complete control of the browser). 

