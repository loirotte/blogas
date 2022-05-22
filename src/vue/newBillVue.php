<?php

namespace blogapp\vue;
use blogapp\vue\vue;

class newBillVue
{
    const NOUVEAU_VUE = 1;

    public function render() {
        switch($this->selecteur){
            case self::NOUVEAU_VUE:
                $content = $this->nouveau();
                break;
        }
        return $this->userPage($content);
    }

    public function nouveau() {
        return <<<YOP
            <form method="post" action="{$this->cont['router']->pathFor('bill_cree')}">
            <h1>New Bill</h1>
            <input type="text" name="title" class="toggle-all" placeholder="Bill Title" required><br>
            <textarea name="body" class="txtarea" placeholder="Bill text/content" required/><br>
            <p>pick your article category :</p><br>
            <div class="choice">
                <input type="radio" name="category" value="Sport">Sport</input>
                <input type="radio" name="category" value="Cinema">Cinema</input>
                <input type="radio" name="category" value="Music">Music</input>
                <input type="radio" name="category" value="TV">TV</input>
                <input type="radio" name="category" value="Other">Other</input>
            </div>
            <input type="submit" name="Submit">
            </form>
YOP;

}
}

?>