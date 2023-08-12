<?php
defined('BASEPATH') or exit('No direct script access allowed');
?>
<!DOCTYPE html>

<script>
	function buscarFornecedores(el) {
		if (el.value !== '') {
			$.post("<?= base_url('fornecedores/buscar_fornecedores'); ?>",
				{
					buscar: el.value
				}, function (data) {
					$("#fornecedores").html(data);

				}
			);
		}
	}

	function deletarFornecedor(id) {
		Swal.fire({
			title: 'Tem certeza?',
			text: "Você quer mesmo apagar este fornecedor?",
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
					'Este fornecedor foi excluido',
					'success'
				)

				$.post("<?php echo base_url('fornecedores/deletar_fornecedor'); ?>",
					{
						id: id
					}, function (data) {
						
						buscarFornecedores(document.getElementById('buscar'));

					}
				);
			}
		});
	}
</script>
