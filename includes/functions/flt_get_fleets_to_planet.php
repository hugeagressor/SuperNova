<?php
function flt_get_fleets_to_planet($planet)
{
  global $user, $sn_data, $sn_groups;

  if(!$planet)
  {
    return $planet;
  }

  $sql_fleets = doquery(
    "SELECT * FROM {{fleets}}
      WHERE
        (fleet_start_galaxy = {$planet['galaxy']} AND fleet_start_system = {$planet['system']} AND fleet_start_planet = {$planet['planet']} AND fleet_start_type = {$planet['planet_type']} AND fleet_mess = 1)
        OR
        (fleet_end_galaxy = {$planet['galaxy']} AND fleet_end_system = {$planet['system']} AND fleet_end_planet = {$planet['planet']} AND fleet_end_type = {$planet['planet_type']} AND fleet_mess = 0)
    ");
  $fleet_list['total'] = mysql_num_rows($sql_fleets);

  while ($fleet = mysql_fetch_assoc($sql_fleets))
  {
    if($fleet['fleet_owner'] == $user['id'])
    {
      $fleet_ownage = 'own';
    }
    else
    {
      switch($fleet['fleet_mission'])
      {
        case MT_ATTACK:
        case MT_AKS:
        case MT_DESTROY:
        case MT_MISSILE:
          $fleet_ownage = 'enemy';
        break;

        default:
          $fleet_ownage = 'neutral';
        break;

      }
    }

    $fleet_list[$fleet_ownage]['fleets'][$fleet['fleet_id']] = $fleet;

    if($fleet['fleet_mess'] == 1 || ($fleet['fleet_mess'] == 0 && ($fleet['fleet_mission'] == MT_RELOCATE)) ||
    ($fleet['fleet_target_owner'] != $user['id']))
    {
      $fleet_sn = flt_expand($fleet);
      foreach($fleet_sn as $ship_id => $ship_amount)
      {
        if(in_array($ship_id, $sn_groups['fleet']))
        {
          $fleet_list[$fleet_ownage]['total'][$ship_id] += $ship_amount;
        }
      }
      /*
      // then this fleet would stay
      $fleet_ships = explode(';',$fleet['fleet_array']);
      foreach(explode(';',$fleet['fleet_array']) as $ship_data)
      {
        if($ship_data)
        {
          $ship_data = explode(',', $ship_data);
          $fleet_list[$fleet_ownage]['total'][$ship_data[0]] += $ship_data[1];
        }
      }
      */
    }

    $fleet_list[$fleet_ownage]['count']++;
    $fleet_list[$fleet_ownage]['amount'] += $fleet['fleet_amount'];
    $fleet_list[$fleet_ownage]['total'][901] += $fleet['fleet_resource_metal'];
    $fleet_list[$fleet_ownage]['total'][902] += $fleet['fleet_resource_crystal'];
    $fleet_list[$fleet_ownage]['total'][903] += $fleet['fleet_resource_deuterium'];
  }

  return $fleet_list;
}
?>