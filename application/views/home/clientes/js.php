<?php
defined('BASEPATH') or exit('No direct script access allowed');
?>
<!DOCTYPE html>

<script>

	/*
	 * Author: Abdullah A Almsaeed
	 * Date: 4 Jan 2014
	 * Description:
	 *      This is a demo file used only for the main dashboard (index.html)
	 **/

	/* global moment:false, Chart:false, Sparkline:false */

	$(function () {
		'use strict'

		// Make the dashboard widgets sortable Using jquery UI
		$('.connectedSortable').sortable({
			placeholder: 'sort-highlight',
			connectWith: '.connectedSortable',
			handle: '.card-header, .nav-tabs',
			forcePlaceholderSize: true,
			zIndex: 999999
		})
		$('.connectedSortable .card-header').css('cursor', 'move')

		/* jQueryKnob */
		$('.knob').knob()


	})
</script>
