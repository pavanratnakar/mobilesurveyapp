<?php
Class Form{
    public function createRadio($name,$data,$question){
        $return = '<fieldset data-role="controlgroup" >';
        $return .= '<legend>'.$question.'</legend>';
        foreach($data as $key=>$value) {
            $return .= '
                <input type="radio" name="'.$name.'" id="'.$value['name'].'" value="'.$value['id'].'" '.($key===0 ? 'checked="checked"' : '').'>
                <label for="'.$value['name'].'">'.$value['name'].'</label>';
        }
        $return .= '</fieldset>';
        return $return;
    }
    public function createSlider($id,$data,$question){
        $return = '<label for="'.$id.'">'.$question.'</label>';
        $return .= '<select name="'.$id.'" id="'.$id.'" data-role="slider" data-mini="true">';
        foreach($data as $key=>$value) {
            $return .= '<option value="'.$key.'">'.$value.'</option>';
        }
        $return .= '</select>';
        return $return;
    }
}
?>