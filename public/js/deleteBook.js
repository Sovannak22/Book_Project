function alertDelete(button,token){
    swal({
        title: "Are you sure?",
        text: "Delet this book",
        icon:"warning",
        buttons: true,
        })
        .then((willDelete) => {
        if (willDelete) {
            var id=$(button).val();
            $.ajax({
                type: 'DELETE',
                async: true,
                url: "/books/"+id,
                data: {'book_id':id,'_token':token,"_method": 'DELETE'},
                success:function(responce){
                    console.log(responce);
                    if (responce=="success"){
                        swal("Book deleted", {
                            icon: "success",
                            
                        })
                        .then((willReload)=>{
                            if(willReload){
                                location.reload();
                            }
                        });
                    }
                }
            });
        }
        });
}