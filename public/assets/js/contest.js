
function fetchContestantDetails(contestantId) {
    // Use AJAX to fetch contestant details
    $.ajax({
        url: '/ajax/contestants/' + contestantId, // Adjust the URL as needed
        method: 'GET',
        success: function(data) {
            var videoModal = new bootstrap.Modal(document.getElementById('videoModal'));
            var modalElement = videoModal._element; // Get the modal element
            modalElement.querySelector('#contestantName').innerText = data.name;
            modalElement.querySelector('#videoDescription').innerText = data.description;
            modalElement.querySelector('#totalVotes').innerText = data.totalVotes;
            modalElement.querySelector('#videoPlayer').src = data.videoUrl;

            // Generate shareable links for social media
            const shareText = `Vote for ${data.name} in the contest!`;
            const shareUrl = encodeURIComponent(data.shareableLink);
            modalElement.querySelector('#facebook-btn').href = `https://www.facebook.com/sharer/sharer.php?u=${shareUrl}`;
            modalElement.querySelector('#twitter-btn').href = `https://twitter.com/intent/tweet?url=${shareUrl}&text=${shareText}`;
            modalElement.querySelector('#instagram-btn').href = `https://www.instagram.com/?url=${shareUrl}`;
            modalElement.querySelector('#linkedin-btn').href = `https://www.linkedin.com/shareArticle?mini=true&url=${shareUrl}&title=${shareText}`;
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