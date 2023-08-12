<script>


  function verificaTema() {
    var element = document.body;
    var icon = $('#theme_icon');
    var tema = $('#theme_mode');
    var storage = localStorage.getItem('tema');

    if (storage == 'dark') {
      element.classList.toggle("dark-mode");
      tema.attr('mode', 'dark');
      icon.attr('class', 'fas fa-sun text-light text-light');
    }
  }

  $(window).on('load', function () {
    function hidePreloader() {
      $('#preloader').css({ opacity: 0 }).fadeTo(500, 1, function () {
        $('#preloader').hide();
      });
    }
    hidePreloader();
  });

  

  function trocarTema() {
    var element = document.body;
    var icon = $('#theme_icon');
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
    }
  }

  $(() => {
    toastr.options.timeOut = 5000;// 5 segundos
    setInterval(() => {
      $.post("<?= base_url() . 'acessos/esta_logado'; ?>")
    }, 120000);
    verificaTema();

    <?php if (isset($msg)) {
      echo "toastr.success('" . $msg . "', 'Sucesso!')";
    }
    if (isset($erro)) {
      echo "toastr.error('" . $erro . "', 'Ops!')";
    }
    ?>

  });




  document.addEventListener("DOMContentLoaded", function () {
    const os = OverlayScrollbars(document.querySelectorAll("body"), {
      clipAlways: false
    });
    window.os = os
    const blocks = document.querySelectorAll('div.block')

    function scrollIntoViewIfNeeded(el) {
      const height = window.innerHeight || document.documentElement.clientHeight
      const { top, bottom } = el.getBoundingClientRect()
      console.log('h', height, 't', top, 'b', bottom)
      if (top < height * 0.1 || bottom > height * 0.9) {
        // almost does not scroll near the bottom and
        // does not scroll at the bottom
        os.update() // THE FIX!!!
        os.scroll({ el, block: "center" }, 200)

        // does not scroll to the bottom!
        //os.scroll({y:'100%'}, 1000)
      }
    }

    blocks.forEach(b => {
      const title = b.children[0]
      const body = b.children[1]
      title.addEventListener('click', () => {
        if (body.style.display != "block") {
          body.style.display = 'block'
          scrollIntoViewIfNeeded(b)
        } else {
          body.style.display = "none"
        }
      })
    })

  });
</script>
