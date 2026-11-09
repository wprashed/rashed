/** @type {import('tailwindcss').Config} */
function withOpacity(variableName) {
	return function(param) {
		var opacityValue = param && param.opacityValue;
		if (opacityValue !== undefined) {
			return 'rgba(var(' + variableName + '), ' + opacityValue + ')';
		}
		return 'rgb(var(' + variableName + '))';
	};
}

module.exports = {
	darkMode: "class",
	content: [
		"./*.php",
		"./template-parts/**/*.php",
		"./assets/js/**/*.js"
	],
	theme: {
		extend: {
			colors: {
				"surface": withOpacity("--color-surface-rgb"),
				"surface-dim": withOpacity("--color-surface-dim-rgb"),
				"surface-bright": withOpacity("--color-surface-bright-rgb"),
				"surface-container-lowest": withOpacity("--color-surface-container-lowest-rgb"),
				"surface-container-low": withOpacity("--color-surface-container-low-rgb"),
				"surface-container": withOpacity("--color-surface-container-rgb"),
				"surface-container-high": withOpacity("--color-surface-container-high-rgb"),
				"surface-container-highest": withOpacity("--color-surface-container-highest-rgb"),
				"on-surface": withOpacity("--color-on-surface-rgb"),
				"on-surface-variant": withOpacity("--color-on-surface-variant-rgb"),
				"inverse-surface": withOpacity("--color-inverse-surface-rgb"),
				"inverse-on-surface": withOpacity("--color-inverse-on-surface-rgb"),
				"outline": withOpacity("--color-outline-rgb"),
				"outline-variant": withOpacity("--color-outline-variant-rgb"),
				"surface-tint": withOpacity("--color-surface-tint-rgb"),
				"primary": withOpacity("--color-primary-rgb"),
				"on-primary": withOpacity("--color-on-primary-rgb"),
				"primary-container": withOpacity("--color-primary-container-rgb"),
				"on-primary-container": withOpacity("--color-on-primary-container-rgb"),
				"primary-fixed": withOpacity("--color-primary-fixed-rgb"),
				"primary-fixed-dim": withOpacity("--color-primary-fixed-dim-rgb"),
				"inverse-primary": withOpacity("--color-inverse-primary-rgb"),
				"secondary": withOpacity("--color-secondary-rgb"),
				"on-secondary": withOpacity("--color-on-secondary-rgb"),
				"secondary-container": withOpacity("--color-secondary-container-rgb"),
				"on-secondary-container": withOpacity("--color-on-secondary-container-rgb"),
				"tertiary": withOpacity("--color-tertiary-rgb"),
				"on-tertiary": withOpacity("--color-on-tertiary-rgb"),
				"tertiary-container": withOpacity("--color-tertiary-container-rgb"),
				"on-tertiary-container": withOpacity("--color-on-tertiary-container-rgb"),
				"error": withOpacity("--color-error-rgb"),
				"on-error": withOpacity("--color-on-error-rgb"),
				"error-container": withOpacity("--color-error-container-rgb"),
				"on-error-container": withOpacity("--color-on-error-container-rgb")
			},
			fontFamily: {
				"display": ["'Josefin Sans'", "sans-serif"],
				"headline-lg": ["'Josefin Sans'", "sans-serif"],
				"headline-md": ["'Josefin Sans'", "sans-serif"],
				"headline-sm": ["'Josefin Sans'", "sans-serif"],
				"body-lg": ["'Poppins'", "-apple-system", "BlinkMacSystemFont", "sans-serif"],
				"body-md": ["'Poppins'", "-apple-system", "BlinkMacSystemFont", "sans-serif"],
				"body-sm": ["'Poppins'", "-apple-system", "BlinkMacSystemFont", "sans-serif"],
				"sans": ["'Poppins'", "-apple-system", "BlinkMacSystemFont", "sans-serif"],
				"serif": ["'Josefin Sans'", "sans-serif"],
				"label-code": ["JetBrains Mono", "monospace"],
				"label-meta": ["JetBrains Mono", "monospace"]
			},
			fontSize: {
				"display": ["56px", { lineHeight: "64px", letterSpacing: "-0.02em", fontWeight: "400" }],
				"display-mobile": ["38px", { lineHeight: "44px", letterSpacing: "-0.015em", fontWeight: "400" }],
				"headline-lg": ["36px", { lineHeight: "44px", letterSpacing: "-0.015em", fontWeight: "400" }],
				"headline-md": ["26px", { lineHeight: "34px", letterSpacing: "-0.01em", fontWeight: "500" }],
				"headline-sm": ["20px", { lineHeight: "28px", letterSpacing: "-0.005em", fontWeight: "500" }],
				"body-lg": ["17px", { lineHeight: "28px", letterSpacing: "-0.01em", fontWeight: "400" }],
				"body-md": ["15px", { lineHeight: "24px", letterSpacing: "-0.005em", fontWeight: "400" }],
				"body-sm": ["13px", { lineHeight: "20px", fontWeight: "400" }],
				"label-code": ["12px", { lineHeight: "16px", letterSpacing: "0.04em", fontWeight: "500" }],
				"label-meta": ["11px", { lineHeight: "14px", letterSpacing: "0.06em", fontWeight: "400" }]
			},
			boxShadow: {
				"shell": "0 1px 3px rgba(0,0,0,0.02), 0 20px 40px -15px rgba(0,0,0,0.05)",
				"card-soft": "0 12px 28px -6px rgba(0,0,0,0.06)",
				"badge": "0 1px 2px rgba(0,0,0,0.03)",
				"subtle": "0 1px 3px rgba(0,0,0,0.02)"
			}
		}
	},
	plugins: []
};
