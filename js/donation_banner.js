/* jshint esnext:true */

var kTaglines = [
  "Millions of People Depend on Tor for Online Security & Privacy",
  "A Network of People Protecting People",
  "Surveillance = Oppression",
  "Protecting Journalists, Activists & Whistleblowers Since 2006",
];

var kTaglineSizes = [
  26,
  32,
  32,
  26,
];

var sel = function (selector) {
  return document.querySelector(selector)
};

// Returns a random integer x, such that 0 <= x < max
var randomInteger = function (max) {
  return Math.floor(max * Math.random());
};

// The main donation banner function.
var runDonationBanner = function () {
  // Load random tag line once page is loaded
  var index = randomInteger(4);
  var taglineElement = sel("#banner-tagline span");
  taglineElement.innerText = kTaglines[index];
  taglineElement.style.fontSize = kTaglineSizes[index];
};

// Run banner code on load.
window.addEventListener("load", runDonationBanner);
