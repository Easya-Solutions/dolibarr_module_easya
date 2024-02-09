<?php
/* Copyright (C) 2019      Open-DSI             <support@open-dsi.fr>
 *
 * This program is free software; you can redistribute it and/or modify
 * it under the terms of the GNU General Public License as published by
 * the Free Software Foundation; either version 3 of the License, or
 * (at your option) any later version.
 *
 * This program is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 * GNU General Public License for more details.
 *
 * You should have received a copy of the GNU General Public License
 * along with this program. If not, see <http://www.gnu.org/licenses/>.
 */


class ActionsEasya
{
    /**
     * @var DoliDB Database handler.
     */
    public $db;
    /**
     * @var string Error
     */
    public $error = '';
    /**
     * @var array Errors
     */
    public $errors = array();

    /**
     * @var array Hook results. Propagated to $hookmanager->resArray for later reuse
     */
    public $results = array();

    /**
     * @var string String displayed by executeHook() immediately after return
     */
    public $resprints;

    /**
     * Constructor
     *
     * @param        DoliDB $db Database handler
     */
    public function __construct($db)
    {
        $this->db = $db;
    }

    /**
     * Overloading the printTopRightMenu function : replacing the parent's function with the one below
     *
     * @param   array() $parameters Hook metadatas (context, etc...)
     * @param   CommonObject &$object The object to process (an invoice if you are in invoice module, a propale in propale's module, etc...)
     * @param   string &$action Current action (if set). Generally create or edit or null
     * @param   HookManager $hookmanager Hook manager propagated to allow calling another hook
     * @return  int                             < 0 on error, 0 on success, 1 to replace standard code
     */
    function printLeftBlock($parameters, &$object, &$action, $hookmanager)
    {

        $this->resprints = '';

        if (!empty(getDolGlobalString('EASYA_MAINTENANCE_FILE')) && (file_exists(getDolGlobalString('EASYA_MAINTENANCE_FILE')) || file_exists(dol_buildpath(preg_replace('/^\/htdocs/', '', getDolGlobalString('EASYA_MAINTENANCE_FILE')))))) {
            $this->resprints.= '<script>';
            $this->resprints.= '    $(() => {
                $(".side-nav-vert").before(\'<div class="warning" style="background-color: red; color: white !important; font-weight: bold; font-size: 20px;">MODE MAINTENANCE</div>\') 
                $("#tmenu_tooltipinvert").attr("style", "position: fixed; top: 50px;") 
                $(".side-nav").attr("style", "position: relative; top: 50px;") 
                $(".login_block .usedropdown").attr("style", "position: relative; top: 50px;") 
            })';
            $this->resprints.= '</script>';
        }
        
        return 0;
    }
}