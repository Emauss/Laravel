window.addEventListener("DOMContentLoaded", (event) => {
    document.querySelectorAll(".remove").forEach((btn) => {
        btn.addEventListener("click", removeUser);
    });
});

const removeUser = (event) => {
    const id = event.target.getAttribute("data");
    Swal.fire({
        title: "Are you sure?",
        text: "You won't be able to revert this!",
        icon: "warning",
        showCancelButton: true,
        confirmButtonText: "Yes, delete it!",
        cancelButtonText: "No, cancel!",
        reverseButtons: true,
    }).then((result) => {
        if (result.isConfirmed) {
            jQuery
                .ajax({
                    method: "DELETE",
                    url: `${deleteUrl}${id}`,
                })
                .done((response) => {
                    document.querySelector(`tr[data-id="${id}"]`).remove();
                    Swal.fire("Deleted!", "User has been deleted.", "success");
                })
                .fail((res) => {
                    Swal.fire(
                        "Oops...",
                        res.responseJSON.message,
                        res.responseJSON.status
                    );
                    console.log(res.responseJSON.message);
                });
        } else if (result.dismiss === Swal.DismissReason.cancel) {
            Swal.fire("Cancelled", "User is safe :)", "error");
        }
    });
};
