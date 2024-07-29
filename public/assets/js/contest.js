
function fetchContestantDetails(contestantId) {
    // Use AJAX to fetch contestant details
    $.ajax({
        url: '/ajax/contestants/' + contestantId, // Adjust the URL as needed
        method: 'GET',
        success: function(data) {
            var videoModal = new bootstrap.Modal(document.getElementById('videoModal'));
            var modalElement = videoModal._element; // Get the modal element
            modalElement.querySelector('#contestantName').innerText = data.name;
            modalElement.querySelector('#totalVotes').innerText = data.totalVotes;
            modalElement.querySelector('#videoPlayer').src = data.videoUrl;
            videoModal.show();
        },
        error: function() {
            alert('Error fetching contestant details.');
        }
    });
}

document.addEventListener("DOMContentLoaded", function() {
    $('#videoModal').on('hide.bs.modal', function () {
        var iframe = document.getElementById('videoPlayer');
        iframe.src = "";
    });
});