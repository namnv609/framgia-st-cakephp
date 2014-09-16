<?php
class My_Lib{
    /**
     * Tạo đường dẫn thân thiện.
     * 
     * @param string $str Nội dung cần chuyển sang dạng URL
     * @param string $prefix Tiền tố đầu của slug
     * @param string $suffix Phần mở rộng của URL (ex: .html, etc...)
     * @return string Đường dẫn thân thiện
     */
    public static function titleToUrl($str, $prefix = "", $suffix = ""){
        if($prefix != "" && $prefix != NULL){
            $_prefix = Inflector::slug(strtolower($prefix), '-') . '/'; 
        }else{
            $_prefix = $prefix;
        }
        
        return $_prefix . Inflector::slug(strtolower($str), '-') . $suffix;
    }
}

