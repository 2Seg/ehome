function deleteMail(idMail, previousPage) {
  if(confirm("Voulez-vous vraiment supprimer ce message ?")) {
    window.location = "index.php?cible=mail_traitement&id_mail=" + idMail + "&page_precedente=" + previousPage;
  }
}

function printMail(idMail) {
  window.location = "index.php?cible=answer_mail&id_mail=" + idMail;
}
