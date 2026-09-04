<?php

/**
 * Template part for SNSシェアボタン
 * Add To Any プラグインを使うことにしたので、使用しない。
 */

?>
<?php
// 現在のページURLを取得してURLエンコード
$url_encode = urlencode(get_permalink());
// 現在のページのタイトルを取得してURLエンコード
$title_encode = urlencode(get_the_title());
?>

<ul class="sns_btns">
    <li class="ico_instagram"><a href="">insta</a></li>
    <li class="ico_x"><a class="sns-link" target="_blank" href="<?php echo esc_url('https://twitter.com/intent/tweet?url=' . $url_encode . '&text=' . $title_encode); ?>">Twitter</a></li>
    <li class="ico_facebook"> <a class="sns-link" target="_blank" href="<?php echo esc_url('https://www.facebook.com/share.php?u=' . $url_encode); ?>">Facebook</a></li>
    <li class="ico_line"><a class="sns-link" target="_blank" href="<?php echo esc_url('https://line.me/R/msg/text/?' . $title_encode . '%0A' . $url_encode); ?>">LINE</a></li>
</ul>