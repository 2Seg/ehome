var i = 0;
var div = document.createElement("div");
div.id = "zoneAjout";
document.getElementById("form").appendChild(div);

function addRoom() {
  if(!document.getElementById("zoneAjout")) {
    i = 0;
    div = document.createElement("div");
    div.id = "zoneAjout";
    document.getElementById("form").appendChild(div);
  }
  var article = document.createElement("article");
  var div = document.createElement("div");
  var input = document.createElement("input");
  input.setAttribute("type", "text");
  input.setAttribute("placeholder", "Nom de la pièce à ajouter");
  input.name = "piece[]";
  input.setAttribute("required", "");
  article.id = "newArticle" + i;
  article.setAttribute("class", "room_article");
  div.id = "div" + i;
  document.getElementById("zoneAjout").appendChild(article);
  document.getElementById("newArticle" + i).appendChild(div);
  document.getElementById("div" + i).appendChild(input);
  i++;
}

function annuler() {
  document.getElementById("form").removeChild(document.getElementById("zoneAjout"));
  i = 0;
  div = document.createElement("div");
  div.id = "zoneAjout";
  document.getElementById("form").appendChild(div);
}
