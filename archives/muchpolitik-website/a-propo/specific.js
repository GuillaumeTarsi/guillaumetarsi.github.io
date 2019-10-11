function playAudio() {
	document.getElementById('audio-player').play();
}

function playAudioAfterDelay() {
	setTimeout("playAudio()", 2000);
}