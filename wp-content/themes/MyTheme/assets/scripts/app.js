// Основний JS файл теми12123212221121
// Тут можна додdeавати глобdd322212альні скрипвати які 1потрібні для всієї теми

console.log("✅ Theme App.js");
import "../styles/main.css";


document.addEventListener("DOMContentLoaded", () => {
  const menuItems = document.querySelectorAll(".js-menu-item");

  menuItems.forEach((item) => {
    const mega = item.querySelector(".js-mega-menu");
    if (!mega) return;

    let closeTimeout = null;

    // Функція скидання станів всередині мега-меню
    const resetSubLevels = () => {
      const grandContents = mega.querySelectorAll(".js-grand-content");
      const subLinks = mega.querySelectorAll(".js-sub-link");

      grandContents.forEach((c) => c.classList.replace("flex", "hidden"));
      subLinks.forEach((l) =>
        l.classList.remove("bg-white", "text-blue-600", "shadow-sm")
      );
    };

    const showMenu = () => {
      clearTimeout(closeTimeout);
      mega.classList.remove(
        "invisible",
        "opacity-0",
        "pointer-events-none",
        "-translate-y-1"
      );
      mega.classList.add(
        "visible",
        "opacity-100",
        "pointer-events-auto",
        "translate-y-0"
      );

      // Авто-активація першого пункту другого рівня
      const firstSubItem = mega.querySelector(".js-sub-item");
      if (firstSubItem) {
        firstSubItem.dispatchEvent(new Event("mouseenter"));
      }
    };

    const hideMenu = () => {
      closeTimeout = setTimeout(() => {
        mega.classList.remove(
          "visible",
          "opacity-100",
          "pointer-events-auto",
          "translate-y-0"
        );
        mega.classList.add(
          "invisible",
          "opacity-0",
          "pointer-events-none",
          "-translate-y-1"
        );
        resetSubLevels();
      }, 150); // Затримка 150мс вирішує проблему розриву ховеру
    };

    // Події для Першого рівня
    item.addEventListener("mouseenter", showMenu);
    item.addEventListener("mouseleave", hideMenu);

    // Події для Другого та Третього рівнів
    const subItems = mega.querySelectorAll(".js-sub-item");
    subItems.forEach((sub) => {
      const link = sub.querySelector(".js-sub-link");
      const targetId = sub.getAttribute("data-menu-id");
      const targetContent = document.getElementById(targetId);

      sub.addEventListener("mouseenter", () => {
        // Ховаємо попередні відкриті 3-ті рівні
        resetSubLevels();

        // Показуємо поточний
        if (targetContent) {
          targetContent.classList.replace("hidden", "flex");
          link.classList.add("bg-white", "text-blue-600", "shadow-sm");
        }
      });
    });
  });
});
