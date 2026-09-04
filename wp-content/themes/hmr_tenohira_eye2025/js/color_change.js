class ThemeSwitcher {
  constructor() {
    this.themes = ["white", "black", "blue"];
    this.currentTheme = "white";
    this.init();
  }

  init() {
    this.setupEventListeners();
    this.loadSavedTheme();
    this.updateActiveButton();
  }

  setupEventListeners() {
    const colorListItems = document.querySelectorAll(".color-list li");
    colorListItems.forEach((item) => {
      item.addEventListener("click", (e) => {
        const theme = e.target.dataset.theme;
        this.switchTheme(theme);
      });
    });
  }

  switchTheme(theme) {
    if (!this.themes.includes(theme)) return;

    this.currentTheme = theme;

    // HTMLのdata-theme属性を更新
    if (theme === "white") {
      document.documentElement.removeAttribute("data-theme");
    } else {
      document.documentElement.setAttribute("data-theme", theme);
    }

    this.saveTheme(theme);
    this.updateActiveButton();

    // カスタムイベントを発火（必要に応じて他の処理をトリガー）
    document.dispatchEvent(
      new CustomEvent("themeChanged", {
        detail: { theme: theme },
      })
    );
  }

  saveTheme(theme) {
    try {
      localStorage.setItem("selectedTheme", theme);
    } catch (e) {
      console.warn("テーマの保存に失敗しました:", e);
    }
  }

  loadSavedTheme() {
    try {
      const savedTheme = localStorage.getItem("selectedTheme");
      if (savedTheme && this.themes.includes(savedTheme)) {
        this.switchTheme(savedTheme);
      }
    } catch (e) {
      console.warn("保存されたテーマの読み込みに失敗しました:", e);
    }
  }

  updateActiveButton() {
    const buttons = document.querySelectorAll(".color-list li");
    buttons.forEach((button) => {
      button.classList.remove("active");
      if (button.dataset.theme === this.currentTheme) {
        button.classList.add("active");
      }
    });
  }

  getCurrentTheme() {
    return this.currentTheme;
  }
}

// DOMが読み込まれたらテーマスイッチャーを初期化
document.addEventListener("DOMContentLoaded", () => {
  window.themeSwitcher = new ThemeSwitcher();

  // テーマ変更イベントをリスン（デモ用）
  document.addEventListener("themeChanged", (e) => {
    console.log(`テーマが ${e.detail.theme} に変更されました`);
  });
});
