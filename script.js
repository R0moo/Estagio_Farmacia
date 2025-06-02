document.addEventListener('DOMContentLoaded', function () {
  const cor1Input = document.querySelector('input[name="cor1"]');
  const cor2Input = document.querySelector('input[name="cor2"]');

  function aplicarTema(corPrimaria, corHover) {
    document.documentElement.style.setProperty('--cor-tema', corPrimaria);
    document.documentElement.style.setProperty('--cor-hover', corHover || corPrimaria);
  }

  aplicarTema(cor1Input.value, cor2Input.value);

  cor1Input.addEventListener('input', () => aplicarTema(cor1Input.value, cor2Input.value));
  cor2Input.addEventListener('input', () => aplicarTema(cor1Input.value, cor2Input.value));
});