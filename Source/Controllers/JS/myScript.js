function sendComment(idPost){
    // event.preventDefault()
    if($("#"+idPost).val() == ""){
        console.log("Comentario vazio. Post n° " + idPost)
        alert("ERRO: Comentario vazio!!")
    }else{
        console.log("Comentario pronto para ser enviado. Post nº " + idPost)
        $.post(
            "Source/controllers/commentPost.php",
            {
                comment: $("#"+idPost).val(),
                id_post: idPost
            },
            function(data, status){
                console.log(data)
                $("#"+idPost).val("")
                $("#comment"+idPost).append(data)

            }
        )
    }
}