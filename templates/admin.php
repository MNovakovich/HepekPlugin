
<div class="container--tabs">
    <h1>Admin page</h1>
<?php settings_errors(); ?>
	<section class="row">
		<ul class="nav nav-tabs">
			<li class="active"><a href="#tab-1">Manage Settings1</a></li>
			<li class=""><a href="#tab-2">Updates</a></li>
			<li class=""><a href="#tab-3">About</a></li>
		</ul>
		<div class="tab-content">
			<div id="tab-1" class="tab-pane active"> 
				<span class="glyphicon glyphicon-leaf glyphicon--home--feature two columns text-center"></span>
				<span class="col-md-10">
			
					 <form action="options.php" method="post">
            <?php 
            
                settings_fields('hepek_options_group');
                do_settings_sections('hepek_plugin');
                submit_button();
            ?>
            </form>

				</span>
			</div> 
			<div id="tab-2" class="tab-pane">
				<span class="glyphicon glyphicon-fire glyphicon--home--feature two columns text-center"></span>
				<span class="col-md-10">
					<h3>Feature 2</h3>
					<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit.</p>
				</span>
			</div>
			<div id="tab-3" class="tab-pane">
				<span class="glyphicon glyphicon-tint glyphicon--home--feature two columns text-center"></span>
				<span class="col-md-10">
					<h3>Feature 3</h3>
					<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit.</p>
				</span>
			</div>
		</div>
	</section>
</div>

