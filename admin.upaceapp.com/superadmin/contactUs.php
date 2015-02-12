<?php require_once('include/config.php'); ?>
<!DOCTYPE html>
<html lang="en-us">
	<head>
		<?php require_once('include/header.php');?>
	</head>
	
	<!--

	TABLE OF CONTENTS.
	
	Use search to find needed section.
	
	===================================================================
	
	|  01. #CSS Links                |  all CSS links and file paths  |
	|  02. #FAVICONS                 |  Favicon links and file paths  |
	|  03. #GOOGLE FONT              |  Google font link              |
	|  04. #APP SCREEN / ICONS       |  app icons, screen backdrops   |
	|  05. #BODY                     |  body tag                      |
	|  06. #HEADER                   |  header tag                    |
	|  07. #PROJECTS                 |  project lists                 |
	|  08. #TOGGLE LAYOUT BUTTONS    |  layout buttons and actions    |
	|  09. #MOBILE                   |  mobile view dropdown          |
	|  10. #SEARCH                   |  search field                  |
	|  11. #NAVIGATION               |  left panel & navigation       |
	|  12. #RIGHT PANEL              |  right panel userlist          |
	|  13. #MAIN PANEL               |  main panel                    |
	|  14. #MAIN CONTENT             |  content holder                |
	|  15. #PAGE FOOTER              |  page footer                   |
	|  16. #SHORTCUT AREA            |  dropdown shortcuts area       |
	|  17. #PLUGINS                  |  all scripts and plugins       |
	
	===================================================================
	
	-->
	
	<!-- #BODY -->
	<!-- Possible Classes

		* 'smart-style-{SKIN#}'
		* 'smart-rtl'         - Switch theme mode to RTL
		* 'menu-on-top'       - Switch to top navigation (no DOM change required)
		* 'no-menu'			  - Hides the menu completely
		* 'hidden-menu'       - Hides the main menu but still accessable by hovering over left edge
		* 'fixed-header'      - Fixes the header
		* 'fixed-navigation'  - Fixes the main menu
		* 'fixed-ribbon'      - Fixes breadcrumb
		* 'fixed-page-footer' - Fixes footer
		* 'container'         - boxed layout mode (non-responsive: will not work with fixed-navigation & fixed-ribbon)
	-->
	<body class="">

		<!-- HEADER -->
		<?php
				require_once('include/los-header.php');
		?>
		<!-- END HEADER -->

		<!-- Left panel : Navigation area -->
		<!-- Note: This width of the aside area can be adjusted through LESS variables -->
		<aside id="left-panel">

			<!-- User info -->
			<?php
				require_once('include/los-userInfo.php');
			?>
			<!-- end user info -->

			<!-- NAVIGATION : This navigation is also responsive-->
			<?php
				require_once('include/los-nav.php');
			?>
			<span class="minifyme" data-action="minifyMenu"> 
				<i class="fa fa-arrow-circle-left hit"></i> 
			</span>

		</aside>
		<!-- END NAVIGATION -->

		<!-- MAIN PANEL -->
		<div id="main" role="main">

			<!-- RIBBON -->
			<div id="ribbon">

				<span class="ribbon-button-alignment"> 
					<span id="refresh" class="btn btn-ribbon" data-action="resetWidgets" data-title="refresh"  rel="tooltip" data-placement="bottom" data-original-title="<i class='text-warning fa fa-warning'></i> Warning! This will reset all your details." data-html="true">
						<i class="fa fa-refresh"></i>
					</span> 
				</span>

				<!-- breadcrumb -->
				
				<!-- end breadcrumb -->

				<!-- You can also add more buttons to the
				ribbon for further usability

				Example below:

				<span class="ribbon-button-alignment pull-right">
				<span id="search" class="btn btn-ribbon hidden-xs" data-title="search"><i class="fa-grid"></i> Change Grid</span>
				<span id="add" class="btn btn-ribbon hidden-xs" data-title="add"><i class="fa-plus"></i> Add</span>
				<span id="search" class="btn btn-ribbon" data-title="search"><i class="fa-search"></i> <span class="hidden-mobile">Search</span></span>
				</span> -->

			</div>
			<!-- END RIBBON -->

			<!-- MAIN CONTENT -->
			<div id="content">


<div class="row">
	<div class="col-xs-12 col-sm-9 col-md-9 col-lg-9">
		<h1 class="page-title txt-color-blueDark">
			
			<!-- PAGE HEADER -->
			<i class="fa-fw fa fa-bar-chart-o"></i> 
				Contact Us		
			<span>
			</span>
		</h1>
	</div>
	
	
</div>

				<!-- row -->
				<div class="row">

					<div class="col-sm-12 col-md-12">
						<div class="well well-light well-lg">

							<h3>Contact Us</h3>
							<p>info@upaceapp.com<small id="Title"><a href="mailto:info@upaceapp.com" class="btn btn-default btn-xs"><i class="fa fa-envelope-o"></i> Send Message</a> </small>
							</p>
							
							<br />
							
							<h3><a href="http://upaceapp.com/" target="blank" style="cursor:pointer;text-decoration:none">upaceapp.com</a></h3>

							<h3><a data-toggle="modal" data-target="#terms" style="cursor:pointer;text-decoration:none">Terms & Privacy Policy</a></h3>

							<!-- <h3><a data-toggle="modal" data-target="#privacy" style="cursor:pointer;text-decoration:none">Privacy statement</a></h3> -->
							

						</div>

					</div>

				</div>

				<div class="modal fade" id="terms">
					<div class="modal-dialog">
					<div class="modal-content">
					  <div class="modal-header">
						<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
						<h4 class="modal-title">Terms of use</h4>
					  </div>
					  <div class="modal-body" style="font-family: 'questrialregular';">
						
						Mobile Application Terms of Use

PLEASE READ THIS MOBILE APPLICATION TERMS OF USE AGREEMENT 

("AGREEMENT") CAREFULLY BEFORE DOWNLOADING, INSTALLING, OR 

USING THE ATTOLLO TECHNOLOGY LLC, D/B/A UPACE ("UPACE"), MOBILE 

APPLICATION ("APPLICATION"). BY DOWNLOADING, INSTALLING, OR USING THE 

APPLICATION YOU ACKNOWLEDGE THAT YOU HAVE READ AND UNDERSTAND 

THIS AGREEMENT, AND THAT YOU AGREE TO BE BOUND BY ITS TERMS AND 

CONDITIONS. 

This Agreement sets forth the terms of use for the Application. UPACE reserves the right to 

change, modify, add, or remove portions of this Agreement at any time. Such changes, revisions 

or modifications shall be effective immediately upon notice to you, which may be given by 

any means including, without limitation, via posting within the "MY ACCOUNT" section of 

the Application. Your continued use of the Application after such notice shall be deemed to 

constitute acceptance of such changes, revisions or modifications.

LICENSE; SCOPE OF USE

Subject to the terms and conditions of this Agreement, UPACE grants you a limited, non-
transferable, revocable license to view, use and download a single copy of the Application for 

your informational, personal, non-commercial use (the "License") on any device that you own 

or control and as permitted by the Usage Rules set forth in the Apple App Store Terms and 

Conditions and/or any other mobile application store including, without limitation, Google 

pay for android platforms (the "Usage Rules"). The License does not allow you to use the 

Application on any device that you do not own or control, and you may not distribute or make 

the Application available over a network where it could be used by multiple devices at the 

same time. You may not rent, lease, lend, sell, redistribute or sublicense the Application. You 

may not copy (except as expressly permitted, if at all, by this Agreement and the Usage Rules), 

decompile, reverse engineer, disassemble, attempt to derive the source code of, modify, or create 

derivative works of the Application, any updates, or any part thereof (except as and only to 

the extent any foregoing restriction is prohibited by applicable law). Any attempt to do so is 

a violation of the rights of UPACE or its licensors. You may not use this Application for any 

purpose (a) which would be contrary to UPACE's business interest, or (b) to UPACE's actual 

or potential economic disadvantage in any respect, including using the Application to develop a 

competing application. All rights not specifically and expressly granted under the License are 

reserved by UPACE.

The Application is licensed, not sold. The License confers no title to or ownership in the 

Application and should not be construed as a sale of any rights in or to the Application. UPACE 

may terminate, change, suspend, or discontinue any aspect of the Application, including the 

availability of any features of the Application, at any time and in UPACE's sole discretion.

COMPLIANCE WITH LAWS

You agree to comply with all laws, rules and regulations applicable to your use of the 

Application. 

TRADEMARKS

"UPACE Marks" means all trademarks, service marks and other commercial symbols used 

in connection with UPACE's or its affiliates' business. All UPACE Marks are the exclusive 

property of UPACE, its affiliates or third-party licensors. This Agreement does not authorize you 

to use any UPACE Mark, and you agree not to use any UPACE Mark in any manner without 

the prior written consent of UPACE, which consent may be withheld in the sole discretion 

of UPACE. Unauthorized use of any UPACE Mark may be a violation of federal and state 

trademark laws.

COPYRIGHT

The Application is protected by U.S. copyright laws and international treaties. All materials 

contained in the Application are the copyrighted property of UPACE or its affiliates or third-
party licensors. Except for your informational, personal, non-commercial use as authorized 

above, you may not use, modify, reproduce, distribute, transmit, republish or display the content, 

design or layout of the Application, or any components thereof, without the express written 

permission of UPACE.

LINKS TO THIRD PARTY WEBSITES

The Application may contain links to other websites that provide services related to the 

Application (such as payment processing services and university information) or that you 

may find useful and informative. Also, the Application may utilize social networking sites. 

These other websites are not under the control of UPACE, and you acknowledge and agree that 

UPACE is not responsible for the accuracy, copyright compliance, legality, decency, or any 

other aspect of such websites. The inclusion of such a link does not imply endorsement of the 

website by UPACE or any association with its operators, and UPACE disclaims all liability with 

respect to such linked websites, including but not limited to your access to and/or use of the 

same.

THIRD PARTY SERVICE PROVIDERS

In addition, the Application may use third party authorized service providers to provide UPACE 

with services related to your use of the Application, including payment processing services, 

if any, and facility information. By downloading, installing and using the Application, you 

acknowledge and agree that any reservations, purchases or other arrangements you make 

through the Application, and any interactions you have with any such authorized providers of 

the Application's operation and functionality, will be subject to and treated in accordance with 

the terms of use and privacy policies of such authorized service providers, which policies may 

be available to you by such third parties. UPACE strongly urges you to review all such policies 

before making any reservations, purchases or other arrangements through the Application or 

otherwise interacting with a third party service provider. UPACE disclaims any and all liability 

relating to third party service providers and their services.

YOUR PROVISION OF PERSONAL INFORMATION TO UPACE

When you provide information about yourself to UPACE, you agree to: (a) provide accurate, 

current, and complete information about yourself; and (b) maintain and promptly update such 

information to keep it accurate, current and complete. If you provide any information that 

is untrue, inaccurate, or incomplete, or UPACE has reasonable grounds to suspect that such 

information is untrue, inaccurate, or incomplete, UPACE has the right to suspend or terminate 

any account you establish in connection with your use of the Application and refuse any and all 

current or future use of the Application or any portion thereof.

USER CONTENT ON THE APPLICATION 

You understand that all information, data, or other materials that are posted on or transmitted 

in connection with the Application by you or another user ("User Content") are the sole 

responsibility of the person from whom such User Content originated. This means that you, 

and not UPACE, are responsible for all User Content that you upload, post, email, transmit or 

otherwise make available in connection with the Application. UPACE does not control the User 

Content posted and, as such, does not guarantee the accuracy, integrity or quality of such User 

Content. You understand that by using the Application, you may be exposed to User Content that 

is inaccurate, disingenuous, offensive, indecent or objectionable. Under no circumstances will 

UPACE be liable in any way for any User Content, including, but not limited to, for any errors or 

omissions in any User Content, or for any loss or damage of any kind incurred as a result of the 

use of any User Content posted, emailed, transmitted or otherwise made available in connection 

with the Application.

YOUR CONDUCT

In connection with your use of the Application, you agree not to:

1. Upload, download, copy, post, email, transmit or otherwise make available any User 

Content that is unlawful, harmful, threatening, abusive, harassing, tortuous, defamatory, 

vulgar, obscene, libelous, invasive of another's privacy, hateful, or racially, ethnically or 

otherwise objectionable; or harms minors in any way;

2. Impersonate any person or entity, or falsely state or otherwise misrepresent your 

affiliation with a person or entity;

3. Forge headers or otherwise manipulate identifiers in order to disguise the origin of any 

User Content transmitted in connection with the Application;

4. Upload, download, copy, post, email, transmit or otherwise make available any 

User Content that you do not have a right to make available under any law or under 

contractual or fiduciary relationships (such as inside information, or proprietary and 

confidential information learned or disclosed as part of employment relationships or 

under nondisclosure agreements);

5. Upload, download, copy, post, email, transmit or otherwise make available any User 

Content that infringes any patent, trademark, trade secret, copyright, right of publicity, or 

other proprietary right of any party;

6. Upload, download, copy, post, email, transmit or otherwise make available 

any unsolicited or unauthorized advertising, promotional materials, "junk 

mail," "spam," "chain letters," "pyramid schemes," or any other form of solicitation;

7. Upload, download, copy, post, email, transmit or otherwise make available any material 

that contains software viruses or any other computer code, files or programs designed 

to interrupt, destroy or limit the functionality of any computer software or hardware or 

telecommunications equipment;

8. Interfere with or disrupt the operation of the Application or servers or networks 

connected to the Application, or disobey any requirements, procedures, policies or 

regulations of networks connected to the Application; or 

9. Collect, copy, transmit, or store personal data about other users.

Although UPACE does not pre-screen User Content, UPACE has the right, but not the 

obligation, to delete or move any User Content for any reason. Without limiting the foregoing, 

UPACE has the right to remove any User Content that violates this Agreement.

YOUR GRANT OF LIMITED LICENSE

By posting or submitting User Content to the Application, you grant UPACE and its affiliates the 

right to use, reproduce, display, perform, adapt, modify, distribute, have distributed, and promote 

the User Content in any form, anywhere and for any purpose, subject to UPACE's Privacy 

Policy. You represent and warrant that you own or otherwise control all rights in and to any such 

User Content, and that public posting and use of your User Content by UPACE will not infringe 

or violate the rights of any third party.

REGISTRATION AND PASSWORDS

The Application may permit or require you to register or obtain a password prior to permitting 

access to certain products or services available through the Application. You acknowledge and 

agree that you are responsible for maintaining the confidentiality of your registration information 

and password, and for all uses of your password.

DISCLAIMER OF WARRANTIES

THE APPLICATION AND ALL MATERIALS, INFORMATION, SOFTWARE, PRODUCTS, 

AND SERVICES INCLUDED IN OR AVAILABLE THROUGH THE APPLICATION ARE 

PROVIDED "AS IS" AND "AS AVAILABLE" FOR YOUR USE. THE APPLICATION 

AND ALL MATERIALS, INFORMATION, SOFTWARE, PRODUCTS, AND SERVICES 

INCLUDED IN OR AVAILABLE THROUGH THE APPLICATION ARE PROVIDED 

WITHOUT WARRANTY OF ANY KIND, EITHER EXPRESS OR IMPLIED, INCLUDING, 

BUT NOT LIMITED TO, IMPLIED WARRANTIES OF MERCHANTABILITY, 

FITNESS FOR A PARTICULAR PURPOSE, OR NONINFRINGEMENT. UPACE AND 

ITS AFFILIATES DO NOT WARRANT THAT THE MATERIALS, INFORMATION, 

SOFTWARE, PRODUCTS, AND SERVICES INCLUDED IN OR AVAILABLE 

THROUGH THE APPLICATION ARE ACCURATE, RELIABLE OR CORRECT; 

THAT THE APPLICATION WILL BE AVAILABLE AT ANY PARTICULAR TIME OR 

LOCATION; THAT ANY DEFECTS OR ERRORS WILL BE CORRECTED; OR THAT 

THE APPLICATION IS FREE OF VIRUSES OR OTHER HARMFUL COMPONENTS. 

YOUR USE OF THE APPLICATION IS AT YOUR SOLE RISK. BECAUSE SOME 

JURISDICTIONS DO NOT PERMIT THE EXCLUSION OF CERTAIN WARRANTIES, 

THESE EXCLUSIONS MAY NOT APPLY TO YOU.

LIMITATION OF LIABILITY

UNDER NO CIRCUMSTANCES SHALL UPACE OR ITS AFFILIATES BE LIABLE FOR 

ANY DIRECT, INDIRECT, PUNITIVE, INCIDENTAL, SPECIAL, OR CONSEQUENTIAL 

DAMAGES ARISING OUT OF OR IN ANY WAY CONNECTED WITH THE USE OF, 

OR INABILITY TO USE, THE APPLICATION. THIS LIMITATION APPLIES WHETHER 

THE ALLEGED LIABILITY IS BASED ON CONTRACT, TORT, NEGLIGENCE, STRICT 

LIABILITY, OR OTHER LEGAL THEORY, EVEN IF UPACE HAS BEEN ADVISED 

OF THE POSSIBILITY OF SUCH DAMAGES. IN THE EVENT SOME JURISDICTIONS 

DO NOT ALLOW THE EXCLUSION OR LIMITATION OF INCIDENTAL OR 

CONSEQUENTIAL DAMAGES, UPACE'S LIABILITY IN SUCH JURISDICTIONS SHALL 

BE LIMITED TO THE EXTENT PERMITTED BY LAW. TO THE EXTENT, IF ANY, THAT 

YOU MAKE ANY CLAIM WITH REGARD TO THE APPLICATION OR YOUR USE OF 

THE APPLICATION, SUCH CLAIM SHALL BE MADE AGAINST UPACE AND NOT 

AGAINST APPLE.

No Medical Advice.

UPACE DOES NOT MAKE ANY REPRESENTATIONS OR WARRANTIES REGARDING 

THE INFORMATION OR MATERIALS PRESENTED ON THIS APPLICATION. THE 

APPLICATION SHOULD NOT BE RELIED UPON OR SUBSTITUTED FOR MEDICAL 

ADVICE, TREATMENT OR DIAGNOSIS. PLEASE CONSULT YOUR PHYSICIAN 

BEFORE USING OR BEGINNING ANY EXERCISE PROGRAM OR TECHNIQUE. UPACE 

DOES NOT ADVISE THAT YOU SHOULD UNDERTAKE ANY PARTICULAR EXERCISE 

OR UTILIZE ANY PARTICULAR FACILITY PRESENTED ON THIS APPLICATION. 

UPACE SHALL NOT BE LIABLE AND YOU AGREE NOT TO HOLD UPACE LIABLE 

FOR ANY INJURY, HOWEVER CAUSED AND IN WHATEVER FORM, RELATED TO 

USE OF THE APPLICATION OR ANY FACILITY.

RELIANCE ON ANY INFORMATION OR MATERIALS PRESENTED ON THIS 

APPLICATION IS SOLELY AT YOUR OWN RISK. YOU UNDERSTAND, 

ACKNOWLEDGE, AND AGREE THAT UPACE SHALL NOT BE LIABLE FOR ANY 

CLAIMS FOR INJURY, LOSS OR DAMAGES ARISING OUT OF OR CONNECTED WITH 

YOUR USE OF ANY FACILITY.

YOU UNDERSTAND, ACKNOWLEDGE, AND AGREE THAT UPACE SHALL NOT BE 

LIABLE FOR ANY CLAIMS FOR INJURY, LOSS OR DAMAGES ARISING OUT OF OR 

RELATED TO YOUR USE OF THE APPLICATION AND/OR FACILITY INCLUDING, 

WITHOUT LIMITATION, TO DIRECT, COMPENSATORY, INDIRECT, SPECIAL, 

INCIDENTAL, CONSEQUENTIAL OR PUNITIVE DAMAGES. THE NEGATION AND 

LIMITATION OF DAMAGES SET FORTH IN THIS AGREEMENT ARE FUNDAMENTAL 

ELEMENTS OF THE BASIS OF THE BARGAIN BETWEEN UPACE AND YOU. THIS 

SITE AND THE CONTENT THEREIN WOULD NOT BE PROVIDED WITHOUT SUCH 

LIMITATIONS. NO ADVICE OR INFORMATION, WHETHER ORAL OR WRITTEN, 

OBTAINED BY YOU FROM US THROUGH THE SITE OR OTHERWISE SHALL CREATE 

ANY WARRANTY, REPRESENTATION OR GUARANTEE NOT EXPRESSLY STATED IN 

THIS AGREEMENT. 

YOU UNDERSTAND, ACKNOWLEDGE, AND AGREE THAT UPACE AND AFFILIATED 

PARTIES SHALL NOT BE LIABLE FOR ANY LOSS, INJURY, CLAIM, OR DAMAGE OF 

ANY KIND RESULTING IN ANY WAY FROM (A) ANY ERRORS IN OR OMISSIONS 

FROM THE SITE OR ANY SERVICES OR PRODUCTS OBTAINABLE THEREFROM, 

(B) THE UNAVAILABILITY OR INTERRUPTION OF THE APPLICATION AND/OR 

FACILITY OR ANY FEATURES THEREOF, (C) YOUR USE OF THE SITE AND/OR 

ACCOUNT INFORMATION INCLUDING USER/LOG IN NAME AND PASSWORD, (D) 

THE CONTENT CONTAINED ON THE SITE, OR (E) ANY DELAY OR FAILURE IN 

PERFORMANCE BEYOND THE CONTROL OF A COVERED PARTY. 

INDEMNIFICATION

You agree to defend, indemnify and hold harmless UPACE, its affiliates, and their respective 

employees, contractors, agents, officers, and directors from all liabilities, claims, and expenses 

(including reasonable attorneys' fees) that arise out of or are related to any User Content 

you submit, post, transmit or make available through the Application, your violation of this 

Agreement, or your violation of any third party rights.

CHOICE OF LAW AND JURISDICTION

This Agreement shall be governed by the laws of the State of Florida without regard to the 

conflicts of laws rules of any jurisdiction. Every dispute concerning the interpretation or effect of 

this Agreement and/or your use of the Application must be resolved in the state or federal courts 

situated in the State of Florida. You agree to the personal jurisdiction, subject matter jurisdiction, 

and venue of these courts.

EQUITABLE RELIEF

You acknowledge that any breach or threatened breach of this Agreement will result in 

irreparable harm for which damages would not be an adequate remedy, and, therefore, in 

addition to its rights and remedies otherwise available at law, UPACE shall be entitled to seek 

immediate equitable relief, including injunctive relief, as appropriate. If UPACE seeks any 

equitable remedies, it shall not be precluded or prevented from seeking remedies at law, nor shall 

it be deemed to have made an election of remedies.

ATTORNEYS' FEES

In addition to any other relief, the prevailing party in any action arising out of this Agreement 

shall be entitled to actual and reasonable attorneys' fees and costs.

SEVERABILITY

If any provision of this Agreement is held unenforceable or invalid under any applicable law 

or is so held by applicable court decision, such unenforceability or invalidity will not render 

this Agreement unenforceable or invalid as a whole, and such provision will be changed and 

interpreted so as to best accomplish the objectives of such unenforceable or invalid provision 

within the limits of applicable law or the applicable court decisions.

WAIVER

Any waiver by UPACE of a breach of any provision of this Agreement shall not operate as or 

be construed to be a waiver of any other breach of such provision or of any breach of any other 

provision of this Agreement. Any waiver must be in writing. Failure by UPACE to insist upon 

strict adherence to any term of this Agreement on one or more occasions shall not be considered 

a waiver or deprive UPACE of the right to insist upon strict adherence to that term or any other 

term of this Agreement.

TERMINATION

UPACE reserves the right, in its sole discretion, to terminate your access to all or part of the 

Application, with or without notice, for any reason or no reason, including without limitation 

your violation of this Agreement.

QUESTIONS

If you have any questions about this Agreement, you can contact us at the following email 

address: info@upaceapp.com and cc: Brian Harrison, Esquire at contactbrianharrison@gmail.com

Mobile Application Privacy Policy

ATTOLLO TECHNOLOGY LLC, D/B/A UPACE ("UPACE," "we," "our" or "us") has 

created this statement to describe its information gathering and privacy practices related to 

your use of the mobile application offered as "UPACE" ("Application"). We are sensitive to 

the private nature of information you provide to us over the Internet and through your use of 

the Application. This mobile application privacy policy ("Mobile Privacy Policy") is designed 

to maximize your ability to protect your personal information, while at the same time permit 

us to provide you the opportunity to obtain interesting and useful information, products and 

services. Because this Mobile Privacy Policy applies to any person who downloads, installs, or 

uses the Application, we strongly urge you to review this Mobile Privacy Policy in its entirety. 

By downloading, installing, or using the Application, you accept and agree to be bound by this 

Mobile Privacy Policy and any other applicable terms, and you consent to the processing of your 

information as set forth in this Mobile Privacy Policy.

OUR COLLECTION OF YOUR INFORMATION

We or our authorized service providers may collect and store some or all of the following 

information, in order to enable you to use the Application and receive information, products, 

or services available through the Application, and to permit us to respond to your inquiries or 

requests for products and services:

• Device Information and Usage Information

• Geolocation

1. Device Information

The Application may collect certain information automatically when you download, connect to 

or use the Application. Such information may include the type of mobile device you use, your 

mobile device's unique device identifier, the IP address of your mobile device, and information 

about the way you use the Application. UPACE and/or its authorized service providers may 

receive such information and use it to operate and improve the Application and to deliver 

services and content, including push notifications. We obtain your consent before delivering 

push notifications to you through the Application. Information about how you interact with the 

Application and any of our web sites to which the Application links, such as how many times 

you use a specific part of the mobile application over a given time period, the amount of time 

you spend using the Application, how often you use the Application, actions you take in the 

Application and how you engage with the Application.

2. Geolocation

We obtain your consent before collecting location information. Location information enables 

the Application to establish the approximate location of your mobile device. UPACE and/

or its authorized service providers may use and store this information, in combination with 

other location-based information (such as IP address), to provide requested location services 

(e.g., identification of nearby theatres) and to deliver enhanced location based services and 

other content, including push notifications. You may withdraw your consent at any time to 

the collection of your location information and/or to receive push notifications (see "Opt-Out 

Procedures" below).

In addition, we also collect the following to provide the services:

 -Name

-Email

-Phone number

-University

-Member type 

-Occupancy 

-Password

-Equipment reservations 

-Class reservations

-Feedback, if provided 

-Usage information

Information Collected from Job Applicants

If you wish to apply for a job on our web site(s), we will collect Personal Information such as 

your name, email address, phone number and may collect additional information such as resume, 

gender, and your ethnicity. We use the information collected within this area of the web site(s) to 

determine your qualifications for the position in which you have applied and to contact you to set 

up an interview.

OUR USE OF YOUR INFORMATION

As a general matter, we seek to use information collected through the Application to enhance 

the experience of users of our services. We (including our affiliates and authorized service 

providers) may use this information in a number of ways, including:

• To furnish you with products or services you have requested, or to send you information 

or otherwise contact you about UPACE, or its affiliates, their products, services, 

advertising, upcoming events, special offers or promotions, text messages, or for other 

purposes disclosed when you submit your information by using the Application. 

• To assist us in marketing and advertising our products and services and those of other 

businesses. 

• To improve the content and functionality of the Application. 

• To prevent and detect fraud, infringement, and other potential misuse of the Application. 

• In order to provide you with products and services you have requested, we may share 

your information, including personally identifiable information or information we 

maintain on an aggregate basis, with third parties who provide services to UPACE and 

its affiliates, such as credit card processing, customer services, order fulfillment, and/or 

prize delivery, as applicable. 

• To create aggregated and anonymized information to determine which Mobile 

Application features are most popular and useful to users, and for other statistical 

analyses.

• To prevent, discover and investigate violations of this Privacy Policy 

• To customize the content or services on the Application for you, or the communications 

sent to you through the Application

TEXT MESSAGING

By opting in to receive text messages, you agree that UPACE may send you marketing text 

or e-mail messages at that telephone number using an automatic telephone dialing system. 

These messages may include Short Message Service ("SMS") messages. 

CHILDREN'S GUIDELINES

UPACE does not specifically target the Application or any of its mobile services to children 

under 18 years old. If you are under the age of 18 and a registered college student, you may use 

the Application only with the permission and under the supervision of a parent or guardian. If a 

parent or guardian becomes aware that his or her child has provided us with information without 

their consent, he or she should contact us.

Please note that the Application may contain links to content providers that collect information 

from children under the age of 18. We have no control over such content providers and are not 

responsible for the privacy practices or the content of other web sites or mobile applications. 

Because the Internet and mobile applications offer open access to a wide range of information, 

it is important that parents supervise and prevent access to inappropriate content, email or chat 

sessions. 

TRACKING, DISCLOSURE AND SHARING OF INFORMATION

We may disclose your Device and Physical Location:

• As provided in this Mobile Privacy Policy; 

• As required by law, such as to comply with a subpoena, or similar legal process; 

• When we believe in good faith that disclosure is necessary to protect our rights, protect 

your safety or the safety of others, investigate fraud or respond to a government request; 

• With our authorized service providers who have agreed to adhere to the rules set forth in 

this Mobile Privacy Policy; 

• If UPACE is involved in a merger, acquisition or sale of all or a portion of its assets 

We do not share information with third parties for their direct marketing purposes unless you 

affirmatively agree to such disclosure - typically by opting in to receive information from a third 

party that is participating in a sweepstakes or other promotion that we advertise through the 

Application or on one of our web sites. If you do not want your information to be used by a third 

party for direct marketing purposes (or other purposes unrelated to the uses described herein), do 

not opt in to such use by that third party. Please note that if you opt in to receive direct marketing 

from a third party, your information will be subject to that party's privacy policy. If you later 

decide that you do not want that third party to use your information, you will need to contact that 

third party directly. We recommend that you review the privacy policy of any party that collects 

your information to determine how that entity will handle your information.

The Application may use third party authorized service providers to provide us with analytical 

data about your use of the Application. We may deploy devices, such as cookies, that enable 

those third parties to anonymously collect and aggregate usage data and report it back to 

us. Third parties that we engage to provide analytics services and to assist in providing the 

Application's tools and services cannot use your personal information for their own purposes, 

unrelated to the Application, without your explicit consent 

THIRD-PARTY SITES

The Application contains links to web sites and other applications that provide services related 

to the Application (such as payment processing services and university information websites) 

or that we believe you might find useful and informative. Also, the Application may utilize 

social networking sites that are not owned or controlled by UPACE. Please be aware, however, 

that UPACE does not endorse or recommend the content or services of such web sites or 

applications, and UPACE is not responsible for the privacy practices or the content of these other 

sites. We encourage you to review the privacy policies of each web site and application you visit 

and use. 

SECURITY

UPACE will maintain appropriate safeguards to protect against the loss, misuse, and alteration 

of any customer information under UPACE's control. Please be aware that the transmission 

of information over wireless and wired networks is not inherently secure, and, although we 

endeavor to provide reasonable security measures, no security systems can prevent all potential 

security breaches. 

OPT-OUT PROCEDURES

You can stop all collection of information by the Application by uninstalling the Application 

from your mobile device. You may use the standard uninstall processes as may be available as 

part of your mobile device or via the mobile application marketplace or network.

You can also withdraw your consent to receive "push" notifications and/or to the collection of 

your physical location information at any time by disabling or changing the related functionality 

or setting as provided in your mobile device. 

POLICY MODIFICATIONS

We reserve the right to change the terms of this Mobile Privacy Policy from time to time

					  </div>
					  <div class="modal-footer">
						<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
						
					  </div>
					</div><!-- /.modal-content -->
					</div><!-- /.modal-dialog -->
				</div>
				<div class="modal fade" id="privacy">
					<div class="modal-dialog">
					<div class="modal-content">
					  <div class="modal-header">
						<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
						<h4 class="modal-title">Privacy statement</h4>
					  </div>
					  <div class="modal-body">
						<p>One fine body&hellip;</p>
					  </div>
					  <div class="modal-footer">
						<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
						
					  </div>
					</div><!-- /.modal-content -->
					</div><!-- /.modal-dialog -->
				</div>
				<!--<div class="row">
				
					<div class="col-sm-12">
				
				
							<div class="well well-sm">
				
								<div class="row">
				
									<div class="col-sm-12 col-md-12">
										<div class="well well-light well-sm no-margin no-padding">
				
											<div class="row">
				
												<div class="col-sm-12">
													<div id="myCarousel" class="carousel fade profile-carousel">
														 
														
														
														<div class="carousel-inner">
															
														</div>
													</div>
												</div>
				
												<div class="col-sm-12">
				
													<div class="row">
				
														
														<div class="col-sm-6" style="padding:26px;">
															<h1 id="Name">
															<br>info@upaceapp.com
															<small id="Title"><a href="mailto:info@upaceapp.com" class="btn btn-default btn-xs"><i class="fa fa-envelope-o"></i> Send Message</a> </small></h1>
				
															
															<p class="font-md">
																<i></i>
															</p>
															<p id="Description">
				Please feel free to reach out to us via email with any questions or concerns, thank you.
																
				
															</p>
															
					
														</div>
														
															
															
								


														</div>
				
													</div>
				
												</div>
				
											</div>

										</div>
				
									</div>

								</div>
				
							</div>
				
				
					
				
				</div>-->
				
				<!-- end row -->
<!-- end widget grid -->




			</div>
			<!-- END MAIN CONTENT -->

		</div>
		<!-- END MAIN PANEL -->

		<!-- SHORTCUT AREA : With large tiles (activated via clicking user name tag)
		Note: These tiles are completely responsive,
		you can add as many as you like
		-->
		<?php
		require_once('include/los-shortcut.php');
		require_once('include/functions.php');
		?>
		<!-- END SHORTCUT AREA -->

		<!--================================================== -->

		<!-- PACE LOADER - turn this on if you want ajax loading to show (caution: uses lots of memory on iDevices)-->
		<?php require_once('include/footer.php');?>
                
		<script type="text/javascript">
		//Get University Details
                
                
		// DO NOT REMOVE : GLOBAL FUNCTIONS!
		
		$(document).ready(function() {
			
			pageSetUp();
			var validateError = 0;
					
			var $registerForm = $("#smart-form-register").validate({
	
				// Rules for form validation
				rules : {
					name : {
						required : true
					},
					capacity : {
						required : true
					},
					hourOfOperation : {
						required : true,
					},
					closeDate : {
						required : true,
					},
					phone : {
						required : true,
					},
					locationId : {
						required : true,
					}
				},
	
				// Messages for form validation
				messages : {
					
					name : {
						required : 'Please enter Gym Name'
					},
					capacity : {
						required : 'Please enter Max Occupancy of gym'
					},
					hourOfOperation : {
						required : 'Please enter Hours of operation',
					},
					closeDate : {
						required : 'Please enter the Dates the gym will be closed ',
					},
					phone : {
						required : 'Please enter Phone number',
					},
					locationId : {
						required : 'Please select Location',
					}
					
				},
				
				invalidHandler: function(event, validator) {
				    // 'this' refers to the form
				    var errors = validator.numberOfInvalids();
				    if(errors)
					{
						validateError = 1;
					}
					else{
						validateError = 0;
						
					}
				  },
	
				// Do not change code below
				errorPlacement : function(error, element) {
					error.insertAfter(element.parent());
					
						
				}
				
				
				
				
			});
			
			$('#typeChange').click(function() {
			   
				document.getElementById('typeChange').style.pointerEvents = 'none';
		    		document.getElementById('typeChange').style.opacity = '0.50';
				updateStaffType($('#type').val(),"<?php echo $_GET['lid']?>");
				
						
			   
		    });
	
			
			

		
		})

		</script>

		<!-- Your GOOGLE ANALYTICS CODE Below -->
		<script type="text/javascript">
			var _gaq = _gaq || [];
				_gaq.push(['_setAccount', 'UA-XXXXXXXX-X']);
				_gaq.push(['_trackPageview']);
			
			(function() {
				var ga = document.createElement('script');
				ga.type = 'text/javascript';
				ga.async = true;
				ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
				var s = document.getElementsByTagName('script')[0];
				s.parentNode.insertBefore(ga, s);
			})();

		</script>

	</body>

</html>
