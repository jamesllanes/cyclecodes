<html>
<body>
<style>
* {box-sizing: border-box;}
.wrapper1 {
  max-width: 1000px;
  margin: 0 auto;
}

.wrapper1 > div {
  border: 1px solid white;
  background-color: rgba(13, 13, 13, 0.9);
  padding: 1em;
  color: #cccccc;
}.wrapper1 {
  display: grid;
  grid-template-columns: repeat(4, 1fr);
  grid-auto-rows: minmax(100px, auto);
}
.dropdown1 {
  grid-column: 1;
  grid-row: 1;
}
.dropdown2 { 
  grid-column: 2;
  grid-row: 1;
}
.dropdown3 {
  grid-column: 3;
  grid-row: 1;
}
.dropdown4 {
  grid-column: 4;
  grid-row: 1;
}
.dropdown5 {
  grid-column: 1;
  grid-row: 2;
}
.dropdown6 {
  grid-column: 2;
  grid-row: 2;
}
.dropdown7 {
  grid-column: 3;
  grid-row: 2;
}
.dropdown8 {
  grid-column: 4;
  grid-row: 2;
}
.dropdown9 {
  grid-column: 1;
  grid-row: 3; 
}
.dropdown10 {
  grid-column: 2;
  grid-row: 3;
}
.dropdown11 {
  grid-column: 3;
  grid-row: 3; 
}
</style>
<div class="wrapper">
	<div class="dropdown1">
		<b><font size="5">Paints and Sundries</font></b><br>
		<a href="#">Paints</a><br>
		<a href="#">Brushes & Rollers</a><br>
		<a href="#">Caulks & Sealants</a><br>
		<a href="#">Adhesives & Tapes</a><br>
		<a href="#">Ladders</a>
	</div>
  <div class="dropdown2">
		<b><font size="5">Tools</font></b><br>
		<a href="#">Power Tools</a><br>
		<a href="#">Hand Tools</a><br>
		<a href="#">Measuring Tools</a><br>
		<a href="#">Tool Organizers</a><br>
		</div>
  <div class="dropdown3">
  		<b><font size="5">Electrical</font></b><br>
		<a href="#">Bulbs & Flourecent Lights</a><br>
		<a href="#">Lightning Fixtures</a><br>
		<a href="#">Flashlight & Batteries</a><br>
		<a href="#">Rechargeables</a><br>
		<a href="#">Power Supply</a><br>
		<a href="#">Extension Cords, Wires & Cables</a><br>
		<a href="#">Wiring Devices</a><br>
		<a href="#">Audio, Video & Telephone</a><br>
		<a href="#">Supplies</a><br>		
		</div>
  <div class="dropdown4">
    <b><font size="5">Plumbing</font></b><br>
		<a href="#">Air Purifier</a><br>
		<a href="#">Faucets</a><br>
		<a href="#">Fittings</a><br>
		<a href="#">Showers & Bidets</a><br>
		<a href="#">Water Filtration</a><br>
		<a href="#">Water Heaters</a><br>
		<a href="#">Water Storage & Pumps</a><br>
		<a href="#">Water Closet & Accessories</a><br>
		<a href="#">Sink, Lavatory & Accessories</a><br>	
  </div>
  <div class="dropdown5">
     <b><font size="5">Home Hardware</font></b><br>
  		<a href="#">Building Materials & Supplies</a><br>
		<a href="#">Door & Cabinet Hardware</a><br>
		<a href="#">Home Safety & Security</a><br>
		<a href="#">Industrial & Exhaust Fans</a><br>
		<a href="#">Locksets & Padlocks</a><br>
		<a href="#">Utility Racks & Carts</a><br>
		<a href="#">Wall Mounts & Shelvings</a><br>
  </div>
  <div class="dropdown6">
      <b><font size="5">Houseware</font></b><br>
		<a href="#">Bathroom Accessories</a><br>
		<a href="#">Cleaning Implements</a><br>
		<a href="#">Dish Drainers & Kitchen</a><br>
		<a href="#">Accessories</a><br>
		<a href="#">Drawers & Closets</a><br>
		<a href="#">Laundry Implements</a><br>
		<a href="#">Mats & Carpets</a><br>
		<a href="#">Pails & Buckets</a><br>
		<a href="#">Stackables & Storage Accessories</a><br>
		<a href="#">Trash Bins</a><br>		
  </div>
  <div class="dropdown7">
        <b><font size="5">Lawn and Outdoor</font></b><br>
		<a href="#">Coolers & Jugs</a><br>
		<a href="#">Gardening Tools</a><br>
		<a href="#">Grills & Outdoor Cooking</a><br>
		<a href="#">Hoses,Sprayers & Sprinklers</a><br>
		<a href="#">Mowers & Trimmers</a><br>
		<a href="#">Outdoor Furniture</a><br>
		<a href="#">Seeds, Soil & Fertilizers</a><br>
		<a href="#">Tents & Camping</a><br>
  </div>
<div class="dropdown8">
        <b><font size="5">Automotive</font></b><br>
		<a href="#">Accessories</a><br>
		<a href="#">Car Audio</a><br>
		<a href="#">Cleaning Supplies</a><br>
		<a href="#">Lightning</a><br>
		<a href="#">Maintenance</a><br>
		<a href="#">Tools</a><br>
</div>
<div class="dropdown9">
        <b><font size="5">Small Appliances</font></b><br>
		<a href="#">Air Coolers</a><br>
		<a href="#">Aircon</a><br>
		<a href="#">Beds & Furniture</a><br>
		<a href="#">Fans</a><br>
</div>
<div class="dropdown10">
        <b><font size="5">Chemicals and Batteries</font></b><br>
		<a href="#">Batteries</a><br>
		<a href="#">Household Chemicals</a><br>
		<a href="#">Insect & Pest Control</a><br>
</div>
<div class="dropdown11">
        <b><font size="5">Pets</font></b><br>
		<a href="#">Pet Accessories</a><br>
		<a href="#">Pet Care & Grooming</a><br>
		<a href="#">Pet Food</a><br>
</div>
</div>
</body>
</html>