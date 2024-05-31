//Placement des carrés blancs aléatoires sur la page d'accueil.
const getRandomPosition = () => Math.floor(Math.random() * 99)

const getRandomAngle = () => Math.floor(Math.random() * 360);

const rotatedDiv1 = document.getElementById('rotated-div1');
const rotatedDiv2 = document.getElementById('rotated-div2');
const rotatedDiv3 = document.getElementById('rotated-div3');
const rotatedDiv4 = document.getElementById('rotated-div4');
const rotatedDiv5 = document.getElementById('rotated-div5');
const rotatedDiv6 = document.getElementById('rotated-div6');
const rotatedDiv7 = document.getElementById('rotated-div7');
const rotatedDiv8 = document.getElementById('rotated-div8');

rotatedDiv1.style.transform = `rotate(${getRandomAngle()}deg)`;
rotatedDiv1.style.left = `${getRandomPosition()}%`;
rotatedDiv1.style.top = `${getRandomPosition()}%`;

rotatedDiv2.style.transform = `rotate(${getRandomAngle()}deg)`;
rotatedDiv2.style.left = `${getRandomPosition()}%`;
rotatedDiv2.style.top = `${getRandomPosition()}%`;

rotatedDiv3.style.transform = `rotate(${getRandomAngle()}deg)`;
rotatedDiv3.style.left = `${getRandomPosition()}%`;
rotatedDiv3.style.top = `${getRandomPosition()}%`;

rotatedDiv4.style.transform = `rotate(${getRandomAngle()}deg)`;
rotatedDiv4.style.left = `${getRandomPosition()}%`;
rotatedDiv4.style.top = `${getRandomPosition()}%`;

rotatedDiv5.style.transform = `rotate(${getRandomAngle()}deg)`;
rotatedDiv5.style.left = `${getRandomPosition()}%`;
rotatedDiv5.style.top = `${getRandomPosition()}%`;

rotatedDiv6.style.transform = `rotate(${getRandomAngle()}deg)`;
rotatedDiv6.style.left = `${getRandomPosition()}%`;
rotatedDiv6.style.top = `${getRandomPosition()}%`;

rotatedDiv7.style.transform = `rotate(${getRandomAngle()}deg)`;
rotatedDiv7.style.left = `${getRandomPosition()}%`;
rotatedDiv7.style.top = `${getRandomPosition()}%`;

rotatedDiv8.style.transform = `rotate(${getRandomAngle()}deg)`;
rotatedDiv8.style.left = `${getRandomPosition()}%`;
rotatedDiv8.style.top = `${getRandomPosition()}%`;

const rotatedDiv9 = document.getElementById('rotated-div1.1');
const rotatedDiv10 = document.getElementById('rotated-div2.1');
const rotatedDiv11 = document.getElementById('rotated-div3.1');
const rotatedDiv12 = document.getElementById('rotated-div4.1');
const rotatedDiv13 = document.getElementById('rotated-div5.1');
const rotatedDiv14 = document.getElementById('rotated-div6.1');
const rotatedDiv15 = document.getElementById('rotated-div7.1');
const rotatedDiv16 = document.getElementById('rotated-div8.1');

rotatedDiv9.style.transform = `rotate(${getRandomAngle()}deg)`;
rotatedDiv9.style.left = `${getRandomPosition()}%`;
rotatedDiv9.style.top = `${getRandomPosition()}%`;

rotatedDiv10.style.transform = `rotate(${getRandomAngle()}deg)`;
rotatedDiv10.style.left = `${getRandomPosition()}%`;
rotatedDiv10.style.top = `${getRandomPosition()}%`;

rotatedDiv11.style.transform = `rotate(${getRandomAngle()}deg)`;
rotatedDiv11.style.left = `${getRandomPosition()}%`;
rotatedDiv11.style.top = `${getRandomPosition()}%`;

rotatedDiv12.style.transform = `rotate(${getRandomAngle()}deg)`;
rotatedDiv12.style.left = `${getRandomPosition()}%`;
rotatedDiv12.style.top = `${getRandomPosition()}%`;

rotatedDiv13.style.transform = `rotate(${getRandomAngle()}deg)`;
rotatedDiv13.style.left = `${getRandomPosition()}%`;
rotatedDiv13.style.top = `${getRandomPosition()}%`;

rotatedDiv14.style.transform = `rotate(${getRandomAngle()}deg)`;
rotatedDiv14.style.left = `${getRandomPosition()}%`;
rotatedDiv14.style.top = `${getRandomPosition()}%`;

rotatedDiv15.style.transform = `rotate(${getRandomAngle()}deg)`;
rotatedDiv15.style.left = `${getRandomPosition()}%`;
rotatedDiv15.style.top = `${getRandomPosition()}%`;

rotatedDiv16.style.transform = `rotate(${getRandomAngle()}deg)`;
rotatedDiv16.style.left = `${getRandomPosition()}%`;
rotatedDiv16.style.top = `${getRandomPosition()}%`;

var bouton = document.getElementById('boutonRedirection');
bouton.addEventListener('click', function() {
    window.location.href = 'Rechercher_entreprise.php';
});