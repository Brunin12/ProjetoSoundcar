<?php
defined('BASEPATH') or exit('No direct script access allowed');
?>
<!DOCTYPE html>

<script>
	function buscarClientes(el) {

		if (el.value !== '') {

			$.post(<?php echo '"' . base_url() . 'clientes/buscar_clientes"'; ?>,
				{
					buscar: el.value
				}, function (data) {
					
					$("#clientes").html(data);

				}
			);
		}
	}

	function deletarCliente(id) {
		Swal.fire({
			title: 'Tem certeza?',
			text: "Você quer mesmo deletar este cliente?",
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
					'Seu cliente foi excluido',
					'success'
				)
				$.post(<?php echo '"' . base_url() . 'clientes/deletar_cliente"'; ?>,
					{
						id: id
					}, function (data) {

						buscarclientes(document.getElementById('#buscar'));

					}
				);
			}
		});
	}
</script>
