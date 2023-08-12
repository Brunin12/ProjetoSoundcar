<?php
defined('BASEPATH') or exit('No direct script access allowed');
?>
<!DOCTYPE html>

<script>
	function buscarFuncionarios(el) {
		if (el.value !== '') {
			$.post("<?= base_url('funcionarios/buscar_funcionarios'); ?>",
				{
					buscar: el.value
				}, function (data) {
					$("#funcionarios").html(data);

				}
			);
		}
	}

	function deletarFuncionario(id) {
		Swal.fire({
			title: 'Tem certeza?',
			text: "Você quer mesmo deletar este funcionario?",
			icon: 'warning',
			showCancelButton: true,
			confirmButtonColor: '#3085d6',
			cancelButtonColor: '#d33',
			cancelButtonText: 'Não, cancelar!',
			confirmButtonText: 'Sim, Apagar!'
		}).then((result) => {
			if (result.isConfirmed) {
				Swal.fire(
					'Apagado!',
					'Seu funcionario foi excluido',
					'success'
				)
				$.post("<?= base_url('funcionarios/deletar_funcionario'); ?>",
					{
						id: id
					}, function (data) {

						buscarfuncionarios(document.getElementById('#buscar'));

					}
				);
			}
		});
	}
</script>
