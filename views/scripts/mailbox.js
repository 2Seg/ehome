function deleteMail(idMail) {
  if(confirm("Voulez-vous vraiment supprimer ce message ?")) {
    window.location = "index.php?cible=mail_del&id_mail=" + idMail;
  }
}
