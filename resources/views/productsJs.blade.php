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
        });

        function changePrice(count, priceElement){
            $price = priceElement.data('value');
            $price = "$" + (count * $price);
            priceElement.text($price);
        }
	});
</script>