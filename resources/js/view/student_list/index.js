document.addEventListener("DOMContentLoaded", function () {
    document.querySelectorAll(".delete-student").forEach((button) => {
        button.addEventListener("click", function () {
            let collectionCategory = JSON.parse(
                this.getAttribute("data-student"),
            );

            document.getElementById("student_delete_form").action = document
                .getElementById("student_delete_form")
                .action.replace("__ID__", collectionCategory.id);

            document.getElementById("student_to_delete").textContent =
                collectionCategory["category_name"];

            showDialogByID("delete_collection_category_modal");
        });
    });

    document.querySelectorAll(".view-collection_category").forEach((button) => {
        button.addEventListener("click", function () {
            let collectionCategory = JSON.parse(
                this.getAttribute("data-collection_category"),
            );
            document.getElementById("view_category_name").textContent =
                collectionCategory["category_name"];
            document.getElementById("view_category_description").textContent =
                collectionCategory["description"];
            showDialogByID("view_collection_category");
        });
    });

    document.querySelectorAll(".edit-collection_category").forEach((button) => {
        button.addEventListener("click", function () {
            let collectionCategory = JSON.parse(
                this.getAttribute("data-collection_category"),
            );

            console.log(collectionCategory);

            document.getElementById("collection_category_edit_form").action =
                document
                    .getElementById("collection_category_edit_form")
                    .action.replace("__ID__", collectionCategory["id"]);

            document.getElementById("edit_category_name").value =
                collectionCategory["category_name"];
            document.getElementById("edit_description").value =
                collectionCategory["description"];

            showDialogByID("edit_collection_category_modal");
        });
    });
});
