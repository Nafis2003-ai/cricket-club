function toggleDivs() {
    const batsmanRadio = document.getElementById('batsman');
    const bowlerRadio = document.getElementById('bowler');
    const batsmanDiv = document.getElementById('batman');
    const bowlerDiv = document.getElementById('boler');

    if (batsmanRadio.checked) {
        batsmanDiv.style.display = "block";
        bowlerDiv.style.display = "none";
    } else if (bowlerRadio.checked) {
        bowlerDiv.style.display = "block";
        batsmanDiv.style.display = "none";
    }
}

// Attach event listeners to the radio buttons
document.getElementById('batsman').addEventListener('change', toggleDivs);
document.getElementById('bowler').addEventListener('change', toggleDivs);

// Call the function once at the start to set the initial state
toggleDivs();