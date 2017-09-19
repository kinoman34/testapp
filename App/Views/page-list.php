<!-- Content -->
<div class="cover inner">
    <h1 class="cover-heading">{{pageHeader}}</h1>
    <p class="lead">DataTable - plugin, for generate of data pages list, with support native ordering, searching and pagination method's</p>
    <!-- Add page lnk -->
    <p class="lead">
        <a href="/page-detail/pageAdd/" class="btn btn-primary">
            <span class="glyphicon glyphicon-plus"></span> - Create a new content page!
        </a>
    </p>
    <!-- Table rows -->
    <table id="pagesList" class="table table-hover table-striped table-responsive">
        <thead>
            <tr>
                <th>#</th>
                <th>Title</th>
                <th>Body</th>
                <th>Keywords</th>
                <th>Modified</th>
                <th>Edit</th>
                <th>Delete</th>
            </tr>
        </thead>
        {% if tableRows %}
            <tbody>
                {% for row in tableRows %}
                    <tr>
                        <td><a href="/page-detail/{{row.pageid}}/"><span class="glyphicon glyphicon-play-circle"></span> #{{row.pageid}}</a></td>
                        <td>{{row.title}}</td>
                        <td>{{row.body|truncate(30)|raw}}</td>
                        <td>{{row.keywords}}</td>
                        <td>{{row.modified}}</td>
                        <td><a href="/page-detail/{{row.pageid}}/pageEdit/" class="glyphicon glyphicon-edit"></a></td>
                        <td><a href="/page-detail/{{row.pageid}}/pageDelete/" class="glyphicon glyphicon-remove"></a></td>
                    </tr>
                {% endfor %}
            </tbody>
        {% endif %}
    </table>
</div>
