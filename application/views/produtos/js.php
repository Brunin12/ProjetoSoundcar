<?php
defined('BASEPATH') or exit('No direct script access allowed');
?>


<script>
	function buscarProdutos(el) {
		if (el.value !== '') {

			$.post("<?php echo base_url('produtos/buscar_produtos'); ?>",
				{
					buscar: el.value
				}, function (data) {
					$("#produtos").html(data);

				}
			);

		}
	}

	function getCliente(el) {
		if (el.value !== '') {
			
			$.post("<?php echo base_url('produtos/get_cliente'); ?>",
					{
						buscar: el.value
					}, function (data) {
						alert(data)
						$("#cliente").html(data);

					}
				);

			}
		}

	function deletarProduto(id) {
		Swal.fire({
			title: 'Tem certeza?',
			text: "Você quer mesmo deletar este produto?",
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
					'Seu produto foi excluido',
					'success'
				)

				$.post(<?php echo '"' . base_url() . 'produtos/deletar_produto"'; ?>,
					{
						id: id
					}, function (data) {

						buscarProdutos(document.getElementById('#buscar'));

					}
				);
			}
		})

	}
</script>
