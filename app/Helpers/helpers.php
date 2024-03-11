<?php

namespace App\Helpers;

use App\Models\User;
use Butschster\Head\Facades\Meta;
use Butschster\Head\Packages\Entities\OpenGraphPackage;
use Collective\Html\FormFacade;
use Config;
use Carbon\Carbon;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\URL;

class Helper
{
    public static function applClasses()
  {
    // default data array
    $DefaultData = [
      'mainLayoutType' => 'vertical',
      'theme' => 'light',
      'sidebarCollapsed' => false,
      'navbarColor' => '',
      'horizontalMenuType' => 'floating',
      'verticalMenuNavbarType' => 'floating',
      'footerType' => 'static', //footer
      'layoutWidth' => 'full',
      'showMenu' => true,
      'bodyClass' => '',
      'bodyStyle' => '',
      'pageClass' => '',
      'pageHeader' => true,
      'contentLayout' => 'default',
      'blankPage' => false,
      'defaultLanguage' => 'en',
      'direction' => env('MIX_CONTENT_DIRECTION', 'ltr'),
    ];

    // if any key missing of array from custom.php file it will be merge and set a default value from dataDefault array and store in data variable
    $data = array_merge($DefaultData, config('custom.custom'));

    // All options available in the template
    $allOptions = [
      'mainLayoutType' => array('vertical', 'horizontal'),
      'theme' => array('light' => 'light', 'dark' => 'dark-layout', 'bordered' => 'bordered-layout', 'semi-dark' => 'semi-dark-layout'),
      'sidebarCollapsed' => array(true, false),
      'showMenu' => array(true, false),
      'layoutWidth' => array('full', 'boxed'),
      'navbarColor' => array('bg-primary', 'bg-info', 'bg-warning', 'bg-success', 'bg-danger', 'bg-dark'),
      'horizontalMenuType' => array('floating' => 'navbar-floating', 'static' => 'navbar-static', 'sticky' => 'navbar-sticky'),
      'horizontalMenuClass' => array('static' => '', 'sticky' => 'fixed-top', 'floating' => 'floating-nav'),
      'verticalMenuNavbarType' => array('floating' => 'navbar-floating', 'static' => 'navbar-static', 'sticky' => 'navbar-sticky', 'hidden' => 'navbar-hidden'),
      'navbarClass' => array('floating' => 'floating-nav', 'static' => 'navbar-static-top', 'sticky' => 'fixed-top', 'hidden' => 'd-none'),
      'footerType' => array('static' => 'footer-static', 'sticky' => 'footer-fixed', 'hidden' => 'footer-hidden'),
      'pageHeader' => array(true, false),
      'contentLayout' => array('default', 'content-left-sidebar', 'content-right-sidebar', 'content-detached-left-sidebar', 'content-detached-right-sidebar'),
      'blankPage' => array(false, true),
      'sidebarPositionClass' => array('content-left-sidebar' => 'sidebar-left', 'content-right-sidebar' => 'sidebar-right', 'content-detached-left-sidebar' => 'sidebar-detached sidebar-left', 'content-detached-right-sidebar' => 'sidebar-detached sidebar-right', 'default' => 'default-sidebar-position'),
      'contentsidebarClass' => array('content-left-sidebar' => 'content-right', 'content-right-sidebar' => 'content-left', 'content-detached-left-sidebar' => 'content-detached content-right', 'content-detached-right-sidebar' => 'content-detached content-left', 'default' => 'default-sidebar'),
      'defaultLanguage' => array('en' => 'en', 'fr' => 'fr', 'de' => 'de', 'pt' => 'pt'),
      'direction' => array('ltr', 'rtl'),
    ];

    //if mainLayoutType value empty or not match with default options in custom.php config file then set a default value
    foreach ($allOptions as $key => $value) {
      if (array_key_exists($key, $DefaultData)) {
        if (gettype($DefaultData[$key]) === gettype($data[$key])) {
          // data key should be string
          if (is_string($data[$key])) {
            // data key should not be empty
            if (isset($data[$key]) && $data[$key] !== null) {
              // data key should not be exist inside allOptions array's sub array
              if (!array_key_exists($data[$key], $value)) {
                // ensure that passed value should be match with any of allOptions array value
                $result = array_search($data[$key], $value, 'strict');
                if (empty($result) && $result !== 0) {
                  $data[$key] = $DefaultData[$key];
                }
              }
            } else {
              // if data key not set or
              $data[$key] = $DefaultData[$key];
            }
          }
        } else {
          $data[$key] = $DefaultData[$key];
        }
      }
    }

    //layout classes
    $layoutClasses = [
      'theme' => $data['theme'],
      'layoutTheme' => $allOptions['theme'][$data['theme']],
      'sidebarCollapsed' => $data['sidebarCollapsed'],
      'showMenu' => $data['showMenu'],
      'layoutWidth' => $data['layoutWidth'],
      'verticalMenuNavbarType' => $allOptions['verticalMenuNavbarType'][$data['verticalMenuNavbarType']],
      'navbarClass' => $allOptions['navbarClass'][$data['verticalMenuNavbarType']],
      'navbarColor' => $data['navbarColor'],
      'horizontalMenuType' => $allOptions['horizontalMenuType'][$data['horizontalMenuType']],
      'horizontalMenuClass' => $allOptions['horizontalMenuClass'][$data['horizontalMenuType']],
      'footerType' => $allOptions['footerType'][$data['footerType']],
      'sidebarClass' => '',
      'bodyClass' => $data['bodyClass'],
      'bodyStyle' => $data['bodyStyle'],
      'pageClass' => $data['pageClass'],
      'pageHeader' => $data['pageHeader'],
      'blankPage' => $data['blankPage'],
      'blankPageClass' => '',
      'contentLayout' => $data['contentLayout'],
      'sidebarPositionClass' => $allOptions['sidebarPositionClass'][$data['contentLayout']],
      'contentsidebarClass' => $allOptions['contentsidebarClass'][$data['contentLayout']],
      'mainLayoutType' => $data['mainLayoutType'],
      'defaultLanguage' => $allOptions['defaultLanguage'][$data['defaultLanguage']],
      'direction' => $data['direction'],
    ];
    // set default language if session hasn't locale value the set default language
    if (!session()->has('locale')) {
      app()->setLocale($layoutClasses['defaultLanguage']);
    }

    // sidebar Collapsed
    if ($layoutClasses['sidebarCollapsed'] == 'true') {
      $layoutClasses['sidebarClass'] = "menu-collapsed";
    }

    // blank page class
    if ($layoutClasses['blankPage'] == 'true') {
      $layoutClasses['blankPageClass'] = "blank-page";
    }

    return $layoutClasses;
  }

    public static function updatePageConfig($pageConfigs)
  {
    $demo = 'custom';
    if (isset($pageConfigs)) {
      if (count($pageConfigs) > 0) {
        foreach ($pageConfigs as $config => $val) {
          Config::set('custom.' . $demo . '.' . $config, $val);
        }
      }
    }
  }

    public static function str2array($str)
    {
        $arr = explode(',',$str);
        return $arr;
    }

    public static function getImage($arrImages)
    {
        $images = explode(',',$arrImages);
        return $images[0];
    }

    public  static function getNamaBulan($i)
    {
        $listBulan = [
            '1' => 'Januari',
            '2' => 'Februari',
            '3' => 'Maret',
            '4' => 'April',
            '5' => 'Mei',
            '6' => 'Juni',
            '7' => 'Juli',
            '8' => 'Agustus',
            '9' => 'September',
            '10' => 'Oktober',
            '11' => 'November',
            '12' => 'Desember',
        ];

        return $listBulan[$i];
    }

    // -----------------------------------------------------------------------------------------------------------------
    //         ::  U P L O A D    F I L E  ::  (Process upload file)
    // -----------------------------------------------------------------------------------------------------------------
    public  static function uploadfile($file, $name, $folder)
    {
        if ($file->isValid()) {

            $upload_path = 'public/'.$folder;
            $ext_file    = $file->getClientOriginalExtension();
            $file_name   = $name . '-' . time() . ".$ext_file";
            $file->storeAs($upload_path, $file_name);

            return $file_name;
        }
        return false;
    }

    // -----------------------------------------------------------------------------------------------------------------
    //         ::  D E L E T E    F I L E   ::  (Process delete file)
    // -----------------------------------------------------------------------------------------------------------------
    public static function hapusfile($srcFile)
    {
        if (Storage::exists($srcFile)){
            return Storage::disk('local')->delete($srcFile);
        }
        return false;
    }

    // -----------------------------------------------------------------------------------------------------------------
    //         ::  U P L O A D    F O T O   ::  (Process upload foto)
    // -----------------------------------------------------------------------------------------------------------------
    public  static function uploadfoto($file, $name, $folder)
    {
        if ($file->isValid()) {

            $upload_path = 'public/'.$folder;
            $ext_file    = $file->getClientOriginalExtension();
            $foto_name   = $name . '-' . time() . ".$ext_file";
            $file->storeAs($upload_path, $foto_name);

            return $foto_name;
        }
        return false;
    }

    // -----------------------------------------------------------------------------------------------------------------
    //         ::  D E L E T E    F O T O   ::  (Process delete foto)
    // -----------------------------------------------------------------------------------------------------------------
    public static function hapusfoto($srcFoto)
    {
        if (Storage::exists($srcFoto)){
            return Storage::disk('local')->delete($srcFoto);
        }
        return false;
    }

    // -----------------------------------------------------------------------------------------------------------------
    //         ::  ROLE PERMISSIONs EDIT ::
    // -----------------------------------------------------------------------------------------------------------------
    public static function rolePermissionsEdit($role_permissions = null, $rolePermissions)
    {
        $list_permission = '';
        $permission_prev = '';

        foreach ($role_permissions as $permission) {

            $permission_cur = explode('-', $permission->name)[0];
            $permission_name = explode('-', $permission->name)[1];

            if($permission_prev != $permission_cur) {
                $list_permission .= "<h5 class='border-bottom'>".strtoupper($permission_cur)."</h5>";
            }

            $isChecked = in_array($permission->id, $rolePermissions) ? 'checked' : '';
            $list_permission .=  '<input type="checkbox" id="permission[]" name="permission[]" value="'.$permission->id.'" '.$isChecked.'>';
            $list_permission .=  '<label for="'.$permission->id.'">&nbsp;'.ucfirst($permission_name).'</label><br>';

            $permission_prev = $permission_cur ;
        }

        return $list_permission;
    }

    // -----------------------------------------------------------------------------------------------------------------
    //         ::  ROLE PERMISSIONS LIST
    // -----------------------------------------------------------------------------------------------------------------
    public static function rolePermissionsList($role_permissions = null)
    {
        $model_prev = '';
        $permission_list = "<ul class=\"nav nav-pills flex-column\">";

        foreach ($role_permissions as $permission) {

            $model_name = explode('-', $permission->name)[0];
            $permission_name = explode('-', $permission->name)[1];

            if($model_prev != $model_name) {

                $permission_list .= "<li class=\"nav-item\">";
                $permission_list .= "  <a href=\"#\" class=\"nav-link\">";
                $permission_list .= "    <i class=\"fas fa-database\"></i> " . $model_name;
            }

            if($permission_name == 'create') {
                $badge_color = 'success';
            }
            else if ($permission_name == 'edit') {
                $badge_color = 'primary';
            }
            else if ($permission_name == 'delete') {
                $badge_color = 'danger';
            }
            else {
                $badge_color = 'warning';
            }

            $permission_list .= "   <span class=\"badge badge-".$badge_color." float-right\"> ".ucfirst($permission_name)." </span>";

            $model_prev = $model_name ;
        }
        $permission_list .= "  </a>";
        $permission_list .= "</li>";
        $permission_list .= "</ul>";

        return $permission_list;
    }

    // -----------------------------------------------------------------------------------------------------------------
    //         ::  GET USER BY ROLE ::
    // -----------------------------------------------------------------------------------------------------------------
    public static function getUsersByRole($role)
    {
        $users = User::whereHas('roles', function ($query) use ($role) {
            $query->where('name', $role);
        })->get();

        return $users;
    }

    // -----------------------------------------------------------------------------------------------------------------
    //         ::  KATEGORI KONTEN ::
    // -----------------------------------------------------------------------------------------------------------------
    public static function listKategoriKonten($kategori_id = null)
    {
        $list = [
            '' => '',
            '1' => 'Profil',
            '2' => 'Profil Investasi',
            '3' => 'PPID'
        ];

        if ($kategori_id === null) {
            return $list;
        }
        else {
            return $list[$kategori_id];
        }
    }

    public static function upDownPos($nilai)
    {
        if($nilai > 0) {
            return '(<i data-feather="trending-up" class="text-success"></i> '.$nilai.')';
        } elseif($nilai < 0) {
            return '(<i data-feather="trending-down" class="text-danger"></i> '.$nilai.')';
        } else {
            return '';
        }
    }

    public static function upDownNeg($nilai)
    {
        if($nilai > 0) {
            return '(<i data-feather="trending-up" class="text-danger"></i> '.$nilai.')';
        } elseif($nilai < 0) {
            return '(<i data-feather="trending-down" class="text-success"></i> '.$nilai.')';
        } else {
            return '';
        }
    }

    public static function setMeta($name, $url, $type, $title, $description, $image)
    {
        // Meta Tags
        $og = new OpenGraphPackage($name);

        $og->setUrl($url)
            ->setType($type)
            ->setTitle($title)
            ->setDescription($description)
            ->addImage($image);

        Meta::registerPackage($og);
        Meta::setTitle($title)
            ->setDescription($description)
            ->setCanonical($url)
            ->setFavicon('favicon-index.ico');
    }

    function selectData($data)
    {
        $arr = Arr::pluck($data, 'nama', 'nama');
        return Arr::prepend($arr, '-- Semua Kategori --', '');
    }
    
      public static function meetingStatusId($start_time, $duration)
    {
        $date_start_id = Carbon::parse($start_time)->setTimezone('Asia/Jakarta');
        $date_now_id  = Carbon::now()->setTimezone('Asia/Jakarta');

        $diff = $date_now_id->diffInMinutes($date_start_id, false);

        if ($diff < 0) {
            if (abs($diff) <= $duration) {
                return "success";
            } else {
                return "danger";
            }
        }
        else {
            return "primary";
        }


    }

    public static function meetingDateTimeId($start_time)
    {
        $date_start_id = Carbon::parse($start_time)->setTimezone('Asia/Jakarta');
        return $date_start_id->format("d/m/Y H:i");
    }

    public static function meetingDateId($start_time)
    {
        $date_start_id = Carbon::parse($start_time)->setTimezone('Asia/Jakarta');
        return $date_start_id->format("d M Y");
    }

    public static function meetingTimeId($start_time, $duration)
    {
        $date_start_id = Carbon::parse($start_time)->setTimezone('Asia/Jakarta');
        $date_end_id = Carbon::parse($start_time)->addMinutes($duration)->setTimezone('Asia/Jakarta');
        return $date_start_id->format("H:i")."-".$date_end_id->format("H:i");
    }

}
