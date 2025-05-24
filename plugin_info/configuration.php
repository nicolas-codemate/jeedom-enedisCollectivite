<?php
/* This file is part of Jeedom.
*
* Jeedom is free software: you can redistribute it and/or modify
* it under the terms of the GNU General Public License as published by
* the Free Software Foundation, either version 3 of the License, or
* (at your option) any later version.
*
* Jeedom is distributed in the hope that it will be useful,
* but WITHOUT ANY WARRANTY; without even the implied warranty of
* MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE. See the
* GNU General Public License for more details.
*
* You should have received a copy of the GNU General Public License
* along with Jeedom. If not, see <http://www.gnu.org/licenses/>.
*/

require_once dirname(__FILE__) . '/../../../core/php/core.inc.php';
include_file('core', 'authentification', 'php');
if (!isConnect('admin')) {
	throw new Exception('{{401 - Accès non autorisé}}');
}
?>

<form>
    <div class="col-sm-6">
        <legend><i class="fas fa-folder-open"></i>{{Authentification}}</legend>
        <div class="form-group row">
            <label for="apiKey" class="col-sm-6 col-form-label">{{Api Key}}</label>
            <div class="col-sm-6">
                <input type="text"
                       id="apiKey"
                       class="configKey form-control "
                       placeholder="{{Api Key}}"
                       data-l1key="configuration" data-l2key="apiKey"/>
            </div>
        </div>
        <div class="form-group row">
            <label for="apiSecret" class="col-sm-6 col-form-label">{{Api Secret}}</label>
            <div class="col-sm-6">
                <input type="password"
                       id="apiSecret"
                       class="configKey form-control"
                       placeholder="{{Api Secret}}"
                       data-l1key="configuration" data-l2key="apiSecret"/>
            </div>
        </div>
    </div>
</form>
