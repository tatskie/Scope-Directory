/**
  @Description:

  import { detectDevice } from '@/assets/js/mixins/base/DetectDevice'

  mixins: [ detectDevice ]

  can be used as
  <div v-if="device_width > 100"></div> ==> shows div if [window width] is greater than 100
  <div v-if="device_height > 100"></div> ==> shows div if [window height] is greater than 100
  <div v-if="device_os == 'ios'"></div> ==> shows div if operating system used is IOS
**/

//= jquery
import $ from 'jquery'

export var detectDevice = {
  data () {
    return {
      device_width: null,
      device_height: null,
      device_os: null,
      device_browser: null,

      windowWidth: 0,
      windowHeight: 0,

      hoverable: false
    }
  },

  created () {
    this.getWindowWidth()
    this.getBrowser()
  },

  beforeDestroy () {
    window.removeEventListener('resize', this.getWindowWidth)
    window.removeEventListener('resize', this.getWindowHeight)
  },

  computed: {
    device () {
      var windowWidth = this.windowWidth

      this.width = windowWidth

      if (this.width < 641) {
        return 'mobile'
      }

      if (this.width > 640) {
        return 'tablet'
      }

      if (this.width > 991) {
        return 'pc'
      }
    }
  },

  mounted () {
    this.$nextTick(() => {
      window.addEventListener('resize', this.getWindowWidth)
      window.addEventListener('resize', this.getWindowHeight)
      this.getWindowWidth()
      this.getWindowHeight()
      this.getOs()
    })
  },

  methods: {
    getOs () {
      let userAgent = window.navigator.userAgent
      let platform = window.navigator.platform
      let macosPlatforms = ['Macintosh', 'MacIntel', 'MacPPC', 'Mac68K']
      let windowsPlatforms = ['Win32', 'Win64', 'Windows', 'WinCE']
      let iosPlatforms = ['iPhone', 'iPad', 'iPod']

      if (macosPlatforms.indexOf(platform) !== -1) {
        this.device_os = 'macos'
      } else if (iosPlatforms.indexOf(platform) !== -1) {
        this.device_os = 'ios'
      } else if (windowsPlatforms.indexOf(platform) !== -1) {
        this.device_os = 'windows'
      } else if (/Android/.test(userAgent)) {
        this.device_os = 'andriod'
      } else if (!this.device_os && /Linux/.test(platform)) {
        this.device_os = 'linux'
      }
    },

    getBrowser () {
      let notIE
      if(navigator.userAgent.indexOf("Edge") !== -1) {
        this.device_browser = 'edge'
        notIE = true
      } else if ((navigator.userAgent.indexOf('Opera') || navigator.userAgent.indexOf('OPR')) !== -1) {
        this.device_browser = 'opera'
        notIE = true
      } else if (navigator.userAgent.indexOf('Chrome') !== -1) {
        this.device_browser = 'chrome'
        notIE = true
      } else if (navigator.userAgent.indexOf('Safari') !== -1) {
        this.device_browser = 'safari'
        notIE = true
      } else if (navigator.userAgent.indexOf('Firefox') !== -1) {
        this.device_browser = 'firefox'
        notIE = true
      } else if ((navigator.userAgent.indexOf('MSIE') !== -1) || (!!document.documentMode === true)) {
        this.device_browser = 'ie'
      } else {
        this.device_browser = 'undefined'
        notIE = true
      }

      if (notIE) {
        $('html').addClass('browser-not-ie')
      }


      $('html').addClass('browser-' + this.device_browser)
    },

    getWindowWidth (event) {
      this.setHover()
      this.windowWidth = window.innerWidth // including scrollbar
      this.device_width = this.windowWidth
    },

    getWindowHeight (event) {
      this.windowHeight = document.documentElement.clientHeight
      this.device_height = this.windowHeight
    },

    //= checks if the browser used is hoverable or not
    setHover () {
      const canHover = !(matchMedia('(hover: none)').matches)
      this.hoverable = canHover

      if (this.hoverable) {
        $('html').addClass('hoverable')
      } else {
        $('html').removeClass('hoverable')
      }
    }
  }
}
