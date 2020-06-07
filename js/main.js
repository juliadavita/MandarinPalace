// Hamburger menu slide functions

function openSlideMenu(){
        document.getElementById('menu').style.width = '250px';
        document.getElementById('content').style.marginLeft = '250px';
    }
function closeSlideMenu(){
        document.getElementById('menu').style.width = '0';
        document.getElementById('content').style.marginLeft = '0';
    }

function colorToggle(domObj){
    domObj.classList.toggle("clicked");
}

// Hides and shows the correct content when clicked on button

let menuButton = document.getElementById('showMenu');
menuButton.addEventListener("click", function(){
    console.log("hallo werkt dit");
    menuCard.style.display = "block"; 
    wineCard.style.display = "none";
    takeawayCard.style.display = "none";
    })

    let afhaalButton = document.getElementById('showAfhaal');
afhaalButton.addEventListener("click", function(){
    console.log("Afhaal");
    menuCard.style.display = "none"; 
    wineCard.style.display = "none";
    takeawayCard.style.display = "block";
    })

    let wineButton = document.getElementById('showWine');
wineButton.addEventListener("click", function(){
    console.log("Wijnen");
    menuCard.style.display = "none"; 
    wineCard.style.display = "block";
    takeawayCard.style.display = "none";
    })

    