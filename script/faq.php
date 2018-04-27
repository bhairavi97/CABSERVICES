<!doctype html>
<html lang="en" class="no-js">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">

	<link href='http://fonts.googleapis.com/css?family=Open+Sans:400,300,600,700' rel='stylesheet' type='text/css'>

		<script src="js/modernizr.js"></script> <!-- Modernizr -->
	
</head>
<style>
*, *::after, *::before {
  -webkit-box-sizing: border-box;
  -moz-box-sizing: border-box;
  box-sizing: border-box;
}

*::after, *::before {
  content: '';
}

body {
  font-size: 100%;
  font-family: "Open Sans", sans-serif;
  color: #4e5359;
  background-color: #f3f3f5;
}
body::after {
  /* overlay layer visible on small devices when the right panel slides in */
  position: fixed;
  top: 0;
  left: 0;
  width: 100%;
  height: 100%;
  background-color: rgba(78, 83, 89, 0.8);
  visibility: hidden;
  opacity: 0;
  -webkit-transition: opacity .3s 0s, visibility 0s .3s;
  -moz-transition: opacity .3s 0s, visibility 0s .3s;
  transition: opacity .3s 0s, visibility 0s .3s;
}
body.cd-overlay::after {
  visibility: visible;
  opacity: 1;
  -webkit-transition: opacity .3s 0s, visibility 0s 0s;
  -moz-transition: opacity .3s 0s, visibility 0s 0s;
  transition: opacity .3s 0s, visibility 0s 0s;
}
@media only screen and (min-width: 768px) {
  body::after {
    display: none;
  }
}

a {
  color: #a9c056;
  text-decoration: none;
}

/* -------------------------------- 

Main components 

-------------------------------- */
header {
  position: relative;
  height: 180px;
  line-height: 180px;
  text-align: center;
  background-color: #a9c056;
}
header h1 {
  color: #ffffff;
  -webkit-font-smoothing: antialiased;
  -moz-osx-font-smoothing: grayscale;
  font-size: 20px;
  font-size: 1.25rem;
}
@media only screen and (min-width: 1024px) {
  header {
    height: 240px;
    line-height: 240px;
  }
  header h1 {
    font-size: 36px;
    font-size: 2.25rem;
    font-weight: 300;
  }
}

.cd-faq {
  width: 90%;
  max-width: 1024px;
  margin: 2em auto;
  box-shadow: 0 1px 5px rgba(0, 0, 0, 0.1);
}
.cd-faq:after {
  content: "";
  display: table;
  clear: both;
}
@media only screen and (min-width: 768px) {
  .cd-faq {
    position: relative;
    margin: 4em auto;
    box-shadow: none;
  }
}

.cd-faq-categories a {
  position: relative;
  display: block;
  overflow: hidden;
  height: 50px;
  line-height: 50px;
  padding: 0 28px 0 16px;
  background-color: #4e5359;
  -webkit-font-smoothing: antialiased;
  -moz-osx-font-smoothing: grayscale;
  color: #ffffff;
  white-space: nowrap;
  border-bottom: 1px solid #555b61;
  text-overflow: ellipsis;
}
.cd-faq-categories a::before, .cd-faq-categories a::after {
  /* plus icon on the right */
  position: absolute;
  top: 50%;
  right: 16px;
  display: inline-block;
  height: 1px;
  width: 10px;
  background-color: #7f868e;
}
.cd-faq-categories a::after {
  -webkit-transform: rotate(90deg);
  -moz-transform: rotate(90deg);
  -ms-transform: rotate(90deg);
  -o-transform: rotate(90deg);
  transform: rotate(90deg);
}
.cd-faq-categories li:last-child a {
  border-bottom: none;
}
@media only screen and (min-width: 768px) {
  .cd-faq-categories {
    width: 20%;
    float: left;
    box-shadow: 0 1px 2px rgba(0, 0, 0, 0.08);
  }
  .cd-faq-categories a {
    font-size: 13px;
    font-size: 0.8125rem;
    font-weight: 600;
    padding-left: 24px;
    padding: 0 24px;
    -webkit-transition: background 0.2s, padding 0.2s;
    -moz-transition: background 0.2s, padding 0.2s;
    transition: background 0.2s, padding 0.2s;
  }
  .cd-faq-categories a::before, .cd-faq-categories a::after {
    display: none;
  }
  .no-touch .cd-faq-categories a:hover {
    background: #555b61;
  }
  .no-js .cd-faq-categories {
    width: 100%;
    margin-bottom: 2em;
  }
}
@media only screen and (min-width: 1024px) {
  .cd-faq-categories {
    position: absolute;
    top: 0;
    left: 0;
    width: 200px;
    z-index: 2;
  }
  .cd-faq-categories a::before {
    /* decorative rectangle on the left visible for the selected item */
    display: block;
    top: 0;
    right: auto;
    left: 0;
    height: 100%;
    width: 3px;
    background-color: #a9c056;
    opacity: 0;
    -webkit-transition: opacity 0.2s;
    -moz-transition: opacity 0.2s;
    transition: opacity 0.2s;
  }
  .cd-faq-categories .selected {
    background: #42464b !important;
  }
  .cd-faq-categories .selected::before {
    opacity: 1;
  }
  .cd-faq-categories.is-fixed {
    /* top and left value assigned in jQuery */
    position: fixed;
  }
  .no-js .cd-faq-categories {
    position: relative;
  }
}

.cd-faq-items {
  position: fixed;
  height: 100%;
  width: 90%;
  top: 0;
  right: 0;
  background: #ffffff;
  padding: 0 5% 1em;
  overflow: auto;
  -webkit-overflow-scrolling: touch;
  z-index: 1;
  -webkit-backface-visibility: hidden;
  backface-visibility: hidden;
  -webkit-transform: translateZ(0) translateX(100%);
  -moz-transform: translateZ(0) translateX(100%);
  -ms-transform: translateZ(0) translateX(100%);
  -o-transform: translateZ(0) translateX(100%);
  transform: translateZ(0) translateX(100%);
  -webkit-transition: -webkit-transform .3s;
  -moz-transition: -moz-transform .3s;
  transition: transform .3s;
}
.cd-faq-items.slide-in {
  -webkit-transform: translateZ(0) translateX(0%);
  -moz-transform: translateZ(0) translateX(0%);
  -ms-transform: translateZ(0) translateX(0%);
  -o-transform: translateZ(0) translateX(0%);
  transform: translateZ(0) translateX(0%);
}
.no-js .cd-faq-items {
  position: static;
  height: auto;
  width: 100%;
  -webkit-transform: translateX(0);
  -moz-transform: translateX(0);
  -ms-transform: translateX(0);
  -o-transform: translateX(0);
  transform: translateX(0);
}
@media only screen and (min-width: 768px) {
  .cd-faq-items {
    position: static;
    height: auto;
    width: 78%;
    float: right;
    overflow: visible;
    -webkit-transform: translateZ(0) translateX(0);
    -moz-transform: translateZ(0) translateX(0);
    -ms-transform: translateZ(0) translateX(0);
    -o-transform: translateZ(0) translateX(0);
    transform: translateZ(0) translateX(0);
    padding: 0;
    background: transparent;
  }
}
@media only screen and (min-width: 1024px) {
  .cd-faq-items {
    float: none;
    width: 100%;
    padding-left: 220px;
  }
  .no-js .cd-faq-items {
    padding-left: 0;
  }
}

.cd-close-panel {
  position: fixed;
  top: 5px;
  right: -100%;
  display: block;
  height: 40px;
  width: 40px;
  overflow: hidden;
  text-indent: 100%;
  white-space: nowrap;
  z-index: 2;
  /* Force Hardware Acceleration in WebKit */
  -webkit-transform: translateZ(0);
  -moz-transform: translateZ(0);
  -ms-transform: translateZ(0);
  -o-transform: translateZ(0);
  transform: translateZ(0);
  -webkit-backface-visibility: hidden;
  backface-visibility: hidden;
  -webkit-transition: right 0.4s;
  -moz-transition: right 0.4s;
  transition: right 0.4s;
}
.cd-close-panel::before, .cd-close-panel::after {
  /* close icon in CSS */
  position: absolute;
  top: 16px;
  left: 12px;
  display: inline-block;
  height: 3px;
  width: 18px;
  background: #6c7d8e;
}
.cd-close-panel::before {
  -webkit-transform: rotate(45deg);
  -moz-transform: rotate(45deg);
  -ms-transform: rotate(45deg);
  -o-transform: rotate(45deg);
  transform: rotate(45deg);
}
.cd-close-panel::after {
  -webkit-transform: rotate(-45deg);
  -moz-transform: rotate(-45deg);
  -ms-transform: rotate(-45deg);
  -o-transform: rotate(-45deg);
  transform: rotate(-45deg);
}
.cd-close-panel.move-left {
  right: 2%;
}
@media only screen and (min-width: 768px) {
  .cd-close-panel {
    display: none;
  }
}

.cd-faq-group {
  /* hide group not selected */
  display: none;
}
.cd-faq-group.selected {
  display: block;
}
.cd-faq-group .cd-faq-title {
  background: transparent;
  box-shadow: none;
  margin: 1em 0;
}
.no-touch .cd-faq-group .cd-faq-title:hover {
  box-shadow: none;
}
.cd-faq-group .cd-faq-title h2 {
  text-transform: uppercase;
  font-size: 12px;
  font-size: 0.75rem;
  font-weight: 700;
  color: #bbbbc7;
}
.no-js .cd-faq-group {
  display: block;
}
@media only screen and (min-width: 768px) {
  .cd-faq-group {
    /* all groups visible */
    display: block;
  }
  .cd-faq-group > li {
    background: #ffffff;
    margin-bottom: 6px;
    box-shadow: 0 1px 2px rgba(0, 0, 0, 0.08);
    -webkit-transition: box-shadow 0.2s;
    -moz-transition: box-shadow 0.2s;
    transition: box-shadow 0.2s;
  }
  .no-touch .cd-faq-group > li:hover {
    box-shadow: 0 1px 10px rgba(108, 125, 142, 0.3);
  }
  .cd-faq-group .cd-faq-title {
    margin: 2em 0 1em;
  }
  .cd-faq-group:first-child .cd-faq-title {
    margin-top: 0;
  }
}

.cd-faq-trigger {
  position: relative;
  display: block;
  margin: 1.6em 0 .4em;
  line-height: 1.2;
}
@media only screen and (min-width: 768px) {
  .cd-faq-trigger {
    font-size: 24px;
    font-size: 1.5rem;
    font-weight: 300;
    margin: 0;
    padding: 24px 72px 24px 24px;
  }
  .cd-faq-trigger::before, .cd-faq-trigger::after {
    /* arrow icon on the right */
    position: absolute;
    right: 24px;
    top: 50%;
    height: 2px;
    width: 13px;
    background: #cfdca0;
    -webkit-backface-visibility: hidden;
    backface-visibility: hidden;
    -webkit-transition-property: -webkit-transform;
    -moz-transition-property: -moz-transform;
    transition-property: transform;
    -webkit-transition-duration: 0.2s;
    -moz-transition-duration: 0.2s;
    transition-duration: 0.2s;
  }
  .cd-faq-trigger::before {
    -webkit-transform: rotate(45deg);
    -moz-transform: rotate(45deg);
    -ms-transform: rotate(45deg);
    -o-transform: rotate(45deg);
    transform: rotate(45deg);
    right: 32px;
  }
  .cd-faq-trigger::after {
    -webkit-transform: rotate(-45deg);
    -moz-transform: rotate(-45deg);
    -ms-transform: rotate(-45deg);
    -o-transform: rotate(-45deg);
    transform: rotate(-45deg);
  }
  .content-visible .cd-faq-trigger::before {
    -webkit-transform: rotate(-45deg);
    -moz-transform: rotate(-45deg);
    -ms-transform: rotate(-45deg);
    -o-transform: rotate(-45deg);
    transform: rotate(-45deg);
  }
  .content-visible .cd-faq-trigger::after {
    -webkit-transform: rotate(45deg);
    -moz-transform: rotate(45deg);
    -ms-transform: rotate(45deg);
    -o-transform: rotate(45deg);
    transform: rotate(45deg);
  }
}

.cd-faq-content p {
  font-size: 14px;
  font-size: 0.875rem;
  line-height: 1.4;
  color: #6c7d8e;
}
@media only screen and (min-width: 768px) {
  .cd-faq-content {
    display: none;
    padding: 0 24px 30px;
  }
  .cd-faq-content p {
    line-height: 1.6;
  }
  .no-js .cd-faq-content {
    display: block;
  }
}
html, body, div, span, applet, object, iframe,
h1, h2, h3, h4, h5, h6, p, blockquote, pre,
a, abbr, acronym, address, big, cite, code,
del, dfn, em, img, ins, kbd, q, s, samp,
small, strike, strong, sub, sup, tt, var,
b, u, i, center,
dl, dt, dd, ol, ul, li,
fieldset, form, label, legend,
table, caption, tbody, tfoot, thead, tr, th, td,
article, aside, canvas, details, embed, 
figure, figcaption, footer, header, hgroup, 
menu, nav, output, ruby, section, summary,
time, mark, audio, video {
	margin: 0;
	padding: 0;
	border: 0;
	font-size: 100%;
	font: inherit;
	vertical-align: baseline;
}
/* HTML5 display-role reset for older browsers */
article, aside, details, figcaption, figure, 
footer, header, hgroup, menu, nav, section, main {
	display: block;
}
body {
	line-height: 1;
}
ol, ul {
	list-style: none;
}
blockquote, q {
	quotes: none;
}
blockquote:before, blockquote:after,
q:before, q:after {
	content: '';
	content: none;
}
table {
	border-collapse: collapse;
	border-spacing: 0;
}c
</style>


<body>

<section class="cd-faq">
	
	<div class="cd-faq-items">
		<ul id="basics" class="cd-faq-group">
			
			<li>
				<a class="cd-faq-trigger" href="#0">Can I cancel my booking? How can I cancel my bookings?</a>
				<div class="cd-faq-content">
					<p>Yes, you can cancel a booking.Bookings can be cancelled online 4 hours prior to the scheduled pick up time. If the cancellation is within 4 hours of the scheduled pick up time, we request you to call the customer support center for the same. Please note that cancellation charges apply as per our cancellation policy outlined below.</p>
				</div> <!-- cd-faq-content -->
			</li>

			<li>
				<a class="cd-faq-trigger" href="#0">What are the benefits of using justridecabs? 	</a>
				<div class="cd-faq-content">
					<p>You no longer need to be dependent on online directories and yellow pages to obtain a huge list of telephone numbers to call for order fulfilment.
 �	You will henceforth not have to call multiple operators for order fulfilment
If you are travelling to a new city (other than your city of residence), either on work or a holiday and are not familiar with reliable operators in the new city, you can search for operators, vehicle types and prices and make your booking online since we are taking the trouble of verifying the background and infrastructure of each operator before enlisting them.
</p>
				</div> <!-- cd-faq-content -->
			</li>

			<li>
				<a class="cd-faq-trigger" href="#0">How do I book JustRide?</a>
				<div class="cd-faq-content">
						<p>JustRide can be booked through the following channels

Website: Log on to www.justride.in and book your cab in less than 60 seconds
Call 63636363 and our customer care executives will help you to book your cab.
Download our mobile apps for android, blackberry and iphone</p?
				</div> <!-- cd-faq-content -->
			</li>

			<li>
				<a class="cd-faq-trigger" href="#0">What are the timings of JustRide Services?</a>
				<div class="cd-faq-content">
					<p>JustRide is available 24/7 for 365 days</p>
				</div> <!-- cd-faq-content -->
			</li>
			
			<li>
				<a class="cd-faq-trigger" href="#0">Are there some extra charges for booking JustRide online/through call center?</a>
				<div class="cd-faq-content">
					<p>No. There are no charges to book a cab</p>
				</div> <!-- cd-faq-content -->
			</li>
			
			<li>
				<a class="cd-faq-trigger" href="#0">Will I be charged for waiting time also?</a>
				<div class="cd-faq-content">
					<p>Yes. You will be charged for the waiting time, Rs. 2.20 per minute for day time and Rs. 2.75 per minute for night waiting charges.</p>
				</div> <!-- cd-faq-content -->
			</li>
			
			<li>
				<a class="cd-faq-trigger" href="#0">Can I cancel a booking made?</a>
				<div class="cd-faq-content">
					<p>Yes you can cancel your booking through website, call centre and mobile apps</p>
				</div> <!-- cd-faq-content -->
			</li>
			
		</ul> <!-- cd-faq-group -->

		
	</div> <!-- cd-faq-items -->
	<a href="#0" class="cd-close-panel">Close</a>
</section> <!-- cd-faq -->
<script src="js/jquery-2.1.1.js"></script>

<script src="js/main.js"></script> <!-- Resource jQuery -->
</body>
</html>