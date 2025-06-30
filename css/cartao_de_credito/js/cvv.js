document.addEventListener("DOMContentLoaded", function () {
    const cvvDiv = document.getElementById('cvv');
    const iconeOlho = '<i class="fa-solid fa-eye-slash"></i>';
    const cvvNumerico = '123'; 
    let showingText = false;
    cvvDiv.style.transition = "opacity 0.3s ease";
    cvvDiv.addEventListener('click', function () {
        cvvDiv.style.opacity = 0;
        setTimeout(function () {
            if (!showingText) {
                cvvDiv.innerHTML = `CVV: ${cvvNumerico}`;
            } else {
                cvvDiv.innerHTML = `CVV: ${iconeOlho}`;
            }
            showingText = !showingText;
            cvvDiv.style.opacity = 1;
        }, 300);
    });
});