const logo = document.createElement("a");
logo.id = "logo";
logo.href = "/";
const img = document.createElement("img");
img.src = "/wp-content/uploads/2021/03/logo.png";
logo.appendChild(img);
const old = document.querySelector("#login h1");
document.querySelector("#login").replaceChild(logo, old);

const body = document.querySelector("body");
const background = document.createElement("div");
background.classList.add("bg");
let bg = Math.floor((Math.random() * 5) + 1);
background.style.backgroundImage = "url('/wp-content/themes/heavenhold/assets/img/backgrounds/login-" + bg + ".jpg')";
body.appendChild(background);
  
const discord = document.createElement("a");
discord.href = "https://discord.com/api/oauth2/authorize?client_id=938634637423562814&redirect_uri=https%3A%2F%2Fheavenhold.com%2Fwp-json%2Fdiscord%2Fcallback&response_type=code&scope=identify%20email";
discord.classList.add("discord-login");

const icon = document.createElement("i");
icon.classList.add("fab");
icon.classList.add("fa-discord");

const discordText = document.createElement("span");
discordText.innerText = "Log In with Discord";

discord.appendChild(icon);
discord.appendChild(discordText);

document.querySelector("#loginform").appendChild(discord);

const credit = document.createElement("a");
credit.classList.add("art-credit");
credit.href = "https://instagram.com/far.lyx";

const label = document.createElement("span");
label.classList.add("credit-label");
label.innerText = "Artist:";

const artist = document.createElement("span");
artist.classList.add("credit-artist");
artist.innerText = "Farlyx";

credit.appendChild(label);
credit.appendChild(artist);
body.appendChild(credit);