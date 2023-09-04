

	<script src="<?php echo sysfunc::url( __core_vendors . '/components/jquery/jquery.min.js' ); ?>"></script>
	
	<script src="<?php echo sysfunc::url( __core_views . '/assets/js/bootstrap.bundle.min.js' ); ?>"></script>
    <script src="<?php echo sysfunc::url( __core_views . '/assets/js/Chart.min.js' ); ?>"></script>
    <script src="<?php echo sysfunc::url( __core_views . '/assets/js/dynamic-pie-chart.js' ); ?>"></script>
    <script src="<?php echo sysfunc::url( __core_views . '/assets/js/moment.min.js' ); ?>"></script>
    <script src="<?php echo sysfunc::url( __core_views . '/assets/js/fullcalendar.js' ); ?>"></script>
    <script src="<?php echo sysfunc::url( __core_views . '/assets/js/jvectormap.min.js' ); ?>"></script>
    <script src="<?php echo sysfunc::url( __core_views . '/assets/js/world-merc.js' ); ?>"></script>
    <script src="<?php echo sysfunc::url( __core_views . '/assets/js/polyfill.js' ); ?>"></script>
    <script src="<?php echo sysfunc::url( __core_views . '/assets/js/main.js' ); ?>"></script>
	
	<script src="<?php echo sysfunc::url( __core_vendors . '/components/dataTables/datatables.min.js' ); ?>"></script>
	
	<script src="<?php echo sysfunc::url( __dir__ . '/script.js' ); ?>"></script>

	<?php foreach( $temp->HTMLFooter as $script ) print_r($script); ?>