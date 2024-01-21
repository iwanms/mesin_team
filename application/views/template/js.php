<!-- Bootstrap 3.3.7 -->
<script src="<?=base_url()?>assets/adminlte/bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
<!-- SlimScroll -->
<script src="<?=base_url()?>assets/adminlte/bower_components/jquery-slimscroll/jquery.slimscroll.min.js"></script>
<!-- FastClick -->
<script src="<?=base_url()?>assets/adminlte/bower_components/fastclick/lib/fastclick.js"></script>
<!-- AdminLTE App -->
<script src="<?=base_url()?>assets/adminlte/dist/js/adminlte.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="<?=base_url()?>assets/adminlte/dist/js/demo.js"></script>


<script>
  $(document).ready(function () {
    $('.sidebar-menu').tree()
  })
</script>
<script type="text/javascript">
	$(document).off("click",".menuclick").on("click",".menuclick",function (event, messages) {
		event.preventDefault()
		var url = $(this).attr("href");
		var title = $(this).attr("title");
		var treeView = $(this).attr("tree-view");
		var session = "1";
		if(url=="<?= site_url('logout')?>")
		{
			window.location.href=url;
		}

		var elems = document.querySelectorAll(".active");
		[].forEach.call(elems, function(el) {
			el.classList.remove("active");
		});

		if(treeView != "yes"){
			var elems = document.querySelectorAll(".menu-open");
			[].forEach.call(elems, function(el) {
				el.classList.remove("menu-open");
			});
			var subMenu = $('.treeview-menu').css('display', 'none');
		}

		var parentMenu = $('.treeview');
		[].forEach.call(parentMenu, function(el) {
			el.classList.add("active");
		});
		$(this).parent().addClass('active').siblings().removeClass('active');

		// $("#content").html(load_content); loading
		$.post(url,{ajax:"yes"},function(data){
			$('.modal.aside').remove();
			history.replaceState(title, title, url);
			$(".uri").val(url);
			$('title').html(title);
			$("#content").html(data);
			// activemenu();
			// $("#printSection").remove();
		})
	})
</script> 