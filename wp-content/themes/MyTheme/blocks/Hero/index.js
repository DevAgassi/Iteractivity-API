import { store, getContext } from "@wordpress/interactivity";

store("hero-section", {
  state: {
    get isModalOpen() {
      return getContext().is_modal_open;
    },
    get buttonText() {
      return this.isModalOpen ? "Close" : "Learn More";
    },
  },

  actions: {
    openModal() {
      const ctx = getContext();
      ctx.is_modal_open = !ctx.is_modal_open;
    },
  },
});
