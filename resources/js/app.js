require('./bootstrap');


//TREE VIEW CATEGORY



$.fn.extend({
    treed: function (o) {

        var openedClass = 'fas fa-minus';
        var closedClass = 'fas fa-plus';

        if (typeof o != 'undefined') {
            if (typeof o.openedClass != 'undefined') {
                openedClass = o.openedClass;
            }
            if (typeof o.closedClass != 'undefined') {
                closedClass = o.closedClass;
            }
        };

        //initialize each of the top levels
        var tree = $(this);
        tree.addClass("tree");
        tree.find('li').has("ul").each(function () {
            var branch = $(this); //li with children ul
            branch.prepend("<i class='indicator " + closedClass + "'></i>");
            branch.addClass('branch');
            branch.children().children().toggle();

        });

    }
});
/* Initialization of treeviews */
$('#tree1').treed();



/*=============================================
| CATEGORY SECTION JS
|============================================*/

const categoryForm = $('#categoryForm');
const categorySelect = $('#categorySelect');

/*==========
| ADD BTN
|=========*/

$('#addCategoryBtn').click(function (e) {
    e.preventDefault();
    addAction = $(this).attr("data-link")
    categoryForm.attr('action', addAction);
    categoryForm.submit();
});

/*==========
| EDIT BTN
|=========*/

$('#editCategoryBtn').click(function (e) {
    e.preventDefault();

    editAction = $(this).attr("data-link") + "/" + categorySelect.val();
    categoryForm.attr('action', editAction);
    categoryForm.prepend('<input name="_method" type="hidden" value="PUT" />').submit();
    // console.log(editAction);
});

/*==========
| DELETE BTN
|=========*/

$('#deleteCategoryBtn').click(function (e) {
    e.preventDefault();

    deleteAction = $(this).data("link") + "/" + categorySelect.val();
    categoryForm.attr('action', deleteAction);
    categoryForm.prepend('<input name="_method" type="hidden" value="DELETE" />');

    Swal.fire({
        title: 'Are you sure you want to delete this?',
        text: "You won't be able to revert this!",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#60B2E5',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Yes, delete it!'
    }).then((result) => {
        if (result.value) {
            categoryForm.submit();
        }
    })

});

/*=============================================
| ASSET SECTION JS
|============================================*/

function readURL(input) {
    if (input.files && input.files[0]) {
        var reader = new FileReader();

        reader.onload = function (e) {
            document.getElementById('asset-image-preview').src = e.target.result;
        }

        reader.readAsDataURL(input.files[0]); // convert to base64 string
    }
}

$("#imageUpload").change(function () {
    readURL(this);
    $('#asset-image-preview').removeClass('d-none');
});

function readURL2(input) {
    if (input.files && input.files[0]) {
        var reader = new FileReader();

        reader.onload = function (e) {
            document.getElementById('editasset-image-preview').src = e.target.result;
        }

        reader.readAsDataURL(input.files[0]); // convert to base64 string
    }
}

$("#imageEditUpload").change(function () {
    readURL2(this);
    $('#editasset-image-preview').removeClass('d-none');
});

/*==========
| DELETE BTN
|=========*/

$('.deleteAssetBtn').click(function (e) {
    e.preventDefault();

    deleteForm = "#" + $(this).data("form");

    Swal.fire({
        title: 'Are you sure you want to delete this?',
        text: "You won't be able to revert this!",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#60B2E5',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Yes, delete it!'
    }).then((result) => {
        if (result.value) {
            $(deleteForm).submit();
        }
    })

});

/*=============================================
| REQUISITION SECTION JS
|============================================*/

$('.showRequestModal').click(function (e) {
    e.preventDefault();

    const requestId = $(this).data('id');
    const requestCode = $(this).data('code');
    const requestStatus = $(this).data('status');
    const modal = $('#requestShowModal');

    $.get('requisitions/' + requestId, function (data) {
        modal.modal();
        modal.on('shown.bs.modal', function () {
            modal.find('.modal-title').text("Request Code: " + requestCode)
            modal.find('.modal-body').html(data);
            $('#requestLoader').hide();

            $('.updateRequestStatusBtn').click(function (e) {
                e.preventDefault();
                $('#requestLoader').show();
                url = "requisitions/" + $(this).data('id');
                status = $('#editRequestStatus').val();
                csrf = $('meta[name=csrf-token]').attr('content');

                $.ajax({
                    url: url,
                    type: "PUT",
                    headers: {
                        'X-CSRF-TOKEN': csrf
                    },
                    data: {
                        'requisition_status_id': status
                    },
                    success: function (response) {
                        status = response.status;
                        id = response.status_id;
                        indexStatus = "#requestStatusIndex" + requestId;
                        $('#requestStatus').removeClass();
                        $(indexStatus).removeClass();

                        console.log($(indexStatus));

                        switch (id) {
                            case "1":
                                $('#requestStatus').addClass("ml-2 badge badge-warning");
                                $(indexStatus).addClass("badge badge-warning");
                                break;
                            case "2":
                                $('#requestStatus').addClass("ml-2 badge badge-info");
                                $(indexStatus).addClass("badge badge-info");
                                break;
                            case "3":
                                $('#requestStatus').addClass("ml-2 badge badge-success");
                                $(indexStatus).addClass("badge badge-success");
                                break;
                            case "4":
                                $('#requestStatus').addClass("ml-2 badge badge-danger");
                                $(indexStatus).addClass("badge badge-danger");
                                break;
                        }

                        $('#requestStatus').text(status);
                        $(indexStatus).text(status);

                        $('#requestLoader').hide();
                    }
                })
            })
            modal.on('hidden.bs.modal', function () {
                modal.find('.modal-body').html('');
            })
        })
    })
})
