// checkServerTime.js
import fetch from "node-fetch";

async function measureResponseTime(url) {
  const start = Date.now();
  try {
    const res = await fetch(url);
    await res.text();
    const duration = Date.now() - start;
    console.log(`[Server Timing] ${url} responded in ${duration}ms`);
  } catch (e) {
    console.log(`[Server Timing] ${url} failed:`, e.message);
  }
}

// Тестуємо локально
measureResponseTime("http://localhost/wp-content/themes/MyTheme/index.php");
