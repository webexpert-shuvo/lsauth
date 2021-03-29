(function($){

    //Document Ready
    $(document).ready(function(){

        $(document).on('click','a.logout_btncls',function(e){
            e.preventDefault();
            $('form#logout_form').submit();
        });

        //All Users Data function

        function allusers(){

            $.ajax({

                url : '/allusers',
                success : function(data){

                    $('tbody#allusersdata').html(data);

                }

            });

        }
        allusers();


        // User Modal Show

        $(document).on('click','a.add_user_btn_cls',function(e){
            e.preventDefault();
            $('#user_add_modal').modal('show');

            $('form#user_add_form').submit(function(e){
                e.preventDefault();

                $.ajax({

                    url : '/user-add',
                    method: "POST",
                    data: new FormData(this),
                    contentType: false,
                    processData: false,
                    success: function(data){
                        swal({
                            title: "Good job!",
                            text: "User Added Successful!",
                            icon: "success",
                            button: "Done!",
                          });

                        $('form#user_add_form')[0].reset();
                        $('#user_add_modal').modal('hide');
                        allusers();
                    }

                });
            });
        });


        //User Status Update

        $(document).on('click','a.status_btn_cls',function(e){
            e.preventDefault();
            let role_id = $(this).attr('user_status');
            $.ajax({

                url : '/user-update/'+role_id,
                success : function(data){

                    swal({
                        title: "Good job!",
                        text: "User Status Updated Successful!",
                        icon: "success",
                        button: "Done!",
                      });
                    allusers();
                }
            });
        });

        //User Modal form edit

        $(document).on('click','a.user_edit_cls',function(e){
            e.preventDefault();
            $('#user_edit_modal').modal('show');

            let roleedit = $(this).attr('user_edit');
            $.ajax({
                url : '/userup/'+roleedit,
                success : function(data){

                    $('form#user_edit_form input[name="name"]').val(data.name);
                    $('form#user_edit_form input[name="uname"]').val(data.uname);
                    $('form#user_edit_form input[name="email"]').val(data.email);
                    $('form#user_edit_form input[name="cell"]').val(data.cell);
                    $('form#user_edit_form input[name="ueditid"]').val(data.id);
                }

            });

            $('form#user_edit_form').submit(function(e){
                e.preventDefault();

                $.ajax({

                    url : '/uformup',
                    method : "POST",
                    data : new FormData(this),
                    contentType: false,
                    processData : false,
                    success : function(data){

                          $('form#user_edit_form')[0].reset();
                          $('#user_add_modal').modal('hide');
                          swal({
                            title: "Hurray!",
                            text: "User Data Updated Successful!",
                            icon: "success",
                            button: "Done!",
                          });
                          allusers();
                    }
                })
            });
        })

        //User Delete
        $(document).on('click','a.user_delete_cls',function(e){
            e.preventDefault();

            let delete_id = $(this).attr('user_edit');

            $.ajax({

                url : '/user-delete/'+delete_id,
                success : function(data){

                    swal({
                        title: "Hurray!",
                        text: "User Data Deleted Successful!",
                        icon: "success",
                        button: "Done!",
                      });
                      allusers();

                }
            })
        });

        //User ADD System

        $(document).on('click','a.add_role_btn_cls',function(e){
            e.preventDefault();

            $('#role_modal').modal('show');
            $('form#role_form').submit(function(r){
                r.preventDefault();

                $.ajax({

                    url : '/roleadd',
                    method : "POST",
                    data : new FormData(this),
                    contentType: false,
                    processData: false,
                    success : function(data){

                        swal({
                            title: "Hurray!",
                            text: "Role Added Successful!",
                            icon: "success",
                            button: "Done!",
                          });

                    }

                })

            });


        });






    });


})(jQuery)
