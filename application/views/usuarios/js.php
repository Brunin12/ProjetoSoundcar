<script>
  $('#foto').change(() => {
    const foto = $('#foto').prop('files')[0];
    const nome = $('#foto').prop('files')[0].name;

    $('#label-file').text(nome);
    $('.foto').html(`<img style="width: 50px; height: 50px;" src="${URL.createObjectURL(foto)}" class="rounded-circle shadow mt-4 border">`);
  });

</script>
