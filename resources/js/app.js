require('./bootstrap');

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
            branch.on('click', function (e) {
                if (this == e.target) {
                    var icon = $(this).children('i:first');
                    icon.toggleClass(openedClass + " " + closedClass);
                    $(this).children().children().toggle();
                }
            })
            branch.children().children().toggle();
        });
        //fire event from the dynamically added icon
        tree.find('.branch .indicator').each(function () {
            $(this).on('click', function () {
                $(this).closest('li').click();
            });
        });
        //fire event to open branch if the li contains an anchor instead of text
        tree.find('.branch>a').each(function () {
            $(this).on('click', function (e) {
                $(this).closest('li').click();
                e.preventDefault();
            });
        });
        //fire event to open branch if the li contains a button instead of text
        tree.find('.branch>button').each(function () {
            $(this).on('click', function (e) {
                $(this).closest('li').click();
                e.preventDefault();
            });
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
