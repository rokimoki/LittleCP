<?php
/**
 * Class description for Character object.
 *
 * @author @rokimoki
 */
include_once('DB/CharDB.php');
class Char {
    private $char_id, $account_id, $char_num, $name, $class, $base_level,
            $job_level, $base_exp, $job_exp, $zeny, $str, $agi, $vit, $int,
            $dex, $luk, $max_hp, $hp, $max_sp, $sp, $status_point, $skill_point,
            $option, $karma, $manner, $party_id, $guild_id, $pet_id, $homun_id,
            $elemental_id, $hair, $hair_color, $clothes_color, $body, $weapon,
            $shield, $head_top, $head_mid, $head_bottom, $robe, $last_map,
            $last_x, $last_y, $save_map, $save_x, $save_y, $partner_id, $online,
            $father, $mother, $child, $fame, $rename, $delete_date, $slotchange,
            $char_opt, $font, $unban_time, $uniqueitem_counter, $sex, $hotkey_rowshift;
    
    public function __construct($char_id="", $account_id="", $char_num="", $name="",
            $class="", $base_level="", $job_level="", $base_exp="", $job_exp="",
            $zeny="", $str="", $agi="", $vit="", $int="", $dex="", $luk="",
            $max_hp="", $hp="", $max_sp="", $sp="", $status_point="", $skill_point="",
            $option="", $karma="", $manner="", $party_id="", $guild_id="", $pet_id="",
            $homun_id="", $elemental_id="", $hair="", $hair_color="", $clothes_color=""
            , $body="", $weapon="", $shield="", $head_top="", $head_mid="",
            $head_bottom="", $robe="", $last_map="", $last_x="", $last_y="",
            $save_map="", $save_x="", $save_y="", $partner_id="", $online="",
            $father="", $mother="", $child="", $fame="", $rename="", $delete_date="",
            $slotchange="", $char_opt="", $font="", $unban_time="", $uniqueitem_counter="",
            $sex="", $hotkey_rowshift="") {
        $this->char_id=$char_id;
        $this->account_id=$account_id;
        $this->char_num=$char_num;
        $this->name=$name;
        $this->class=$class;
        $this->base_level=$base_level;
        $this->job_level=$job_level;
        $this->base_exp=$base_exp;
        $this->job_exp=$job_exp;
        $this->zeny=$zeny;
        $this->str=$str;
        $this->agi=$agi;
        $this->vit=$vit;
        $this->int=$int;
        $this->dex=$dex;
        $this->luk=$luk;
        $this->max_hp=$max_hp;
        $this->hp=$hp;
        $this->max_sp=$max_sp;
        $this->sp=$sp;
        $this->status_point=$status_point;
        $this->skill_point=$skill_point;
        $this->option=$option;
        $this->karma=$karma;
        $this->manner=$manner;
        $this->party_id=$party_id;
        $this->guild_id=$guild_id;
        $this->pet_id=$pet_id;
        $this->homun_id=$homun_id;
        $this->elemental_id=$elemental_id;
        $this->hair=$hair;
        $this->hair_color=$hair_color;
        $this->clothes_color=$clothes_color;
        $this->body=$body;
        $this->weapon=$weapon;
        $this->shield=$shield;
        $this->head_top=$head_top;
        $this->head_mid=$head_mid;
        $this->head_bottom=$head_bottom;
        $this->robe=$robe;
        $this->last_map=$last_map;
        $this->last_x=$last_x;
        $this->last_y=$last_y;
        $this->save_map=$save_map;
        $this->save_x=$save_x;
        $this->save_y=$save_y;
        $this->partner_id=$partner_id;
        $this->online=$online;
        $this->father=$father;
        $this->mother=$mother;
        $this->child=$child;
        $this->fame=$fame;
        $this->rename=$rename;
        $this->delete_date=$delete_date;
        $this->slotchange=$slotchange;
        $this->char_opt=$char_opt;
        $this->font=$font;
        $this->unban_time=$unban_time;
        $this->uniqueitem_counter=$uniqueitem_counter;
        $this->sex=$sex;
        $this->hotkey_rowshift=$hotkey_rowshift;
    }
    
    public function &__get($propiedad) {
        if (property_exists($this, $propiedad)) {
            return $this->$propiedad;
        }
    }

    public function &__set($propiedad, $valor) {
        if (property_exists($this, $propiedad)) {
            $this->$propiedad = $valor;
        }
    }
    
    public function countOnlinePlayers() {
        $players = CharDB::countOnlinePlayers();
        $players = $players->fetch();
        return $players['players_online'];
    }
}
