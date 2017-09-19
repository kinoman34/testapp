<!-- Content -->
<div class="cover inner">
    <h1 class="cover-heading">{{pageTitle}}</h1>
    <p class="lead">Create a new OR edit current page content on this form</p>
    <form class="form-horizontal" action="{{formActionLnk}}">
        <div class="form-group">
            <label class="control-label col-sm-3" for="pagetitle">Enter a page title</label>
            <div class="col-sm-9">
                <input class="form-control" id="pagetitle" type="text" name="pagetitle" placeholder="Page title" value="{{pageHeader}}" />
            </div>
        </div>
        <div class="form-group">
            <label class="control-label col-sm-3" for="pagekeyword">Enter a page keywords</label>
            <div class="col-sm-9">
                <input class="form-control" id="pagekeyword" type="text" name="pagekeyword" placeholder="Page keyword" value="{{pageKeywords}}" />
            </div>
        </div>
        <div class="form-group">
            <label class="control-label col-sm-3" for="pagebody">Enter a page body (with HTML tags)</label>
            <div class="col-sm-9">
                <textarea class="form-control" rows="7" id="pagebody" name="pagebody" placeholder="Page body">{{pageBody}}</textarea>
            </div>
        </div>
        <div class="form-group">
            <input class="btn btn-primary btn-lg" type="submit" name="submit" value="OK - save there" />
        </div>
    </form>
</div>