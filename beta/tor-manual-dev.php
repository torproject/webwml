<?php
$pagename = "Tor: anonymity online";
include("header.inc.php");
?>
<div class="main-column"> 
  <div class="bg"> 
    <H2>TOR</H2>
    Section: User Commands (1)<BR>
    Updated: January 2009<BR>
    <A HREF="#index">Index</A> <A HREF="">Return to Main Contents</A> 
    <HR>
    <A NAME="lbAB">&nbsp;</A> 
    <h3>NAME</h3>
    tor - The second-generation onion router <A NAME="lbAC">&nbsp;</A> 
    <h3>SYNOPSIS</h3>
    <B>tor</B> [<I>OPTION value</I>]... <A NAME="lbAD">&nbsp;</A> 
    <h3>DESCRIPTION</h3>
    <I>tor</I> is a connection-oriented anonymizing communication service. Users 
    choose a source-routed path through a set of nodes, and negotiate a &quot;virtual 
    circuit&quot; through the network, in which each node knows its predecessor 
    and successor, but no others. Traffic flowing down the circuit is unwrapped 
    by a symmetric key at each node, which reveals the downstream node.
    <p> 
    <P> Basically <I>tor</I> provides a distributed network of servers (&quot;onion 
      routers&quot;). Users bounce their TCP streams -- web traffic, ftp, ssh, 
      etc -- around the routers, and recipients, observers, and even the routers 
      themselves have difficulty tracking the source of the stream. <A NAME="lbAE">&nbsp;</A> 
    <h3>OPTIONS</h3>
    <DL COMPACT>
      <DT><B>-h, -help</B> 
      <DD>Display a short help message and exit. 
    </DL>
    <DL COMPACT>
      <DT><B>-f </B><I>FILE</I> 
      <DD> FILE contains further &quot;option value&quot; pairs. (Default: @CONFDIR@/torrc) 
    </DL>
    <DL COMPACT>
      <DT><B>--hash-password</B> 
      <DD> Generates a hashed password for control port access. 
    </DL>
    <DL COMPACT>
      <DT><B>--list-fingerprint</B> 
      <DD> Generate your keys and output your nickname and fingerprint. 
    </DL>
    <DL COMPACT>
      <DT><B>--verify-config</B> 
      <DD> Verify the configuration file is valid. 
    </DL>
    <DL COMPACT>
      <DT><B>--nt-service</B> 
      <DD> <B>--service [install|remove|start|stop]</B> Manage the Tor Windows 
        NT/2000/XP service. Current instructions can be found at <A HREF="http://wiki.noreply.org/noreply/TheOnionRouter/TorFAQ#WinNTService">http://wiki.noreply.org/noreply/TheOnionRouter/TorFAQ#WinNTService</A> 
    </DL>
    <DL COMPACT>
      <DT><B>--list-torrc-options</B> 
      <DD> List all valid options. 
    </DL>
    <DL COMPACT>
      <DT><B>--version</B> 
      <DD> Display Tor version and exit. 
    </DL>
    <DL COMPACT>
      <DT><B>--quiet</B> 
      <DD> Do not start Tor with a console log unless explicitly requested to 
        do so. (By default, Tor starts out logging messages at level &quot;notice&quot; 
        or higher to the console, until it has parsed its configuration.) 
    </DL>
    <DL COMPACT>
      <DT>Other options can be specified either on the command-line (<I>--option 
      <DD> value</I>), or in the configuration file (<I>option value</I> or <I>option 
        &quot;value&quot;</I>). Options are case-insensitive. C-style escaped 
        characters are allowed inside quoted values. 
    </DL>
    <DL COMPACT>
      <DT><B>BandwidthRate </B><I>N</I> <B>bytes</B>|<B>KB</B>|<B>MB</B>|<B>GB</B>|<B>TB</B> 
      <DD> A token bucket limits the average incoming bandwidth usage on this 
        node to the specified number of bytes per second, and the average outgoing 
        bandwidth usage to that same value. (Default: 5 MB) 
    </DL>
    <DL COMPACT>
      <DT><B>BandwidthBurst </B><I>N</I> <B>bytes</B>|<B>KB</B>|<B>MB</B>|<B>GB</B>|<B>TB</B> 
      <DD> Limit the maximum token bucket size (also known as the burst) to the 
        given number of bytes in each direction. (Default: 10 MB) 
    </DL>
    <DL COMPACT>
      <DT><B>MaxAdvertisedBandwidth </B><I>N</I> <B>bytes</B>|<B>KB</B>|<B>MB</B>|<B>GB</B>|<B>TB</B> 
      <DD> If set, we will not advertise more than this amount of bandwidth for 
        our BandwidthRate. Server operators who want to reduce the number of clients 
        who ask to build circuits through them (since this is proportional to 
        advertised bandwidth rate) can thus reduce the CPU demands on their server 
        without impacting network performance. 
    </DL>
    <DL COMPACT>
      <DT><B>RelayBandwidthRate </B><I>N</I> <B>bytes</B>|<B>KB</B>|<B>MB</B>|<B>GB</B>|<B>TB</B> 
      <DD> If defined, a separate token bucket limits the average incoming bandwidth 
        usage for _relayed traffic_ on this node to the specified number of bytes 
        per second, and the average outgoing bandwidth usage to that same value. 
        Relayed traffic currently is calculated to include answers to directory 
        requests, but that may change in future versions. (Default: 0) 
    </DL>
    <DL COMPACT>
      <DT><B>RelayBandwidthBurst </B><I>N</I> <B>bytes</B>|<B>KB</B>|<B>MB</B>|<B>GB</B>|<B>TB</B> 
      <DD> Limit the maximum token bucket size (also known as the burst) for _relayed 
        traffic_ to the given number of bytes in each direction. (Default: 0) 
    </DL>
    <DL COMPACT>
      <DT><B>ConnLimit </B><I>NUM</I> 
      <DD> The minimum number of file descriptors that must be available to the 
        Tor process before it will start. Tor will ask the OS for as many file 
        descriptors as the OS will allow (you can find this by &quot;ulimit -H 
        -n&quot;). If this number is less than ConnLimit, then Tor will refuse 
        to start. You probably don't need to adjust this. It has no effect on 
        Windows since that platform lacks getrlimit(). (Default: 1000) 
    </DL>
    <DL COMPACT>
      <DT><B>ConstrainedSockets </B><B>0</B>|<B>1</B> 
      <DD> If set, Tor will tell the kernel to attempt to shrink the buffers for 
        all sockets to the size specified in <B>ConstrainedSockSize</B>. This 
        is useful for virtual servers and other environments where system level 
        TCP buffers may be limited. If you're on a virtual server, and you encounter 
        the &quot;Error creating network socket: No buffer space available&quot; 
        message, you are likely experiencing this problem. 
        <P> The preferred solution is to have the admin increase the buffer pool 
          for the host itself via /proc/sys/net/ipv4/tcp_mem or equivalent facility; 
          this configuration option is a second-resort. 
        <P> The DirPort option should also not be used if TCP buffers are scarce. 
          The cached directory requests consume additional sockets which exacerbates 
          the problem. 
        <P> You should <B>not</B> enable this feature unless you encounter the 
          &quot;no buffer space available&quot; issue. Reducing the TCP buffers 
          affects window size for the TCP stream and will reduce throughput in 
          proportion to round trip time on long paths. (Default: 0.) 
    </DL>
    <DL COMPACT>
      <DT><B>ConstrainedSockSize </B><I>N</I> <B>bytes</B>|<B>KB</B> 
      <DD> When <B>ConstrainedSockets</B> is enabled the receive and transmit 
        buffers for all sockets will be set to this limit. Must be a value between 
        2048 and 262144, in 1024 byte increments. Default of 8192 is recommended. 
    </DL>
    <DL COMPACT>
      <DT><B>ControlPort </B><I>Port</I> 
      <DD> If set, Tor will accept connections on this port and allow those connections 
        to control the Tor process using the Tor Control Protocol (described in 
        control-spec.txt). Note: unless you also specify one of <B>HashedControlPassword</B> 
        or <B>CookieAuthentication</B>, setting this option will cause Tor to 
        allow any process on the local host to control it. This option is required 
        for many Tor controllers; most use the value of 9051. 
    </DL>
    <DL COMPACT>
      <DT><B>ControlListenAddress </B><I>IP</I>[:<I>PORT</I>] 
      <DD> Bind the controller listener to this address. If you specify a port, 
        bind to this port rather than the one specified in ControlPort. We strongly 
        recommend that you leave this alone unless you know what you're doing, 
        since giving attackers access to your control listener is really dangerous. 
        (Default: 127.0.0.1) This directive can be specified multiple times to 
        bind to multiple addresses/ports. 
    </DL>
    <DL COMPACT>
      <DT><B>ControlSocket </B><I>Path</I> 
      <DD> Like ControlPort, but listens on a Unix domain socket, rather than 
        a TCP socket. (Unix and Unix-like systems only.) 
    </DL>
    <DL COMPACT>
      <DT><B>HashedControlPassword </B><I>hashed_password</I> 
      <DD> Don't allow any connections on the control port except when the other 
        process knows the password whose one-way hash is <I>hashed_password</I>. 
        You can compute the hash of a password by running &quot;tor --hash-password 
        <I>password</I>&quot;. You can provide several acceptable passwords by 
        using more than HashedControlPassword line. 
    </DL>
    <DL COMPACT>
      <DT><B>CookieAuthentication </B><B>0</B>|<B>1</B> 
      <DD> If this option is set to 1, don't allow any connections on the control 
        port except when the connecting process knows the contents of a file named 
        &quot;control_auth_cookie&quot;, which Tor will create in its data directory. 
        This authentication method should only be used on systems with good filesystem 
        security. (Default: 0) 
    </DL>
    <DL COMPACT>
      <DT><B>CookieAuthFile </B><I>Path</I> 
      <DD> If set, this option overrides the default location and file name for 
        Tor's cookie file. (See CookieAuthentication above.) 
    </DL>
    <DL COMPACT>
      <DT><B>CookieAuthFileGroupReadable </B><B>0</B>|<B>1</B>|<I>GroupName</I> 
      <DD> If this option is set to 0, don't allow the filesystem group to read 
        the cookie file. If the option is set to 1, make the cookie file readable 
        by the default GID. [Making the file readable by other groups is not yet 
        implemented; let us know if you need this for some reason.] (Default: 
        0). 
    </DL>
    <DL COMPACT>
      <DT><B>DataDirectory </B><I>DIR</I> 
      <DD> Store working data in DIR (Default: @LOCALSTATEDIR@/lib/tor) 
    </DL>
    <DL COMPACT>
      <DT><B>DirServer </B>[<I>nickname</I>] [<B>flags</B>] <I>address</I><B>:</B><I>port 
        fingerprint</I> 
      <DD> Use a nonstandard authoritative directory server at the provided address 
        and port, with the specified key fingerprint. This option can be repeated 
        many times, for multiple authoritative directory servers. Flags are separated 
        by spaces, and determine what kind of an authority this directory is. 
        By default, every authority is authoritative for current (&quot;v2&quot;)-style 
        directories, unless the &quot;no-v2&quot; flag is given. 
        <P>
        <p>If the &quot;v1&quot; flags is provided, Tor will use this server as 
          an authority for old-style (v1) directories as well. (Only directory 
          mirrors care about this.) Tor will use this server as an authority for 
          hidden service information if the &quot;hs&quot; flag is set, or if 
          the &quot;v1&quot; flag is set and the &quot;no-hs&quot; flag is <B>not</B> 
          set. Tor will use this authority as a bridge authoritative directory 
          if the &quot;bridge&quot; flag is set. If a flag &quot;orport=<B>port</B>&quot; 
          is given, Tor will use the given port when opening encrypted tunnels 
          to the dirserver. Lastly, if a flag &quot;v3ident=<B>fp</B>&quot; is 
          given, the dirserver is a v3 directory authority whose v3 long-term 
          signing key has the fingerprint <B>fp</B>. 
        <P>
        <P>If no <B>dirserver</B> line is given, Tor will use the default directory 
          servers. NOTE: this option is intended for setting up a private Tor 
          network with its own directory authorities. If you use it, you will 
          be distinguishable from other users, because you won't believe the same 
          authorities they do. 
    </DL>
    <DL COMPACT>
      <DT><B>AlternateDirAuthority </B>[<I>nickname</I>] [<B>flags</B>] <I>address</I><B>:</B><I>port 
        fingerprint</I> 
      <DD> 
    </DL>
    <DL COMPACT>
      <DT><B>AlternateHSAuthority </B>[<I>nickname</I>] [<B>flags</B>] <I>address</I><B>:</B><I>port 
        fingerprint</I> 
      <DD> 
    </DL>
    <DL COMPACT>
      <DT><B>AlternateBridgeAuthority </B>[<I>nickname</I>] [<B>flags</B>] <I>address</I><B>:</B><I>port 
        fingerprint</I> 
      <DD> As DirServer, but replaces less of the default directory authorities. 
        Using AlternateDirAuthority replaces the default Tor directory authorities, 
        but leaves the hidden service authorities and bridge authorities in place. 
        Similarly, Using AlternateHSAuthority replaces the default hidden service 
        authorities, but not the directory or bridge authorities. 
    </DL>
    <DL COMPACT>
      <DT><B>FetchDirInfoEarly </B><B>0</B>|<B>1</B> 
      <DD> If set to 1, Tor will always fetch directory information like other 
        directory caches, even if you don't meet the normal criteria for fetching 
        early. Normal users should leave it off. (Default: 0) 
    </DL>
    <DL COMPACT>
      <DT><B>FetchHidServDescriptors </B><B>0</B>|<B>1</B> 
      <DD> If set to 0, Tor will never fetch any hidden service descriptors from 
        the rendezvous directories. This option is only useful if you're using 
        a Tor controller that handles hidserv fetches for you. (Default: 1) 
    </DL>
    <DL COMPACT>
      <DT><B>FetchServerDescriptors </B><B>0</B>|<B>1</B> 
      <DD> If set to 0, Tor will never fetch any network status summaries or server 
        descriptors from the directory servers. This option is only useful if 
        you're using a Tor controller that handles directory fetches for you. 
        (Default: 1) 
    </DL>
    <DL COMPACT>
      <DT><B>FetchUselessDescriptors </B><B>0</B>|<B>1</B> 
      <DD> If set to 1, Tor will fetch every non-obsolete descriptor from the 
        authorities that it hears about. Otherwise, it will avoid fetching useless 
        descriptors, for example for routers that are not running. This option 
        is useful if you're using the contributed &quot;exitlist&quot; script 
        to enumerate Tor nodes that exit to certain addresses. (Default: 0) 
    </DL>
    <DL COMPACT>
      <DT><B>HttpProxy</B> <I>host</I>[:<I>port</I>] 
      <DD> Tor will make all its directory requests through this host:port (or 
        host:80 if port is not specified), rather than connecting directly to 
        any directory servers. 
    </DL>
    <DL COMPACT>
      <DT><B>HttpProxyAuthenticator</B> <I>username:password</I> 
      <DD> If defined, Tor will use this username:password for Basic Http proxy 
        authentication, as in RFC 2617. This is currently the only form of Http 
        proxy authentication that Tor supports; feel free to submit a patch if 
        you want it to support others. 
    </DL>
    <DL COMPACT>
      <DT><B>HttpsProxy</B> <I>host</I>[:<I>port</I>] 
      <DD> Tor will make all its OR (SSL) connections through this host:port (or 
        host:443 if port is not specified), via HTTP CONNECT rather than connecting 
        directly to servers. You may want to set <B>FascistFirewall</B> to restrict 
        the set of ports you might try to connect to, if your Https proxy only 
        allows connecting to certain ports. 
    </DL>
    <DL COMPACT>
      <DT><B>HttpsProxyAuthenticator</B> <I>username:password</I> 
      <DD> If defined, Tor will use this username:password for Basic Https proxy 
        authentication, as in RFC 2617. This is currently the only form of Https 
        proxy authentication that Tor supports; feel free to submit a patch if 
        you want it to support others. 
    </DL>
    <DL COMPACT>
      <DT><B>KeepalivePeriod </B><I>NUM</I> 
      <DD> To keep firewalls from expiring connections, send a padding keepalive 
        cell every NUM seconds on open connections that are in use. If the connection 
        has no open circuits, it will instead be closed after NUM seconds of idleness. 
        (Default: 5 minutes) 
    </DL>
    <DL COMPACT>
      <DT><B>Log </B><I>minSeverity</I>[-<I>maxSeverity</I>] <B>stderr</B>|<B>stdout</B>|<B>syslog</B> 
      <DD> Send all messages between <I>minSeverity</I> and <I>maxSeverity</I> 
        to the standard output stream, the standard error stream, or to the system 
        log. (The &quot;syslog&quot; value is only supported on Unix.) Recognized 
        severity levels are debug, info, notice, warn, and err. We advise using 
        &quot;notice&quot; in most cases, since anything more verbose may provide 
        sensitive information to an attacker who obtains the logs. If only one 
        severity level is given, all messages of that level or higher will be 
        sent to the listed destination. 
    </DL>
    <DL COMPACT>
      <DT><B>Log </B><I>minSeverity</I>[-<I>maxSeverity</I>] <B>file</B> <I>FILENAME</I> 
      <DD> As above, but send log messages to the listed filename. The &quot;Log&quot; 
        option may appear more than once in a configuration file. Messages are 
        sent to all the logs that match their severity level. 
    </DL>
    <DL COMPACT>
      <DT><B>OutboundBindAddress </B><I>IP</I> 
      <DD> Make all outbound connections originate from the IP address specified. 
        This is only useful when you have multiple network interfaces, and you 
        want all of Tor's outgoing connections to use a single one. 
    </DL>
    <DL COMPACT>
      <DT><B>PidFile </B><I>FILE</I> 
      <DD> On startup, write our PID to FILE. On clean shutdown, remove FILE. 
    </DL>
    <DL COMPACT>
      <DT><B>ProtocolWarnings </B><B>0</B>|<B>1</B> 
      <DD> If 1, Tor will log with severity 'warn' various cases of other parties 
        not following the Tor specification. Otherwise, they are logged with severity 
        'info'. (Default: 0) 
    </DL>
    <DL COMPACT>
      <DT><B>RunAsDaemon </B><B>0</B>|<B>1</B> 
      <DD> If 1, Tor forks and daemonizes to the background. This option has no 
        effect on Windows; instead you should use the --service command-line option. 
        (Default: 0) 
    </DL>
    <DL COMPACT>
      <DT><B>SafeLogging </B><B>0</B>|<B>1</B> 
      <DD> If 1, Tor replaces potentially sensitive strings in the logs (e.g. 
        addresses) with the string [scrubbed]. This way logs can still be useful, 
        but they don't leave behind personally identifying information about what 
        sites a user might have visited. (Default: 1) 
    </DL>
    <DL COMPACT>
      <DT><B>User </B><I>UID</I> 
      <DD> On startup, setuid to this user and setgid to their primary group. 
    </DL>
    <DL COMPACT>
      <DT><B>HardwareAccel </B><B>0</B>|<B>1</B> 
      <DD> If non-zero, try to use crypto hardware acceleration when available. 
        This is untested and probably buggy. (Default: 0) 
    </DL>
    <DL COMPACT>
      <DT><B>AvoidDiskWrites </B><B>0</B>|<B>1</B> 
      <DD> If non-zero, try to write to disk less frequently than we would otherwise. 
        This is useful when running on flash memory or other media that support 
        only a limited number of writes. (Default: 0) 
    </DL>
    <DL COMPACT>
      <DT><B>TunnelDirConns </B><B>0</B>|<B>1</B> 
      <DD> If non-zero, when a directory server we contact supports it, we will 
        build a one-hop circuit and make an encrypted connection via its ORPort. 
        (Default: 1) 
    </DL>
    <DL COMPACT>
      <DT><B>PreferTunneledDirConns </B><B>0</B>|<B>1</B> 
      <DD> If non-zero, we will avoid directory servers that don't support tunneled 
        directory connections, when possible. (Default: 1) 
    </DL>
    <A NAME="lbAF">&nbsp;</A> 
    <h3>CLIENT OPTIONS</h3>
    <P> The following options are useful only for clients (that is, if <B>SocksPort</B> 
      is non-zero): 
    <DL COMPACT>
      <DT><B>AllowInvalidNodes</B> <B>entry</B>|<B>exit</B>|<B>middle</B>|<B>introduction</B>|<B>rendezvous</B>|... 
      <DD> If some Tor servers are obviously not working right, the directory 
        authorities can manually mark them as invalid, meaning that it's not recommended 
        you use them for entry or exit positions in your circuits. You can opt 
        to use them in some circuit positions, though. The default is &quot;middle,rendezvous&quot;, 
        and other choices are not advised. 
    </DL>
    <DL COMPACT>
      <DT><B>ExcludeSingleHopRelays </B><B>0</B>|<B>1</B> 
      <DD> This option controls whether circuits built by Tor will include relays 
        with the AllowSingleHopExits flag set to true. If ExcludeSingleHopRelays 
        is set to 0, these relays will be included. Note that these relays might 
        be at higher risk of being seized or observed, so they are not normally 
        included. (Default: 1) 
    </DL>
    <DL COMPACT>
      <DT><B>Bridge </B><I>IP:ORPort</I> [fingerprint] 
      <DD> When set along with UseBridges, instructs Tor to use the relay at &quot;IP:ORPort&quot; 
        as a &quot;bridge&quot; relaying into the Tor network. If &quot;fingerprint&quot; 
        is provided (using the same format as for DirServer), we will verify that 
        the relay running at that location has the right fingerprint. We also 
        use fingerprint to look up the bridge descriptor at the bridge authority, 
        if it's provided and if UpdateBridgesFromAuthority is set too. 
    </DL>
    <DL COMPACT>
      <DT><B>CircuitBuildTimeout </B><I>NUM</I> 
      <DD> Try for at most NUM seconds when building circuits. If the circuit 
        isn't open in that time, give up on it. (Default: 1 minute.) 
    </DL>
    <DL COMPACT>
      <DT><B>CircuitIdleTimeout </B><I>NUM</I> 
      <DD> If we have kept a clean (never used) circuit around for NUM seconds, 
        then close it. This way when the Tor client is entirely idle, it can expire 
        all of its circuits, and then expire its TLS connections. Also, if we 
        end up making a circuit that is not useful for exiting any of the requests 
        we're receiving, it won't forever take up a slot in the circuit list. 
        (Default: 1 hour.) 
    </DL>
    <DL COMPACT>
      <DT><B>ClientOnly </B><B>0</B>|<B>1</B> 
      <DD> If set to 1, Tor will under no circumstances run as a server or serve 
        directory requests. The default is to run as a client unless ORPort is 
        configured. (Usually, you don't need to set this; Tor is pretty smart 
        at figuring out whether you are reliable and high-bandwidth enough to 
        be a useful server.) (Default: 0) 
    </DL>
    <DL COMPACT>
      <DT><B>ExcludeNodes </B><I>node</I>,<I>node</I>,<I>...</I> 
      <DD> A list of identity fingerprints, nicknames, country codes and address 
        patterns of nodes to never use when building a circuit. (Example: ExcludeNodes 
        SlowServer, $ABCDEFFFFFFFFFFFFFFF, {cc}, 255.254.0.0/8) 
    </DL>
    <DL COMPACT>
      <DT><B>ExcludeExitNodes </B><I>node</I>,<I>node</I>,<I>...</I> 
      <DD> A list of identity fingerprints, nicknames, country codes and address 
        patterns of nodes to never use when picking an exit node. Note that any 
        node listed in ExcludeNodes is automatically considered to be part of 
        this list. 
    </DL>
    <DL COMPACT>
      <DT><B>EntryNodes </B><I>node</I>,<I>node</I>,<I>...</I> 
      <DD> A list of identity fingerprints, nicknames, country codes and address 
        patterns of nodes to use for the first hop in the circuit. These are treated 
        only as preferences unless StrictEntryNodes (see below) is also set. 
    </DL>
    <DL COMPACT>
      <DT><B>ExitNodes </B><I>node</I>,<I>node</I>,<I>...</I> 
      <DD> A list of identity fingerprints, nicknames, country codes and address 
        patterns of nodes to use for the last hop in the circuit. These are treated 
        only as preferences unless StrictExitNodes (see below) is also set. 
    </DL>
    <DL COMPACT>
      <DT><B>StrictEntryNodes </B><B>0</B>|<B>1</B> 
      <DD> If 1, Tor will never use any nodes besides those listed in &quot;EntryNodes&quot; 
        for the first hop of a circuit. 
    </DL>
    <DL COMPACT>
      <DT><B>StrictExitNodes </B><B>0</B>|<B>1</B> 
      <DD> If 1, Tor will never use any nodes besides those listed in &quot;ExitNodes&quot; 
        for the last hop of a circuit. 
    </DL>
    <DL COMPACT>
      <DT><B>FascistFirewall </B><B>0</B>|<B>1</B> 
      <DD> If 1, Tor will only create outgoing connections to ORs running on ports 
        that your firewall allows (defaults to 80 and 443; see <B>FirewallPorts</B>). 
        This will allow you to run Tor as a client behind a firewall with restrictive 
        policies, but will not allow you to run as a server behind such a firewall. 
        If you prefer more fine-grained control, use ReachableAddresses instead. 
    </DL>
    <DL COMPACT>
      <DT><B>FirewallPorts </B><I>PORTS</I> 
      <DD> A list of ports that your firewall allows you to connect to. Only used 
        when <B>FascistFirewall</B> is set. This option is deprecated; use ReachableAddresses 
        instead. (Default: 80, 443) 
    </DL>
    <DL COMPACT>
      <DT><B>HidServAuth </B><I>onion-address</I> <I>auth-cookie</I> <I>service-name</I> 
      <DD> Client authorization for a hidden service. Valid onion addresses contain 
        16 characters in a-z2-7 plus &quot;.onion&quot;, and valid auth cookies 
        contain 22 characters in A-Za-z0-9+/. The service name is only used for 
        internal purposes, e.g., for Tor controllers. This option may be used 
        multiple times for different hidden services. If a hidden service uses 
        authorization and this option is not set, the hidden service is not accessible. 
    </DL>
    <DL COMPACT>
      <DT><B>ReachableAddresses </B><I>ADDR</I>[<B>/</B><I>MASK</I>][:<I>PORT</I>]... 
      <DD> A comma-separated list of IP addresses and ports that your firewall 
        allows you to connect to. The format is as for the addresses in ExitPolicy, 
        except that &quot;accept&quot; is understood unless &quot;reject&quot; 
        is explicitly provided. For example, 'ReachableAddresses 99.0.0.0/8, reject 
        18.0.0.0/8:80, accept *:80' means that your firewall allows connections 
        to everything inside net 99, rejects port 80 connections to net 18, and 
        accepts connections to port 80 otherwise. (Default: 'accept *:*'.) 
    </DL>
    <DL COMPACT>
      <DT><B>ReachableDirAddresses </B><I>ADDR</I>[<B>/</B><I>MASK</I>][:<I>PORT</I>]... 
      <DD> Like <B>ReachableAddresses</B>, a list of addresses and ports. Tor 
        will obey these restrictions when fetching directory information, using 
        standard HTTP GET requests. If not set explicitly then the value of <B>ReachableAddresses</B> 
        is used. If <B>HttpProxy</B> is set then these connections will go through 
        that proxy. 
    </DL>
    <DL COMPACT>
      <DT><B>ReachableORAddresses </B><I>ADDR</I>[<B>/</B><I>MASK</I>][:<I>PORT</I>]... 
      <DD> Like <B>ReachableAddresses</B>, a list of addresses and ports. Tor 
        will obey these restrictions when connecting to Onion Routers, using TLS/SSL. 
        If not set explicitly then the value of <B>ReachableAddresses</B> is used. 
        If <B>HttpsProxy</B> is set then these connections will go through that 
        proxy.
        <p> 
        <P> The separation between <B>ReachableORAddresses</B> and <B>ReachableDirAddresses</B> 
          is only interesting when you are connecting through proxies (see <B>HttpProxy</B> 
          and <B>HttpsProxy</B>). Most proxies limit TLS connections (which Tor 
          uses to connect to Onion Routers) to port 443, and some limit HTTP GET 
          requests (which Tor uses for fetching directory information) to port 
          80. 
    </DL>
    <DL COMPACT>
      <DT><B>LongLivedPorts </B><I>PORTS</I> 
      <DD> A list of ports for services that tend to have long-running connections 
        (e.g. chat and interactive shells). Circuits for streams that use these 
        ports will contain only high-uptime nodes, to reduce the chance that a 
        node will go down before the stream is finished. (Default: 21, 22, 706, 
        1863, 5050, 5190, 5222, 5223, 6667, 6697, 8300) 
    </DL>
    <DL COMPACT>
      <DT><B>MapAddress</B> <I>address</I> <I>newaddress</I> 
      <DD> When a request for address arrives to Tor, it will rewrite it to newaddress 
        before processing it. For example, if you always want connections to <A HREF="http://www.indymedia.org">www.indymedia.org</A> 
        to exit via <I>torserver</I> (where <I>torserver</I> is the nickname of 
        the server), use &quot;MapAddress <A HREF="http://www.indymedia.org">www.indymedia.org</A> 
        <A HREF="http://www.indymedia.org.torserver.exit">www.indymedia.org.torserver.exit</A>&quot;. 
    </DL>
    <DL COMPACT>
      <DT><B>NewCircuitPeriod </B><I>NUM</I> 
      <DD> Every NUM seconds consider whether to build a new circuit. (Default: 
        30 seconds) 
    </DL>
    <DL COMPACT>
      <DT><B>MaxCircuitDirtiness </B><I>NUM</I> 
      <DD> Feel free to reuse a circuit that was first used at most NUM seconds 
        ago, but never attach a new stream to a circuit that is too old. (Default: 
        10 minutes) 
    </DL>
    <DL COMPACT>
      <DT><B>NodeFamily </B><I>node</I>,<I>node</I>,<I>...</I> 
      <DD> The Tor servers, defined by their identity fingerprints or nicknames, 
        constitute a &quot;family&quot; of similar or co-administered servers, 
        so never use any two of them in the same circuit. Defining a NodeFamily 
        is only needed when a server doesn't list the family itself (with MyFamily). 
        This option can be used multiple times. 
    </DL>
    <DL COMPACT>
      <DT><B>EnforceDistinctSubnets </B><B>0</B>|<B>1</B> 
      <DD> If 1, Tor will not put two servers whose IP addresses are &quot;too 
        close&quot; on the same circuit. Currently, two addresses are &quot;too 
        close&quot; if they lie in the same /16 range. (Default: 1) 
    </DL>
    <DL COMPACT>
      <DT><B>SocksPort </B><I>PORT</I> 
      <DD> Advertise this port to listen for connections from Socks-speaking applications. 
        Set this to 0 if you don't want to allow application connections. (Default: 
        9050) 
    </DL>
    <DL COMPACT>
      <DT><B>SocksListenAddress </B><I>IP</I>[:<I>PORT</I>] 
      <DD> Bind to this address to listen for connections from Socks-speaking 
        applications. (Default: 127.0.0.1) You can also specify a port (e.g. 192.168.0.1:9100). 
        This directive can be specified multiple times to bind to multiple addresses/ports. 
    </DL>
    <DL COMPACT>
      <DT><B>SocksPolicy </B><I>policy</I>,<I>policy</I>,<I>...</I> 
      <DD> Set an entrance policy for this server, to limit who can connect to 
        the SocksPort and DNSPort ports. The policies have the same form as exit 
        policies below. 
    </DL>
    <DL COMPACT>
      <DT><B>SocksTimeout </B><I>NUM</I> 
      <DD> Let a socks connection wait NUM seconds handshaking, and NUM seconds 
        unattached waiting for an appropriate circuit, before we fail it. (Default: 
        2 minutes.) 
    </DL>
    <DL COMPACT>
      <DT><B>TrackHostExits </B><I>host</I>,<I>.domain</I>,<I>...</I> 
      <DD> For each value in the comma separated list, Tor will track recent connections 
        to hosts that match this value and attempt to reuse the same exit node 
        for each. If the value is prepended with a '.', it is treated as matching 
        an entire domain. If one of the values is just a '.', it means match everything. 
        This option is useful if you frequently connect to sites that will expire 
        all your authentication cookies (ie log you out) if your IP address changes. 
        Note that this option does have the disadvantage of making it more clear 
        that a given history is associated with a single user. However, most people 
        who would wish to observe this will observe it through cookies or other 
        protocol-specific means anyhow. 
    </DL>
    <DL COMPACT>
      <DT><B>TrackHostExitsExpire </B><I>NUM</I> 
      <DD> Since exit servers go up and down, it is desirable to expire the association 
        between host and exit server after NUM seconds. The default is 1800 seconds 
        (30 minutes). 
    </DL>
    <DL COMPACT>
      <DT><B>UpdateBridgesFromAuthority </B><B>0</B>|<B>1</B> 
      <DD> When set (along with UseBridges), Tor will try to fetch bridge descriptors 
        from the configured bridge authorities when feasible. It will fall back 
        to a direct request if the authority responds with a 404. (Default: 0) 
    </DL>
    <DL COMPACT>
      <DT><B>UseBridges </B><B>0</B>|<B>1</B> 
      <DD> When set, Tor will fetch descriptors for each bridge listed in the 
        &quot;Bridge&quot; config lines, and use these relays as both entry guards 
        and directory guards. (Default: 0) 
    </DL>
    <DL COMPACT>
      <DT><B>UseEntryGuards </B><B>0</B>|<B>1</B> 
      <DD> If this option is set to 1, we pick a few long-term entry servers, 
        and try to stick with them. This is desirable because constantly changing 
        servers increases the odds that an adversary who owns some servers will 
        observe a fraction of your paths. (Defaults to 1.) 
    </DL>
    <DL COMPACT>
      <DT><B>NumEntryGuards </B><I>NUM</I> 
      <DD> If UseEntryGuards is set to 1, we will try to pick a total of NUM routers 
        as long-term entries for our circuits. (Defaults to 3.) 
    </DL>
    <DL COMPACT>
      <DT><B>SafeSocks </B><B>0</B>|<B>1</B> 
      <DD> When this option is enabled, Tor will reject application connections 
        that use unsafe variants of the socks protocol -- ones that only provide 
        an IP address, meaning the application is doing a DNS resolve first. Specifically, 
        these are socks4 and socks5 when not doing remote DNS. (Defaults to 0.) 
    </DL>
    <DL COMPACT>
      <DT><B>TestSocks </B><B>0</B>|<B>1</B> 
      <DD> When this option is enabled, Tor will make a notice-level log entry 
        for each connection to the Socks port indicating whether the request used 
        a safe socks protocol or an unsafe one (see above entry on SafeSocks). 
        This helps to determine whether an application using Tor is possibly leaking 
        DNS requests. (Default: 0) 
    </DL>
    <DL COMPACT>
      <DT><B>VirtualAddrNetwork </B><I>Address</I><B>/</B><I>bits</I> 
      <DD> When a controller asks for a virtual (unused) address with the MAPADDRESS 
        command, Tor picks an unassigned address from this range. (Default: 127.192.0.0/10)
        <p> 
        <P> When providing proxy server service to a network of computers using 
          a tool like dns-proxy-tor, change this address to &quot;10.192.0.0/10&quot; 
          or &quot;172.16.0.0/12&quot;. The default <B>VirtualAddrNetwork</B> 
          address range on a properly configured machine will route to the loopback 
          interface. For local use, no change to the default <B>VirtualAddrNetwork</B> 
          setting is needed. 
    </DL>
    <DL COMPACT>
      <DT><B>AllowNonRFC953Hostnames </B><B>0</B>|<B>1</B> 
      <DD> When this option is disabled, Tor blocks hostnames containing illegal 
        characters (like @ and :) rather than sending them to an exit node to 
        be resolved. This helps trap accidental attempts to resolve URLs and so 
        on. (Default: 0) 
    </DL>
    <DL COMPACT>
      <DT><B>FastFirstHopPK </B><B>0</B>|<B>1</B> 
      <DD> When this option is disabled, Tor uses the public key step for the 
        first hop of creating circuits. Skipping it is generally safe since we 
        have already used TLS to authenticate the relay and to establish forward-secure 
        keys. Turning this option off makes circuit building slower.
        <p> 
        <P> Note that Tor will always use the public key step for the first hop 
          if it's operating as a relay, and it will never use the public key step 
          if it doesn't yet know the onion key of the first hop. (Default: 1) 
    </DL>
    <DL COMPACT>
      <DT><B>TransPort</B> <I>PORT</I> 
      <DD> If non-zero, enables transparent proxy support on <I>PORT</I> (by convention, 
        9040). Requires OS support for transparent proxies, such as BSDs' pf or 
        Linux's IPTables. If you're planning to use Tor as a transparent proxy 
        for a network, you'll want to examine and change VirtualAddrNetwork from 
        the default setting. You'll also want to set the TransListenAddress option 
        for the network you'd like to proxy. (Default: 0). 
    </DL>
    <DL COMPACT>
      <DT><B>TransListenAddress</B> <I>IP</I>[:<I>PORT</I>] 
      <DD> Bind to this address to listen for transparent proxy connections. (Default: 
        127.0.0.1). This is useful for exporting a transparent proxy server to 
        an entire network. 
    </DL>
    <DL COMPACT>
      <DT><B>NATDPort</B> <I>PORT</I> 
      <DD> Allow old versions of ipfw (as included in old versions of FreeBSD, 
        etc.) to send connections through Tor using the NATD protocol. This option 
        is only for people who cannot use TransPort. 
    </DL>
    <DL COMPACT>
      <DT><B>NATDListenAddress</B> <I>IP</I>[:<I>PORT</I>] 
      <DD> Bind to this address to listen for NATD connections. (Default: 127.0.0.1). 
    </DL>
    <DL COMPACT>
      <DT><B>AutomapHostsOnResolve</B> <B>0</B>|<B>1</B> 
      <DD> When this option is enabled, and we get a request to resolve an address 
        that ends with one of the suffixes in <B>AutomapHostsSuffixes</B>, we 
        map an unused virtual address to that address, and return the new virtual 
        address. This is handy for making &quot;.onion&quot; addresses work with 
        applications that resolve an address and then connect to it. (Default: 
        0). 
    </DL>
    <DL COMPACT>
      <DT><B>AutomapHostsSuffixes</B> <I>SUFFIX</I>,<I>SUFFIX</I>,... 
      <DD> A comma-separated list of suffixes to use with <B>AutomapHostsOnResolve</B>. 
        The &quot;.&quot; suffix is equivalent to &quot;all addresses.&quot; (Default: 
        .exit,.onion). 
    </DL>
    <DL COMPACT>
      <DT><B>DNSPort</B> <I>PORT</I> 
      <DD> If non-zero, Tor listens for UDP DNS requests on this port and resolves 
        them anonymously. (Default: 0). 
    </DL>
    <DL COMPACT>
      <DT><B>DNSListenAddress</B> <I>IP</I>[:<I>PORT</I>] 
      <DD> Bind to this address to listen for DNS connections. (Default: 127.0.0.1). 
    </DL>
    <DL COMPACT>
      <DT><B>ClientDNSRejectInternalAddresses</B> <B>0</B>|<B>1</B> 
      <DD> If true, Tor does not believe any anonymously retrieved DNS answer 
        that tells it that an address resolves to an internal address (like 127.0.0.1 
        or 192.168.0.1). This option prevents certain browser-based attacks; don't 
        turn it off unless you know what you're doing. (Default: 1). 
    </DL>
    <DL COMPACT>
      <DT><B>DownloadExtraInfo</B> <B>0</B>|<B>1</B> 
      <DD> If true, Tor downloads and caches &quot;extra-info&quot; documents. 
        These documents contain information about servers other than the information 
        in their regular router descriptors. Tor does not use this information 
        for anything itself; to save bandwidth, leave this option turned off. 
        (Default: 0). 
    </DL>
    <DL COMPACT>
      <DT><B>FallbackNetworkstatusFile</B> <I>FILENAME</I> 
      <DD> If Tor doesn't have a cached networkstatus file, it starts out using 
        this one instead. Even if this file is out of date, Tor can still use 
        it to learn about directory mirrors, so it doesn't need to put load on 
        the authorities. (Default: None). 
    </DL>
    <DL COMPACT>
      <DT><B>WarnPlaintextPorts</B> <I>port</I>,<I>port</I>,<I>...</I> 
      <DD> Tells Tor to issue a warnings whenever the user tries to make an anonymous 
        connection to one of these ports. This option is designed to alert users 
        to services that risk sending passwords in the clear. (Default: 23,109,110,143). 
    </DL>
    <DL COMPACT>
      <DT><B>RejectPlaintextPorts</B> <I>port</I>,<I>port</I>,<I>...</I> 
      <DD> Like WarnPlaintextPorts, but instead of warning about risky port uses, 
        Tor will instead refuse to make the connection. (Default: None). 
    </DL>
    <A NAME="lbAG">&nbsp;</A> 
    <h3>SERVER OPTIONS</h3>
    <P> The following options are useful only for servers (that is, if <B>ORPort</B> 
      is non-zero): 
    <DL COMPACT>
      <DT><B>Address </B><I>address</I> 
      <DD> The IP address or fqdn of this server (e.g. moria.mit.edu). You can 
        leave this unset, and Tor will guess your IP address. 
    </DL>
    <DL COMPACT>
      <DT><B>AllowSingleHopExits </B><B>0</B>|<B>1</B> 
      <DD> This option controls whether clients can use this server as a single 
        hop proxy. If set to 1, clients can use this server as an exit even if 
        it is the only hop in the circuit. (Default: 0) 
    </DL>
    <DL COMPACT>
      <DT><B>AssumeReachable </B><B>0</B>|<B>1</B> 
      <DD> This option is used when bootstrapping a new Tor network. If set to 
        1, don't do self-reachability testing; just upload your server descriptor 
        immediately. If <B>AuthoritativeDirectory</B> is also set, this option 
        instructs the dirserver to bypass remote reachability testing too and 
        list all connected servers as running. 
    </DL>
    <DL COMPACT>
      <DT><B>BridgeRelay </B><B>0</B>|<B>1</B> 
      <DD> Sets the relay to act as a &quot;bridge&quot; with respect to relaying 
        connections from bridge users to the Tor network. Mainly it influences 
        how the relay will cache and serve directory information. Usually used 
        in combination with PublishServerDescriptor. 
    </DL>
    <DL COMPACT>
      <DT><B>ContactInfo </B><I>email_address</I> 
      <DD> Administrative contact information for server. This line might get 
        picked up by spam harvesters, so you may want to obscure the fact that 
        it's an email address. 
    </DL>
    <DL COMPACT>
      <DT><B>ExitPolicy </B><I>policy</I>,<I>policy</I>,<I>...</I> 
      <DD> Set an exit policy for this server. Each policy is of the form &quot;<B>accept</B>|<B>reject</B> 
        <I>ADDR</I>[<B>/</B><I>MASK</I>]<B>[:</B><I>PORT</I>]&quot;. If <B>/</B><I>MASK</I> 
        is omitted then this policy just applies to the host given. Instead of 
        giving a host or network you can also use &quot;<B>*</B>&quot; to denote 
        the universe (0.0.0.0/0). <I>PORT</I> can be a single port number, an 
        interval of ports &quot;<I>FROM_PORT</I><B>-</B><I>TO_PORT</I>&quot;, 
        or &quot;<B>*</B>&quot;. If <I>PORT</I> is omitted, that means &quot;<B>*</B>&quot;. 
        <P> For example, &quot;accept 18.7.22.69:*,reject 18.0.0.0/8:*,accept 
          *:*&quot; would reject any traffic destined for MIT except for web.mit.edu, 
          and accept anything else. 
        <P> To specify all internal and link-local networks (including 0.0.0.0/8, 
          169.254.0.0/16, 127.0.0.0/8, 192.168.0.0/16, 10.0.0.0/8, and 172.16.0.0/12), 
          you can use the &quot;private&quot; alias instead of an address. These 
          addresses are rejected by default (at the beginning of your exit policy), 
          along with your public IP address, unless you set the ExitPolicyRejectPrivate 
          config option to 0. For example, once you've done that, you could allow 
          HTTP to 127.0.0.1 and block all other connections to internal networks 
          with &quot;accept 127.0.0.1:80,reject private:*&quot;, though that may 
          also allow connections to your own computer that are addressed to its 
          public (external) IP address. See RFC 1918 and RFC 3330 for more details 
          about internal and reserved IP address space. 
        <P> This directive can be specified multiple times so you don't have to 
          put it all on one line. 
        <P> Policies are considered first to last, and the first match wins. If 
          you want to _replace_ the default exit policy, end your exit policy 
          with either a reject *:* or an accept *:*. Otherwise, you're _augmenting_ 
          (prepending to) the default exit policy. The default exit policy is: 
        <DL COMPACT>
          <DT> 
          <DD> 
            <DL COMPACT>
              <DT>reject *:25 
              <DD> 
              <DT>reject *:119 
              <DD> 
              <DT>reject *:135-139 
              <DD> 
              <DT>reject *:445 
              <DD> 
              <DT>reject *:563 
              <DD> 
              <DT>reject *:1214 
              <DD> 
              <DT>reject *:4661-4666 
              <DD> 
              <DT>reject *:6346-6429 
              <DD> 
              <DT>reject *:6699 
              <DD> 
              <DT>reject *:6881-6999 
              <DD> 
              <DT>accept *:* 
              <DD> 
            </DL>
        </DL>
    </DL>
    <DL COMPACT>
      <DT><B>ExitPolicyRejectPrivate </B><B>0</B>|<B>1</B> 
      <DD> Reject all private (local) networks, along with your own public IP 
        address, at the beginning of your exit policy. See above entry on ExitPolicy. 
        (Default: 1) 
    </DL>
    <DL COMPACT>
      <DT><B>MaxOnionsPending </B><I>NUM</I> 
      <DD> If you have more than this number of onionskins queued for decrypt, 
        reject new ones. (Default: 100) 
    </DL>
    <DL COMPACT>
      <DT><B>MyFamily </B><I>node</I>,<I>node</I>,<I>...</I> 
      <DD> Declare that this Tor server is controlled or administered by a group 
        or organization identical or similar to that of the other servers, defined 
        by their identity fingerprints or nicknames. When two servers both declare 
        that they are in the same 'family', Tor clients will not use them in the 
        same circuit. (Each server only needs to list the other servers in its 
        family; it doesn't need to list itself, but it won't hurt.) 
    </DL>
    <DL COMPACT>
      <DT><B>Nickname </B><I>name</I> 
      <DD> Set the server's nickname to 'name'. Nicknames must be between 1 and 
        19 characters inclusive, and must contain only the characters [a-zA-Z0-9]. 
    </DL>
    <DL COMPACT>
      <DT><B>NumCPUs </B><I>num</I> 
      <DD> How many processes to use at once for decrypting onionskins. (Default: 
        1) 
    </DL>
    <DL COMPACT>
      <DT><B>ORPort </B><I>PORT</I> 
      <DD> Advertise this port to listen for connections from Tor clients and 
        servers. 
    </DL>
    <DL COMPACT>
      <DT><B>ORListenAddress </B><I>IP</I>[:<I>PORT</I>] 
      <DD> Bind to this IP address to listen for connections from Tor clients 
        and servers. If you specify a port, bind to this port rather than the 
        one specified in ORPort. (Default: 0.0.0.0) This directive can be specified 
        multiple times to bind to multiple addresses/ports. 
    </DL>
    <DL COMPACT>
      <DT><B>PublishServerDescriptor </B><B>0</B>|<B>1</B>|<B>v1</B>|<B>v2</B>|<B>v3</B>|<B>bridge</B>|<B>hidserv</B>, 
        ... 
      <DD> This option is only considered if you have an ORPort defined. You can 
        choose multiple arguments, separated by commas. 
        <P> If set to 0, Tor will act as a server but it will not publish its 
          descriptor to the directory authorities. (This is useful if you're testing 
          out your server, or if you're using a Tor controller that handles directory 
          publishing for you.) Otherwise, Tor will publish its descriptor to all 
          directory authorities of the type(s) specified. The value &quot;1&quot; 
          is the default, which means &quot;publish to the appropriate authorities&quot;. 
    </DL>
    <DL COMPACT>
      <DT><B>ShutdownWaitLength</B> <I>NUM</I> 
      <DD> When we get a SIGINT and we're a server, we begin shutting down: we 
        close listeners and start refusing new circuits. After <B>NUM</B> seconds, 
        we exit. If we get a second SIGINT, we exit immediately. (Default: 30 
        seconds) 
    </DL>
    <DL COMPACT>
      <DT><B>AccountingMax </B><I>N</I> <B>bytes</B>|<B>KB</B>|<B>MB</B>|<B>GB</B>|<B>TB</B> 
      <DD> Never send more than the specified number of bytes in a given accounting 
        period, or receive more than that number in the period. For example, with 
        AccountingMax set to 1 GB, a server could send 900 MB and receive 800 
        MB and continue running. It will only hibernate once one of the two reaches 
        1 GB. When the number of bytes is exhausted, Tor will hibernate until 
        some time in the next accounting period. To prevent all servers from waking 
        at the same time, Tor will also wait until a random point in each period 
        before waking up. If you have bandwidth cost issues, enabling hibernation 
        is preferable to setting a low bandwidth, since it provides users with 
        a collection of fast servers that are up some of the time, which is more 
        useful than a set of slow servers that are always &quot;available&quot;. 
    </DL>
    <DL COMPACT>
      <DT><B>AccountingStart </B><B>day</B>|<B>week</B>|<B>month</B> [<I>day</I>] 
        <I>HH:MM</I> 
      <DD> Specify how long accounting periods last. If <B>month</B> is given, 
        each accounting period runs from the time <I>HH:MM</I> on the <I>day</I>th 
        day of one month to the same day and time of the next. (The day must be 
        between 1 and 28.) If <B>week</B> is given, each accounting period runs 
        from the time <I>HH:MM</I> of the <I>day</I>th day of one week to the 
        same day and time of the next week, with Monday as day 1 and Sunday as 
        day 7. If <B>day</B> is given, each accounting period runs from the time 
        <I>HH:MM</I> each day to the same time on the next day. All times are 
        local, and given in 24-hour time. (Defaults to &quot;month 1 0:00&quot;.) 
    </DL>
    <DL COMPACT>
      <DT><B>ServerDNSResolvConfFile </B><I>filename</I> 
      <DD> Overrides the default DNS configuration with the configuration in <I>filename</I>. 
        The file format is the same as the standard Unix &quot;<B>resolv.conf</B>&quot; 
        file (7). This option, like all other ServerDNS options, only affects 
        name lookups that your server does on behalf of clients. (Defaults to 
        use the system DNS configuration.) 
    </DL>
    <DL COMPACT>
      <DT><B>ServerDNSAllowBrokenConfig </B><B>0</B>|<B>1</B> 
      <DD> If this option is false, Tor exits immediately if there are problems 
        parsing the system DNS configuration or connecting to nameservers. Otherwise, 
        Tor continues to periodically retry the system namesevers until it eventually 
        succeeds. (Defaults to &quot;1&quot;.) 
    </DL>
    <DL COMPACT>
      <DT><B>ServerDNSSearchDomains </B><B>0</B>|<B>1</B> 
      <DD> If set to <B>1</B>, then we will search for addresses in the local 
        search domain. For example, if this system is configured to believe it 
        is in &quot;example.com&quot;, and a client tries to connect to &quot;www&quot;, 
        the client will be connected to &quot;<A HREF="http://www.example.com">www.example.com</A>&quot;. 
        This option only affects name lookups that your server does on behalf 
        of clients. (Defaults to &quot;0&quot;.) 
    </DL>
    <DL COMPACT>
      <DT><B>ServerDNSDetectHijacking </B><B>0</B>|<B>1</B> 
      <DD> When this option is set to 1, we will test periodically to determine 
        whether our local nameservers have been configured to hijack failing DNS 
        requests (usually to an advertising site). If they are, we will attempt 
        to correct this. This option only affects name lookups that your server 
        does on behalf of clients. (Defaults to &quot;1&quot;.) 
    </DL>
    <DL COMPACT>
      <DT><B>ServerDNSTestAddresses </B><I>address</I>,<I>address</I>,<I>...</I> 
      <DD> When we're detecting DNS hijacking, make sure that these <I>valid</I> 
        addresses aren't getting redirected. If they are, then our DNS is completely 
        useless, and we'll reset our exit policy to &quot;reject *:*&quot;. This 
        option only affects name lookups that your server does on behalf of clients. 
        (Defaults to &quot;<A HREF="http://www.google.com">www.google.com</A>, 
        <A HREF="http://www.mit.edu">www.mit.edu</A>, <A HREF="http://www.yahoo.com">www.yahoo.com</A>, 
        <A HREF="http://www.slashdot.org">www.slashdot.org</A>&quot;.) 
    </DL>
    <DL COMPACT>
      <DT><B>ServerDNSAllowNonRFC953Hostnames </B><B>0</B>|<B>1</B> 
      <DD> When this option is disabled, Tor does not try to resolve hostnames 
        containing illegal characters (like @ and :) rather than sending them 
        to an exit node to be resolved. This helps trap accidental attempts to 
        resolve URLs and so on. This option only affects name lookups that your 
        server does on behalf of clients. (Default: 0) 
    </DL>
    <DL COMPACT>
      <DT><B>BridgeRecordUsageByCountry </B><B>0</B>|<B>1</B> 
      <DD> When this option is enabled and BridgeRelay is also enabled, and we 
        have GeoIP data, Tor keeps a keep a per-country count of how many client 
        addresses have contacted it so that it can help the bridge authority guess 
        which countries have blocked access to it. (Default: 1) 
    </DL>
    <DL COMPACT>
      <DT><B>ServerDNSRandomizeCase </B><B>0</B>|<B>1</B> 
      <DD> When this option is set, Tor sets the case of each character randomly 
        in outgoing DNS requests, and makes sure that the case matches in DNS 
        replies. This so-called &quot;0x20 hack&quot; helps resist some types 
        of DNS poisoning attack. For more information, see &quot;Increased DNS 
        Forgery Resistance through 0x20-Bit Encoding&quot;. This option only affects 
        name lookups that your server does on behalf of clients. (Default: 1) 
    </DL>
    <DL COMPACT>
      <DT><B>GeoIPFile </B><I>filename</I> 
      <DD> A filename containing GeoIP data, for use with BridgeRecordUsageByCountry. 
    </DL>
    <A NAME="lbAH">&nbsp;</A> 
    <h3>DIRECTORY SERVER OPTIONS</h3>
    <P> The following options are useful only for directory servers (that is, 
      if <B>DirPort</B> is non-zero): 
    <DL COMPACT>
      <DT><B>AuthoritativeDirectory </B><B>0</B>|<B>1</B> 
      <DD> When this option is set to 1, Tor operates as an authoritative directory 
        server. Instead of caching the directory, it generates its own list of 
        good servers, signs it, and sends that to the clients. Unless the clients 
        already have you listed as a trusted directory, you probably do not want 
        to set this option. Please coordinate with the other admins at <A HREF="mailto:tor-ops@freehaven.net">tor-ops@freehaven.net</A> 
        if you think you should be a directory. 
    </DL>
    <DL COMPACT>
      <DT><B>DirPortFrontPage </B><I>FILENAME</I> 
      <DD> When this option is set, it takes an html file and publishes it as 
        &quot;/&quot; on the DirPort. Now relay operators can provide a disclaimer 
        without needing to set up a separate webserver. There's a sample disclaimer 
        in contrib/tor-exit-notice.html. 
    </DL>
    <DL COMPACT>
      <DT><B>V1AuthoritativeDirectory </B><B>0</B>|<B>1</B> 
      <DD> When this option is set in addition to <B>AuthoritativeDirectory</B>, 
        Tor generates version 1 directory and running-routers documents (for legacy 
        Tor clients up to 0.1.0.x). 
    </DL>
    <DL COMPACT>
      <DT><B>V2AuthoritativeDirectory </B><B>0</B>|<B>1</B> 
      <DD> When this option is set in addition to <B>AuthoritativeDirectory</B>, 
        Tor generates version 2 network statuses and serves descriptors, etc as 
        described in doc/spec/dir-spec-v2.txt (for Tor clients and servers running 
        0.1.1.x and 0.1.2.x). 
    </DL>
    <DL COMPACT>
      <DT><B>V3AuthoritativeDirectory </B><B>0</B>|<B>1</B> 
      <DD> When this option is set in addition to <B>AuthoritativeDirectory</B>, 
        Tor generates version 3 network statuses and serves descriptors, etc as 
        described in doc/spec/dir-spec.txt (for Tor clients and servers running 
        at least 0.2.0.x). 
    </DL>
    <DL COMPACT>
      <DT><B>VersioningAuthoritativeDirectory </B><B>0</B>|<B>1</B> 
      <DD> When this option is set to 1, Tor adds information on which versions 
        of Tor are still believed safe for use to the published directory. Each 
        version 1 authority is automatically a versioning authority; version 2 
        authorities provide this service optionally. See <B>RecommendedVersions</B>, 
        <B>RecommendedClientVersions</B>, and <B>RecommendedServerVersions</B>. 
    </DL>
    <DL COMPACT>
      <DT><B>NamingAuthoritativeDirectory </B><B>0</B>|<B>1</B> 
      <DD> When this option is set to 1, then the server advertises that it has 
        opinions about nickname-to-fingerprint bindings. It will include these 
        opinions in its published network-status pages, by listing servers with 
        the flag &quot;Named&quot; if a correct binding between that nickname 
        and fingerprint has been registered with the dirserver. Naming dirservers 
        will refuse to accept or publish descriptors that contradict a registered 
        binding. See <B>approved-routers</B> in the <B>FILES</B> section below. 
    </DL>
    <DL COMPACT>
      <DT><B>HSAuthoritativeDir </B><B>0</B>|<B>1</B> 
      <DD> When this option is set in addition to <B>AuthoritativeDirectory</B>, 
        Tor also accepts and serves hidden service descriptors. (Default: 0) 
    </DL>
    <DL COMPACT>
      <DT><B>HSAuthorityRecordStats </B><B>0</B>|<B>1</B> 
      <DD> When this option is set in addition to <B>HSAuthoritativeDir</B>, Tor 
        periodically (every 15 minutes) writes statistics about hidden service 
        usage to a file <B>hsusage</B> in its data directory. (Default: 0) 
    </DL>
    <DL COMPACT>
      <DT><B>HidServDirectoryV2 </B><B>0</B>|<B>1</B> 
      <DD> When this option is set, Tor accepts and serves v2 hidden service descriptors. 
        Setting DirPort is not required for this, because clients connect via 
        the ORPort by default. (Default: 1) 
    </DL>
    <DL COMPACT>
      <DT><B>BridgeAuthoritativeDir </B><B>0</B>|<B>1</B> 
      <DD> When this option is set in addition to <B>AuthoritativeDirectory</B>, 
        Tor accepts and serves router descriptors, but it caches and serves the 
        main networkstatus documents rather than generating its own. (Default: 
        0) 
    </DL>
    <DL COMPACT>
      <DT><B>MinUptimeHidServDirectoryV2 </B><I>N</I> <B>seconds</B>|<B>minutes</B>|<B>hours</B>|<B>days</B>|<B>weeks</B> 
      <DD> Minimum uptime of a v2 hidden service directory to be accepted as such 
        by authoritative directories. (Default: 24 hours) 
    </DL>
    <DL COMPACT>
      <DT><B>DirPort </B><I>PORT</I> 
      <DD> Advertise the directory service on this port. 
    </DL>
    <DL COMPACT>
      <DT><B>DirListenAddress </B><I>IP</I>[:<I>PORT</I>] 
      <DD> Bind the directory service to this address. If you specify a port, 
        bind to this port rather than the one specified in DirPort. (Default: 
        0.0.0.0) This directive can be specified multiple times to bind to multiple 
        addresses/ports. 
    </DL>
    <DL COMPACT>
      <DT><B>DirPolicy </B><I>policy</I>,<I>policy</I>,<I>...</I> 
      <DD> Set an entrance policy for this server, to limit who can connect to 
        the directory ports. The policies have the same form as exit policies 
        above. 
    </DL>
    <A NAME="lbAI">&nbsp;</A> 
    <h3>DIRECTORY AUTHORITY SERVER OPTIONS</h3>
    <P> 
    <DL COMPACT>
      <DT><B>RecommendedVersions </B><I>STRING</I> 
      <DD> STRING is a comma-separated list of Tor versions currently believed 
        to be safe. The list is included in each directory, and nodes which pull 
        down the directory learn whether they need to upgrade. This option can 
        appear multiple times: the values from multiple lines are spliced together. 
        When this is set then <B>VersioningAuthoritativeDirectory</B> should be 
        set too. 
    </DL>
    <DL COMPACT>
      <DT><B>RecommendedClientVersions </B><I>STRING</I> 
      <DD> STRING is a comma-separated list of Tor versions currently believed 
        to be safe for clients to use. This information is included in version 
        2 directories. If this is not set then the value of <B>RecommendedVersions</B> 
        is used. When this is set then <B>VersioningAuthoritativeDirectory</B> 
        should be set too. 
    </DL>
    <DL COMPACT>
      <DT><B>RecommendedServerVersions </B><I>STRING</I> 
      <DD> STRING is a comma-separated list of Tor versions currently believed 
        to be safe for servers to use. This information is included in version 
        2 directories. If this is not set then the value of <B>RecommendedVersions</B> 
        is used. When this is set then <B>VersioningAuthoritativeDirectory</B> 
        should be set too. 
    </DL>
    <DL COMPACT>
      <DT><B>DirAllowPrivateAddresses </B><B>0</B>|<B>1</B> 
      <DD> If set to 1, Tor will accept router descriptors with arbitrary &quot;Address&quot; 
        elements. Otherwise, if the address is not an IP address or is a private 
        IP address, it will reject the router descriptor. Defaults to 0. 
    </DL>
    <DL COMPACT>
      <DT><B>AuthDirBadDir </B><I>AddressPattern</I>... 
      <DD> Authoritative directories only. A set of address patterns for servers 
        that will be listed as bad directories in any network status document 
        this authority publishes, if <B>AuthDirListBadDirs</B> is set. 
    </DL>
    <DL COMPACT>
      <DT><B>AuthDirBadExit </B><I>AddressPattern</I>... 
      <DD> Authoritative directories only. A set of address patterns for servers 
        that will be listed as bad exits in any network status document this authority 
        publishes, if <B>AuthDirListBadExits</B> is set. 
    </DL>
    <DL COMPACT>
      <DT><B>AuthDirInvalid </B><I>AddressPattern</I>... 
      <DD> Authoritative directories only. A set of address patterns for servers 
        that will never be listed as &quot;valid&quot; in any network status document 
        that this authority publishes. 
    </DL>
    <DL COMPACT>
      <DT><B>AuthDirReject </B><I>AddressPattern</I>... 
      <DD> Authoritative directories only. A set of address patterns for servers 
        that will never be listed at all in any network status document that this 
        authority publishes, or accepted as an OR address in any descriptor submitted 
        for publication by this authority. 
    </DL>
    <DL COMPACT>
      <DT><B>AuthDirListBadDirs </B><B>0</B>|<B>1</B> 
      <DD> Authoritative directories only. If set to 1, this directory has some 
        opinion about which nodes are unsuitable as directory caches. (Do not 
        set this to 1 unless you plan to list nonfunctioning directories as bad; 
        otherwise, you are effectively voting in favor of every declared directory.) 
    </DL>
    <DL COMPACT>
      <DT><B>AuthDirListBadExits </B><B>0</B>|<B>1</B> 
      <DD> Authoritative directories only. If set to 1, this directory has some 
        opinion about which nodes are unsuitable as exit nodes. (Do not set this 
        to 1 unless you plan to list nonfunctioning exits as bad; otherwise, you 
        are effectively voting in favor of every declared exit as an exit.) 
    </DL>
    <DL COMPACT>
      <DT><B>AuthDirRejectUnlisted </B><B>0</B>|<B>1</B> 
      <DD> Authoritative directories only. If set to 1, the directory server rejects 
        all uploaded server descriptors that aren't explicitly listed in the fingerprints 
        file. This acts as a &quot;panic button&quot; if we get Sybiled. (Default: 
        0) 
    </DL>
    <DL COMPACT>
      <DT><B>AuthDirMaxServersPerAddr</B> <I>NUM</I> 
      <DD> Authoritative directories only. The maximum number of servers that 
        we will list as acceptable on a single IP address. Set this to &quot;0&quot; 
        for &quot;no limit&quot;. (Default: 2) 
    </DL>
    <DL COMPACT>
      <DT><B>AuthDirMaxServersPerAuthAddr</B> <I>NUM</I> 
      <DD> Authoritative directories only. Like AuthDirMaxServersPerAddr, but 
        applies to addresses shared with directory authorities. (Default: 5) 
    </DL>
    <DL COMPACT>
      <DT><B>V3AuthVotingInterval</B> <I>N</I> <B>minutes</B>|<B>hours</B> 
      <DD> V3 authoritative directories only. Configures the server's preferred 
        voting interval. Note that voting will <I>actually</I> happen at an interval 
        chosen by consensus from all the authorities' preferred intervals. This 
        time SHOULD divide evenly into a day. (Default: 1 hour) 
    </DL>
    <DL COMPACT>
      <DT><B>V3AuthVoteDelay</B> <I>N</I> <B>minutes</B>|<B>hours</B> 
      <DD> V3 authoritative directories only. Configures the server's preferred 
        delay between publishing its vote and assuming it has all the votes from 
        all the other authorities. Note that the actual time used is not the server's 
        preferred time, but the consensus of all preferences. (Default: 5 minutes.) 
    </DL>
    <DL COMPACT>
      <DT><B>V3AuthDistDelay</B> <I>N</I> <B>minutes</B>|<B>hours</B> 
      <DD> V3 authoritative directories only. Configures the server's preferred 
        delay between publishing its consensus and signature and assuming it has 
        all the signatures from all the other authorities. Note that the actual 
        time used is not the server's preferred time, but the consensus of all 
        preferences. (Default: 5 minutes.) 
    </DL>
    <DL COMPACT>
      <DT><B>V3AuthNIntervalsValid</B> <I>NUM</I> 
      <DD> V3 authoritative directories only. Configures the number of VotingIntervals 
        for which each consensus should be valid for. Choosing high numbers increases 
        network partitioning risks; choosing low numbers increases directory traffic. 
        Note that the actual number of intervals used is not the server's preferred 
        number, but the consensus of all preferences. Must be at least 2. (Default: 
        3.) 
    </DL>
    <A NAME="lbAJ">&nbsp;</A> 
    <h3>HIDDEN SERVICE OPTIONS</h3>
    <P> The following options are used to configure a hidden service. 
    <DL COMPACT>
      <DT><B>HiddenServiceDir </B><I>DIRECTORY</I> 
      <DD> Store data files for a hidden service in DIRECTORY. Every hidden service 
        must have a separate directory. You may use this option multiple times 
        to specify multiple services. 
    </DL>
    <DL COMPACT>
      <DT><B>HiddenServicePort </B><I>VIRTPORT </I>[<I>TARGET</I>] 
      <DD> Configure a virtual port VIRTPORT for a hidden service. You may use 
        this option multiple times; each time applies to the service using the 
        most recent hiddenservicedir. By default, this option maps the virtual 
        port to the same port on 127.0.0.1. You may override the target port, 
        address, or both by specifying a target of addr, port, or addr:port. You 
        may also have multiple lines with the same VIRTPORT: when a user connects 
        to that VIRTPORT, one of the TARGETs from those lines will be chosen at 
        random. 
    </DL>
    <DL COMPACT>
      <DT><B>PublishHidServDescriptors </B><B>0</B>|<B>1</B> 
      <DD> If set to 0, Tor will run any hidden services you configure, but it 
        won't advertise them to the rendezvous directory. This option is only 
        useful if you're using a Tor controller that handles hidserv publishing 
        for you. (Default: 1) 
    </DL>
    <DL COMPACT>
      <DT><B>HiddenServiceVersion </B><I>version</I>,<I>version</I>,<I>...</I> 
      <DD> A list of rendezvous service descriptor versions to publish for the 
        hidden service. Possible version numbers are 0 and 2. (Default: 0, 2) 
    </DL>
    <DL COMPACT>
      <DT><B>HiddenServiceAuthorizeClient </B><I>auth-type</I> <I>client-name</I>,<I>client-name</I>,<I>...</I> 
      <DD> If configured, the hidden service is accessible for authorized clients 
        only. The auth-type can either be 'basic' for a general-purpose authorization 
        protocol or 'stealth' for a less scalable protocol that also hides service 
        activity from unauthorized clients. Only clients that are listed here 
        are authorized to access the hidden service. Valid client names are 1 
        to 19 characters long and only use characters in A-Za-z0-9+-_ (no spaces). 
        If this option is set, the hidden service is not accessible for clients 
        without authorization any more. Generated authorization data can be found 
        in the hostname file. 
    </DL>
    <DL COMPACT>
      <DT><B>RendPostPeriod </B><I>N</I> <B>seconds</B>|<B>minutes</B>|<B>hours</B>|<B>days</B>|<B>weeks</B> 
      <DD> Every time the specified period elapses, Tor uploads any rendezvous 
        service descriptors to the directory servers. This information is also 
        uploaded whenever it changes. (Default: 20 minutes) 
    </DL>
    <A NAME="lbAK">&nbsp;</A> 
    <h3>TESTING NETWORK OPTIONS</h3>
    <P> The following options are used for running a testing Tor network. 
    <DL COMPACT>
      <DT><B>TestingTorNetwork </B><B>0</B>|<B>1</B> 
      <DD> If set to 1, Tor adjusts default values of the configuration options 
        below, so that it is easier to set up a testing Tor network. May only 
        be set if non-default set of DirServers is set. Cannot be unset while 
        Tor is running. (Default: 0) 
        <DL COMPACT>
          <DT> 
          <DD> 
            <DL COMPACT>
              <DT>ServerDNSAllowBrokenConfig 1 
              <DD> 
              <DT>DirAllowPrivateAddresses 1 
              <DD> 
              <DT>EnforceDistinctSubnets 0 
              <DD> 
              <DT>AssumeReachable 1 
              <DD> 
              <DT>AuthDirMaxServersPerAddr 0 
              <DD> 
              <DT>AuthDirMaxServersPerAuthAddr 0 
              <DD> 
              <DT>ClientDNSRejectInternalAddresses 0 
              <DD> 
              <DT>ExitPolicyRejectPrivate 0 
              <DD> 
              <DT>V3AuthVotingInterval 5 minutes 
              <DD> 
              <DT>V3AuthVoteDelay 20 seconds 
              <DD> 
              <DT>V3AuthDistDelay 20 seconds 
              <DD> 
              <DT>TestingV3AuthInitialVotingInterval 5 minutes 
              <DD> 
              <DT>TestingV3AuthInitialVoteDelay 20 seconds 
              <DD> 
              <DT>TestingV3AuthInitialDistDelay 20 seconds 
              <DD> 
              <DT>TestingAuthDirTimeToLearnReachability 0 minutes 
              <DD> 
              <DT>TestingEstimatedDescriptorPropagationTime 0 minutes 
              <DD> 
            </DL>
        </DL>
    </DL>
    <DL COMPACT>
      <DT><B>TestingV3AuthInitialVotingInterval</B> <I>N</I> <B>minutes</B>|<B>hours</B> 
      <DD> Like <B>V3AuthVotingInterval</B>, but for initial voting interval before 
        the first consensus has been created. Changing this requires that <B>TestingTorNetwork</B> 
        is set. (Default: 30 minutes) 
    </DL>
    <DL COMPACT>
      <DT><B>TestingV3AuthInitialVoteDelay</B> <I>N</I> <B>minutes</B>|<B>hours</B> 
      <DD> Like <B>TestingV3AuthInitialVoteDelay</B>, but for initial voting interval 
        before the first consensus has been created. Changing this requires that 
        <B>TestingTorNetwork</B> is set. (Default: 5 minutes) 
    </DL>
    <DL COMPACT>
      <DT><B>TestingV3AuthInitialDistDelay</B> <I>N</I> <B>minutes</B>|<B>hours</B> 
      <DD> Like <B>TestingV3AuthInitialDistDelay</B>, but for initial voting interval 
        before the first consensus has been created. Changing this requires that 
        <B>TestingTorNetwork</B> is set. (Default: 5 minutes) 
    </DL>
    <DL COMPACT>
      <DT><B>TestingAuthDirTimeToLearnReachability</B> <I>N</I> <B>minutes</B>|<B>hours</B> 
      <DD> After starting as an authority, do not make claims about whether routers 
        are Running until this much time has passed. Changing this requires that<B>TestingTorNetwork</B> 
        is set. (Default: 30 minutes) 
    </DL>
    <DL COMPACT>
      <DT><B>TestingEstimatedDescriptorPropagationTime</B> <I>N</I> <B>minutes</B>|<B>hours</B> 
      <DD> Clients try downloading router descriptors from directory caches after 
        this time. Changing this requires that <B>TestingTorNetwork</B> is set. 
        (Default: 10 minutes) 
    </DL>
    <A NAME="lbAL">&nbsp;</A> 
    <h3>SIGNALS</h3>
    Tor catches the following signals: 
    <DL COMPACT>
      <DT><B>SIGTERM</B> 
      <DD> Tor will catch this, clean up and sync to disk if necessary, and exit. 
    </DL>
    <DL COMPACT>
      <DT><B>SIGINT</B> 
      <DD> Tor clients behave as with SIGTERM; but Tor servers will do a controlled 
        slow shutdown, closing listeners and waiting 30 seconds before exiting. 
        (The delay can be configured with the ShutdownWaitLength config option.) 
    </DL>
    <DL COMPACT>
      <DT><B>SIGHUP</B> 
      <DD> The signal instructs Tor to reload its configuration (including closing 
        and reopening logs), fetch a new directory, and kill and restart its helper 
        processes if applicable. 
    </DL>
    <DL COMPACT>
      <DT><B>SIGUSR1</B> 
      <DD> Log statistics about current connections, past connections, and throughput. 
    </DL>
    <DL COMPACT>
      <DT><B>SIGUSR2</B> 
      <DD> Switch all logs to loglevel debug. You can go back to the old loglevels 
        by sending a SIGHUP. 
    </DL>
    <DL COMPACT>
      <DT><B>SIGCHLD</B> 
      <DD> Tor receives this signal when one of its helper processes has exited, 
        so it can clean up. 
    </DL>
    <DL COMPACT>
      <DT><B>SIGPIPE</B> 
      <DD> Tor catches this signal and ignores it. 
    </DL>
    <DL COMPACT>
      <DT><B>SIGXFSZ</B> 
      <DD> If this signal exists on your platform, Tor catches and ignores it. 
    </DL>
    <A NAME="lbAM">&nbsp;</A> 
    <h3>FILES</h3>
    <DL COMPACT>
      <DT><B>@CONFDIR@/torrc</B> 
      <DD> The configuration file, which contains &quot;option value&quot; pairs. 
    </DL>
    <DL COMPACT>
      <DT><B>@LOCALSTATEDIR@/lib/tor/</B> 
      <DD> The tor process stores keys and other data here. 
    </DL>
    <DL COMPACT>
      <DT><B></B><I>DataDirectory</I>/cached-status/* 
      <DD> The most recently downloaded network status document for each authority. 
        Each file holds one such document; the filenames are the hexadecimal identity 
        key fingerprints of the directory authorities. 
    </DL>
    <DL COMPACT>
      <DT><B></B><I>DataDirectory</I><B>/cached-descriptors</B> and <B>cached-descriptors.new</B> 
      <DD> These files hold downloaded router statuses. Some routers may appear 
        more than once; if so, the most recently published descriptor is used. 
        Lines beginning with @-signs are annotations that contain more information 
        about a given router. The &quot;.new&quot; file is an append-only journal; 
        when it gets too large, all entries are merged into a new cached-routers 
        file. 
    </DL>
    <DL COMPACT>
      <DT><B></B><I>DataDirectory</I><B>/cached-routers</B> and <B>cached-routers.new</B> 
      <DD> Obsolete versions of cached-descriptors and cached-descriptors.new. 
        When Tor can't find the newer files, it looks here instead. 
    </DL>
    <DL COMPACT>
      <DT><B></B><I>DataDirectory</I>/state 
      <DD> A set of persistent key-value mappings. These are documented in the 
        file. These include: 
        <DL COMPACT>
          <DT> 
          <DD> 
            <DL COMPACT>
              <DT>- The current entry guards and their status. 
              <DD> 
              <DT>- The current bandwidth accounting values (unused so far; see 
                below). 
              <DD> 
              <DT>- When the file was last written 
              <DD> 
              <DT>- What version of Tor generated the state file 
              <DD> 
              <DT>- A short history of bandwidth usage, as produced in the router 
                descriptors. 
              <DD> 
            </DL>
        </DL>
    </DL>
    <DL COMPACT>
      <DT><B></B><I>DataDirectory</I>/bw_accounting 
      <DD> Used to track bandwidth accounting values (when the current period 
        starts and ends; how much has been read and written so far this period). 
        This file is obsolete, and the data is now stored in the 'state' file 
        as well. Only used when bandwidth accounting is enabled. 
    </DL>
    <DL COMPACT>
      <DT><B></B><I>DataDirectory</I>/hsusage 
      <DD> Used to track hidden service usage in terms of fetch and publish requests 
        to this hidden service authoritative directory. Only used when recording 
        of statistics is enabled. 
    </DL>
    <DL COMPACT>
      <DT><B></B><I>DataDirectory</I>/control_auth_cookie 
      <DD> Used for cookie authentication with the controller. Location can be 
        overridden by the CookieAuthFile config option. Regenerated on startup. 
        See control-spec.txt for details. Only used when cookie authentication 
        is enabled. 
    </DL>
    <DL COMPACT>
      <DT><B></B><I>DataDirectory</I>/keys/* 
      <DD> Only used by servers. Holds identity keys and onion keys. 
    </DL>
    <DL COMPACT>
      <DT><B></B><I>DataDirectory</I>/fingerprint 
      <DD> Only used by servers. Holds the fingerprint of the server's identity 
        key. 
    </DL>
    <DL COMPACT>
      <DT><B></B><I>DataDirectory</I>/approved-routers 
      <DD> Only for naming authoritative directory servers (see <B>NamingAuthoritativeDirectory</B>). 
        This file lists nickname to identity bindings. Each line lists a nickname 
        and a fingerprint separated by whitespace. See your <B>fingerprint</B> 
        file in the <I>DataDirectory</I> for an example line. If the nickname 
        is <B>!reject</B> then descriptors from the given identity (fingerprint) 
        are rejected by this server. If it is <B>!invalid</B> then descriptors 
        are accepted but marked in the directory as not valid, that is, not recommended. 
    </DL>
    <DL COMPACT>
      <DT><B></B><I>DataDirectory</I>/router-stability 
      <DD> Only used by authoritative directory servers. Tracks measurements for 
        router mean-time-between-failures so that authorities have a good idea 
        of how to set their Stable flags. 
    </DL>
    <DL COMPACT>
      <DT><B></B><I>HiddenServiceDirectory</I>/hostname 
      <DD> The &lt;base32-encoded-fingerprint&gt;.onion domain name for this hidden 
        service. If the hidden service is restricted to authorized clients only, 
        this file also contains authorization data for all clients. 
    </DL>
    <DL COMPACT>
      <DT><B></B><I>HiddenServiceDirectory</I>/private_key 
      <DD> The private key for this hidden service. 
    </DL>
    <DL COMPACT>
      <DT><B></B><I>HiddenServiceDirectory</I>/client_keys 
      <DD> Authorization data for a hidden service that is only accessible by 
        authorized clients. 
    </DL>
    <A NAME="lbAN">&nbsp;</A> 
    <h3>SEE ALSO</h3>
    <B><A HREF="?1+privoxy">privoxy</A></B>(1), <B><A HREF="?1+tsocks">tsocks</A></B>(1), 
    <B><A HREF="?1+torify">torify</A></B>(1) 
    <P> <B><A HREF="https://www.torproject.org/">https://www.torproject.org/</A></B> 
    <P> <A NAME="lbAO">&nbsp;</A> 
    <h3>BUGS</h3>
    Plenty, probably. Tor is still in development. Please report them. <A NAME="lbAP">&nbsp;</A> 
    <h3>AUTHORS</h3>
    Roger Dingledine &lt;<A HREF="mailto:arma@mit.edu">arma@mit.edu</A>&gt;, Nick 
    Mathewson &lt;<A HREF="mailto:nickm@alum.mit.edu">nickm@alum.mit.edu</A>&gt;. 
    <HR>
    <A NAME="index">&nbsp;</A> 
    <h3>Index</h3>
    <DL>
      <DT><A HREF="#lbAB">NAME</A> 
      <DD> 
      <DT><A HREF="#lbAC">SYNOPSIS</A> 
      <DD> 
      <DT><A HREF="#lbAD">DESCRIPTION</A> 
      <DD> 
      <DT><A HREF="#lbAE">OPTIONS</A> 
      <DD> 
      <DT><A HREF="#lbAF">CLIENT OPTIONS</A> 
      <DD> 
      <DT><A HREF="#lbAG">SERVER OPTIONS</A> 
      <DD> 
      <DT><A HREF="#lbAH">DIRECTORY SERVER OPTIONS</A> 
      <DD> 
      <DT><A HREF="#lbAI">DIRECTORY AUTHORITY SERVER OPTIONS</A> 
      <DD> 
      <DT><A HREF="#lbAJ">HIDDEN SERVICE OPTIONS</A> 
      <DD> 
      <DT><A HREF="#lbAK">TESTING NETWORK OPTIONS</A> 
      <DD> 
      <DT><A HREF="#lbAL">SIGNALS</A> 
      <DD> 
      <DT><A HREF="#lbAM">FILES</A> 
      <DD> 
      <DT><A HREF="#lbAN">SEE ALSO</A> 
      <DD> 
      <DT><A HREF="#lbAO">BUGS</A> 
      <DD> 
      <DT><A HREF="#lbAP">AUTHORS</A> 
      <DD> 
    </DL>
    <HR>
    This document was created by <A HREF="">man2html</A>, using the manual pages.<BR>
    Time: 13:25:21 GMT, May 06, 2009 </div>
</div>
<!-- #main -->
<?php

include("footer.inc.php");

?>
