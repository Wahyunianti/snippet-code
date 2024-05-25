document.addEventListener('click', function(event) {
    if (event.target.classList.contains('copy-button')) {
        const index = event.target.getAttribute('data-index');
        const code = document.getElementById('code-block-' + index).textContent;
        const textarea = document.createElement('textarea');
        textarea.value = code;
        document.body.appendChild(textarea);
        textarea.select();
        document.execCommand('copy');
        document.body.removeChild(textarea);
        event.target.textContent = 'Copied';
        setTimeout(function() {
            event.target.textContent = 'Copy';
        }, 3000);
    }
});