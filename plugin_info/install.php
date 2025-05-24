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

function enedisCollectivite_install() {
  foreach (eqLogic::byType('enedisCollectivite') as $eqLogic) {
    $crons = cron::searchClassAndFunction('enedisCollectivite', 'pull', '"enedisCollectivite_id":' . intval($eqLogic->getId()));
    if ($eqLogic->getIsEnable() == 1 && empty($crons)) {
      $eqLogic->refreshData();
    }
  }
}

function enedisCollectivite_update() {
  foreach (eqLogic::byType('enedisCollectivite') as $eqLogic) {
    $crons = cron::searchClassAndFunction('enedisCollectivite', 'pull', '"enedisCollectivite_id":' . intval($eqLogic->getId()));
    if ($eqLogic->getIsEnable() == 1 && empty($crons)) {
      $eqLogic->refreshData();
    }
    if ($eqLogic->getConfiguration('widgetBGColor') != '') {
      $eqLogic->setDisplay('advanceWidgetParameterBGEnedisdashboard', $eqLogic->getConfiguration('widgetBGColor'));
      $eqLogic->setDisplay('advanceWidgetParameterBGEnedismobile', $eqLogic->getConfiguration('widgetBGColor'));
      if ($eqLogic->getConfiguration('widgetTemplate') == 1) {
        $eqLogic->setDisplay('advanceWidgetParameterBGEnedisdashboard-default', 0);
        $eqLogic->setDisplay('advanceWidgetParameterBGEnedismobile-default', 0);
        $eqLogic->setDisplay('advanceWidgetParameterBGTitledashboard-default', 0);
        $eqLogic->setDisplay('advanceWidgetParameterBGTitlemobile-default', 0);
        $eqLogic->setDisplay('advanceWidgetParameterBGTitledashboard-transparent', 1);
        $eqLogic->setDisplay('advanceWidgetParameterBGTitlemobile-transparent', 1);
      }
      if ($eqLogic->getConfiguration('widgetTransparent') == 1) {
        $eqLogic->setDisplay('advanceWidgetParameterBGEnedisdashboard-transparent', 1);
        $eqLogic->setDisplay('advanceWidgetParameterBGEnedismobile-transparent', 1);
      }
      $eqLogic->setConfiguration('widgetBGColor', null);
      $eqLogic->setConfiguration('widgetTransparent', null);
      $eqLogic->save(true);
    }
    if (is_object($prodMaxPower = $eqLogic->getCmd('info', 'daily_production_max_power'))) {
      $prodMaxPower->remove();
    }
  }
}
