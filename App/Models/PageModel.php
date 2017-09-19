<?
    // Page application model
    namespace App\Models;
    
    use \Illuminate\Database\Eloquent\Model;
    
    class PageModel extends Model
    {
        protected $table = 'pet__pages';
        
        /**
        *   Database & table create model method
        *   @return bool
        */
        function installDB()
        {
            
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