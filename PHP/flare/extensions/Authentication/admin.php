<?php
/**
* @package Authentication
* @author Tim Rupp <tarupp01@indianatech.net>
* @copyright GPL
*/

/**
* Copyright (C) 2004-2005 Indiana Tech Open Source Committee
* Please direct all questions and comments to TARupp01@indianatech.net
*
* This program is free software; you can redistribute it and/or modify it under the terms of
* the GNU General Public License as published by the Free Software Foundation; either version
* 2 of the License, or (at your option) any later version.
*
* This program is distributed in the hope that it will be useful, but WITHOUT ANY WARRANTY;
* without even the implied warranty of MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.
* See the GNU General Public License for more details.
*
* You should have received a copy of the GNU General Public License along with this program;
* if not, write to the Free Software Foundation, Inc., 59 Temple Place - Suite 330, Boston,
* MA 02111-1307, USA.
*/

/**
* Prevent direct access to the file
*/
defined( '_FLARE_INC' ) or die( "You can't access this file directly." );

require_once(ABSPATH.'/extensions/Authentication/class.AuthenticationAdmin.php');
require_once(ABSPATH.'/extensions/Authentication/lang/lang-'.$cfg['language'].'.php');

$page = new AuthenticationAdmin();

$page->__set("db",$db);
$page->__set("tpl",$tpl);
$page->__set("log",$log);
$page->__set("cfg",$cfg);
$page->__set("ext",$ext);

switch ($flare_action) {
    case "do_save_settings":
        $visible 	= import_var('visible', 'P');

        $settings = array(
            'use_auth'		=> import_var('use_auth', 'P'),
            'auth_type'		=> import_var('auth_type', 'P'),
        );

        $page->do_save_settings($settings);
        $page->do_change_visibility($visible);
        break;
    case "show_settings":
    default:
        $page->show_settings();
        break;
}

?>
