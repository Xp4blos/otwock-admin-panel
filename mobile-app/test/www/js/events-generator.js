const obj = { "limit":10 };
const xmlhttp = new XMLHttpRequest();
xmlhttp.onload = function() {
  const myObj = JSON.parse(this.responseText);
  document.write(`<!DOCTYPE html>
  <html lang="en">
  <head>
      <meta charset="UTF-8">
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <title>Zdarzenia w okolicy</title>
      <link rel="stylesheet" href="css/scroll.css">
      <link href="css/bootstrap.min.css" rel="stylesheet" />
  </head>`);
  document.write(`<header>Zdarzenia w okolicy </header>`);
  document.write(`<main>`);
  document.write(`<div class="scrollable-container">`);
  for (let x in myObj) {
    textToWrite = `<div class="scrollable-content"><div class="card"><h2 class="card-title">${myObj[x].name}</h2><hr><p class="card-description">${myObj[x].des}</p><p class="card-date">${myObj[x].nazwa}</p><p class="card-date">${myObj[x].ulica}</p></div></div>`;
    document.write(textToWrite);
  }
  document.write(`</div>`);
  document.write(`</main>`);
  document.write(`<div class="navbar">
  <div class="icon-container">
      <a href="user-info.html">
          <img src="img/user-solid.svg" alt="user icon" class="navbar-icons"> 
      </a> 
      <br>
      <!-- <a href="user-info.html">
          Informacje o użytkowniku
      </a>    -->
  </div>
  <div class="icon-container">
      <a href="index.html">
          <img src="img/map-solid.svg" alt="map icon" class="navbar-icons">
      </a>
  </div>
  <div class="icon-container">
      <a href="events.html">
          <img src="img/triangle-exclamation-solid.svg" alt="map icon" class="navbar-icons">
      </a>
      <br>
  </div>
</div>`)
};
xmlhttp.open("GET", "http://192.168.43.167:8080/git/otwock-admin-panel/json.php?r=1");
xmlhttp.send();