const items = document.querySelectorAll('.quest button');

function togglequest() {
  const itemToggle = this.getAttribute('aria-expanded');

  for (i = 0; i < items.length; i++) {
    items[i].setAttribute('aria-expanded', 'false');
  }

  if (itemToggle == 'false') {
    this.setAttribute('aria-expanded', 'true');
  }
}

items.forEach((item) => item.addEventListener('click', togglequest));


let calcScrollValue = () => {
	let scrollProgress = document.getElementById("scrbtn");
	let progressValue = document.getElementById("scrbtn-value");
	let pos = document.documentElement.scrollTop;
	let calcHeight =
	  document.documentElement.scrollHeight -
	  document.documentElement.clientHeight;
	let scrollValue = Math.round((pos * 100) / calcHeight);
	if (pos > 100) {
	  scrollProgress.style.display = "grid";
	} else {
	  scrollProgress.style.display = "none";
	}
	scrollProgress.addEventListener("click", () => {
	  document.documentElement.scrollTop = 0;
	});
	scrollProgress.style.background = `conic-gradient(#77C1E0 ${scrollValue}%, #d7d7d7 ${scrollValue}%)`;
  };
  
  window.onscroll = calcScrollValue;
  window.onload = calcScrollValue;