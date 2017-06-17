var i = 0;
var div = document.createElement("div");
div.id = "zoneAjout";
document.getElementById("form").appendChild(div);

function addDevice() {
  if(!document.getElementById("zoneAjout")) {
    i = 0;
    div = document.createElement("div");
    div.id = "zoneAjout";
    document.getElementById("form").appendChild(div);
  }
  var dispositifs = ["-- Sélectionnez un dispositif --", "Capteur de luminosité", "Capteur de température",
                    "Capteur d'humidité", "Détecteur de mouvement", "Détecteur de fumée", "Actionneur chauffage",
                    "Actionneur climatisation", "Actionneur porte", "Actionneur fenêtre", "Actionneur volet",
                    "Actionneur portail", "Actionneur lumière", "Caméra de surveillance", "Alarme"];
  var article = document.createElement("article");
  var div = document.createElement("div");
  var select = document.createElement("select");
  article.id = "newArticle" + i;
  article.setAttribute("class", "device_article");
  div.id = "div" + i;
  select.id = "select" + i;
  select.name = "dispositif[]";
  select.setAttribute("required", "");
  document.getElementById("zoneAjout").appendChild(article);
  document.getElementById("newArticle" + i).appendChild(div);
  document.getElementById("div" + i).appendChild(select);
  for(var j = 0; j < dispositifs.length; j++) {
    var option = document.createElement("option");
    if (j === 0) {
      option.text = dispositifs[j];
      option.value = "";
    } else {
      option.text = option.value = dispositifs[j];
    }
    document.getElementById("select" + i).appendChild(option);
  }
  i++;

}

function annuler() {
  document.getElementById("form").removeChild(document.getElementById("zoneAjout"));
  i = 0;
  div = document.createElement("div");
  div.id = "zoneAjout";
  document.getElementById("form").appendChild(div);
}
