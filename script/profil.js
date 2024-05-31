var overlay = document.getElementById("overlay");
var zoomedImage = document.getElementById("zoomedImage");
var profilPic = document.getElementById("profilPic");

profilPic.addEventListener("click", function() 
{
    overlay.style.display = "block";
    zoomedImage.src = profilPic.src;
    zoomedImage.style.display = "block";
});

zoomedImage.addEventListener("click", function() 
{
    overlay.style.display = "none";
    zoomedImage.style.display = "none";
});