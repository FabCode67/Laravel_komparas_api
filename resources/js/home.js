document.addEventListener('DOMContentLoaded', function () {
    var mainDescription = document.getElementById('mainDescription');
    var contentDivs = mainDescription.getElementsByClassName('content');
    function displayContent() {
        for (var i = 0; i < contentDivs.length; i++) {
            contentDivs[i].style.display = 'none';
        }
        var currentContentDiv = contentDivs[currentContentIndex];
        currentContentDiv.style.display = 'block';
        var textContent = currentContentDiv.innerText;
        currentContentDiv.innerHTML = '';
        for (var i = 0; i < textContent.length; i++) {
            setTimeout(function (char) {
                return function () {
                    currentContentDiv.innerHTML += char;
                };
            }(textContent[i]), i * 50);
        }
        currentContentIndex = (currentContentIndex + 1) % contentDivs.length;
    }
    var initialDelay = 1000; 
    var currentContentIndex = 0;

    setTimeout(function () {
        displayContent();
        setInterval(displayContent, 5000); 
    }, initialDelay);
});