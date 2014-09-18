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
    
    /**
     * Tạo thông báo lỗi ở form
     * 
     * @param mixed $validationErrs Mảng lỗi
     * @return string HTML thông báo lỗi
     */
    public static function formErrorSummary($validationErrs = NULL){
        $html = "";
        
        if(is_array($validationErrs) && !empty($validationErrs)){
            $_validationErrs = Set::flatten($validationErrs);
            $html .= '<div class="n_error">';
            
            foreach($_validationErrs as $err){
                $html .= "<p>$err</p>";
            }
            
            $html .= '</div>';
        }
        
        return $html;
    }
    
    /**
     * Tạo thông báo thành công cho form
     * 
     * @param string $message Nội dung thông b
     * @param type $class Class của thẻ sẽ chứa thông báo
     * @return string HTML thông báo
     */
    public static function formSuccessSummary($message, $class = "n_ok"){
        $html = "";
        
        if($message && !empty($message)){
            $html .= "<div class='$class'><p>$message</p></div>";
        }
        
        return $html;
    }
}

