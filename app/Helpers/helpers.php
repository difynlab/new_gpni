<?php

// if(!function_exists('getLanguageSpecificValue')) {
//     function getLanguageSpecificValue($language, $object, $field)
//     {
//         switch($language) {
//             case 'English':
//                 $short_code = 'en';
//                 break;
//             case 'Chinese':
//                 $short_code = 'zh';
//                 break;
//             case 'Japanese':
//                 $short_code = 'ja';
//                 break;
//             default:
//                 break;
//         }

//         $field_name = $field . '_' . $short_code;

//         if(isset($object->$field_name)) {
//             return $object->$field_name;
//         }
//     }
// }