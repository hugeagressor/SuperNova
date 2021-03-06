<?php

/*
#############################################################################
#  Filename: artifacts.mo
#  Project: SuperNova.WS
#  Website: http://www.supernova.ws
#  Description: Massive Multiplayer Online Browser Space Startegy Game
#
#  Copyright © 2009 Gorlum for Project "SuperNova.WS"
#############################################################################
*/

/**
*
* @package language
* @system [Russian]
* @version 34a15
*
*/

/**
* DO NOT CHANGE
*/

if (!defined('INSIDE')) die();

$lang = array_merge($lang, array(
  'art_use'             => 'Использовать артефакт',

  'art_lhc_from'        => 'Большой Адронный Коллайдер',
  'art_lhc_subj'        => 'Попытка создания луны',
  'art_lhc_moon_create' => 'Гравитационная волна, запущенная БАК, соединила огромные куски металла и кристалла на орбите, в результате чего по образовалась новая луна %s по координатам %s!',
  'art_lhc_moon_exists' => 'На лунной орбите по текущим координатам уже находится луна',
  'art_lhc_moon_fail'   => 'Гравитационой волны БАК оказалось недостаточно для образования новой луны',

  'art_rcd_from'        => 'Автономный Колонизационный Комплекc',
  'art_rcd_subj'        => 'Колония развернута',
  'art_rcd_ok'          => '%1$s успешно развернул колонию на планете %2$s по координатам %3$s',
  'art_rcd_err_moon'    => 'АКК может быть развернут только на планете',
  'art_rcd_err_no_sense'=> 'АКК определил, что ни одно из зданий не будет усовершенствовано и прекратил развертывание',
  'art_rcd_err_que'     => 'АКК не может быть развернут на планете, где ведется строительство. Отмените всё строительство на планете и попробуйте развернуть АКК еще раз',

  'art_err_no_artifact' => 'У вас нет нужного артефакта',

  'art_page_hint'       => '<ul>
    <li>Артефакты - редкие объекты с уникальными свойствами</li>
    <li>Артефакты являются одноразовыми - после использования Артефакт исчезает</li>
    <li>Некоторые Артефакты настолько мощные, что их количество в одной Империи не может быть больше опредленного числа</li>
    <li>Обычно эффект от использования Артефакта распространяется на планету применения, но некоторые Артефакты имеют всеимперский эффект.
    Самые редкие и дорогие Артефакты могут действовать на всю солнечную систему, галактику или даже на всю Вселенную!</li>
  </ul>',
));

?>
