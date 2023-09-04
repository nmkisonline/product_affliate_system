$("#registerNewUser").submit(function (event) {
    event.preventDefault();
    var pass1 = $('#pass1').val();
    var pass2 = $('#pass2').val();
    if (pass1 != pass2) {
        Swal.fire({
            icon: 'error',
            title: 'Password mismatch',
            text: 'Password don\'t match!'
        })
        return;
    }

    $.ajax({
        url: "serverside/post.php",
        type: "POST",
        data: {
            func: 1,
            fname: $("#fname").val(),
            lname: $("#lname").val(),
            nft_id: $("#nft_id").val(),
            phone: $("#phone_no").val(),
            email: $("#email").val(),
            password: $("#pass1").val(),
        },
        success: function (data) {
            console.log(data);
            if (data.trim() == "true") {
                Swal.fire({
                    icon: 'success',
                    title: 'success',
                    text: 'User register successfully!',
                }).then((result) => {
                   location.reload();
                })

            } else if (data.trim() == "email-exist") {
                Swal.fire(
                    'Email Exists?',
                    'Please try with different email address?',
                    'question'
                )
            } else {
                Swal.fire({
                    icon: 'error',
                    title: 'Oops...',
                    text: 'Failed to register user!'
                })
            }
        }
    });
});
//login
$("#loginUserForm").submit(function (event) {
    event.preventDefault();
    $.ajax({
        url: "serverside/post.php",
        type: "POST",
        data: {
            func: 2,
            email: $("#email").val(),
            password: $("#password").val()
        },
        success: function (data) {
            if (data.trim() == "true") {
                window.location.href = "index.php";
            } else {
                $("#result").html(data);
                $("#result").show();
            }
        }
    });
});
function DeleteUser(id) {
    Swal.fire({
        title: 'Are you sure?',
        // showDenyButton: true,
        showCancelButton: true,
        confirmButtonText: 'Yes',
        // denyButtonText: `Don't delete`,
    }).then((result) => {
        /* Read more about isConfirmed, isDenied below */
        if (result.isConfirmed) {
            $.ajax({
                url: "serverside/post.php",
                type: "post",
                data: {
                    func: 3,
                    id: id,
                },
                success: function (data) {
                    console.log(data);
                    if (data.trim() == "true") {
                        Swal.fire({
                            icon: 'success',
                            title: 'success',
                            text: 'User deleted successfully!',
                        }).then((result) => {
                            location.reload();
                        })
                    } else {
                        Swal.fire({
                            icon: 'error',
                            title: 'Oops...',
                            text: 'Failed to delete user!'
                        })
                    }
                }//success function
            });//ajax
        }
        // else if (result.isDenied) {
        //     Swal.fire('You don\nt delete user', '', 'info')
        // }
    })
}//delete user
function blockUser(id) {
    Swal.fire({
        title: 'Are you sure?',
        // showDenyButton: true,
        showCancelButton: true,
        confirmButtonText: 'Yes',
    }).then((result) => {
        /* Read more about isConfirmed, isDenied below */
        if (result.isConfirmed) {
            $.ajax({
                url: "serverside/post.php",
                type: "POST",
                data: {
                    func: 4,
                    id: id,
                },
                success: function (data) {
                    if (data.trim() == "true") {
                        Swal.fire({
                            icon: 'success',
                            title: 'success',
                            text: 'User block successfully!',
                        }).then((result) => {
                            location.reload();
                        })
                    } else {
                        Swal.fire({
                            icon: 'error',
                            title: 'Oops...',
                            text: 'Failed to block user!'
                        })
                    }
                }//success
            });//ajax
        }
    })


}//block user
function activeUser(id) {
    Swal.fire({
        title: 'Are you sure?',
        // showDenyButton: true,
        showCancelButton: true,
        confirmButtonText: 'Yes',
        // denyButtonText: `Don't active`,
    }).then((result) => {
        /* Read more about isConfirmed, isDenied below */
        if (result.isConfirmed) {
            $.ajax({
                url: "serverside/post.php",
                type: "POST",
                data: {
                    func: 5,
                    id: id,
                },
                success: function (data) {
                    if (data.trim() == "true") {
                        Swal.fire({
                            icon: 'success',
                            title: 'success',
                            text: 'User active successfully!',
                        }).then((result) => {
                            location.reload();
                        })
                    } else {
                        Swal.fire({
                            icon: 'error',
                            title: 'Oops...',
                            text: 'Failed to active user!'
                        })
                    }
                }//success
            });//ajax
        }
            // else if (result.isDenied) {
        //     Swal.fire('You don\nt active user', '', 'info')
        // }
    })
}//active user

$("#updateUserInfo").submit(function (event) {
    event.preventDefault();
    $.ajax({
        url: "serverside/post.php",
        type: "POST",
        data: {
            func: 6,
            userid: $("#uid").val(),
            fname: $("#fname").val(),
            lname: $("#lname").val(),
            email: $("#email").val(),
            nft_id: $("#nft_id").val(),
            mobile: $("#phone_no").val(),

        },
        success: function (data) {
            console.log(data);
            if (data.trim() == "true") {
                Swal.fire({
                    icon: 'success',
                    title: 'success',
                    text: 'User profile updated successfully!',
                }).then((result) => {
                    location.reload();
                })
            }else {
                Swal.fire({
                    icon: 'error',
                    title: 'Oops...',
                    text: 'Failed to update user profile!'
                })
            }
        }//succes
    });//ajax
});//update profile
//update password
$("#updatePassword").submit(function (event){
    event.preventDefault();
    var oldpass = $('#currentpass').val();
    var newpass = $('#newpass').val();
    var confirmpass = $('#cofirmpass').val();
    if(oldpass =="" || newpass=="" || confirmpass == ""){
        Swal.fire({
            icon: 'error',
            title: 'error',
            text: 'Please fill all fields!'
        })
        return;
    } else if(newpass != confirmpass){
        Swal.fire({
            icon: 'error',
            title: 'Password mismatch',
            text: 'Password don\'t match!'
        })
        return;
    }else{
        $.ajax({
            url:"serverside/post.php",
            type:"POST",
            data:{
                func:7,
                oldpass:oldpass,
                newpass:newpass,
                confirmpass:confirmpass,
                userId:$("#up_id").val(),
            },
            success: function (data){
                if(data.trim()=="true"){
                    Swal.fire({
                        icon: 'success',
                        title: 'updated',
                        text: 'User password updated successfully!',
                    }).then((result) => {
                        location.reload();
                    })
                }else{
                    Swal.fire({
                        icon: 'error',
                        title: 'Oops...',
                        text: 'Failed to update user password!'
                    })
                }
            }
        });
    }
});