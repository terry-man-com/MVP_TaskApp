// ボタン
document.querySelectorAll('.judge-button').forEach((button) => {
    button.addEventListener("click", (e) => {
        const clickedButton = e.target;
        const parent = clickedButton.closest(".judge-button-area");
        const buttons = parent.querySelectorAll(".judge-button");

        buttons.forEach( btn => {
            if (btn == clickedButton) {
                btn.classList.add("is-pushed-button");
            }
            btn.setAttribute('disabled', '');
        });
    });
});

// リセット
const resetButton = document.getElementById('reset-button');

resetButton.addEventListener('click', () => {
  document.querySelectorAll('.judge-button').forEach( btn => {
    btn.classList.remove("is-pushed-button");
    btn.removeAttribute('disabled');
    });
  });
