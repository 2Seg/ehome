function deleteDevice(nomDispositif, id_dispositif, nomPiece, id_piece) {
  if(confirm("Voulez-vous vraiment supprimer le dispositif '" + nomDispositif + "' de la pièce '" + nomPiece + "' ?")) {
    window.location = "index.php?cible=device_del&id_device=" + id_dispositif + "&id_piece=" + id_piece;
  }
}
