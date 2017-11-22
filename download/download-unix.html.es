<!DOCTYPE html>
 <html>
 <head>
   <meta charset="utf-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width\=device-width, initial-scale=1">
   <meta name="author" content="The Tor Project, Inc.">
   <meta name="description" content="The Tor Project's free software protects your privacy online. Site blocked? Email [mailto:gettor@torproject.org] for help downloading Tor Browser.">
   <meta name="keywords" content="tor, tor project, tor browser, avoid censorship, traffic analysis, anonymous communications, privacy, avoid surveillance, online security, anonymous online, private browsing, anonymity online, online privacy, protect privacy, private mac browser, private windows browser, private android browser, linux browser, anonymity network, tor network, onion router, onion browser">
   <meta property="og:image" content="https://www.torproject.org/images/tor-logo.jpg">
   <title>Tor: Download for Linux/Unix</title>
   <link rel="icon" href="../images/favicon.ico">
   <link href="../css/master.min.css" rel="stylesheet">
   <!--[if lte IE 8]>
   <link href="../css/ie8-and-down.min.css" rel="stylesheet">
   <![endif]-->
   <!--[if lte IE 7]>
   <link href="../css/ie7-and-down.min.css" rel="stylesheet">
   <![endif]-->
   <!--[if IE 6]>
   <link href="../css/ie6.min.css" rel="stylesheet">
   <![endif]-->
</head>
<body>
<!-- Insert donation banner if flag is true -->
<div id="wrap">
  <div id="header">
    <h1 id="logo"><a href="../index.html">Tor</a></h1>
      <div id="nav">
        <ul>
        <li><a href="../index.html">Home</a></li>
<li><a href="../about/overview.html">About Tor</a></li>
<li><a href="../docs/documentation.html">Documentation</a></li>
<li><a href="../press/press.html">Press</a></li>
<li><a href="https://blog.torproject.org/blog/">Blog</a></li>
<li><a href="https://newsletter.torproject.org">Newsletter</a></li>
<li><a href="../about/contact.html">Contact</a></li>
        </ul>
      </div>
      <!-- END NAV -->
      <div id="calltoaction">
        <ul>
          <li class="donate"><a class="active" href="../download/download-easy.html.es">Download</a></li>
<li class="donate"><a href="../getinvolved/volunteer.html">Get Involved</a></li>
<li class="donate"><a href="../donate/donate-button.html">Donate</a></li>
        </ul>
      </div>
      <!-- END CALLTOACTION -->
  </div>
  <!-- END HEADER -->
    <div id="content" class="clearfix">
			<div id="breadcrumbs"><a href="../index.html">Home &raquo; </a><a href="../download/download-unix.html.es">Descarga</a></div>
    	<div id="maincol-left">
      	<h1>Descargar Tor para Unix, Linux, BSD</h1>
        <!-- BEGIN TEASER WARNING -->
      	<div class="warning">
          <h2>Queres que Tor se ejecute correctamente?</h2>
            <p>...Entonces por favor no solo lo instales y sigas de largo.
            Es necesario que cambies algunos habitos y reconfigures tu software! Tor por si mismo <em>NO</em> es todo lo que necesitas para mantener tu anonimato. Leer la <a href="../download/download.html.es#warning">Lista completa de advertencias</a>.</p>
        </div>
        <!-- END TEASER WARNING -->
        <table class="topforty" summary="">
<thead>
<tr bgcolor="#009933" style="color: white; ">
  <th colspan="2">Platform</th>
  <th>Descargar la version estable</th>
  <th>Descargar la version inestable</th>
  <th>Instalacion y configuracion</th>
</tr>
</thead>
<tr>
<td align="center"><img src="../images/distros/debian.png" alt="Debian" width="32" height="32"> <img src="../images/distros/ubuntu.png" alt="Ubuntu" width="32" height="32"> <img src="../images/distros/knoppix.png" alt="Knoppix" width="32" height="32"></td>
<td>Debian, Ubuntu, Knoppix</td>
<td colspan="2"><a href="../docs/debian.html">repositorio de paquetes</a> </td>
<td> <a href="../docs/tor-doc-unix.html">Linux/BSD/Unix</a> </td>
</tr>
<tr class="beige">
<td align="center"><img src="../images/distros/centos.png" alt="CentOS" width="32" height="32"> <img src="../images/distros/fedora.png" alt="Fedora" width="32" height="32"></td>
<td>CentOS and Fedora</td>
<td colspan="2">yum install tor / dnf install tor</td>
<td> <a href="../docs/tor-doc-unix.html">Linux/BSD/Unix</a> </td>
</tr>
<tr>
<td align="center"><img src="../images/distros/gentoo.png" alt="Gentoo Linux" width="32" height="32"></td>
<td>Gentoo Linux</td>
<td colspan="2"><kbd>emerge tor</kbd></td>
<td>
<a href="../docs/tor-doc-unix.html">Linux/BSD/Unix</a><br>
</td>
</tr>
<tr class="beige">
<td align="center"><img src="../images/distros/freebsd.png" alt="FreeBSD" width="32" height="32"></td>
<td>FreeBSD</td>
<td colspan="2"><kbd>pkg install tor</kbd></td>
<td><a href="../docs/tor-doc-unix.html">Linux/BSD/Unix</a></td>
</tr>
<tr>
<td align="center"><img src="../images/distros/openbsd.png" alt="OpenBSD" width="32" height="32"></td>
<td>OpenBSD</td>
<td colspan="2"><kbd>cd /usr/ports/net/tor &amp;&amp; make &amp;&amp; make install</kbd></td>
<td>
<a href="../docs/tor-doc-unix.html">Linux/BSD/Unix</a><br>
<a href="https://trac.torproject.org/projects/tor/wiki/doc/OpenbsdChrootedTor">Guia para chrooting Tor en OpenBSD</a>
</td>
</tr>
<tr class="beige">
<td align="center"><img src="../images/distros/netbsd.png" alt="NetBSD" width="32" height="32"></td>
<td>NetBSD</td>
<td colspan="2"><kbd>cd /usr/pkgsrc/net/tor &amp;&amp; make install</kbd></td>
<td><a href="../docs/tor-doc-unix.html">Linux/BSD/Unix</a></td>
</tr>
<tr>
<td align="center"><img src="../images/distros/terminal.png" alt="Source code" width="32" height="32"></td>
<td>Source tarballs</td>
<td>
<a href="../dist/tor-0.3.1.8.tar.gz">0.3.1.8</a>
 (<a href="../dist/tor-0.3.1.8.tar.gz.asc">sig</a>)
</td>
<td>
<a href="../dist/tor-0.3.2.4-alpha.tar.gz">0.3.2.4-alpha</a>
 (<a href="../dist/tor-0.3.2.4-alpha.tar.gz.asc">sig</a>)
</td>
<td><kbd>./configure &amp;&amp; make &amp;&amp; src/or/tor</kbd></td>
</tr>
</table>
<div class="nb">
<a id="packagediff"></a>
<h2><a class="anchor" href="#packagediff">Cual es la diferencia entre estable &amp; inestable?</a></h2>
<p>
Los paquetes estables son lanzados cuando creemos que el codigo y sus caracteristicas no van a cambiar durante varios meses.
</p>
<p>Cuando lanzamos un paquete inestable podes ayudarnos probando nuevas caracteristicas y arreglando bugs. Aunque los paquetes inestables tengan una version mas nueva que los paquetes estables listados arriba, la probabilidad de bugs y fallas de seguridad son mucho mayores en los inestables. Preparate para <a href="https://bugs.torproject.org/">reportar bugs</a>.
</p>
</div>
<div class="underline"></div>
<div class="nb">
<p>
Tor se distribuye <a href="http://www.fsf.org/">Software Libre</a>
Bajo <a href="https://gitweb.torproject.org/tor.git/plain/LICENSE">licencia 3-clause BSD</a>.
</p>
<p>
Instalar Tor no posee costo alguno, tampoco tiene costo utilizar la red Tor. Pero si te gustaria que Tor funcione mas rapido y de forma mas operativa por favor ten en cuenta
<a href="../donate/donate-download.html">Realizar una donacion libre de impuestos a Proyecto Tor</a>.
</p>
</div>
<div class="underline"></div>
<div class="nb">
<p>
Para manternte informado sobre advertencias de seguridad y lanzamientos de versiones estables, suscribite a <a href="https://lists.torproject.org/cgi-bin/mailman/listinfo/tor-announce">Lista de correo de anuncios de tor</a> (Se pedira confirmacion via mail). Tambien podes suscribirte a
<a href="http://rss.gmane.org/gmane.network.onion-routing.announce">Seguir RSS feed</a>.
</p>
</div>
<p>
Si queres investigar sobre las versiones anteriores de Tor, paquetes u otros binarios ingresar a<a href="https://archive.torproject.org/">el archivo</a>.
</p>
<div class="nb">
<p>
Si tenes problemas con la descarga de Tor en este sito, podes dirigirte a <a
href="../getinvolved/mirrors.html">Listado de mirrors de Tor</a>.
</p>
<a id="ChangeLog"></a>
<a id="Stable"></a>
<a id="Testing"></a>
<p>
Para obtener el listado de los cambios para cada version estable de Tor consultar
<a href="https://gitweb.torproject.org/tor.git/plain/ReleaseNotes?id=tor-0.3.1.8">NotasDeLanzamiento</a>. Para obtener la lista de los cambios en la version estable y las versiones en desarrollo consultar
<a href="https://gitweb.torproject.org/tor.git/plain/ChangeLog">ChangeLog</a>.
</p>
</div>
      </div>
      <!-- END MAINCOL -->
      <div id="sidecol-right">
        <div class="img-shadow">
          <div class="infoblock">
          	<h2>Firmas verificadas</h2>
            <p>Verifica tus descargas con nuestra firma GPG:</p>
            <a href="../docs/verifying-signatures.html">Leer sobre como verificar las firmas</a>.
          </div>
        </div>
        <!-- END INFOBLOCK -->
        <div class="img-shadow">
        	<div class="sidenav-sub">
          	<h2>Tenes un problema?</h2>
          	<ul>
            	<li class="dropdown"><a href="#packagediff">Cuales son las diferencias entre las descargas estables y las inestables?</a></li>
            </ul>
          </div>
      	</div>
        <!-- END SIDENAV -->
      </div>
      <!-- END SIDECOL -->
    </div>
    <!-- END CONTENT -->
    <div id="footer">
    	<div class="onion"><img src="../images/onion.jpg" alt="Tor" width="78" height="118"></div>
      <div class="about">
    <p>Trademark, copyright notices, and rules for use by third parties can be found
    <a href="../docs/trademark-faq.html">in our FAQ</a>.</p>
<!--
        Last modified: Fri Nov 17 15:10:55 2017 +0100
        Last compiled: vie nov 17 2017 15:12:46 +0100
-->
      </div>
      <!-- END ABOUT -->
      <div class="col first">
      	<h4>About Tor</h4>
        <ul>
          <li><a href="../about/overview.html">What Tor Does</a></li>
          <li><a href="../about/torusers.html">Users of Tor</a></li>
          <li><a href="../about/corepeople.html">Core Tor People</a></li>
          <li><a href="../about/sponsors.html">Sponsors</a></li>
          <li><a href="../about/contact.html">Contact Us</a></li>
        </ul>
      </div>
      <!-- END COL -->
      <div class="col">
      	<h4>Get Involved</h4>
        <ul>
          <li><a href="../donate/donate-foot.html">Donate</a></li>
          <li><a href="../docs/documentation.html#MailingLists">Mailing Lists</a></li>
          <li><a href="../docs/hidden-services.html">Hidden Services</a></li>
          <li><a href="../getinvolved/translation.html">Translations</a></li>
        </ul>
      </div>
      <!-- END COL -->
      <div class="col">
      	<h4>Documentation</h4>
        <ul>
          <li><a href="../docs/tor-manual.html">Manuals</a></li>
          <li><a href="../docs/documentation.html">Installation Guides</a></li>
          <li><a href="https://trac.torproject.org/projects/tor/wiki/">Tor Wiki</a></li>
          <li><a href="../docs/faq.html">General Tor FAQ</a></li>
        </ul>
      </div>
        <div class="col">
        <a href="https://internetdefenseleague.org/"><img src="../images/InternetDefenseLeague-footer-badge.png" alt="Internet Defense League" width="125" height="125"></a>
        </div>
      <!-- END COL -->
</div>
    <!-- END FOOTER -->
  </div>
  <!-- END WRAP -->
</body>
</html>
