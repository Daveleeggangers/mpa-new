<!DOCTYPE html>
<html lang="en">
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="shortcut icon" href="https://www.ipcamlive.com/tpls2/img/ipcamlive_favicon_128.png">
    <title>Document</title>
    <script type="text/javascript" src="/js/jquery-3.min.js.download"> </script>
    <script type="text/javascript" src="/js/ipcamliveplayer.min.js.download"> </script>
    <x-app-layout>
        <x-slot name="header">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ __('Dashboard') }}
            </h2>
        </x-slot>

        <div class="py-12">

            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6 bg-white border-b border-gray-200">
                        <head>
<body>
<button onClick="window.location.reload();">Refresh Page</button>
<script type="text/javascript">
    function inIframe () {
        try {
            return window.self !== window.top;
        } catch (e) {
            return true;
        }
    }

    var serverhost = 'http://g0.ipcamlive.com/';

    var alias = '61e690ab39bea';
    var servicetype = 'B';
    var available = 1;
    var address = 'http://s21.ipcamlive.com/';

    var streamid = '15yqwgn8b9klxuul6';
    var token = '8a1Frq+SnCuaDrGxAUh4GPf9fFCKMwqyDQAkrAuzKgQ=';


    var logoenabled = 1;
    var logofilename = 'ipcamlive.png';
    var logopos = 'BL';

    var domainlockenabled  = 0;

    var websocketenabled = 0;
    var websocketport = '6016';

    var rtcsupport = 1;

    ipcamliveHostManager.setHostURL(serverhost);

    $(window).on("load", function() {
        if (domainlockenabled) {
            if (!inIframe()) {
                return;
            }
        }

        var params = {};
        params["iframemode"] = 1;
        params["audioenabled"] = 0;
        params["timelapseenabledoncamera"] = 0;
        params["timeshiftenabled"] = 0;
        params["skin"] = '';

        params["autoplay"] = true;

        if (logoenabled) {
            params["logo"] = ipcamliveHostManager.getHostURL('resources/logos/' + logofilename);
            params["logopos"] = ipcamlivehelper.getPosByID(logopos);
        }

        if (websocketenabled)
            params["websocketenabled"] = 1;

        if (rtcsupport)
            params["rtcsupport"] = 1;

        ipcamliveplayer.setToken(token);
        if (available) {
            ipcamliveplayer.embedOnline("mediaplaybackdiv", alias, streamid, servicetype, address, websocketport, params);
        } else {
            ipcamliveplayer.embed("mediaplaybackdiv", alias, params);
        }
    });
</script>
<link rel="stylesheet" type="text/css" href="./ipcamliveplayer-6.css"><script src="./hls.min-2.js.download" type="text/javascript"></script></head>
<body style="margin: 0px; border: 0px; padding: 0px; overflow: hidden">
<div id="mediaplaybackdiv" style="width: 1024px; height: 576px;"><div id="mediaplaybackdiv_ipc_ic" style="width:100%; height:100%; position:relative; background:#000; z-index:1; overflow:hidden;"><video id="mediaplaybackdiv_videoplayer" muted="" preload="none" style="width: 100%; height: 100%; background-color: rgb(0, 0, 0); display: block; object-fit: fill;" src="blob:https://www.ipcamlive.com/8ee4531b-853d-4c2b-8886-c706c1464211" poster="https://s21.ipcamlive.com/streams/15gnbkzh61uc4yj2x/snapshot.jpg">Your browser does not capable to play this content.</video><div id="mediaplaybackdiv_ipc_ic_bigPlay" class="ipc-bigPlayBase" style="display: none; background-image: url(&quot;https://g0.ipcamlive.com/player/html5player/images-3/orange/bigplay.png&quot;); opacity: 1; left: 462px; top: 238px; width: 100px; height: 100px; background-size: 200px 100px;"></div><div id="mediaplaybackdiv_ipc_ic_control" class="ipc-control" style="opacity: 0.75; background-color: rgb(31, 31, 31); display: block; bottom: -28px;"><div id="mediaplaybackdiv_ipc_ic_progressDiv" class="ipc-meter ipc-stripes" style="background-color: rgb(255, 159, 46);"><span style="width: 100%; background-image: -webkit-gradient(linear, 0 0, 100% 100%, color-stop(0.25, rgba(243, 109, 10, 0.5)), color-stop(0.25, transparent), color-stop(0.5, transparent), color-stop(0.5, rgba(243, 109, 10, 0.5)), color-stop(0.75, rgba(243, 109, 10, 0.5)), color-stop(0.75, transparent), to(transparent));"></span></div><div id="mediaplaybackdiv_ipc_ic_btmControl" class="ipc-btmControl"><div id="mediaplaybackdiv_ipc_ic_btnPlay" class="ipc-btnPlay ipc-controlBtn ipc-paused" title="Play/Pause video" style="background-image: url(&quot;https://g0.ipcamlive.com/player/html5player/images-3/orange/base_image_1.png&quot;); background-size: 128px 128px;"></div><div id="mediaplaybackdiv_ipc_ic_btnFS" class="ipc-btnFS ipc-controlBtn" title="Toggle full screen" style="background-image: url(&quot;https://g0.ipcamlive.com/player/html5player/images-3/orange/base_image_1.png&quot;); background-size: 128px 128px;"></div><div id="mediaplaybackdiv_ipc_ic_btnFit" class="ipc-btnFit ipc-controlBtn ipc-exitFit" title="Toggle video fit mode" style="background-image: url(&quot;https://g0.ipcamlive.com/player/html5player/images-3/orange/base_image_1.png&quot;); background-size: 128px 128px; display: none;"></div><div id="mediaplaybackdiv_ipc_ic_btnZoom" class="ipc-btnEnableZoom ipc-controlBtn-2" title="Enable/Disable live zoom" style="background-image: url(&quot;https://g0.ipcamlive.com/player/html5player/images-3/shared/base_image_2.png&quot;); background-size: 128px 128px;"></div><div id="mediaplaybackdiv_ipc_ic_snapShot" class="ipc-snapShot ipc-controlBtn" title="Download snapshot image" style="background-image: url(&quot;https://g0.ipcamlive.com/player/html5player/images-3/orange/base_image_1.png&quot;); background-size: 128px 128px; display: block;"></div><div id="mediaplaybackdiv_ipc_ic_btnReport" class="ipc-btnReport ipc-controlBtn" title="Report inappropriate content" style="background-image: url(&quot;https://g0.ipcamlive.com/player/html5player/images-3/orange/base_image_1.png&quot;); background-size: 128px 128px; display: block;"></div></div><div id="mediaplaybackdiv_ipc_ic_liveText" class="ipc-liveText ipc-defaultFont" title="LIVE" style="color: rgb(255, 255, 255); font-family: arial;">LIVE</div><div id="mediaplaybackdiv_ipc_ic_wsText" class="ipc-liveText ipc-defaultFont" title="Using WebSocket" style="display: none; color: rgb(255, 255, 255); font-family: arial;">-WS</div><div id="mediaplaybackdiv_ipc_ic_hdIcon" class="ipc-hdIcon ipc-controlBtn" title="HD Stream" style="display: block;"></div></div><div id="mediaplaybackdiv_ipc_ic_loadingSpinnerContainer" class="ipc-loadingSpinnerContainer" style="left: 437px; top: 254.667px; width: 150px; height: 66.6667px; display: none;"><div id="mediaplaybackdiv_ipc_ic_loadingSpinnerDefault" class="ipc-loadingSpinnerDefault" style="background-image: url(&quot;https://g0.ipcamlive.com/player/html5player/images-3/orange/buffering.gif&quot;);"></div></div><img id="mediaplaybackdiv_logo" src="./logo.png" style="position: absolute; z-index: 2147483647; opacity: 1; pointer-events: none; top: 526px; left: 25px; width: 85px; height: 25px;"></div></div>



<table cellspacing="0" cellpadding="0" style="display: none;"><tr><td><div class="context-menu context-menu-theme-vista"><div class="context-menu-item " title=""><div class="context-menu-item-inner" style="">ipcamlive.com</div></div><div class="context-menu-separator"></div><div class="context-menu-item  context-menu-item-disabled" title=""><div class="context-menu-item-inner" style="">IPCamLive HTML5 Player (MSE)</div></div><div class="context-menu-item  context-menu-item-disabled" title=""><div class="context-menu-item-inner" style="">Live Streaming for IP Cameras</div></div><div class="context-menu-separator"></div><div class="context-menu-item " title=""><div class="context-menu-item-inner" style="">Report inappropriate content</div></div></div></td></tr></table><div class="context-menu-shadow" style="display: none; position: absolute; z-index: 9998; opacity: 0.2; background-color: black;"></div></body><script id="allow-copy_script">(function agent() {
        let unlock = false
        document.addEventListener('allow_copy', (event) => {
            unlock = event.detail.unlock
        })

        const copyEvents = [
            'copy',
            'cut',
            'contextmenu',
            'selectstart',
            'mousedown',
            'mouseup',
            'mousemove',
            'keydown',
            'keypress',
            'keyup',
        ]
        const rejectOtherHandlers = (e) => {
            if (unlock) {
                e.stopPropagation()
                if (e.stopImmediatePropagation) e.stopImmediatePropagation()
            }
        }
        copyEvents.forEach((evt) => {
            document.documentElement.addEventListener(evt, rejectOtherHandlers, {
                capture: true,
            })
        })
    })()</script>
</body>
</div>
</div>
</div>
</head>

</html>



</x-app-layout>
