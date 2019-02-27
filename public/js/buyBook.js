function alertBuyBook(button,token){
    swal({
        title: "Are you sure?",
        text: "Buy this book?",
        icon:"info",
        buttons: true,
        })
        .then((willBuy) => {
        if (willBuy) {
            var id=$(button).val();
            $.ajax({
                type: 'POST',
                url: "/buy_book",
                data: {'book_id':id,'_token':token},
                success:function(responce){
                    console.log(responce);
                    if (responce=="success"){
                        swal("You bougth this book...", {
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