/* jshint esnext:true */

let kTaglines = [
  "Protecting Journalists, Whistleblowers, & Activists Since 2006",
  "Networking Freedom Worldwide",
  "Freedom Online",
  "Fostering Free Expression Worldwide",
  "Protecting the Privacy of Millions Every Day",
];

let kTaglineSizes = [
  30,
  40,
  48,
  36,
  36,
];

// Returns a random integer x, such that 0 <= x < max
let randomInteger = function (max) {
  return Math.floor(max * Math.random());
};

// The main donation banner function.
let runDonationBanner = function () {
  // Load random tag line once page is loaded
  let index = randomInteger(kTaglines.length);
  let taglineElement = document.querySelector("#banner-tagline span");
  taglineElement.innerText = kTaglines[index];
  taglineElement.style.fontSize = kTaglineSizes[index] + "px";
};

runDonationBanner();
