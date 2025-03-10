<?php
namespace common\components;

class MyHelpers
{
    public static function hello($name) {
        return "Hello $name";
    }

    public function getImageDecode()
    {
        $imageEx = explode('/',$this->image);
        $nameImage = array_pop($imageEx);
        $nameImage = urlencode($nameImage);
        $linkFolder =implode("/",$imageEx);

        return $linkFolder. '/'.$nameImage;
    }

    public static function buildDeepPrefix(&$data,$parent_id = 0,$level = 0,$prefix = '↵')
    {

        foreach ($data as $key => $item) {
            if ($item['parent_id'] == $parent_id) {
                $data[$key]['name'] = str_repeat($prefix,$level).' '.$item['name'];
                $level = $level + 1;
                self::buildDeepPrefix($data,$item['id'] ,$level,$prefix = '↵');
                $level = 0;
            }
        }
    }

    /**
     * @return array|false|string
     * Lấy địa chỉ ip
     */
    public static function getClientIp() {
        switch(true){
            case (!empty($_SERVER['HTTP_X_REAL_IP'])) : return $_SERVER['HTTP_X_REAL_IP'];
            case (!empty($_SERVER['HTTP_CLIENT_IP'])) : return $_SERVER['HTTP_CLIENT_IP'];
            case (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) : return $_SERVER['HTTP_X_FORWARDED_FOR'];
            default : return $_SERVER['REMOTE_ADDR'];
        }
    }

    /**
     * @param $url
     * @return bool|mixed
     */
    public static function getYoutubeIdFromUrl($url) {
        $parts = parse_url($url);
        if(isset($parts['query'])){
            parse_str($parts['query'], $qs);
            if(isset($qs['v'])){
                return $qs['v'];
            }else if(isset($qs['vi'])){
                return $qs['vi'];
            }
        }
        if(isset($parts['path'])){
            $path = explode('/', trim($parts['path'], '/'));
            return $path[count($path)-1];
        }
        return false;
    }

    public static function getDayOfWeekInVietnamese($timestamp = 0) {
        // Lấy thứ trong tuần dưới dạng số (0: Chủ nhật, 1: Thứ hai, ..., 6: Thứ bảy)
        $timestamp = empty($timestamp) ? time() : $timestamp;
        $dayOfWeekNumber = date('w', $timestamp );
    
        // Mảng chứa thứ trong tuần bằng tiếng Việt
        $daysOfWeek = [
            0 => 'Chủ nhật',
            1 => 'Thứ 2',
            2 => 'Thứ 3',
            3 => 'Thứ 4',
            4 => 'Thứ 5',
            5 => 'Thứ 6',
            6 => 'Thứ 7'
        ];
    
        // Trả về thứ tương ứng
        return $daysOfWeek[$dayOfWeekNumber];
    }

    public static function sendMessage($url)
    {
       
        $ch = curl_init();

        // Set cURL options
        curl_setopt($ch, CURLOPT_URL, $url);  // URL to fetch
        curl_setopt($ch, CURLOPT_USERAGENT, 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/120.0.0.0 Safari/537.36');

        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);        // Return response as a string (not output directly)
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);        // Verify SSL certificate
        //curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 2);           // Verify host against SSL certificate

        // Execute cURL session and get the response
        return curl_exec($ch);
    }

    public static function saveToFile($folder, $filename, $data, $append = false) {
        $folder = "data/" . $folder;
        $filepath = rtrim($folder, "/") . "/" . $filename;
        $filepath = trim($filepath);
        // Kiểm tra và tạo thư mục nếu chưa tồn tại
        if (!is_dir($folder)) {
          
            mkdir($folder, 0777, true); // Tạo thư mục và các thư mục cha nếu cần
            chmod($folder, 0777);
        }
       
        // Chọn chế độ ghi (append: ghi tiếp, không thì ghi đè)
        $mode = $append ? "a" : "w+";
    
        // Ghi dữ liệu vào file
        
        $file = fopen($filepath, $mode);
        chmod($filepath, 0777);
        fwrite($file, $data . "\n"); // Thêm dòng mới
        fclose($file);
    
        return "Dữ liệu đã lưu vào: $filepath";
    }

    public static function fileExists($folder, $filename) 
    {
        $folder = "data/" . $folder;
        // Tạo đường dẫn đầy đủ
        $filepath = rtrim($folder, "/") . "/" . $filename;
    
        // Kiểm tra file có tồn tại không
        return file_exists($filepath);
    }

    public static function readFileContent($folder, $filename) {
        $folder = "data/" . $folder;
        // Tạo đường dẫn đầy đủ
        $filepath = rtrim($folder, "/") . "/" . $filename;

        // Kiểm tra file có tồn tại không
        if (!file_exists($filepath)) {
            return false;
        }
        
         // Mở file ở chế độ đọc nhị phân
        $file = fopen($filepath, "rb");

        // Đọc toàn bộ file một lần duy nhất
        $content = fread($file, filesize($filepath));

        fclose($file);

        // Đọc nội dung file
        return $content;
    }

    public static function convertToSlug($str) {
        // Chuyển đổi từ Unicode sang dạng không dấu
        $str = mb_strtolower($str, 'UTF-8');
        $str = preg_replace('/[àáạảãâầấậẩẫăằắặẳẵ]/u', 'a', $str);
        $str = preg_replace('/[èéẹẻẽêềếệểễ]/u', 'e', $str);
        $str = preg_replace('/[ìíịỉĩ]/u', 'i', $str);
        $str = preg_replace('/[òóọỏõôồốộổỗơờớợởỡ]/u', 'o', $str);
        $str = preg_replace('/[ùúụủũưừứựửữ]/u', 'u', $str);
        $str = preg_replace('/[ỳýỵỷỹ]/u', 'y', $str);
        $str = preg_replace('/[đ]/u', 'd', $str);
    
        // Loại bỏ ký tự đặc biệt
        $str = preg_replace('/[^a-z0-9\s-]/', '', $str);
        $str = preg_replace('/\s+/', '-', $str);
        $str = preg_replace('/-+/', '-', $str);
    
        // Xóa dấu gạch ngang ở đầu và cuối (nếu có)
        $str = trim($str, '-');
    
        return $str;
    }    
}