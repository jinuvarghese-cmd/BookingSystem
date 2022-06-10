<script>
   $(document).ready(function() {
        var html = '';
        var slNo = 0;
        $(document).on('click', '#add', function(){
            var name = $('#name').text();
            var description = $('#description').text();
            var price = $('#price').text().trim();

            $.ajax({
                url:"{{ route('products.create') }}",
                method:"POST",
                data:{
                    "_token": "{{ csrf_token() }}",
                    name:name,
                    description:description,
                    price:price
                     },
                success:function(data){
                    $('#message').html('');
                    $('#message').html(data);
                    reload();
                },
                error: function (xhr) {
                    $('#message').html('');
                    $.each(xhr.responseJSON.errors, function(key,value) {
                        $('#message').append('<div class="alert alert-danger">'+value+'</div');
                    }); 
                 }
             });
        });

        $(document).on('click', '.update', function(){
            var name = $(this).closest('tr').find('.name').text();
            var description = $(this).closest('tr').find('.description').text();
            var price = $(this).closest('tr').find('.price').text().trim();
            var id = $(this).attr("id");
  
            $.ajax({
                url:"{{ route('products.update') }}",
                method:"POST",
                data:{
                    "_token": "{{ csrf_token() }}",
                    name:name,
                    description:description,
                    price:price, 
                    id:id
                },
                success:function(data){
                    $('#message').html('');
                    $('#message').html(data);
                    reload();
                },
                error: function (xhr) {
                    $('#message').html('');
                    $.each(xhr.responseJSON.errors, function(key,value) {
                        $('#message').append('<div class="alert alert-danger">'+value+'</div');
                    }); 
                 }
            })
        });

        $(document).on('click', '.delete', function(){
           var id = $(this).attr("id");
           if(confirm("Are you sure you want to delete this record?"))
            {
                $.ajax({
                url:"{{ route('products.delete') }}",
                method:"POST",
                data:{
                    "_token": "{{ csrf_token() }}",
                    id:id,
                },
                success:function(data)
                 {
                  $('#message').html(data);
                  reload();
                 }
             });
           }
        });

        function reload() {
            $.ajax({
                url: "{{ route('products.reload') }}",
                data:{
                "_token": "{{ csrf_token() }}"},
                method:"post",
                dataType: "json",
                success: function(data) {
                    var links = data.links;
                    html = '';
                    html += '<tr>';
                    html += '<td></td>';
                    html += '<td contenteditable id="name"></td>';
                    html += '<td contenteditable id="description"></td>';
                    html += '<td contenteditable id="price"></td>';
                    html += '<td><button type="button" class="btn btn-success btn-xs" id="add">Add</button></td>';
                    html += '</tr>';
                    var products = data.products;
                    slNo = (products.per_page * (products.current_page - 1));
                    products.data.forEach(list);
                    $('tbody').html(html);
                    $('.links-for-pagination').empty().html(links);
                }
           });
        }

        function list(product){
            slNo++;
            html += '<tr>';
            html +=  '<td contenteditable class="id"><p>' + slNo + '</p></td>';
            html +=  '<td contenteditable class="name"><p>' + product.name + '</p></td>';
            html +=  '<td contenteditable class="description"><p>' + product.description + '</p></td>';
            html +=  '<td contenteditable class="price"><p>$' + product.price + '</p></td>';

            html += '<td>';
            html += '<button type="button" class="btn btn-danger btn-xs update" id="' + product.id + '">Update</button>';
            html += '<button type="button" class="btn btn-danger btn-xs delete" id="' + product.id + '">Delete</button>';
            html += '</td>';
            html += '</tr>';
        }
    });
</script>