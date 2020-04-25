<div class = "col-lg-12">
    <button type = "button" class = "btn btn-primary btn-sm" data-toggle = "modal" data-target = "#register_dialog" style = "margin-right:10px">Add Product</button>
    <div class = "align-middle text-center">
        <i style = "cursor:pointer;font-size:large;margin-left:10px" class = "text-primary md-edit"></i><b> - Edit </b>   
        <i style = "cursor:pointer;font-size:large;margin-left:10px" class = "text-danger md-delete"></i><b> - Delete </b>
        <i style = "cursor:pointer;font-size:large;margin-left:10px" class = "text-success md-money-off"></i><b> - Special Price </b>
    </div>
    <br/>
    <div class = "table-responsive ">
        <div class = "form-group">
            <h5>Search Data Here</h5>
            <input id = "search_box" placeholder = "Search data here..." type = "text" class = "form-control form-control-sm col-lg-3 col-sm-12" onkeyup = "search()">
        </div>
        <table class = "table table-bordered table-hover table-striped">
            <thead>
                <tr>
                    <?php for($a = 0; $a<count($col); $a++):?>
                    <th id = "col<?php echo $a;?>" style = "cursor:pointer" onclick = "sort(<?php echo $a;?>)" class = "text-center align-middle"><?php echo $col[$a]["col_disp"];?> 
                    <?php if($a == 0):?>
                    <span class="badge badge-light align-top" id = "orderDirection">ASC</span>
                    <?php endif;?>
                    </th>
                    <?php endfor;?>
                    <th class = "text-center align-middle">Action</th>
                </tr>
            </thead>
            <tbody id = "content_container">
            </tbody>
        </table>
    </div>
    <nav aria-label="Page navigation example">
        <ul class="pagination justify-content-center" id = "pagination_container">
        </ul>
    </nav>
</div>
<div class = "modal fade" id = "register_dialog">
    <div class = "modal-dialog">
        <div class = "modal-content">
            <div class = "modal-header">
                <h4 class = "modal-title">Add Product Form</h4>
            </div>
            <div class = "modal-body">
                <form method = "POST" enctype="multipart/form-data" id="add_product_form"> 
                    <div class = "form-group">
                        <h5>Product Code</h5>
                        <input type = "text" class = "form-control" required id = "code" name = "code">
                    </div>
                    <div class = "form-group">
                        <h5>Product Name</h5>
                        <input type = "text" class = "form-control" required id = "name" name = "name">
                    </div>
                    <div class = "form-group">
                        <h5>Product Desc</h5>
                        <input type = "text" class = "form-control" required id = "desc" name = "desc">
                    </div>
                    <div class = "form-group">
                        <h5>Product Stock</h5>
                        <input type = "text" class = "form-control" required id = "stock" name = "stock">
                    </div>
                    <div class = "form-group">
                        <h5>Product Display</h5>
                        <input type = "file" required id = "img" name = "img">
                    </div>
                    <div class = "form-group">
                        <h5>Product Price</h5>
                        <input type = "text" class = "form-control" required id = "price" name = "price">
                    </div>
                    <div class = "form-group">
                        <button type = "button" class = "btn btn-sm btn-danger" data-dismiss = "modal">Cancel</button>
                        <button type = "button" onclick = "register_product()" class = "btn btn-sm btn-primary">Submit</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<div class = "modal fade" id = "update_dialog">
    <div class = "modal-dialog">
        <div class = "modal-content">
            <div class = "modal-header">
                <h4 class = "modal-title">Edit Product Form</h4>
            </div>
            <div class = "modal-body">
                <form method = "POST" enctype="multipart/form-data" id="edit_product_form">
                    <input type = "hidden" id = "id_edit" name = "id">
                    <div class = "form-group">
                        <h5>Product Code</h5>
                        <input type = "text" class = "form-control" required id = "code_edit" name = "code">
                    </div>
                    <div class = "form-group">
                        <h5>Product Name</h5>
                        <input type = "text" class = "form-control" required id = "name_edit" name = "name">
                    </div>
                    <div class = "form-group">
                        <h5>Product Desc</h5>
                        <input type = "text" class = "form-control" required id = "desc_edit" name = "desc">
                    </div>
                    <div class = "form-group">
                        <h5>Product Stock</h5>
                        <input type = "text" class = "form-control" required id = "stock_edit" name = "stock">
                    </div>
                    <div class = "form-group">
                        <h5>Product Display</h5>
                        <img id = "img_display_edit" class = "align-middle" style = "width:50%;margin:auto"><br/><br/>
                        <input type = "file" required id = "img_edit" name = "img">
                    </div>
                    <div class = "form-group">
                        <h5>Product Price</h5>
                        <input type = "text" class = "form-control" required id = "price_edit" name = "price">
                    </div>
                    <div class = "form-group">
                        <button type = "button" class = "btn btn-sm btn-danger" data-dismiss = "modal">Cancel</button>
                        <button type = "button" onclick = "update_product()" class = "btn btn-sm btn-primary">Submit</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<div class = "modal fade" id = "delete_dialog">
    <div class = "modal-dialog">
        <div class = "modal-content">
            <div class = "modal-header">
                <h4 class = "modal-title">Delete Product</h4>
            </div>
            <div class = "modal-body">
                <form action = "<?php echo base_url();?>alat/delete" method = "POST">
                <input type = "hidden" name = "attr_id" value = "" id = "attr_id_delete">
                    <h4 align = "center">Are you sure want to delete this product?</h4>
                    <table class = "table table-bordered table-striped table-hover">
                        <input type = "hidden" id = "id_delete">
                        <tr>
                            <th class = "align-middle text-center">Product Code</th>
                            <td class = "align-middle text-center" id = "code_delete"></td>
                        </tr>
                        <tr>
                            <th class = "align-middle text-center">Product Name</th>
                            <td class = "align-middle text-center" id = "name_delete"></td>
                        </tr>
                        <tr>
                            <th class = "align-middle text-center">Product Desc</th>
                            <td class = "align-middle text-center" id = "desc_delete"></td>
                        </tr>
                        <tr>
                            <th class = "align-middle text-center">Stock</th>
                            <td class = "align-middle text-center" id = "stock_delete"></td>
                        </tr>
                        <tr>
                            <th class = "align-middle text-center">Product Price</th>
                            <td class = "align-middle text-center" id = "price_delete"></td>
                        </tr>
                        <tr>
                            <th class = "align-middle text-center">Product Special Price</th>
                            <td class = "align-middle text-center" id = "price_delete"></td>
                        </tr>
                        <tr>
                            <th class = "align-middle text-center">Product Special Price End</th>
                            <td class = "align-middle text-center" id = "price_delete"></td>
                        </tr>
                        <tr>
                            <th class = "align-middle text-center">Product Display</th>
                            <td class = "align-middle text-center"><img id = "img_delete"></td>
                        </tr>
                    </table>
                    <div class = "row">
                        <button type = "button" class = "btn btn-sm btn-primary col-lg-3 col-sm-12 offset-lg-3" data-dismiss = "modal">Cancel</button>
                        <button type = "button" onclick = "remove_product()" class = "btn btn-sm btn-danger col-lg-3">Delete</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<div class = "modal fade" id = "register_dialog">
    <div class = "modal-dialog">
        <div class = "modal-content">
            <div class = "modal-header">
                <h4 class = "modal-title">Special Price Product Form</h4>
            </div>
            <div class = "modal-body">
                <form method = "POST" id="special_price_product_form"> 
                    <input type = "hidden" id = "id_spc_price" name = "id">
                    <div class = "form-group">
                        <h5>Special Price</h5>
                        <input type = "text" class = "form-control" required id = "spc_price" name = "spc_price">
                    </div>
                    <div class = "form-group">
                        <h5>End Special Price Date</h5>
                        <input type = "date" class = "form-control" required id = "spc_price_end" name = "spc_price_end">
                    </div>
                    <div class = "form-group">
                        <button type = "button" class = "btn btn-sm btn-danger" data-dismiss = "modal">Cancel</button>
                        <button type = "button" onclick = "update_spc_price()" class = "btn btn-sm btn-primary">Submit</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<script>
    var orderBy = 0;
    var orderDirection = "ASC";
    var searchKey = "";
    var page = 1;
    function refresh(req_page = 1) {
        page = req_page;
        $.ajax({
            url: "<?php echo base_url();?>f/product/list?orderBy="+orderBy+"&orderDirection="+orderDirection+"&page="+page+"&searchKey="+searchKey,
            type: "GET",
            dataType: "JSON",
            success: function(respond) {
                var html = "";
                if(respond["status"] == "SUCCESS"){
                    for(var a = 0; a<respond["content"].length; a++){
                        html += "<tr>";
                        html += "<input type = 'hidden' id = 'id"+a+"' value = '"+respond["content"][a]["id"]+"'>"
                        html += "<td class = 'align-middle text-center' id = 'code"+a+"'>"+respond["content"][a]["code"]+"</td>";
                        html += "<td class = 'align-middle text-center' id = 'name"+a+"'>"+respond["content"][a]["name"]+"</td>";
                        html += "<td class = 'align-middle text-center' id = 'desc"+a+"'>"+respond["content"][a]["desc"]+"</td>";
                        html += "<td class = 'align-middle text-center' id = 'stock"+a+"'>"+respond["content"][a]["stock"]+"</td>";
                        html += "<td class = 'align-middle text-center' id = 'img"+a+"'><a href = '<?php echo base_url();?>assets/upload/products/"+respond["content"][a]["img"]+"' target = '_blank' class = 'btn btn-primary btn-sm'>Product Image</a></td>";
                        html += "<td class = 'align-middle text-center' id = 'price"+a+"'>"+respond["content"][a]["price"]+"</td>";
                        html += "<td class = 'align-middle text-center' id = 'status"+a+"'>"+respond["content"][a]["status"]+"</td>";
                        html += "<td class = 'align-middle text-center'><i style = 'cursor:pointer;font-size:large' onclick = 'load_edit_content("+a+")' data-target = '#update_dialog' data-toggle = 'modal' class = 'text-primary md-edit'></i> | <i onclick = 'load_delete_content("+a+")' data-toggle = 'modal' data-target = '#delete_dialog' style = 'cursor:pointer;font-size:large' class = 'text-danger md-delete'></i> | <i onclick = 'load_special_price_content("+a+")' data-toggle = 'modal' data-target = '#special_price_dialog' style = 'cursor:pointer;font-size:large' class = 'text-success md-money-off'></i></td>";
                        html += "</tr>";
                    }
                }
                else{
                    html += "<tr>";
                    html += "<td colspan = 7 class = 'align-middle text-center'>No Records Found</td>";
                    html += "</tr>";
                }
                $("#content_container").html(html);

                html = "";
                if(respond["page"]["previous"]){
                    html += '<li class="page-item"><a class="page-link" onclick = "refresh('+(respond["page"]["before"])+')"><</a></li>';
                }
                else{
                    html += '<li class="page-item"><a class="page-link" style = "cursor:not-allowed"><</a></li>';
                }
                if(respond["page"]["before"]){
                    html += '<li class="page-item"><a class="page-link" onclick = "refresh('+(respond["page"]["before"])+')">'+respond["page"]["before"]+'</a></li>';
                }
                html += '<li class="page-item active"><a class="page-link" onclick = "refresh('+(respond["page"]["current"])+')">'+respond["page"]["current"]+'</a></li>';
                if(respond["page"]["after"]){
                    html += '<li class="page-item"><a class="page-link" onclick = "refresh('+(respond["page"]["after"])+')">'+respond["page"]["after"]+'</a></li>';
                }
                if(respond["page"]["next"]){
                    html += '<li class="page-item"><a class="page-link" onclick = "refresh('+(respond["page"]["after"])+')">></a></li>';
                }
                else{
                    html += '<li class="page-item"><a class="page-link" style = "cursor:not-allowed">></a></li>';
                }
                $("#pagination_container").html(html);
            },
            error: function(){
                var html = "";
                html += "<tr>";
                html += "<td colspan = 7 class = 'align-middle text-center'>No Records Found</td>";
                html += "</tr>";
                $("#content_container").html(html);
                
                html = "";
                html += '<li class="page-item"><a class="page-link" style = "cursor:not-allowed"><</a></li>';
                html += '<li class="page-item"><a class="page-link" style = "cursor:not-allowed">></a></li>';
                $("#pagination_container").html(html);
            }
        });
    }
    function sort(colNum){
        if(parseInt(colNum) != orderBy){
            orderBy = colNum; 
            orderDirection = "ASC";
            var orderDirectionHtml = '<span class="badge badge-light align-top" id = "orderDirection">ASC</span>';
            $("#orderDirection").remove();
            $("#col"+colNum).append(orderDirectionHtml);
        }
        else{
            var direction = $("#orderDirection").text();
            if(direction == "ASC"){
                orderDirection = "DESC";
            }
            else{
                orderDirection = "ASC";
            }
            $("#orderDirection").text(orderDirection);
        }
        refresh();
    }
    function search(){
        searchKey = $("#search_box").val();
        refresh();
    }
</script>
<script>
    function register_product(){
        var form = $("#add_product_form")[0];
        var data = new FormData(form);
        $.ajax({
            url:"<?php echo base_url();?>f/product/register",
            type:"POST",
            enctype:"multipart/form-data",
            dataType:"JSON",
            data:data,
            processData: false,
            contentType: false,
            cache: false,
            timeout: 800000,
            success:function(respond){
                $("#register_dialog").modal("hide");
                refresh(page);
            }
        });

    }
    function update_product(){
        var form = $("#edit_product_form")[0];
        var data = new FormData(form);
        $.ajax({
            url:"<?php echo base_url();?>f/product/update",
            type:"POST",
            dataType:"JSON",
            data:data,
            processData:false,
            contentType:false,
            cache:false,
            timeout:800000,
            success:function(respond){
                $("#update_dialog").modal("hide");
                refresh(page);
            }
        });
    }
    function remove_product(){
        var id_product = $("#id_delete").text();
        $.ajax({
            url:"<?php echo base_url();?>f/product/delete/"+id_product,
            type:"DELETE",
            dataType:"JSON",
            success:function(respond){
                $("#delete_dialog").modal("hide");
                refresh(page);
            }
        });

    }
</script>
<script>
    function load_edit_content(row){
        var id = $("#id"+row).val();
        var code = $("#code"+row).text();
        var name = $("#name"+row).text();
        var desc = $("#desc"+row).text();
        var stock = $("#stock"+row).text();
        var img = $("#img"+row+" a").attr("href");
        var price = $("#price"+row).text();
        var status = $("#status"+row).text();

        $("#id_edit").val(id);
        $("#code_edit").val(code);
        $("#name_edit").val(name);
        $("#desc_edit").val(desc);
        $("#stock_edit").val(stock);
        $("#price_edit").val(price);
        $("#status_edit").val(status);
        $("#img_display_edit").attr("src",img);
    }
    function load_delete_content(row){
        var id_delete = $("#id"+row).text(); 
        var name_delete = $("#name"+row).text(); 
        var email_delete = $("#email"+row).text(); 
        var phone_delete = $("#phone"+row).text(); 
        var nevel_delete = $("#level"+row).text(); 

        $("#id_delete").html(id_delete);
        $("#name_delete").html(name_delete);
        $("#email_delete").html(email_delete);
        $("#phone_delete").html(phone_delete);
        $("#nevel_delete").html(nevel_delete);
    }
</script>
<script>
    window.onload = function(){
        refresh();
    }
</script>