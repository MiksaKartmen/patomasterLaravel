document.addEventListener('DOMContentLoaded', function () {
    var successMessage = document.getElementById('success-message');

    if (successMessage) {
        setTimeout(function () {
            successMessage.style.transition = 'opacity 1s';
            successMessage.style.opacity = '0';
            setTimeout(function () {
                successMessage.parentNode.removeChild(successMessage);
            }, 1000);
        }, 3000);
    }
});

var nameProfile, surnameProfile, emailProfile;
window.onload = () => {
    $(document).on("click", ".btnNo", resetReservation)
    $(document).on("click", ".btnYes", confirmReservation)
    $(document).on("click", ".btn3", confirmReservation)
    $(document).on("click", ".btnDeleteAdmin", deleteAdmin)
    $(document).on("click", ".label-gallery", filterGallery)
    $(document).on("click", ".btn-reset-filter", resetFilters)
    $(document).on("change", "#dateFrom", filterLogs)
    $(document).on("change", "#dateTo", filterLogs)
    $(document).on("click", ".btn-reservations", showUserReservations)
    $(document).on("click", ".btn-profile-info", showUserInfo)
    $(document).on("click", ".btn-cancel-reservation", cancelReservation)

    nameProfile = $("#name-profile").val()
    surnameProfile = $("#surname-profile").val()
    emailProfile = $("#email-profile").val()

    $(document).on("blur", "#name-profile", changeInfo)
    $(document).on("blur", "#surname-profile", changeInfo)
    $(document).on("blur", "#email-profile", changeInfo)



}

//#region FUNCTIONS
function changeInfo(){
    let id = $(this).attr("id");
    let value = $(this).val();

    switch (id){
        case "name-profile":
            if(value != nameProfile){
                $(".btn-update-profile").prop("disabled", false);
            }
            else{
                $(".btn-update-profile").prop("disabled", true);
            }
            break;
        case "surname-profile":
            if(value != surnameProfile){
                $(".btn-update-profile").prop("disabled", false);
            }
            else{
                $(".btn-update-profile").prop("disabled", true);
            }
            break;
        case "email-profile":
            if(value != emailProfile){
                $(".btn-update-profile").prop("disabled", false);
            }
            else{
                $(".btn-update-profile").prop("disabled", true);
            }
            break;
    }
}

function cancelReservation(){
    let id = $(this).data("id")
    let email = $(this).data("email");
    let modal = $(".modalTable");
    let msg = $(".tableMessage");
    let buttons = $(".buttons");
    msg.html("Are you sure that you want to cancel this reservation?")
    modal.removeClass("d-none")
    buttons.removeClass("d-none")

    $(".btn-cancel-yes").click(function() {
        console.log(id)
        $.ajax({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            url:"/reservation/destroy/"+id,
            type:"post",
            dataType:"json",
            success:function (result){
                console.log(result)
                buttons.addClass("d-none")
                msg.html(result);
                setTimeout(()=>{
                    modal.addClass("d-none");
                    $(".btn-reservations").click()
                },2000)
            },
            error:function (xhr){
                console.error(xhr)
            }
        })
    });


    $(".btn-cancel-no").click(function() {
        msg.html("");
        modal.addClass("d-none");
        buttons.addClass("d-none");
    });
}

function showUserInfo(){
    let id = $(this).data("id")

    $.ajax({
        url:"/profile/info/"+id,
        type:"get",
        dataType:"json",
        success:function (result){
            printInfo(result)
        },
        error:function (xhr){
            console.error(xhr)
        }
    })
}

function printInfo(info){
    let html =
                        `
                        <div class="row mb-3">
                            <div class="col-sm-3 d-flex align-items-center">
                                <h6 class="mb-0">Name</h6>
                            </div>
                            <div class="col-sm-9 text-secondary">
                                <input type="text" class="form-control" name="name" value="${info.name}">
                            </div>
                        </div>
                        <div class="row mb-3">
                            <div class="col-sm-3 d-flex align-items-center">
                                <h6 class="mb-0">Surname</h6>
                            </div>
                            <div class="col-sm-9 text-secondary">
                                <input type="text" class="form-control" name="surname" value="${info.surname}">
                            </div>
                        </div>
                        <div class="row mb-3">
                            <div class="col-sm-3 d-flex align-items-center">
                                <h6 class="mb-0">Email</h6>
                            </div>
                            <div class="col-sm-9 text-secondary">
                                <input type="text" class="form-control"  name="email" value="${info.email}">
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-sm-3"></div>
                            <div class="col-sm-9 text-secondary">
                                <input type="button" class="btn btn-dark px-4" value="Save Changes">
                            </div>
                        </div>
                        `;

    $("#info-reservations").html(html)
}

function showUserReservations(){

    let email = $(this).data("email");

    $.ajax({
        url:"/profile/"+email,
        type:"get",
        dataType:"json",
        success:function (result){
            printReservations(result)
        },
        error:function (xhr){
            console.error(xhr)
        }
    })
}

function printReservations(reservations){
    let html = ``;

    if(reservations.length == 0){
        html +=
                `
                <p class="alert alert-danger">No reservations for this user.</p>
                `
    }
    else{
        html +=
            `
                    <table class="table">
                        <thead>
                            <tr>
                                <th>Num.</th>
                                <th>Name</th>
                                <th>Surname</th>
                                <th>Email</th>
                                <th>Phone</th>
                                <th>Date</th>
                                <th>Time</th>
                                <th>People</th>
                                <th>Table</th>
                                <th>Cancel</th>
                            </tr>
                        </thead>

                    `
        let counter = 0
        for (let r of reservations){
            html +=
                    `
                     <tbody>
                        <tr>
                            <td>${++counter}</td>
                            <td>${r.name}</td>
                            <td>${r.surname}</td>
                            <td>${r.email}</td>
                            <td>${r.phone}</td>
                            <td>${r.date}</td>
                            <td>${r.time}</td>
                            <td>${r.people}</td>
                            <td>${r.table}</td>
                            <td><button data-id="${r.id}" data-email="${r.email}" class="btn btn-danger btn-cancel-reservation">Cancel</button></td>
                        </tr>
                    </tbody>
                    `
        }

        html += `</table>`
    }
    $("#info-reservations").html(html);

}

function filterLogs(){
    let dateFrom = $("#dateFrom").val();
    let dateTo = $("#dateTo").val();
    console.log(dateFrom)
    const today = new Date();
    const yyyy = today.getFullYear();
    let mm = today.getMonth() + 1; // Months start at 0!
    let dd = today.getDate();

    if (dd < 10) dd = '0' + dd;
    if (mm < 10) mm = '0' + mm;

    const formattedToday = yyyy+"-"+mm+"-"+dd;
    let value = {};

    if ((dateFrom && dateFrom <= formattedToday) && (dateTo && dateTo >= dateFrom)){
        $.ajax({
            url:'admin/filter/'+dateFrom+"/"+dateTo,
            type:'get',
            dataType: 'json',
            success:function (result){
                showLogs(result)
            },
            error:function (xhr){
                console.error(xhr)
            }
        })
    }


}

function showLogs(logs){
    let html = ``;
    if(logs.length == 0){
        html +=
            `
                <p class="alert alert-danger">No logs for this date range.</p>
                `

    }
    else{
        let counter = 0;
        for (let l of logs){
            html +=
                `
                <tr>
                    <td>${++counter}</td>
                    <td>${l.message}</td>
                    <td>${l.log_type.name}</td>
                    <td>${l.date}</td>
                </tr>
                `
        }

    }
    $(".log-body").html(html)


}

function resetFilters(){

}

function filterGallery(){
    let id = $(this).data("id");

    $.ajax({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        url:"/gallery/"+id,
        type:"get",
        dataType:"json",
        success:function (result){
            showImages(result)
        },
        error:function (xhr){
            console.log(xhr)        }
    })
}

function showImages(images){
    let html = ``;
    for (let i of images){
        html += `
                <div class="item-gallery isotope-item bo-rad-10 hov-img-zoom events guests">

                    <img src='assets/images/${i.src}' alt="IMG-GALLERY">

                    <div class="overlay-item-gallery trans-0-4 flex-c-m">
                        <a class="btn-show-gallery flex-c-m fa fa-search" href="assets/images/${i.src}" data-lightbox="gallery"></a>
                    </div>
                </div>`
    }
    $(".wrap-gallery").html(html);
}

function deleteAdmin(){
    let id = $(this).data("id")
    let table = $(this).data("table")
    let object = id+" "+table
    $.ajax({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        url:"/admin/"+object,
        method:"delete",
        success:function (result){
            console.log(result)
        },
        error:function (xhr){
            location.reload("true");
        }
    })
}

function confirmReservation() {
    let date = $("#date").val();
    let time = $("#ddlTime").val();
    let people = $("#ddlPeople").val()
    let name = $("#name").val()
    let phone = $("#phone").val()
    let email = $("#email").val()

    let btnExists = $(".buttons").hasClass("d-none") ? true : false;
    console.log(btnExists);
    if (isSet(date,name,phone,email)){
        $.ajax({
            type:"POST",
            url: "/reservation/bookTable",
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            data: {
                date: date,
                time: time,
                people: people,
                name: name,
                phone: phone,
                email: email,
                btn:btnExists
            },
            success: function (data) {
                data = JSON.parse(data)
                if(data.booking){
                    $(".tableMessage").html(data.message)
                    $(".modalTable").removeClass("d-none")
                    $(".buttons").removeClass("d-none")

                }
                else{
                    $(".tableMessage").html(data.message)
                    $(".buttons").addClass("d-none")
                    $(window).click(function (){
                        $(".modalTable").addClass("d-none")
                        $(".buttons").removeClass("d-none")
                        setTimeout(()=>{
                            location.reload("true");
                        },700)
                    })
                    $(".wrap-form-reservation")[0].reset();
                }
                if($(".modalTable").hasClass("d-none")){
                    $(".modalTable").removeClass("d-none")
                }

            },
            error: function (error) {
                // Handle the error response
                console.error(error);
            }
        })
    }
    else {
        if($(".modalTable").hasClass("d-none")){
            $(".modalTable").removeClass("d-none")
        }
        $(".tableMessage").html("You need to first fill out the form. Thanks.")
        $(".buttons").addClass("d-none")
        setTimeout(()=>{
            $(".modalTable").addClass("d-none")
        },2000)
    }

}

function isSet(...val){
    for (let v of val){
        if(v == "" || v=="0"){
            return false
        }

    }
    return true;
}

function resetReservation(){
    $(".wrap-form-reservation")[0].reset();
    $(".modalTable").addClass("d-none");
}
//#endregion
