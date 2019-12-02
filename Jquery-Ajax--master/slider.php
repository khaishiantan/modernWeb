<html>
<!--Jquery Simple Slider Example -->
<style>
<!-- We required css class--->

.slider{
	position:relativ;
	
}

.slider > div{
	
	position:absolute;
}
</style>
<head>
<!--we required external jquery cdn link -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
<script>
// write script for slider using jquery

$(".slider > div:gt(0)").hide();//jquery hide function hide first child

// write setInterval function call afetr time sec

setInterval(function() {
	$('.slider > div:first-child')
	.fadeOut() // remove effect
	.next()// call next
	.fadeIn()// add image effect
	.end()
	.appendTo('.slider');// append to slider
	
}, 2000);// 2000 is time milisec call function
</script>

</style>



</head>
<body>
<p>Jquery Simple Slider Example..</p>
</body>

<!-- take Div for palce images-->

<div class="slider">

<!--Add Images -->
<!-- add images path now -->
<div><img src="a.jpg"> </div>

<div><img src="c.jpg"> </div>

</div>
</html>