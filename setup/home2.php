<?php
$targetUrl = $_GET['target_url'] ?? '';
$valid = filter_var($targetUrl, FILTER_VALIDATE_URL);
?>
<!DOCTYPE html>
<html>

<head>
    <title>Vue Iframe Wrapper</title>
    <script src="https://unpkg.com/vue@3/dist/vue.global.prod.js"></script>
    <style>
    body {
        margin: 0;
        font-family: sans-serif;
    }

    header,
    footer {
        background-color: #333;
        color: white;
        text-align: center;
        padding: 15px;
    }

    .iframe-wrapper {
        height: calc(100vh - 120px);
        /* adjust based on header/footer height */
    }

    iframe {
        width: 100%;
        height: 100%;
        border: none;
    }
    </style>
</head>

<body>
    <div id="app">
        <header>
            <h2>My Custom Header</h2>
        </header>

        <div class="iframe-wrapper" v-if="validUrl">
            <iframe :src="safeUrl"></iframe>
        </div>
        <div v-else style="text-align:center; padding: 20px; color: red;">
            <p>Invalid or missing URL.</p>
        </div>

        <footer>
            <p>My Custom Footer</p>
        </footer>
    </div>

    <script>
    const {
        createApp
    } = Vue;

    createApp({
        data() {
            return {
                safeUrl: "",
                validUrl: false
            }
        },
        mounted() {
            const urlParams = new URLSearchParams(window.location.search);
            const targetUrl = urlParams.get('target_url');

            if (targetUrl && this.isValidUrl(targetUrl)) {
                this.safeUrl = targetUrl;
                this.validUrl = true;
            }
        },
        methods: {
            isValidUrl(url) {
                try {
                    new URL(url);
                    return true;
                } catch (_) {
                    return false;
                }
            }
        }
    }).mount('#app');
    </script>
</body>

</html>