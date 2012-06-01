<script src="<?php echo get_template_directory_uri(); ?>/js/plugins.js?v=20120531151000" type="text/javascript"></script>
<script src="<?php echo get_template_directory_uri(); ?>/js/script-ck.js?v=20120531151000"></script>

<?php wp_footer(); ?>
<script type="text/javascript">
var _sf_async_config={uid:37277,domain:"sawyerhollenshead.com"};
(function(){
  function loadChartbeat() {
    window._sf_endpt=(new Date()).getTime();
    var e = document.createElement('script');
    e.setAttribute('language', 'javascript');
    e.setAttribute('type', 'text/javascript');
    e.setAttribute('src',
       (("https:" == document.location.protocol) ? "https://a248.e.akamai.net/chartbeat.download.akamai.com/102508/" : "http://static.chartbeat.com/") +
       "js/chartbeat.js");
    document.body.appendChild(e);
  }
  var oldonload = window.onload;
  window.onload = (typeof window.onload != 'function') ?
     loadChartbeat : function() { oldonload(); loadChartbeat(); };
})();
</script>
</body>
</html>