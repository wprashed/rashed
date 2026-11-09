/**
 * WebGL Fluid Chromatic Shader Animation
 * Inspired by Google & Adobe fluid mesh gradients with mouse interaction
 *
 * @package StitchAnimated
 */

(function () {
  'use strict';

  function initShader(canvas) {
    if (!canvas) return null;

    const gl = canvas.getContext('webgl') || canvas.getContext('experimental-webgl');
    if (!gl) {
      console.warn('WebGL not supported on this device.');
      return null;
    }

    function syncSize() {
      const w = canvas.clientWidth || window.innerWidth;
      const h = canvas.clientHeight || window.innerHeight;
      if (canvas.width !== w || canvas.height !== h) {
        canvas.width = w;
        canvas.height = h;
      }
    }

    if (typeof ResizeObserver !== 'undefined') {
      new ResizeObserver(syncSize).observe(canvas);
    } else {
      window.addEventListener('resize', syncSize);
    }
    syncSize();

    const vs = `attribute vec2 a_position;
varying vec2 v_texCoord;
void main() {
  v_texCoord = a_position * 0.5 + 0.5;
  gl_Position = vec4(a_position, 0.0, 1.0);
}`;

    const fs = `precision highp float;
uniform float u_time;
uniform vec2 u_resolution;
uniform vec2 u_mouse;

void main() {
    vec2 uv = gl_FragCoord.xy / u_resolution.xy;
    vec2 p = (gl_FragCoord.xy * 2.0 - u_resolution.xy) / min(u_resolution.x, u_resolution.y);
    
    // Smooth time evolution
    float t = u_time * 0.35;
    
    // Wave distortions
    float w1 = sin(p.x * 1.5 + t + sin(p.y * 1.8 + t * 0.7));
    float w2 = cos(p.y * 1.2 - t * 0.8 + cos(p.x * 1.4 - t * 0.5));
    float w3 = sin((p.x + p.y) * 1.3 + t * 1.1);
    
    // Normalized mouse interaction
    vec2 mNorm = (u_mouse * 2.0 - u_resolution.xy) / min(u_resolution.x, u_resolution.y);
    float mouseDist = length(p - mNorm);
    float mouseInfluence = smoothstep(0.8, 0.0, mouseDist) * 0.3;
    
    // Vivid spectrum
    vec3 colBlue   = vec3(0.00, 0.22, 0.69); // #0037b0 Swiss blue
    vec3 colAzure  = vec3(0.11, 0.31, 0.85); // #1d4ed8 Primary container
    vec3 colEmerald= vec3(0.00, 0.31, 0.12); // #00501f Tertiary green
    vec3 colMint   = vec3(0.44, 0.93, 0.54); // #71ee8a
    vec3 colGold   = vec3(0.85, 0.60, 0.10); // Archival gold
    
    // Distribute blobs
    float d1 = length(p - vec2(sin(t * 0.5) * 0.8, cos(t * 0.6) * 0.5) + mouseInfluence);
    float d2 = length(p - vec2(cos(t * 0.4) * 0.7, sin(t * 0.5) * 0.6));
    float d3 = length(p - vec2(sin(t * 0.7 + 2.0) * 0.6, -cos(t * 0.4) * 0.5));
    float d4 = length(p - vec2(-sin(t * 0.3) * 0.9, -sin(t * 0.6) * 0.7));
    
    float b1 = smoothstep(1.3, 0.1, d1);
    float b2 = smoothstep(1.2, 0.1, d2);
    float b3 = smoothstep(1.4, 0.2, d3);
    float b4 = smoothstep(1.1, 0.1, d4);
    
    // Warm neutral architectural foundation
    vec3 grad = vec3(0.98, 0.97, 0.95);
    grad = mix(grad, colBlue, b1 * 0.18);
    grad = mix(grad, colAzure, b2 * 0.15);
    grad = mix(grad, colEmerald, b3 * 0.12);
    grad = mix(grad, colMint, b4 * 0.10);
    grad = mix(grad, colGold, (b1 * b3) * 0.16);
    
    // Delicate grain
    float noise = fract(sin(dot(uv, vec2(12.9898, 78.233) * 2.0)) * 43758.5453);
    grad += (noise - 0.5) * 0.015;
    
    gl_FragColor = vec4(grad, 1.0);
}`;

    function createShader(type, source) {
      const s = gl.createShader(type);
      gl.shaderSource(s, source);
      gl.compileShader(s);
      if (!gl.getShaderParameter(s, gl.COMPILE_STATUS)) {
        console.error('Shader compile error:', gl.getShaderInfoLog(s));
        gl.deleteShader(s);
        return null;
      }
      return s;
    }

    const vertexShader = createShader(gl.VERTEX_SHADER, vs);
    const fragmentShader = createShader(gl.FRAGMENT_SHADER, fs);
    if (!vertexShader || !fragmentShader) return null;

    const prog = gl.createProgram();
    gl.attachShader(prog, vertexShader);
    gl.attachShader(prog, fragmentShader);
    gl.linkProgram(prog);

    if (!gl.getProgramParameter(prog, gl.LINK_STATUS)) {
      console.error('Program link error:', gl.getProgramInfoLog(prog));
      return null;
    }

    gl.useProgram(prog);

    const buf = gl.createBuffer();
    gl.bindBuffer(gl.ARRAY_BUFFER, buf);
    gl.bufferData(
      gl.ARRAY_BUFFER,
      new Float32Array([-1, -1, 1, -1, -1, 1, 1, 1]),
      gl.STATIC_DRAW
    );

    const pos = gl.getAttribLocation(prog, 'a_position');
    gl.enableVertexAttribArray(pos);
    gl.vertexAttribPointer(pos, 2, gl.FLOAT, false, 0, 0);

    const uTime = gl.getUniformLocation(prog, 'u_time');
    const uRes = gl.getUniformLocation(prog, 'u_resolution');
    const uMouse = gl.getUniformLocation(prog, 'u_mouse');

    let mouse = { x: canvas.width / 2, y: canvas.height / 2 };
    let targetMouse = { x: canvas.width / 2, y: canvas.height / 2 };

    window.addEventListener('mousemove', (event) => {
      const rect = canvas.getBoundingClientRect();
      if (rect.width && rect.height) {
        const nx = (event.clientX - rect.left) / rect.width;
        const ny = 1.0 - (event.clientY - rect.top) / rect.height;
        targetMouse.x = nx * canvas.width;
        targetMouse.y = ny * canvas.height;
      }
    });

    let running = true;
    const isMobile = window.innerWidth < 768 || (navigator.maxTouchPoints && navigator.maxTouchPoints > 2);
    const prefersReducedMotion = window.matchMedia && window.matchMedia('(prefers-reduced-motion: reduce)').matches;

    function render(t) {
      if (!running) return;
      if (typeof ResizeObserver === 'undefined') syncSize();

      // Smooth mouse lerp
      mouse.x += (targetMouse.x - mouse.x) * 0.08;
      mouse.y += (targetMouse.y - mouse.y) * 0.08;

      gl.viewport(0, 0, canvas.width, canvas.height);
      if (uTime) gl.uniform1f(uTime, t * 0.001);
      if (uRes) gl.uniform2f(uRes, canvas.width, canvas.height);
      if (uMouse) gl.uniform2f(uMouse, mouse.x, mouse.y);
      gl.drawArrays(gl.TRIANGLE_STRIP, 0, 4);

      // On mobile or reduced motion, render single high-fidelity static frame to protect battery and CPU
      if (!isMobile && !prefersReducedMotion && running) {
        requestAnimationFrame(render);
      }
    }

    // Check visibility change to pause background render
    document.addEventListener('visibilitychange', () => {
      if (document.hidden) {
        running = false;
      } else if (!document.body.classList.contains('shader-hidden') && !isMobile && !prefersReducedMotion) {
        running = true;
        requestAnimationFrame(render);
      }
    });

    // Check intersection to pause when scrolled out of view
    if ('IntersectionObserver' in window) {
      const observer = new IntersectionObserver((entries) => {
        entries.forEach((entry) => {
          if (!entry.isIntersecting) {
            running = false;
          } else if (!document.body.classList.contains('shader-hidden') && !isMobile && !prefersReducedMotion) {
            running = true;
            requestAnimationFrame(render);
          }
        });
      }, { threshold: 0.05 });
      observer.observe(canvas);
    }

    render(0);

    return {
      stop: () => { running = false; },
      start: () => {
        if (!running) {
          running = true;
          if (!isMobile && !prefersReducedMotion) {
            requestAnimationFrame(render);
          } else {
            render(0);
          }
        }
      }
    };
  }

  document.addEventListener('DOMContentLoaded', () => {
    if (localStorage.getItem('stitch_shader_hidden') === '1') {
      document.body.classList.add('shader-hidden');
    }

    // 1. Ambient Background Shader Canvas
    const ambientCanvas = document.getElementById('ambient-shader-canvas');
    if (ambientCanvas && !document.body.classList.contains('shader-hidden')) {
      window.stitchAmbientShader = initShader(ambientCanvas);
    }

    // 2. Interactive Banner Shader Canvas (if on page)
    const bannerCanvas = document.getElementById('hero-interactive-shader');
    if (bannerCanvas) {
      window.stitchHeroShader = initShader(bannerCanvas);
    }
  });

  // Global toggle function
  window.toggleAmbientShader = function () {
    const body = document.body;
    const isHidden = body.classList.toggle('shader-hidden');
    localStorage.setItem('stitch_shader_hidden', isHidden ? '1' : '0');
    if (window.stitchAmbientShader) {
      if (isHidden) {
        window.stitchAmbientShader.stop();
      } else {
        window.stitchAmbientShader.start();
      }
    }
    if (window.stitchShowToast) {
      window.stitchShowToast(isHidden ? 'Ambient Shader Disabled' : 'Ambient Shader Enabled');
    }
  };
})();
