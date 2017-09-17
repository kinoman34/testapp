<!-- Content -->
<div class="cover inner">
    {% if isInstalled %}
        <h1 class="cover-heading">TestApp is Success installed, congratulations!</h1>
        <p class="lead">Now turn to List of pages in application database</p>
        <p class="lead">
            <a href="{{contentLnk}}" class="btn btn-primary btn-lg">Content Pages</a>
        </p>
    {% else %}
        <h1 class="cover-heading">TestApp is not installed, try to setup it</h1>
        <p class="lead">TestApp database is not created, please setting up it, and paste dummy content</p>
        <p class="lead">
            <a href="{{installLnk}}" class="btn btn-success btn-lg">Install TestApp</a>
        </p>
    {% endif %}
</div>