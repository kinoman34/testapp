// TestApp global object
var App = {
    
    pagesTable : {}, // Data object of pages list
    
    // Datatables processed method of List Page
    dataTable : function()
    {
        if ($('#pagesList').length > 0)
            this.pagesTable = 
                $('#pagesList').DataTable({
                    stateSave: true
                });
    },
    
    init : function()
    {
        this.dataTable(); // Create datatable of list page
    }
}

$(document).ready(function()
{
    // init method
    App.init();
});