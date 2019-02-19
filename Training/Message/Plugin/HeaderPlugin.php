<?php
namespace Training\Message\Plugin;

class HeaderPlugin {

    public function afterGetWelcome(\Training\Message\Block\CustomHeader $subject, $result) {
        return $result . " from plugin";
    }
}