<div class = "col-lg-12">
    <button type = "button" class = "btn btn-primary btn-sm" data-toggle = "modal" data-target = "#register_dialog" style = "margin-right:10px">Add Account</button>
    <div class = "align-middle text-center">
        <i style = "cursor:pointer;font-size:large;margin-left:10px" class = "text-primary md-edit"></i><b> - Edit </b>   
        <i style = "cursor:pointer;font-size:large;margin-left:10px" class = "text-danger md-delete"></i><b> - Delete </b>
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
                <h4 class = "modal-title">Add Account Form</h4>
            </div>
            <div class = "modal-body">
                <div class = "form-group">
                    <h5>Account Name</h5>
                    <input type = "text" class = "form-control" required id = "name">
                </div>
                <div class = "form-group">
                    <h5>Account Email</h5>
                    <input type = "email" class = "form-control" required id = "email">
                </div>
                <div class = "form-group">
                    <h5>Account Password</h5>
                    <input type = "password" class = "form-control" required id = "pswd">
                </div>
                <div class = "form-group">
                    <h5>Account Phone</h5>
                    <input type = "text" class = "form-control" required id = "phone">
                </div>
                <div class = "form-group">
                    <h5>Account Level</h5>
                    <select class = "form-control" required id = "level">
                        <option value = "USER">USER</option>
                        <option value = "ADMIN">ADMIN</option>
                    </select>
                </div>
                <div class = "form-group">
                    <button type = "button" class = "btn btn-sm btn-danger" data-dismiss = "modal">Cancel</button>
                    <button type = "button" onclick = "register_account()" class = "btn btn-sm btn-primary">Submit</button>
                </div>
            </div>
        </div>
    </div>
</div>
<div class = "modal fade" id = "update_dialog">
    <div class = "modal-dialog">
        <div class = "modal-content">
            <div class = "modal-header">
                <h4 class = "modal-title">Edit Account Form</h4>
            </div>
            <div class = "modal-body">
                <input type = "hidden" id = "id_edit">
                <div class = "form-group">
                    <h5>Account Name</h5>
                    <input type = "text" class = "form-control" required id = "name_edit">
                </div>
                <div class = "form-group">
                    <h5>Account Email</h5>
                    <input type = "email" class = "form-control" required id = "email_edit">
                </div>
                <div class = "form-group">
                    <h5>Account Phone</h5>
                    <input type = "text" class = "form-control" required id = "phone_edit">
                </div>
                <div class = "form-group">
                    <h5>Account Level</h5>
                    <select class = "form-control" required id = "level_edit">
                        <option value = "USER">USER</option>
                        <option value = "ADMIN">ADMIN</option>
                    </select>
                </div>
                <div class = "form-group">
                    <h5>Account Status</h5>
                    <select class = "form-control" required id = "status_edit">
                        <option value = "ACTIVE">ACTIVE</option>
                        <option value = "NOT ACTIVE">NOT ACTIVE</option>
                    </select>
                </div>
                <div class = "form-group">
                    <button type = "button" class = "btn btn-sm btn-danger" data-dismiss = "modal">Cancel</button>
                    <button type = "button" onclick = "update_account()" class = "btn btn-sm btn-primary">Submit</button>
                </div>
            </div>
        </div>
    </div>
</div>
<div class = "modal fade" id = "delete_dialog">
    <div class = "modal-dialog">
        <div class = "modal-content">
            <div class = "modal-header">
                <h4 class = "modal-title">Delete Account</h4>
            </div>
            <div class = "modal-body">
                <form action = "<?php echo base_url();?>alat/delete" method = "POST">
                <input type = "hidden" name = "attr_id" value = "" id = "attr_id_delete">
                    <h4 align = "center">Are you sure want to delete this account?</h4>
                    <table class = "table table-bordered table-striped table-hover">
                        <input type = "hidden" id = "id_delete">
                        <tr>
                            <th class = "align-middle text-center">Account Name</th>
                            <td class = "align-middle text-center" id = "name_delete"></td>
                        </tr>
                        <tr>
                            <th class = "align-middle text-center">Account Email</th>
                            <td class = "align-middle text-center" id = "email_delete"></td>
                        </tr>
                        <tr>
                            <th class = "align-middle text-center">Account Phone</th>
                            <td class = "align-middle text-center" id = "phone_delete"></td>
                        </tr>
                        <tr>
                            <th class = "align-middle text-center">Account Level</th>
                            <td class = "align-middle text-center" id = "nevel_delete"></td>
                        </tr>
                    </table>
                    <div class = "row">
                        <button type = "button" class = "btn btn-sm btn-primary col-lg-3 col-sm-12 offset-lg-3" data-dismiss = "modal">Cancel</button>
                        <button type = "button" onclick = "remove_account()" class = "btn btn-sm btn-danger col-lg-3">Delete</button>
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
            url: "<?php echo base_url();?>f/account/list?orderBy="+orderBy+"&orderDirection="+orderDirection+"&page="+page+"&searchKey="+searchKey,
            type: "GET",
            dataType: "JSON",
            success: function(respond) {
                var html = "";
                if(respond["status"] == "SUCCESS"){
                    for(var a = 0; a<respond["content"].length; a++){
                        html += "<tr>";
                        html += "<td class = 'align-middle text-center' id = 'id"+a+"'>"+respond["content"][a]["id"]+"</td>";
                        html += "<td class = 'align-middle text-center' id = 'name"+a+"'>"+respond["content"][a]["name"]+"</td>";
                        html += "<td class = 'align-middle text-center' id = 'email"+a+"'>"+respond["content"][a]["email"]+"</td>";
                        html += "<td class = 'align-middle text-center' id = 'phone"+a+"'>"+respond["content"][a]["phone"]+"</td>";
                        html += "<td class = 'align-middle text-center' id = 'level"+a+"'>"+respond["content"][a]["level"]+"</td>";
                        html += "<td class = 'align-middle text-center' id = 'status"+a+"'>"+respond["content"][a]["status"]+"</td>";
                        if(respond["content"][a]["id"] != "<?php echo $this->session->id_submit_acc;?>"){
                            html += "<td class = 'align-middle text-center'><i style = 'cursor:pointer;font-size:large' onclick = 'load_edit_content("+a+")' data-target = '#update_dialog' data-toggle = 'modal' class = 'text-primary md-edit'></i> | <i onclick = 'load_delete_content("+a+")' data-toggle = 'modal' data-target = '#delete_dialog' style = 'cursor:pointer;font-size:large' class = 'text-danger md-delete'></i></td>";
                        }
                        else{
                            html += "<td></td>";
                        }
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
    function register_account(){
        var name = $("#name").val();
        var email = $("#email").val();
        var pswd = $("#pswd").val();
        var phone = $("#phone").val();
        var level = $("#level").val();
        $.ajax({
            url:"<?php echo base_url();?>f/account/register",
            type:"POST",
            dataType:"JSON",
            data:{
                name:name,
                email:email,
                pswd:pswd,
                phone:phone,
                level:level
            },
            success:function(respond){
                $("#register_dialog").modal("hide");
                refresh(page);
            }
        });

    }
    function update_account(){
        var id = $("#id_edit").val();
        var name = $("#name_edit").val();
        var email = $("#email_edit").val();
        var phone = $("#phone_edit").val();
        var level = $("#level_edit").val();
        var status = $("#status_edit").val();
        $.ajax({
            url:"<?php echo base_url();?>f/account/update",
            type:"POST",
            dataType:"JSON",
            data:{
                id:id,
                name:name,
                email:email,
                phone:phone,
                level:level,
                status:status
            },
            success:function(respond){
                $("#update_dialog").modal("hide");
                refresh(page);
            }
        });
    }
    function remove_account(){
        var id_account = $("#id_delete").text();
        $.ajax({
            url:"<?php echo base_url();?>f/account/delete/"+id_account,
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
        var id = $("#id"+row).text();
        var name = $("#name"+row).text();
        var email = $("#email"+row).text();
        var phone = $("#phone"+row).text();
        var status = $("#status"+row).text();
        var level = $("#level"+row).text();

        $("#id_edit").val(id);
        $("#name_edit").val(name);
        $("#email_edit").val(email);
        $("#phone_edit").val(phone);
        $("#level_edit").val(level);
        $("#status_edit").val(status);
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