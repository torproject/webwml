<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01//EN" "http://www.w3.org/TR/html4/strict.dtd">
<html>
<head>
  <title>Download Tor</title>
  <link rel="shortcut icon" type="image/x-icon" href="../images/favicon.ico">
  <link rel="stylesheet" type="text/css" href="../css/master.min.css">
  <!--[if lte IE 8]>
  <link rel="stylesheet" type="text/css" href="../css/ie8-and-down.min.css">
  <![endif]-->
  <!--[if lte IE 7]>
  <link rel="stylesheet" type="text/css" href="../css/ie7-and-down.min.css">
  <![endif]-->
  <!--[if IE 6]>
  <link rel="stylesheet" type="text/css" href="../css/ie6.min.css">
  <![endif]-->
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
  <meta name="author" content="The Tor Project, Inc.">
  <meta name="keywords" content="anonymity online, tor, tor project, censorship circumvention, traffic analysis, anonymous communications research">
  <script type="text/javascript" src="../js/jquery.min.js">
  </script>
  <script type="text/javascript" src="../js/jquery.client.min.js">
/* "jQuery Browser And OS Detection Plugin" by Stoimen
   Source: http://www.stoimen.com/blog/2009/07/16/jquery-browser-and-os-detection-plugin/
   License: Public Domain (http://www.stoimen.com/blog/2009/07/16/jquery-browser-and-os-detection-plugin/#comment-12498) */
  </script>
  <script type="text/javascript" src="../js/jquery-migrate-1.0.0.min.js"></script>
  <script type="text/javascript" src="../js/jquery.ba-bbq.min.js">
/* Source: https://raw.github.com/cowboy/jquery-bbq/v1.2.1/jquery.ba-bbq.js */
  </script>
  <script type="text/javascript" src="../js/dlpage01.js">
  </script>
  <script async type="text/javascript" src="../js/jquery.accordion.min.js">
/* Modified version of "Stupid Simple jQuery Accordian Menu" originally developed by Ryan Stemkoski
   Source: http://www.stemkoski.com/stupid-simple-jquery-accordion-menu/
   License: Public Domain (http://www.stemkoski.com/stupid-simple-jquery-accordion-menu/#comment-32882) */
  </script>
</head>
<body class="onload">
    <span class="hidden" id="version-data">
        { "torbrowserbundle" : "7.0.10",
          "torbrowserbundleosx64" : "7.0.10",
          "torbrowserbundlelinux32" : "7.0.10",
          "torbrowserbundlelinux64" : "7.0.10" }
    </span>
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
      <li>
         <div class="dropdown">
           <div class="dropbtn">
	      <a href="download.html.en">English</a>
	   </div>
           <div class="dropdown-content">
	     <a href="download.html.es">espa&ntilde;ol</a>
<a href="download.html.en">English</a>
           </div>
         </div>
       </li>
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
  <div id="breadcrumbs"><a href="../index.html">Inicio &raquo; </a><a href="../download/download.html.es">Descarga</a></div>
  <div id="maincol-left">
<!-- BEGIN TEASER WARNING -->
    <div class="warning-top">
      <h2>¿Realmente querés que tor funcione?</h2>
	<p>Necesitas cambiar algunos de tus hábitos, algunas cosas no funcionarán exactamente como estas acostumbrada.
    Por favor lee <a href="#warning">la lista completa de advertencias</a> para mas detalles.
	</p>
      </div>
<!-- END TEASER WARNING -->
<!-- START DOWNLOADS -->
<!-- START WINDOWS -->
      <div id="windows" style="border-top: 0px;" class="accordionButton on">
	<span class="windows24">Microsoft Windows</span>
      </div>
      <div class="accordionContent">
	<div class="fauxhead"></div>
<!-- TOR BROWSER BUNDLE -->
	<div class="package" style="padding-top: 13px; border-top: 0px;">
	  <form class="downloads">
	    <a class="button win-tbb" href="../dist/torbrowser/7.0.10/torbrowser-install-7.0.10_es-ES.exe"><span class="strong">Descargar</span><span class="normal">Navegador Tor</span></a>
	    <select name="language" id="win-tbb" class="lang">
	      <option value="en-US" selected="selected">English</option>
	      <option value="ar">&#x0627;&#x0644;&#x0639;&#x0631;&#x0628;&#x064a;&#x0629;</option>
	      <option value="de">Deutsch</option>
	      <option value="es-ES">espa&ntilde;ol</option>
	      <option value="fa">&#x0641;&#x0627;&#x0631;&#x0633;&#x06cc;</option>
	      <option value="fr">&#x0046;&#x0072;&#x0061;&#x006e;&#x00e7;&#x0061;&#x0069;&#x0073;</option>
	      <option value="it">Italiano</option>
              <option value="ja">&#26085;&#26412;&#35486;</option>
	      <option value="ko">Korean</option>
	      <option value="nl">Nederlands</option>
	      <option value="pl">Polish</option>
	      <option value="pt-BR">&#x0050;&#x006f;&#x0072;&#x0074;&#x0075;&#x0067;&#x0075;&#x00ea;&#x0073;</option>
	      <option value="ru">&#x0420;&#x0443;&#x0441;&#x0441;&#x043a;&#x0438;&#x0439;</option>
	      <option value="tr">T&#252;rk&#231;e</option>
	      <option value="vi">Vietnamese</option>
	      <option value="zh-CN">&#x7b80;&#x4f53;&#x5b57;</option>
	    </select>
	    <div class="sig">
	      <a class="lang-alt" href="../projects/torbrowser.html#downloads">Otros idiomas</a>
	      (<a class="win-tbb-sig" href="../dist/torbrowser/7.0.10/torbrowser-install-7.0.10_es-ES.exe.asc">firma</a>) <a class="siginfo" href="../docs/verifying-signatures.html">¿Qué es esto?</a>
	    </div>
	    <a class="additional" href="../projects/torbrowser.html#downloads-alpha">Descargar inestable</a><br>
<!-- <a class="additional" href="../dist/torbrowser/<version-torbrowserbundlealpha>/tor-browser-<version-torbrowserbundlealpha>_en-US.exe">Descarga inestable</a> (<a href="../dist/torbrowser/<version-torbrowserbundlealpha>/tor-browser-<version-torbrowserbundlealpha>_en-US.exe.asc">firma</a>)-->
	  </form>
	  <h2>Navegador Tor</h2>
	  <em>Versión 7.0.10 (2017-11-14) - Windows 10, 8, 7, Vista, y XP</em>
	  <p>Todo lo que necesitas para navegar de forma segura Internet. <a href="../projects/torbrowser.html">Aprendé mas &raquo;</a></p>
	</div>
<!-- EXPERT BUNDLE -->
	<div class="package">
	  <div class="downloads">
	    <a class="button" href="../dist/torbrowser/7.0.10/tor-win32-0.3.1.8.zip"><span class="strong">Descargar</span><span class="normal">Paquete Experto</span></a>
	    <div class="sig">
	      (<a href="../dist/torbrowser/7.0.10/tor-win32-0.3.1.8.zip.asc">firma</a>) <a class="siginfo" href="../docs/verifying-signatures.html">¿Qué es esto?</a>
	    </div>
	  </div>
	  <h2>Paquete Experto</h2>
	  <em>Windows 10, 8, 7, Vista, XP, 2000, 2003 Server, ME, y Windows 98SE</em>
	  <p> Contiene solo Tor y nada mas. Vas a necesitar configurar Tor y todas las demás aplicaciones manualmente. Este instalador debe ser ejecutado como Administrador.</p>
	</div>
      </div>
<!-- END WINDOWS -->
<!-- START OS X -->
      <div id="apple" class="accordionButton on">
	<span class="mac24">Apple OS X</span></div>
      <div class="accordionContent">
	<div class="fauxhead"></div>
<!-- TOR BROWSER BUNDLE -->
	<div class="package" style="padding-top: 13px; border-top: 0px;">
	  <form class="downloads">
	    <a class="button osx-tbb" href="../dist/torbrowser/7.0.10/TorBrowser-7.0.10-osx64_es-ES.dmg"><span class="strong">Descarga</span><span class="normal">Navegador Tor</span></a>
	    <select name="language" id="osx-tbb" class="lang">
	      <option value="en-US" selected="selected">English</option>
	      <option value="ar">&#x0627;&#x0644;&#x0639;&#x0631;&#x0628;&#x064a;&#x0629;</option>
	      <option value="de">Deutsch</option>
	      <option value="es-ES">espa&ntilde;ol</option>
	      <option value="fa">&#x0641;&#x0627;&#x0631;&#x0633;&#x06cc;</option>
	      <option value="fr">&#x0046;&#x0072;&#x0061;&#x006e;&#x00e7;&#x0061;&#x0069;&#x0073;</option>
	      <option value="it">Italiano</option>
              <option value="ja">&#26085;&#26412;&#35486;</option>
	      <option value="ko">Korean</option>
	      <option value="nl">Nederlands</option>
	      <option value="pl">Polish</option>
	      <option value="pt-BR">&#x0050;&#x006f;&#x0072;&#x0074;&#x0075;&#x0067;&#x0075;&#x00ea;&#x0073;</option>
	      <option value="ru">&#x0420;&#x0443;&#x0441;&#x0441;&#x043a;&#x0438;&#x0439;</option>
	      <option value="tr">T&#252;rk&#231;e</option>
	      <option value="vi">Vietnamese</option>
	      <option value="zh-CN">&#x7b80;&#x4f53;&#x5b57;</option>
	    </select>
	    <div class="sig">
	      <a class="lang-alt" href="../projects/torbrowser.html#downloads">Otros idiomas</a>
	      (<a class="osx-tbb-sig" href="../dist/torbrowser/7.0.10/TorBrowser-7.0.10-osx64_es-ES.dmg.asc">firma</a>) <a class="siginfo" href="../docs/verifying-signatures.html">¿Qué es esto?</a>
	    </div>
	    <a class="additional" href="../projects/torbrowser.html#downloads-alpha">Descargar versión inestable</a><br>
	  </form>
	  <h2>Navegador Tor</h2>
	  <em>Versión 7.0.10 (2017-11-14)- OS X Intel</em>
	  <p>Todo lo que necesitas para navegar de forma segura Internet. Este paquete no requiere instalación. Solo extraerlo y ejecutarlo <a href="../projects/torbrowser.html">Aprendé Más &raquo;</a></p>
	</div>
  </div>
 <!-- END OS X -->
 <!-- START UNIX -->
      <div id="linux" class="accordionButton on">
	<span class="linux24">GNU/Linux</span></div>
      <div class="accordionContent">
	<div class="fauxhead"></div>
  <!-- TOR BROWSER BUNDLE -->
	<div class="package" style="padding-top: 13px; border-top: 0px;">
	  <form class="downloads">
	    <a class="button lin-tbb64" href="../dist/torbrowser/7.0.10/tor-browser-linux64-7.0.10_es-ES.tar.xz"><span class="strong">Descarga</span><span class="normal">Navegador Tor (64-Bit)</span></a>
	    <select name="language" id="lin-tbb64" class="lang">
	      <option value="en-US" selected="selected">English</option>
	      <option value="ar">&#x0627;&#x0644;&#x0639;&#x0631;&#x0628;&#x064a;&#x0629;</option>
	      <option value="de">Deutsch</option>
	      <option value="es-ES">espa&ntilde;ol</option>
	      <option value="fa">&#x0641;&#x0627;&#x0631;&#x0633;&#x06cc;</option>
	      <option value="fr">&#x0046;&#x0072;&#x0061;&#x006e;&#x00e7;&#x0061;&#x0069;&#x0073;</option>
	      <option value="it">Italiano</option>
              <option value="ja">&#26085;&#26412;&#35486;</option>
	      <option value="ko">Korean</option>
	      <option value="nl">Nederlands</option>
	      <option value="pl">Polish</option>
	      <option value="pt-BR">&#x0050;&#x006f;&#x0072;&#x0074;&#x0075;&#x0067;&#x0075;&#x00ea;&#x0073;</option>
	      <option value="ru">&#x0420;&#x0443;&#x0441;&#x0441;&#x043a;&#x0438;&#x0439;</option>
	      <option value="tr">T&#252;rk&#231;e</option>
	      <option value="vi">Vietnamese</option>
	      <option value="zh-CN">&#x7b80;&#x4f53;&#x5b57;</option>
	    </select>
	    <div class="sig">
	      <a class="lang-alt" href="../projects/torbrowser.html#downloads">Otros Idiomas</a>
	      (<a class="lin-tbb64-sig" href="../dist/torbrowser/7.0.10/tor-browser-linux64-7.0.10_es-ES.tar.xz.asc">firma</a>) <a class="siginfo" href="../docs/verifying-signatures.html">¿Qué es esto?</a>
	    </div>
	    <a class="additional" href="../projects/torbrowser.html#downloads-alpha">Descargar versión inestable</a><br>
<!-- <a class="additional" href="../dist/torbrowser/<version-torbrowserbundlelinux64alpha>/tor-browser-gnu-linux-x86_64-<version-torbrowserbundlelinux64alpha>-dev-en-US.tar.gz">Descargar versión inestable</a> (<a href="../dist/torbrowser/<version-torbrowserbundlelinux64alpha>/tor-browser-gnu-linux-x86_64-<version-torbrowserbundlelinux64alpha>-dev-en-US.tar.gz.asc">firma</a>)-->
	    <a class="button lin-tbb32" href="../dist/torbrowser/7.0.10/tor-browser-linux32-7.0.10_es-ES.tar.xz"><span class="strong">Descarga</span><span class="normal">Navegador Tor (32-Bit)</span></a>
	    <select name="language" id="lin-tbb32" class="lang">
	      <option value="en-US" selected="selected">English</option>
	      <option value="ar">&#x0627;&#x0644;&#x0639;&#x0631;&#x0628;&#x064a;&#x0629;</option>
	      <option value="de">Deutsch</option>
	      <option value="es-ES">espa&ntilde;ol</option>
	      <option value="fa">&#x0641;&#x0627;&#x0631;&#x0633;&#x06cc;</option>
	      <option value="fr">&#x0046;&#x0072;&#x0061;&#x006e;&#x00e7;&#x0061;&#x0069;&#x0073;</option>
	      <option value="it">Italiano</option>
              <option value="ja">&#26085;&#26412;&#35486;</option>
	      <option value="ko">Korean</option>
	      <option value="nl">Nederlands</option>
	      <option value="pl">Polish</option>
	      <option value="pt-BR">&#x0050;&#x006f;&#x0072;&#x0074;&#x0075;&#x0067;&#x0075;&#x00ea;&#x0073;</option>
	      <option value="ru">&#x0420;&#x0443;&#x0441;&#x0441;&#x043a;&#x0438;&#x0439;</option>
	      <option value="tr">T&#252;rk&#231;e</option>
	      <option value="vi">Vietnamese</option>
	      <option value="zh-CN">&#x7b80;&#x4f53;&#x5b57;</option>
	    </select>
	    <div class="sig">
	      <a class="lang-alt" href="../projects/torbrowser.html#downloads">Otros Idiomas</a>
	      (<a class="lin-tbb32-sig" href="../dist/torbrowser/7.0.10/tor-browser-linux32-7.0.10_es-ES.tar.xz.asc">firma</a>) <a class="siginfo" href="../docs/verifying-signatures.html">¿Qué es esto?</a>
	    </div>
<!-- <a class="additional" href="../dist/torbrowser/<version-torbrowserbundlelinux32alpha>/tor-browser-gnu-linux-i686-<version-torbrowserbundlelinux32alpha>-dev-en-US.tar.gz">Descargar version inestable</a> (<a href="../dist/torbrowser/<version-torbrowserbundlelinux32alpha>/tor-browser-gnu-linux-i686-<version-torbrowserbundlelinux32alpha>-dev-en-US.tar.gz.asc">firma</a>)<p>-->
	  </form>
	  <h2>Navegador Tor</h2>
	  <em>Versión 7.0.10 (2017-11-14) - GNU/Linux, BSD, y Unix</em>
	  <p>Todo lo que necesitas para navegar de forma segura Internet. Este paquete no requiere instalación. Solo extraerlo y ejecutarlo <a href="../projects/torbrowser.html">Aprendé Más &raquo;</a></p>
<!-- repo packages -->
	<div class="package" style="border-bottom: 0px;">
	  <div class="downloads">
	    <a class="additional" style="font-weight: bold;"
href="../download/download-unix.html.es">Repositorios de Tor.</a>
	  </div>
	  <h2>Tor (Autónomo)</h2>
	  <p>Instalá los componentes de Tor vos misma, corré un Relé, arma configuraciones personalizadas. Todo desde un gestor de paquetes como apt-get o yum.</p>
	</div>
	</div>
      </div>
<!-- END UNIX -->
<!-- START SMARTPHONES -->
      <div id="smartphone" class="accordionButton on">
	<span class="smartphone24">Tor para Smartphones</span></div>
      <div class="accordionContent">
	<div class="fauxhead"></div>
<!-- ANDROID -->
	<div class="package" style="padding-top: 13px; border-top: 0px;">
	  <div class="downloads">
	      <a class="additional" href="../docs/android.html">Instrucciones de instalación</a>
	  </div>
	  <h2>Paquete para Android</h2>
	  <p>Nuestro software esta disponibles para teléfonos basados en Android, tables y computadoras desde <a href="https://guardianproject.info/">Guardian Project</a> vía su <a href="https://guardianproject.info/2012/03/15/our-new-f-droid-app-repository/">Repositorio de F-Droid </a> o <a href="https://play.google.com/store/apps/details?id=org.torproject.android">Google Play Store</a>.</p>
	</div>
      </div>
<!-- END SMARTPHONES -->
<!-- BEGIN SOURCE -->
      <div class="accordionButton on">
	<span class="sourcecode24">Código Fuente</span></div>
      <div class="accordionContent">
	<div class="fauxhead"></div>
	<div class="package" style="padding-top: 13px; border-top: 0px; border-bottom: 1px solid #888888;">
	  <div class="downloads">
	    <a class="button" href="../dist/tor-0.3.1.8.tar.gz"><span class="strong">Descarga</span><span class="normal">Código Fuente</span></a>
	    <div class="sig">
	      (<a href="../dist/tor-0.3.1.8.tar.gz.asc">firma</a>) <a class="siginfo" href="../docs/verifying-signatures.html">¿Qué es esto?</a>
	    </div>
	    <a class="button" href="../dist/tor-0.3.2.4-alpha.tar.gz"><span class="strong">Descarga</span><span class="normal">Código Fuente (Inestable)</span></a>
	    <div class="sig">
	      (<a href="../dist/tor-0.3.2.4-alpha.tar.gz.asc">firma</a>) <a class="siginfo" href="../docs/verifying-signatures.html">¿Qué es esto?</a>
	    </div>
	  </div>
	  <h2>Tarball Fuente</h2>
	  <p> Configurar con: <code style="color: #666666;">./configure &amp;&amp; make &amp;&amp; src/or/tor</code></p>
	  <p>La versión estable actual de Tor es 0.3.1.8. Sus <a href="https://gitweb.torproject.org/tor.git/plain/ReleaseNotes?id=tor-0.3.1.8">anuncios de lanzamiento</a> están disponibles.</p>
	  <p>La version inestable/alpha de Tor es 0.3.2.4-alpha. Su <a href="https://gitweb.torproject.org/tor.git/plain/ChangeLog">bitácora de cambios</a> está disponible.</p>
	</div>
      </div>
      <div class="expander"><a href="javascript:void(0)" class="switch">Expandir todo</a></div>
<!-- END SOURCE -->
<!-- END DOWNLOADS -->
<br>
<!-- BEGIN WARNING -->
<div class="warning">
<a name="warning"></a>
<a name="Warning"></a>
<h2><a class="anchor" href="#warning">¿Realmente querés que tor funcione?</a></h2>
	<p>Necesitas cambiar algunos de tus hábitos, algunas cosas no funcionarán exactamente como estas acostumbrada.</p>
<ol>
  <li><b>Usá el Navegador Tor</b>
  <p>Tor no protege todo el trafico de Internet de tu computadora cuando
  lo ejecutás. Tor solo protege las aplicaciones que están correctamente
  configuradas para enviar su trafico a través de Tor. Para evitar
  problemas con La configuración de Tor, nosotras recomendamos que uses el
  <a href="../projects/torbrowser.html">Navegador Tor</a>. Este esta
  pre-configurado para proteger tu privacidad y anonimato en la web, siempre y cuando estés
  navegando con el Navegador Tor. En casi todos los casos configurar un navegador
  de cualquier otra forma es posiblemente insegura para usarse con Tor.</p>
  </li>
  <li><b>No uses torrent sobre Tor</b>
  <p>
  El intercambio de archivos usando Torrent ignora la configuración de proxy
  y genera conexiones directas incluso cuando se las configura para usar Tor.
  Incluso cuando se las configura para usar Tor vas a filtrar tu IP real en las
  peticiones GET al tracker, por que así es como funciona el protocolo Torrent.
  No solo <a
  href="https://blog.torproject.org/blog/bittorrent-over-tor-isnt-good-idea">
  desanonimizas tu trafico de torrent y tu trafico web</a> si no que aparte
  ralentizas la red Tor para el resto de la gente.
  </p>
  </li>
  <li><b>No habilites ni instales plugins en el navegador</b>
  <p>El Navegador Tor bloquea plugins como Flash, RealPlayer, Quicktime
  	y otros: los plugins pueden manipular el navegador a revelar tu direccion IP
  	Tampoco recomendamos instalar addons adicionales o plugins en el Navegador Tor,
  	dado que pueden bypassear Tor y herir tu anonimidad y privacidad.</p>
  </li>
  <li><b>Usá versiones HTTPS de los Sitios</b>
  <p>Tor va a cifrar todo tu trafico <a
  href="../about/overview.html#thesolution">desde y
  dentro de la red Tor</a>, pero el cifrado de tu trafico hasta el website depende
  del sitio. Para ayudar a asegurar un cifrado privado al website, el Navegador
  Tor incluye<a href="https://www.eff.org/https-everywhere">HTTPS Everywhere</a>
  para forzar el uso de HTTPS con los sitios que lo soportan.
  to force the use of HTTPS encryption with major websites that
  Sin embargo, deberías seguir viendo la barra url para
  asegurar que lo sitios a los que les provees información te muestran <a
  href="https://support.mozilla.com/en-US/kb/Site%20Identity%20Button">un botón azul o verde
  </a>, que incluyen <b>https://</b> en la URL, y que muestran el nombre correcto para el sitio.
  Mira también el sitio interactivo de la EFF como
   <a href="https://www.eff.org/pages/tor-and-https">Tor
  y HTTPS se relaiconan</a>.
  </p>
  </li>
  <li><b>No abras documentos, descargados de Tor mientras Tor esta online</b>
  <p>El navegador Tor te avisa antes de abrir cualquier documento
  que tiene que abrirse con una aplicación externa. <b>NO IGNORES
  ESTA ADVERTENCIA</b>. Tenes que ser super cuidadoso descargando
  documentos a través de Tor (Especialmente .DOC y .PDF, a menos que uses
  el visor PDF que viene incorporado en el navegador Tor) como estos
  documentos pueden contener recursos ubicados en Internet que se van a descargar
  por fuera de la red Tor. Esto va a revelar tu dirección IP no torificada.
  Si tenes que trabajar con documentos DOC o PDF, te recomendamos usar una computadora
  desconectada, con <ahref="https://www.virtualbox.org/">VirtualBox</a>
  y usarla con una <a href="http://virtualboxes.org/">maquina virtual</a> con
  las redes deshabilitadas, o usar <a href="https://tails.boum.org/">Tails</a>.
  Bajo ninguna circunstancia es seguro usar <a
  href="https://blog.torproject.org/blog/bittorrent-over-tor-isnt-good-idea">BitTorrent
  y Tor</a>
  </li>
  <li><b>Usa puentes y/o encontrá compañia</b>
  <p> Tor trata de prevenir que los atacantes aprendan a que sitio estas
  accediendo. Sin embargo, por default, no previene que alguien analizando
  tu trafico sepa que estas usando Tor. Si esto te importa, podes reducir
  el riesgo configurando a Tor para que se conecte con un
  <a href="../docs/bridges.html">Tor bridge relay</a> en lugar de conectarte
  directamente a la red publica de Tor. La mejor protección es un enfoque social:
  mientras mas usarios de Tor haya cerca tuyo y mientras mas
  <a href="../about/torusers.html">diversos</a> sus intereses, menos
  peligroso es ser uno de ellos. ¡Convence a otra gente de usar Tor!</p>
</li>
</ol>
<br>
<p>
Se inteligente y aprende mas. Entendé que ofrece Tor y que no ofrece.
Esta lista de obtaculos no es completa, y necesitamos tu ayuda <a href="../getinvolved/volunteer.html#Documentation">
identificando y documentando todos los problemas </a>.
</p>
</div>
<!-- END WARNING -->
</div>
<!-- END MAINCOL -->
<!-- START SIDECOL -->
<div id="sidecol-right">
<div class="img-shadow sidenav">
<div class="sidenav-sub">
<h2>Saltar a:</h2>
<ul>
<li class="dropdown"><a href="../download/download.html.es#windows">Microsoft Windows</a></li>
<li class="dropdown"><a href="../download/download.html.es#apple">Apple OS
X</a></li>
<li class="dropdown"><a href="../download/download.html.es#linux">Linux/Unix</a></li>
<li class="dropdown"><a href="../download/download.html.es#smartphone">Smartphones</a></li>
<li class="dropdown"><a href="../download/download.html.es#source">Codigo fuente</a></li>
</ul>
</div>
</div>
<!-- START DONATION WIDGET -->
<a href="../donate/donate-download.html"><img src="../images/btn_donateCC_LG.gif" alt="" width="186" height="67"></a>
<!-- END DONATION WIDGET -->
<!-- START INFO -->
<div class="img-shadow">
<div class="sidenav-sub">
  <h2>¿Tenes Algun Problema?</h2>
<ul>
<li class="dropdown"><a href="../docs/documentation.html">¡Leé la documentacion!</a></li>
</ul>
</div>
</div>
<!-- END INFO -->
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
        Last compiled: vie nov 17 2017 15:16:55 +0100
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
