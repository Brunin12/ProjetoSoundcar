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


		// nome dificil paranão ser acessado pelo console
		var ToggleviewPassword = false;

		$('#toggle_senha').click(() => {

			var icon = $('#icon_senha');
			var senha = $('#senha');
			var t_senha = $('#toggle_senha');
			if (icon.hasClass('fa-eye')) {
				icon.removeClass('fa-eye');
				icon.addClass('fa-lock');
			} else {
				icon.removeClass('fa-lock');
				icon.addClass('fa-eye');
			}

			if (!ToggleviewPassword) {
				senha.attr('type', 'text');
				ToggleviewPassword = true;
			} else {
				senha.attr('type', 'password');
				ToggleviewPassword = false;
			}
		});

	});

	function verificaTema() {
		var element = document.body;
		var icon = $('#theme_icon');
		var icons = $('.icons');
		var tema = $('#theme_mode');
		var storage = localStorage.getItem('tema');

		if (storage == 'dark') {
			element.classList.toggle("dark-mode");
			tema.attr('mode', 'dark');
			icon.attr('class', 'fas fa-sun text-light');
			icons.addClass('text-light');
		}
	}
	verificaTema();

	function trocarTema() {
		var element = document.body;
		var icon = $('#theme_icon');
		var icons = $('.icons');
		var tema = $('#theme_mode');
		var storage = localStorage.getItem('tema');

		if (($('#theme_mode').attr('mode') == 'light') || (storage == 'light')) {
			localStorage.setItem('tema', 'dark');
			element.classList.toggle("dark-mode");
			tema.attr('mode', 'dark');
			icon.attr('class', 'fas fa-sun text-light text-light');

		} else if (($('#theme_mode').attr('mode') == 'dark') || (storage == 'dark')) {
			localStorage.setItem('tema', 'light');
			element.classList.toggle("dark-mode");
			tema.attr('mode', 'light');
			icon.attr('class', 'fas fa-moon text-dark');
			icons.removeClass('text-light');
		}
	}



</script>
