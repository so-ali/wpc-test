import DataTable from 'datatables.net-dt';

(function ($) {
    function wpcLoadUsersList(){
        if ($("#wpc-users").length <= 0){
            return;
        }

        let table = new DataTable('#wpc-users', {
            paging: false,
            serverSide: false,
            columns: [
                {data: 'id'},
                {data: 'name'},
                {data: 'username'},
                {data: 'email'},
                {
                    data: null,
                    orderable: false,
                    render: function (data, type, row) {
                        return '<a href="' + row.id + '" class="show-popup" data-id="' + row.id + '">View User</a>';
                    }
                },
            ],
            processing: true,
            ajax: {
                url: WPC.ajax,
                type: 'POST',
                data: {action: "wpc_users_list", nonce: WPC.nonce},
            }
        });
    }
    function wpcLoadUserPage(userID){
        if ($(".user-card").length <= 0){
            return;
        }
        $(".loading").show();
        $.ajax({
            url: WPC.ajax,
            method: "POST",
            data: {
                action: "wpc_user_info",
                user_id: userID,
                nonce: WPC.nonce
            }
        }).done(function (response) {
            if (!response.success) {
                $(".loading").text(response.data.message);
                return;
            }
            $(".loading").hide();
            $(".user-card").slideDown("fast");
            $(".user--name").text(response.data.name);
            $(".user--url").text(response.data.website);
            $(".user--phone").text(response.data.phone);
            $(".user--email").text(response.data.email);
            $(".user--username").text(response.data.username);
            $(".user--company").text(response.data.company.name);
            $(".user--company-detail").text(response.data.company.catchPhrase);
            $(".user--address-street").text(response.data.address.street);
            $(".user--address-suite").text(response.data.address.suite);
            $(".user--address-city").text(response.data.address.city);
        });
    }
    function wpcLoadUserPopup(userID){
        if ($(".user-popup").length <= 0){
            return;
        }
        $(".user-popup").addClass("show");
        $(".user-popup .popup-content").text("Loading...");
        $.ajax({
            url: WPC.ajax,
            method: "POST",
            data: {
                action: "wpc_user_info",
                user_id: userID,
                nonce: WPC.nonce,
                html: "yes"
            }
        }).done(function (response) {
            if (!response.success) {
                $(".loading").text(response.data.message);
                $(".user-popup .popup-content").text("");
                return;
            }
            $(".user-popup .popup-content").html(response.data);
        });
    }

    $(document).on("ready", wpcLoadUsersList);
    $(document).on("ready", function () {
        if (WPC.single !== "" && !isNaN(WPC.single)){
            wpcLoadUserPage(WPC.single);
        }
    });

    $(document).on("click","#wpc-users .show-popup[data-id]",function (e) {
        e.preventDefault();

        wpcLoadUserPopup($(this).attr("data-id"));
    });

    $(document).on("click",".user-popup .popup-close",function (e) {
        e.preventDefault();
        $(this).parents(".user-popup").removeClass("show");
    });
})(jQuery);