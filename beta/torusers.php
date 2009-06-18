<?php
$pagename = "Tor: anonymity online";
include("header.inc.php");
?>
<div class="main-column"> 
  <h2>Tor's Inception</h2>
  <!-- BEGIN SIDEBAR -->
  <div class="sidebar-left"> 
    <h3>Who uses Tor?</h3>
&raquo;&nbsp;<a href="torusers.html.html#normalusers">Normal people</a><br>
&raquo;&nbsp;<a href="torusers.html.html#military">Militaries</a><br>
&raquo;&nbsp;<a href="torusers.html.html#journalist">Journalists & their audience</a><br>
&raquo;&nbsp;<a href="torusers.html.html#lawenforcement">Law enforcement officers</a><br>
&raquo;&nbsp;<a href="torusers.html.html#activists">Activists &amp; Whistleblowers</a><br>
&raquo;&nbsp;<a href="torusers.html.html#spotlight">High &amp; low profile people</a><br>
&raquo;&nbsp;<a href="torusers.html.html#executives">Business executives</a><br>
&raquo;&nbsp;<a href="torusers.html.html#bloggers">Bloggers</a><br>
  </div>
  <!-- END SIDEBAR -->
  <p> Tor was originally designed, implemented, and deployed as a third-generation 
    <a href="http://www.onion-router.net/">onion routing project of the Naval 
    Research Laboratory</a>. It was originally developed with the U.S. Navy in 
    mind, for the primary purpose of protecting government communications. Today, 
    it is used every day for a wide variety of purposes by the military, journalists, 
    law enforcement officers, activists, and many others. Here are some of the 
    specific uses we've seen or recommend. </p>
  <a name="normalusers"></a> 
  <h3><a class="anchor" href="#normalusers">Normal people use Tor</a></h3>
  <ul>
    <li><strong>They protect their privacy from unscrupulous marketers and identity 
      thieves.</strong> Internet Service Providers (ISPs) <a href="http://seekingalpha.com/article/29449-compete-ceo-isps-sell-clickstreams-for-5-a-month"> 
      sell your Internet browsing records</a> to marketers or anyone else willing 
      to pay for it. ISPs typically say that they anonymize the data by not providing 
      personally identifiable information, but <a href="http://www.wired.com/politics/security/news/2006/08/71579?currentPage=all">this 
      has proven incorrect</a>. A full record of every site you visit, the text 
      of every search you perform, and potentially userid and even password information 
      can still be part of this data. In addition to your ISP, the websites (<a href="http://www.google.com/privacy_faq.html">and 
      search engines</a>) you visit have their own logs, containing the same or 
      more information. </li>
    <li><strong> They protect their communications from irresponsible corporations.</strong> 
      All over the Internet, Tor is being recommended to people newly concerned 
      about their privacy in the face of increasing breaches and betrayals of 
      private data. From <a href="http://www.securityfocus.com/news/11048">lost 
      backup tapes</a>, to <a href="http://www.nytimes.com/2006/08/09/technology/09aol.html?ex=1312776000&amp;en=f6f61949c6da4d38&amp;ei=5090">giving 
      away the data to researchers</a>, your data is often not well protected 
      by those you are supposed to trust to keep it safe. </li>
    <li><strong>They protect their children online.</strong> You've told your 
      kids they shouldn't share personally identifying information online, but 
      they may be sharing their location simply by not concealing their IP address. 
      Increasingly, IP addresses can be <a href="http://whatismyipaddress.com/">literally 
      mapped to a city or even street location</a>, and can <a href="http://whatsmyip.org/more/">reveal 
      other information</a> about how you are connecting to the Internet. In the 
      United States, the government is pushing to make this mapping increasingly 
      precise. </li>
    <li><strong>They research sensitive topics.</strong> There's a wealth of information 
      available online. But perhaps in your country, access to information on 
      AIDS, birth control, <a href="http://www.cbsnews.com/stories/2002/12/03/tech/main531567.shtml">Tibetan 
      culture</a>, or world religions is behind a national firewall. </li>
  </ul>
  <a name="military"></a> 
  <h3><a class="anchor" href="#military">Militaries use Tor</a></h3>
  <ul>
    <li> <strong>Field Agents:</strong> It is not difficult for insurgents to 
      monitor Internet traffic and discover all the hotels and other locations 
      from which people are connecting to known military servers. Military field 
      agents deployed away from home use Tor to mask the sites they are visiting, 
      protecting military interests and operations, as well as protecting themselves 
      from physical harm. </li>
    <li><strong>Hidden services:</strong> When the Internet was designed by DARPA, 
      its primary purpose was to be able to facilitate distributed, robust communications 
      in case of local strikes. However, some functions must be centralized, such 
      as command and control sites. It's the nature of the Internet protocols 
      to reveal the geographic location of any server that is reachable online. 
      Tor's hidden services capacity allows military command and control to be 
      physically secure from discovery and takedown. </li>
    <li><strong>Intelligence gathering:</strong> Military personnel need to use 
      electronic resources run and monitored by insurgents. They do not want the 
      webserver logs on an insurgent website to record a military address, thereby 
      revealing the surveillance. </li>
  </ul>
  <a name="journalist"></a> 
  <h3><a class="anchor" href="#journalist">Journalists and their audience use 
    Tor</a></h3>
  <ul>
    <li><strong><a href="http://www.rsf.org/">Reporters without Borders</a></strong> 
      tracks Internet prisoners of conscience and jailed or harmed journalists 
      all over the world. They advise journalists, sources, bloggers, and dissidents 
      to use Tor to ensure their privacy and safety. </li>
    <li><strong>The US <a href="http://www.ibb.gov/">International Broadcasting 
      Bureau</a></strong> (Voice of America/Radio Free Europe/Radio Free Asia) 
      supports Tor development to help Internet users in countries without safe 
      access to free media. Tor preserves the ability of persons behind national 
      firewalls or under the surveillance of repressive regimes to obtain a global 
      perspective on controversial topics including democracy, economics and religion. 
    </li>
    <li><strong>Citizen journalists in China</strong> use Tor to write about local 
      events to encourage social change and political reform. </li>
    <li><strong>Citizens and journalists in <a
href="http://www.rsf.org/rubrique.php3?id_rubrique=554">Internet black holes</a></strong> 
      use Tor to research state propaganda and opposing viewpoints, to file stories 
      with non-State controlled media, and to avoid risking the personal consequences 
      of intellectual curiosity. </li>
  </ul>
  <a name="lawenforcement"></a> 
  <h3><a class="anchor" href="#lawenforcement">Law enforcement officers use Tor</a></h3>
  <ul>
    <li><strong>Online surveillance:</strong> Tor allows officials to surf questionable 
      web sites and services without leaving tell-tale tracks. If the system administrator 
      of an illegal gambling site, for example, were to see multiple connections 
      from government or law enforcement IP addresses in usage logs, investigations 
      may be hampered. </li>
    <li><strong>Sting operations:</strong> Similarly, anonymity allows law officers 
      to engage in online &ldquo;undercover &rdquo; operations. Regardless of 
      how good an undercover officer's &ldquo;street cred&rdquo; may be, if the 
      communications include IP ranges from police addresses, the cover is blown. 
    </li>
    <li><strong>Truly anonymous tip lines:</strong> While online anonymous tip 
      lines are popular, without anonymity software, they are far less useful. 
      Sophisticated sources understand that although a name or email address is 
      not attached to information, server logs can identify them very quickly. 
      As a result, tip line web sites that do not encourage anonymity are limiting 
      the sources of their tips. </li>
  </ul>
  <a name="activists"></a> 
  <h3><a class="anchor" href="#activists">Activists &amp; Whistleblowers use Tor</a></h3>
  <ul>
    <li><strong>Human rights activists use Tor to anonymously report abuses from 
      danger zones.</strong> Internationally, labor rights workers use Tor and 
      other forms of online and offline anonymity to organize workers in accordance 
      with the Universal Declaration of Human Rights. Even though they are within 
      the law, it does not mean they are safe. Tor provides the ability to avoid 
      persecution while still raising a voice. </li>
    <li>When groups such as the <strong>Friends Service Committee and environmental 
      groups are increasingly <a href="http://www.afsc.org/news/2005/government-spying.htm">falling 
      under surveillance</a> in the United States</strong> under laws meant to 
      protect against terrorism, many peaceful agents of change rely on Tor for 
      basic privacy during legitimate activities. </li>
    <li><strong><a href="http://hrw.org/doc/?t=internet">Human Rights Watch</a></strong> 
      recommends Tor in their report, &ldquo; <a href="http://www.hrw.org/reports/2006/china0806/">Race 
      to the Bottom: Corporate Complicity in Chinese Internet Censorship</a>.&rdquo; 
      The study co-author interviewed Roger Dingledine, Tor project leader, on 
      Tor use. They cover Tor in the section on how to breach the <a
href="http://www.hrw.org/reports/2006/china0806/3.htm#_Toc142395820">&ldquo;Great 
      Firewall of China,&rdquo;</a> and recommend that human rights workers throughout 
      the globe use Tor for &ldquo;secure browsing and communications.&rdquo; 
    </li>
    <li> Tor has consulted with and volunteered help to <strong>Amnesty International's 
      recent <a href="http://irrepressible.info/">corporate responsibility campaign</a></strong>. 
      See also their <a href="http://irrepressible.info/static/pdf/FOE-in-china-2006-lores.pdf">full 
      report</a> on China Internet issues. </li>
    <li><a href="http://www.globalvoicesonline.org/">Global Voices</a> recommends 
      Tor, especially for <strong>anonymous blogging</strong>, throughout their 
      <a href="http://www.google.com/search?q=site:www.globalvoicesonline.org+tor"> 
      web site.</a> </li>
    <li>In the US, the Supreme Court recently stripped legal protections from 
      government whistleblowers. But whistleblowers working for governmental transparency 
      or corporate accountability can use Tor to seek justice without personal 
      repercussions. </li>
    <li>A contact of ours who works with a public health nonprofit in Africa reports 
      that his nonprofit <strong>must budget 10% to cover various sorts of corruption</strong>, 
      mostly bribes and such. When that percentage rises steeply, not only can 
      they not afford the money, but they can not afford to complain &mdash; this 
      is the point at which open objection can become dangerous. So his nonprofit 
      has been working to <strong>use Tor to safely whistleblow on government 
      corruption</strong> in order to continue their work. </li>
    <li>At a recent conference, a Tor staffer ran into a woman who came from a 
      &ldquo;company town&rdquo; in the eastern United States. She was attempting 
      to blog anonymously to rally local residents to <strong>urge reform in the 
      company</strong> that dominated the town's economic and government affairs. 
      She is fully cognizant that the kind of organizing she was doing <strong>could 
      lead to harm or &ldquo;fatal accidents.&rdquo;</strong> </li>
    <li>In east Asia, some labor organizers use anonymity to <strong>reveal information 
      regarding sweatshops</strong> that produce goods for western countries and 
      to organize local labor. </li>
    <li> Tor can help activists avoid government or corporate censorship that 
      hinders organization. In one such case, a <a href="http://www.cbc.ca/story/canada/national/2005/07/24/telus-sites050724.html">Canadian 
      ISP blocked access to a union website used by their own employees</a> to 
      help organize a strike. </li>
  </ul>
  <a name="spotlight"></a> 
  <h3><a class="anchor" href="#spotlight">High &amp; low profile people use Tor</a></h3>
  <ul>
    <li>Does being in the public spotlight shut you off from having a private 
      life, forever, online? A rural lawyer in a New England state keeps an anonymous 
      blog because, with the diverse clientele at his prestigious law firm, <strong>his 
      political beliefs are bound to offend someone</strong>. Yet, he doesn't 
      want to remain silent on issues he cares about. Tor helps him feel secure 
      that he can express his opinion without consequences to his public role. 
    </li>
    <li>People living in poverty often don't participate fully in civil society 
      -- not out of ignorance or apathy, but out of fear. If something you write 
      were to get back to your boss, would you lose your job? If your social worker 
      read about your opinion of the system, would she treat you differently? 
      Anonymity gives a voice to the voiceless. To support this, <strong>Tor currently 
      has an open Americorps/VISTA position</strong> pending. This government 
      grant will cover a full time stipend for a volunteer to create curricula 
      to <strong>show low-income populations how to use anonymity online for safer 
      civic engagement</strong>. Although it's often said that the poor do not 
      use online access for civic engagement, failing to act in their self-interests, 
      it is our hypothesis (based on personal conversations and anecdotal information) 
      that it is precisely the &ldquo;permanent record &rdquo; left online that 
      keeps many of the poor from speaking out on the Internet. We hope to show 
      people how to engage more safely online, and then at the end of the year, 
      evaluate how online and offline civic engagement has changed, and how the 
      population sees this continuing into the future. </li>
  </ul>
  <a name="executives"></a> 
  <h3><a class="anchor" href="#executives">Business executives use Tor</a></h3>
  <ul>
    <li><strong>Security breach information clearinghouses:</strong> Say a financial 
      institution participates in a security clearinghouse of information on Internet 
      attacks. Such a repository requires members to report breaches to a central 
      group, who correlates attacks to detect coordinated patterns and send out 
      alerts. But if a specific bank in St. Louis is breached, they don't want 
      an attacker watching the incoming traffic to such a repository to be able 
      to track where information is coming from. Even though every packet were 
      encrypted, the IP address would betray the location of a compromised system. 
      Tor allows such repositories of sensitive information to resist compromises. 
    </li>
    <li><strong>Seeing your competition as your market does:</strong> If you try 
      to check out a competitor's pricing, you may find no information or misleading 
      information on their web site. This is because their web server may be keyed 
      to detect connections from competitors, and block or spread disinformation 
      to your staff. Tor allows a business to view their sector as the general 
      public would view it. </li>
    <li><strong>Keeping strategies confidential:</strong> An investment bank, 
      for example, might not want industry snoopers to be able to track what web 
      sites their analysts are watching. The strategic importance of traffic patterns, 
      and the vulnerability of the surveillance of such data, is starting to be 
      more widely recognized in several areas of the business world. </li>
    <li><strong>Accountability:</strong> In an age when irresponsible and unreported 
      corporate activity has undermined multi-billion dollar businesses, an executive 
      exercising true stewardship wants the whole staff to feel free to disclose 
      internal malfeasance. Tor facilitates internal accountability before it 
      turns into whistleblowing. </li>
  </ul>
  <a name="bloggers"></a> 
  <h3><a class="anchor" href="#bloggers">Bloggers use Tor</a></h3>
  <ul>
    <li>Every day we hear about bloggers who are <a href="http://online.wsj.com/public/article/SB112541909221726743-Kl4kLxv0wSbjqrkXg_DieY3c8lg_20050930.html">sued</a> 
      or <a href="http://www.usatoday.com/money/workplace/2005-06-14-worker-blogs-usat_x.htm">fired</a> 
      for saying perfectly legal things online, in their blog. In addition to 
      following the advice in the <a href="http://w2.eff.org/bloggers/lg/">EFF 
      Legal Guide for Bloggers</a> and Reporters Without Borders' <a href="http://www.rsf.org/rubrique.php3?id_rubrique=542">Handbook 
      for bloggers and cyber-dissidents</a>, we recommend using Tor. </li>
  </ul>
  <p> Please do send us your success stories. They are very important because 
    Tor provides anonymity. While it is thrilling to speculate about <a
href="faq-abuse.html.html">undesired effects of Tor</a>, when it succeeds, nobody 
    notices. This is great for users, but not so good for us, since publishing 
    success stories about how people or organizations are staying anonymous could 
    be counterproductive. For example, we talked to an FBI officer who explained 
    that he uses Tor every day for his work &mdash; but he quickly followed up 
    with a request not to provide details or mention his name.</p>
  <p> Like any technology, from pencils to cellphones, anonymity can be used for 
    both good and bad. You have probably seen some of the vigorous debate (<a href="http://www.wired.com/politics/security/commentary/securitymatters/2006/01/70000">pro</a>, 
    <a href="http://www.edge.org/q2006/q06_4.html#kelly">con</a>, and <a
href="http://web.mit.edu/gtmarx/www/anon.html">academic</a>) over anonymity. The 
    Tor project is based on the belief that anonymity is not just a good idea 
    some of the time - it is a requirement for a free and functioning society. 
    The <a href="http://www.eff.org/issues/anonymity">EFF maintains a good overview</a> 
    of how anonymity was crucial to the founding of the United States. Anonymity 
    is recognized by US courts as a fundamental and important right. In fact, 
    governments mandate anonymity in many cases themselves: <a href="https://www.crimeline.co.za/default.asp">police 
    tip lines</a>, <a href="http://www.texasbar.com/Content/ContentGroups/Public_Information1/Legal_Resources_Consumer_Information/Family_Law1/Adoption_Options.htm#sect2">adoption 
    services</a>, <a href="http://writ.news.findlaw.com/aronson/20020827.html">police 
    officer identities</a>, and so forth. It would be impossible to rehash the 
    entire anonymity debate here - it is too large an issue with too many nuances, 
    and there are plenty of other places where this information can be found. 
    We do have a <a href="faq-abuse.html.html">Tor abuse</a> page describing some 
    of the possible abuse cases for Tor, but suffice it to say that if you want 
    to abuse the system, you'll either find it mostly closed for your purposes 
    (e.g. the majority of Tor relays do not support SMTP in order to prevent anonymous 
    email spamming), or if you're one of the <a href="http://www.schneier.com/blog/archives/2005/12/computer_crime_1.html">Four 
    Horsemen of the Information Apocalypse</a>, you have better options than Tor. 
    While not dismissing the potential abuses of Tor, this page shows a few of 
    the many important ways anonymity is used online today.</p>
</div>
<!-- #main -->
<?php

include("footer.inc.php");

?>
