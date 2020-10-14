<?php
// This file is part of the WET-BOEW-Moodle (defaults) for Moodle - http://moodle.org/
//
// WET-BOEW-Moodle (defaults) is free software: you can redistribute it and/or modify
// it under the terms of the GNU General Public License as published by
// the Free Software Foundation, either version 3 of the License, or
// (at your option) any later version.
//
// WET-BOEW-Moodle (defaults) is distributed in the hope that it will be useful,
// but WITHOUT ANY WARRANTY; without even the implied warranty of
// MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
// GNU General Public License for more details.
//
// You should have received a copy of the GNU General Public License
// along with Moodle.  If not, see <http://www.gnu.org/licenses/>.

/**
 * Default settings for WET-BOEW-Moodle based site.
 *
 * @package   gcweb_defaults
 * @copyright 2016-2020 TNG Consulting Inc.
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

// This line protects the file from being accessed by a URL directly.
defined('MOODLE_INTERNAL') || die();

if (is_major_upgrade_required()) {

    echo 'Applying custom defaults to Moodle...<br>' . PHP_EOL;

    // Multi-Language (v2) and FilterCodes filters.
    $filterlist = ['multilang2', 'filtercodes'];

    // GCWeb theme.
    $themename = 'gcweb';

    // French, French Canadian - TODO (for eval?): Install French inclusive and French Workplace language packs.
    $pack = ['fr', 'fr_ca']; //, 'fr_incl', 'fr_wp'];
    $custommenu = '
{fa fa-home} {getstring}home{/getstring}|/?redirect=0
{fa fa-th} {mlang en}Course catalogue{mlang}{mlang fr}Répertoire des cours{mlang}
{categories0menu}
    -###
    -{getstring}fulllistofcourses{/getstring}|/course/
{ifloggedin}
{fa fa-tachometer} {getstring}myhome{/getstring}|/my/
{fa fa-graduation-cap} {getstring}mycourses{/getstring}
{mycoursesmenu}
{/ifloggedin}
{fa fa-question} {getstring}help{/getstring}|/mod/page/view.php?id=97
{ifminteacher}
{fa fa-wrench} {getstring}admin{/getstring}
{/ifminteacher}
{ifmincreator}
-{getstring}administrationsite{/getstring}|/admin/search.php
-{toggleeditingmenu}
-###
{/ifmincreator}
{ifminmanager}
-{getstring}user{/getstring}: {mlang en}Management{mlang}{mlang fr}Gestion{mlang}|/admin/user.php
{ifadmin}
-{getstring}user{/getstring}: {getstring:mnet}profilefields{/getstring}|/user/profile/index.php
-###
{/ifadmin}
-{getstring}course{/getstring}: {mlang en}Management{mlang}{mlang fr}Gestion{mlang}|/course/management.php
-{getstring}course{/getstring}: {getstring}createnew{/getstring}|/course/edit.php?category={categoryid}&returnto=topcat
{/ifminmanager}
{ifminteacher}
-{getstring}course{/getstring}: {getstring}restore{/getstring}|/backup/restorefile.php?contextid={coursecontextid}
{ifincourse}
-{getstring}course{/getstring}: {getstring}backup{/getstring}|/backup/backup.php?id={courseid}
-{getstring}course{/getstring}: {getstring}participants{/getstring}|/user/index.php?id={courseid}
-{getstring}course{/getstring}: {getstring:badges}badges{/getstring}|/badges/index.php?type={courseid}
-{getstring}course{/getstring}: {getstring}reset{/getstring}|/course/reset.php?id={courseid}
-Course: Layoutit|https://www.layoutit.com/build" target="popup" onclick="window.open(\'https://www.layoutit.com/build\',\'popup\',\'width=1340,height=700\'); return false;|Bootstrap Page Builder
{/ifincourse}
{/ifminteacher}
{ifminmanager}
-###
-{getstring}site{/getstring}: System reports|/admin/category.php?category=reports
{/ifminmanager}
{ifadmin}
-{getstring}site{/getstring}: {getstring:admin}additionalhtml{/getstring}|/admin/settings.php?section=additionalhtml
-{getstring}site{/getstring}: {getstring:admin}frontpage{/getstring}|/admin/settings.php?section=frontpagesettings|Including site name
-{getstring}site{/getstring}: {getstring:admin}plugins{/getstring}|/admin/plugins.php
-{getstring}site{/getstring}: {getstring:admin}supportcontact{/getstring}|/admin/settings.php?section=supportcontact
-{getstring}site{/getstring}: {getstring:admin}themesettings{/getstring}|/admin/settings.php?section=themesettings|Including custom menus, designer mode, theme in URL
-{getstring}site{/getstring}: {mlang en}WET-BOEW Theme (GCWeb){mlang}{mlang fr}Theme de la WET-BOEW (GCWeb){mlang}|/admin/settings.php?section=themesettinggcweb
-{getstring}site{/getstring}: {getstring}notifications{/getstring} ({getstring}admin{/getstring})|/admin/index.php
{/ifadmin}
';

// Just the settings that are not DEFAULT.

    $defaults['moodle']['theme'] = 'gcweb';
    $defaults['moodle']['themelist'] = 'gcweb';
    $defaults['moodle']['country'] = 'CA';
    $defaults['moodle']['usecomments'] = '0';
    $defaults['moodle']['usetags'] = '1';
    $defaults['moodle']['messaging'] = '0';
    $defaults['moodle']['enableblogs'] = '0';
    $defaults['moodle']['timezone'] = 'America/Toronto';
    $defaults['moodle']['autolang'] = '1';
    $defaults['moodle']['lang'] = 'en';
    $defaults['moodle']['langlist'] = 'en,fr_ca';
    $defaults['moodle']['langmenu'] = '1';
    // Install Language Packs
    // Customize fr_ca/langconfig.php
    // Customize en/langconfig.php
    $defaults['moodle']['forceloginforprofileimage'] = '1';
    $defaults['moodle']['cronclionly'] = '0';
    $defaults['moodle']['cronremotepassword'] = $_ENV["CRON_PASSWORD"];
    $defaults['enrol_guest']['usepasswordpolicy'] = '1';
    $defaults['moodle']['displayloginfailures'] = '1';
    // Front page
    // Front page when logged in
    $defaults['moodle']['enablemobilewebservice'] = '0'; // Enable web services for mobile devices.
    $defaults['tool_mobile']['setuplink'] = ''; // App Download Page.
    $defaults['moodle']['defaultpreference_maildisplay'] = '0';
    // Custom User Profile Fields
    $defaults['moodle']['autologinguests'] = '1'; // Auto-login guests.
    $defaults['moodle']['hiddenuserfields'] = 'description,email,city,country,timezone,webpage,icqnumber,skypeid,yahooid,aimid,msnid,firstaccess,lastaccess,lastip,mycourses,groups,suspended'; // Hide user fields.

    // Privacy and Policy > Privacy Settings.
    $defaults['tool_dataprivacy']['contactdataprotectionofficer'] = '1'; // Contact the privacy officer.

    // Courses > Course Default Settings.
    $defaults['moodlecourse']['visible'] = '0'; // Visible: Hide.
    $defaults['moodlecourse']['hiddensections'] = '1'; // Hidden sections are completely invisible.
    $defaults['moodlecourse']['courseenddateenabled'] = '0'; // Course end date enaabled by default.
    $defaults['moodlecourse']['showgrades'] = '0'; // Show gradebook to students: No.
    
    // Courses > Course Request.
    // TODO If not already done, rename Miscellaneous category to Unpublished and make it hidden.
    
    // Authentication.
    // TODO: Locked user fields.
    $defaults['moodle']['authloginviaemail'] = '1'; // Allow log in via email.
    $defaults['moodle']['guestloginbutton'] = '1'; // Guest login button.
    // Enrolments > Guest access
    $defaults['enrol_guest | defaultenrol'] = '0'; // Add instance to new course.
    $defaults['enrol_guest | sendcoursewelcomemessage'] = '3'; // Send course welcome message from the no-reply address.
    // TODO: Install Multi-Language Content (v2): On, Content and Headings
    // TODO: FilterCodes: On, Content and Headings
    // Logging.
    $defaults['backup']['loglifetime'] = '60';
    
    // Media Players > VideoJS player.
    $defaults['media_videojs']['videoextensions'] = 'html_video,.mp4,.webm';
    $defaults['media_videojs']['audioextensions'] = 'html_audio,.mp3,.ogg';
    $defaults['media_videojs']['useflash'] = '0';
    $defaults['moodle']['media_default_height'] = '480'; // Defa
    $defaults['moodle']['media_default_width'] = '640';
    $defaults['moodle']['media_plugins_sortorder'] = 'videojs,youtube';
    
    // Questions > Manage Question Types
    // TODO: Disable Drag and Drop into text.
    // TODO: Disable Drag and Drop markers.
    // TODO: Disable Drag and Drop onto image.
    
    // Appearance > Calendar
    $defaults['moodle']['calendar_startwday'] = '0'; // Start of week: Sunday.
    // Apperance > Navigation
    $defaults['moodle']['defaulthomepage'] = '0';  // Default home page: 0=Site, 1=My home, 2=User preference
    $defaults['moodle']['allowguestmymoodle'] = '0'; // Allow guest access to dashboard: No.
    $defaults['moodle']['navshowfrontpagemods'] = '0'; // Show front page activities in the navigation.
    // Appearance > Default Dashboard
    // TODO: Remove unwanted blocks if they exist.
    // Apperance > Theme Settings.
    $defaults['moodle']['allowuserblockhiding'] = '0';  // Disabled.
    $defaults['moodle']['custommenuitems'] = $custommenu; // Moodle custom menu.
    $defaults['moodle']['customusermenuitems'] = 'customusermenuitems'; // Moodle custom user menu items.
    // Appearance > Themes > GCWeb
    $defaults['theme_gcweb']['cardaspect'] = '0.5';
    $defaults['theme_gcweb']['cardbutton'] = 'btn-link';
    $defaults['theme_gcweb']['cardcategory'] = '1';
    $defaults['theme_gcweb']['cardcontacts'] = '1';
    $defaults['theme_gcweb']['cardcustomfields'] = '1';
    $defaults['theme_gcweb']['cardfooter'] = '0';
    $defaults['theme_gcweb']['cardheader'] = '0';
    $defaults['theme_gcweb']['cardimage'] = '1';
    $defaults['theme_gcweb']['cardprogress'] = '1';
    $defaults['theme_gcweb']['cardsummary'] = '0';
    $defaults['theme_gcweb']['confirmlogout'] = '0';
    $defaults['theme_gcweb']['courselistcolumns'] = '3';
    $defaults['theme_gcweb']['courselistlayout'] = '1';
    $defaults['theme_gcweb']['filtercoursesbylang'] = '0';
    $defaults['theme_gcweb']['filtercoursesbytag'] = '';
    $defaults['theme_gcweb']['footershowhomelink'] = '0';
    $defaults['theme_gcweb']['footershowlogininfo'] = '0';
    $defaults['theme_gcweb']['footershowmoodledocs'] = '1';
    $defaults['theme_gcweb']['footershowmoodlelogo'] = '0';
    $defaults['theme_gcweb']['footershowresetusertours'] = '0';
    $defaults['theme_gcweb']['footnote'] = '{mlang en}<li><a href="https://www.canada.ca/en/contact.html">Contact us</a></li><li><a href="https://www.canada.ca/en/transparency/terms.html">Terms and conditions</a></li><li><a href="https://www.canada.ca/en/transparency/privacy.html">Privacy</a></li>{mlang}{mlang fr}<li><a href="https://www.canada.ca/fr/contact.html">Contactez-nous</a></li><li><a href="https://www.canada.ca/fr/transparence/avis.html">Avis</a></li><li><a href="https://www.canada.ca/fr/transparence/confidentialite.html">Confidentialité</a></li>{mlang}';
    $defaults['theme_gcweb']['hideconditionallyhidden'] = '1';
    $defaults['theme_gcweb']['hidefrontpagelinkstopages'] = '1';
    $defaults['theme_gcweb']['hidelocallogin'] = '1';
    $defaults['theme_gcweb']['hometitle'] = '';
    $defaults['theme_gcweb']['init'] = '1';
    $defaults['theme_gcweb']['navdraweropen'] = '';
    $defaults['theme_gcweb']['prebreadcrumbs'] = '';
    $defaults['theme_gcweb']['problembuttonurl'] = 'https://learning-apprentissage.ised-isde.canada.ca/mod/page/view.php?id=100';
    $defaults['theme_gcweb']['scsspre'] = '';
    $defaults['theme_gcweb']['showaccountsettings'] = '1';
    $defaults['theme_gcweb']['showhomebreadcrumbs'] = '0';
    $defaults['theme_gcweb']['showhometitle'] = '0';
    $defaults['theme_gcweb']['shownavdrawer'] = '1';
    $defaults['theme_gcweb']['showproblem'] = '1';
    $defaults['theme_gcweb']['showprofileadditionalnames'] = '0';
    $defaults['theme_gcweb']['showprofileaddress'] = '0';
    $defaults['theme_gcweb']['showprofileaimid'] = '0';
    $defaults['theme_gcweb']['showprofilecity'] = '1';
    $defaults['theme_gcweb']['showprofilecountry'] = '1';
    $defaults['theme_gcweb']['showprofiledepartment'] = '0';
    $defaults['theme_gcweb']['showprofiledescription'] = '1';
    $defaults['theme_gcweb']['showprofileemaildisplay'] = '1';
    $defaults['theme_gcweb']['showprofileicqnumber'] = '0';
    $defaults['theme_gcweb']['showprofileidnumber'] = '0';
    $defaults['theme_gcweb']['showprofileinstitution'] = '0';
    $defaults['theme_gcweb']['showprofileinterests'] = '0';
    $defaults['theme_gcweb']['showprofilemsnid'] = '0';
    $defaults['theme_gcweb']['showprofileoptional'] = '0';
    $defaults['theme_gcweb']['showprofilephone1'] = '0';
    $defaults['theme_gcweb']['showprofilephone2'] = '0';
    $defaults['theme_gcweb']['showprofilepictureofuser'] = '0';
    $defaults['theme_gcweb']['showprofileskypeid'] = '0';
    $defaults['theme_gcweb']['showprofiletimezone'] = '1';
    $defaults['theme_gcweb']['showprofilewebpage'] = '0';
    $defaults['theme_gcweb']['showprofileyahooid'] = '0';
    $defaults['theme_gcweb']['showregister'] = '0';
    $defaults['theme_gcweb']['showsearch'] = '1';
    $defaults['theme_gcweb']['showshare'] = '0';
    $defaults['theme_gcweb']['showsignon'] = '1';
    $defaults['theme_gcweb']['showumlogoutlink'] = '0';
    $defaults['theme_gcweb']['showumprofilelink'] = '0';
    $defaults['theme_gcweb']['titlesitename'] = '1';
    $defaults['theme_gcweb']['wraprecentlyaccessedcourses'] = '1';
    $defaults['theme_gcweb']['scss'] = '
/* Styling for 3 action cards on home page. */
#page-site-index .action-blocks .card-action:hover{
 background-color: rgba(0,0,0,.03);
}
#page-site-index .action-blocks .card {
  margin-right: 10px;
  margin-left:10px;
}
#page-site-index .section .label  .contentwithoutlink { 
  padding-right: 0px !important;
}
/* end of styling of action cards on top of homepage */

/* New link boxes on Front Page */
.linkboxes {
border-radius: 5px !important;
margin:10px;
}
.linkboxes h3 {
margin-top:0px;
}
.linkboxes .well:hover {
background-color: #C0C0C0;
}
.linkboxes a, .linkbox a:link, .linkbox a:visited {
text-decoration: none;
color: #2572b4;
}
.linkboxes p {
font-size: 15px;
margin-bottom: 20px;
margin-top: 10px;
line-height: 15px;
}

/* Reduce padding on link boxes at top of home page. */
.linkbox .well {padding-left:10px;
}
/* Styling for category summaries on Category pages. */
div.category-banner {
    background: no-repeat right;
    background-size: cover;
    min-height: 150px;
    max-width: 1650px;
    box-sizing: border-box;
    box-shadow: inset 600px 0 50px 10px #FFF;
}
div.category-banner-summary {
  padding-left: 20px;
  max-width: 576px;
  height:150px;
  display: table-cell;
  vertical-align: middle;  
}
';
    
    // Server > System Paths
    $defaults['moodle']['pathtodu'] = '/usr/bin/du';
    $defaults['moodle']['pathtopython'] = '/usr/bin/python';
    // Server > Support Contact
    $defaults['moodle']['supportname'] = 'ISED-ISDE';
    $defaults['moodle']['supportemail'] = 'ic.cms-sgi.ic@canada.ca';
    // TODO: Support page URL will vary from one site to the next.
    // Server > Maintenance mode.
    $defaults['moodle']['maintenance_message'] = '<h2 lang="fr">Ce site est actuellement en maintenance et n\'est donc pas disponible présentement.</h2>';
    // TODO: Configure OAuth2 settings.
    // Server > Email > Outgoing mail configuration.
    $defaults['moodle']['smtphosts'] = trim($_ENV['SMTP_HOST']); // SMTP hosts.
    $defaults['moodle']['smtpsecure'] = trim(strtolower($_ENV['SMTP_SECURE'])); // SMTP security.
    $defaults['moodle']['smtpauthtype'] = 'LOGIN'; // SMTP Auth Type.
    $defaults['moodle']['smtpuser'] = trim($_ENV['SMTP_USER']); // SMTP username.
    $defaults['moodle']['smtppass'] = trim($_ENV['SMTP_PASSWORD']); // SMTP password.
    $defaults['moodle']['smtpmaxbulk'] = '2'; // SMTP session limit.
    $defaults['moodle']['noreplyaddress'] = 'donotreply-nepasrepondre@ised-isde.canada.ca'; // No-reply address.
    // Plugins > Filters > H5P
    $defaults['filter_displayh5p']['allowedsources'] = '';
    // Plugins > Filters > FilterCodes
    $defaults['filter_filtercodes']['disabled_customnav'] = '0';
    $defaults['filter_filtercodes']['enable_customnav'] = '0';
    $defaults['filter_filtercodes']['enable_scrape'] = '0';
    $defaults['filter_filtercodes']['escapebraces'] = '1';
    // Plugins > Local > Adminer
    $defaults['local_adminer']['startwithdb'] = '1';
    // Plugins > Local > Contact
    $defaults['local_contact']['loginrequired'] = '0';
    $defaults['local_contact']['nosubjectsitename'] = '0';
    $defaults['local_contact']['senderaddress'] = '';
    $defaults['format_singleactivity']['activitytype'] = 'page';

    // Server > Session Handling.
    $defaults['moodle']['sessiontimeout'] = '14400'; // Timeout: 4 hours.

    // Site Administrators
    // TODO: Set certain users as Site Administrator.

    // Permissions > Define Roles
    // TODO: See list of changes to default permissions
    // TODO: Create new role (Tester)

    // Create folder for backups.
    if (!is_dir($CFG->dataroot . '/mbackups')) {
        mkdir($CFG->dataroot . '/mbackups', $CFG->directorypermissions);
    }

    // Enable filters.
    require_once($CFG->libdir . "/filterlib.php");
    foreach ($filterlist as $key => $filtername) {
        if (is_dir($CFG->dirroot . '/filter/' . $filtername)) {
            filter_set_global_state($filtername, TEXTFILTER_ON, 1);
        } else {
            unset($filterlist[$key]);
        }
    }
    $defaults['moodle']['stringfilters'] = implode(',', $filterlist);

    // Set default theme.
    if (file_exists($CFG->dirroot . '/theme/' . $themename)) {
        // Set the default theme.
        // Load the theme to make sure it is valid.
        $theme = theme_config::load($themename);
        // Get the config argument for the chosen device.
        $themename = core_useragent::get_device_type_cfg_var_name('default');
        set_config($themename, $theme->name);
    }

    // Install language packs.
    get_string_manager()->reset_caches();
    $controller = new tool_langimport\controller();
    core_php_time_limit::raise();
    $controller->install_languagepacks($pack);
    get_string_manager()->reset_caches();

}
