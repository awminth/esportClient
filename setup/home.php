<?php
    include("../config.php");
    include(root."master/header.php");
?>
<!DOCTYPE html>
<html lang="en" data-theme="default">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title>Home - Embedded Content</title>
  <!-- Vue 3 CDN -->
  <script src="https://unpkg.com/vue@3.5.16/dist/vue.global.prod.js" defer></script>
  <style>
    /* Default Design Guidelines Inspired Styling */
    :root {
      --color-bg: #ffffff;
      --color-text-body: #6b7280;
      --color-text-heading: #111827;
      --color-card-bg: #f9fafb;
      --border-radius: 0.75rem;
      --shadow-subtle: rgba(0, 0, 0, 0.05) 0px 2px 6px;
      --max-container-width: 1200px;
    }

    body {
      background-color: var(--color-bg);
      margin: 0;
      font-family: 'Inter', -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Oxygen,
        Ubuntu, Cantarell, 'Open Sans', 'Helvetica Neue', sans-serif;
      color: var(--color-text-body);
      line-height: 1.6;
      padding: 2rem 1rem;
      display: flex;
      justify-content: center;
      min-height: 100vh;
      box-sizing: border-box;
    }

    #app {
      width: 100%;
      max-width: var(--max-container-width);
      display: flex;
      flex-direction: column;
      gap: 1.5rem;
    }

    h1 {
      font-weight: 700;
      font-size: 3rem;
      line-height: 1.2;
      color: var(--color-text-heading);
      margin: 0 0 1rem 0;
    }

    p.description {
      font-size: 1.125rem;
      color: var(--color-text-body);
      margin-top: 0;
      margin-bottom: 2rem;
    }

    .iframe-container {
      background: var(--color-card-bg);
      border-radius: var(--border-radius);
      box-shadow: var(--shadow-subtle);
      overflow: hidden;
      position: relative;
      height: 600px;
      transition: box-shadow 0.3s ease;
    }
    .iframe-container:hover {
      box-shadow: rgba(0, 0, 0, 0.1) 0px 6px 12px;
    }
    iframe {
      border: none;
      width: 100%;
      height: 100%;
      display: block;
      transition: opacity 0.4s ease;
    }

    .loading-overlay {
      position: absolute;
      background: rgba(255 255 255 / 0.8);
      top: 0;
      left: 0;
      right: 0;
      bottom: 0;
      display: flex;
      align-items: center;
      justify-content: center;
      font-weight: 600;
      color: var(--color-text-heading);
      font-size: 1.25rem;
      user-select: none;
      pointer-events: none;
      backdrop-filter: blur(4px);
    }

    @media (max-width: 640px) {
      h1 {
        font-size: 2rem;
      }
      .iframe-container {
        height: 400px;
      }
    }
  </style>
</head>
<body>
  <div id="app">
    <h1>Welcome to Your Home Page</h1>
    <p class="description">Embedded content from your login redirect appears below.</p>
    <div class="iframe-container" :aria-busy="loading.toString()" role="region" aria-label="Embedded content iframe">
      <iframe
        v-if="iframeUrl"
        :src="iframeUrl"
        @load="onIframeLoad"
        :style="{ opacity: loading ? 0.3 : 1 }"
        sandbox="allow-same-origin allow-scripts allow-forms allow-popups"
        title="Embedded content"
      ></iframe>
      <div class="loading-overlay" v-show="loading">Loading content…</div>
      <div v-if="!iframeUrl && !loading" style="padding: 2rem; color: var(--color-text-body);">
        No embedded content URL found. Please login again.
      </div>
    </div>
  </div>

  <script>
    const { createApp } = Vue;

    createApp({
      data() {
        return {
          iframeUrl: '',
          loading: true
        };
      },
      methods: {
        getQueryParam(param) {
          const urlParams = new URLSearchParams(window.location.search);
          return urlParams.get(param);
        },
        onIframeLoad() {
          this.loading = false;
        }
      },
      mounted() {
        const url = this.getQueryParam('target_url');
        console.log("Retrieved URL:", url); // Debugging line
        if (url) {
          this.iframeUrl = decodeURIComponent(url);
        } else {
          this.loading = false;
        }
      }
    }).mount('#app');
  </script>
</body>
</html>
