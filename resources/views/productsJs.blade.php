<script>
   $(document).ready(function() {
        var html = '';
        $(document).on('click', '#add', function(){
            var name = $('#name').text();
            var description = $('#description').text();
            var price = $('#price').text().slice(1);

            if(name != '' && description != '' && price != '')
            {
                $.ajax({
                 url:"{{ route('products.create') }}",
                 method:"POST",
                 data:{
                    "_token": "{{ csrf_token() }}",
                    name:name,
                    description:description,
                    price:price
                     },
                success:function(data)
                {
                    $('#message').html(data);
                    reload();
                }
                });
            }
            else
            {
            $('#message').html("<div class='alert alert-danger'>Please type in the details</div>");
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
                    html += '<tr>';
                    html += '<td></td>';
                    html += '<td contenteditable id="name"></td>';
                    html += '<td contenteditable id="description"></td>';
                    html += '<td contenteditable id="price"></td>';
                    html += '<td><button type="button" class="btn btn-success btn-xs" id="add">Add</button></td>';
                    html += '</tr>';
                    data.forEach(list);
                    $('tbody').html(html);
                }
           });
        }

        function list(product){
            keys = Object.keys(product);
            values = Object.values(product);
            product = [];
            for(var i = 0; i < keys.length; i++){
                product[keys[i]] = values[i];
            }
            html += '<tr>';
            for (var key in product) {
                var value = product[key];
                var editable = '';
                (key == 'id') ? editable = '' :  editable = 'contenteditable';
                (key == 'price') ? (value = '$' + value) :  value = value;
                html +=  '<td ' + editable + ' class=' + key + '>';
                html +=  '<p>' + value + '</p>';
                html +=   '</td>';
            }

            html += '<td>';
            html += '<button type="button" class="btn btn-danger btn-xs update">Update</button>';
            html += '<button type="button" class="btn btn-danger btn-xs update">Delete</button>';
            html += '</td>';
            html += '</tr>';
        }
    });
</script>