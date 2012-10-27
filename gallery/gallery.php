<script>
		$(function(){

			$('#slides').slides({
				preload: true,
				preloadImage: 'images/loading.gif',
				play: 4000,
				pause: 2500,
				hoverPause: true,
				animationStart: function(current){
					$('.caption').slideToggle("fast");
					if (window.console && console.log) {
						// example return of current slide number
						console.log('animationStart on slide: ', current);
					};
				},
				animationComplete: function(current){
					$('.caption').animate({
						bottom:0
					},200);
					if (window.console && console.log) {
						// example return of current slide number
						console.log('animationComplete on slide: ', current);
					};
				},
				slidesLoaded: function() {
					$('.caption').animate({
						bottom:0
					},200);
				}
			});
		});
	</script>
<div id="container">
	<div id="example">
		<div id="slides">
			<div class="slides_container">
				<div class="slide"><a href="http://www.flickr.com/photos/jliba/4665625073/" title="145.365 - Happy Bokeh Thursday! | Flickr - Photo Sharing!" target="_blank"><img id="img" src="images/slide-1.jpg" alt="Slide 1" /></a>
					<div class="caption" style="bottom: 0;">
						<p>Экстримальный спорт <br /> У Нас сможите увидеть все</p>
					</div>
				</div>
				<div class="slide"><a href="http://www.flickr.com/photos/stephangeyer/3020487807/" title="Taxi | Flickr - Photo Sharing!" target="_blank"><img id="img" src="images/slide-2.jpg" alt="Slide 2" /></a>
					<div class="caption">
						<p>Тенисные события</p>
					</div>
				</div>
				<div class="slide"><a href="http://www.flickr.com/photos/childofwar/2984345060/" title="Happy Bokeh raining Day | Flickr - Photo Sharing!" target="_blank"><img id="img" src="images/slide-3.jpg" alt="Slide 3" /></a>
					<div class="caption">
						<p>Все события в мире гольфа</p>
					</div>
				</div>
			</div>
			<div class="room-options-container">
				<div class="room-options-container-top">
					<div id="s1">&nbsp;</div>
					<div id="s2">&nbsp;</div>
					<div id="s3">&nbsp;</div>
				</div>
				<div class="room-options-container-bottom1">&nbsp;</div>
				<div class="room-options-container-bottom2">&nbsp;</div>
				<div class="room-options-container-bottom3">&nbsp;</div>
			</div><a class="forsearch" href="#"><img class="searchimg" src="images/room-viewer-icon1.png" /><span class="spmer">СПОРТИВНЫЕ<br />МЕРОПРИЯТИЯ</span></a><a class="forsearch2" href="index.php/component/search/?searchword=&amp;ordering=newest&amp;searchphrase=all"><img class="searchimg2" src="images/room-viewer-icon2.png" /><span class="spmer">ПОИСК</span></a><a class="forsearch3" href="index.php/dop-usluga"><img class="searchimg3" src="images/room-viewer-icon3.png" /><span class="spmer">ДОПОЛНИТЕЛЬНЫЕ<br />УСЛУГИ</span></a><a></a><a></a><a></a><a href="#" class="prev"><img src="images/arrow-prev.png" alt="Arrow Prev" height="43" width="24" /></a><a href="#" class="next"><img src="images/arrow-next.png" alt="Arrow Next" height="43" width="24" /></a>
		</div>
	</div>
</div>
<p>&nbsp;</p>