<style type="text/css"><?php echo file_get_contents($assetPath.'profiler.min.css'); ?></style>

<div class="anbu">

	<div class="anbu-window">
		<div class="anbu-content-area">
		
			<div class="anbu-tab-pane anbu-table anbu-environment">
				@include('profiler::profiler._environment')
			</div>

			<div class="anbu-tab-pane anbu-table anbu-controller">
				@include('profiler::profiler._controller')
			</div>

			<div class="anbu-tab-pane anbu-table anbu-routes">
				@include('profiler::profiler._routes')
			</div>

			<div class="anbu-tab-pane anbu-table anbu-log">
				@include('profiler::profiler._logs')
			</div>

			<div class="anbu-tab-pane anbu-table anbu-sql">
				@include('profiler::profiler._sql')
			</div>

			<div class="anbu-tab-pane anbu-table anbu-checkpoints">
				@include('profiler::profiler._times')
			</div>

			<div class="anbu-tab-pane anbu-table anbu-view">
				@include('profiler::profiler._view_data')
			</div>

			<div class="anbu-tab-pane anbu-table anbu-file">
				@include('profiler::profiler._files')
			</div>

			<div class="anbu-tab-pane anbu-table anbu-session">
				@include('profiler::profiler._session')
			</div>
				
			@if (\Config::get('profiler::btns.config'))
			<div class="anbu-tab-pane anbu-table anbu-config">
				@include('profiler::profiler._config')
			</div>
			@endif
			
			@if (\Config::get('profiler::btns.storage'))
			<div class="anbu-tab-pane anbu-table anbu-storage">
				@include('profiler::profiler._storage_logs')
			</div>
			@endif

			@if (Auth::check())
				<div class="anbu-tab-pane anbu-table anbu-auth">
					@include('profiler::profiler._auth')
				</div>
			@endif

			@if (class_exists('Cartalyst\Sentry\SentryServiceProvider') AND Sentry::check())
				<div class="anbu-tab-pane anbu-table anbu-auth-sentry">
					@include('profiler::profiler._auth_sentry')
				</div>
			@endif

		</div>
	</div>

	<ul id="anbu-open-tabs" class="anbu-tabs">
	@if (\Config::get('profiler::doc'))
	<a href="{{\Config::get('profiler::doc')}}" class="doc" target="doc">&nbsp;</a>
	@endif
		
<?php
	$btns=\Config::get('profiler::btns');
	foreach ($btns as $key=>$btn) {
		$count='';
	    if (($key=='auth') && (!Auth::check())) continue;
	    if (($key=='auth-sentry') && !(class_exists('Cartalyst\Sentry\SentryServiceProvider') AND Sentry::check())  ) continue;
		try {
			switch ($key) {
			 case 'log' : $count= $counts[$key]($app_logs); break;
			 case 'sql' : $count= $counts[$key]($sql_log); break;
			 case 'checkpoints' : $count= $counts[$key]($times); break;
			 case 'file' : $count= $counts[$key]($includedFiles); break;
			 case 'view' : $count= $counts[$key]($view_data); break;
			 case 'storage' : $count= $counts[$key]($storageLogs); break;
			 case 'config' : $count= $counts[$key]($config); break;
			 default : $count= $counts[$key]();
			}
		} catch (Exception $e) {
			$count='';
		}
		echo	'<li><a data-anbu-tab="anbu-'.$key.'" class="anbu-tab" href="#"
				title="'.((isset($btn['title']))?$btn['title']:$btn['label']).'">'.$btn['label'].
				' <span class="anbu-count">'.$count.'</span></a>'.
				'</li>';
	}
?>
			
		<li class="anbu-tab-right"><a id="anbu-hide" href="#">&#8614;</a></li>
		<li class="anbu-tab-right"><a id="anbu-close" href="#">&times;</a></li>
		<li class="anbu-tab-right"><a id="anbu-zoom" href="#">&#8645;</a></li>
	</ul>

	<ul id="anbu-closed-tabs" class="anbu-tabs">
		<li><a id="anbu-show" href="#">&#8612;</a></li>
	</ul>
</div>


@if(Config::get('profiler::jquery') ) 
	<script src="//ajax.googleapis.com/ajax/libs/jquery/1.10.1/jquery.min.js"></script>
@endif

<script><?php echo file_get_contents($assetPath.'profiler.min.js'); ?></script>
