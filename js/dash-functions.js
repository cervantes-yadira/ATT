const ADMIN = 1;
let viewRole = role;

// Returns the viewRole set by server
function isAdmin(){
    return viewRole === ADMIN;
}

// Shows a div with a message at the top of the screen. Removes the div after supplied timeout time
function showToast(message, length) {
    const toastContainer = $('#toastContainer');

    toastContainer.addClass('alert-show');
    toastContainer.removeClass('alert-hide');
    $('#toastText').text(message);
    setTimeout(() => {
        toastContainer.removeClass('alert-show');
        toastContainer.addClass('alert-hide');
    }, length)
}