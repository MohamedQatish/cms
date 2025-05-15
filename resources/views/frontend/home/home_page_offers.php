<?php
	if($home_page_offers){
		$i = 0; 
?>
<Style>
.home_page_offers{
	border: solid 1px #fff;
	padding: 25px;
	width: 120px;
	display: inline-block;
	color: #fff;
	font-size: 15px;
}
</style>
<?php foreach($home_page_offers as $offer){ ?>
<?php //var_dump($offer); ?>
<div class="row" style="text-algin: center; width: 100%; position: relative; background: #3d273e; padding-top: 3px;" align="center" > 
  
   <section id="sidebar-main" class="col-md-12">

<div id="offer_days_<?php echo $i; ?>" class="home_page_offers"></div>
<div id="offer_hours_<?php echo $i; ?>"  class="home_page_offers"></div>
<div id="offer_minutes_<?php echo $i; ?>"  class="home_page_offers"></div>
<div id="offer_seconds_<?php echo $i; ?>"  class="home_page_offers"></div>
<br />
<div align="center">
	
		<Table>
		<tr>
			<Td>
				<img style="display: inline-block;" src="<?php echo base_url(); ?>admin/uploads/<?php echo $offer->product_info->image; ?>" width="200" />
			</td>
			<td valign="top">
			<h4 style="color: #fff;"><a href="<?php echo base_url(); ?>products/view_product/<?php echo $offer->product_info->id; ?>" style="color: #fff;">
				<?php echo $offer->product_info->name; ?></a></h4>
			
			<strike><span  style="font-size: 24px;"><?php echo $offer->product_info->price; ?></span></strike>
			<span style="font-size: 30px; color: #fff; "><?php echo $offer->new_price; ?> ر.س</span><br /><br />
			<input type="button" value="إضافة للسلة" style="border: none; padding: 10px; background: #fff; color: #3d273e;" onclick="add_to_cart('<?php echo $offer->product_info->id; ?>')" />
			</td>
		</tr>
		</table>
	
</div>
<script>
// Set the date we're counting down to
var countDownDate = new Date("<?php echo $offer->end_date; ?>").getTime();

// Update the count down every 1 second
var x = setInterval(function() {

  // Get today's date and time
  var now = new Date().getTime();
    
  // Find the distance between now and the count down date
  var distance = countDownDate - now;
    
  // Time calculations for days, hours, minutes and seconds
  var days = Math.floor(distance / (1000 * 60 * 60 * 24));
  var hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
  var minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
  var seconds = Math.floor((distance % (1000 * 60)) / 1000);
    
  // Output the result in an element with id="demo"
  document.getElementById("offer_days_<?php echo $i; ?>").innerHTML = days + " يوم";
  document.getElementById("offer_hours_<?php echo $i; ?>").innerHTML = hours + " ساعة";
  document.getElementById("offer_minutes_<?php echo $i; ?>").innerHTML = minutes + " دقيقة";
  document.getElementById("offer_seconds_<?php echo $i; ?>").innerHTML = seconds + " ثانية";
  //document.getElementById("offer_<?php echo $i; ?>").innerHTML = days + "d " + hours + "h "
  //+ minutes + "m " + seconds + "s ";
    
  // If the count down is over, write some text 
  if (distance < 0) {
    clearInterval(x);
    document.getElementById("offer_<?php echo $i; ?>").innerHTML = "EXPIRED";
  }
}, 1000);
</script>
		
</section>

</div>	
		
	
		
		<?php
			$i++;
		}
		?>
<?php		
	}
?>