function alertAddToCart(button,token){
    swal({
        title: "Are you sure?",
        text: "Delete this book...",
        buttons: true,
        })
        .then((willDelete) => {
        if (willDelete) {
            var id=$(button).val();
            $.ajax({
                type: 'DELETE',
                url: "/books/"+id,
                data: {'book_id':id,'_token':token,"_method": 'DELETE'},
                success:function(responce){
                    console.log(responce);
                    if (responce=="success"){
                        swal("Book deleted", {
                            icon: "success",
                        });
                    }
                    // else{
                    //     swal("This book already in your cart");
                    // }
                }
            });
        }
        });
}