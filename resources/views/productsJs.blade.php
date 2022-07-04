<script>
    $(document).ready(function() {
		$('.minus').click(function () {
            var $input = $(this).parent().find('input');
			var count = parseInt($input.val()) - 1;
			count = count < 1 ? 1 : count;
			$input.val(count);
            changePrice(count, $(this).parent().siblings("#price"));
			$input.change();
			return false;
		});

		$('.plus').click(function () {
			var $input = $(this).parent().find('input');
            var count = parseInt($input.val()) + 1
			$input.val(count);
            changePrice(count, $(this).parent().siblings("#price"));
			$input.change();
			return false;
		});

        $(document).on('click', '#add_to_cart', function(){
            var product_id = $(this).data('id');
            var $input = $(this).parent().find('input');
			var no_of_items = parseInt($input.val());

            $.ajax({
                url:"{{ route('addToCart') }}",
                method:"POST",
                data:{
                    "_token": "{{ csrf_token() }}",
                    id:product_id,
                    no:no_of_items,
                }
             });

             $(this).parent().append('<p class ="message" style="margin-top:10px; color: #28a745;">Products added to cart</p>');
             setTimeout(hideMsg, 2000);
        });

        $(document).on('click', '#checkout', function(){
            $.ajax({
                url:"{{ route('checkout') }}",
                method:"POST",
                data:{
                    "_token": "{{ csrf_token() }}",
                },
                success: function(data) {
                    $.ajax({
                        url:"{{ route('placeOrder') }}",
                        method:"POST",
                        data:{
                        "_token": "{{ csrf_token() }}",
                        }
                    }); 
                }
             });

            

            $(this).parent().append('<p class ="message" style="position:absolute; top:10px; right:150px; color: #007bff;">Your order is placed</p>');
            setTimeout(hideMsg, 1000);
        });
        
        function hideMsg(){
            $(".message").fadeOut();
        }
       
        function changePrice(count, priceElement){
            $price = priceElement.data('value');
            $price = "$" + (count * $price);
            priceElement.text($price);
        }
	});
</script>