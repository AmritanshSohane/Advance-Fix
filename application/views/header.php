<?php date_default_timezone_set('Europe/Rome'); ?>
	<!DOCTYPE html>
	<html lang="en">

	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<meta name="description" content="">
		<meta name="author" content="amrit@dsmnru">
		<link rel="shortcut icon" href="img/favicon.png">

		<title><?=$impostazioni[0]['titolo']; ?> - <?=$this->lang->line('pannello_dc_w');?></title>


        <script><?=include(FCPATH.'js/jquery.js');?></script>
		<link href="<?=site_url('css/bootstrap.min.css'); ?>" rel="stylesheet">
		<link href="<?=site_url('css/hover.css'); ?>" rel="stylesheet">
		<link href="<?=site_url('css/bootstrap-reset.css'); ?>" rel="stylesheet">
		<link href="<?=site_url('assets/font-awesome/css/font-awesome.css'); ?>" rel="stylesheet" />
		<link href="<?=site_url('assets/jquery-easy-pie-chart/jquery.easy-pie-chart.css'); ?>" rel="stylesheet" type="text/css" media="screen" />
		<link rel="stylesheet" href="<?=site_url('css/owl.carousel.css'); ?>" type="text/css">
        <link rel="stylesheet" href="<?= site_url('assets/advanced-datatable/media/css/dataTables.responsive.css'); ?>" />
		<link href="<?=site_url('css/style.css'); ?>" rel="stylesheet">
		<link href="<?=site_url('css/style-responsive.css'); ?>" rel="stylesheet" />
        <script><?=include(FCPATH.'assets/js/pace.min.js');?></script>

		<!-- HTML5 shim and Respond.js IE8 support of HTML5 tooltipss and media queries -->
		<!--[if lt IE 9]>
      <script src="js/html5shiv.js"></script>
      <script src="js/respond.min.js"></script>
    <![endif]-->
	</head>

                
    <?php 
        $colore = $impostazioni[0]['colore_prim'];
        $alfa = $this->Impostazioni_model->hex2rgba($colore, 0.05);
        echo '<style id="colori">';
        include 'js/colori_js.php';
        echo '</style>';
    ?>
    <script>
        jQuery(document).ready(function () {
            $("#black").fadeOut(500);
        });
    </script>

	<body>
        <div id="black"></div>
		<section id="container">
			<!--header start-->
			<header class="header white-bg">
				<div class="sidebar-toggle-box">
					<div class="fa fa-bars tooltips" data-placement="right" data-original-title="Toggle Navigation"></div>
				</div>
				<!--logo start-->
				<a href="<?=site_url(''); ?>" class="logo">
					<p><span><?=$this->lang->line('pannello_dc');?></span></p>
					<p><?=$impostazioni[0]['titolo']; ?></p>
				</a>
				<!--logo end-->

				<div class="welcome">

					<img alt="" src="<?=site_url('img/avatar1_small.jpg') ?>">
                    <span class="welcome"><?=$this->lang->line('welcome_a');?> </span>
                    <a href="<?=site_url('login/logout'); ?>" class="log-out"><i class="fa fa-key"></i> <?=$this->lang->line('logout');?></a> <a href="<?=site_url(''); ?>"><i class="fa fa-home"></i> <?=$this->lang->line('js_torna_indietro');?></a>
				</div>
			</header>
			<!--header end-->
			<!--sidebar start-->
			<aside>
				<div id="sidebar" class="nav-collapse ">
					<!-- sidebar menu start-->
					<ul class="sidebar-menu" id="nav-accordion">
                        <li class="nav_title"><img src="<?= ($impostazioni[0]['logo'] == 'default') ? 'http://fixbook.it/img/logo_nav.png' : site_url('img').'/'.$impostazioni[0]['logo']; ?>"></li>
						<li>
                            <a class="hvr-bounce-to-right <?php if ('http://'.$_SERVER['SERVER_NAME'].$_SERVER['REQUEST_URI'] == site_url('')) {
    echo 'active';
    } ?>" href="<?=site_url(''); ?>">
								<i class="fa fa-map-marker"></i>
								<span><?=$this->lang->line('o_e_r_titolo');?></span>
							</a>
						</li>

						<li>
                            <a class="hvr-bounce-to-right <?php if ('http://'.$_SERVER['SERVER_NAME'].$_SERVER['REQUEST_URI'] == site_url('clienti/')) {
    echo 'active';
    } ?>" href="<?=site_url('clienti/'); ?>">
								<i class="fa fa-user"></i>
								<span><?=$this->lang->line('clienti');?></span>
							</a>
						</li>
						<li>
                            <a class="hvr-bounce-to-right <?php if ('http://'.$_SERVER['SERVER_NAME'].$_SERVER['REQUEST_URI'] == site_url('Anticipo_t/')) {
    echo 'active';
    } ?>" href="<?=site_url('Anticipo_/'); ?>">
								<i class="fa fa-user"></i>
								<span><?=$this->lang->line('Anticipo_');?></span>
							</a>
						</li>
						<li>
						<a class="hvr-bounce-to-right <?php if ('http://'.$_SERVER['SERVER_NAME'].$_SERVER['REQUEST_URI'] == site_url('Anticipo_t/')) {
    echo 'active';
    } ?>" href="<?=site_url('feedback/admin'); ?>">
								<i class="fa fa-user"></i>
								<span><?=$this->lang->line('feed');?></span>
							</a>
						</li>
						<li>
                            <a class="hvr-bounce-to-right <?php if ('http://'.$_SERVER['SERVER_NAME'].$_SERVER['REQUEST_URI'] == site_url('feedback/admin')) {
    echo 'active';
    } ?>" href="<?=site_url('finanze/'); ?>">
								<i class="fa fa-bar-chart-o"></i>
								<span><?=$this->lang->line('finanze');?></span>
							</a>
						</li>
						<li>
							<a class="hvr-bounce-to-right <?php if ('http://'.$_SERVER['SERVER_NAME'].$_SERVER['REQUEST_URI'] == site_url('impostazioni/')) {
    echo 'active';
} ?>" href="<?=site_url('impostazioni//'); ?>">
								<i class="fa fa-cog"></i>
								<span><?=$this->lang->line('impostazioni');?></span>
							</a>
						</li>
                        <li class="logout">
                            <a class="hvr-bounce-to-right" href="<?=site_url('login/logout'); ?>">
                                <i class="fa fa-key"></i>
								<span><?=$this->lang->line('logout');?></span>
							</a>
						</li>

					</ul>
					<!-- sidebar menu end-->
				</div>
			</aside>
			<!--sidebar end-->