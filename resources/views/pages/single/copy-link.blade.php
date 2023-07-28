<!-- Add this HTML for the button and message -->
<div class="col-auto order-md-last mb-4 mt-4 mb-md-0">
    <span id="copyLinkMessage"></span>

    <a href="#" id="copyLinkButton" data-bs-offset="0,15" aria-haspopup="true" aria-expanded="false"
        data-offset="0,12"><i data-bs-toggle="tooltip" data-bs-placement="top" title="Share"
            class="icon-line-share btn btn-secondary"></i></a>
</div>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        const copyLinkButton = document.getElementById('copyLinkButton');
        const copyLinkMessage = document.getElementById('copyLinkMessage');

        copyLinkButton.addEventListener('click', function() {
            const url = window.location.href;

            // Copy the URL to the clipboard
            const textArea = document.createElement('textarea');
            textArea.value = url;
            document.body.appendChild(textArea);
            textArea.select();
            document.execCommand('copy');
            document.body.removeChild(textArea);

            // Show the "Link copied" message
            copyLinkMessage.textContent = 'Link copied';
            setTimeout(function() {
                copyLinkMessage.textContent = '';
            }, 2000); // Hide the message after 2 seconds
        });
    });
</script>
