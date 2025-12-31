/** @type {import('tailwindcss').Config} */
module.exports = {
  content: [
    "./templates/**/*.twig",
    "./views/**/*.twig",
    "./blocks/**/**.twig",
    "./ui/**/*.twig",
  ],
  safelist: [
    {
      pattern: /grid-cols-(2|3|4|5|6)/,
      variants: ["xs", "s", "sl", "sm", "md", "lg", "xl", "2xl"],
    },
  ],
  theme: {
    container: { center: true },
    screens: {
      xs: "375px",
      s: "480px",
      sl: "550px",
      sm: "640px",
      md: "768px",
      lg: "1024px",
      xl: "1224px",
      "2xl": "1488px",
    },
    extend: {
      container: {
        screens: {
          "2xs": "16rem",
        },
      },
      fontSize: {
        h0_mobile: [
          "2.25rem",
          {
            lineHeight: "2.625rem",
            letterSpacing: "-0.01em",
            fontWeight: "600",
          },
        ],
        h1_mobile: [
          "1.875rem",
          {
            lineHeight: "2.375rem",
            letterSpacing: "-0.01em",
            fontWeight: "600",
          },
        ],
        h2_mobile: [
          "1.5rem",
          { lineHeight: "2rem", letterSpacing: "-0.01em", fontWeight: "600" },
        ],
        h3_mobile: [
          "1.5rem",
          { lineHeight: "2rem", letterSpacing: "-0.01em", fontWeight: "600" },
        ],
        h5_mobile: [
          "1.5rem",
          { lineHeight: "2rem", letterSpacing: "0", fontWeight: "600" },
        ],
        h6_mobile: [
          "1.125rem",
          { lineHeight: "1.5rem", letterSpacing: "0", fontWeight: "600" },
        ],
        h0_plain: [
          "3.75rem",
          {
            lineHeight: "4rem",
            letterSpacing: "-0.0375rem",
            fontWeight: "500",
          },
        ],
        h0: [
          "4.5rem",
          {
            lineHeight: "4.625rem",
            letterSpacing: "-0.01em",
            fontWeight: "500",
          },
        ],
        h1: [
          "3rem",
          {
            lineHeight: "3.375rem",
            letterSpacing: "-0.01em",
            fontWeight: "600",
          },
        ],
        h2: [
          "2.25rem",
          {
            lineHeight: "2.625rem",
            letterSpacing: "-0.01em",
            fontWeight: "600",
          },
        ],
        h3: [
          "1.875rem",
          {
            lineHeight: "2.375rem",
            letterSpacing: "-0.01em",
            fontWeight: "600",
          },
        ],
        h4: [
          "1.5rem",
          {
            lineHeight: "2.125rem",
            letterSpacing: "-0.01em",
            fontWeight: "600",
          },
        ],
        h5: [
          "1.125rem",
          {
            lineHeight: "1.75rem",
            letterSpacing: "-0.01em",
            fontWeight: "600",
          },
        ],
        h6: [
          "0.875rem",
          {
            lineHeight: "1.125rem",
            letterSpacing: "-0.01em",
            fontWeight: "600",
          },
        ],
        section: [
          "2.5rem",
          { lineHeight: "3rem", letterSpacing: "-0.01em", fontWeight: "600" },
        ],
        quote: ["1.875rem", { lineHeight: "2.8125rem", fontWeight: "400" }],
        quote_mobile: ["1.5rem", { lineHeight: "2rem", fontWeight: "400" }],
        lead: ["1.5rem", { lineHeight: "2.125rem", fontWeight: "400" }],
        lead_mobile: ["1.25rem", { lineHeight: "1.875rem", fontWeight: "400" }],
        body_article: [
          "1.25rem",
          { lineHeight: "2.375rem", fontWeight: "400" },
        ],
        body: ["1.125rem", { lineHeight: "2.125rem", fontWeight: "400" }],
        body_sm: ["1.125rem", { lineHeight: "1.875rem", fontWeight: "400" }],
        body_xs: ["0.875rem", { lineHeight: "1.125rem", fontWeight: "400" }],
        body_teaser: [
          "1.125rem",
          {
            lineHeight: "1.75rem",
            letterSpacing: "-0.01em",
            fontWeight: "400",
          },
        ],
        body_teaser_sm: ["1rem", { lineHeight: "1.5rem", fontWeight: "400" }],
        btn_sm: ["0.875rem", { lineHeight: "1.125rem", fontWeight: "700" }],
        btn_md: ["1.125rem", { lineHeight: "1.5rem", fontWeight: "700" }],
        btn_lg: ["1.25rem", { lineHeight: "1.625rem", fontWeight: "700" }],
        nav: ["1.25rem", { lineHeight: "1.75rem", fontWeight: "700" }],
        nav_mobile: ["2.25rem", { lineHeight: "1.75rem", fontWeight: "700" }],
        barometer_title: [
          "1.125rem",
          { lineHeight: "1.75rem", fontWeight: "600" },
        ],
        widget_title: ["2.25rem", { lineHeight: "1.1", fontWeight: "600" }],
        widget_amount: [
          "2.25rem",
          { lineHeight: "2.625rem", fontWeight: "600" },
        ],
        banner: ["1.5rem", { lineHeight: "1.5rem", fontWeight: "600" }],
        banner_sm: ["1.125rem", { lineHeight: "1.25rem", fontWeight: "600" }],
      },
      fontWeight: {
        heading_checkout_title: "500",
      },
      keyframes: {
        pulsar: {
          "0%": { transform: "scale(1)" },
          "10%": { transform: "scale(1)" },
          "20%": { transform: "scale(1.10)" },
          "30%": { transform: "scale(1)" },
          "100%": { transform: "scale(1)" },
        },
        "test-mode-bar": {
          "0%": { transform: "translateX(0)", opacity: "0" },
          "20%": { transform: "translateX(-10px)", opacity: ".3" },
          "50%": { transform: "translateX(0)", opacity: "1" },
          "70%": { transform: "translateX(10px)", opacity: ".3" },
          "100%": { transform: "translateX(0)", opacity: "0" },
        },
      },
      spacing: {
        18: "4.5rem",
        48: "48px",
        76: "76px",
        176: "176px",
        276: "276px",
        328: "328px",
        342: "342px",
        376: "376px",
        476: "476px",
        576: "576px",
        676: "676px",
        776: "776px",
        875: "875px",
        977: "977px",
        1175: "1176px",
        wrapper: "1224px",
      },
      zIndex: {
        hidden: "-1",
        min: "1",
        "base-below": "9",
        base: "10",
        "base-above": "11",
        "header-below": "49",
        header: "50",
        "header-above": "51",
        "scroll-button": "52",
        search: "53",
        "modal-overlay": "99",
        modal: "100",
      },
      animation: {
        pulsar: "pulsar 3s ease-in-out infinite",
      },
      colors: {
        brand: {
          100: "#001DB2",
          200: "#000833",
          300: "#F5F6FF",
          400: "#FFFFFF",
        },
        text_color: { 100: "#000833", 200: "#969696", 300: "#FFFFFF" },
        ui: {
          100: "#E6E6E6",
          200: "#D2D2D2",
          300: "#BEBEBE",
          400: "#969696",
          500: "#646464",
          600: "#C2CCFF",
        },
        secondary: { 100: "#E4A8AD", 200: "#F7E49E", 300: "#F3CC9B" },
        shade: { 100: "#F5F6FF", 200: "#C2CCFF", 300: "#8094FF" },
        widget_loader: "#E5E7EB",
        link: { DEFAULT: "#3757FF", hover: "#0027F5" },
        blocks: {
          lead: { title: "#001DB2", text: "#000833" },
          factbox: { bg: "", text: "#000833" },
          counter: { text: "#000833", count: "#001DB2" },
          social: { bg: "#3757FF", hover: "#0027F5" },
          accordion: { title: "#3757FF" },
          slider: {
            bg_light: "#F5F6FF",
            bg_dark: "#001DB2",
            text_light: "#000833",
            text_dark: "#FFFFFF",
          },
          footer_nav: { text: "#fff" },
        },
        error: "#D23E44",
        success: "#74CD9D",
        warning: "#F7C744",
        info: "#4A8BC3",
        btn_primary_default: "#3757FF",
        btn_primary_hover: "#0027F5",
        btn_primary_pressed: "#617AFF",
        btn_secondary_default: "#3757FF",
        btn_secondary_hover: "#0027F5",
        btn_secondary_pressed: "#617AFF",
        btn_tertiary_default: "#3757FF",
        btn_tertiary_hover: "#0027F5",
        btn_tertiary_pressed: "#617AFF",
        btn_disabled: "#E6E6E6",
        btn_invers_default: "#FFF",
        btn_invers_hover: "#FFFFFFE5",
        btn_invers_pressed: "#FFFFFFBF",
        checkout_amount: "#001DB2",
        meta_navigation: { DEFAULT: "#969696", hover: "#000833" },
        findock: {
          placeholder: "#757575",
          checkable_bg_color: "#FFF",
          checkable_hover_bg_color: "#F8F8F8",
          label_selected_color: "#F5F7FA",
          label_selected_bg_color: "#F5F6FF",
        },
        widget: { currency_hover: "#C2CCFF", price_hover: "#FFF" },
      },
      minHeight: {
        "key-visual-s": "39rem",
        "key-visual-m": "38.5rem",
        "key-visual-l": "55.75rem",
      },
    },
  },
  plugins: [
    require("@tailwindcss/container-queries"),
    function ({ addUtilities }) {
      addUtilities({
        ".hyphens-auto": { hyphens: "auto" },
      });
    },
  ],
};
