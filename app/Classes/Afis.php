<?php 

namespace App\Classes;

class Afis {

    /**
	 * Enkripsi Mac Address
	 * @param  string $mac [description]
	 * @return string      [description]
	 */
	public static function enkripsi($mac)
    {
        $stdpj=30;

        $adarr[1]='X';
        $adarr[2]='Az';
        $adarr[3]='pQR';
        $adarr[4]='X-zA';
        $adarr[5]='a*Z-m';
        $adarr[6]='iJ#Pq*';
        $adarr[7]='PG$st#9';
        $adarr[8]='n0v#tJH@';
        $adarr[9]='So@xPr+Z3';
        $adarr[10]='XSo@xPr+Z3';
        $adarr[11]='cSo@xPr+Z3X';
        $adarr[12]='So@xPr+Z3rAz';
        $adarr[13]='pQSo@xPr+Z31R';
        $adarr[14]='XSo@xPr+Z36-zA';
        $adarr[15]='a*Z-So@xPr+Z34m';
        $adarr[16]='iJ#Pq*So@xPr+Z38';
        $adarr[17]='PG$stSo@xPr+Z37#9';
        $adarr[18]='8n0v#tJSo@xPr+Z3H@';
        $adarr[19]='0SoSo@xPr+Z3=xPr+Z3';
        $adarr[20]='XS#%o@xPr+Zh677GXdz3';
        $adarr[21]='cGHSo@xPry+Z3pegasX20';
        $adarr[22]='G6So@xPr+Z30rAz9pEgTeX';
        $adarr[23]='RpeQSog@ssxPusr+y74301R';
        $adarr[24]='tXpSaTo@x19Pr+Z36-0z74Ap';
        $adarr[25]='p3s5tdotbIZ-So@jdxPr+Z34m';
        $adarr[26]='vtiJ#Pq*SaiNzt3cHo@xPr+Z38';
        $adarr[27]='$tPG$shArtSoh@xPr+Z36ur4t7#';
        $adarr[28]='&*8n04RTv#tJSo@xPjr+hd3cHZd3';
        $adarr[29]='$0ScI3nCE2ago@xPr+Z3=xPrb+Z2s';
        $x = null;
        $pjori=strlen($mac);
        if($pjori>$stdpj){
            $mac=substr($mac,0,$stdpj);
            $addn = 0;
        }else{
            $addn = $stdpj - strlen($mac);
        }

        $addt=$adarr[$addn];
        $x='';
        $mac=str_pad($mac, $stdpj, $addt);
        $l=str_pad($pjori, 2, '0', STR_PAD_LEFT);
        $mac .= $l;

        $a = strlen($mac);
        $a2 = floor(($a - 1) /2);
        for($i=0; $i<$a2; $i++){
            if($i%2 == 0){
                $c = $mac[$i];
                $mac[$i] = $mac[$a-1-$i];
                $mac[$a-1-$i] = $c;
            }
        }

        for($i=1; $i<=$a; $i++){
            $x .= base_convert(ord($mac[$i-1]),10,16);
            $x .= base_convert(ord($mac[$i-1])+50,10,16);
        }

        $b = strlen($x);
        $b2 = floor(($b-1)/2);
        for($j=0; $j<$b2; $j++){
            if($j%2 == 0){
                $d = $x[$j];
                $x[$j] = $x[$b-1-$j];
                $x[$b-1-$j] = $d;
            }
        }

        return $x;
    }
    
    /**
     * Deskrip Mac Address
     * @param  string $dek [description]
     * @return string      [description]
     */
    public static function dekripMC($dek)
    {
    $stdpj=30;

    $adarr[1]='X';
    $adarr[2]='Az';
    $adarr[3]='pQR';
    $adarr[4]='X-zA';
    $adarr[5]='a*Z-m';
    $adarr[6]='iJ#Pq*';
    $adarr[7]='PG$st#9';
    $adarr[8]='n0v#tJH@';
    $adarr[9]='So@xPr+Z3';
    $adarr[10]='XSo@xPr+Z3';
    $adarr[11]='cSo@xPr+Z3X';
    $adarr[12]='So@xPr+Z3rAz';
    $adarr[13]='pQSo@xPr+Z31R';
    $adarr[14]='XSo@xPr+Z36-zA';
    $adarr[15]='a*Z-So@xPr+Z34m';
    $adarr[16]='iJ#Pq*So@xPr+Z38';
    $adarr[17]='PG$stSo@xPr+Z37#9';
    $adarr[18]='8n0v#tJSo@xPr+Z3H@';
    $adarr[19]='0SoSo@xPr+Z3=xPr+Z3';
    $adarr[20]='XS#%o@xPr+Zh677GXdz3';
    $adarr[21]='cGHSo@xPry+Z3pegasX20';
    $adarr[22]='G6So@xPr+Z30rAz9pEgTeX';
    $adarr[23]='RpeQSog@ssxPusr+y74301R';
    $adarr[24]='tXpSaTo@x19Pr+Z36-0z74Ap';
    $adarr[25]='p3s5tdotbIZ-So@jdxPr+Z34m';
    $adarr[26]='vtiJ#Pq*SaiNzt3cHo@xPr+Z38';
    $adarr[27]='$tPG$shArtSoh@xPr+Z36ur4t7#';
    $adarr[28]='&*8n04RTv#tJSo@xPjr+hd3cHZd3';
    $adarr[29]='$0ScI3nCE2ago@xPr+Z3=xPrb+Z2s';
      $dek2 = null;
      $c = strlen($dek);
      $c2 = floor(($c-1)/2);
      for($h=0; $h<$c2; $h++){
          if($h%2 == 0){
              $e = $dek[$h];
              $dek[$h] = $dek[$c-1-$h];
              $dek[$c-1-$h] = $e;
          }
      }

      for ($a=1; $a <= $c; $a+=4) {
        $dek2 .= chr(base_convert(substr($dek, $a-1,2),16,10));
      }

      $c = strlen($dek2);
      $c2 = floor(($c-1)/2);
      for($h=0; $h<$c2; $h++){
          if($h%2 == 0){
              $e = $dek2[$h];
              $dek2[$h] = $dek2[$c-1-$h];
              $dek2[$c-1-$h] = $e;
          }
      }

      $idx=0;
      if(is_numeric(substr($dek2, $stdpj, 2))){
          $idx = $stdpj - (int) substr($dek2, $stdpj, 2);
      }
      if($idx>=1 && $idx<=$stdpj-1){
          $p=substr($dek2, 0, $stdpj);
          $p=str_replace($adarr[$idx],"",$p);
      }else{
          $p='';
      }

      return $p;
    }

    /**
     * Get Mac address for linux
     * @return string [description]
     */
    public static function getMacLinux()
    {
        exec('netstat -ie', $result);
        if(is_array($result)) {
         $iface = array();
         foreach($result as $key => $line) {
           if($key > 0) {
             $tmp = str_replace(" ", "", substr($line, 0, 10));
             if($tmp <> "") {
               $macpos = strpos($line, "HWaddr");
               if($macpos !== false) {
                 $iface[] = array('iface' => $tmp, 'mac' => strtolower(substr($line, $macpos+7, 17)));
               }
             }
           }
         }
         return $iface[0]['mac'];
       } else {
         return "notfound";
       }
    }
    /**
     * Get Mac Address Window
     * @return string [description]
     */
    public static function macAddressWindows()
    {
        ob_start(); // Turn on output buffering
        system('ipconfig /all'); //Execute external program to display output
        $mycom=ob_get_contents(); // Capture the output into a variable
        ob_clean(); // Clean (erase) the output buffer
        $findme = "Physical";
        $pmac = strpos($mycom, $findme); // Find the position of Physical text
        $mac=substr($mycom,($pmac+36),17); // Get Physical Address
        $hasil = strtolower(str_replace('-',':',$mac));
        $hasil = Afis::enkripsi($hasil);
        return $hasil;
    }
    /**
     * mendapatkan nama komputer
     */
    public static function namaKomputer(){
        return gethostname();
    }
    /**
     * Get Operating System
     * @return string [description]
     */
    public static function getOS()
    {
        $user_agent = $_SERVER['HTTP_USER_AGENT'];
        $os_platform = "Unknown OS Platform";
        $os_array = array(
            '/windows nt 10.0/i'    =>  'Windows 10',
            '/windows nt 6.2/i'     =>  'Windows 8',
            '/windows nt 6.1/i'     =>  'Windows 7',
            '/windows nt 6.0/i'     =>  'Windows Vista',
            '/windows nt 5.2/i'     =>  'Windows Server 2003/XP x64',
            '/windows nt 5.1/i'     =>  'Windows XP',
            '/windows xp/i'         =>  'Windows XP',
            '/windows nt 5.0/i'     =>  'Windows 2000',
            '/windows me/i'         =>  'Windows ME',
            '/win98/i'              =>  'Windows 98',
            '/win95/i'              =>  'Windows 95',
            '/win16/i'              =>  'Windows 3.11',
            '/macintosh|mac os x/i' =>  'Mac OS X',
            '/mac_powerpc/i'        =>  'Mac OS 9',
            '/linux/i'              =>  'Linux',
            '/ubuntu/i'             =>  'Ubuntu',
            '/iphone/i'             =>  'iPhone',
            '/ipod/i'               =>  'iPod',
            '/ipad/i'               =>  'iPad',
            '/android/i'            =>  'Android',
            '/blackberry/i'         =>  'BlackBerry',
            '/webos/i'              =>  'Mobile'
        );

        foreach ($os_array as $regex => $value) {

            if (preg_match($regex, $user_agent)) {
                $os_platform    =   $value;
            }

        }
        return $os_platform;
    }
}