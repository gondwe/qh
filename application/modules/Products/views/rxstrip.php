<?php 


$name = $this->db->where('id',$data->products)->get('products')->row('name');
$unit = $this->db->where('id',$data->products)->get('products')->row('unit');
$price = $this->db->where('id',$data->products)->get('products')->row('unit_price');

// pf($data);

?>

    <tr id="<?=$data->prodid?>">
        <td><?=$name?></td>
        <td>Qty:<?=$data->qty." ".$unit?></td>
        <td>Rate:<?=$data->rate?></td>
        <td>For:<?=$data->prd?> day(s)</td>
        <td><i class="fa fa-times rxdata" data-qty="<?=$data->qty?>" data-prd="<?=$data->prd?>"  data-rate="<?=$data->rate?>" data-id="<?=$data->prodid?>" data-product="<?=$data->products?>" data-price="<?=$price?>" onclick="removerx(this)"></i></td>
    </tr>

