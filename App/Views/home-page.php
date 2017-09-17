<!-- Content -->
<div class="inner cover">
    <h1 class="cover-heading">Hello, this is test TestApp Home page</h1>
    <p class="lead">I'm not use PHP framework's especialy, but not using third-party libraries would be just stupid. So I used them for faster and more flexible development. Namely PHPRouter - for routing, Doctrine - as ORM for work with a database, as well as a template TWIG - to form a convenient output</p>
    {% if isInstalled %}
        <p class="lead">
            <a href="{{contentPageLnk}}" class="btn btn-lg btn-primary">Content pages</a>
        </p>
    {% else %}
        <p class="lead">
            Now TestApp ins not installed, try it to setup <br><br>
            <a href="{{installPageLnk}}" class="btn btn-lg btn-success">Install TestApp</a>
        </p>
    {% endif %}
</div>