<div class="alert alert-warning" id="alert-box">
    <span class="alert-message">
        {{ $slot }}
    </span>

    <button class="alert-close" onclick="document.getElementById('alert-box').remove()">
        ×
    </button>
</div>
