<?php
    include('class.uploader.php');
    
    
 
    $uploader = new Uploader();
    $data = $uploader->upload($_FILES['files'], array(
        'limit' => 20, //Maximum Limit of files. {null, Number}
        'maxSize' => 700, //Maximum Size of files {null, Number(in MB's)}
        'extensions' => null, //Whitelist for file extension. {null, Array(ex: array('jpg', 'png'))}
        'required' => false, //Minimum one file is required for upload {Boolean}
        'uploadDir' => '../../tutorials_video/' , //Upload directory {String}
        'title' => array('name'), //New file name {null, String, Array} *please read documentation in README.md
        'removeFiles' => true, //Enable file exclusion {Boolean(extra for jQuery.filer), String($_POST field name containing json data with file names)}
        'perms' => null, //Uploaded file permisions {null, Number}
        'onCheck' => null, //A callback function name to be called by checking a file for errors (must return an array) | ($file) | Callback
        'onError' => null, //A callback function name to be called if an error occured (must return an array) | ($errors, $file) | Callback
        'onSuccess' => null, //A callback function name to be called if all files were successfully uploaded | ($files, $metas) | Callback
        'onUpload' => null, //A callback function name to be called if all files were successfully uploaded (must return an array) | ($file) | Callback
        'onComplete' => null, //A callback function name to be called when upload is complete | ($file) | Callback
        'onRemove' => 'onFilesRemoveCallback' //A callback function name to be called by removing files (must return an array) | ($removed_files) | Callback
    ));
    
    if($data['isComplete']){
        $files = $data['data'];
        echo '<pre>';
        print_r($files);
                echo '</s   pre>';

         $files =$files['metas'] ;
            
       
        $file_tuts = dirname(__FILE__)."/../../../modular/apis/video_tuts_apis.php";
        if(is_file($file_tuts )) require_once $file_tuts  ;
        
        for($i=0; $i<count($files);$i++){
           $date =  $files[$i]['date'];
           $file_name =  $files[$i]['old_name'];
           $full_name =  $files[$i]['name'];
           $size2 =  $files[$i]['size2'];
           $size  =  $files[$i]['size'];
           $extension =  $files[$i]['extension'];
           $type =  $files[$i]['type'][0];  
           $type__ =  $files[$i]['type'][1];  
           $dir = trim ($files[$i]['file']);
         
          
            $add = new course_tuts_apis();
            $add->videotuts_application_add_new_field([
               'course_id'=>trim($_POST['course_id']) , // problem here 
               'lesson_name'=>$file_name ,
               'lesson_description'=>NULL , 
               'lesson_video_data'=> NULL  ,
               'lesson_video_url'=>$full_name,
               'file_type'=>$type ,
                'file_name'=>$type__ ,
               'size'=>$size2  ,
               'extension'=>$extension ,
               'date'=>$date ,
               'lesson_video_size'=>$size 
           ]);
           //sleep(1);
        }
    }

    
 
?>
