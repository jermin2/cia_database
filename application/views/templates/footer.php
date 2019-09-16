
	</body>
</html>

<script>
var hammertime_overlay = new Hammer(overlay);
hammertime_overlay.on('tap', function(ev) {
	console.log("test");
	toggleSidebar();
});
</script>