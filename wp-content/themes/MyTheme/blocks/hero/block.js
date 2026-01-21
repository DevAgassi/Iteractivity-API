import { store, getContext, useCallback } from "@wordpress/interactivity";
import "./index.css";


store("hero-section", {
  state: {
    get isModalOpen() {
      return getContext().is_modal_open ?? false;
    },
    get buttonText() {
      // Динамічний текст на основі isModalOpen
      return this.isModalOpen ? "Clicked!!" : "111";
    },
  },

  actions: {
    openModal(event) {
      console.log("as12da111d");
      event.preventDefault(); 
      // Оновлюємо реактивний server-side state
     // const ctx = getContext();
      //ctx.is_modal_open = !ctx.is_modal_open;

      // Не треба дублювати buttonText — getter вже бере ctx.is_modal_open
    },
  },
});
