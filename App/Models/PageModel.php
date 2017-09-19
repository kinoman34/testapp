<?
    // Page application model
    namespace App\Models;
    
    use \Illuminate\Database\Eloquent\Model;
    use Illuminate\Database\Capsule\Manager as Capsule;
    
    class PageModel extends Model
    {
        protected $table = 'pet__pages';
        
        /**
        *   Database & table create model method
        *   @return bool
        */
        function installDB()
        {
            global $APP;
            
            return (Capsule::statement('CREATE TABLE IF NOT EXISTS
                ' . $APP->Config->table . ' (
                `pageid` int(10) unsigned NOT NULL AUTO_INCREMENT,
                `title` varchar(255) NOT NULL,
                `body` mediumtext NOT NULL,
                `keywords` varchar(255) NOT NULL DEFAULT \'\',
                `modified` datetime NOT NULL DEFAULT \'0000-00-00 00:00:00\',
                PRIMARY KEY (`pageid`),
                KEY `modified` (`modified`)
                ) ENGINE=InnoDB DEFAULT CHARSET=utf8')) ? 1 : 0;
        }
        
        /**
        *   Get all pages method
        *   @return array
        */
        function getAllPages()
        {
            global $APP;
            return Capsule::table($APP->Config->table)->get();
        }
        
        /**
        *   Get page by ID method
        *   @return array
        */
        function getPageByID($id)
        {
            global $APP;
            return empty($id) ? 0 : Capsule::table($APP->Config->table)
            ->where('pageid', '=', $id)->first();
        }
        
        /**
        *   Delete page by ID method
        *   @return bool
        */
        function deletePage($id)
        {
            global $APP;
            return empty($id) ? 0 : Capsule::table($APP->Config->table)
            ->where('pageid', '=', $id)->delete();
        }
        
        /**
        *   Create page method
        *   @return bool
        */
        function createPage($data)
        {
            global $APP;
            $insert = array(
                'title' => !empty($data['pagetitle']) ? $data['pagetitle'] : '',    
                'keywords' => !empty($data['pagekeyword']) ? $data['pagekeyword'] : '',    
                'body' => !empty($data['pagebody']) ? json_encode($data['pagebody']) : '',
                'modified' => date('Y-m-d H:i:s')
            );
            
            return Capsule::table($APP->Config->table)->insertGetId($insert);
        }
        
        /**
        *   Update page data by ID method
        *   @return bool
        */
        function updatePage($id, $data)
        {
            global $APP;
            $insert = array(
                'title' => !empty($data['pagetitle']) ? $data['pagetitle'] : '',    
                'keywords' => !empty($data['pagekeyword']) ? $data['pagekeyword'] : '',    
                'body' => !empty($data['pagebody']) ? json_encode($data['pagebody']) : '',
                'modified' => date('Y-m-d H:i:s')
            );
            
            return Capsule::table($APP->Config->table)->where('pageid', $id)->update($insert);
        }
    }

?>