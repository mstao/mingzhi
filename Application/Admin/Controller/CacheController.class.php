<?php


/**
 +-----------------------------------------------------
 * 缓存管理
 * @author mingshan
 *
 +-----------------------------------------------------
 */

namespace Admin\Controller;
use Common\Controller\AdminController;

class CacheController extends AdminController{
    
    public function cleanAll(){
        $this->totalSize = 0;
        $this->totalFile = 0;
        //$GLOBALS['arrFiles'] = $GLOBALS['arrDirs'] = array();

     //   $this->dropDir(HTML_PATH);
        $this->dropDir(RUNTIME_PATH);

        //ThinkPHP 3.2 不会自动生成Html缓存目录
      //  if (!is_dir(HTML_PATH)) mkdir(HTML_PATH);

        $data = array(
            'totalFile' => $this->totalFile,
            'totalSize' => $this->totalSize,
           /*  'arrFiles'  => $GLOBALS['arrFiles'],
            'arrDirs'   => $GLOBALS['arrDirs'], */
            'result'    => 1,
            'reqtime'   => date('Y-m-d H:i:s'),
        );

       // $returnType = I('type') == 'JSON' ? 'JSON' : 'JSONP';
        $this->ajaxReturn($data);

    }

    public function dropDir($path = ''){
        
        if (is_file($path)) {
            $this->totalSize += filesize($path);
            $this->totalFile++;
            $GLOBALS['arrFiles'][] = $path;
            unlink($path);

        } else if (is_dir($path)) {
            if (($dir = opendir($path)) !== false) {
                while (($file = readdir($dir)) !== false) {
                    if ($file != '.' && $file != '..') {
                        $this->dropDir($path . '/' . $file);
                    }
                }

                $GLOBALS['arrDirs'][] = $path;
                rmdir($path);
            }
        }
    }
}