<?
    // Page application model
    namespace App\Models;
    
    class PageModel
    {
        /**
        *   Database create model method
        *   @return bool
        */
        function databaseCreate($name)
        {
            if (!isset($name)) return false;
        }
        
        /**
        *   Create pet__page teable method
        *   @return bool
        */
        function tableCreate($name)
        {
            if (!isset($name)) return false;
        }
        
        /**
        *   Get all pages method
        *   @return 
        */
        function getAllPages()
        {
            
        }
        
        /**
        *   Delete page by ID method
        *   @return bool
        */
        function deletePage($id)
        {
            
        }
        
        /**
        *   Create page method
        *   @return bool
        */
        function createPage()
        {
            
        }
        
        /**
        *   Update page data by ID method
        *   @return bool
        */
        function updatePage($id)
        {
            
        }
    }

?>