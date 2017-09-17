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
        <tbody>
            <tr>
                <td><a href="/page-detail/ID/"><span class="glyphicon glyphicon-play-circle"></span> #1</a></td>
                <td>1</td>
                <td>1</td>
                <td>1</td>
                <td>1</td>
                <td><a href="/page-detail/ID/pageEdit/" class="glyphicon glyphicon-edit"></a></td>
                <td><a href="/page-detail/ID/pageDelete/" class="glyphicon glyphicon-remove"></a></td>
            </tr>
        </tbody>
    </table>
</div>
