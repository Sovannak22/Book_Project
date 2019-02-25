
function alertAddToCart(button){
    swal({
        title: "Are you sure?",
        text: "Add this book to your cart.",
        buttons: true,
        })
        .then((willAdd) => {
        if (willAdd) {
            var id=$(button).val();
            $.ajax({
                type: 'get',
                url: "/addBookToCart",
                data: 'book_id=' + id,
                success:function(responce){
                    console.log(responce);
                    swal("Book added to your cart.", {
                    icon: "success",
                    });
                }
            });
        }
        });
}