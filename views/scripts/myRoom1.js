function deleteRoom(nomPiece, id_piece) {
  if(confirm("Voulez-vous vraiment supprimer la pièce '" + nomPiece + "' ainsi que tous les dispositifs qui y sont présents ?")) {
    window.location = "index.php?cible=room_del&id_piece=" + id_piece;
  }
}
