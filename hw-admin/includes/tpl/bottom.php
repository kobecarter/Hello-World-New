  <div class="page-footer">
  © <a href="http://www.helloworld-agency.com" target="_blank">Hello World</a> <?php echo date('Y')?>.
</div>
</div>
<?php
$option = isset($_GET['option']) ? $_GET['option'] : 'com_frontpage';
?>
<script type="text/javascript">
$(function(){
	$(".side li").removeClass("current");
	$("li.<?php echo $option; ?>").addClass("current");
})
</script>
<script src="js/jquery.form.js"></script>
<script src='js/c81813dd5f2238060c9ddecda9683907.js'></script>
<script src='js/dataTables.js'></script>
<script src='js/form_validation.js'></script>
<script src='js/jqprint.js'></script>
</body>
</html>