<html>
<body>
<style>
* {box-sizing: border-box;}
.wrapper {
  max-width: 1000px;
  margin: 0 auto;
}

.wrapper > div {
	border: 1px solid #bcbdb7;
	background-color: green;
	/*background-color: rgba(13, 13, 13, 0.9);*/
	padding: 1em;
	margin: 2px;
	color: #cccccc;
}.wrapper {
  display: grid;
  grid-auto-rows: minmax(315px, auto);
  grid-auto-columns: minmax(300px, auto);
}
.one {
  grid-column: 1;
  grid-row: 1;
	background-image: url("paints.jpg");
	background-size : 100%;
	background-repeat : no-repeat;
	background-position: top;
}
.two { 
  grid-column: 2;
  grid-row: 1;
  	background-image: url("tools.jpg");
	background-size : 100%;
	background-repeat : no-repeat;
	background-position: top;
}
.three {
  grid-column: 3;
  grid-row: 1;
}
.four {
  grid-column: 1;
  grid-row: 2;
  	background-image: url("electrical.jpg");
	background-size : 100%;
	background-repeat : no-repeat;
	background-position: top;
}
.five {
  grid-column: 2;
  grid-row: 2;
	background-image: url("plumbing.jpg");
	background-size : 100%;
	background-repeat : no-repeat;
	background-position: top;
}
.six {
  grid-column: 1;
  grid-row: 3;
	background-image: url("homehardware.jpg");
	background-size : 100%;
	background-repeat : no-repeat;
	background-position: top;
}
.seven{
  grid-column: 2;
  grid-row: 3;
  	background-image: url("houseware.jpg");
	background-size : 100%;
	background-repeat : no-repeat;
	background-position: top;
}
.eight{
  grid-column: 1;
  grid-row: 4;
  	background-image: url("lawn.jpg");
	background-size : 100%;
	background-repeat : no-repeat;
	background-position: top;
}
.nine{
  grid-column: 2;
  grid-row: 4; 
    background-image: url("automotive.jpg");
	background-size : 100%;
	background-repeat : no-repeat;
	background-position: top;
}
.ten{
  grid-column: 1;
  grid-row: 5;
    background-image: url("appliances.jpg");
	background-size : 100%;
	background-repeat : no-repeat;
	background-position: top;
}
.eleven{
  grid-column: 2;
  grid-row: 5;
    background-image: url("chemicals.jpg");
	background-size : 100%;
	background-repeat : no-repeat;
	background-position: top;
}
.twelve{
  grid-column: 1;
  grid-row: 6; 
    background-image: url("pets.jpg");
	background-size : 100%;
	background-repeat : no-repeat;
	background-position: top;
}
</style>
<div class="wrapper">
	<div class="one">
		Paints and Sundries<br>
		Paints<br>
		Brushes & Rollers<br>
		Caulks & Sealants<br>
		Adhesives & Tapes<br>
		Ladders
	</div>
	<div class="two">Two</div>
	<div class="three">Three</div>
	<div class="four">Four</div>
	<div class="five">Five</div>
	<div class="six">Six</div>
	<div class="seven">Seven</div>
	<div class="eight">Eight</div>
	<div class="nine">9</div>
	<div class="ten">10</div>
	<div class="eleven">11</div>
	<div class="twelve">12</div>
</div>
</body>
</html>