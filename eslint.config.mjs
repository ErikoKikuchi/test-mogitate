import js from "@eslint/js";
import prettier from "eslint-plugin-prettier";
import prettierConfig from "eslint-config-prettier";

export default [
  js.configs.recommended, // ESLintの推奨ルールを追加
  prettierConfig,
  {
    files: ["resources/js/**/*.js"],
    languageOptions: {
      ecmaVersion: 2026,
      sourceType: "module",
      globals: {
        window: "readonly",
        document: "readonly",
        console: "readonly"
      }
    },
    plugins: {prettier:prettier},
    rules: {
    // Prettier違反は "warn" にして指摘だけ
    "prettier/prettier": "warn",
    // ESLintのルール違反もすべて警告にする場合は個別に設定
    "no-unused-vars": "warn",
    "no-console": "warn"
    },
    ignores:["node_modules/**", "public/**", "vendor/**"]
  },
];
