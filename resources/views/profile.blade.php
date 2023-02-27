
<!DOCTYPE html>
<html class="html" lang="en-US">
<head>
  <meta charset="UTF-8">
  <link rel="profile" href="https://gmpg.org/xfn/11">

  <meta name='robots' content='index, follow, max-image-preview:large, max-snippet:-1, max-video-preview:-1' />
<meta name="viewport" content="width=device-width, initial-scale=1">
  <!-- This site is optimized with the Yoast SEO plugin v19.10 - https://yoast.com/wordpress/plugins/seo/ -->
  <title>{{ ucwords($user->name) }} - SCOPE</title>
  <link rel="canonical" href="{{ url( $user->scope->scope ) }}" />
  <meta property="og:locale" content="en_US" />
  <meta property="og:type" content="article" />
  <meta property="og:title" content="{{ ucwords($user->name) }} - SCOPE" />
  <meta property="og:description" content="{{ $user->academicInformation->bio }}" />
  <meta property="og:url" content="{{ url( $user->scope->scope ) }}" />
  <meta property="og:site_name" content="SCOPE" />
  <meta property="article:modified_time" content="2022-11-13T11:20:41+00:00" />
  <meta property="og:image" content="{{ url('/public/assets/images/user/'.$user->card->photo) }}" />
  <meta name="twitter:card" content="summary_large_image" />
  <meta name="twitter:label1" content="Est. reading time" />
  <meta name="twitter:data1" content="4 minutes" />


<link rel="alternate" type="application/rss+xml" title="SCOPE &raquo; Feed" href="https://scope.directory/feed/" />
<link rel="alternate" type="application/rss+xml" title="SCOPE &raquo; Comments Feed" href="https://scope.directory/comments/feed/" />
<script>
window._wpemojiSettings = {"baseUrl":"https:\/\/s.w.org\/images\/core\/emoji\/14.0.0\/72x72\/","ext":".png","svgUrl":"https:\/\/s.w.org\/images\/core\/emoji\/14.0.0\/svg\/","svgExt":".svg","source":{"concatemoji":"https:\/\/scope.directory\/wp-includes\/js\/wp-emoji-release.min.js?ver=6.1.1"}};
/*! This file is auto-generated */
!function(e,a,t){var n,r,o,i=a.createElement("canvas"),p=i.getContext&&i.getContext("2d");function s(e,t){var a=String.fromCharCode,e=(p.clearRect(0,0,i.width,i.height),p.fillText(a.apply(this,e),0,0),i.toDataURL());return p.clearRect(0,0,i.width,i.height),p.fillText(a.apply(this,t),0,0),e===i.toDataURL()}function c(e){var t=a.createElement("script");t.src=e,t.defer=t.type="text/javascript",a.getElementsByTagName("head")[0].appendChild(t)}for(o=Array("flag","emoji"),t.supports={everything:!0,everythingExceptFlag:!0},r=0;r<o.length;r++)t.supports[o[r]]=function(e){if(p&&p.fillText)switch(p.textBaseline="top",p.font="600 32px Arial",e){case"flag":return s([127987,65039,8205,9895,65039],[127987,65039,8203,9895,65039])?!1:!s([55356,56826,55356,56819],[55356,56826,8203,55356,56819])&&!s([55356,57332,56128,56423,56128,56418,56128,56421,56128,56430,56128,56423,56128,56447],[55356,57332,8203,56128,56423,8203,56128,56418,8203,56128,56421,8203,56128,56430,8203,56128,56423,8203,56128,56447]);case"emoji":return!s([129777,127995,8205,129778,127999],[129777,127995,8203,129778,127999])}return!1}(o[r]),t.supports.everything=t.supports.everything&&t.supports[o[r]],"flag"!==o[r]&&(t.supports.everythingExceptFlag=t.supports.everythingExceptFlag&&t.supports[o[r]]);t.supports.everythingExceptFlag=t.supports.everythingExceptFlag&&!t.supports.flag,t.DOMReady=!1,t.readyCallback=function(){t.DOMReady=!0},t.supports.everything||(n=function(){t.readyCallback()},a.addEventListener?(a.addEventListener("DOMContentLoaded",n,!1),e.addEventListener("load",n,!1)):(e.attachEvent("onload",n),a.attachEvent("onreadystatechange",function(){"complete"===a.readyState&&t.readyCallback()})),(e=t.source||{}).concatemoji?c(e.concatemoji):e.wpemoji&&e.twemoji&&(c(e.twemoji),c(e.wpemoji)))}(window,document,window._wpemojiSettings);
</script>
<style>
img.wp-smiley,
img.emoji {
  display: inline !important;
  border: none !important;
  box-shadow: none !important;
  height: 1em !important;
  width: 1em !important;
  margin: 0 0.07em !important;
  vertical-align: -0.1em !important;
  background: none !important;
  padding: 0 !important;
}
</style>
  <link rel='stylesheet' id='sina-morphing-anim-css' href='https://scope.directory/wp-content/plugins/sina-extension-for-elementor/assets/css/sina-morphing.min.css?ver=3.4.4' media='all' />
<link rel='stylesheet' id='classic-theme-styles-css' href='https://scope.directory/wp-includes/css/classic-themes.min.css?ver=1' media='all' />
<style id='global-styles-inline-css'>
body{--wp--preset--color--black: #000000;--wp--preset--color--cyan-bluish-gray: #abb8c3;--wp--preset--color--white: #ffffff;--wp--preset--color--pale-pink: #f78da7;--wp--preset--color--vivid-red: #cf2e2e;--wp--preset--color--luminous-vivid-orange: #ff6900;--wp--preset--color--luminous-vivid-amber: #fcb900;--wp--preset--color--light-green-cyan: #7bdcb5;--wp--preset--color--vivid-green-cyan: #00d084;--wp--preset--color--pale-cyan-blue: #8ed1fc;--wp--preset--color--vivid-cyan-blue: #0693e3;--wp--preset--color--vivid-purple: #9b51e0;--wp--preset--gradient--vivid-cyan-blue-to-vivid-purple: linear-gradient(135deg,rgba(6,147,227,1) 0%,rgb(155,81,224) 100%);--wp--preset--gradient--light-green-cyan-to-vivid-green-cyan: linear-gradient(135deg,rgb(122,220,180) 0%,rgb(0,208,130) 100%);--wp--preset--gradient--luminous-vivid-amber-to-luminous-vivid-orange: linear-gradient(135deg,rgba(252,185,0,1) 0%,rgba(255,105,0,1) 100%);--wp--preset--gradient--luminous-vivid-orange-to-vivid-red: linear-gradient(135deg,rgba(255,105,0,1) 0%,rgb(207,46,46) 100%);--wp--preset--gradient--very-light-gray-to-cyan-bluish-gray: linear-gradient(135deg,rgb(238,238,238) 0%,rgb(169,184,195) 100%);--wp--preset--gradient--cool-to-warm-spectrum: linear-gradient(135deg,rgb(74,234,220) 0%,rgb(151,120,209) 20%,rgb(207,42,186) 40%,rgb(238,44,130) 60%,rgb(251,105,98) 80%,rgb(254,248,76) 100%);--wp--preset--gradient--blush-light-purple: linear-gradient(135deg,rgb(255,206,236) 0%,rgb(152,150,240) 100%);--wp--preset--gradient--blush-bordeaux: linear-gradient(135deg,rgb(254,205,165) 0%,rgb(254,45,45) 50%,rgb(107,0,62) 100%);--wp--preset--gradient--luminous-dusk: linear-gradient(135deg,rgb(255,203,112) 0%,rgb(199,81,192) 50%,rgb(65,88,208) 100%);--wp--preset--gradient--pale-ocean: linear-gradient(135deg,rgb(255,245,203) 0%,rgb(182,227,212) 50%,rgb(51,167,181) 100%);--wp--preset--gradient--electric-grass: linear-gradient(135deg,rgb(202,248,128) 0%,rgb(113,206,126) 100%);--wp--preset--gradient--midnight: linear-gradient(135deg,rgb(2,3,129) 0%,rgb(40,116,252) 100%);--wp--preset--duotone--dark-grayscale: url('#wp-duotone-dark-grayscale');--wp--preset--duotone--grayscale: url('#wp-duotone-grayscale');--wp--preset--duotone--purple-yellow: url('#wp-duotone-purple-yellow');--wp--preset--duotone--blue-red: url('#wp-duotone-blue-red');--wp--preset--duotone--midnight: url('#wp-duotone-midnight');--wp--preset--duotone--magenta-yellow: url('#wp-duotone-magenta-yellow');--wp--preset--duotone--purple-green: url('#wp-duotone-purple-green');--wp--preset--duotone--blue-orange: url('#wp-duotone-blue-orange');--wp--preset--font-size--small: 13px;--wp--preset--font-size--medium: 20px;--wp--preset--font-size--large: 36px;--wp--preset--font-size--x-large: 42px;--wp--preset--spacing--20: 0.44rem;--wp--preset--spacing--30: 0.67rem;--wp--preset--spacing--40: 1rem;--wp--preset--spacing--50: 1.5rem;--wp--preset--spacing--60: 2.25rem;--wp--preset--spacing--70: 3.38rem;--wp--preset--spacing--80: 5.06rem;}:where(.is-layout-flex){gap: 0.5em;}body .is-layout-flow > .alignleft{float: left;margin-inline-start: 0;margin-inline-end: 2em;}body .is-layout-flow > .alignright{float: right;margin-inline-start: 2em;margin-inline-end: 0;}body .is-layout-flow > .aligncenter{margin-left: auto !important;margin-right: auto !important;}body .is-layout-constrained > .alignleft{float: left;margin-inline-start: 0;margin-inline-end: 2em;}body .is-layout-constrained > .alignright{float: right;margin-inline-start: 2em;margin-inline-end: 0;}body .is-layout-constrained > .aligncenter{margin-left: auto !important;margin-right: auto !important;}body .is-layout-constrained > :where(:not(.alignleft):not(.alignright):not(.alignfull)){max-width: var(--wp--style--global--content-size);margin-left: auto !important;margin-right: auto !important;}body .is-layout-constrained > .alignwide{max-width: var(--wp--style--global--wide-size);}body .is-layout-flex{display: flex;}body .is-layout-flex{flex-wrap: wrap;align-items: center;}body .is-layout-flex > *{margin: 0;}:where(.wp-block-columns.is-layout-flex){gap: 2em;}.has-black-color{color: var(--wp--preset--color--black) !important;}.has-cyan-bluish-gray-color{color: var(--wp--preset--color--cyan-bluish-gray) !important;}.has-white-color{color: var(--wp--preset--color--white) !important;}.has-pale-pink-color{color: var(--wp--preset--color--pale-pink) !important;}.has-vivid-red-color{color: var(--wp--preset--color--vivid-red) !important;}.has-luminous-vivid-orange-color{color: var(--wp--preset--color--luminous-vivid-orange) !important;}.has-luminous-vivid-amber-color{color: var(--wp--preset--color--luminous-vivid-amber) !important;}.has-light-green-cyan-color{color: var(--wp--preset--color--light-green-cyan) !important;}.has-vivid-green-cyan-color{color: var(--wp--preset--color--vivid-green-cyan) !important;}.has-pale-cyan-blue-color{color: var(--wp--preset--color--pale-cyan-blue) !important;}.has-vivid-cyan-blue-color{color: var(--wp--preset--color--vivid-cyan-blue) !important;}.has-vivid-purple-color{color: var(--wp--preset--color--vivid-purple) !important;}.has-black-background-color{background-color: var(--wp--preset--color--black) !important;}.has-cyan-bluish-gray-background-color{background-color: var(--wp--preset--color--cyan-bluish-gray) !important;}.has-white-background-color{background-color: var(--wp--preset--color--white) !important;}.has-pale-pink-background-color{background-color: var(--wp--preset--color--pale-pink) !important;}.has-vivid-red-background-color{background-color: var(--wp--preset--color--vivid-red) !important;}.has-luminous-vivid-orange-background-color{background-color: var(--wp--preset--color--luminous-vivid-orange) !important;}.has-luminous-vivid-amber-background-color{background-color: var(--wp--preset--color--luminous-vivid-amber) !important;}.has-light-green-cyan-background-color{background-color: var(--wp--preset--color--light-green-cyan) !important;}.has-vivid-green-cyan-background-color{background-color: var(--wp--preset--color--vivid-green-cyan) !important;}.has-pale-cyan-blue-background-color{background-color: var(--wp--preset--color--pale-cyan-blue) !important;}.has-vivid-cyan-blue-background-color{background-color: var(--wp--preset--color--vivid-cyan-blue) !important;}.has-vivid-purple-background-color{background-color: var(--wp--preset--color--vivid-purple) !important;}.has-black-border-color{border-color: var(--wp--preset--color--black) !important;}.has-cyan-bluish-gray-border-color{border-color: var(--wp--preset--color--cyan-bluish-gray) !important;}.has-white-border-color{border-color: var(--wp--preset--color--white) !important;}.has-pale-pink-border-color{border-color: var(--wp--preset--color--pale-pink) !important;}.has-vivid-red-border-color{border-color: var(--wp--preset--color--vivid-red) !important;}.has-luminous-vivid-orange-border-color{border-color: var(--wp--preset--color--luminous-vivid-orange) !important;}.has-luminous-vivid-amber-border-color{border-color: var(--wp--preset--color--luminous-vivid-amber) !important;}.has-light-green-cyan-border-color{border-color: var(--wp--preset--color--light-green-cyan) !important;}.has-vivid-green-cyan-border-color{border-color: var(--wp--preset--color--vivid-green-cyan) !important;}.has-pale-cyan-blue-border-color{border-color: var(--wp--preset--color--pale-cyan-blue) !important;}.has-vivid-cyan-blue-border-color{border-color: var(--wp--preset--color--vivid-cyan-blue) !important;}.has-vivid-purple-border-color{border-color: var(--wp--preset--color--vivid-purple) !important;}.has-vivid-cyan-blue-to-vivid-purple-gradient-background{background: var(--wp--preset--gradient--vivid-cyan-blue-to-vivid-purple) !important;}.has-light-green-cyan-to-vivid-green-cyan-gradient-background{background: var(--wp--preset--gradient--light-green-cyan-to-vivid-green-cyan) !important;}.has-luminous-vivid-amber-to-luminous-vivid-orange-gradient-background{background: var(--wp--preset--gradient--luminous-vivid-amber-to-luminous-vivid-orange) !important;}.has-luminous-vivid-orange-to-vivid-red-gradient-background{background: var(--wp--preset--gradient--luminous-vivid-orange-to-vivid-red) !important;}.has-very-light-gray-to-cyan-bluish-gray-gradient-background{background: var(--wp--preset--gradient--very-light-gray-to-cyan-bluish-gray) !important;}.has-cool-to-warm-spectrum-gradient-background{background: var(--wp--preset--gradient--cool-to-warm-spectrum) !important;}.has-blush-light-purple-gradient-background{background: var(--wp--preset--gradient--blush-light-purple) !important;}.has-blush-bordeaux-gradient-background{background: var(--wp--preset--gradient--blush-bordeaux) !important;}.has-luminous-dusk-gradient-background{background: var(--wp--preset--gradient--luminous-dusk) !important;}.has-pale-ocean-gradient-background{background: var(--wp--preset--gradient--pale-ocean) !important;}.has-electric-grass-gradient-background{background: var(--wp--preset--gradient--electric-grass) !important;}.has-midnight-gradient-background{background: var(--wp--preset--gradient--midnight) !important;}.has-small-font-size{font-size: var(--wp--preset--font-size--small) !important;}.has-medium-font-size{font-size: var(--wp--preset--font-size--medium) !important;}.has-large-font-size{font-size: var(--wp--preset--font-size--large) !important;}.has-x-large-font-size{font-size: var(--wp--preset--font-size--x-large) !important;}
.wp-block-navigation a:where(:not(.wp-element-button)){color: inherit;}
:where(.wp-block-columns.is-layout-flex){gap: 2em;}
.wp-block-pullquote{font-size: 1.5em;line-height: 1.6;}
      
.elementor-id-data {
  display: block;
  position: absolute;
  height: 100%;
  width: 100%;
  top: 0;
  left: 0;
  z-index: 1;
  box-sizing: border-box;
}
.elementor-id-data svg {
  width: 100%;
}

.elementor-id-data-front {
  padding-top: 12%;
  padding-left: 33%;
}
.elementor-id-data-front span {
  display: block;
  position: absolute;
  left: 33%;
  font-weight: 700;
  font-size: 2.7vw;
  line-height: 110%;
}
@media screen and (min-width: 768px) {
  .elementor-id-data-front span {
    font-size: 1vw;
  }
}
@media screen and (min-width: 1330px) {
  .elementor-id-data-front span {
    font-size: 13px;
  }
}
.elementor-id-data-front .elementor-id-data-id-img {
  position: absolute;
  left: 4%;
  top: 31%;
  width: 26%;
  padding-top: 34.7%;
}
.elementor-id-data-front .elementor-id-data-id-img img {
  position: absolute;
  top: 0;
  left: 0;
  width: 100%;
  height: 100%;
  object-fit: cover;
  object-position: center;
}
.elementor-id-data-front .elementor-id-data-id {
  position: relative;
  color: #FF0000;
  font-size: 4.1vw;
  left: 0;
}
@media screen and (min-width: 768px) {
  .elementor-id-data-front .elementor-id-data-id {
    font-size: 1.34vw;
  }
}
@media screen and (min-width: 1330px) {
  .elementor-id-data-front .elementor-id-data-id {
    font-size: 18px;
  }
}
.elementor-id-data-front .elementor-id-data-name {
  top: 37%;
}
.elementor-id-data-front .elementor-id-data-title {
  padding-right: 7%;
  top: 50%;
}
.elementor-id-data-front .elementor-id-data-imapct-factor {
  top: 68%;
}
.elementor-id-data-front .elementor-id-data-country {
  top: 80%;
}
.elementor-id-data-front .elementor-id-data-validity {
  left: 20%;
  top: 90.5%;
  font-size: 2.5vw;
}
@media screen and (min-width: 768px) {
  .elementor-id-data-front .elementor-id-data-validity {
    top: 91%;
    font-size: 0.84vw;
  }
}
@media screen and (min-width: 1330px) {
  .elementor-id-data-front .elementor-id-data-validity {
    font-size: 12px;
  }
}

 .elementor-id-data-board {
    top: 54%;
    left: 9%;
  }

 .elementor-id-data-tesol {
    top: 60%;
    left: 9%;
  }

 .elementor-id-data-category {
    top: 66%;
    left: 9%;
  }

 .elementor-id-data-imapct-affiliation {
    top: 72%;
    left: 9%;
  }

.elementor-id-data-back {
  padding-top: 33%;
  padding-left: 26%;
}

/*.elementor-id-data-back span:not(:last-child) {
  margin-bottom: 0.8%;
}*/
@media screen and (min-width: 768px) {
  .elementor-id-data-back span {
    font-size: 0.75vw;
  }
}
@media screen and (min-width: 1330px) {
  .elementor-id-data-back span {
    font-size: 12px;
  }
}

  .elementor-id-data-back span {
    display: block;
    position: absolute;
    left: 8.9%;
    font-weight: 700;
    font-size: 0.7vw;
    line-height: 110%;
  }

</style>
<link rel='stylesheet' id='contact-form-7-css' href='https://scope.directory/wp-content/plugins/contact-form-7/includes/css/styles.css?ver=5.6.4' media='all' />
<link rel='stylesheet' id='hfe-style-css' href='https://scope.directory/wp-content/plugins/header-footer-elementor/assets/css/header-footer-elementor.css?ver=1.6.13' media='all' />
<link rel='stylesheet' id='elementor-icons-css' href='https://scope.directory/wp-content/plugins/elementor/assets/lib/eicons/css/elementor-icons.min.css?ver=5.16.0' media='all' />
<link rel='stylesheet' id='elementor-frontend-css' href='https://scope.directory/wp-content/plugins/elementor/assets/css/frontend-lite.min.css?ver=3.8.1' media='all' />
<link rel='stylesheet' id='elementor-post-5-css' href='https://scope.directory/wp-content/uploads/elementor/css/post-5.css?ver=1668358478' media='all' />
<link rel='stylesheet' id='elementor-global-css' href='https://scope.directory/wp-content/uploads/elementor/css/global.css?ver=1668358479' media='all' />
<link rel='stylesheet' id='elementor-post-1574-css' href='https://scope.directory/wp-content/uploads/elementor/css/post-1574.css?ver=1668701640' media='all' />
<link rel='stylesheet' id='hfe-widgets-style-css' href='https://scope.directory/wp-content/plugins/header-footer-elementor/inc/widgets-css/frontend.css?ver=1.6.13' media='all' />
<link rel='stylesheet' id='icofont-css' href='https://scope.directory/wp-content/plugins/sina-extension-for-elementor/admin/assets/css/icofont.min.css?ver=3.4.4' media='all' />
<link rel='stylesheet' id='font-awesome-css' href='https://scope.directory/wp-content/themes/oceanwp/assets/fonts/fontawesome/css/all.min.css?ver=5.15.1' media='all' />
<link rel='stylesheet' id='oceanwp-style-css' href='https://scope.directory/wp-content/themes/oceanwp/assets/css/style.min.css?ver=1.0' media='all' />
<link rel='stylesheet' id='child-style-css' href='https://scope.directory/wp-content/themes/oceanwp-child-theme-master/style.css?ver=6.1.1' media='all' />
<link rel='stylesheet' id='simple-line-icons-css' href='https://scope.directory/wp-content/themes/oceanwp/assets/css/third/simple-line-icons.min.css?ver=2.4.0' media='all' />
<link rel='stylesheet' id='oceanwp-google-font-montserrat-css' href='https://scope.directory/wp-content/uploads/oceanwp-webfonts-css/a14aa5fa76202380dcf0d3aad6f35cfb.css?ver=6.1.1' media='all' />
<link rel='stylesheet' id='oe-widgets-style-css' href='https://scope.directory/wp-content/plugins/ocean-extra/assets/css/widgets.css?ver=6.1.1' media='all' />
<link rel='stylesheet' id='google-fonts-1-css' href='https://fonts.googleapis.com/css?family=Roboto%3A100%2C100italic%2C200%2C200italic%2C300%2C300italic%2C400%2C400italic%2C500%2C500italic%2C600%2C600italic%2C700%2C700italic%2C800%2C800italic%2C900%2C900italic%7CRoboto+Slab%3A100%2C100italic%2C200%2C200italic%2C300%2C300italic%2C400%2C400italic%2C500%2C500italic%2C600%2C600italic%2C700%2C700italic%2C800%2C800italic%2C900%2C900italic%7CMontserrat%3A100%2C100italic%2C200%2C200italic%2C300%2C300italic%2C400%2C400italic%2C500%2C500italic%2C600%2C600italic%2C700%2C700italic%2C800%2C800italic%2C900%2C900italic&#038;display=auto&#038;ver=6.1.1' media='all' />
<script src='https://scope.directory/wp-includes/js/jquery/jquery.min.js?ver=3.6.1' id='jquery-core-js'></script>
<script src='https://scope.directory/wp-includes/js/jquery/jquery-migrate.min.js?ver=3.3.2' id='jquery-migrate-js'></script>
<link rel="https://api.w.org/" href="https://scope.directory/wp-json/" /><link rel="alternate" type="application/json" href="https://scope.directory/wp-json/wp/v2/pages/1574" /><link rel="EditURI" type="application/rsd+xml" title="RSD" href="https://scope.directory/xmlrpc.php?rsd" />
<link rel="wlwmanifest" type="application/wlwmanifest+xml" href="https://scope.directory/wp-includes/wlwmanifest.xml" />
<meta name="generator" content="WordPress 6.1.1" />
<link rel='shortlink' href='https://scope.directory/?p=1574' />
<link rel="alternate" type="application/json+oembed" href="https://scope.directory/wp-json/oembed/1.0/embed?url=https%3A%2F%2Fscope.directory%2Frod-ellis%2F" />
<link rel="alternate" type="text/xml+oembed" href="https://scope.directory/wp-json/oembed/1.0/embed?url=https%3A%2F%2Fscope.directory%2Frod-ellis%2F&#038;format=xml" />
    <!-- Global site tag (gtag.js) - Google Analytics -->
<script async src="https://www.googletagmanager.com/gtag/js?id=G-FWR9WS7DEF"></script>
    <script>
        window.dataLayer = window.dataLayer || [];
        function gtag(){dataLayer.push(arguments);}
        gtag('js', new Date());

        gtag('config', 'G-FWR9WS7DEF');
    </script>
    <link rel="icon" href="https://scope.directory/wp-content/uploads/2022/06/cropped-scope-icon-e1655704213167-32x32.png" sizes="32x32" />
<link rel="icon" href="https://scope.directory/wp-content/uploads/2022/06/cropped-scope-icon-e1655704213167-192x192.png" sizes="192x192" />
<link rel="apple-touch-icon" href="https://scope.directory/wp-content/uploads/2022/06/cropped-scope-icon-e1655704213167-180x180.png" />
<meta name="msapplication-TileImage" content="https://scope.directory/wp-content/uploads/2022/06/cropped-scope-icon-e1655704213167-270x270.png" />
    <style id="wp-custom-css">
      #main #content-wrap{padding-top:0;padding-bottom:0}#site-navigation-wrap .dropdown-menu>li.btn>a>span{background-color:#f8b60d;color:#003366}.widget-title{border-width:0;padding-left:0}.site-footer .widget_nav_menu li,.site-footer .widget_nav_menu li:first-child{border:0}span.elementor-button-text{text-align:left}h3.elementor-icon-box-title{margin:0}body div.wpforms-container-full .wpforms-form button[type=submit] div.wpforms-container-full,.wpforms-form button[type=submit]{color:#003366 !important}    </style>
    <!-- OceanWP CSS -->
<style type="text/css">
/* General CSS */a{color:#13aff0}a .owp-icon use{stroke:#13aff0}a:hover{color:#0b7cac}a:hover .owp-icon use{stroke:#0b7cac}#scroll-top{background-color:#f8b60d}body .theme-button,body input[type="submit"],body button[type="submit"],body button,body .button,body div.wpforms-container-full .wpforms-form input[type=submit],body div.wpforms-container-full .wpforms-form button[type=submit],body div.wpforms-container-full .wpforms-form .wpforms-page-button{background-color:#f8b60d}body .theme-button:hover,body input[type="submit"]:hover,body button[type="submit"]:hover,body button:hover,body .button:hover,body div.wpforms-container-full .wpforms-form input[type=submit]:hover,body div.wpforms-container-full .wpforms-form input[type=submit]:active,body div.wpforms-container-full .wpforms-form button[type=submit]:hover,body div.wpforms-container-full .wpforms-form button[type=submit]:active,body div.wpforms-container-full .wpforms-form .wpforms-page-button:hover,body div.wpforms-container-full .wpforms-form .wpforms-page-button:active{background-color:#13aff0}/* Header CSS */#site-logo #site-logo-inner,.oceanwp-social-menu .social-menu-inner,#site-header.full_screen-header .menu-bar-inner,.after-header-content .after-header-content-inner{height:90px}#site-navigation-wrap .dropdown-menu >li >a,.oceanwp-mobile-menu-icon a,.mobile-menu-close,.after-header-content-inner >a{line-height:90px}#site-header,.has-transparent-header .is-sticky #site-header,.has-vh-transparent .is-sticky #site-header.vertical-header,#searchform-header-replace{background-color:#003366}#site-header.has-header-media .overlay-header-media{background-color:rgba(0,0,0,0.5)}#site-header #site-logo #site-logo-inner a img,#site-header.center-header #site-navigation-wrap .middle-site-logo a img{max-height:40px}#site-navigation-wrap .dropdown-menu >li >a,.oceanwp-mobile-menu-icon a,#searchform-header-replace-close{color:#ffffff}#site-navigation-wrap .dropdown-menu >li >a .owp-icon use,.oceanwp-mobile-menu-icon a .owp-icon use,#searchform-header-replace-close .owp-icon use{stroke:#ffffff}#site-navigation-wrap .dropdown-menu >.current-menu-item >a,#site-navigation-wrap .dropdown-menu >.current-menu-ancestor >a,#site-navigation-wrap .dropdown-menu >.current-menu-item >a:hover,#site-navigation-wrap .dropdown-menu >.current-menu-ancestor >a:hover{color:#13aff0}/* Footer Widgets CSS */#footer-widgets{background-color:#003366}/* Footer Bottom CSS */#footer-bottom,#footer-bottom p{color:#999999}/* Typography CSS */body{font-family:Montserrat}h1{font-family:Montserrat}h2{font-family:Montserrat;font-weight:600}h3{font-family:Montserrat}h4{font-family:Montserrat}#site-navigation-wrap .dropdown-menu >li >a,#site-header.full_screen-header .fs-dropdown-menu >li >a,#site-header.top-header #site-navigation-wrap .dropdown-menu >li >a,#site-header.center-header #site-navigation-wrap .dropdown-menu >li >a,#site-header.medium-header #site-navigation-wrap .dropdown-menu >li >a,.oceanwp-mobile-menu-icon a{font-family:Montserrat;font-weight:600;font-style:normal;font-size:14px;text-transform:uppercase}.dropdown-menu ul li a.menu-link,#site-header.full_screen-header .fs-dropdown-menu ul.sub-menu li a{font-family:Montserrat}.sidr-class-dropdown-menu li a,a.sidr-class-toggle-sidr-close,#mobile-dropdown ul li a,body #mobile-fullscreen ul li a{font-family:Montserrat;font-weight:500}.page-header .page-header-title,.page-header.background-image-page-header .page-header-title{font-family:Montserrat}.page-header .page-subheading{font-family:Montserrat}.sidebar-box,.footer-box{font-family:Montserrat}#footer-widgets .footer-box .widget-title{font-family:Montserrat;font-weight:600;color:#13aff0;text-transform:uppercase}#footer-bottom #copyright{font-family:Montserrat}#footer-bottom #footer-bottom-menu{font-family:Montserrat}
</style></head>

<body class="page-template-default page page-id-1574 wp-custom-logo wp-embed-responsive ehf-template-oceanwp ehf-stylesheet-oceanwp-child-theme-master oceanwp-theme dropdown-mobile no-header-border default-breakpoint content-full-width content-max-width has-breadcrumbs elementor-default elementor-kit-5 elementor-page elementor-page-1574" itemscope="itemscope" itemtype="https://schema.org/WebPage">

  <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 0 0" width="0" height="0" focusable="false" role="none" style="visibility: hidden; position: absolute; left: -9999px; overflow: hidden;" ><defs><filter id="wp-duotone-dark-grayscale"><feColorMatrix color-interpolation-filters="sRGB" type="matrix" values=" .299 .587 .114 0 0 .299 .587 .114 0 0 .299 .587 .114 0 0 .299 .587 .114 0 0 " /><feComponentTransfer color-interpolation-filters="sRGB" ><feFuncR type="table" tableValues="0 0.49803921568627" /><feFuncG type="table" tableValues="0 0.49803921568627" /><feFuncB type="table" tableValues="0 0.49803921568627" /><feFuncA type="table" tableValues="1 1" /></feComponentTransfer><feComposite in2="SourceGraphic" operator="in" /></filter></defs></svg><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 0 0" width="0" height="0" focusable="false" role="none" style="visibility: hidden; position: absolute; left: -9999px; overflow: hidden;" ><defs><filter id="wp-duotone-grayscale"><feColorMatrix color-interpolation-filters="sRGB" type="matrix" values=" .299 .587 .114 0 0 .299 .587 .114 0 0 .299 .587 .114 0 0 .299 .587 .114 0 0 " /><feComponentTransfer color-interpolation-filters="sRGB" ><feFuncR type="table" tableValues="0 1" /><feFuncG type="table" tableValues="0 1" /><feFuncB type="table" tableValues="0 1" /><feFuncA type="table" tableValues="1 1" /></feComponentTransfer><feComposite in2="SourceGraphic" operator="in" /></filter></defs></svg><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 0 0" width="0" height="0" focusable="false" role="none" style="visibility: hidden; position: absolute; left: -9999px; overflow: hidden;" ><defs><filter id="wp-duotone-purple-yellow"><feColorMatrix color-interpolation-filters="sRGB" type="matrix" values=" .299 .587 .114 0 0 .299 .587 .114 0 0 .299 .587 .114 0 0 .299 .587 .114 0 0 " /><feComponentTransfer color-interpolation-filters="sRGB" ><feFuncR type="table" tableValues="0.54901960784314 0.98823529411765" /><feFuncG type="table" tableValues="0 1" /><feFuncB type="table" tableValues="0.71764705882353 0.25490196078431" /><feFuncA type="table" tableValues="1 1" /></feComponentTransfer><feComposite in2="SourceGraphic" operator="in" /></filter></defs></svg><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 0 0" width="0" height="0" focusable="false" role="none" style="visibility: hidden; position: absolute; left: -9999px; overflow: hidden;" ><defs><filter id="wp-duotone-blue-red"><feColorMatrix color-interpolation-filters="sRGB" type="matrix" values=" .299 .587 .114 0 0 .299 .587 .114 0 0 .299 .587 .114 0 0 .299 .587 .114 0 0 " /><feComponentTransfer color-interpolation-filters="sRGB" ><feFuncR type="table" tableValues="0 1" /><feFuncG type="table" tableValues="0 0.27843137254902" /><feFuncB type="table" tableValues="0.5921568627451 0.27843137254902" /><feFuncA type="table" tableValues="1 1" /></feComponentTransfer><feComposite in2="SourceGraphic" operator="in" /></filter></defs></svg><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 0 0" width="0" height="0" focusable="false" role="none" style="visibility: hidden; position: absolute; left: -9999px; overflow: hidden;" ><defs><filter id="wp-duotone-midnight"><feColorMatrix color-interpolation-filters="sRGB" type="matrix" values=" .299 .587 .114 0 0 .299 .587 .114 0 0 .299 .587 .114 0 0 .299 .587 .114 0 0 " /><feComponentTransfer color-interpolation-filters="sRGB" ><feFuncR type="table" tableValues="0 0" /><feFuncG type="table" tableValues="0 0.64705882352941" /><feFuncB type="table" tableValues="0 1" /><feFuncA type="table" tableValues="1 1" /></feComponentTransfer><feComposite in2="SourceGraphic" operator="in" /></filter></defs></svg><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 0 0" width="0" height="0" focusable="false" role="none" style="visibility: hidden; position: absolute; left: -9999px; overflow: hidden;" ><defs><filter id="wp-duotone-magenta-yellow"><feColorMatrix color-interpolation-filters="sRGB" type="matrix" values=" .299 .587 .114 0 0 .299 .587 .114 0 0 .299 .587 .114 0 0 .299 .587 .114 0 0 " /><feComponentTransfer color-interpolation-filters="sRGB" ><feFuncR type="table" tableValues="0.78039215686275 1" /><feFuncG type="table" tableValues="0 0.94901960784314" /><feFuncB type="table" tableValues="0.35294117647059 0.47058823529412" /><feFuncA type="table" tableValues="1 1" /></feComponentTransfer><feComposite in2="SourceGraphic" operator="in" /></filter></defs></svg><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 0 0" width="0" height="0" focusable="false" role="none" style="visibility: hidden; position: absolute; left: -9999px; overflow: hidden;" ><defs><filter id="wp-duotone-purple-green"><feColorMatrix color-interpolation-filters="sRGB" type="matrix" values=" .299 .587 .114 0 0 .299 .587 .114 0 0 .299 .587 .114 0 0 .299 .587 .114 0 0 " /><feComponentTransfer color-interpolation-filters="sRGB" ><feFuncR type="table" tableValues="0.65098039215686 0.40392156862745" /><feFuncG type="table" tableValues="0 1" /><feFuncB type="table" tableValues="0.44705882352941 0.4" /><feFuncA type="table" tableValues="1 1" /></feComponentTransfer><feComposite in2="SourceGraphic" operator="in" /></filter></defs></svg><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 0 0" width="0" height="0" focusable="false" role="none" style="visibility: hidden; position: absolute; left: -9999px; overflow: hidden;" ><defs><filter id="wp-duotone-blue-orange"><feColorMatrix color-interpolation-filters="sRGB" type="matrix" values=" .299 .587 .114 0 0 .299 .587 .114 0 0 .299 .587 .114 0 0 .299 .587 .114 0 0 " /><feComponentTransfer color-interpolation-filters="sRGB" ><feFuncR type="table" tableValues="0.098039215686275 1" /><feFuncG type="table" tableValues="0 0.66274509803922" /><feFuncB type="table" tableValues="0.84705882352941 0.41960784313725" /><feFuncA type="table" tableValues="1 1" /></feComponentTransfer><feComposite in2="SourceGraphic" operator="in" /></filter></defs></svg>
  
  <div id="outer-wrap" class="site clr">

    <a class="skip-link screen-reader-text" href="#main">Skip to content</a>

    
    <div id="wrap" class="clr">

      
      
<header id="site-header" class="minimal-header clr" data-height="90" itemscope="itemscope" itemtype="https://schema.org/WPHeader" role="banner">

  
          
      <div id="site-header-inner" class="clr container">

        
        

<div id="site-logo" class="clr" itemscope itemtype="https://schema.org/Brand" >

  
  <div id="site-logo-inner" class="clr">

    <a href="https://scope.directory/" class="custom-logo-link" rel="home"><img width="514" height="120" src="https://scope.directory/wp-content/uploads/2022/06/cropped-scope-logo-hires-120.png" class="custom-logo" alt="SCOPE" decoding="async" srcset="https://scope.directory/wp-content/uploads/2022/06/cropped-scope-logo-hires-120.png 514w, https://scope.directory/wp-content/uploads/2022/06/cropped-scope-logo-hires-120-300x70.png 300w" sizes="(max-width: 514px) 100vw, 514px" /></a>
  </div><!-- #site-logo-inner -->

  
  
</div><!-- #site-logo -->

      <div id="site-navigation-wrap" class="clr">
      
      
      
     <!--  <nav id="site-navigation" class="navigation main-navigation clr" itemscope="itemscope" itemtype="https://schema.org/SiteNavigationElement" role="navigation" >

        <ul id="menu-main-menu" class="main-menu dropdown-menu sf-menu"><li id="menu-item-10" class="menu-item menu-item-type-custom menu-item-object-custom menu-item-10"><a href="https://app.scope.directory" class="menu-link"><span class="text-wrap">Login</span></a></li><li id="menu-item-11" class="menu-item menu-item-type-custom menu-item-object-custom menu-item-home menu-item-11"><a href="https://scope.directory/#features" class="menu-link"><span class="text-wrap">Features</span></a></li><li id="menu-item-13" class="menu-item menu-item-type-custom menu-item-object-custom menu-item-home menu-item-13"><a href="https://scope.directory/#howitworks" class="menu-link"><span class="text-wrap">How it Works</span></a></li><li id="menu-item-14" class="menu-item menu-item-type-custom menu-item-object-custom menu-item-home menu-item-14"><a href="https://scope.directory/#faq" class="menu-link"><span class="text-wrap">FAQ</span></a></li><li id="menu-item-15" class="menu-item menu-item-type-custom menu-item-object-custom menu-item-home menu-item-15"><a href="https://scope.directory/#about" class="menu-link"><span class="text-wrap">About</span></a></li><li id="menu-item-182" class="btn menu-item menu-item-type-custom menu-item-object-custom menu-item-home menu-item-182"><a href="https://scope.directory/#getstarted" class="menu-link"><span class="text-wrap">Get Started</span></a></li></ul>
      </nav> -->
      <!-- #site-navigation -->

      
      
          </div><!-- #site-navigation-wrap -->
      
    
  
        
  
  <div class="oceanwp-mobile-menu-icon clr mobile-right">

    
    
    
    <!-- <a href="#" class="mobile-menu"  aria-label="Mobile Menu">
              <i class="fa fa-bars" aria-hidden="true"></i>
                <span class="oceanwp-text">Menu</span>
        <span class="oceanwp-close-text">Close</span>
            </a> -->

    
    
    
  </div><!-- #oceanwp-mobile-menu-navbar -->

  

      </div><!-- #site-header-inner -->

      
<div id="mobile-dropdown" class="clr" >

  <!-- <nav class="clr" itemscope="itemscope" itemtype="https://schema.org/SiteNavigationElement">

    <ul id="menu-main-menu-1" class="menu"><li class="menu-item menu-item-type-custom menu-item-object-custom menu-item-10"><a href="https://app.scope.directory">Login</a></li>
<li class="menu-item menu-item-type-custom menu-item-object-custom menu-item-home menu-item-11"><a href="https://scope.directory/#features">Features</a></li>
<li class="menu-item menu-item-type-custom menu-item-object-custom menu-item-home menu-item-13"><a href="https://scope.directory/#howitworks">How it Works</a></li>
<li class="menu-item menu-item-type-custom menu-item-object-custom menu-item-home menu-item-14"><a href="https://scope.directory/#faq">FAQ</a></li>
<li class="menu-item menu-item-type-custom menu-item-object-custom menu-item-home menu-item-15"><a href="https://scope.directory/#about">About</a></li>
<li class="btn menu-item menu-item-type-custom menu-item-object-custom menu-item-home menu-item-182"><a href="https://scope.directory/#getstarted">Get Started</a></li>
</ul>
<div id="mobile-menu-search" class="clr">
  <form aria-label="Search this website" method="get" action="https://scope.directory/" class="mobile-searchform">
    <input aria-label="Insert search query" value="" class="field" id="ocean-mobile-search-1" type="search" name="s" autocomplete="off" placeholder="Search" />
    <button aria-label="Submit search" type="submit" class="searchform-submit">
      <i class=" icon-magnifier" aria-hidden="true" role="img"></i>   </button>
          </form>
</div> --><!-- .mobile-menu-search -->

<!--   </nav> -->

</div>

      
      
    
    
</header><!-- #site-header -->


      
      <main id="main" class="site-main clr"  role="main">

        

<header class="page-header">

  
  <div class="container clr page-header-inner">

    
      <h1 class="page-header-title clr" itemprop="headline">{{ ucwords($user->name) }}</h1>

      
    
   <!--  <nav class="site-breadcrumbs clr"><span><span><a href="https://scope.directory/">Home</a> &raquo; <span class="breadcrumb_last" aria-current="page">Rod Ellis</span></span></span></nav>
  </div> --><!-- .page-header-inner -->

  
  
</header><!-- .page-header -->


  
  <div id="content-wrap" class="container clr">

    
    <div id="primary" class="content-area clr">

      
      <div id="content" class="site-content clr">

        
        
<article class="single-page-article clr">

  
<div class="entry clr" itemprop="text">

  
      <div data-elementor-type="wp-page" data-elementor-id="1574" class="elementor elementor-1574">
                  <section class="elementor-section elementor-top-section elementor-element elementor-element-05d442d elementor-section-stretched elementor-section-height-min-height elementor-section-boxed elementor-section-height-default elementor-section-items-middle" data-id="05d442d" data-element_type="section" data-settings="{&quot;stretch_section&quot;:&quot;section-stretched&quot;,&quot;background_background&quot;:&quot;classic&quot;}">
            <div class="elementor-container elementor-column-gap-default">
          <div class="elementor-column elementor-col-100 elementor-top-column elementor-element elementor-element-4f28ffa" data-id="4f28ffa" data-element_type="column">
      <div class="elementor-widget-wrap elementor-element-populated">
                <div class="elementor-element elementor-element-de7a8f2 elementor-widget elementor-widget-spacer" data-id="de7a8f2" data-element_type="widget" data-widget_type="spacer.default">
        <div class="elementor-widget-container">
      <style>/*! elementor - v3.8.1 - 13-11-2022 */
.elementor-column .elementor-spacer-inner{height:var(--spacer-size)}.e-con{--container-widget-width:100%}.e-con-inner>.elementor-widget-spacer,.e-con>.elementor-widget-spacer{width:var(--container-widget-width,var(--spacer-size));-ms-flex-item-align:stretch;align-self:stretch;-ms-flex-negative:0;flex-shrink:0}.e-con-inner>.elementor-widget-spacer>.elementor-widget-container,.e-con-inner>.elementor-widget-spacer>.elementor-widget-container>.elementor-spacer,.e-con>.elementor-widget-spacer>.elementor-widget-container,.e-con>.elementor-widget-spacer>.elementor-widget-container>.elementor-spacer{height:100%}.e-con-inner>.elementor-widget-spacer>.elementor-widget-container>.elementor-spacer>.elementor-spacer-inner,.e-con>.elementor-widget-spacer>.elementor-widget-container>.elementor-spacer>.elementor-spacer-inner{height:var(--container-widget-height,var(--spacer-size))}</style>    <div class="elementor-spacer">
      <div class="elementor-spacer-inner"></div>
    </div>
        </div>
        </div>
          </div>
    </div>
              </div>
    </section>
        <section class="elementor-section elementor-top-section elementor-element elementor-element-6337fca elementor-section-full_width elementor-section-height-default elementor-section-height-default" data-id="6337fca" data-element_type="section">
            <div class="elementor-container elementor-column-gap-default">
          <div class="elementor-column elementor-col-33 elementor-top-column elementor-element elementor-element-eeed003" data-id="eeed003" data-element_type="column" data-settings="{&quot;background_background&quot;:&quot;classic&quot;}">
      <div class="elementor-widget-wrap elementor-element-populated">
                <div class="elementor-element elementor-element-eefb05d elementor-widget elementor-widget-image" data-id="eefb05d" data-element_type="widget" data-widget_type="image.default">
        <div class="elementor-widget-container">
      <style>/*! elementor - v3.8.1 - 13-11-2022 */
.elementor-widget-image{text-align:center}.elementor-widget-image a{display:inline-block}.elementor-widget-image a img[src$=".svg"]{width:48px}.elementor-widget-image img{vertical-align:middle;display:inline-block}</style>                        <img decoding="async" width="182" height="228" src="{{ url('/public/assets/images/user/'.$user->card->photo) }}" class="attachment-full size-full" alt="" loading="lazy" />                             </div>
        </div>
        <div class="elementor-element elementor-element-0b900d4 elementor-widget elementor-widget-heading" data-id="0b900d4" data-element_type="widget" data-widget_type="heading.default">
        <div class="elementor-widget-container">
      <style>/*! elementor - v3.8.1 - 13-11-2022 */
.elementor-heading-title{padding:0;margin:0;line-height:1}.elementor-widget-heading .elementor-heading-title[class*=elementor-size-]>a{color:inherit;font-size:inherit;line-height:inherit}.elementor-widget-heading .elementor-heading-title.elementor-size-small{font-size:15px}.elementor-widget-heading .elementor-heading-title.elementor-size-medium{font-size:19px}.elementor-widget-heading .elementor-heading-title.elementor-size-large{font-size:29px}.elementor-widget-heading .elementor-heading-title.elementor-size-xl{font-size:39px}.elementor-widget-heading .elementor-heading-title.elementor-size-xxl{font-size:59px}</style><h2 class="elementor-heading-title elementor-size-default">Employment</h2>    </div>
        </div>
        <div class="elementor-element elementor-element-47450aa elementor-widget elementor-widget-text-editor" data-id="47450aa" data-element_type="widget" data-widget_type="text-editor.default">
        <div class="elementor-widget-container">
      <style>/*! elementor - v3.8.1 - 13-11-2022 */
.elementor-widget-text-editor.elementor-drop-cap-view-stacked .elementor-drop-cap{background-color:#818a91;color:#fff}.elementor-widget-text-editor.elementor-drop-cap-view-framed .elementor-drop-cap{color:#818a91;border:3px solid;background-color:transparent}.elementor-widget-text-editor:not(.elementor-drop-cap-view-default) .elementor-drop-cap{margin-top:8px}.elementor-widget-text-editor:not(.elementor-drop-cap-view-default) .elementor-drop-cap-letter{width:1em;height:1em}.elementor-widget-text-editor .elementor-drop-cap{float:left;text-align:center;line-height:1;font-size:50px}.elementor-widget-text-editor .elementor-drop-cap-letter{display:inline-block}</style>        
  
    <ul>
      <li>{{ $user->academicInformation->from->format('d-m-Y') }} to 
          @if($user->academicInformation->is_present)
            present
          @else
            {{ $user->academicInformation->to->format('d-m-Y') }}
          @endif
        <br/>{{ $user->academicInformation->employer }}
      </li>
    </ul>            
  </div>
        </div>
        <div class="elementor-element elementor-element-cb808ce elementor-widget elementor-widget-heading" data-id="cb808ce" data-element_type="widget" data-widget_type="heading.default">
        <div class="elementor-widget-container">
      <h2 class="elementor-heading-title elementor-size-default">Special Award</h2>   </div>
        </div>
        <div class="elementor-element elementor-element-21d7ae8 elementor-widget elementor-widget-text-editor" data-id="21d7ae8" data-element_type="widget" data-widget_type="text-editor.default">
        <div class="elementor-widget-container">

          <ul>
            @foreach($user->awards as $award)
              <li>{{ ucwords($award->name) }}</li>
              <br>
            @endforeach
            <!-- <li>Elected as a Fellow of the<span style="color: #00ffff;"> <em><strong><a style="color: #00ffff;" href="https://en.wikipedia.org/wiki/Royal_Society_of_New_Zealand">Royal Society of New Zealand</a></strong></em></span></li> -->
          </ul>           
        </div>
        </div>
        <div class="elementor-element elementor-element-fe1b63b elementor-widget elementor-widget-heading" data-id="fe1b63b" data-element_type="widget" data-widget_type="heading.default">
        <div class="elementor-widget-container">
      <h2 class="elementor-heading-title elementor-size-default">H Index</h2>   </div>
        </div>
        <div class="elementor-element elementor-element-628001c elementor-widget elementor-widget-text-editor" data-id="628001c" data-element_type="widget" data-widget_type="text-editor.default">
        <div class="elementor-widget-container">
              <p>Google Scholar: {{ $user->academicInformation->index }}</p>            </div>
        </div>

 
          </div>
    </div>
        <div class="elementor-column elementor-col-66 elementor-top-column elementor-element elementor-element-bc7f5c3" data-id="bc7f5c3" data-element_type="column">
      <div class="elementor-widget-wrap elementor-element-populated">
                <div class="elementor-element elementor-element-86f8167 elementor-widget elementor-widget-spacer" data-id="86f8167" data-element_type="widget" data-widget_type="spacer.default">
        <div class="elementor-widget-container">
          <div class="elementor-spacer">
      <div class="elementor-spacer-inner"></div>
    </div>
        </div>
        </div>
        <div class="elementor-element elementor-element-84e0250 elementor-widget elementor-widget-heading" data-id="84e0250" data-element_type="widget" data-widget_type="heading.default">
        <div class="elementor-widget-container">
      <h1 class="elementor-heading-title elementor-size-default">{{ ucwords($user->name)}}</h1>   </div>
        </div>
        <div class="elementor-element elementor-element-f5eb616 elementor-widget elementor-widget-text-editor" data-id="f5eb616" data-element_type="widget" data-widget_type="text-editor.default">
        <div class="elementor-widget-container">
              <p style="text-align: left;">{{ ucwords($user->card->citizenship) }}</p>           </div>
        </div>
        <section class="elementor-section elementor-inner-section elementor-element elementor-element-5861f0b elementor-section-boxed elementor-section-height-default elementor-section-height-default" data-id="5861f0b" data-element_type="section">
            <div class="elementor-container elementor-column-gap-default">
          <div class="elementor-column elementor-col-50 elementor-inner-column elementor-element elementor-element-f7fdb0f" data-id="f7fdb0f" data-element_type="column">
      <div class="elementor-widget-wrap elementor-element-populated">
                <div class="elementor-element elementor-element-086b7a5 elementor-widget elementor-widget-heading" data-id="086b7a5" data-element_type="widget" data-widget_type="heading.default">
        <div class="elementor-widget-container">
      <h2 class="elementor-heading-title elementor-size-default">SCOPE Number:</h2>   </div>
        </div>
          </div>
    </div>
        <div class="elementor-column elementor-col-50 elementor-inner-column elementor-element elementor-element-471bbe8" data-id="471bbe8" data-element_type="column">
      <div class="elementor-widget-wrap elementor-element-populated">
                <div class="elementor-element elementor-element-5dc2484 elementor-widget elementor-widget-heading" data-id="5dc2484" data-element_type="widget" data-widget_type="heading.default">
        <div class="elementor-widget-container">
      <h2 class="elementor-heading-title elementor-size-default">{{ $user->scope->scope }}</h2>    </div>
        </div>
          </div>
    </div>
              </div>
    </section>

    <section class="elementor-section elementor-inner-section elementor-element elementor-element-9fdc8fc elementor-section-boxed elementor-section-height-default elementor-section-height-default" data-id="9fdc8fc" data-element_type="section">
      <div class="elementor-container elementor-column-gap-default">
        <div class="elementor-column elementor-col-50 elementor-inner-column elementor-element elementor-element-0e2d9c0" data-id="0e2d9c0" data-element_type="column">
          <div class="elementor-widget-wrap elementor-element-populated">
            <div class="elementor-element elementor-element-c556ec2 elementor-widget elementor-widget-image" data-id="c556ec2" data-element_type="widget" data-widget_type="image.default">
              <div class="elementor-widget-container">

                <img decoding="async" width="631" height="396" src="{{ url('assets/images/card/sample-id.png')}}" class="attachment-large size-large" alt="" loading="lazy" srcset="{{ url('assets/images/card/sample-id.png')}} 631w, {{ url('assets/images/card/sample-id.png')}} 300w" sizes="(max-width: 631px) 100vw, 631px" />

                    <div class="elementor-id-data elementor-id-data-front">
                      <picture class="elementor-id-data-id-img">
                        <img src="{{ url('/public/assets/images/user/'.$user->card->photo) }}" alt="" />
                      </picture>

                      <span class="elementor-id-data-id">
                        {{ $user->scope->scope }}
                      </span>
                      <span class="elementor-id-data-name">
                        {{ ucwords($user->name) }}
                      </span>
                      <span class="elementor-id-data-title" style="text-align: left;">
                        {{ $user->card->title }}
                      </span>
                      <span class="elementor-id-data-imapct-factor">
                        @if($user->hasRole('academia'))
                          {{ $user->card->aif->title }}
                        @else
                          {{ $user->card->tif->title }}
                        @endif
                      </span>
                      <span class="elementor-id-data-country">
                        {{ $user->card->citizenship }}
                      </span>
                      <span class="elementor-id-data-validity"> {{ $data['validity'] }}</span>
                    </div>
              </div>
            </div>
          <div class="elementor-element elementor-element-dabf056 elementor-widget elementor-widget-text-editor" data-id="dabf056" data-element_type="widget" data-widget_type="text-editor.default">
            <div class="elementor-widget-container">
              <p><em></em></p>            
            </div>
          </div>
        </div>
      </div>

      <div class="elementor-column elementor-col-50 elementor-inner-column elementor-element elementor-element-8a97a95" data-id="8a97a95" data-element_type="column">
        <div class="elementor-widget-wrap elementor-element-populated">
          <div class="elementor-element elementor-element-925cb80 elementor-widget elementor-widget-image" data-id="925cb80" data-element_type="widget" data-widget_type="image.default">
            <div class="elementor-widget-container">
              <img decoding="async" width="631" height="396" src="{{ url('assets/images/card/back-ID-bg.png')}}" class="attachment-large size-large" alt="" loading="lazy" srcset="{{ url('assets/images/card/back-ID-bg.png')}} 631w, {{ url('assets/images/card/back-ID-bg.png')}} 300w" sizes="(max-width: 631px) 100vw, 631px" />

              @if($user->hasRole('teacher'))
                <div class="elementor-id-data elementor-id-data-back">
                  <span class="elementor-id-data-board">
                    Board Licensed:
                    <small>{{ $data['board'] }}</small> 
                  </span> 
                  <span class="elementor-id-data-tesol">
                    TESOL Certified: 
                    <small>{{ $data['tesol'] }}</small> 
                  </span>
                  <span class="elementor-id-data-category">
                    Teacher Category: 
                    <small>{{ $user->card->academic_title }}</small>
                  </span> 
                  <span class="elementor-id-data-imapct-affiliation">
                    Affiliation: 
                    <small>{{ $data['affiliation'] }}</small>
                  </span>
                </div>
              @endif

              @if($user->hasRole('academia'))
                <div class="elementor-id-data elementor-id-data-back">
                  <span class="elementor-id-data-board">
                    Affiliation:
                    <small>{{ $data['affiliation'] }}</small> 
                  </span> 
                  <span class="elementor-id-data-tesol">
                    H index: 
                    <small>{{ $data['board'] }}</small> 
                  </span>
                  <span class="elementor-id-data-category">
                    Editorial Board: 
                    <small>{{ $data['tesol'] }}</small>
                  </span> 
                  <span class="elementor-id-data-imapct-affiliation">
                    Distinction: 
                    <small>{{ $data['award'] }}</small>
                  </span>
                </div>
              @endif

            </div>
          </div>
        </div>
      </div>
    </div>
    </section>

        @if(!$user->videos->isEmpty())
          <div class="elementor-element elementor-element-d4bd3bf elementor-widget elementor-widget-heading" data-id="d4bd3bf" data-element_type="widget" data-widget_type="heading.default">
            <div class="elementor-widget-container">
              <h2 class="elementor-heading-title elementor-size-default">Videos</h2>    
            </div>
          </div>
        @endif
        <section class="elementor-section elementor-inner-section elementor-element elementor-element-42d2a3b elementor-section-boxed elementor-section-height-default elementor-section-height-default" data-id="42d2a3b" data-element_type="section">
          <div class="elementor-container elementor-column-gap-default">

            @foreach($user->videos as $video)

            @if($loop->last)
            <div class="elementor-column elementor-col-33 elementor-inner-column elementor-element elementor-element-b98618a" data-id="b98618a" data-element_type="column">
              <div class="elementor-widget-wrap elementor-element-populated">
                <div class="elementor-element elementor-element-ef578e4 elementor-widget elementor-widget-text-editor" data-id="ef578e4" data-element_type="widget" data-widget_type="text-editor.default">
                  <div class="elementor-widget-container">
                    <p class="style-scope ytd-watch-metadata">
                      <a href="{{ $video->link }}" target="_blank" rel="noopener">{{ $video->title }}</a>
                    </p>           
                  </div>
                </div>
              </div>
            </div>

            @else

            <div class="elementor-column elementor-col-33 elementor-inner-column elementor-element elementor-element-7cfc9eb" data-id="7cfc9eb" data-element_type="column">
              <div class="elementor-widget-wrap elementor-element-populated">
                <div class="elementor-element elementor-element-4c170e0 elementor-widget elementor-widget-text-editor" data-id="4c170e0" data-element_type="widget" data-widget_type="text-editor.default">
                  <div class="elementor-widget-container">
                    <p class="style-scope ytd-watch-metadata"><a href="{{ $video->link }}" target="_blank" rel="noopener">{{ $video->title }}</a></p>           
                  </div>
                </div>
              </div>
            </div>
            @endif

            @endforeach
          </div>
        </section>

        <div class="elementor-element elementor-element-4f3c4ce elementor-widget elementor-widget-heading" data-id="4f3c4ce" data-element_type="widget" data-widget_type="heading.default">
        <div class="elementor-widget-container">
      <h2 class="elementor-heading-title elementor-size-default">Biography</h2>   </div>
        </div>
        <div class="elementor-element elementor-element-253c9ed elementor-widget elementor-widget-text-editor" data-id="253c9ed" data-element_type="widget" data-widget_type="text-editor.default">
        <div class="elementor-widget-container">
              <p>
                {{ $user->academicInformation->bio }}
              </p>            
        </div>
        </div>
        @if(!$user->academicPublications->isEmpty())
          <div class="elementor-element elementor-element-f2751ad elementor-widget elementor-widget-heading" data-id="f2751ad" data-element_type="widget" data-widget_type="heading.default">
            <div class="elementor-widget-container">
              <h2 class="elementor-heading-title elementor-size-default">Publications</h2>    
            </div>
          </div>
        @endif

        @foreach($user->academicPublications as $publication)
          @if($loop->last)
          <section class="elementor-section elementor-inner-section elementor-element elementor-element-9c38861 elementor-section-boxed elementor-section-height-default elementor-section-height-default" data-id="9c38861" data-element_type="section" data-settings="{&quot;background_background&quot;:&quot;classic&quot;}">
            <div class="elementor-container elementor-column-gap-default">
              <div class="elementor-column elementor-col-100 elementor-inner-column elementor-element elementor-element-36c3ce1" data-id="36c3ce1" data-element_type="column">
                <div class="elementor-widget-wrap elementor-element-populated">
                  <div class="elementor-element elementor-element-0e50bcb elementor-widget elementor-widget-heading" data-id="0e50bcb" data-element_type="widget" data-widget_type="heading.default">
                    <div class="elementor-widget-container">
                      <h4 class="elementor-heading-title elementor-size-default">{{$publication->title}}</h4>    
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </section>

          <section class="elementor-section elementor-inner-section elementor-element elementor-element-35b333d elementor-section-boxed elementor-section-height-default elementor-section-height-default" data-id="35b333d" data-element_type="section">
            <div class="elementor-container elementor-column-gap-default">
              <div class="elementor-column elementor-col-100 elementor-inner-column elementor-element elementor-element-2fed200" data-id="2fed200" data-element_type="column">
                <div class="elementor-widget-wrap elementor-element-populated">
                  <div class="elementor-element elementor-element-9afacd0 elementor-widget elementor-widget-text-editor" data-id="9afacd0" data-element_type="widget" data-widget_type="text-editor.default">
                    <div class="elementor-widget-container">
                      <p>Year: {{$publication->year}}<br />Joournal: {{$publication->journal}}<br />DOI: <a href="https://doi.org/{{$publication->doi}}" target="_blank">{{$publication->doi}}</a><br />Source: {{$publication->source}}</p>           
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </section>
          
          @else
          <section class="elementor-section elementor-inner-section elementor-element elementor-element-3ab2ca6 elementor-section-boxed elementor-section-height-default elementor-section-height-default" data-id="3ab2ca6" data-element_type="section" data-settings="{&quot;background_background&quot;:&quot;classic&quot;}">
            <div class="elementor-container elementor-column-gap-default">
              <div class="elementor-column elementor-col-100 elementor-inner-column elementor-element elementor-element-25ca354" data-id="25ca354" data-element_type="column">
                <div class="elementor-widget-wrap elementor-element-populated">
                  <div class="elementor-element elementor-element-366c850 elementor-widget elementor-widget-heading" data-id="366c850" data-element_type="widget" data-widget_type="heading.default">
                    <div class="elementor-widget-container">
                      <h4 class="elementor-heading-title elementor-size-default">{{$publication->title}}</h4>   
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </section>

          <section class="elementor-section elementor-inner-section elementor-element elementor-element-4906400 elementor-section-boxed elementor-section-height-default elementor-section-height-default" data-id="4906400" data-element_type="section">
            <div class="elementor-container elementor-column-gap-default">
              <div class="elementor-column elementor-col-100 elementor-inner-column elementor-element elementor-element-900ed76" data-id="900ed76" data-element_type="column">
                <div class="elementor-widget-wrap elementor-element-populated">
                  <div class="elementor-element elementor-element-cccc5a2 elementor-widget elementor-widget-text-editor" data-id="cccc5a2" data-element_type="widget" data-widget_type="text-editor.default">
                    <div class="elementor-widget-container">
                      <p>Year: {{$publication->year}}<br />Joournal: {{$publication->journal}}<br />DOI: <a href="{{$publication->doi}}">{{$publication->doi}}</a><br />Source: {{$publication->source}}</p>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </section>
          
          @endif
        @endforeach()

        <!--  Conferences -->
        @if(!$user->conferences->isEmpty())
          <div class="elementor-element elementor-element-70803fd elementor-widget elementor-widget-heading" data-id="70803fd" data-element_type="widget" data-widget_type="heading.default">
            <div class="elementor-widget-container">
              <h2 class="elementor-heading-title elementor-size-default">Recent Conference Presentations</h2>   
            </div>
          </div>
        @endif

        @foreach($user->conferences as $conference)

        @if($loop->last)
        <section class="elementor-section elementor-inner-section elementor-element elementor-element-e3837ca elementor-section-boxed elementor-section-height-default elementor-section-height-default" data-id="e3837ca" data-element_type="section" data-settings="{&quot;background_background&quot;:&quot;classic&quot;}">
          <div class="elementor-container elementor-column-gap-default">
            <div class="elementor-column elementor-col-100 elementor-inner-column elementor-element elementor-element-4e293c5" data-id="4e293c5" data-element_type="column">
              <div class="elementor-widget-wrap elementor-element-populated">
                <div class="elementor-element elementor-element-e03bda6 elementor-widget elementor-widget-heading" data-id="e03bda6" data-element_type="widget" data-widget_type="heading.default">
                  <div class="elementor-widget-container">
                    <h4 class="elementor-heading-title elementor-size-default">{{ $conference->name }}</h4>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </section>

        <section class="elementor-section elementor-inner-section elementor-element elementor-element-c455bf5 elementor-section-boxed elementor-section-height-default elementor-section-height-default" data-id="c455bf5" data-element_type="section">
          <div class="elementor-container elementor-column-gap-default">
            <div class="elementor-column elementor-col-100 elementor-inner-column elementor-element elementor-element-812a7e0" data-id="812a7e0" data-element_type="column">
              <div class="elementor-widget-wrap elementor-element-populated">
                <div class="elementor-element elementor-element-b6e219e elementor-widget elementor-widget-text-editor" data-id="b6e219e" data-element_type="widget" data-widget_type="text-editor.default">
                  <div class="elementor-widget-container">
                    <p>Year: {{ $conference->year }}<br />Location: {{ $conference->location }}<br />URL: <a href="{{ $conference->link }}">{{ $conference->link }}</a></p>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </section>

        @else

        <section class="elementor-section elementor-inner-section elementor-element elementor-element-458b1a8 elementor-section-boxed elementor-section-height-default elementor-section-height-default" data-id="458b1a8" data-element_type="section" data-settings="{&quot;background_background&quot;:&quot;classic&quot;}">
          <div class="elementor-container elementor-column-gap-default">
            <div class="elementor-column elementor-col-100 elementor-inner-column elementor-element elementor-element-d229f33" data-id="d229f33" data-element_type="column">
              <div class="elementor-widget-wrap elementor-element-populated">
                <div class="elementor-element elementor-element-6cbf30c elementor-widget elementor-widget-heading" data-id="6cbf30c" data-element_type="widget" data-widget_type="heading.default">
                  <div class="elementor-widget-container">
                    <h4 class="elementor-heading-title elementor-size-default">{{ $conference->name }}</h4>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </section>

        <section class="elementor-section elementor-inner-section elementor-element elementor-element-ac929ec elementor-section-boxed elementor-section-height-default elementor-section-height-default" data-id="ac929ec" data-element_type="section">
          <div class="elementor-container elementor-column-gap-default">
            <div class="elementor-column elementor-col-100 elementor-inner-column elementor-element elementor-element-41de0c1" data-id="41de0c1" data-element_type="column">
              <div class="elementor-widget-wrap elementor-element-populated">
                <div class="elementor-element elementor-element-7ae1312 elementor-widget elementor-widget-text-editor" data-id="7ae1312" data-element_type="widget" data-widget_type="text-editor.default">
                  <div class="elementor-widget-container">
                    <p>Year: {{ $conference->year }}<br />Location: {{ $conference->location }}<br />URL: <a href="{{ $conference->link }}">{{ $conference->link }}</a></p>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </section>
        @endif

        @endforeach

        <!--  Conferences -->
        @if($user->volunteerWork)
          <div class="elementor-element elementor-element-70803fd elementor-widget elementor-widget-heading" data-id="70803fd" data-element_type="widget" data-widget_type="heading.default">
            <div class="elementor-widget-container">
              <h2 class="elementor-heading-title elementor-size-default">Community Volunteer Works</h2>   
            </div>
          </div>

        <section class="elementor-section elementor-inner-section elementor-element elementor-element-c455bf5 elementor-section-boxed elementor-section-height-default elementor-section-height-default" data-id="c455bf5" data-element_type="section">
          <div class="elementor-container elementor-column-gap-default">
            <div class="elementor-column elementor-col-100 elementor-inner-column elementor-element elementor-element-812a7e0" data-id="812a7e0" data-element_type="column">
              <div class="elementor-widget-wrap elementor-element-populated">
                <div class="elementor-element elementor-element-b6e219e elementor-widget elementor-widget-text-editor" data-id="b6e219e" data-element_type="widget" data-widget_type="text-editor.default">
                  <div class="elementor-widget-container">
                    {!! $user->volunteerWork->volunteer_work !!}
                  </div>
                </div>
              </div>
            </div>
          </div>
        </section>

        @endif

      </div>
    </div>
  </div>
</section>
</div>
    
  
</div>

</article>

        
      </div><!-- #content -->

      
    </div><!-- #primary -->

    
  </div><!-- #content-wrap -->

  

  </main><!-- #main -->

  
  
  
    
<footer id="footer" class="site-footer" itemscope="itemscope" itemtype="https://schema.org/WPFooter" role="contentinfo">

  
  <div id="footer-inner" class="clr">

    

<div id="footer-widgets" class="oceanwp-row clr">

  
  <div class="footer-widgets-inner container">

          <div class="footer-box span_1_of_4 col col-1">
        <div id="media_image-2" class="footer-widget widget_media_image clr"><img width="188" height="60" src="https://scope.directory/wp-content/uploads/2022/06/cropped-scope-logo-hi-60.png" class="image wp-image-196  attachment-full size-full" alt="" decoding="async" loading="lazy" style="max-width: 100%; height: auto;" /></div>      </div><!-- .footer-one-box -->

              <div class="footer-box span_1_of_4 col col-2">
          <div id="nav_menu-2" class="footer-widget widget_nav_menu clr"><h4 class="widget-title">SCOPE</h4><div class="menu-scope-container"><ul id="menu-scope" class="menu"><li id="menu-item-425" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-home menu-item-425"><a href="https://scope.directory/">Home</a></li>
<li id="menu-item-2365" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-2365"><a href="https://scope.directory/board/">Board</a></li>
<li id="menu-item-426" class="menu-item menu-item-type-custom menu-item-object-custom menu-item-426"><a href="#">Login</a></li>
<li id="menu-item-431" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-privacy-policy menu-item-431"><a href="https://scope.directory/privacy-policy/">Privacy Policy</a></li>
<li id="menu-item-432" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-432"><a href="https://scope.directory/terms-of-service/">Terms of Service</a></li>
</ul></div></div>       </div><!-- .footer-one-box -->
        
              <div class="footer-box span_1_of_4 col col-3 ">
          <div id="nav_menu-3" class="footer-widget widget_nav_menu clr"><h4 class="widget-title">Resources</h4><div class="menu-resources-container"><ul id="menu-resources" class="menu"><li id="menu-item-1775" class="menu-item menu-item-type-custom menu-item-object-custom menu-item-1775"><a target="_blank" rel="noopener" href="https://youtu.be/HN78DGZr2cM">Organization</a></li>
<li id="menu-item-753" class="menu-item menu-item-type-custom menu-item-object-custom menu-item-753"><a target="_blank" rel="noopener" href="https://scope.directory/contact/">Help</a></li>
<li id="menu-item-1056" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-1056"><a href="https://scope.directory/contact/">Contact</a></li>
</ul></div></div>       </div><!-- .footer-one-box -->
        
              <div class="footer-box span_1_of_4 col col-4">
          <div id="ocean_social-2" class="footer-widget widget-oceanwp-social social-widget clr"><h4 class="widget-title">Connect with us</h4>
        <ul class="oceanwp-social-icons no-transition style-light">
          <li class="oceanwp-facebook"><a href="https://www.facebook.com/SCOPE.Directory" aria-label="Facebook"  target="_blank" rel="noopener noreferrer"><i class=" fab fa-facebook" aria-hidden="true" role="img"></i></a><span class="screen-reader-text">Opens in a new tab</span></li><li class="oceanwp-linkedin"><a href="https://www.linkedin.com/company/scope-directory/about/" aria-label="LinkedIn"  target="_blank" rel="noopener noreferrer"><i class=" fab fa-linkedin" aria-hidden="true" role="img"></i></a><span class="screen-reader-text">Opens in a new tab</span></li>       </ul>

        
      
    
      </div>        </div><!-- .footer-box -->
        
      
  </div><!-- .container -->

  
</div><!-- #footer-widgets -->



<div id="footer-bottom" class="clr no-footer-nav">

  
  <div id="footer-bottom-inner" class="container clr">

    
    
      <div id="copyright" class="clr" role="contentinfo">
        Copyright © 2022 SCOPE.  All rights reserved.     </div><!-- #copyright -->

      
  </div><!-- #footer-bottom-inner -->

  
</div><!-- #footer-bottom -->


  </div><!-- #footer-inner -->

  
</footer><!-- #footer -->

  
  
</div><!-- #wrap -->


</div><!-- #outer-wrap -->



<a aria-label="Scroll to the top of the page" href="#" id="scroll-top" class="scroll-top-right"><i class=" fa fa-angle-up" aria-hidden="true" role="img"></i></a>




<script src='https://scope.directory/wp-content/plugins/contact-form-7/includes/swv/js/index.js?ver=5.6.4' id='swv-js'></script>
<script id='contact-form-7-js-extra'>
var wpcf7 = {"api":{"root":"https:\/\/scope.directory\/wp-json\/","namespace":"contact-form-7\/v1"}};
</script>
<script src='https://scope.directory/wp-content/plugins/contact-form-7/includes/js/index.js?ver=5.6.4' id='contact-form-7-js'></script>
<script src='https://scope.directory/wp-includes/js/imagesloaded.min.js?ver=4.1.4' id='imagesloaded-js'></script>
<script id='oceanwp-main-js-extra'>
var oceanwpLocalize = {"nonce":"01b865f56d","isRTL":"","menuSearchStyle":"disabled","mobileMenuSearchStyle":"disabled","sidrSource":null,"sidrDisplace":"1","sidrSide":"left","sidrDropdownTarget":"link","verticalHeaderTarget":"link","customSelects":".woocommerce-ordering .orderby, #dropdown_product_cat, .widget_categories select, .widget_archive select, .single-product .variations_form .variations select","ajax_url":"https:\/\/scope.directory\/wp-admin\/admin-ajax.php"};
</script>
<script src='https://scope.directory/wp-content/themes/oceanwp/assets/js/theme.min.js?ver=1.0' id='oceanwp-main-js'></script>
<script src='https://scope.directory/wp-content/themes/oceanwp/assets/js/drop-down-mobile-menu.min.js?ver=1.0' id='oceanwp-drop-down-mobile-menu-js'></script>
<script src='https://scope.directory/wp-content/themes/oceanwp/assets/js/vendors/magnific-popup.min.js?ver=1.0' id='ow-magnific-popup-js'></script>
<script src='https://scope.directory/wp-content/themes/oceanwp/assets/js/ow-lightbox.min.js?ver=1.0' id='oceanwp-lightbox-js'></script>
<script src='https://scope.directory/wp-content/themes/oceanwp/assets/js/vendors/flickity.pkgd.min.js?ver=1.0' id='ow-flickity-js'></script>
<script src='https://scope.directory/wp-content/themes/oceanwp/assets/js/ow-slider.min.js?ver=1.0' id='oceanwp-slider-js'></script>
<script src='https://scope.directory/wp-content/themes/oceanwp/assets/js/scroll-effect.min.js?ver=1.0' id='oceanwp-scroll-effect-js'></script>
<script src='https://scope.directory/wp-content/themes/oceanwp/assets/js/scroll-top.min.js?ver=1.0' id='oceanwp-scroll-top-js'></script>
<script src='https://scope.directory/wp-content/themes/oceanwp/assets/js/select.min.js?ver=1.0' id='oceanwp-select-js'></script>
<script src='https://scope.directory/wp-content/plugins/elementor/assets/js/webpack.runtime.min.js?ver=3.8.1' id='elementor-webpack-runtime-js'></script>
<script src='https://scope.directory/wp-content/plugins/elementor/assets/js/frontend-modules.min.js?ver=3.8.1' id='elementor-frontend-modules-js'></script>
<script src='https://scope.directory/wp-content/plugins/elementor/assets/lib/waypoints/waypoints.min.js?ver=4.0.2' id='elementor-waypoints-js'></script>
<script src='https://scope.directory/wp-includes/js/jquery/ui/core.min.js?ver=1.13.2' id='jquery-ui-core-js'></script>
<script id='elementor-frontend-js-before'>
var elementorFrontendConfig = {"environmentMode":{"edit":false,"wpPreview":false,"isScriptDebug":false},"i18n":{"shareOnFacebook":"Share on Facebook","shareOnTwitter":"Share on Twitter","pinIt":"Pin it","download":"Download","downloadImage":"Download image","fullscreen":"Fullscreen","zoom":"Zoom","share":"Share","playVideo":"Play Video","previous":"Previous","next":"Next","close":"Close"},"is_rtl":false,"breakpoints":{"xs":0,"sm":480,"md":768,"lg":1025,"xl":1440,"xxl":1600},"responsive":{"breakpoints":{"mobile":{"label":"Mobile","value":767,"default_value":767,"direction":"max","is_enabled":true},"mobile_extra":{"label":"Mobile Extra","value":880,"default_value":880,"direction":"max","is_enabled":false},"tablet":{"label":"Tablet","value":1024,"default_value":1024,"direction":"max","is_enabled":true},"tablet_extra":{"label":"Tablet Extra","value":1200,"default_value":1200,"direction":"max","is_enabled":false},"laptop":{"label":"Laptop","value":1366,"default_value":1366,"direction":"max","is_enabled":false},"widescreen":{"label":"Widescreen","value":2400,"default_value":2400,"direction":"min","is_enabled":false}}},"version":"3.8.1","is_static":false,"experimentalFeatures":{"e_dom_optimization":true,"e_optimized_assets_loading":true,"e_optimized_css_loading":true,"a11y_improvements":true,"additional_custom_breakpoints":true,"e_import_export":true,"e_hidden_wordpress_widgets":true,"landing-pages":true,"elements-color-picker":true,"favorite-widgets":true,"admin-top-bar":true},"urls":{"assets":"https:\/\/scope.directory\/wp-content\/plugins\/elementor\/assets\/"},"settings":{"page":[],"editorPreferences":[]},"kit":{"active_breakpoints":["viewport_mobile","viewport_tablet"],"global_image_lightbox":"yes","lightbox_enable_counter":"yes","lightbox_enable_fullscreen":"yes","lightbox_enable_zoom":"yes","lightbox_enable_share":"yes","lightbox_title_src":"title","lightbox_description_src":"description"},"post":{"id":1574,"title":"Rod%20Ellis%20-%20SCOPE","excerpt":"","featuredImage":false}};
</script>
<script src='https://scope.directory/wp-content/plugins/elementor/assets/js/frontend.min.js?ver=3.8.1' id='elementor-frontend-js'></script>
<script src='https://scope.directory/wp-includes/js/underscore.min.js?ver=1.13.4' id='underscore-js'></script>
<script id='wp-util-js-extra'>
var _wpUtilSettings = {"ajax":{"url":"\/wp-admin\/admin-ajax.php"}};
</script>
<script src='https://scope.directory/wp-includes/js/wp-util.min.js?ver=6.1.1' id='wp-util-js'></script>
<script id='wpforms-elementor-js-extra'>
var wpformsElementorVars = {"captcha_provider":"recaptcha","recaptcha_type":"v2"};
</script>
<script src='https://scope.directory/wp-content/plugins/wpforms-lite/assets/js/integrations/elementor/frontend.min.js?ver=1.7.8' id='wpforms-elementor-js'></script>
</body>
</html>
