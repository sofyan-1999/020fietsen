var options = {
  valueNames: [ 'image', 'title', 'price']
};

var productList = new List('products', options);

$('.sort').on('change', function() {
   var col = $('.sort').val();
   if (col == "asc")
   {
       productList.sort("price", {
            order: "asc"

        })
   }

   if (col == "desc")
   {
       productList.sort("price", {
            order: "desc"

        })
   }
});
